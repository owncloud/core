<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Georg Ehrke <georg@owncloud.com>
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

namespace OC;

use OC\Repair\Apps;
use OC\Repair\CleanTags;
use OC\Repair\Collation;
use OC\Repair\DisableExtraThemes;
use OC\Repair\DropOldJobs;
use OC\Repair\OldGroupMembershipShares;
use OC\Repair\RemoveGetETagEntries;
use OC\Repair\RemoveRootShares;
use OC\Repair\RepairMismatchFileCachePath;
use OC\Repair\RepairOrphanedSubshare;
use OC\Repair\RepairSubShares;
use OC\Repair\SharePropagation;
use OC\Repair\SqliteAutoincrement;
use OC\Repair\DropOldTables;
use OC\Repair\FillETags;
use OC\Repair\InnoDB;
use OC\Repair\RepairMimeTypes;
use OC\Repair\SearchLuceneTables;
use OC\Repair\UpdateOutdatedOcsIds;
use OC\Repair\RepairInvalidShares;
use OC\Repair\RepairUnmergedShares;
use OCP\AppFramework\QueryException;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use OC\Repair\MoveAvatarOutsideHome;

class Repair implements IOutput {
	/* @var IRepairStep[] */
	private $repairSteps;
	/** @var EventDispatcher */
	private $dispatcher;
	/** @var string */
	private $currentStep;

	/**
	 * Creates a new repair step runner
	 *
	 * @param IRepairStep[] $repairSteps array of RepairStep instances
	 * @param EventDispatcher $dispatcher
	 */
	public function __construct($repairSteps = [], EventDispatcher $dispatcher = null) {
		$this->repairSteps = $repairSteps;
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Run a series of repair steps for common problems
	 */
	public function run() {
		if (\count($this->repairSteps) === 0) {
			$this->emit('\OC\Repair', 'info', ['No repair steps available']);
			return;
		}
		// run each repair step
		foreach ($this->repairSteps as $step) {
			$this->currentStep = $step->getName();
			$this->emit('\OC\Repair', 'step', [$this->currentStep]);
			$step->run($this);
		}
	}

	/**
	 * Add repair step
	 *
	 * @param IRepairStep|string $repairStep repair step
	 * @throws \Exception
	 */
	public function addStep($repairStep) {
		if (\is_string($repairStep)) {
			try {
				$s = \OC::$server->query($repairStep);
			} catch (QueryException $e) {
				if (\class_exists($repairStep)) {
					$s = new $repairStep();
				} else {
					throw new \Exception("Repair step '$repairStep' is unknown");
				}
			}

			if ($s instanceof IRepairStep) {
				$this->repairSteps[] = $s;
			} else {
				throw new \Exception("Repair step '$repairStep' is not of type \\OCP\\Migration\\IRepairStep");
			}
		} else {
			$this->repairSteps[] = $repairStep;
		}
	}

	/**
	 * Returns the default repair steps to be run on the
	 * command line or after an upgrade.
	 *
	 * @return IRepairStep[]
	 */
	public static function getRepairSteps() {
		return [
			new RepairMimeTypes(\OC::$server->getConfig()),
			new RepairMismatchFileCachePath(
				\OC::$server->getDatabaseConnection(),
				\OC::$server->getMimeTypeLoader(),
				\OC::$server->getLogger(),
				\OC::$server->getConfig()),
			new FillETags(\OC::$server->getDatabaseConnection()),
			new CleanTags(\OC::$server->getDatabaseConnection(), \OC::$server->getUserManager()),
			new DropOldTables(\OC::$server->getDatabaseConnection()),
			new DropOldJobs(\OC::$server->getJobList()),
			new RemoveGetETagEntries(\OC::$server->getDatabaseConnection()),
			new UpdateOutdatedOcsIds(\OC::$server->getConfig()),
			new RepairInvalidShares(\OC::$server->getConfig(), \OC::$server->getDatabaseConnection()),
			new SharePropagation(\OC::$server->getConfig()),
			new MoveAvatarOutsideHome(
				\OC::$server->getConfig(),
				\OC::$server->getDatabaseConnection(),
				\OC::$server->getUserManager(),
				\OC::$server->getAvatarManager(),
				\OC::$server->getLazyRootFolder(),
				\OC::$server->getL10N('core'),
				\OC::$server->getLogger()
			),
			new RemoveRootShares(\OC::$server->getDatabaseConnection(), \OC::$server->getUserManager(), \OC::$server->getLazyRootFolder()),
			new RepairUnmergedShares(
				\OC::$server->getConfig(),
				\OC::$server->getDatabaseConnection(),
				\OC::$server->getUserManager(),
				\OC::$server->getGroupManager()
			),
			new DisableExtraThemes(
				\OC::$server->getAppManager(),
				\OC::$server->getConfig(),
				\OC::$server->getAppConfig()
			),
			new RepairSubShares(
				\OC::$server->getDatabaseConnection()
			),
		];
	}

	/**
	 * Returns expensive repair steps to be run on the
	 * command line with a special option.
	 *
	 * @return IRepairStep[]
	 */
	public static function getExpensiveRepairSteps() {
		return [
			new OldGroupMembershipShares(\OC::$server->getDatabaseConnection(), \OC::$server->getGroupManager()),
		];
	}

	/**
	 * Returns the repair steps to be run before an
	 * upgrade.
	 *
	 * @return IRepairStep[]
	 */
	public static function getBeforeUpgradeRepairSteps() {
		$connection = \OC::$server->getDatabaseConnection();
		$steps = [
			new InnoDB(),
			new Collation(\OC::$server->getConfig(), $connection),
			new SqliteAutoincrement($connection),
			new RepairOrphanedSubshare($connection),
			new SearchLuceneTables(),
			new Apps(\OC::$server->getAppManager(), \OC::$server->getEventDispatcher(), \OC::$server->getConfig(), new \OC_Defaults()),
		];

		//There is no need to delete all previews on every single update
		//only 7.0.0 through 7.0.2 generated broken previews
		$currentVersion = \OC::$server->getConfig()->getSystemValue('version');
		if (\version_compare($currentVersion, '7.0.0.0', '>=') &&
			\version_compare($currentVersion, '7.0.3.4', '<=')) {
			$steps[] = new \OC\Repair\Preview();
		}

		return $steps;
	}

	/**
	 * @param string $scope
	 * @param string $method
	 * @param array $arguments
	 */
	public function emit($scope, $method, array $arguments = []) {
		if ($this->dispatcher !== null) {
			$this->dispatcher->dispatch("$scope::$method",
				new GenericEvent("$scope::$method", $arguments));
		}
	}

	public function info($string) {
		// for now just emit as we did in the past
		$this->emit('\OC\Repair', 'info', [$string]);
	}

	/**
	 * @param string $message
	 */
	public function warning($message) {
		// for now just emit as we did in the past
		$this->emit('\OC\Repair', 'warning', [$message]);
	}

	/**
	 * @param int $max
	 */
	public function startProgress($max = 0) {
		// for now just emit as we did in the past
		$this->emit('\OC\Repair', 'startProgress', [$max, $this->currentStep]);
	}

	/**
	 * @param int $step
	 * @param string $description
	 */
	public function advance($step = 1, $description = '') {
		// for now just emit as we did in the past
		$this->emit('\OC\Repair', 'advance', [$step, $description]);
	}

	/**
	 * emit signal
	 */
	public function finishProgress() {
		// for now just emit as we did in the past
		$this->emit('\OC\Repair', 'finishProgress', []);
	}
}
