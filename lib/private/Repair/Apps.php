<?php
/**
 * @author Victor Dubiniuk <dubiniuk@aheadworks.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OC\Repair;

use OC_App;
use OCP\App\IAppManager;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class Apps implements IRepairStep {

	/** @var  IAppManager */
	private $appManager;

	/** @var  EventDispatcher */
	private $eventDispatcher;

	/**
	 * Apps constructor.
	 *
	 * @param IAppManager $appManager
	 */
	public function __construct(IAppManager $appManager, EventDispatcher $eventDispatcher) {
		$this->appManager = $appManager;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'Put back missing apps';
	}

	/**
	 * @param IOutput $output
	 */
	public function run(IOutput $output) {
		$missingApps = $this->getMissingApps();
		if (count($missingApps)){
			$isMarketEnabled = $this->appManager->isEnabledForUser('market');
			if ($isMarketEnabled){
				$this->loadApp('market');
				foreach ($missingApps as $app) {
					$output->info("Repairing missing app: $app");
					$this->eventDispatcher->dispatch(
						IRepairStep::class . '::repairAppStoreApps',
						new GenericEvent($app)
					);
					$this->appManager->enableApp($app);
				}
			}
		}
	}

	/**
	 * @return array
	 */
	private function getMissingApps(){
		$installedApps = $this->appManager->getInstalledApps();
		$missingApps = [];
		foreach ($installedApps as $appId){
			$info = $this->appManager->getAppInfo($appId);
			if (!isset($info['id']) || is_null($info['id'])){
				$missingApps[] = $appId;
			}
		}
		return $missingApps;
	}

	/**
	 * @codeCoverageIgnore
	 * @param $app
	 * @throws NeedsUpdateException
	 */
	protected function loadApp($app) {
		OC_App::loadApp($app, false);
	}
}
