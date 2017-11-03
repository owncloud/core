<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Page\FilesPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

require_once 'bootstrap.php';

/**
 * SharingContext context.
 */
class SharingContext extends RawMinkContext implements Context {

	private $filesPage;
	private $sharingDialog;
	private $regularUserName;
	private $regularUserNames;
	private $regularGroupName;
	private $regularGroupNames;
	private $featureContext;

	/**
	 * SharingContext constructor.
	 *
	 * @param FilesPage $filesPage
	 */
	public function __construct(FilesPage $filesPage) {
		$this->filesPage = $filesPage;
	}

	/**
	 * @Given /^the (?:file|folder) "([^"]*)" is shared with the (?:(remote)\s)?user "([^"]*)"$/
	 * @param string $folder
	 * @param string $remote
	 * @param string $user
	 * @return void
	 */
	public function theFileFolderIsSharedWithTheUser($folder, $remote, $user) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$folder, $this->getSession()
		);
		$user = $this->featureContext->substituteInLineCodes($user);
		if ($remote === "remote") {
			$this->sharingDialog->shareWithRemoteUser($user, $this->getSession());
		} else {
			$this->sharingDialog->shareWithUser($user, $this->getSession());
		}
		$this->iCloseTheShareDialog();
	}

	/**
	 * @Given the file/folder :folder is shared with the group :group
	 * @param string $folder
	 * @param string $group
	 * @return void
	 */
	public function theFileFolderIsSharedWithTheGroup($folder, $group) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$folder, $this->getSession()
		);
		$this->sharingDialog->shareWithGroup($group, $this->getSession());
		$this->iCloseTheShareDialog();
	}

	/**
	 * @Given the share dialog for the file/folder :name is open
	 * @param string $name
	 * @return void
	 */
	public function theShareDialogForTheFileFolderIsOpen($name) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name, $this->getSession()
		);
	}

	/**
	 * @Given I close the share dialog
	 * @return void
	 */
	public function iCloseTheShareDialog() {
		$this->sharingDialog->closeSharingDialog();
	}

	/**
	 * @Given I type :input in the share-with-field
	 * @param string $input
	 * @return void
	 */
	public function iTypeInTheShareWithField($input) {
		$this->sharingDialog->fillShareWithField($input, $this->getSession());
	}

	/**
	 * @Given the sharing permissions of :userName for :fileName are set to
	 * @param string $userName
	 * @param string $fileName
	 * @param TableNode $permissionsTable table with two columns and no heading
	 *                                    first column one of the permissions
	 *                                    (share|edit|create|change|delete)
	 *                                    second column yes|no
	 *                                    not mentioned permissions will not be
	 *                                    touched
	 * @return void
	 */
	public function theSharingPermissionsOfAreSetTo(
		$userName, $fileName, TableNode $permissionsTable
	) {
		$userName = $this->featureContext->substituteInLineCodes($userName);
		$this->theShareDialogForTheFileFolderIsOpen($fileName);
		$this->sharingDialog->setSharingPermissions(
			$userName, $permissionsTable->getRowsHash()
		);
	}

	/**
	 * @When the offered remote shares are accepted
	 * @return void
	 */
	public function theOfferedRemoteSharesAreAccepted() {
		foreach (array_reverse($this->filesPage->getOcDialogs()) as $ocDialog) {
			$ocDialog->accept($this->getSession());
		}
	}

	/**
	 * @Then all users and groups that contain the string :requiredString in their name should be listed in the autocomplete list
	 * @param string $requiredString
	 * @return void
	 */
	public function allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteList(
		$requiredString
	) {
		$this->allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept(
			$requiredString, '', ''
		);
	}

	/**
	 * @Then all users and groups that contain the string :requiredString in their name should be listed in the autocomplete list except :userOrGroup :notToBeListed
	 * @param string $requiredString
	 * @param string $userOrGroup
	 * @param string $notToBeListed
	 * @return void
	 */
	public function allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept(
		$requiredString, $userOrGroup, $notToBeListed
	) {
		if ($userOrGroup === 'group') {
			$notToBeListed
				= $this->sharingDialog->groupStringsToMatchAutoComplete($notToBeListed);
		}
		$autocompleteItems = $this->sharingDialog->getAutocompleteItemsList();
		foreach (
			array_merge(
				$this->regularUserNames,
				$this->sharingDialog->groupStringsToMatchAutoComplete(
					$this->regularGroupNames
				)
			) as $regularUserOrGroup ) {

			if (strpos($regularUserOrGroup, $requiredString) !== false
				&& $regularUserOrGroup !== $notToBeListed
			) {
				PHPUnit_Framework_Assert::assertContains(
					$regularUserOrGroup,
					$autocompleteItems,
					"'" . $regularUserOrGroup . "' not in autocomplete list"
				);
			}
		}
		PHPUnit_Framework_Assert::assertNotContains(
			$notToBeListed,
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then my own name should not be listed in the autocomplete list
	 * @return void
	 */
	public function myOwnNameShouldNotBeListedInTheAutocompleteList() {
		PHPUnit_Framework_Assert::assertNotContains(
			$this->regularUserName,
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then a tooltip with the text :text should be shown near the share-with-field
	 * @param string $text
	 * @return void
	 */
	public function aTooltipWithTheTextShouldBeShownNearTheShareWithField($text) {
		PHPUnit_Framework_Assert::assertEquals(
			$text, 
			$this->sharingDialog->getShareWithTooltip()
		);
	}

	/**
	 * @Then the autocomplete list should not be displayed
	 * @return void
	 */
	public function theAutocompleteListShouldNotBeDisplayed() {
		PHPUnit_Framework_Assert::assertEmpty(
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then /^the (file|folder) "([^"]*)" should be marked as shared(?: with "([^"]*)")? by "([^"]*)"$/
	 * @param string $fileOrFolder
	 * @param string $itemName
	 * @param string $sharedWithGroup
	 * @param string $sharerName
	 * @return void
	 */
	public function theFileFolderShouldBeMarkedAsSharedBy(
		$fileOrFolder, $itemName, $sharedWithGroup, $sharerName
	) {
		//close any open sharing dialog
		//if there is no dialog open and we try to close it
		//an exception will be thrown, but we do not care
		try {
			$this->filesPage->closeSharingDialog();
		} catch (Exception $e) {
		}
		
		$row = $this->filesPage->findFileRowByName($itemName, $this->getSession());
		$sharingBtn = $row->findSharingButton();
		PHPUnit_Framework_Assert::assertSame(
			$sharerName, $this->filesPage->getTrimmedText($sharingBtn)
		);
		$sharingDialog = $this->filesPage->openSharingDialog(
			$itemName, $this->getSession()
		);
		PHPUnit_Framework_Assert::assertSame(
			$sharerName, $sharingDialog->getSharerName()
		);
		if ($fileOrFolder === "folder") {
			PHPUnit_Framework_Assert::assertContains(
				"folder-shared.svg",
				$row->findThumbnail()->getAttribute("style")
			);
			PHPUnit_Framework_Assert::assertContains(
				"folder-shared.svg",
				$sharingDialog->findThumbnail()->getAttribute("style")
			);
		}
		if ($sharedWithGroup !== "") {
			PHPUnit_Framework_Assert::assertSame(
				$sharedWithGroup,
				$sharingDialog->getSharedWithGroupName()
			);
		}
	}

	/**
	 * @Then it should not be possible to share the file/folder :name
	 * @param string $name
	 * @return void
	 */
	public function itShouldNotBePossibleToShare($name) {
		try {
			$this->theFileFolderIsSharedWithTheUser($name, null, null);
		} catch (ElementNotFoundException $e) {
			PHPUnit_Framework_Assert::assertContains(
				'could not find share-with-field',
				$e->getMessage()
			);
		}
	}

	/**
	 * @BeforeScenario
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->regularUserNames = $this->featureContext->getRegularUserNames();
		$this->regularUserName = $this->featureContext->getRegularUserName();
		$this->regularGroupNames = $this->featureContext->getRegularGroupNames();
		$this->regularGroupName = $this->featureContext->getRegularGroupName();
	}
}
