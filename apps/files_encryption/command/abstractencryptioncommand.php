<?php
/**
 * Copyright (c) 2014 Simon Vocella <voxsim@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files_Encryption\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractEncryptionCommand extends Command {

	protected function configure() {
		$this	->addArgument(
				'uid',
				InputArgument::REQUIRED,
				'specified user id'
			)
			->addArgument(
				'password',
				InputArgument::REQUIRED,
				'specified password'
			)
		;
	}
	
	private function rutime($begin, $end) {
	    return $end - $begin;
	}

	final protected function execute(InputInterface $input, OutputInterface $output) {
		// Script start
		$begin = time();

		$uid = $input->getArgument('uid');
		$password = $input->getArgument('password');
		
		// load apps
		\OC_App::loadApps();

		// Filesystem related hooks
		\OCA\Files_Encryption\Helper::registerFilesystemHooks();
		
		// User related hooks
		\OCA\Files_Encryption\Helper::registerUserHooks();

		// clear and register hooks
		\OC_FileProxy::clearProxies();
		\OC_FileProxy::register(new \OCA\Files_Encryption\Proxy());

		// login user
		\OC_Util::tearDownFS();
                \OC_User::setUserId('');
                \OC\Files\Filesystem::tearDown();
                \OC_User::setUserId($uid);
                \OC_Util::setupFS($uid);

                $params['uid'] = $uid;
                $params['password'] = $password;
                $logged = \OCA\Files_Encryption\Hooks::login($params);

		if($logged) {
			$view = new \OC\Files\View('/');
			$session = new \OCA\Files_Encryption\Session($view);
			$encryptionInitStatus = $session->getInitialized();

			if($encryptionInitStatus === \OCA\Files_Encryption\Session::INIT_SUCCESSFUL) {
				$this->executeEncryptionCommand($input, $output, $view, $uid);
				$end = time();
				$output->writeln("This process used " . $this->rutime($begin, $end) . " s for its computation");
				return;
			}
		}

		$output->writeln("The user $uid is not properly initialized, please check the password or its encryption status.");
	}

	abstract protected function executeEncryptionCommand(InputInterface $input, OutputInterface $output, \OC\Files\View $view, $uid);
}
