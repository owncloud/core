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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\FilesPage;
use Page\PublicLinkFilesPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\AppConfigHelper;

require_once 'bootstrap.php';

/**
 * SharingContext context.
 */
class SharingContext extends RawMinkContext implements Context {

	private $filesPage;
	private $publicLinkFilesPage;
	private $sharingDialog;
	private $regularUserName;
	private $regularUserNames;
	private $regularGroupName;
	private $regularGroupNames;
	/**
	 * 
	 * @var FeatureContext
	 */
	private $featureContext;
	
	/**
	 * 
	 * @var FilesContext
	 */
	private $filesContext;
	private $createdPublicLinks = [];

	/**
	 * SharingContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param PublicLinkFilesPage $publicLinkFilesPage
	 */
	public function __construct(
		FilesPage $filesPage, PublicLinkFilesPage $publicLinkFilesPage
	) {
		$this->filesPage = $filesPage;
		$this->publicLinkFilesPage = $publicLinkFilesPage;
	}

	/**
	 * 
	 * @param string $name
	 * @param string $url
	 * @return void
	 */
	private function addToListOfCreatedPublicLinks($name, $url) {
		$this->createdPublicLinks[] = ["name" => $name, "url" => $url];
	}

	/**
	 * @Given /^the (?:file|folder) "([^"]*)" is shared with the (?:(remote)\s)?user "([^"]*)"$/
	 * @param string $folder
	 * @param string $remote
	 * @param string $user
	 * @param int $maxRetries
	 * @param boolean $quiet
	 * @return void
	 */
	public function theFileFolderIsSharedWithTheUser(
		$folder, $remote, $user, $maxRetries = 5, $quiet = false
	) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		try {
			$this->filesPage->closeSharingDialog();
		} catch (Exception $e) {
			//we don't care
		}
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$folder, $this->getSession()
		);
		$user = $this->featureContext->substituteInLineCodes($user);
		if ($remote === "remote") {
			$this->sharingDialog->shareWithRemoteUser(
				$user, $this->getSession(), $maxRetries, $quiet
			);
		} else {
			$this->sharingDialog->shareWithUser(
				$user, $this->getSession(), $maxRetries, $quiet
			);
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
		try {
			$this->filesPage->closeSharingDialog();
		} catch (Exception $e) {
			//we don't care
		}
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
	 * @Given I create a new public link for the file/folder :name
	 * @param string $name
	 * @return void
	 */
	public function iCreateANewPublicLinkFor($name) {
		$this->iCreateANewPublicLinkForWith($name);
	}
	/**
	 * @Given I create a new public link for the file/folder :name with
	 * @param string $name
	 * @param TableNode $settings table with the settings and no header
	 *                            possible settings: name, permission,
	 *                            password, expiration, email
	 *                            the permissions values has to be written exactly
	 *                            the way its written in the UI
	 * @return void
	 */
	public function iCreateANewPublicLinkForWith(
		$name, TableNode $settings = null
	) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		//close any open sharing dialog
		//if there is no dialog open and we try to close it
		//an exception will be thrown, but we do not care
		try {
			$this->filesPage->closeSharingDialog();
		} catch (Exception $e) {
		}
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name, $this->getSession()
		);
		$publicShareTab = $this->sharingDialog->openPublicShareTab();
		if (!is_null($settings)) {
			$settingsArray = $settings->getRowsHash();
			if (!isset($settingsArray['name'])) {
				$settingsArray['name'] = null;
			}
			if (!isset($settingsArray['permission'])) {
				$settingsArray['permission'] = null;
			}
			if (!isset($settingsArray['password'])) {
				$settingsArray['password'] = null;
			}
			if (!isset($settingsArray['expiration'])) {
				$settingsArray['expiration'] = null;
			}
			if (!isset($settingsArray['email'])) {
				$settingsArray['email'] = null;
			}
			$linkName = $publicShareTab->createLink(
				$this->getSession(),
				$settingsArray ['name'],
				$settingsArray ['permission'],
				$settingsArray ['password'],
				$settingsArray ['expiration'],
				$settingsArray ['email']
			);
			if (!is_null($settingsArray['name'])) {
				PHPUnit_Framework_Assert::assertSame(
					$settingsArray ['name'], $linkName,
					"set and retrieved public link names are not the same"
				);
			}
		} else {
			$linkName = $publicShareTab->createLink($this->getSession());
		}
		$linkUrl = $publicShareTab->getLinkUrl($linkName);
		$this->addToListOfCreatedPublicLinks($linkName, $linkUrl);
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
	 * @When I access the last created public link
	 * @return void
	 */
	public function iAccessTheLastCreatedPublicLink() {
		$lastCreatedLink = end($this->createdPublicLinks);
		$path = str_replace(
			$this->getMinkParameter('base_url'),
			"",
			$lastCreatedLink['url']
		);
		$this->publicLinkFilesPage->setPagePath($path);
		$this->publicLinkFilesPage->open();
		$this->publicLinkFilesPage->waitTillPageIsLoaded($this->getSession());
		$this->featureContext->setCurrentPageObject($this->publicLinkFilesPage);
	}

	/**
	 * @When I add the public link to :server as user :username with the password :password
	 * @param string $server
	 * @return void
	 */
	public function iAddThePublicLinkTo($server, $username, $password) {
		if (!$this->publicLinkFilesPage->isOpen()) {
			throw new Exception('Not on public link page!');
		}
		$server = $this->featureContext->substituteInLineCodes($server);
		$this->publicLinkFilesPage->addToServer($server);
		$this->featureContext->loginAs($username, $password);
		$this->featureContext->setCurrentServer($server);
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
	 * @Then /^it should not be possible to share the (?:file|folder) "([^"]*)"(?: with "([^"]*)")?$/
	 * @param string $fileName
	 * @param string|null $shareWith
	 * @return void
	 * @throws Exception
	 */
	public function itShouldNotBePossibleToShare($fileName, $shareWith = null) {
		$sharingWasPossible = false;
		try {
			$this->theFileFolderIsSharedWithTheUser($fileName, null, $shareWith, 2, true);
			$sharingWasPossible = true;
		} catch (ElementNotFoundException $e) {
			$possibleMessages = [
				'could not find share-with-field',
				'could not find sharing button in fileRow',
				'could not share with \'' . $shareWith . '\''
			];
			foreach ($possibleMessages as $message) {
				$foundMessage = strpos($e->getMessage(), $message);
				if ($foundMessage !== false) {
					break;
				}
			}
			if ($foundMessage === false) {
				throw new Exception(
					'exception message has to contain "could not find share-with-field",' .
					' "could not find sharing button in fileRow" or' .
					' "could not share with \'...\'"but was: "' .
					$e->getMessage() . '"'
				);
			}
		}
		if ($sharingWasPossible === true) {
			throw new Exception("It was possible to share the file");
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
		$this->filesContext = $environment->getContext('FilesContext');
		$this->regularUserNames = $this->featureContext->getRegularUserNames();
		$this->regularUserName = $this->featureContext->getRegularUserName();
		$this->regularGroupNames = $this->featureContext->getRegularGroupNames();
		$this->regularGroupName = $this->featureContext->getRegularGroupName();
		$this->setupSharingConfigs();
	}
	
	/**
	 * @return void
	 */
	protected function setupSharingConfigs() {
		$settings = [
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'api_enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enabled',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_links',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@upload',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_public_upload',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'group_sharing',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_group_sharing',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'share_with_group_members_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_only_share_with_group_members',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'share_with_membership_groups_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_only_share_with_membership_groups',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'user_enumeration@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_share_dialog_user_enumeration',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'user_enumeration@@@group_members_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_share_dialog_user_enumeration_group_members',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'federation',
				'capabilitiesParameter' => 'outgoing',
				'testingApp' => 'files_sharing',
				'testingParameter' => 'outgoing_server2server_share_enabled',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'federation',
				'capabilitiesParameter' => 'incoming',
				'testingApp' => 'files_sharing',
				'testingParameter' => 'incoming_server2server_share_enabled',
				'testingState' => true
			]
		];

		foreach ($settings as $setting) {
			$change = AppConfigHelper::setCapability(
				$this->getMinkParameter('base_url'),
				"admin",
				$this->featureContext->getUserPassword("admin"),
				$setting['capabilitiesApp'],
				$setting['capabilitiesParameter'],
				$setting['testingApp'],
				$setting['testingParameter'],
				$setting['testingState'],
				$this->featureContext->getSavedCapabilitiesXml()
			);
			$this->featureContext->addToSavedCapabilitiesChanges($change);
		}
	}

}
