<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
use OCA\User_LDAP\LDAP;
use OCP\IConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \OCA\User_LDAP\Helper;
use \OCA\User_LDAP\Connection;

class TestConfig extends Command {

	/** @var IConfig */
	protected $coreConfig;

	/** @var Helper */
	protected $helper;

	/** @var LDAP */
	protected $ldap;

	/**
	 * @param IConfig $coreConfig
	 * @param Helper $helper
	 * @param LDAP $ldap
	 */
	public function __construct(IConfig $coreConfig, Helper $helper, LDAP $ldap) {
		parent::__construct();
		$this->coreConfig = $coreConfig;
		$this->helper = $helper;
		$this->ldap = $ldap;
	}

	protected function configure() {
		$this
			->setName('ldap:test-config')
			->setDescription('tests an LDAP configuration')
			->addArgument(
				'configID',
				InputArgument::REQUIRED,
				'the configuration ID'
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
		$configId = $input->getArgument('configID');
		if (!\in_array($configId, $availableConfigs, true)) {
			$output->writeln("Invalid configID");
			return;
		}

		$result = $this->testConfig($configId);
		if ($result === 0) {
			$output->writeln('The configuration is valid and the connection could be established!');
		} elseif ($result === 1) {
			$output->writeln('The configuration is invalid. Please have a look at the logs for further details.');
		} elseif ($result === 2) {
			$output->writeln('The configuration is valid, but the Bind failed. Please check the server settings and credentials.');
		} else {
			$output->writeln('Your LDAP server was kidnapped by aliens.');
		}
	}

	/**
	 * tests the specified connection
	 * @param string $configId
	 * @return int
	 */
	protected function testConfig($configId) {
		$configuration = new Configuration($this->coreConfig, $configId);
		$connection = new Connection($this->ldap, $configuration);

		//ensure validation is run before we attempt the bind
		$connection->getConfiguration();

		if (!$connection->setConfiguration([
			'ldap_configuration_active' => 1,
		])) {
			return 1;
		}
		if ($connection->bind()) {
			return 0;
		}
		return 2;
	}
}
