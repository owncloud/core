<?php
/**
 * Copyright (c) 2014 Arthur Schiwon <blizzz@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\user_ldap\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use OCA\User_LDAP\GarbageCollector;
use OCA\User_LDAP\lib\Connection;
use OCA\User_LDAP\lib\Access;

class ShowRemnants extends Command {

	protected function configure() {
		$this
			->setName('ldap:showRemnants')
			->setDescription('shows which users are not available on LDAP anymore, but have remnants in ownCloud.')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$gc = new GarbageCollector(
			new \OC\Preferences(\OC_DB::getConnection()),
			\OC::$server->getDatabaseConnection(),
			$this->getAccess()
		);

		$table = $this->getHelperSet()->get('table');
		$table->setHeaders(array('ownCloud name', 'Display Name', 'LDAP UID', 'LDAP DN', 'Last Login', 'Dir'));
		$rows = array();
		$offset = 0;
		do {
			$resultSet = $gc->getDeletedUsers($offset);
			$offset += count($resultSet);
			foreach($resultSet as $user) {
				$hAS = $user->hasActiveShares ? 'Y' : 'N';
				$rows[] = array(
					$user->getOCName(),
					$user->getDisplayName(),
					$user->getUid(),
					$user->getDN(),
					$user->getLastLogin(),
					$user->getHomePath(),
					$hAS
				);
			}
		} while (count($resultSet) === 10);

		$table->setRows($rows);
		$table->render($output);
	}

	protected function getAccess() {
		$ldap = new \OCA\user_ldap\lib\LDAP();
		$dummyConnection = new Connection($ldap, '', null);
		$userManager = new \OCA\user_ldap\lib\user\Manager(
			\OC::$server->getConfig(),
			new \OCA\user_ldap\lib\FilesystemHelper(),
			new \OCA\user_ldap\lib\LogWrapper(),
			\OC::$server->getAvatarManager(),
			new \OCP\Image()
		);
		$access = new Access($dummyConnection, $ldap, $userManager);
		return $access;
	}

}
