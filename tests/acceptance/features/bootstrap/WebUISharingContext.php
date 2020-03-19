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
use Psr\Http\Message\ResponseInterface;
use Page\FilesPage;
use Page\FilesPageElement\SharingDialog;
use Page\FilesPageElement\SharingDialogElement\EditPublicLinkPopup;
use Page\FilesPageElement\SharingDialogElement\PublicLinkTab;
use Page\GeneralErrorPage;
use Page\PublicLinkFilesPage;
use Page\SharedWithOthersPage;
use Page\SharedWithYouPage;
use PHPUnit\Framework\Assert;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\EmailHelper;
use TestHelpers\HttpRequestHelper;
use TestHelpers\SetupHelper;

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

	private $oldMinCharactersForAutocomplete = null;
	private $oldFedSharingFallbackSetting = null;

	/**
	 * @var PublicLinkTab
	 */
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
	 * @When /^the user shares (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" using the webUI$/
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
		$this->theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
			$folder, "user", $remote, $user, $maxRetries, $quiet
		);
	}

	/**
	 * @When /^the user shares (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" using the webUI without closing the share dialog$/
	 *
	 * @param string $folder
	 * @param string $remote (remote|federated|)
	 * @param string $name
	 * @param int $maxRetries
	 * @param bool $quiet
	 *
	 * @return void
	 * @throws \Exception
	 *
	 */
	public function theUserSharesWithUserWithoutClosingDialog(
		$folder, $remote, $name, $maxRetries = STANDARD_RETRY_COUNT, $quiet = false
	) {
		$this->theUserSharesUsingWebUIWithoutClosingDialog($folder, "user", $remote, $name, $maxRetries, $quiet);
	}

	/**
	 * @When /^the user shares (?:file|folder) "([^"]*)" with group "([^"]*)" using the webUI without closing the share dialog$/
	 *
	 * @param string $folder
	 * @param string $name
	 * @param int $maxRetries
	 * @param bool $quiet
	 *
	 * @return void
	 *
	 * @throws \Exception
	 *
	 */
	public function theUserSharesWithGroupWithoutClosingDialog(
		$folder, $name, $maxRetries = STANDARD_RETRY_COUNT, $quiet = false
	) {
		$this->theUserSharesUsingWebUIWithoutClosingDialog($folder, "group", "", $name, $maxRetries, $quiet);
	}

	/**
	 * @Then /^the expiration date input field should (not |)be visible for the (user|group) "([^"]*)" in the share dialog$/
	 *
	 * @param string $shouldOrNot
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 */
	public function expirationFieldVisibleForUser($shouldOrNot, $type, $receiver) {
		$expected = ($shouldOrNot === "");
		$this->sharingDialog->openShareActionsDropDown($type, $receiver);
		Assert::assertEquals(
			$expected,
			$this->sharingDialog->isExpirationFieldVisible($receiver, $type),
			__METHOD__
			. " The visibility of expiration date input field for '$type' '$receiver' in the share dialog is not as expected. "
		);
	}

	/**
	 * @Then /^the expiration date input field should be empty for the (user|group) "([^"]*)" in the share dialog$/
	 *
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function expirationFieldEmptyForUser($type, $receiver) {
		$expirationDateInInputField = $this->sharingDialog->getExpirationDateFor($receiver, $type);
		Assert::assertEquals(
			"",
			$expirationDateInInputField,
			__METHOD__
			. " The expiration date input field, for the '$type' '$receiver' , in the share dialog is expected to be empty, but got '$expirationDateInInputField'"
		);
	}

	/**
	 * @When /^the user changes expiration date for share of (user|group) "([^"]*)" to "([^"]*)" in the share dialog$/
	 *
	 * @param string $type
	 * @param string $receiver
	 * @param string $days
	 *
	 * @return void
	 */
	public function expirationDateChangedTo($type, $receiver, $days) {
		$expectedDate = \date('d-m-Y', \strtotime($days));
		$this->sharingDialog->openShareActionsDropDown($type, $receiver);
		$this->sharingDialog->setExpirationDateFor($this->getSession(), $receiver, $type, $expectedDate);
	}

	/**
	 * @Then /^the expiration date input field should be "([^"]*)" for the (user|group) "([^"]*)" in the share dialog$/
	 *
	 * @param string $days
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function expirationDateShouldBe($days, $type, $receiver) {
		if (\strtotime($days) !== false) {
			$expectedExpirationDate = \date('d-m-Y', \strtotime($days));
			$actualExpirationDate = $this->sharingDialog->getExpirationDateFor($receiver, $type);
			Assert::assertEquals(
				$expectedExpirationDate,
				$actualExpirationDate,
				" The expiration date input field, for the '$type' '$receiver', in the share dialog was expected to be '$expectedExpirationDate', "
				. "but got '$actualExpirationDate'."
			);
		} else {
			throw new Exception("Invalid Format for the expiration date provided.");
		}
	}

	/**
	 * @When /^the user clears the expiration date input field for share of (user|group) "([^"]*)" in the share dialog$/
	 *
	 * @param string $userOrGroup
	 * @param string $receiver
	 *
	 * @return void
	 */
	public function clearExpirationDate($userOrGroup, $receiver) {
		$this->sharingDialog->openShareActionsDropDown($userOrGroup, $receiver);
		$this->sharingDialog->clearExpirationDateFor($this->getSession(), $receiver, $userOrGroup);
	}

	/**
	 * @param string $folder
	 * @param string $userOrGroup (user|group)
	 * @param string $remote (remote|federated|)
	 * @param string $name
	 * @param int $maxRetries
	 * @param bool $quiet
	 *
	 * @return void
	 * @throws \Exception
	 *
	 */
	public function theUserSharesUsingWebUIWithoutClosingDialog(
		$folder, $userOrGroup, $remote, $name, $maxRetries = STANDARD_RETRY_COUNT, $quiet = false
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
		if ($userOrGroup === "user") {
			$user = $this->featureContext->substituteInLineCodes($name);
			if ($remote === "remote") {
				$this->sharingDialog->shareWithRemoteUser(
					$user, $this->getSession(), $maxRetries, $quiet
				);
			} else {
				$this->sharingDialog->shareWithUser(
					$user, $this->getSession(), $maxRetries, $quiet
				);
			}
		} else {
			$this->sharingDialog->shareWithGroup(
				$name, $this->getSession(), $maxRetries, $quiet
			);
		}
	}

	/**
	 * @When the user shares file/folder :folder with group :group using the webUI
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
		$this->theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
			$folder, "group", "", $group, $maxRetries, $quiet
		);
	}

	/**
	 * @param string $folder
	 * @param string $userOrGroup
	 * @param string $remote
	 * @param string $name
	 * @param int $maxRetries
	 * @param bool $quiet
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
		$folder, $userOrGroup, $remote, $name, $maxRetries = STANDARD_RETRY_COUNT, $quiet = false
	) {
		$this->theUserSharesUsingWebUIWithoutClosingDialog(
			$folder, $userOrGroup, $remote, $name, $maxRetries, $quiet
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
	 * @Then /^group ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the shared with list$/
	 *
	 * @param string $groupName
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function shouldBeListedInTheSharedWithList(
		$groupName,
		$shouldOrNot
	) {
		$should = ($shouldOrNot !== "not");
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		$groupName = \trim($groupName, '""');
		$presence = $this->sharingDialog->isGroupPresentInShareWithList($groupName);
		if ($should) {
			PHPUnit\Framework\Assert::assertTrue(
				$presence,
				"group $groupName is not listed in share with list"
			);
		} else {
			PHPUnit\Framework\Assert::assertFalse(
				$presence,
				"group $groupName is listed in share with list"
			);
		}
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
	 * @When /^the user deletes share with (user|group) ((?:[^']*)|(?:[^"]*)) for the current file$/
	 *
	 * @param string $userOrGroup
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserDeleteShareWithUser($userOrGroup, $name) {
		$this->sharingDialog->deleteShareWith($this->getSession(), $userOrGroup, \trim($name, '""'));
	}

	/**
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
		$this->featureContext->addToListOfCreatedPublicLinks($newName, $linkUrl);
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
		$this->featureContext->addToListOfCreatedPublicLinks($name, $linkUrl);
	}

	/**
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
		$this->featureContext->addToListOfCreatedPublicLinks($name, $linkUrl);
	}

	/**
	 * @When the user changes the expiration of the public link named :linkName of file/folder :name to :date
	 *
	 * @param string $linkName
	 * @param string $name
	 * @param string $date
	 *
	 * @return void
	 * @throws \Exception
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
	 * @When the user changes the expiration of the public link :linkName of file/folder :name to :expiration
	 *
	 * @param string $linkName
	 * @param string $name
	 * @param string $expiration
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserChangesTheExpirationOfThePublicLinkToCertainDate($linkName, $name, $expiration) {
		$session = $this->getSession();
		$this->theUserOpensTheShareDialogForFileFolder($name);
		$this->theUserHasOpenedThePublicLinkShareTab();
		$expiration = \date('d-m-Y', \strtotime($expiration));
		$this->publicSharingPopup = $this->publicShareTab->editLink(
			$session,
			$linkName,
			null,
			null,
			null,
			$expiration
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
	 * @throws \Exception
	 */
	public function theUserAddsTheFollowingEmailAddressesUsingTheWebUI(TableNode $emails) {
		$this->featureContext->verifyTableNodeColumns($emails, ['email']);
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
	 * @throws \Exception
	 */
	public function theUserRemovesTheFollowingEmailAddressesUsingTheWebui(TableNode $emails) {
		$this->featureContext->verifyTableNodeColumns($emails, ['email']);
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
		$this->featureContext->addToListOfCreatedPublicLinks($linkName, $linkUrl);

		$this->featureContext->resetLastShareData();
	}

	/**
	 * @When the user creates a new public link for file/folder :name using the webUI
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
		$this->featureContext->addToListOfCreatedPublicLinks($linkName, $linkUrl);
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
		Assert::assertEquals(
			$expectedWarningMessage,
			$warningMessage,
			__METHOD__
			. " The expected error message on the public link share dialog was '$expectedWarningMessage', but got '$warningMessage' instead."
		);
	}

	/**
	 * @Then the user should see an error message on the public link popup saying :message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function theUserShouldSeeAnErrorMessageOnThPublicLinkPopupSaying($message) {
		// update public-sharing popup, as it might not have been set previously.
		$this->publicSharingPopup = $this->publicShareTab->updateSharingPopup($this->getSession());
		$errormessage = $this->publicSharingPopup->getErrorMessage();
		Assert::assertEquals(
			$message,
			$errormessage,
			__METHOD__
			. " The expected error message on the public link popup was '$message', but got '$errormessage' instead."
		);
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
			Assert::assertContains(
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
	 * @When /^the user sets the sharing permissions of (user|group) ((?:[^']*)|(?:[^"]*)) for ((?:'[^']*')|(?:"[^"]*")) using the webUI to$/
	 * @Given /^the user has set the sharing permissions of (user|group) ((?:'[^']*')|(?:"[^"]*")) for ((?:'[^']*')|(?:"[^"]*")) using the webUI to$/
	 *
	 * @param string $userOrGroup
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
		$userOrGroup, $userName, $fileName, TableNode $permissionsTable
	) {
		$this->featureContext->verifyTableNodeRows(
			$permissionsTable,
			[],
			['share', 'edit', 'create', 'change', 'delete', 'edit', 'secure-view', 'print']
		);
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		$userName = $this->featureContext->substituteInLineCodes(\trim($userName, '""'));
		$this->theUserOpensTheShareDialogForFileFolder(\trim($fileName, '""'));
		$this->sharingDialog->setSharingPermissions(
			$userOrGroup, $userName, $permissionsTable->getRowsHash(), $this->getSession()
		);
	}

	/**
	 * @Then /^the following permissions are seen for ((?:[^']*)|(?:[^"]*)) in the sharing dialog for (user|group) ((?:[^']*)|(?:[^"]*))$/
	 *
	 * @param string $fileName
	 * @param string $userOrGroup
	 * @param string $userName
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
	public function theFollowingPermissionsAreSeenForInTheSharingDialogFor(
		$fileName, $userOrGroup, $userName, TableNode $permissionsTable
	) {
		$this->featureContext->verifyTableNodeRows($permissionsTable, [], ['share', 'edit', 'create', 'change', 'delete']);

		$userName = $this->featureContext->substituteInLineCodes(\trim($userName, '""'));
		$this->theUserOpensTheShareDialogForFileFolder(\trim($fileName, '""'));
		$this->sharingDialog->checkSharingPermissions(
			$userOrGroup, $userName, $permissionsTable->getRowsHash(), $this->getSession()
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
				= SetupHelper::getSystemConfigValue(
					'user.search_min_length'
				);
			$this->oldMinCharactersForAutocomplete = \trim(
				$oldMinCharactersForAutocomplete
			);
		}
		$minCharacters = (int) $minCharacters;
		SetupHelper::setSystemConfig(
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
				= SetupHelper::getSystemConfigValue(
					'sharing.federation.allowHttpFallback'
				);
			$this->oldFedSharingFallbackSetting = \trim(
				$oldFedSharingFallbackSetting
			);
		}
		SetupHelper::setSystemConfig(
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
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
		$lastCreatedLink = \end($createdPublicLinks);
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
	 *
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws \Exception
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
	 * @throws \Exception
	 */
	public function thePublicAccessesPublicLinkWithPasswordUsingTheWebui($password) {
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
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
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
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
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 */
	public function sendShareNotificationByEmailUsingTheWebui($type, $receiver) {
		Assert::assertNotNull(
			$this->sharingDialog, "Sharing Dialog is not open"
		);
		$this->sharingDialog->openShareActionsDropDown($type, $receiver);
		$this->sharingDialog->sendShareNotificationByEmail($this->getSession());
	}

	/**
	 * @When /^the user sends the share notification by email for (user|group) "((?:[^']*)|(?:[^"]*))" using the webUI$/
	 *
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 */
	public function theUserSendsTheShareNotificationByEmailForGroupUsingTheWebui($type, $receiver) {
		$this->sendShareNotificationByEmailUsingTheWebui($type, $receiver);
	}

	/**
	 * @Then /^the user should not be able to send the share notification by email for (user|group) "((?:[^']*)|(?:[^"]*))" using the webUI$/
	 *
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 */
	public function theUserShouldNotBeAbleToSendTheShareNotificationByEmailUsingTheWebui($type, $receiver) {
		$errorMessage = "";
		try {
			$this->sendShareNotificationByEmailUsingTheWebui($type, $receiver);
		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
		}
		Assert::assertContains(
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
		Assert::assertEquals(
			'The password is wrong. Try again.',
			$warningMessage,
			__METHOD__
			. " The expected warning message was 'The password is wrong. Try again.', but got '$warningMessage'."
		);
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
		$lastCreatedLink = \end($createdPublicLinks);
		$lastSharePath = $lastCreatedLink['url'] . '/authenticate';
		$currentPath = $this->getSession()->getCurrentUrl();
		Assert::assertEquals(
			$lastSharePath,
			$currentPath,
			__METHOD__
			. " The url of created public link is '$lastSharePath', but the current url is '$currentPath'"
		);
	}

	/**
	 * @Then only user :userName should be listed in the autocomplete list on the webUI
	 *
	 * @param string $userName
	 *
	 * @return void
	 */
	public function onlyUserNameShouldBeListedInTheAutocompleteList(
		$userName
	) {
		$this->onlyNameShouldBeListedInTheAutocompleteList(
			$this->sharingDialog->userStringsToMatchAutoComplete($userName)
		);
	}

	/**
	 * @Then only group :groupName should be listed in the autocomplete list on the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function onlyGroupNameShouldBeListedInTheAutocompleteList(
		$groupName
	) {
		$this->onlyNameShouldBeListedInTheAutocompleteList(
			$this->sharingDialog->groupStringsToMatchAutoComplete($groupName)
		);
	}

	/**
	 * @param string $autocompleteString the full text expected in the autocomplete item
	 *
	 * @return void
	 */
	public function onlyNameShouldBeListedInTheAutocompleteList(
		$autocompleteString
	) {
		$autocompleteItems = $this->sharingDialog->getAutocompleteItemsList();
		Assert::assertCount(
			1,
			$autocompleteItems,
			"expected 1 autocomplete item but there are " . \count($autocompleteItems)
		);
		Assert::assertContains(
			$autocompleteString,
			$autocompleteItems,
			"'$autocompleteString' not in autocomplete list"
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
					Assert::assertContains(
						$fullDisplayText,
						$autocompleteItems,
						"'$fullDisplayText' not in autocomplete list"
					);
					$numExpectedItems = $numExpectedItems + 1;
				}
			}
		}

		Assert::assertCount(
			$numExpectedItems,
			$autocompleteItems,
			"expected $numExpectedItems in autocomplete list but there are " . \count($autocompleteItems)
		);

		Assert::assertNotContains(
			$notToBeListed,
			$this->sharingDialog->getAutocompleteItemsList(),
			__METHOD__
			. " The autocomplete list contains '$userOrGroup' '$notToBeListed' unexpectedly."
		);
	}

	/**
	 * @Then the users own name should not be listed in the autocomplete list on the webUI
	 *
	 * @return void
	 */
	public function theUsersOwnNameShouldNotBeListedInTheAutocompleteList() {
		$ownDisplayName = $this->sharingDialog->userStringsToMatchAutoComplete(
			$this->filesPage->getMyDisplayname()
		);
		Assert::assertNotContains(
			$ownDisplayName,
			$this->sharingDialog->getAutocompleteItemsList(),
			__METHOD__
			. " The autocomplete list contains the users own name '$ownDisplayName' unexpectedly."
		);
	}

	/**
	 * @Then user :username should be listed in the autocomplete list on the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userShouldBeListedInTheAutocompleteListOnTheWebui($username) {
		$names = $this->sharingDialog->getAutocompleteItemsList();
		Assert::assertContains(
			$this->sharingDialog->userStringsToMatchAutoComplete($username),
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
	 * @throws \Exception
	 */
	public function userShouldNotBeListedInTheAutocompleteListOnTheWebui($username) {
		$names = $this->sharingDialog->getAutocompleteItemsList();
		$userString = $this->sharingDialog->userStringsToMatchAutoComplete($username);
		Assert::assertFalse(
			\in_array($userString, $names),
			"$username ($userString) found in autocomplete list but not expected"
		);
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
		Assert::assertNotContains(
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
		Assert::assertEquals(
			$text,
			$this->sharingDialog->getShareWithTooltip(),
			__METHOD__
			. " Expected tooltip with the text '$text' to be shown near the share-with-field, but got '"
			. $this->sharingDialog->getShareWithTooltip()
			. "' instead."
		);
	}

	/**
	 * @Then the autocomplete list should not be displayed on the webUI
	 *
	 * @return void
	 */
	public function theAutocompleteListShouldNotBeDisplayed() {
		Assert::assertEmpty(
			$this->sharingDialog->getAutocompleteItemsList(),
			__METHOD__
			. " The autocomplete list is unexpectedly displayed on the webUI"
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
		Assert::assertFalse(
			$this->sharingDialog->isUserPresentInShareWithList($username),
			"user $username is present in the list"
		);
	}

	/**
	 * @Then the group :groupName should not be in share with group list
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function theGroupShouldNotBeInShareWithGroupList($groupName) {
		Assert::assertFalse(
			$this->sharingDialog->isGroupPresentInShareWithList($groupName),
			"group $groupName is present in the list"
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
		Assert::assertSame(
			$sharerName,
			$this->filesPage->getTrimmedText($sharingBtn),
			__METHOD__
			. " The expected sharer name to be displayed is '$sharerName', but got '"
			. $this->filesPage->getTrimmedText($sharingBtn)
			. "' instead."
		);
		$sharingDialog = $this->filesPage->openSharingDialog(
			$itemName, $this->getSession()
		);
		Assert::assertSame(
			$sharerName,
			$sharingDialog->getSharerName(),
			__METHOD__
			. " The expected sharer name is '$sharerName', but found '"
			. $sharingDialog->getSharerName()
			. "' instead."
		);
		if ($fileOrFolder === "folder") {
			Assert::assertContains(
				"folder-shared.svg",
				$row->findThumbnail()->getAttribute("style"),
				__METHOD__
				. " 'folder-shared.svg' is expected to be contained in the 'style' attribute of the thumbnail of particular row."
			);
			$detailsDialog = $this->filesPage->getDetailsDialog();
			Assert::assertContains(
				"folder-shared.svg",
				$detailsDialog->findThumbnail()->getAttribute("style"),
				__METHOD__
				. " 'folder-shared.svg' is expected to be contained in the 'style' attribute of the thumbnail of particular details dialog."
			);
		}
		if ($sharedWithGroup !== "") {
			Assert::assertSame(
				$sharedWithGroup,
				$sharingDialog->getSharedWithGroupName(),
				__METHOD__
				. " Expected to be shared with '$sharedWithGroup' '$sharerName', but got '"
				. $sharingDialog->getSharedWithGroupName()
				. "' instead."
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
		Assert::assertSame(
			$state,
			$fileRow->getShareState(),
			" The file/folder '$item' is expected to be in state '$state', but is found in state '"
			. $fileRow->getShareState()
			. "' instead in the shared-with-you page."
		);
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
		Assert::assertTrue(
			$found, "could not find item called $item shared by $sharedBy"
		);
		Assert::assertSame(
			$state,
			$currentState,
			" The file/folder '$item' shared by '$sharedBy' is expected to be state '$state', "
			. "but is actually found in state '$currentState' in the shared-with-you page."
		);
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
			$this->theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
				$fileName, $userOrGroup, "", $shareWith, 2, true
			);
			$sharingWasPossible = true;
		} catch (ElementNotFoundException $e) {
			if ($this->sharingDialog === null) {
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
		Assert::assertFalse(
			$sharingWasPossible,
			__METHOD__
			. " Unexpectedly, it was possible to share the file/folder '$fileName' with '$userOrGroup' '$shareWith'."
		);
	}

	/**
	 * @Then the public should see an error message :errorMsg while accessing last created public link using the webUI
	 *
	 * @param string $errorMsg
	 *
	 * @return void
	 */
	public function thePublicShouldSeeAnErrorMessageWhileAccessingLastCreatedPublicLinkUsingTheWebui($errorMsg) {
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
		$lastCreatedLink = \end($createdPublicLinks);
		$path = \str_replace(
			$this->featureContext->getBaseUrl(),
			"",
			$lastCreatedLink['url']
		);
		$this->generalErrorPage->setPagePath($path);
		$this->generalErrorPage->open();
		$actualErrorMsg = $this->generalErrorPage->getErrorMessage();
		Assert::assertContains(
			$errorMsg,
			$actualErrorMsg,
			__METHOD__
			. " The expected error message was '$errorMsg' but got '$actualErrorMsg' instead."
		);
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
	 * @throws \Exception
	 */
	public function createPublicShareLink($name, $settings = null) {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		//close any open sharing dialog
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (ElementNotFoundException $e) {
			//if there is no dialog open and we try to close it
			//an exception will be thrown, but we do not care
		}
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name, $session
		);
		$this->publicShareTab = $this->sharingDialog->openPublicShareTab($session);
		if ($settings !== null) {
			$this->featureContext->verifyTableNodeRows(
				$settings,
				[],
				['name', 'permission', 'password', 'expiration', 'email', 'personalMessage', 'emailToSelf']
			);
			$settingsArray = $settings->getRowsHash();
			if (\array_key_exists('expiration', $settingsArray) && $settingsArray['expiration'] !== '') {
				$settingsArray['expiration'] = \date('d-m-Y', \strtotime($settingsArray['expiration']));
			}
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
				Assert::assertSame(
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
		Assert::assertContains(
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
		$response = $this->thePublicDownloadsAllTheSharedDataUsingTheWebui();
		Assert::assertEquals(
			200,
			$response->getStatusCode(),
			__METHOD__
			. " The expected status code is '200', but got '"
			. $response->getStatusCode()
			. "' instead."
		);
		$body = $response->getBody()->getContents();

		$user = $this->featureContext->getCurrentUser();
		$password = $this->featureContext->getPasswordForUser($user);

		$this->featureContext->downloadFileAsUserUsingPassword($user, $originalFile, $password);
		$originalContent = $this->featureContext->getResponse()->getBody()->getContents();
		Assert::assertSame(
			$originalContent,
			$body,
			__METHOD__
			. " The content of the file shared by the last public link should be '$originalContent', but got '$body'."
		);
	}

	/**
	 * @When the public downloads all the shared data using the webUI
	 *
	 * @return ResponseInterface
	 */
	public function thePublicDownloadsAllTheSharedDataUsingTheWebui() {
		$url = $this->publicLinkFilesPage->getDownloadUrl();
		return HttpRequestHelper::get($url);
	}

	/**
	 * @Then all the links to download the public share should be the same
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function allThePublicShareDownloadLinkShouldBeSame() {
		$urls = $this->publicLinkFilesPage->getAllDownloadUrls();
		$url = \array_unique($urls);
		Assert::assertCount(1, $url, "Download links are not the same");
	}

	/**
	 * @Then the email address :address should have received an email containing the last shared public link
	 *
	 * @param string $address
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theEmailAddressShouldHaveReceivedAnEmailContainingSharedPublicLink($address) {
		$content = EmailHelper::getBodyOfLastEmail(
			EmailHelper::getLocalMailhogUrl(),
			$address
		);
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
		$lastCreatedPublicLink = \end($createdPublicLinks);
		Assert::assertContains(
			$lastCreatedPublicLink["url"],
			$content,
			__METHOD__
			. " The email content '$content' does not contain '"
			. $lastCreatedPublicLink["url"]
			. "'"
		);
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
		Assert::assertEquals(
			$message,
			$actualMessage,
			__METHOD__
			. " The user should see an error message '$message' on the share dialog, but actually found '$actualMessage'."
		);
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

		// Initialize SetupHelper class
		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
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
			SetupHelper::deleteSystemConfig('user.search_min_length');
		} elseif ($this->oldMinCharactersForAutocomplete !== null) {
			SetupHelper::setSystemConfig(
				'user.search_min_length',
				$this->oldMinCharactersForAutocomplete
			);
		}

		if ($this->oldFedSharingFallbackSetting === "") {
			SetupHelper::deleteSystemConfig(
				'sharing.federation.allowHttpFallback'
			);
		} elseif ($this->oldFedSharingFallbackSetting !== null) {
			SetupHelper::setSystemConfig(
				'sharing.federation.allowHttpFallback',
				$this->oldFedSharingFallbackSetting,
				'boolean'
			);
		}
	}

	/**
	 * @Then the following resources should have share indicators on the webUI
	 *
	 * @param TableNode $resourceTable
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingResourcesShouldHaveShareIndicatorOnTheWebUI(TableNode $resourceTable) {
		$this->featureContext->verifyTableNodeColumnsCount($resourceTable, 1);
		$elementRows = $resourceTable->getRows();
		$elements = $this->featureContext->simplifyArray($elementRows);
		foreach ($elements as $filename) {
			$isMarked = $this->filesPage->isSharedIndicatorPresent(
				$filename, $this->getSession()
			);
			Assert::assertTrue(
				$isMarked,
				"Expected: " . $filename . " to be marked as shared but it's not"
			);
		}
	}

	/**
	 * @Then the following resources should not have share indicators on the webUI
	 *
	 * @param TableNode $resourceTable
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingResourcesShouldNotHaveShareIndicatorOnTheWebUI(TableNode $resourceTable) {
		$this->featureContext->verifyTableNodeColumnsCount($resourceTable, 1);
		$elementRows = $resourceTable->getRows();
		$elements = $this->featureContext->simplifyArray($elementRows);
		foreach ($elements as $filename) {
			$isMarked = $this->filesPage->isSharedIndicatorPresent(
				$filename, $this->getSession()
			);
			Assert::assertFalse(
				$isMarked,
				"Expected: " . $filename . " not to be marked as shared but it is"
			);
		}
	}

	/**
	 * @Then a public link share with name :arg1 should be visible on the webUI
	 *
	 * @param string $expectedLinkEntryName
	 *
	 * @return void
	 */
	public function publicLinkShareWithNameShouldBeVisibleOnTheWebUI($expectedLinkEntryName) {
		$actualNamesArrayOfPublicLinks = $this->publicShareTab->getListedPublicLinksNames();
		Assert::assertTrue(\in_array($expectedLinkEntryName, $actualNamesArrayOfPublicLinks));
	}

	/**
	 * @Then :arg1 public link shares with name :arg2 should be visible on the webUI
	 *
	 * @param string $expectedCount
	 * @param string $expectedLinkEntryName
	 *
	 * @return void
	 */
	public function publicLinkSharesWithNameShouldBeVisibleOnTheWebUI($expectedCount, $expectedLinkEntryName) {
		$actualNamesArrayOfPublicLinks = $this->publicShareTab->getListedPublicLinksNames();
		Assert::assertTrue(\in_array($expectedLinkEntryName, $actualNamesArrayOfPublicLinks));
		Assert::assertEquals(
			\array_count_values($actualNamesArrayOfPublicLinks)[$expectedLinkEntryName],
			$expectedCount
		);
	}

	/**
	 * @When the user closes the federation sharing dialog
	 *
	 * @return void
	 */
	public function theUserClosesFederationShareDialog() {
		$this->filesPage->closeFederationDialog();
	}

	/**
	 * @When the user accepts the pending remote share using the webUI
	 *
	 * @return void
	 */
	public function theUserAcceptsThePendingRemoteSharesUsingTheWebui() {
		$this->sharedWithYouPage->acceptPendingShare();
	}
}
