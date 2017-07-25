<?php

/**
 * ownCloud
 *
 * @author Artur Neumann
 * @copyright 2017 Artur Neumann info@individual-it.net
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Behat\Mink\Session;

class PersonalGeneralSettingsPage extends OwncloudPage
{
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/personal?sectionid=general';
	protected $languageSelectId = "languageinput";
	protected $personalProfilePanelId = "OC\Settings\Panels\Personal\Profile";
	
	public function changeLanguage($language)
	{
		$this->selectFieldOption($this->languageSelectId, $language);
	}

	//there is no reliable loading indicator on the personal general settings page, so just wait for
	//the personal profile panel to be there.
	public function waitTillPageIsLoaded(Session $session, $timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC)
	{
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if ($this->findById($this->personalProfilePanelId) !== null) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
		}
		$this->waitForOutstandingAjaxCalls($session);
	}
}