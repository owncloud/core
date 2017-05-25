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

class PersonalSecuritySettingsPage extends OwncloudPage
{
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/personal?sectionid=security';

	protected $createNewAppFormId = 'app-password-form';
	protected $appPasswordNameInputId = 'app-password-name';
	protected $createNewAppPasswordButtonId = 'add-app-password';
	protected $linkedAppsTrXpath = './/*[@id="apppasswords"]/table/tbody/tr';
	protected $linkedAppNameXpath = '//span[@class="token-name"]';
	protected $disconnectButtonXpath = '//*[@data-original-title="Disconnect"]';
	protected $createNewAppPasswordLoadingIndicatorClass = 'icon-loading-small';

	/**
	 * created a new app password for the app named $appName
	 * @param string $appName
	 */
	public function createNewAppPassword($appName)
	{
		$this->fillField($this->appPasswordNameInputId, $appName);
		$this->findById($this->createNewAppPasswordButtonId)->click();
		$createNewAppPasswordButton = $this->findById($this->createNewAppPasswordButtonId);

		while (strpos(
			$createNewAppPasswordButton->getAttribute("class"),
			$this->createNewAppPasswordLoadingIndicatorClass) !== false )
		{
			usleep(STANDARDSLEEPTIMEMICROSEC);
		}

	}

	/**
	 * finds and returns the TR NodeElement of the app
	 * throws Exception if App could not be found in list
	 *
	 * @param string $appName
	 * @throws \Exception
	 * @return \Behat\Mink\Element\NodeElement
	 */
	public function getLinkedAppByName($appName)
	{
		$appTrs = $this->findAll("xpath", $this->linkedAppsTrXpath);
		foreach ( $appTrs as $appTr ) {
			$app = $appTr->find("xpath", $this->linkedAppNameXpath);
			if ($app->getText() === $appName) {
				return $appTr;
			}
		}
		throw new \Exception("Could not find app '$appName'");
	}

	/**
	 * Takes a TR NodeElement and looks for the disconnect button in it
	 * returns the NodeElement of the button if found, else NULL
	 *
	 * @param \Behat\Mink\Element\NodeElement $tr
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 */
	public function getDisconnectButton(\Behat\Mink\Element\NodeElement $tr)
	{
		return $tr->find("xpath", $this->disconnectButtonXpath);
	}

	/**
	 * finds the result fields of the new app password and returns an array of [login-name,password]
	 * @return \Behat\Mink\Element\NodeElement[]|NULL[]
	 */
	public function getAppPasswordResult()
	{
		return array (
				$this->findField("new-app-login-name"),
				$this->findField("new-app-password")
		);
	}
}