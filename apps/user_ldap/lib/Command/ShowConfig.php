<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Laurens Post <Crote@users.noreply.github.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\User_LDAP\Command;

use OCA\User_LDAP\Configuration;
use OCA\User_LDAP\Helper;
use OC\Core\Command\Base;
use OCP\IConfig;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ShowConfig extends Base {

	/** @var IConfig */
	protected $config;

	/** @var Helper */
	protected $helper;

	/**
	 * @param IConfig $config
	 * @param Helper $helper
	 */
	public function __construct(IConfig $config, Helper $helper) {
		parent::__construct();
		$this->config = $config;
		$this->helper = $helper;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('ldap:show-config')
			->setDescription('shows the LDAP configuration')
			->addArgument(
				'configID',
				InputArgument::OPTIONAL,
				'will show the configuration of the specified id'
			)
			->addOption(
				'show-password',
				null,
				InputOption::VALUE_NONE,
				'show ldap bind password'
			)
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|void|null
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$availableConfigs = $this->helper->getServerConfigurationPrefixes();
		$configID = $input->getArgument('configID');
		if ($configID !== null) {
			$configIDs[] = $configID;
			if (!\in_array($configIDs[0], $availableConfigs)) {
				$output->writeln("Invalid configID");
				return;
			}
		} else {
			$configIDs = $availableConfigs;
		}
		$this->renderConfigs($configIDs, $input, $output, $input->getOption('show-password'));
	}

	/**
	 * prints the LDAP configuration(s)
	 * @param string[] $configIDs
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param bool $withPassword      Set to TRUE to show plaintext passwords in output
	 */
	protected function renderConfigs($configIDs, InputInterface $input, OutputInterface $output, $withPassword) {
		foreach ($configIDs as $id) {
			$configHolder = new Configuration($this->config, $id);
			$configuration = $configHolder->getConfiguration();
			\ksort($configuration);
			if (!$withPassword) {
				$configuration ['ldapAgentPassword'] = '***';
			}
			if ($input->getOption('output') === self::OUTPUT_FORMAT_PLAIN) {
				$table = new Table($output);
				$table->setHeaders(['Configuration', $id]);
				$rows = [];
				foreach ($configuration as $key => $value) {
					if (\is_array($value)) {
						$value = \implode(';', $value);
					}
					$rows[] = [$key, $value];
				}
			
				$table->setRows($rows);
				$table->render();
			} else {
				parent::writeArrayInOutputFormat(
					$input,
					$output,
					$configuration,
					self::DEFAULT_OUTPUT_PREFIX,
					true
				);
			}
		}
	}
}
