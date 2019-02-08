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
namespace OCA\Federation\Panels;

use OCP\BackgroundJob\IJobList;
use OCP\Http\Client\IClientService;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\ILogger;
use OCP\Security\ISecureRandom;
use OCP\Settings\ISettings;
use OCP\Template;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Admin implements ISettings {

	/** @var IDBConnection */
	protected $connection;
	/** @var IL10N */
	protected $l;
	/** @var IClientService */
	protected $clientService;
	/** @var ILogger */
	protected $logger;
	/** @var IJobList */
	protected $jobList;
	/** @var ISecureRandom */
	protected $secureRandom;
	/** @var IConfig */
	protected $config;
	/** @var EventDispatcherInterface */
	protected $eventDispatcher;

	public function __construct(IDBConnection $connection,
								IL10N $l,
								IClientService $clientService,
								ILogger $logger,
								IJobList $jobList,
								ISecureRandom $secureRandom,
								IConfig $config,
								EventDispatcherInterface $eventDispatcher) {
		$this->connection = $connection;
		$this->l = $l;
		$this->clientService = $clientService;
		$this->logger = $logger;
		$this->jobList = $jobList;
		$this->secureRandom = $secureRandom;
		$this->config = $config;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function getPriority() {
		return 90;
	}

	public function getSectionID() {
		return 'sharing';
	}

	public function getPanel() {
		$template = new Template('federation', 'settings-admin');
		$dbHandler = new \OCA\Federation\DbHandler(
			$this->connection,
			$this->l
		);
		$trustedServers = new \OCA\Federation\TrustedServers(
			$dbHandler,
			$this->clientService,
			$this->logger,
			$this->jobList,
			$this->secureRandom,
			$this->config,
			$this->eventDispatcher
		);
		$template->assign('trustedServers', $trustedServers->getServers());
		$template->assign('autoAddServers', $trustedServers->getAutoAddServers());
		return $template;
	}
}
