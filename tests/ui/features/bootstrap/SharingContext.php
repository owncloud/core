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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Page\FilesPage;
use Page\SharingDialog;

require_once 'bootstrap.php';

/**
 * SharingContext context.
 */
class SharingContext extends RawMinkContext implements Context
{
	private $filesPage;
	private $sharingDialog;
	private $regularUserName;
	private $regularUserNames;
	private $regularGroupName;
	private $regularGroupNames;

	public function __construct(FilesPage $filesPage)
	{
		$this->filesPage = $filesPage;
	}

	/**
	 * @Given the file/folder :folder is shared with the user :user
	 */
	public function theFileFolderIsSharedWithTheUser($folder, $user)
	{
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$folder, $this->getSession()
		);
		$this->sharingDialog->shareWithUser($user, $this->getSession());
	}

	/**
	 * @Given the file/folder :folder is shared with the group :group
	 */
	public function theFileFolderIsSharedWithTheGroup($folder, $group)
	{
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$folder, $this->getSession()
		);
		$this->sharingDialog->shareWithGroup($group, $this->getSession());
	}

	/**
	 * @Given the share dialog for the file/folder :name is open
	 */
	public function theShareDialogForTheFileFolderIsOpen($name)
	{
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name, $this->getSession()
		);
	}

	/**
	 * @Given I type :input in the share-with-field
	 */
	public function iTypeInTheShareWithField($input)
	{
		$this->sharingDialog->fillShareWithField($input, $this->getSession());
	}

	/**
	 * @Then all users and groups that contain the string :requiredString in their name should be listed in the autocomplete list
	 */
	public function allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteList($requiredString)
	{
		$this->allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept($requiredString, '', '');
	}

	/**
	 * @Then all users and groups that contain the string :requiredString in their name should be listed in the autocomplete list except :userOrGroup :notToBeListed
	 */
	public function allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept($requiredString, $userOrGroup, $notToBeListed)
	{
		if ($userOrGroup === 'group') {
			$notToBeListed = $this->sharingDialog->groupStringsToMatchAutoComplete($notToBeListed);
		}
		$autocompleteItems = $this->sharingDialog->getAutocompleteItemsList();
		foreach (
			array_merge(
				$this->regularUserNames,
				$this->sharingDialog->groupStringsToMatchAutoComplete($this->regularGroupNames)
			) as $regularUserOrGroup ) {

			if (strpos($regularUserOrGroup, $requiredString) !== false
				&& $regularUserOrGroup !== $notToBeListed) {
				PHPUnit_Framework_Assert::assertContains(
					$regularUserOrGroup,
					$autocompleteItems,
					"'" . $regularUserOrGroup . "' not in autocomplete list");
			}
		}
		PHPUnit_Framework_Assert::assertNotContains(
			$notToBeListed,
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then my own name should not be listed in the autocomplete list
	 */
	public function myOwnNameShouldNotBeListedInTheAutocompleteList()
	{
		PHPUnit_Framework_Assert::assertNotContains(
			$this->regularUserName,
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then a tooltip with the text :text should be shown near the share-with-field
	 */
	public function aTooltipWithTheTextShouldBeShownNearTheShareWithField($text)
	{
		PHPUnit_Framework_Assert::assertEquals(
			$text, 
			$this->sharingDialog->getShareWithTooltip()
		);
	}

	/**
	 * @Then the autocomplete list should not be displayed
	 */
	public function theAutocompleteListShouldNotBeDisplayed()
	{
		PHPUnit_Framework_Assert::assertEmpty(
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @BeforeScenario
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 */
	public function before(BeforeScenarioScope $scope)
	{
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$featureContext = $environment->getContext('FeatureContext');
		$this->regularUserNames = $featureContext->getRegularUserNames();
		$this->regularUserName = $featureContext->getRegularUserName();
		$this->regularGroupNames = $featureContext->getRegularGroupNames();
		$this->regularGroupName = $featureContext->getRegularGroupName();
	}
}
