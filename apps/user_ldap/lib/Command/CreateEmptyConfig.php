<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Martin Konrad <konrad@frib.msu.edu>
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

use OCP\IConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \OCA\User_LDAP\Helper;
use \OCA\User_LDAP\Configuration;

class CreateEmptyConfig extends Command {

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
		$this
			->setName('ldap:create-empty-config')
			->setDescription('creates an empty LDAP configuration')
			->addArgument(
				'configID',
				InputArgument::OPTIONAL,
				'create a configuration with the specified id'
			)
		;
	}

	/**
	 * Executes the current command.
	 *
	 * @return null|int null or 0 if everything went fine, or an error code
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$configID = $input->getArgument('configID');
		if ($configID === null) {
			$configPrefix = $this->helper->nextPossibleConfigurationPrefix();
		} else {
			// Check we are not trying to create an empty configid
			if ($configID === '') {
				$output->writeln('configID cannot be empty');
				return 1;
			}
			// Check if we are not already using this configid
			$availableConfigs = $this->helper->getServerConfigurationPrefixes();
			if (\in_array($configID, $availableConfigs, true)) {
				$output->writeln('configID already exists');
				return 1;
			}
			$configPrefix = $configID;
		}
		$output->writeln("Created new configuration with configID '{$configPrefix}'");

		$configHolder = new Configuration($this->config, $configPrefix);
		$configHolder->saveConfiguration();
		return 0;
	}
}
