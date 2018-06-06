<?php
/**
 * @author Noveen Sachdeva "noveen.sachdeva@research.iiit.ac.in"
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
 */

namespace OC\Settings\Panels\Personal;

use OCP\IURLGenerator;
use OCP\IUserSession;
use OCP\IConfig;
use OCP\Settings\ISettings;
use OCP\Template;

class Cors implements ISettings {

	/**
	 * @var IUserSession
	 */
	protected $userSession;

	/**
	 * @var IURLGenerator
	 */
	protected $urlGenerator;

	/** @var IConfig */
	private $config;

	public function __construct(
		IUserSession $userSession,
		IURLGenerator $urlGenerator,
		IConfig $config) {
		$this->config = $config;
		$this->userSession = $userSession;
		$this->urlGenerator = $urlGenerator;
	}

	public function getSectionID() {
		return 'security';
	}

	/**
	 * @return Template
	 */
	public function getPanel() {
		$userId = $this->userSession->getUser()->getUID();
		$domains = \json_decode($this->config->getUserValue($userId, 'core', 'domains', '[]'), true);

		$t = new Template('settings', 'panels/personal/cors');
		$t->assign('user_id', $userId);
		$t->assign('domains', $domains);
		$t->assign('urlGenerator', $this->urlGenerator);
		return $t;
	}

	public function getPriority() {
		return 20;
	}
}
