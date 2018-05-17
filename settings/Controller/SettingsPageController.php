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

namespace OC\Settings\Controller;

use OCP\Settings\ISettings;
use OCP\Settings\ISettingsManager;
use OCP\AppFramework\Controller;
use OCP\IURLGenerator;
use OCP\IRequest;
use OCP\Template;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IGroupManager;
use OCP\IUserSession;

/**
 * @package OC\Settings\Controller
 */
class SettingsPageController extends Controller {

	/** @var ISettingsManager */
	protected $settingsManager;
	/** @var IURLGenerator */
	protected $urlGenerator;
	/** @var IGroupManager */
	protected $groupManager;
	/** @var IUserSession */
	protected $userSession;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param ISettingsManager $settingsManager
	 * @param IURLGenerator $urlGenerator
	 * @param IGroupManager $groupManager
	 * @param IUserSession $userSession
	 */
	public function __construct($appName,
								IRequest $request,
								ISettingsManager $settingsManager,
								IURLGenerator $urlGenerator,
								IGroupManager $groupManager,
								IUserSession $userSession) {
		parent::__construct($appName, $request);
		$this->settingsManager = $settingsManager;
		$this->urlGenerator = $urlGenerator;
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
	}

	/**
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 * @NoCSRFRequired
	 * @param string $sectionid
	 * @return \OCP\AppFramework\Http\TemplateResponse
	 */
	public function getPersonal($sectionid='general') {
		$admin = $this->groupManager->isAdmin($this->userSession->getUser()->getUID());
		$personalSections = $this->settingsManager->getPersonalSections();
		$adminSections = $admin ? $this->settingsManager->getAdminSections() : [];
		$panels = $this->settingsManager->getPersonalPanels($sectionid);
		$params = [];
		$params['type'] = 'personal';
		$params['personalNav'] = $this->getNavigation($personalSections, $sectionid, 'personal');
		$params['adminNav'] = $admin ? $this->getNavigation($adminSections, '', 'admin') : [];
		$params['panels'] = $this->getPanelsData($panels);
		$response = new TemplateResponse($this->appName, 'settingsPage', $params);
		return $response;
	}

	/**
	 * Creates the admin settings page
	 * @NoCSRFRequired
	 * @param string $sectionid
	 * @return \OCP\AppFramework\Http\TemplateResponse
	 */
	public function getAdmin($sectionid='general') {
		$personalSections = $this->settingsManager->getPersonalSections();
		$adminSections = $this->settingsManager->getAdminSections();
		$panels = $this->settingsManager->getAdminPanels($sectionid);
		$params = [];
		$params['type'] = 'admin';
		$params['personalNav'] = $this->getNavigation($personalSections, '', 'personal');
		$params['adminNav'] = $this->getNavigation($adminSections, $sectionid, 'admin');
		$params['panels'] = $this->getPanelsData($panels);
		$response = new TemplateResponse($this->appName, 'settingsPage', $params);
		return $response;
	}

	/**
	 * Gets the icon for the settings panel. The idea is
	 * to get either URL or the icon name ( for backward
	 * compatibility ). The icons returned will be svg
	 * format and no other formats are supported.
	 *
	 * @param \OCP\Settings\ISection $section
	 * @return string
	 */

	protected function getIconForSettingsPanel($section) {
		$icon = $section->getIconName() . '.svg';
		$appPath = \OC_App::getAppPath($section->getID());

		if (\file_exists($appPath . '/img/' . $icon)) {
			$icon = $this->urlGenerator->imagePath($section->getID(), $icon);
		} else {
			$icon = $section->getIconName();
		}

		return $icon;
	}

	/**
	 * Gets an array used to generate the navigation in the UI
	 * @param array $sections array of ISections
	 * @param string $currentSectionID
	 * @param string $type
	 * @return array
	 */
	protected function getNavigation($sections, $currentSectionID, $type) {
		$nav = [];
		// Iterate through sections and get id, name and see if currently active
		foreach ($sections as $section) {
			$icon = $this->getIconForSettingsPanel($section);

			$nav[] = [
				'id' => $section->getID(),
				'link' => $this->urlGenerator->linkToRoute(
					'settings.SettingsPage.get'.\ucwords($type),
					['sectionid' => $section->getID()]
				),
				'name' => \ucfirst($section->getName()),
				'active' => $section->getID() === $currentSectionID,
				'icon' => $icon
			];
		}
		return $nav;
	}

	/**
	 * Iterate through the panels and retrieve the html content
	 * @param ISettings[] $panels array of ISettings
	 * @return array containing panel html
	 */
	protected function getPanelsData($panels) {
		$data = [];
		foreach ($panels as $panel) {
			$template = $panel->getPanel();
			if ($template instanceof Template || $template instanceof TemplateResponse) {
				$data[] = [
					'id' => \get_class($panel),
					'content' => ($template instanceof Template) ? $template->fetchPage() : $template->render()
				];
			}
		}
		return $data;
	}
}
