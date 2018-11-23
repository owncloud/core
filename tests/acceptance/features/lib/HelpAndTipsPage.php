<?php

/**
 * ownCloud
 *
 * @author Dipak Acharya <dipak@jankaritech.com>
 * @copyright Copyright (c) 2018 Dipak Acharya dipak@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace Page;

use Behat\Mink\Element\NodeElement;

/**
 * Admin General Settings page.
 */
class HelpAndTipsPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/admin?sectionid=help';

	protected $linkXpath = "//div[@id='admin-tips']/ul/li/a[contains(text(),'%s')]";

	/**
	 * return xpath of link with given title
	 *
	 * @param string $linkTitle
	 *
	 * @return string
	 */
	public function getLinkXpath($linkTitle) {
		return \sprintf($this->linkXpath, $linkTitle);
	}

	/**
	 * return link element by given title
	 *
	 * @param string $linkTitle
	 *
	 * @return NodeElement
	 */
	public function getLinkByTitle($linkTitle) {
		$linkElement = $this->find('xpath', $this->getLinkXpath($linkTitle));
		return $linkElement;
	}

	/**
	 * return link url element by given title
	 *
	 * @param string $linkTitle
	 *
	 * @return string
	 */
	public function getLinkUrlByTitle($linkTitle) {
		return $this->getLinkByTitle($linkTitle)->getAttribute("href");
	}
}
