<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Citharel <tcit@tcit.fr>
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
namespace OCA\DAV;

use OC\Files\Filesystem;
use OCA\DAV\AppInfo\PluginManager;
use OCA\DAV\CalDAV\Schedule\IMipPlugin;
use OCA\DAV\CardDAV\ImageExportPlugin;
use OCA\DAV\Connector\Sabre\Auth;
use OCA\DAV\Connector\Sabre\BlockLegacyClientPlugin;
use OCA\DAV\Connector\Sabre\CommentPropertiesPlugin;
use OCA\DAV\Connector\Sabre\CopyEtagHeaderPlugin;
use OCA\DAV\Connector\Sabre\CorsPlugin;
use OCA\DAV\Connector\Sabre\DavAclPlugin;
use OCA\DAV\Connector\Sabre\DummyGetResponsePlugin;
use OCA\DAV\Connector\Sabre\FakeLockerPlugin;
use OCA\DAV\Connector\Sabre\FilesPlugin;
use OCA\DAV\Connector\Sabre\FilesReportPlugin;
use OCA\DAV\Connector\Sabre\MaintenancePlugin;
use OCA\DAV\Connector\Sabre\QuotaPlugin;
use OCA\DAV\Connector\Sabre\SharesPlugin;
use OCA\DAV\Connector\Sabre\TagsPlugin;
use OCA\DAV\Connector\Sabre\ValidateRequestPlugin;
use OCA\DAV\DAV\FileCustomPropertiesBackend;
use OCA\DAV\DAV\FileCustomPropertiesPlugin;
use OCA\DAV\DAV\LazyOpsPlugin;
use OCA\DAV\DAV\MiscCustomPropertiesBackend;
use OCA\DAV\DAV\PublicAuth;
use OCA\DAV\Files\BrowserErrorPagePlugin;
use OCA\DAV\Files\PreviewPlugin;
use OCA\DAV\JobStatus\Entity\JobStatusMapper;
use OCA\DAV\SystemTag\SystemTagPlugin;
use OCA\DAV\Upload\ChunkingPlugin;
use OCP\IRequest;
use OCP\SabrePluginEvent;
use Sabre\CardDAV\VCFExportPlugin;
use Sabre\DAV\Auth\Plugin;

class Server {

	/** @var Connector\Sabre\Server  */
	public $server;

	/** @var string */
	private $baseUri;
	/** @var IRequest */
	private $request;

	/**
	 * Server constructor.
	 *
	 * @param IRequest $request
	 * @param string $baseUri
	 * @throws \OCP\AppFramework\QueryException
	 * @throws \Sabre\DAV\Exception
	 */
	public function __construct(IRequest $request, $baseUri) {
		$this->request = $request;
		$this->baseUri = $baseUri;
		$logger = \OC::$server->getLogger();
		$dispatcher = \OC::$server->getEventDispatcher();

		$root = new RootCollection();
		$tree = new \OCA\DAV\Tree($root);
		$this->server = new \OCA\DAV\Connector\Sabre\Server($tree);

		$config = \OC::$server->getConfig();
		if ($config->getSystemValue('dav.enable.async', false)) {
			$this->server->addPlugin(new LazyOpsPlugin(
				\OC::$server->getUserSession(),
				\OC::$server->getURLGenerator(),
				\OC::$server->getShutdownHandler(),
				\OC::$server->query(JobStatusMapper::class),
				\OC::$server->getLogger()
			));
		}

		// Backends
		$authBackend = new Auth(
			\OC::$server->getSession(),
			\OC::$server->getUserSession(),
			\OC::$server->getRequest(),
			\OC::$server->getTwoFactorAuthManager(),
			\OC::$server->getAccountModuleManager()
		);

		// Set URL explicitly due to reverse-proxy situations
		$this->server->httpRequest->setUrl($this->request->getRequestUri());
		$this->server->setBaseUri($this->baseUri);

		$this->server->addPlugin(new MaintenancePlugin($config));
		$this->server->addPlugin(new ValidateRequestPlugin('dav'));
		$this->server->addPlugin(new BlockLegacyClientPlugin($config));
		$this->server->addPlugin(new CorsPlugin(\OC::$server->getUserSession()));
		$authPlugin = new Plugin();
		$authPlugin->addBackend(new PublicAuth());
		$this->server->addPlugin($authPlugin);

		// allow setup of additional auth backends
		$event = new SabrePluginEvent($this->server);
		$dispatcher->dispatch('OCA\DAV\Connector\Sabre::authInit', $event);

		// because we are throwing exceptions this plugin has to be the last one
		$authPlugin->addBackend($authBackend);

		// debugging
		if (\OC::$server->getConfig()->getSystemValue('debug', false)) {
			$this->server->addPlugin(new \Sabre\DAV\Browser\Plugin());
		} else {
			$this->server->addPlugin(new DummyGetResponsePlugin());
		}

		$this->server->addPlugin(new \OCA\DAV\Connector\Sabre\ExceptionLoggerPlugin('webdav', $logger));
		$this->server->addPlugin(new \OCA\DAV\Connector\Sabre\LockPlugin());
		$this->server->addPlugin(new \Sabre\DAV\Sync\Plugin());

		// ACL plugin not used in files subtree, also it causes issues
		// with performance and locking issues because it will query
		// every parent node which might trigger an implicit rescan in the
		// case of external storages with update detection
		if (!$this->isRequestForSubtree(['files'])) {
			// acl
			$acl = new DavAclPlugin();
			$acl->principalCollectionSet = [
				'principals/users', 'principals/groups'
			];
			$acl->defaultUsernamePath = 'principals/users';
			$this->server->addPlugin($acl);
		}

		// calendar plugins
		if ($this->isRequestForSubtree(['calendars', 'public-calendars', 'principals'])) {
			$mailer = \OC::$server->getMailer();
			$this->server->addPlugin(new \OCA\DAV\CalDAV\Plugin());
			$this->server->addPlugin(new \Sabre\CalDAV\ICSExportPlugin());
			$this->server->addPlugin(new \OCA\DAV\CalDAV\Schedule\Plugin());
			$this->server->addPlugin(new IMipPlugin($mailer, $logger, $request));
			$this->server->addPlugin(new \Sabre\CalDAV\Subscriptions\Plugin());
			$this->server->addPlugin(new \Sabre\CalDAV\Notifications\Plugin());
			$this->server->addPlugin(new DAV\Sharing\Plugin($authBackend, \OC::$server->getRequest()));
			$this->server->addPlugin(new \OCA\DAV\CalDAV\Publishing\PublishPlugin(
				\OC::$server->getConfig(),
				\OC::$server->getURLGenerator()
			));
		}

		// addressbook plugins
		if ($this->isRequestForSubtree(['addressbooks', 'principals'])) {
			$this->server->addPlugin(new DAV\Sharing\Plugin($authBackend, \OC::$server->getRequest()));
			$this->server->addPlugin(new \OCA\DAV\CardDAV\Plugin());
			$this->server->addPlugin(new VCFExportPlugin());
			$this->server->addPlugin(new ImageExportPlugin(\OC::$server->getLogger()));
		}

		// system tags plugins
		$this->server->addPlugin(new SystemTagPlugin(
			\OC::$server->getSystemTagManager(),
			\OC::$server->getGroupManager(),
			\OC::$server->getUserSession()
		));

		$this->server->addPlugin(new CopyEtagHeaderPlugin());
		$this->server->addPlugin(new ChunkingPlugin());

		// Some WebDAV clients do require Class 2 WebDAV support (locking), since
		// we do not provide locking we emulate it using a fake locking plugin.
		if ($request->isUserAgent([
			'/WebDAVFS/',
			'/OneNote/',
			'/Microsoft Office OneNote 2013/',
			'/Microsoft-WebDAV-MiniRedir/',
		])) {
			$this->server->addPlugin(new FakeLockerPlugin());
		}

		if (BrowserErrorPagePlugin::isBrowserRequest($request)) {
			$this->server->addPlugin(new BrowserErrorPagePlugin());
		}

		$this->server->addPlugin(new PreviewPlugin(\OC::$server->getTimeFactory(), \OC::$server->getPreviewManager()));
		// wait with registering these until auth is handled and the filesystem is setup
		$this->server->on('beforeMethod', function () use ($root) {
			// custom properties plugin must be the last one
			$userSession = \OC::$server->getUserSession();
			$user = $userSession->getUser();
			if ($user !== null) {
				$view = Filesystem::getView();
				$this->server->addPlugin(
					new FilesPlugin(
						$this->server->tree,
						\OC::$server->getConfig(),
						$this->request,
						false,
						!\OC::$server->getConfig()->getSystemValue('debug', false)
					)
				);

				if ($this->isRequestForSubtree(['files', 'uploads'])) {
					//For files only
					$filePropertiesPlugin = new FileCustomPropertiesPlugin(
						new FileCustomPropertiesBackend(
							$this->server->tree,
							\OC::$server->getDatabaseConnection(),
							\OC::$server->getUserSession()->getUser()
						)
					);
					$this->server->addPlugin($filePropertiesPlugin);
				} else {
					$miscPropertiesPlugin = new \Sabre\DAV\PropertyStorage\Plugin(
						new MiscCustomPropertiesBackend(
							$this->server->tree,
							\OC::$server->getDatabaseConnection(),
							\OC::$server->getUserSession()->getUser()
						)
					);
					$this->server->addPlugin($miscPropertiesPlugin);
				}

				if ($view !== null) {
					$this->server->addPlugin(
						new QuotaPlugin($view));
				}
				$this->server->addPlugin(
					new TagsPlugin(
						$this->server->tree, \OC::$server->getTagManager()
					)
				);
				// TODO: switch to LazyUserFolder
				$userFolder = \OC::$server->getUserFolder();
				$this->server->addPlugin(new SharesPlugin(
					$this->server->tree,
					$userSession,
					\OC::$server->getShareManager()
				));
				$this->server->addPlugin(new CommentPropertiesPlugin(
					\OC::$server->getCommentsManager(),
					$userSession
				));

				if ($view !== null) {
					$this->server->addPlugin(new FilesReportPlugin(
						$this->server->tree,
						$view,
						\OC::$server->getSystemTagManager(),
						\OC::$server->getSystemTagObjectMapper(),
						\OC::$server->getTagManager(),
						$userSession,
						\OC::$server->getGroupManager(),
						$userFolder
					));
				}
				$this->server->addPlugin(
					new \OCA\DAV\Connector\Sabre\FilesSearchReportPlugin(
						\OC::$server->getSearch()
					)
				);
			}

			// register plugins from apps
			$pluginManager = new PluginManager(
				\OC::$server,
				\OC::$server->getAppManager()
			);
			foreach ($pluginManager->getAppPlugins() as $appPlugin) {
				$this->server->addPlugin($appPlugin);
			}
			foreach ($pluginManager->getAppCollections() as $appCollection) {
				$root->addChild($appCollection);
			}
		});
	}

	public function exec() {
		$this->server->exec();
	}

	/**
	 * @param string[] $subTrees
	 * @return bool
	 */
	private function isRequestForSubtree(array $subTrees) {
		foreach ($subTrees as $subTree) {
			$subTree = \trim($subTree, " /");
			if (\strpos($this->server->getRequestUri(), "$subTree/") === 0) {
				return true;
			}
		}
		return false;
	}
}
