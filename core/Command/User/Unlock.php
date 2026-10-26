<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OC\Core\Command\User;

use OC\Authentication\AccountLockout\AccountLockout;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Unlock extends Command {
	/** @var AccountLockout */
	protected $accountLockout;

	/**
	 * @param AccountLockout $accountLockout
	 */
	public function __construct(AccountLockout $accountLockout) {
		$this->accountLockout = $accountLockout;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('user:unlock')
			->setDescription('Lifts the temporary lockout after failed logins and resets the counter of failed attempts.')
			->addArgument(
				'login',
				InputArgument::REQUIRED,
				'The username or email address. Login names without an account - e.g. of an external backend - are accepted as well.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		// no account check on purpose: login names which do not resolve to an
		// account are locked out as well, see AccountLockout
		if ($this->accountLockout->unlock($input->getArgument('login')) > 0) {
			$output->writeln('<info>The failed login attempts have been reset, the login is unlocked</info>');
		} else {
			$output->writeln('<info>There were no failed login attempts to reset</info>');
		}
		return 0;
	}
}
