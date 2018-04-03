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

namespace OCA\Testing\Command;

use OC\Core\Command\Base;
use OCA\DAV\CardDAV\CardDavBackend;
use OCA\DAV\Connector\Sabre\Principal;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\IUserSession;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Sabre\VObject\Component\VCard;

class CreateMultiUser extends Base {

	/**
	 * @var IUserManager
	 */
	protected $userManager;

	/**
	 * @var CardDavBackend
	 */
	protected $cardDavBackend;

	/**
	 * @var IUserSession
	 */
	protected $session;

	/**
	 * @var ILogger
	 */
	protected $logger;

	public function __construct(IUserManager $userManager, IUserSession $session, ILogger $logger) {
		$this->userManager = $userManager;
		$this->session = $session;
		$this->logger = $logger;
		$userPrincipalBackend = new Principal(
			\OC::$server->getUserManager(),
			\OC::$server->getGroupManager()
		);
		$db = \OC::$server->getDatabaseConnection();
		$dispatcher = \OC::$server->getEventDispatcher();
		$this->cardDavBackend = new CardDavBackend($db, $userPrincipalBackend, $dispatcher);
		parent::__construct();
	}

	protected function configure() {
		parent::configure();

		$defaultUidPrefix = 'zombie-' . time() . '-';

		$this
			->setName('testing:createusers')
			->setDescription('Creates and provisions multiple users for testing')
			->addOption('prefix', 'p', InputOption::VALUE_REQUIRED, 'userid prefix for created users', $defaultUidPrefix)
			->addArgument('numUsers', InputArgument::REQUIRED)
			->addArgument('numContacts', InputArgument::REQUIRED);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$num = $input->getArgument('numUsers');
		$cont = $input->getArgument('numContacts');
		$prefix = $input->getOption('prefix');
		$progress = new ProgressBar($output, $num);
		$progress->setFormatDefinition('custom', ' %current%/%max% [%bar%] %percent:3s%% Elapsed:%elapsed:6s% Estimated:%estimated:-6s% Remaining:%remaining% %message%');
		$progress->setFormat('custom');
		$usersCreated = 0;
		$start = round(microtime(true) * 1000);
		for($i=0; $i<$num; $i++) {
			// Create a user and log them in
			$uid = $this->getUid($prefix, $i);
			$msElapsed = round(microtime(true) * 1000) - $start;
			$rate = round($usersCreated / ($msElapsed/1000), 1);
			$progress->setMessage("Creating [$uid] Rate: $rate users/second");
			try {
				$user = $this->userManager->createUser($uid, $uid);
				$this->fakeLoginAndLogout($uid);

				// Create 5 addressbook entries for each user
				$username = $user->getUID();
				$addBookId = (string)$this->cardDavBackend->getAddressBooksForUser("principals/users/$username")[0]['id'];
				for($n=0; $n<$cont; $n++) {
					$uri = $uid.$n.'.vcf';
					$vCard = new VCard();
					$vCard->UID = $uri;
					$vCard->FN = 'Testing'.$uid.$n."Contact";
					$this->cardDavBackend->createCard($addBookId, $uri, $vCard->serialize());
				}

				$usersCreated++;
			} catch (\Exception $e) {
				$error = $e->getMessage();
				$this->logger->logException($e);
				$output->writeln("<error>Failed to create user with error: $error</error>");
			}
			$progress->advance();
		}
		$progress->finish();
	}

	protected function getUid($prefix, $i) {
		return $prefix.$i;
	}

	private function fakeLoginAndLogout($uid) {
		$this->session->login($uid, $uid);
		$this->session->logout();
	}

}