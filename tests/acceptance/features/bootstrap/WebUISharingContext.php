<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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
use Page\FilesPageElement\SharingDialog;
use Page\PublicLinkFilesPage;
use Page\SharedWithYouPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\AppConfigHelper;
use TestHelpers\HttpRequestHelper;
use TestHelpers\EmailHelper;
use Page\FilesPageElement\SharingDialogElement\EditPublicLinkPopup;
use GuzzleHttp\Message\ResponseInterface;
use Page\GeneralErrorPage;
use Page\SharedWithOthersPage;

require_once 'bootstrap.php';

/**
 * WebUI SharingContext context.
 */
class WebUISharingContext extends RawMinkContext implements Context {

	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 *
	 * @var PublicLinkFilesPage
	 */
	private $publicLinkFilesPage;

	/**
	 *
	 * @var SharedWithYouPage
	 */
	private $sharedWithYouPage;

	/**
	 * @var SharedWithOthersPage
	 */
	private $sharedWithOthersPage;

	/**
	 *
	 * @var GeneralErrorPage
	 */
	private $generalErrorPage;

	/**
	 *
	 * @var SharingDialog
	 */
	private $sharingDialog;

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 *
	 * @var WebUIFilesContext
	 */
	private $webUIFilesContext;
	private $createdPublicLinks = [];

	private $oldMinCharactersForAutocomplete = null;
	private $oldFedSharingFallbackSetting = null;

	private $publicShareTab;
	/**
	 *
	 * @var EditPublicLinkPopup
	 */
	private $publicSharingPopup;
	private $linkName;

	/**
	 * WebUISharingContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param PublicLinkFilesPage $publicLinkFilesPage
	 * @param SharedWithYouPage $sharedWithYouPage
	 * @param GeneralErrorPage $generalErrorPage
	 * @param SharedWithOthersPage $sharedWithOthersPage
	 */
	public function __construct(
		FilesPage $filesPage,
		PublicLinkFilesPage $publicLinkFilesPage,
		SharedWithYouPage $sharedWithYouPage,
		GeneralErrorPage $generalErrorPage,
		SharedWithOthersPage $sharedWithOthersPage
	) {
		$this->filesPage = $filesPage;
		$this->publicLinkFilesPage = $publicLinkFilesPage;
		$this->sharedWithYouPage = $sharedWithYouPage;
		$this->generalErrorPage = $generalErrorPage;
		$this->sharedWithOthersPage = $sharedWithOthersPage;
	}

	/**
	 *
	 * @param string $name
	 * @param string $url
	 *
	 * @return void
	 */
	private function addToListOfCreatedPublicLinks($name, $url) {
		$this->createdPublicLinks[] = ["name" => $name, "url" => $url];
	}

	/**
	 * @When /^the user shares (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" using the webUI$/
	 * @Given /^the user has shared (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" using the webUI$/
	 *
	 * @param string $folder
	 * @param string $remote
	 * @param string $user
	 * @param int $maxRetries
	 * @param boolean $quiet
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserSharesFileFolderWithUserUsingTheWebUI(
		$folder, $remote, $user, $maxRetries = STANDARD_RETRY_COUNT, $quiet = false
	) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		try {
			$this->filesPage->closeDetailsDialog();
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
		$this->theUserClosesTheShareDialog();
	}

	/**
	 * @When the user shares file/folder :folder with group :group using the webUI
	 * @Given the user has shared file/folder :folder with group :group using the webUI
	 *
	 * @param string $folder
	 * @param string $group
	 * @param int $maxRetries
	 * @param bool $quiet
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserSharesFileFolderWithGroupUsingTheWebUI(
		$folder, $group, $maxRetries = STANDARD_RETRY_COUNT, $quiet = false
	) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
			//we don't care
		}
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$folder, $this->getSession()
		);
		$this->sharingDialog->shareWithGroup(
			$group, $this->getSession(), $maxRetries, $quiet
		);
		$this->theUserClosesTheShareDialog();
	}

	/**
	 * @When the user opens the share dialog for file/folder :name
	 * @Given the user has opened the share dialog for file/folder :name
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserOpensTheShareDialogForFileFolder($name) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name, $this->getSession()
		);
	}

	/**
	 * @Given the user has opened the public link share tab
	 * @When the user opens the public link share tab
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserHasOpenedThePublicLinkShareTab() {
		$this->publicShareTab = $this->sharingDialog->openPublicShareTab(
			$this->getSession()
		);
	}

	/**
	 * @When the user deletes share with user :username for the current file
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theUserDeleteShareWithUser($username) {
		$this->sharingDialog->deleteShareWithUser($this->getSession(), $username);
	}

	/**
	 * @Given the user has renamed the public link name from :oldName to :newName
	 * @When the user renames the public link name from :oldName to :newName
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserHasRenamedThePublicLinkNameFromOldNameToNewName($oldName, $newName) {
		$session = $this->getSession();
		$this->publicShareTab->editLink($session, $oldName, $newName);

		$this->publicShareTab->waitForAjaxCallsToStartAndFinish($session);

		$linkUrl = $this->publicShareTab->getLinkUrl($newName);
		$this->addToListOfCreatedPublicLinks($newName, $linkUrl);
	}

	/**
	 * @Given the user has opened the edit public link share popup for the link named :linkName
	 * @When the user opens the edit public link share popup for the link named :linkName
	 *
	 * @param string $linkName
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserOpensThePublicLinkEditDialogForTheLinkName($linkName) {
		$this->publicSharingPopup = $this->publicShareTab->openSharingPopupByLinkName($linkName, $this->getSession());
	}

	/**
	 * @When the user does not save any changes in the edit public link share popup
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserDoesNotSaveAnyChangeInEditPublicLinkSharePopup() {
		$this->publicSharingPopup->cancel();
	}

	/**
	 * @When the user enters the password :password on the edit public link share popup for the link
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function theUserEntersThePasswordForTheLink($password) {
		$this->publicSharingPopup->setLinkPassword($password);
	}

	/**
	 * @Given the user has changed the password of the public link named :name to :newPassword
	 * @When the user changes the password of the public link named :name to :newPassword
	 *
	 * @param string $name
	 * @param string $newPassword
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserChangesThePasswordOfThePublicLinkNamedTo($name, $newPassword) {
		$session = $this->getSession();
		$this->publicShareTab->editLink($session, $name, null, null, $newPassword);
		$this->publicShareTab->waitForAjaxCallsToStartAndFinish($session);

		$linkUrl = $this->publicShareTab->getLinkUrl($name);
		$this->addToListOfCreatedPublicLinks($name, $linkUrl);
	}

	/**
	 * @Given the user has changed the permission of the public link named :name to :newPermission
	 * @When the user changes the permission of the public link named :name to :newPermission
	 *
	 * @param string $name
	 * @param string $newPermission
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserChangesThePermissionOfThePublicLinkNamedTo($name, $newPermission) {
		$session = $this->getSession();
		$this->publicShareTab->editLink($session, $name, null, $newPermission);
		$this->publicShareTab->waitForAjaxCallsToStartAndFinish($session);

		$linkUrl = $this->publicShareTab->getLinkUrl($name);
		$this->addToListOfCreatedPublicLinks($name, $linkUrl);
	}

	/**
	 * @When the user changes the expiration of the public link named :linkName of file/folder :name to :date
	 *
	 * @param string $linkName
	 * @param string $name
	 * @param string $date
	 *
	 * @return void
	 */
	public function theUserChangeTheExpirationOfThePublicLinkNamedForTo($linkName, $name, $date) {
		$session = $this->getSession();
		$this->theUserOpensTheShareDialogForFileFolder($name);
		$this->theUserHasOpenedThePublicLinkShareTab();
		$this->publicSharingPopup = $this->publicShareTab->editLink(
			$session,
			$linkName,
			null,
			null,
			null,
			$date
		);
		$this->publicShareTab->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @When the user opens the create public link share popup
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserOpensTheCreatePublicLinkSharePopup() {
		$this->publicSharingPopup = $this->publicShareTab->openSharingPopup(
			$this->getSession()
		);
	}

	/**
	 * @When the user adds the following email addresses using the webUI:
	 *
	 * @param TableNode $emails
	 *
	 * @return void
	 */
	public function theUserAddsTheFollowingEmailAddressesUsingTheWebUI(TableNode $emails) {
		foreach ($emails as $row) {
			$this->publicSharingPopup->setLinkEmail($row['email']);
		}
	}

	/**
	 * @When the user removes the following email addresses using the webUI:
	 *
	 * @param TableNode $emails
	 *
	 * @return void
	 */
	public function theUserRemovesTheFollowingEmailAddressesUsingTheWebui(TableNode $emails) {
		foreach ($emails as $row) {
			$this->publicSharingPopup->unsetLinkEmail($row['email']);
		}
	}

	/**
	 * @When the user creates the public link using the webUI
	 *
	 * @return void
	 */
	public function createsThePublicLinkUsingTheWebUI() {
		$linkName = $this->publicSharingPopup->getLinkName();

		$this->publicSharingPopup->save();
		$this->publicSharingPopup->waitForAjaxCallsToStartAndFinish($this->getSession());

		$linkUrl = $this->publicShareTab->getLinkUrl($linkName);
		$this->addToListOfCreatedPublicLinks($linkName, $linkUrl);
	}

	/**
	 * @When the user creates a new public link for file/folder :name using the webUI
	 * @Given the user has created a new public link for file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserCreatesANewPublicLinkForFileFolderUsingTheWebUI($name) {
		$this->theUserCreatesANewPublicLinkForFileFolderUsingTheWebUIWith($name);
	}

	/**
	 * @When the user creates a new public link for file/folder :name using the webUI with
	 * @Given the user has created a new public link for file/folder :name using the webUI with
	 *
	 * @param string $name
	 * @param TableNode $settings table with the settings and no header
	 *                            possible settings: name, permission,
	 *                            password, expiration, email, emailToSelf, personalMessage
	 *                            the permissions values has to be written exactly
	 *                            the way its written in the UI
	 *                            Setting emailToSelf will send a copy of email to the link creator
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserCreatesANewPublicLinkForFileFolderUsingTheWebUIWith(
		$name, TableNode $settings = null
	) {
		$linkName = $this->createPublicShareLink($name, $settings);
		$linkUrl = $this->publicShareTab->getLinkUrl($linkName);
		$this->addToListOfCreatedPublicLinks($linkName, $linkUrl);
	}

	/**
	 * @When the user tries to create a new public link for file/folder :name using the webUI with
	 * @When the user tries to create a new public link for file/folder :name using the webUI
	 *
	 * @param string $name
	 * @param TableNode $settings table with the settings and no header
	 *                            possible settings: name, permission,
	 *                            password, expiration, email
	 *                            the permissions values has to be written exactly
	 *                            the way its written in the UI
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserTriesToCreateANewPublicLinkForFileFolderUsingTheWebUIWith(
		$name, TableNode $settings = null
	) {
		$this->linkName = $this->createPublicShareLink($name, $settings);
	}

	/**
	 * @Then the user should see an error message on the public link share dialog saying :expectedWarningMessage
	 *
	 * @param string $expectedWarningMessage
	 *
	 * @return void
	 */
	public function theUserShouldSeeAnErrorMessageOnThePublicLinkShareDialogSaying(
		$expectedWarningMessage
	) {
		$warningMessage = $this->publicShareTab->getWarningMessage();
		PHPUnit\Framework\Assert::assertEquals($expectedWarningMessage, $warningMessage);
	}

	/**
	 * @Then the user should see an error message on the public link popup saying :message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function theUserShouldSeeAnErrorMessageOnThPublicLinkPopupSaying($message) {
		$errormessage = $this->publicSharingPopup->getErrorMessage();
		PHPUnit\Framework\Assert::assertEquals($message, $errormessage);
	}

	/**
	 * @Then the public link should not have been generated
	 *
	 * @return void
	 */
	public function thePublicLinkShouldNotHaveBeenGenerated() {
		try {
			$this->publicShareTab->getLinkUrl($this->linkName);
		} catch (Exception $e) {
			PHPUnit\Framework\Assert::assertContains(
				"could not find link entry with the given name",
				$e->getMessage()
			);
		}
	}

	/**
	 * @When the user closes the share dialog
	 * @Given the user has closed the share dialog
	 *
	 * @return void
	 */
	public function theUserClosesTheShareDialog() {
		// The close button is for the whole details dialog.
		$this->filesPage->closeDetailsDialog();
	}

	/**
	 * @When the user types :input in the share-with-field
	 * @Given the user has typed :input in the share-with-field
	 *
	 * @param string $input
	 *
	 * @return void
	 */
	public function theUserTypesInTheShareWithField($input) {
		$this->sharingDialog->fillShareWithField($input, $this->getSession());
	}

	/**
	 * @When the user sets the sharing permissions of :userName for :fileName using the webUI to
	 * @Given the user has set the sharing permissions of :userName for :fileName using the webUI to
	 *
	 * @param string $userName
	 * @param string $fileName
	 * @param TableNode $permissionsTable table with two columns and no heading
	 *                                    first column one of the permissions
	 *                                    (share|edit|create|change|delete)
	 *                                    second column yes|no
	 *                                    not mentioned permissions will not be
	 *                                    touched
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserSetsTheSharingPermissionsOfForOnTheWebUI(
		$userName, $fileName, TableNode $permissionsTable
	) {
		$userName = $this->featureContext->substituteInLineCodes($userName);
		$this->theUserOpensTheShareDialogForFileFolder($fileName);
		$this->sharingDialog->setSharingPermissions(
			$userName, $permissionsTable->getRowsHash()
		);
	}

	/**
	 * @When the user accepts the offered remote shares using the webUI
	 * @Given the user has accepted the offered remote shares
	 *
	 * @return void
	 */
	public function theUserAcceptsTheOfferedRemoteShares() {
		foreach (\array_reverse($this->filesPage->getOcDialogs()) as $ocDialog) {
			$ocDialog->accept($this->getSession());
		}
	}

	/**
	 * @When the administrator sets the minimum characters for sharing autocomplete to :minCharacters
	 * @Given the administrator has set the minimum characters for sharing autocomplete to :minCharacters
	 *
	 * @param string $minCharacters
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function setMinCharactersForAutocomplete($minCharacters) {
		if ($this->oldMinCharactersForAutocomplete === null) {
			$oldMinCharactersForAutocomplete
				= $this->featureContext->getSystemConfigValue(
					'user.search_min_length'
				);
			$this->oldMinCharactersForAutocomplete = \trim(
				$oldMinCharactersForAutocomplete
			);
		}
		$minCharacters = (int) $minCharacters;
		$this->featureContext->setSystemConfig(
			'user.search_min_length', $minCharacters
		);
	}

	/**
	 * @Given the administrator has allowed http fallback for federation sharing
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function allowHttpFallbackForFedSharing() {
		if ($this->oldFedSharingFallbackSetting === null) {
			$oldFedSharingFallbackSetting
				= $this->featureContext->getSystemConfigValue(
					'sharing.federation.allowHttpFallback'
				);
			$this->oldFedSharingFallbackSetting = \trim(
				$oldFedSharingFallbackSetting
			);
		}
		$this->featureContext->setSystemConfig(
			'sharing.federation.allowHttpFallback', 'true', 'boolean'
		);
	}

	/**
	 * @When the user declines the offered remote shares using the webUI
	 * @Given the user has declined the offered remote shares
	 *
	 * @return void
	 */
	public function theUserDeclinesTheOfferedRemoteShares() {
		foreach (\array_reverse($this->filesPage->getOcDialogs()) as $ocDialog) {
			$ocDialog->clickButton($this->getSession(), 'Cancel');
		}
	}

	/**
	 * @When the public accesses the last created public link using the webUI
	 * @Given the public has accessed the last created public link using the webUI
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thePublicAccessesTheLastCreatedPublicLinkUsingTheWebUI() {
		$lastCreatedLink = \end($this->createdPublicLinks);
		$path = \str_replace(
			$this->featureContext->getBaseUrl(),
			"",
			$lastCreatedLink['url']
		);
		$this->publicLinkFilesPage->setPagePath($path);
		$this->publicLinkFilesPage->open();
		$this->publicLinkFilesPage->waitTillPageIsLoaded($this->getSession());
		$this->webUIGeneralContext->setCurrentPageObject($this->publicLinkFilesPage);
	}

	/**
	 * @When the public adds the public link to :server as user :username with password :password using the webUI
	 * @Given the public has added the public link to :server as user :username with password :password using the webUI
	 *
	 * @param string $server
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thePublicAddsThePublicLinkToUsingTheWebUI(
		$server, $username, $password
	) {
		if (!$this->publicLinkFilesPage->isOpen()) {
			throw new Exception('Not on public link page!');
		}
		$server = $this->featureContext->substituteInLineCodes($server);
		$this->publicLinkFilesPage->addToServer($server);
		// addToServer takes us from the public link page to the login page
		// of the remote server, waiting for us to login.
		$this->webUIGeneralContext->loginAs($username, $password);
	}

	/**
	 * @When /^the user (declines|accepts) share "([^"]*)" offered by user "([^"]*)" using the webUI$/
	 * @Given /^the user has (declined|accepted) share "([^"]*)" offered by user "([^"]*)" using the webUI$/
	 *
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 */
	public function userReactsToShareOfferedByUsingWebUI(
		$action, $share, $offeredBy
	) {
		$this->webUIFilesContext->theUserBrowsesToTheSharedWithYouPage();
		$fileRows = $this->sharedWithYouPage->findAllFileRowsByName(
			$share, $this->getSession()
		);

		$found = false;
		foreach ($fileRows as $fileRow) {
			if ($offeredBy === $fileRow->getSharer()) {
				if (\substr($action, 0, 6) === "accept") {
					$fileRow->acceptShare($this->getSession());
				} else {
					$fileRow->declineShare($this->getSession());
				}
				$found = true;
				break;
			}
		}
		if ($found === false) {
			throw new Exception(
				__METHOD__ .
				" could not find share '$share' offered by '$offeredBy'"
			);
		}
	}

	/**
	 * @When the public accesses the last created public link with password :password using the webUI
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function thePublicAccessesPublicLinkWithPasswordUsingTheWebui($password) {
		$createdPublicLinks = $this->createdPublicLinks;
		$baseUrl = $this->featureContext->getBaseUrl();
		$this->publicLinkFilesPage->openPublicShareAuthenticateUrl($createdPublicLinks, $baseUrl);
		$this->publicLinkFilesPage->enterPublicLinkPassword($password);
		$this->publicLinkFilesPage->waitTillPageIsLoaded($this->getSession());
		$this->webUIGeneralContext->setCurrentPageObject($this->publicLinkFilesPage);
	}

	/**
	 * @When the public tries to access the last created public link with wrong password :wrongPassword using the webUI
	 *
	 * @param string $wrongPassword
	 *
	 * @return void
	 */
	public function thePublicTriesToAccessPublicLinkWithWrongPasswordUsingTheWebui($wrongPassword) {
		$createdPublicLinks = $this->createdPublicLinks;
		$baseUrl = $this->featureContext->getBaseUrl();
		$this->publicLinkFilesPage->openPublicShareAuthenticateUrl($createdPublicLinks, $baseUrl);
		$this->publicLinkFilesPage->enterPublicLinkPassword($wrongPassword);
		$this->sharedWithYouPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * @When the user removes the public link of file/folder :entryName using the webUI
	 *
	 * @param string $entryName
	 *
	 * @return void
	 */
	public function theUserRemovesThePublicLinkOfFileUsingTheWebui($entryName) {
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$entryName, $session
		);
		$this->publicShareTab = $this->sharingDialog->openPublicShareTab($session);
		$this->sharingDialog->removePublicLink($session);
	}

	/**
	 * @When the user tries to remove the public link of file :entryName but later cancels the remove dialog using webUI
	 *
	 * @param string $entryName
	 *
	 * @return void
	 */
	public function theUserCancelsTheRemoveOperationOfFileUsingWebui($entryName) {
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$entryName, $session
		);
		$this->publicShareTab = $this->sharingDialog->openPublicShareTab($session);
		$this->sharingDialog->cancelRemovePublicLinkOperation($session);
	}

	/**
	 * @When the user removes the public link at position :number of file :entryName using the webUI
	 *
	 * @param integer $number
	 * @param string $entryName
	 *
	 * @return void
	 */
	public function removesPublicLinkAtCertainPosition($number, $entryName) {
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$entryName, $session
		);
		$this->publicShareTab = $this->sharingDialog->openPublicShareTab($session);
		$this->sharingDialog->removePublicLink($session, $number);
	}

	/**
	 * @When the user sends the share notification by email using the webUI
	 *
	 * @return void
	 */
	public function theUserSendsTheShareNotificationByEmailUsingTheWebui() {
		PHPUnit\Framework\Assert::assertNotNull(
			$this->sharingDialog, "Sharing Dialog is not open"
		);
		$this->sharingDialog->sendShareNotificationByEmail($this->getSession());
	}

	/**
	 * @Then the user should not be able to send the share notification by email using the webUI
	 *
	 * @return void
	 */
	public function theUserShouldNotBeAbleToSendTheShareNotificationByEmailUsingTheWebui() {
		$errorMessage = "";
		PHPUnit\Framework\Assert::assertNotNull(
			$this->sharingDialog, "Sharing Dialog is not open"
		);
		try {
			$this->sharingDialog->sendShareNotificationByEmail($this->getSession());
		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
		}
		PHPUnit\Framework\Assert::assertContains(
			"could not find notify by email button",
			$errorMessage,
			"User was not expected to be able to send the share notification by email but was"
		);
	}

	/**
	 * @Then the public should not get access to the publicly shared file
	 *
	 * @return void
	 */
	public function thePublicShouldNotGetAccessToPublicShareFile() {
		$warningMessage = $this->publicLinkFilesPage->getWarningMessage();
		PHPUnit\Framework\Assert::assertEquals('The password is wrong. Try again.', $warningMessage);

		$lastCreatedLink = \end($this->createdPublicLinks);
		$lastSharePath = $lastCreatedLink['url'] . '/authenticate';
		$currentPath = $this->getSession()->getCurrentUrl();
		PHPUnit\Framework\Assert::assertEquals($lastSharePath, $currentPath);
	}

	/**
	 * @Then only :userOrGroupName should be listed in the autocomplete list on the webUI
	 *
	 * @param string $userOrGroupName
	 *
	 * @return void
	 */
	public function onlyUserOrGroupNameShouldBeListedInTheAutocompleteList(
		$userOrGroupName
	) {
		$autocompleteItems = $this->sharingDialog->getAutocompleteItemsList();
		PHPUnit\Framework\Assert::assertCount(
			1,
			$autocompleteItems,
			"expected 1 autocomplete item but there are " . \count($autocompleteItems)
		);
		PHPUnit\Framework\Assert::assertContains(
			$userOrGroupName,
			$autocompleteItems,
			"'$userOrGroupName' not in autocomplete list"
		);
	}

	/**
	 * @Then all users and groups that contain the string :requiredString in their name should be listed in the autocomplete list on the webUI
	 *
	 * @param string $requiredString
	 *
	 * @return void
	 */
	public function allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteList(
		$requiredString
	) {
		$this->allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept(
			$requiredString, 'user', ''
		);
	}

	/**
	 * @Then all users and groups that contain the string :requiredString in their name should be listed in the autocomplete list on the webUI except :userOrGroup :notToBeListed
	 *
	 * @param string $requiredString
	 * @param string $userOrGroup
	 * @param string $notToBeListed
	 *
	 * @return void
	 */
	public function allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept(
		$requiredString, $userOrGroup, $notToBeListed
	) {
		if ($userOrGroup === 'group') {
			$notToBeListed
				= $this->sharingDialog->groupStringsToMatchAutoComplete($notToBeListed);
		}
		if ($userOrGroup === 'user') {
			$notToBeListed
				= $this->sharingDialog->userStringsToMatchAutoComplete($notToBeListed);
		}
		$autocompleteItems = $this->sharingDialog->getAutocompleteItemsList();
		// Keep separate arrays of users and groups, because the names can overlap
		$createdElementsWithDisplayNames = [];
		$createdElementsWithFullDisplayText = [];
		$createdElementsWithDisplayNames['groups'] = $this->featureContext->getCreatedGroupDisplayNames();
		$createdElementsWithFullDisplayText['groups'] = $this->sharingDialog->groupStringsToMatchAutoComplete(
			$createdElementsWithDisplayNames['groups']
		);
		$createdElementsWithDisplayNames['users'] = $this->featureContext->getCreatedUserDisplayNames();
		$createdElementsWithFullDisplayText['users'] = $this->sharingDialog->userStringsToMatchAutoComplete(
			$createdElementsWithDisplayNames['users']
		);
		$numExpectedItems = 0;
		foreach ($createdElementsWithFullDisplayText as $usersOrGroups => $elementArray) {
			foreach ($elementArray as $internalName => $fullDisplayText) {
				$displayName = $createdElementsWithDisplayNames[$usersOrGroups][$internalName];
				// Matching should be case-insensitive on the internal or display name
				if (((\stripos($internalName, $requiredString) !== false)
					|| (\stripos($displayName, $requiredString) !== false))
					&& ($fullDisplayText !== $notToBeListed)
					&& ($displayName !== $this->featureContext->getCurrentUser())
					&& ($displayName !== $this->featureContext->getCurrentUserDisplayName())
				) {
					PHPUnit\Framework\Assert::assertContains(
						$fullDisplayText,
						$autocompleteItems,
						"'$fullDisplayText' not in autocomplete list"
					);
					$numExpectedItems = $numExpectedItems + 1;
				}
			}
		}

		PHPUnit\Framework\Assert::assertCount(
			$numExpectedItems,
			$autocompleteItems,
			"expected $numExpectedItems in autocomplete list but there are " . \count($autocompleteItems)
		);

		PHPUnit\Framework\Assert::assertNotContains(
			$notToBeListed,
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then the users own name should not be listed in the autocomplete list on the webUI
	 *
	 * @return void
	 */
	public function theUsersOwnNameShouldNotBeListedInTheAutocompleteList() {
		PHPUnit\Framework\Assert::assertNotContains(
			$this->filesPage->getMyDisplayname(),
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then user :username should be listed in the autocomplete list on the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeListedInTheAutocompleteListOnTheWebui($username) {
		$names = $this->sharingDialog->getAutocompleteItemsList();
		PHPUnit\Framework\Assert::assertContains(
			$username,
			$names,
			"$username not found in autocomplete list"
		);
	}

	/**
	 * @Then user :username should not be listed in the autocomplete list on the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldNotBeListedInTheAutocompleteListOnTheWebui($username) {
		$names = $this->sharingDialog->getAutocompleteItemsList();
		$userString = $this->sharingDialog->userStringsToMatchAutoComplete($username);
		if (\in_array($userString, $names)) {
			throw new Exception("$username ($userString) found in autocomplete list but not expected");
		}
	}

	/**
	 * @Then group :groupName should not be listed in the autocomplete list on the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function groupShouldNotBeListedInTheAutocompleteListOnTheWebui($groupName) {
		$names = $this->sharingDialog->getAutocompleteItemsList();
		$groupName = $this->sharingDialog->groupStringsToMatchAutoComplete($groupName);
		PHPUnit\Framework\Assert::assertNotContains(
			$groupName,
			$names,
			"$groupName found in autocomplete list but not expected"
		);
	}

	/**
	 * @Then a tooltip with the text :text should be shown near the share-with-field on the webUI
	 *
	 * @param string $text
	 *
	 * @return void
	 */
	public function aTooltipWithTheTextShouldBeShownNearTheShareWithField($text) {
		PHPUnit\Framework\Assert::assertEquals(
			$text,
			$this->sharingDialog->getShareWithTooltip()
		);
	}

	/**
	 * @Then the autocomplete list should not be displayed on the webUI
	 *
	 * @return void
	 */
	public function theAutocompleteListShouldNotBeDisplayed() {
		PHPUnit\Framework\Assert::assertEmpty(
			$this->sharingDialog->getAutocompleteItemsList()
		);
	}

	/**
	 * @Then the user :username should not be in share with user list
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theUserShouldNotBeInShareWithUserList($username) {
		PHPUnit\Framework\Assert::assertFalse(
			$this->sharingDialog->isUserPresentInShareWithList($username),
			"user $username is present in the list"
		);
	}

	/**
	 * @Then /^(file|folder) "([^"]*)" should be marked as shared(?: with "([^"]*)")? by "([^"]*)" on the webUI$/
	 *
	 * @param string $fileOrFolder
	 * @param string $itemName
	 * @param string $sharedWithGroup
	 * @param string $sharerName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function fileFolderShouldBeMarkedAsSharedBy(
		$fileOrFolder, $itemName, $sharedWithGroup, $sharerName
	) {
		//close any open sharing dialog
		//if there is no dialog open and we try to close it
		//an exception will be thrown, but we do not care
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
		}

		$row = $this->filesPage->findFileRowByName($itemName, $this->getSession());
		$sharingBtn = $row->findSharingButton();
		PHPUnit\Framework\Assert::assertSame(
			$sharerName, $this->filesPage->getTrimmedText($sharingBtn)
		);
		$sharingDialog = $this->filesPage->openSharingDialog(
			$itemName, $this->getSession()
		);
		PHPUnit\Framework\Assert::assertSame(
			$sharerName, $sharingDialog->getSharerName()
		);
		if ($fileOrFolder === "folder") {
			PHPUnit\Framework\Assert::assertContains(
				"folder-shared.svg",
				$row->findThumbnail()->getAttribute("style")
			);
			$detailsDialog = $this->filesPage->getDetailsDialog();
			PHPUnit\Framework\Assert::assertContains(
				"folder-shared.svg",
				$detailsDialog->findThumbnail()->getAttribute("style")
			);
		}
		if ($sharedWithGroup !== "") {
			PHPUnit\Framework\Assert::assertSame(
				$sharedWithGroup,
				$sharingDialog->getSharedWithGroupName()
			);
		}
	}

	/**
	 * @Then file/folder :item should be in state :state in the shared-with-you page on the webUI
	 *
	 * @param string $item
	 * @param string $state
	 *
	 * @return void
	 */
	public function assertShareIsInStateOnWebUI($item, $state) {
		$this->webUIFilesContext->theUserBrowsesToTheSharedWithYouPage();
		$fileRow = $this->sharedWithYouPage->findFileRowByName(
			$item, $this->getSession()
		);
		PHPUnit\Framework\Assert::assertSame($state, $fileRow->getShareState());
	}

	/**
	 * @Then file/folder :item shared by :sharedBy should be in state :state in the shared-with-you page on the webUI
	 *
	 * @param string $item
	 * @param string $sharedBy
	 * @param string $state
	 *
	 * @return void
	 */
	public function assertShareSharedByIsInStateOnWebUI($item, $sharedBy, $state) {
		$this->webUIFilesContext->theUserBrowsesToTheSharedWithYouPage();
		$fileRows = $this->sharedWithYouPage->findAllFileRowsByName(
			$item, $this->getSession()
		);
		$found = false;
		$currentState = null;
		foreach ($fileRows as $fileRow) {
			if ($sharedBy === $fileRow->getSharer()) {
				$found = true;
				$currentState = $fileRow->getShareState();
				break;
			}
		}
		PHPUnit\Framework\Assert::assertTrue(
			$found, "could not find item called $item shared by $sharedBy"
		);
		PHPUnit\Framework\Assert::assertSame($state, $currentState);
	}

	/**
	 * @Then file/folder :item should be in state :state in the shared-with-you page on the webUI after a page reload
	 *
	 * @param string $item
	 * @param string $state
	 *
	 * @return void
	 */
	public function assertSharesIsInStateOnWebUIAfterPageReload($item, $state) {
		$this->webUIGeneralContext->theUserReloadsTheCurrentPageOfTheWebUI();
		$this->sharedWithYouPage->waitForAjaxCallsToStartAndFinish($this->getSession());
		$this->assertShareIsInStateOnWebUI($item, $state);
	}

	/**
	 * @Then the public link with name :entryName should not be in the public links list
	 *
	 * @param string $entryName
	 *
	 * @return void
	 */
	public function thePublicLinkWithNameShouldNotBeInPublicLinksList($entryName) {
		$this->sharingDialog->checkThatNameIsNotInPublicLinkList($this->getSession(), $entryName);
	}

	/**
	 * @Then the number of public links should be :count
	 *
	 * @param integer $count
	 *
	 * @return void
	 */
	public function theNumberOfPublicLinksShouldBe($count) {
		$this->sharingDialog->checkPublicLinkCount($this->getSession(), $count);
	}

	/**
	 * @Then /^it should not be possible to share (?:file|folder) "([^"]*)"(?: with (user|group) "([^"]*)")? using the webUI$/
	 *
	 * @param string $fileName
	 * @param string $userOrGroup
	 * @param string|null $shareWith
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function itShouldNotBePossibleToShareFileFolderUsingTheWebUI(
		$fileName, $userOrGroup = null, $shareWith = null
	) {
		$sharingWasPossible = false;
		try {
			if ($userOrGroup === "user") {
				$this->theUserSharesFileFolderWithUserUsingTheWebUI(
					$fileName, null, $shareWith, 2, true
				);
			} else {
				$this->theUserSharesFileFolderWithGroupUsingTheWebUI(
					$fileName, $shareWith, 2, true
				);
			}
			$sharingWasPossible = true;
		} catch (ElementNotFoundException $e) {
			if ($shareWith === null) {
				$shareWithText = "";
			} else {
				if ($userOrGroup === "user") {
					$shareWithText = $this->sharingDialog->userStringsToMatchAutoComplete($shareWith);
				} else {
					$shareWithText = $this->sharingDialog->groupStringsToMatchAutoComplete($shareWith);
				}
			}
			$possibleMessages = [
				"could not find share-with-field",
				"could not find sharing button in fileRow",
				"could not share with '$shareWithText'"
			];
			$foundMessage = false;
			foreach ($possibleMessages as $message) {
				$foundMessage = \strpos($e->getMessage(), $message);
				if ($foundMessage !== false) {
					break;
				}
			}
			if ($foundMessage === false) {
				throw new Exception(
					'exception message has to contain' .
					' "could not find share-with-field",' .
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
	 * @Then the public should see an error message :errorMsg while accessing last created public link using the webUI
	 *
	 * @param string $errorMsg
	 *
	 * @return void
	 */
	public function thePublicShouldSeeAnErrorMessageWhileAccessingLastCreatedPublicLinkUsingTheWebui($errorMsg) {
		$lastCreatedLink = \end($this->createdPublicLinks);
		$path = \str_replace(
			$this->featureContext->getBaseUrl(),
			"",
			$lastCreatedLink['url']
		);
		$this->generalErrorPage->setPagePath($path);
		$this->generalErrorPage->open();
		$actualErrorMsg = $this->generalErrorPage->getErrorMessage();
		PHPUnit\Framework\Assert::assertContains($errorMsg, $actualErrorMsg);
	}

	/**
	 * create public share link
	 *
	 * @param string $name
	 * @param TableNode|null $settings table with the settings and no header
	 *                                 possible settings: name, permission,
	 *                                 password, expiration, email, personalMessage
	 *                                 the permissions values have to be written
	 *                                 exactly the way they are written in the UI
	 *
	 * @return string
	 */
	public function createPublicShareLink($name, $settings = null) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		//close any open sharing dialog
		//if there is no dialog open and we try to close it
		//an exception will be thrown, but we do not care
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
		}
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name, $session
		);
		$this->publicShareTab = $this->sharingDialog->openPublicShareTab($session);
		if ($settings !== null) {
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
			if (!isset($settingsArray['emailToSelf'])) {
				$settingsArray['emailToSelf'] = null;
			}
			if (!isset($settingsArray['personalMessage'])) {
				$settingsArray['personalMessage'] = null;
			}
			$linkName = $this->publicShareTab->createLink(
				$this->getSession(),
				$settingsArray ['name'],
				$settingsArray ['permission'],
				$settingsArray ['password'],
				$settingsArray ['expiration'],
				$settingsArray ['email'],
				$settingsArray ['emailToSelf'],
				$settingsArray ['personalMessage']
			);
			if ($settingsArray['name'] !== null) {
				PHPUnit\Framework\Assert::assertSame(
					$settingsArray ['name'], $linkName,
					"set and retrieved public link names are not the same"
				);
			}
		} else {
			$linkName = $this->publicShareTab->createLink($this->getSession());
		}
		return $linkName;
	}

	/**
	 * @Then the text preview of the public link should contain :content
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function theTextPreviewOfThePublicLinkShouldContain($content) {
		$previewText = $this->publicLinkFilesPage->getPreviewText();
		PHPUnit\Framework\Assert::assertContains(
			$content, $previewText,
			__METHOD__ . " file preview does not contain expected content"
		);
	}

	/**
	 * @Then the content of the file shared by the last public link should be the same as :originalFile
	 *
	 * @param string $originalFile
	 *
	 * @return void
	 */
	public function theContentOfTheFileSharedByLastPublicLinkShouldBeTheSameAs($originalFile) {
		$response = $this->thePublicDownloadsTheLastCreatedFileUsingTheWebui();
		PHPUnit\Framework\Assert::assertEquals(200, $response->getStatusCode());
		$body = $response->getBody()->getContents();

		$user = $this->featureContext->getCurrentUser();
		$password = $this->featureContext->getPasswordForUser($user);

		$this->featureContext->downloadFileAsUserUsingPassword($user, $originalFile, $password);
		$originalContent = $this->featureContext->getResponse()->getBody()->getContents();

		PHPUnit\Framework\Assert::assertSame($originalContent, $body);
	}

	/**
	 * @When the public downloads the last created file/folder using the webUI
	 *
	 * @return ResponseInterface
	 */
	public function thePublicDownloadsTheLastCreatedFileUsingTheWebui() {
		$url = $this->publicLinkFilesPage->getDownloadUrl();
		return HttpRequestHelper::get($url);
	}

	/**
	 * @Then the email address :address should have received an email containing the last shared public link
	 *
	 * @param string $address
	 *
	 * @return void
	 */
	public function theEmailAddressShouldHaveReceivedAnEmailContainingSharedPublicLink($address) {
		$content = EmailHelper::getBodyOfLastEmail(
			EmailHelper::getLocalMailhogUrl(),
			$address
		);
		$lastCreatedPublicLink = \end($this->createdPublicLinks);
		PHPUnit\Framework\Assert::assertContains($lastCreatedPublicLink["url"], $content);
	}

	/**
	 * @Then the user should see an error message on the share dialog saying :message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function theUserShouldSeeAnErrorMessageOnTheShareDialogSaying($message) {
		$sharingDialog = $this->filesPage->getSharingDialog();
		$actualMessage = $sharingDialog->getNoSharingMessage(
			$this->getSession()
		);
		PHPUnit\Framework\Assert::assertEquals($message, $actualMessage);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
		$this->webUIFilesContext = $environment->getContext('WebUIFilesContext');
	}

	/**
	 * After Scenario. Sets back old settings
	 *
	 * @AfterScenario @webUI
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function tearDownScenario() {
		//TODO make a function that can be used for different settings
		if ($this->oldMinCharactersForAutocomplete === "") {
			$this->featureContext->deleteSystemConfig('user.search_min_length');
		} elseif ($this->oldMinCharactersForAutocomplete !== null) {
			$this->featureContext->setSystemConfig(
				'user.search_min_length',
				$this->oldMinCharactersForAutocomplete
			);
		}

		if ($this->oldFedSharingFallbackSetting === "") {
			$this->featureContext->deleteSystemConfig(
				'sharing.federation.allowHttpFallback'
			);
		} elseif ($this->oldFedSharingFallbackSetting !== null) {
			$this->featureContext->setSystemConfig(
				'sharing.federation.allowHttpFallback',
				$this->oldFedSharingFallbackSetting,
				'boolean'
			);
		}
	}
}
