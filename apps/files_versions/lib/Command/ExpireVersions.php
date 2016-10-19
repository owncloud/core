<?php
/**
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

namespace OCA\Files_Versions\Command;

use OCA\Files_Versions\Expiration;
use OCA\Files_Versions\Storage;
use OCP\IConfig;
use OCP\IUser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExpireVersions extends Command {

	/**
	 * @var Expiration
	 */
	private $expiration;

	/**
	 * @var IConfig
	 */
	private $config;

	/**
	 * @param IConfig|null $userManager
	 * @param Expiration|null $expiration
	 */
	public function __construct(IConfig $config = null,
								Expiration $expiration = null) {
		parent::__construct();

		$this->config = $config;
		$this->expiration = $expiration;
	}

	protected function configure() {
		$this
			->setName('versions:expire')
			->setDescription('Expires the users file versions')
			->addArgument(
				'user_id',
				InputArgument::OPTIONAL | InputArgument::IS_ARRAY,
				'expire file versions of the given user(s), if no user is given file versions for all users that logged in once will be expired.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$maxAge = $this->expiration->getMaxAgeAsTimestamp();
		if (!$maxAge) {
			$output->writeln("No expiry configured.");
			return;
		}

		$users = $input->getArgument('user_id');
		if (!empty($users)) {
			foreach ($users as $user) {
				$result = $this->expireVersionsForUser($user);
				if ($result) {
					$output->writeln("Removed {$result[0]} old versions for <info>$user</info>");
				} else {
					$output->writeln("<error>Could not set up filesystem for $user</error>");
				}
			}
		} else {
			$p = new ProgressBar($output);
			$p->start($this->config->countUsersHavingUserValue('login', 'lastLogin'));
			$this->config->callForUsersHavingUserValue('login', 'lastLogin', function($userId) use ($p) {
				$p->advance();
				$this->expireVersionsForUser($userId);
			});
			$p->finish();
			$output->writeln('');
		}
	}

	/**
	 * @param $uid string
	 * @return int number of deleted versions
	 */
	function expireVersionsForUser($uid) {
		if (!$this->setupFS($uid)) {
			return false;
		}
		return Storage::expireOlderThanMaxForUser($uid);
	}

	/**
	 * Act on behalf on versions item owner
	 * @param string $user
	 * @return boolean
	 */
	protected function setupFS($user) {
		\OC_Util::tearDownFS();
		\OC_Util::setupFS($user);

		// Check if this user has a version directory
		$view = new \OC\Files\View('/' . $user);
		if (!$view->is_dir('/files_versions')) {
			return false;
		}

		return true;
	}
}
