<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Core\Command\User;

use OC\Core\Command\Base;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Inactive extends Base {
	/** @var \OCP\IUserManager */
	protected $userManager;

	/**
	 * @param IUserManager $userManager
	 */
	public function __construct(IUserManager $userManager) {
		parent::__construct();
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this
			->setName('user:inactive')
			->setDescription('Reports users who are known to ownCloud, but have not logged in for a certain number of days.')
			->addArgument(
				'days',
				InputArgument::REQUIRED,
				'The number of days (integer) that the user has not logged in since.'
			);
		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$days = $input->getArgument('days');
		if ((!\is_int($days) && !\ctype_digit($days)) || $days < 1) {
			throw new InvalidArgumentException('Days must be integer and above zero');
		}

		$now = \time();

		$inactive = [];
		$this->userManager->callForSeenUsers(function (IUser $user) use (&$inactive, $days, $now) {
			$lastLogin = $user->getLastLogin();
			// Difference between now and last login, into days, and rounded down
			$daysSinceLastLogin = \floor(($now - $lastLogin) / (60*60*24));
			if ($daysSinceLastLogin >= $days) {
				$inactive[] = [
					'uid' => $user->getUID(),
					'displayName' => $user->getDisplayName(),
					'inactiveSinceDays' => $daysSinceLastLogin
				];
			}
		});

		$this->writeArrayInOutputFormat($input, $output, $inactive);
	}
}
