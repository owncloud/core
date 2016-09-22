<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Pierre Ozoux <pierre@ozoux.net>
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

namespace OC\Core\Command\User;

use OC\Core\Command\Base;
use OCP\IDBConnection;
use OCP\IUserManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class LastSeen extends Base  {
	/** @var IUserManager */
	protected $userManager;

	/** @var IDBConnection */
	protected $connection;

	/**
	 * @param IUserManager $userManager
	 */
	public function __construct(IUserManager $userManager, IDBConnection $connection) {
		$this->userManager = $userManager;
		$this->connection = $connection;
		parent::__construct();
	}

	protected function configure() {
		parent::configure();
		$this
			->setName('user:lastseen')
			->setDescription('shows when users were logged in last time')
			->addArgument(
				'uid',
				InputArgument::OPTIONAL,
				'the username'
			)
			->addOption(
				'limit',
				10,
				InputOption::VALUE_OPTIONAL,
				'limit to n users'
			);
	}

	protected function getLastLogins($userId = null, $limit = 10) {
		$queryBuilder = $this->connection->getQueryBuilder();
		$queryBuilder->select(['userid', 'configvalue'])
			->from('preferences')
			->where($queryBuilder->expr()->eq(
				'appid', $queryBuilder->createNamedParameter('login'))
			)
			->andWhere($queryBuilder->expr()->eq(
				'configkey', $queryBuilder->createNamedParameter('lastLogin'))
			)
			->andWhere($queryBuilder->expr()->isNotNull('configvalue')
			)
			->orderBy('configvalue', 'DESC');

		if ($userId) {
			$queryBuilder->andWhere($queryBuilder->expr()->eq(
				'userid', $queryBuilder->createNamedParameter($userId))
			);
		}

		if (!empty($limit)) {
			$queryBuilder->setMaxResults($limit);
		}

		$query = $queryBuilder->execute();
		$result = [];

		while ($row = $query->fetch()) {
			$result[] = ['userid' => $row['userid'], 'lastLogin' => $row['configvalue']];
		}

		return $result;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uid = $input->getArgument('uid');
		$users = $this->getLastLogins($uid, $input->getOption('limit'));
		$outputFormat = $input->getOption('output');
		if (empty($users)) {
			if ($uid) {
				$user = $this->userManager->get($uid);
				if ($user) {
					if ($outputFormat === self::OUTPUT_FORMAT_PLAIN ) {
						$output->writeln('User '.$uid.' has never logged in, yet.');
						return;
					} else {
						$users = [
							[
								'userid' => $uid,
								'displayname' => $user->getDisplayName(),
								'email' => $user->getEMailAddress(),
								'lastLogin' => null
							]
						];
					}
				} else if ($outputFormat === self::OUTPUT_FORMAT_PLAIN ) {
					$output->writeln('<error>User $uid does not exist</error>');
					return;
				}
			}
		}
		foreach ($users as $key => $data) {
			$date = new \DateTime();
			$date->setTimestamp($data['lastLogin']);
			$user = $this->userManager->get($data['userid']);
				switch ($outputFormat) {
					case self::OUTPUT_FORMAT_JSON:
					case self::OUTPUT_FORMAT_JSON_PRETTY:
						if ($users[$key]['lastLogin'] !== null) {
							$users[$key]['lastLogin'] = $date->format('Y-m-d\TH:i:s');
						}
						// make the json output useful by adding more info
						if ($user) {
							$users[$key]['displayname'] = $user->getDisplayName();
							$users[$key]['email'] = $user->getEMailAddress();
						} else {
							// user no longer exists
							$users[$key]['displayname'] = null;
							$users[$key]['email'] = null;
						}
						ksort($users[$key]);
						break;
					default:
						$output->writeln(
							$data['userid'] .'`s last login: ' . $date->format('d.m.Y H:i') );
						break;
				}
		}
		switch ($outputFormat) {
			case self::OUTPUT_FORMAT_JSON:
			case self::OUTPUT_FORMAT_JSON_PRETTY:
				$this->writeArrayInOutputFormat($input, $output, $users);
				break;
		}
	}
}
