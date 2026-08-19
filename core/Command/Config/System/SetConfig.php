<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Core\Command\Config\System;

use OC\Core\Command\Base;
use OC\Core\Command\Config\SensitiveValueTrait;
use OC\SystemConfig;
use OCP\IConfig;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SetConfig extends Base {
	use SensitiveValueTrait;

	/** * @var SystemConfig */
	protected $systemConfig;

	/**
	 * @param SystemConfig $systemConfig
	 */
	public function __construct(SystemConfig $systemConfig) {
		parent::__construct();
		$this->systemConfig = $systemConfig;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('config:system:set')
			->setDescription('Set a system config value.')
			->addArgument(
				'name',
				InputArgument::REQUIRED | InputArgument::IS_ARRAY,
				'Name of the config parameter, specify multiple for array parameter.'
			)
			->addOption(
				'type',
				null,
				InputOption::VALUE_REQUIRED,
				'Value type [string, integer, double, boolean, json].',
				'string'
			)
			->addOption(
				'value',
				null,
				InputOption::VALUE_REQUIRED,
				'The new value of the config.'
			)
			->addOption(
				'update-only',
				null,
				InputOption::VALUE_NONE,
				'Only updates the value, if it is not set before, it is not being added.'
			)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$configNames = $input->getArgument('name');
		$configName = $configNames[0];
		$sensitive = $this->systemConfig->isSensitiveKey($configNames)
			|| $this->isSensitiveKeyName(...$configNames);
		$configValue = $this->castValue($input->getOption('value'), $input->getOption('type'), $sensitive);
		$updateOnly = $input->getOption('update-only');

		if ($configName === '') {
			$output->writeln('<error>Config name must not be empty.</error>');
			return 1;
		}

		if (\sizeof($configNames) > 1) {
			$existingValue = $this->systemConfig->getValue($configName);

			$newValue = $this->mergeArrayValue(
				\array_slice($configNames, 1),
				$existingValue,
				$configValue['value'],
				$updateOnly
			);

			$this->systemConfig->setValue($configName, $newValue);
		} else {
			if ($updateOnly && !\in_array($configName, $this->systemConfig->getKeys(), true)) {
				throw new \UnexpectedValueException('Config parameter does not exist');
			}

			$this->systemConfig->setValue($configName, $configValue['value']);
		}

		$output->writeln('<info>System config value ' . \implode(' => ', $configNames) . ' set to ' . $configValue['readable-value'] . '</info>');
		return 0;
	}

	/**
	 * @param string $value
	 * @param string $type
	 * @param bool $sensitive when true the readable value holds a placeholder
	 *                        instead of the value itself
	 * @return mixed
	 * @throws \InvalidArgumentException
	 */
	protected function castValue($value, $type, $sensitive = false) {
		switch ($type) {
			case 'integer':
			case 'int':
				if (!\is_numeric($value)) {
					throw new \InvalidArgumentException('Non-numeric value specified');
				}
				return [
					'value' => (int) $value,
					'readable-value' => 'integer ' . $this->readableValue((int) $value, $sensitive),
				];

			case 'double':
			case 'float':
				if (!\is_numeric($value)) {
					throw new \InvalidArgumentException('Non-numeric value specified');
				}
				return [
					'value' => (double) $value,
					'readable-value' => 'double ' . $this->readableValue((double) $value, $sensitive),
				];

			case 'boolean':
			case 'bool':
				// a boolean cannot hold a secret - both of its values are
				// public knowledge - so it is never masked
				$value = \strtolower($value);
				switch ($value) {
					case 'true':
						return [
							'value' => true,
							'readable-value' => 'boolean ' . $value,
						];

					case 'false':
						return [
							'value' => false,
							'readable-value' => 'boolean ' . $value,
						];

					default:
						throw new \InvalidArgumentException('Unable to parse value as boolean');
				}

				// no break
			case 'null':
				return [
					'value' => null,
					'readable-value' => 'null',
				];

			case 'string':
				$value = (string) $value;
				return [
					'value' => $value,
					'readable-value' => ($value === '') ? 'empty string' : 'string ' . $this->readableValue($value, $sensitive),
				];

			case 'json':
				$decodedJson = \json_decode($value, true);
				if ($decodedJson === null) {
					throw new \InvalidArgumentException('Unable to parse value as json');
				}
				return [
					'value' => $decodedJson,
					'readable-value' => 'json ' . $this->readableValue($value, $sensitive),
				];

			default:
				throw new \InvalidArgumentException('Invalid type');
		}
	}

	/**
	 * The value as it is shown to the user - secrets are never echoed, so that
	 * they do not end up in the terminal scrollback or in any log tailing it.
	 *
	 * @param mixed $value
	 * @param bool $sensitive
	 * @return string
	 */
	private function readableValue($value, $sensitive) {
		return $sensitive ? IConfig::SENSITIVE_VALUE : (string) $value;
	}

	/**
	 * @param array $configNames
	 * @param mixed $existingValues
	 * @param mixed $value
	 * @param bool $updateOnly
	 * @return array merged value
	 * @throws \UnexpectedValueException
	 */
	protected function mergeArrayValue(array $configNames, $existingValues, $value, $updateOnly) {
		$configName = \array_shift($configNames);
		if (!\is_array($existingValues)) {
			$existingValues = [];
		}
		if (!empty($configNames)) {
			if (isset($existingValues[$configName])) {
				$existingValue = $existingValues[$configName];
			} else {
				$existingValue = [];
			}
			$existingValues[$configName] = $this->mergeArrayValue($configNames, $existingValue, $value, $updateOnly);
		} else {
			if (!isset($existingValues[$configName]) && $updateOnly) {
				throw new \UnexpectedValueException('Config parameter does not exist');
			}
			$existingValues[$configName] = $value;
		}
		return $existingValues;
	}
}
