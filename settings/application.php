<?php
/**
 * @author Lukas Reschke
 * @copyright 2014 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Settings;

use OC\AppFramework\Utility\SimpleContainer;
use OC\Settings\Controller\ChangePasswordController;
use \OCP\AppFramework\App;

class Application extends App {


	public function __construct(array $urlParams=array()){
		parent::__construct('settings', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('ChangePasswordController', function(SimpleContainer $c) {
			return new ChangePasswordController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('ServerContainer')->getUserManager(),
				$c->query('ServerContainer')->getL10N('settings'),
				$c->query('ServerContainer')->getConfig(),
				$c->query('ServerContainer')->getUserSession(),
				$c->query('ServerContainer')->getGroupManager()
			);
		});
	}

}
