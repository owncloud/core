<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Lukas Reschke <lukas@statuscode.ch>
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

namespace OC\Settings\Controller;

use \OCP\Settings\ISettingsManager;
use \OCP\AppFramework\Controller;
use \OCP\IURLGenerator;
use \OCP\IRequest;
use \OCP\AppFramework\Http\TemplateResponse;


/**
 * @package OC\Settings\Controller
 */
class SettingsPageController extends Controller {

	/** @var ISettingsManager */
	private $settingsManager;

	/** @var IURLGenerator */
	private $urlGenerator;
	/**
	 * @param string $appName
	 * @param IRequest $request
   * @param ISettingsManager $settingsManager
	 */
	public function __construct($appName,
								IRequest $request,
                ISettingsManager $settingsManager,
								IURLGenerator $urlGenerator) {
		parent::__construct($appName, $request);
    $this->settingsManager = $settingsManager;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
  public function getPersonal($sectionID) {
		$this->currentSectionID = $sectionID;
		return $this->createSettingsPage('personal');
  }

	/**
	 * @NoCSRFRequired
	 */
	public function getAdmin($sectionID) {
		$this->currentSectionID = $sectionID;
		return $this->createSettingsPage('admin');
  }

	protected function createSettingsPage($type) {
		// Load sections and panels
		if($type == 'personal') {
			$sections = $this->settingsManager->getPersonalSections();
			$panels = $this->settingsManager->getPersonalPanels($this->currentSectionID);
		} else if($type == 'admin') {
			$sections = $this->settingsManager->getAdminSections();
			$panels = $this->settingsManager->getAdminPanels($this->currentSectionID);
		}
		// Init the template
		// Generate the html and nav params
		$params = [];
		$params['panelsContent'] = $this->getPanelsHtml($panels);
		$params['nav'] = $this->getNavigation($sections, $this->currentSectionID, $type);
		// Send the response
		$response = new TemplateResponse($this->appName, 'settingsPage', $params);
		return $response;

	}

	protected function getNavigation($sections, $currentSectionID, $type) {
		$nav = [];
		// Iterate through sections and get id, name and see if currently active
		foreach($sections as $section) {
			$nav[] = [
				'id' => $section->getID(),
				'name' => ucfirst($section->getName()),
				'active' => $section->getID() === $currentSectionID,
				'link' => $this->urlGenerator->linkToRoute('settings.PageController.'.$type, ['sectionid' => $section->getID()])
			];
		}
		return $nav;
	}

	/**
	 * Iterate through the panels and retrieve the html content
	 */
	protected function getPanelsHtml($panels) {
		$html = '';
		foreach($panels as $panel) {
			$html .= $panel->getForm()->renderAs('')->render();
		}
		return $html;
	}

}
