<?php
/**
 * @author Lukas Reschke
 * @copyright 2014 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing;

use OC\AppFramework\Utility\SimpleContainer;
use OCA\Files_Sharing\Controllers\ExternalSharesController;
use OCA\Files_Sharing\Controllers\ShareController;
use OCA\Files_Sharing\Middleware\SharingCheckMiddleware;
use \OCP\AppFramework\App;

/**
 * @package OCA\Files_Sharing
 */
class Application extends App {


	/**
	 * @param array $urlParams
	 */
	public function __construct(array $urlParams=array()){
		parent::__construct('files_sharing', $urlParams);

		$container = $this->getContainer();
		$server = $container->getServer();
		/**
		 * Controllers
		 */
		$container->registerService('ShareController', function(SimpleContainer $c) {
			return new ShareController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('UserSession'),
				$c->query('OCP\IAppConfig'),
				$c->query('OCP\IConfig'),
				$c->query('URLGenerator'),
				$c->query('OCP\IUserManager'),
				$c->query('OCP\ILogger'),
				$c->query('OCP\Activity\IManager')
			);
		});
		$container->registerService('ExternalSharesController', function(SimpleContainer $c) {
			return new ExternalSharesController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('IsIncomingShareEnabled'),
				$c->query('ExternalManager')
			);
		});

		/**
		 * Core class wrappers
		 */
		$container->registerService('UserSession', function(SimpleContainer $c) {
			return $c->query('OCP\IUserSession');
		});
		$container->registerService('URLGenerator', function(SimpleContainer $c) {
			return $c->query('OCP\IURLGenerator');
		});
		$container->registerService('IsIncomingShareEnabled', function(SimpleContainer $c) {
			return Helper::isIncomingServer2serverShareEnabled();
		});
		$container->registerService('ExternalManager', function(SimpleContainer $c) use ($server) {
			return new \OCA\Files_Sharing\External\Manager(
				$c->query('OCP\IDBConnection'),
				\OC\Files\Filesystem::getMountManager(),
				\OC\Files\Filesystem::getLoader(),
				$c->query('OCP\IUserSession'),
				$server->getHTTPHelper()
			);
		});

		/**
		 * Middleware
		 */
		$container->registerService('SharingCheckMiddleware', function(SimpleContainer $c) {
			return new SharingCheckMiddleware(
				$c->query('AppName'),
				$c->query('OCP\IConfig'),
				$c->query('OCP\\IAppManager')
			);
		});

		// Execute middlewares
		$container->registerMiddleware('SharingCheckMiddleware');
	}

}
