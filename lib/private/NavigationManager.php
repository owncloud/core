<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OC;

use OCP\App\IAppManager;
use OCP\INavigationManager;
use OCP\IURLGenerator;
use OCP\L10N\IFactory;

/**
 * Manages the ownCloud navigation
 */
class NavigationManager implements INavigationManager {
	protected $entries = [];
	protected $closureEntries = [];
	protected $activeEntry;
	protected $init = false;
	/** @var IAppManager */
	protected $appManager;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IFactory */
	private $l10nFac;

	function __construct(IAppManager $appManager = null, $urlGenerator = null, $l10nFac = null) {
		$this->appManager = $appManager;
		$this->urlGenerator = $urlGenerator;
		$this->l10nFac = $l10nFac;

	}

	/**
	 * Creates a new navigation entry
	 *
	 * @param array|\Closure $entry Array containing: id, name, order, icon and href key
	 *					The use of a closure is preferred, because it will avoid
	 * 					loading the routing of your app, unless required.
	 * @return void
	 */
	public function add($entry) {
		if ($entry instanceof \Closure) {
			$this->closureEntries[] = $entry;
			return;
		}

		$entry['active'] = false;
		if(!isset($entry['icon'])) {
			$entry['icon'] = '';
		}
		$this->entries[] = $entry;
	}

	/**
	 * returns all the added Menu entries
	 * @return array an array of the added entries
	 */
	public function getAll() {
		$this->init();
		foreach ($this->closureEntries as $c) {
			$this->add($c());
		}
		$this->closureEntries = [];
		return $this->entries;
	}

	/**
	 * removes all the entries
	 */
	public function clear() {
		$this->entries = [];
		$this->closureEntries = [];
		$this->init = false;
	}

	/**
	 * Sets the current navigation entry of the currently running app
	 * @param string $id of the app entry to activate (from added $entry)
	 */
	public function setActiveEntry($id) {
		$this->activeEntry = $id;
	}

	/**
	 * gets the active Menu entry
	 * @return string id or empty string
	 *
	 * This function returns the id of the active navigation entry (set by
	 * setActiveEntry
	 */
	public function getActiveEntry() {
		return $this->activeEntry;
	}

	private function init() {
		if ($this->init) {
			return;
		}
		$this->init = true;
		if (is_null($this->appManager)) {
			return;
		}
		foreach ($this->appManager->getInstalledApps() as $app) {
			// load plugins and collections from info.xml
			$info = $this->appManager->getAppInfo($app);
			if (!isset($info['navigation'])) {
				continue;
			}
			$nav = $info['navigation'];
			if (!isset($nav['route'])) {
				continue;
			}
			$l = $this->l10nFac->get($app);
			$order = isset($nav['order']) ? $nav['order'] : 100;
			$route = $this->urlGenerator->linkToRoute($nav['route']);
			$name = isset($nav['name']) ? $nav['name'] : ucfirst($app);
			$icon = null;
			foreach ([$nav['icon'], 'app.svg', "$app.svg"] as $i) {
				if (is_null($i)) {
					continue;
				}
				try {
					$icon = $this->urlGenerator->imagePath($app, $i);
					break;
				} catch (\RuntimeException $ex) {
				}
			}
			if (is_null($icon)) {
				$icon = $this->urlGenerator->imagePath('core', 'default-app-icon');
			}

			$this->add([
				'id' => $app,
				'order' => $order,
				'href' => $route,
				'icon' => $icon,
				'name' => $l->t($name),
			]);
		}
	}
}
