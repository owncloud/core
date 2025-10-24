<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use PHPUnit\Framework\Assert;
use Tests\Acceptance\Page\OwncloudPage;

require_once 'bootstrap.php';

/**
 * WebUIUser context.
 * Context for steps associated with the user logged in to the WebUI
 */
class WebUIUserContext extends RawMinkContext implements Context {
	private OwncloudPage $owncloudPage;

	/**
	 * WebUIUserContext constructor.
	 *
	 * @param OwncloudPage $owncloudPage
	 */
	public function __construct(OwncloudPage $owncloudPage) {
		$this->owncloudPage = $owncloudPage;
	}

	/**
	 * @Then :displayname should be shown as the name of the current user on the webUI
	 *
	 * @param string $displayname
	 *
	 * @return void
	 */
	public function displayNameOfTheCurrentUserOnTheWebUiShouldBe(string $displayname):void {
		$actualUserName = $this->owncloudPage->getMyDisplayname();
		Assert::assertSame(
			$displayname,
			$actualUserName,
			"displayed username should be '$displayname' but it is '$actualUserName'"
		);
	}

	/**
	 * @Then /^the display name should (not|)\s?be visible on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function displayNameOfTheCurrentUserShouldBeVisibleOnTheWebUI(
		string $shouldOrNot
	):void {
		$should = ($shouldOrNot !== "not");
		if ($should) {
			Assert::assertTrue(
				$this->owncloudPage->isDisplaynameVisible(),
				"displayname should be visible, but is not"
			);
		} else {
			Assert::assertFalse(
				$this->owncloudPage->isDisplaynameVisible(),
				"displayname should not be visible, but is"
			);
		}
	}

	/**
	 * @Then /^(no|an) avatar should be shown for the current user on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function avatarShouldBeShownOnTheWebUI(string $shouldOrNot):void {
		$should = ($shouldOrNot !== "no");
		if ($should) {
			Assert::assertTrue(
				$this->owncloudPage->isAvatarVisible(),
				"avatar should be visible, but is not"
			);
		} else {
			Assert::assertFalse(
				$this->owncloudPage->isAvatarVisible(),
				"avatar should not be visible, but is"
			);
		}
	}
}
