<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV\Connector\Sabre;

use OCA\DAV\DAV\FileCustomPropertiesBackend;
use OCA\DAV\DAV\FileCustomPropertiesPlugin;
use OCA\DAV\DAV\ViewOnlyPlugin;
use OCA\DAV\Files\BrowserErrorPagePlugin;
use OCA\DAV\Files\FileLocksBackend;
use OCP\Files\Mount\IMountManager;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\IRequest;
use OCP\ITagManager;
use OCP\IUserSession;
use Sabre\DAV\Auth\Backend\BackendInterface;
use OCP\AppFramework\Utility\ITimeFactory;

class ServerFactory {
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var IDBConnection */
	private $databaseConnection;
	/** @var IUserSession */
	private $userSession;
	/** @var IMountManager */
	private $mountManager;
	/** @var ITagManager */
	private $tagManager;
	/** @var IRequest */
	private $request;
	/** @var ITimeFactory */
	private $timeFactory;

	/**
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param IDBConnection $databaseConnection
	 * @param IUserSession $userSession
	 * @param IMountManager $mountManager
	 * @param ITagManager $tagManager
	 * @param IRequest $request
	 * @param ITimeFactory $timeFactory
	 */
	public function __construct(
		IConfig $config,
		ILogger $logger,
		IDBConnection $databaseConnection,
		IUserSession $userSession,
		IMountManager $mountManager,
		ITagManager $tagManager,
		IRequest $request,
		ITimeFactory $timeFactory
	) {
		$this->config = $config;
		$this->logger = $logger;
		$this->databaseConnection = $databaseConnection;
		$this->userSession = $userSession;
		$this->mountManager = $mountManager;
		$this->tagManager = $tagManager;
		$this->request = $request;
		$this->timeFactory = $timeFactory;
	}

	/**
	 * @param string $baseUri
	 * @param string $requestUri
	 * @param BackendInterface $authBackend
	 * @param callable $viewCallBack callback that should return the view for the dav endpoint
	 * @param bool $isPublicAccess whether DAV is accessed through a public link
	 * @return Server
	 */
	public function createServer($baseUri,
								 $requestUri,
								 BackendInterface $authBackend,
								 callable $viewCallBack,
								 $isPublicAccess = false) {
		// Fire up server
		$objectTree = new \OCA\DAV\Connector\Sabre\ObjectTree();
		$server = new \OCA\DAV\Connector\Sabre\Server($objectTree);
		// Set URL explicitly due to reverse-proxy situations
		$server->httpRequest->setUrl($requestUri);
		$server->setBaseUri($baseUri);

		// Load plugins
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\CorsPlugin($this->userSession));
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\MaintenancePlugin($this->config));
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\ValidateRequestPlugin('webdav'));
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\BlockLegacyClientPlugin($this->config));
		$server->addPlugin(new \Sabre\DAV\Auth\Plugin($authBackend));
		// FIXME: The following line is a workaround for legacy components relying on being able to send a GET to /
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\DummyGetResponsePlugin());
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\ExceptionLoggerPlugin('webdav', $this->logger));
		$server->addPlugin(new \OCA\DAV\Connector\Sabre\LockPlugin());
		$server->addPlugin(new \Sabre\DAV\Locks\Plugin(new FileLocksBackend($server->tree, true, $this->timeFactory, $isPublicAccess)));

		if (BrowserErrorPagePlugin::isBrowserRequest($this->request)) {
			$server->addPlugin(new BrowserErrorPagePlugin());
		}

		// wait with registering these until auth is handled and the filesystem is setup
		$server->on('beforeMethod:*', function () use ($server, $objectTree, $viewCallBack) {
			// ensure the skeleton is copied
			// Try to obtain User Folder
			$userFolder = \OC::$server->getUserFolder();

			/** @var \OC\Files\View $view */
			$view = $viewCallBack($server);
			if ($userFolder !== null) {
				// User folder exists and user is active and not anonymous
				$rootInfo = $userFolder->getFileInfo();
			} else {
				// User is anonymous or inactive, we need to get root info
				$rootInfo = $view->getFileInfo('');
			}

			// Create ownCloud Root
			if ($rootInfo->getType() === 'dir') {
				$root = new \OCA\DAV\Connector\Sabre\Directory($view, $rootInfo, $objectTree);
			} else {
				$root = new \OCA\DAV\Connector\Sabre\File($view, $rootInfo);
			}

			$objectTree->init($root, $view, $this->mountManager);

			$server->addPlugin(
				new \OCA\DAV\Connector\Sabre\FilesPlugin(
					$objectTree,
					$this->config,
					$this->request,
					false,
					!$this->config->getSystemValue('debug', false)
				)
			);
			$server->addPlugin(new \OCA\DAV\Connector\Sabre\QuotaPlugin($view));

			// Allow view-only plugin for webdav requests
			$server->addPlugin(new ViewOnlyPlugin(
				\OC::$server->getLogger()
			));

			if ($this->userSession->isLoggedIn()) {
				$server->addPlugin(new \OCA\DAV\Connector\Sabre\TagsPlugin($objectTree, $this->tagManager));
				$server->addPlugin(new \OCA\DAV\Connector\Sabre\SharesPlugin(
					$objectTree,
					$this->userSession,
					\OC::$server->getShareManager()
				));
				$server->addPlugin(new \OCA\DAV\Connector\Sabre\CommentPropertiesPlugin(\OC::$server->getCommentsManager(), $this->userSession));
				$server->addPlugin(new \OCA\DAV\Connector\Sabre\FilesReportPlugin(
					$objectTree,
					$view,
					\OC::$server->getSystemTagManager(),
					\OC::$server->getSystemTagObjectMapper(),
					\OC::$server->getTagManager(),
					$this->userSession,
					\OC::$server->getGroupManager(),
					$userFolder
				));
				$server->addPlugin(
					new \OCA\DAV\Connector\Sabre\FilesSearchReportPlugin(
						\OC::$server->getSearch()
					)
				);

				// custom properties plugin must be the last one
				$server->addPlugin(
					new FileCustomPropertiesPlugin(
						new FileCustomPropertiesBackend(
							$objectTree,
							$this->databaseConnection,
							$this->userSession->getUser()
						)
					)
				);
			}
			$server->addPlugin(new \OCA\DAV\Connector\Sabre\CopyEtagHeaderPlugin());
		}, 30); // priority 30: after auth (10) and acl(20), before lock(50) and handling the request
		return $server;
	}
}
