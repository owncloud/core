<?php declare(strict_types=1);
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
	 * @When /^the user shares (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" ?(?:with displayname "([^"]*)")? using the webUI$/
	 *
	 * @param string $folder
	 * @param string $remote
	 * @param string $user
	 * @param string|null $username
	 * @param int $maxRetries
	 * @param boolean $quiet
	 * @param boolean $expectedToWork
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserSharesFileFolderWithUserUsingTheWebUI(
		string $folder,
		string $remote,
		string $user,
		?string $username = null,
		int $maxRetries = STANDARD_RETRY_COUNT,
		bool $quiet = false,
		bool $expectedToWork = true
	):void {
		$user = $this->featureContext->getActualUsername($user);
		if ($remote === "remote" || $remote === "federated") {
			$user = $this->featureContext->substituteInLineCodes($username, $user);
		}
		$this->theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
			$folder,
			"user",
			$remote,
			$user,
			$maxRetries,
			$quiet,
			$expectedToWork
		);
	}

	/**
	 * @When /^the user tries to share (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" ?(?:with displayname "([^"]*)")? using the webUI$/
	 *
	 * @param string $folder
	 * @param string $remote
	 * @param string $user
	 * @param string|null $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserTriesToShareFileFolderWithUserUsingTheWebUI(
		string $folder,
		string $remote,
		string $user,
		?string $username = null
	):void {
		$this->theUserSharesFileFolderWithUserUsingTheWebUI(
			$folder,
			$remote,
			$user,
			$username,
			STANDARD_RETRY_COUNT,
			false,
			false
		);
	}

	/**
	 * @When /^the user shares (?:file|folder) "([^"]*)" with (?:(remote|federated)\s)?user "([^"]*)" ?(?:with displayname "([^"]*)")? using the webUI without closing the share dialog$/
	 *
	 * @param string $resource
	 * @param string $remote (remote|federated|)
	 * @param string $name
	 * @param string|null $displayname
	 * @param int $maxRetries
	 * @param bool $quiet
	 *
	 * @return void
	 * @throws Exception
	 *
	 */
	public function theUserSharesWithUserWithoutClosingDialog(
		string  $resource,
		string  $remote,
		string  $name,
		?string $displayname = null,
		int     $maxRetries = STANDARD_RETRY_COUNT,
		bool    $quiet = false
	):void {
		if ($remote === "remote" || $remote === "federated") {
			$name = $this->featureContext->substituteInLineCodes($displayname, $name);
		}
		$this->theUserSharesUsingWebUIWithoutClosingDialog($resource, "user", $remote, $name, $maxRetries, $quiet);
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
	 * @throws Exception
	 *
	 */
	public function theUserSharesWithGroupWithoutClosingDialog(
		string $folder,
		string $name,
		int $maxRetries = STANDARD_RETRY_COUNT,
		bool $quiet = false
	):void {
		$this->theUserSharesUsingWebUIWithoutClosingDialog($folder, "group", "", $name, $maxRetries, $quiet);
	}

	/**
	 * @Then /^the expiration date input field should (not |)be visible for the (user|group|federated user) "([^"]*)" ?(?:with displayname "([^"]*)")? in the share dialog$/
	 *
	 * @param string $shouldOrNot
	 * @param string $type
	 * @param string $receiver
	 * @param string|null $displayname
	 *
	 * @return void
	 */
	public function expirationFieldVisibleForUser(string $shouldOrNot, string $type, string $receiver, ?string $displayname = null):void {
		if ($type === "user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->getDisplayNameForUser($receiver);
		} elseif ($type === "federated user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->substituteInLineCodes($displayname, $receiver);
		}
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
	 * @Then /^the expiration date input field should be empty for the (user|group|federated user) "([^"]*)" ?(?:with displayname "([^"]*)")? in the share dialog$/
	 *
	 * @param string $type
	 * @param string $receiver
	 * @param string|null $displayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function expirationFieldEmptyForUser(string $type, string $receiver, ?string $displayname = null):void {
		if ($type === "user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->getDisplayNameForUser($receiver);
		} elseif ($type === "federated user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->substituteInLineCodes($displayname, $receiver);
		}
		$expirationDateInInputField = $this->sharingDialog->getExpirationDateFor($receiver, $type);
		Assert::assertEquals(
			"",
			$expirationDateInInputField,
			__METHOD__
			. " The expiration date input field, for the '$type' '$receiver' , in the share dialog is expected to be empty, but got '$expirationDateInInputField'"
		);
	}

	/**
	 * @When /^the user changes expiration date for share of (user|group|federated user) "([^"]*)" ?(?:with displayname "([^"]*)")? to "([^"]*)" in the share dialog$/
	 *
	 * @param string $type
	 * @param string $receiver
	 * @param string|null $displayname
	 * @param string $days
	 *
	 * @return void
	 */
	public function expirationDateChangedTo(string $type, string $receiver, ?string $displayname = null, string $days = ''):void {
		if ($type === "user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->getDisplayNameForUser($receiver);
		} elseif ($type === "federated user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->substituteInLineCodes($displayname, $receiver);
		}
		$expectedDate = \date('d-m-Y', \strtotime($days));
		$this->sharingDialog->openShareActionsDropDown($type, $receiver);
		$this->sharingDialog->setExpirationDateFor($this->getSession(), $receiver, $type, $expectedDate);
	}

	/**
	 * @Then /^the expiration date input field should be "([^"]*)" for the (user|group|federated user) "([^"]*)" ?(?:with displayname "([^"]*)")? in the share dialog$/
	 *
	 * @param string $days
	 * @param string $type
	 * @param string $receiver
	 * @param string|null $displayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function expirationDateShouldBe(string $days, string $type, string $receiver, ?string $displayname = null):void {
		if ($type === "user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->getDisplayNameForUser($receiver);
		} elseif ($type === "federated user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->substituteInLineCodes($displayname, $receiver);
		}
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
	public function clearExpirationDate(string $userOrGroup, string $receiver):void {
		$receiver = $this->featureContext->getActualUsername($receiver);
		$receiver = $this->featureContext->getDisplayNameForUser($receiver);
		$this->sharingDialog->openShareActionsDropDown($userOrGroup, $receiver);
		$this->sharingDialog->clearExpirationDateFor($this->getSession(), $receiver, $userOrGroup);
	}

	/**
	 * The resource can be a whole path to the file/folder. The test step will open each folder
	 * to reach the final list of resources, and then create the public link for the final
	 * resource.
	 *
	 * @param string $resource
	 * @param string|null $userOrGroup (user|group)
	 * @param string|null $remote (remote|federated|)
	 * @param string|null $name
	 * @param int $maxRetries
	 * @param bool $quiet
	 * @param bool $expectedToWork
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserSharesUsingWebUIWithoutClosingDialog(
		string  $resource,
		?string $userOrGroup,
		?string $remote,
		?string $name,
		int     $maxRetries = STANDARD_RETRY_COUNT,
		bool    $quiet = false,
		bool    $expectedToWork = true
	):void {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
			//we don't care
		}
		// If the resource to share is a path with nested folders, then first
		// open each of the folders until the last resource should be displayed.
		$resourceParts = \explode("/", $resource);
		$numberOfResourceParts = \count($resourceParts);
		foreach ($resourceParts as $key => $resourcePart) {
			// open each folder in the path, so that the last item should be listed
			if ($key === ($numberOfResourceParts - 1)) {
				$finalResource = $resourcePart;
			} else {
				$this->webUIFilesContext->theUserOpensFolderNamedUsingTheWebUI(
					"",
					"folder",
					"'$resourcePart'",
					""
				);
			}
		}
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$finalResource,
			$this->getSession()
		);
		if ($userOrGroup === "user") {
			if ($remote === "remote" || $remote === "federated") {
				$this->sharingDialog->shareWithRemoteUser(
					$name,
					$this->getSession(),
					$quiet,
					$maxRetries
				);
			} else {
				$user = $this->featureContext->substituteInLineCodes($name);
				$name = $this->featureContext->getDisplayNameForUser($user);
				$this->sharingDialog->shareWithUser(
					$name,
					$this->getSession(),
					$quiet,
					$maxRetries
				);
			}
		} else {
			$this->sharingDialog->shareWithGroup(
				$name,
				$this->getSession(),
				$quiet,
				$maxRetries
			);
		}
		if ($expectedToWork) {
			// Use the sharing API to find the share that has been created.
			// And remember the share id so that later steps can know the latest share.
			$currentUser = $this->featureContext->getCurrentUser();
			$shareData = $this->featureContext->getShares($currentUser, $resource);
			$shareId = null;
			// The share might have been moved somewhere else in an earlier test step
			// If so, then getPathOfMovedReceivedShare will know the expected path.
			$expectedPathOfShare = $this->webUIFilesContext->getPathOfMovedReceivedShare();
			if ($expectedPathOfShare === "") {
				// The share should be in its usual path, indicated by "resource" that was passed in.
				$expectedPathOfShare = $resource;
			}
			$slashExpectedPathOfShare = "/" . \trim($expectedPathOfShare, "/");
			foreach ($shareData as $shareItem) {
				$sharePath = (string) $shareItem->path;
				$slashSharePath = "/" . \trim($sharePath, "/");
				// The user might have navigated down multiple folders /a/b/c and shared "d".
				// Normally the share path will be /a/b/c/d
				// But the user might have received "a" as a share, but also "b" as a separate share.
				// (maybe the two shares were to two different groups and the user is a member of both)
				// Then the user will also have a path to "d" that is b/c/d only.
				// And the share response actually provides that path.
				// So match any share path like /b/c/d or /c/d if it appears at the end of the expected path,
				// even though it is not the whole of the expected path.
				// Note: if (str_ends_with($expectedPathOfShare, $slashSharePath)) - will work from PHP8
				if (substr($slashExpectedPathOfShare, -\strlen($slashSharePath)) === $slashSharePath) {
					$shareId = (string) $shareItem->id;
					break;
				}
			}
			if ($shareId === null) {
				// Fail early here. We know that there was some trouble with the share.
				// It will be confusing if we continue to later steps that try to use
				// a non-existent share id.
				throw new Exception(
					__METHOD__ . " share with path '$resource' for user '$currentUser' could not be found."
				);
			}
			$this->featureContext->setLastShareIdOf($currentUser, $shareId);
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
	 * @throws Exception
	 */
	public function theUserSharesFileFolderWithGroupUsingTheWebUI(
		string $folder,
		string $group,
		int $maxRetries = STANDARD_RETRY_COUNT,
		bool $quiet = false
	):void {
		$this->theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
			$folder,
			"group",
			"",
			$group,
			$maxRetries,
			$quiet
		);
	}

	/**
	 * @param string $folder
	 * @param string|null $userOrGroup
	 * @param string|null $remote
	 * @param string|null $name
	 * @param int $maxRetries
	 * @param bool $quiet
	 * @param bool $expectedToWork
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
		string $folder,
		?string $userOrGroup,
		?string $remote,
		?string $name,
		int $maxRetries = STANDARD_RETRY_COUNT,
		bool $quiet = false,
		bool $expectedToWork = true
	):void {
		$this->theUserSharesUsingWebUIWithoutClosingDialog(
			$folder,
			$userOrGroup,
			$remote,
			$name,
			$maxRetries,
			$quiet,
			$expectedToWork
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
	 * @throws Exception
	 */
	public function theUserOpensTheShareDialogForFileFolder(string $name):void {
		$this->filesPage->waitTillPageIsloaded($this->getSession());
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$name,
			$this->getSession()
		);
	}

	/**
	 * @Then /^group ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the shared with list$/
	 *
	 * @param string $groupName
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldBeListedInTheSharedWithList(
		string $groupName,
		string $shouldOrNot
	):void {
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
	public function theUserHasOpenedThePublicLinkShareTab():void {
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
	public function theUserDeleteShareWithUser(string $userOrGroup, string $name):void {
		$name = \trim($name, '""');
		if ($userOrGroup === "user") {
			$name = $this->featureContext->getDisplayNameForUser($name);
		}
		$this->sharingDialog->deleteShareWith($this->getSession(), $userOrGroup, $name);
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
	public function theUserHasRenamedThePublicLinkNameFromOldNameToNewName(string $oldName, string $newName):void {
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
	public function theUserOpensThePublicLinkEditDialogForTheLinkName(string $linkName):void {
		$this->publicSharingPopup = $this->publicShareTab->openSharingPopupByLinkName($linkName, $this->getSession());
	}

	/**
	 * @When the user does not save any changes in the edit public link share popup
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserDoesNotSaveAnyChangeInEditPublicLinkSharePopup():void {
		$this->publicSharingPopup->cancel();
	}

	/**
	 * @When the user enters the password :password on the edit public link share popup for the link
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function theUserEntersThePasswordForTheLink(string $password):void {
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
	public function theUserChangesThePasswordOfThePublicLinkNamedTo(string $name, string $newPassword):void {
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
	public function theUserChangesThePermissionOfThePublicLinkNamedTo(string $name, string $newPermission):void {
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
	 * @throws Exception
	 */
	public function theUserChangeTheExpirationOfThePublicLinkNamedForTo(string $linkName, string $name, string $date):void {
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
	 * @throws Exception
	 */
	public function theUserChangesTheExpirationOfThePublicLinkToCertainDate(string $linkName, string $name, string $expiration):void {
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
	public function theUserOpensTheCreatePublicLinkSharePopup():void {
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
	 * @throws Exception
	 */
	public function theUserAddsTheFollowingEmailAddressesUsingTheWebUI(TableNode $emails):void {
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
	 * @throws Exception
	 */
	public function theUserRemovesTheFollowingEmailAddressesUsingTheWebui(TableNode $emails):void {
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
	public function createsThePublicLinkUsingTheWebUI():void {
		$linkName = $this->publicSharingPopup->getLinkName();

		$this->publicSharingPopup->save();
		$this->publicSharingPopup->waitForAjaxCallsToStartAndFinish($this->getSession());

		$linkUrl = $this->publicShareTab->getLinkUrl($linkName);
		$this->featureContext->addToListOfCreatedPublicLinks($linkName, $linkUrl);

		$this->featureContext->resetLastPublicShareData();
	}

	/**
	 * @When the user creates a new public link for file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesANewPublicLinkForFileFolderUsingTheWebUI(string $name):void {
		$this->theUserCreatesANewPublicLinkForFileFolderUsingTheWebUIWith($name);
	}

	/**
	 * @When the user creates a read only public link for file/folder :name using the quick action button
	 * @Given the user has created a read only public link for file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesAReadOnlyPublicLinkForFolderUsingTheQuickActionButton(string $name):void {
		$this->createReadOnlyPublicShareLinkUsingQuickAction($name);
		$this->theUserOpensTheShareDialogForFileFolder($name);
		$linkTab = $this->sharingDialog->openPublicShareTab($this->getSession());
		$linkName = $linkTab->getNameOfFirstPublicLink($this->getSession());
		$linkUrl = $linkTab->getLinkUrl($linkName);
		$this->featureContext->addToListOfCreatedPublicLinks($linkName, $linkUrl, $name);
	}

	/**
	 * @When the user creates a new public link for file/folder :name using the webUI with
	 * @Given the user has created a new public link for file/folder :name using the webUI with
	 *
	 * The name can be a whole path to the file/folder. The test step will open each folder
	 * to reach the final list of resources, and then create the public link for the final
	 * resource.
	 *
	 * @param string $name
	 * @param TableNode|null $settings table with the settings and no header
	 *                                 possible settings: name, permission,
	 *                                 password, expiration, email, emailToSelf, personalMessage
	 *                                 the permissions values has to be written exactly
	 *                                 the way its written in the UI
	 *                                 Setting emailToSelf will send a copy of email to the link creator
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesANewPublicLinkForFileFolderUsingTheWebUIWith(
		string $name,
		?TableNode $settings = null
	):void {
		$nameParts = \explode("/", $name);
		$numberOfNameParts = \count($nameParts);
		foreach ($nameParts as $key => $namePart) {
			// open each folder in the path, so that the last item should be listed
			if ($key === ($numberOfNameParts - 1)) {
				$finalName = $namePart;
			} else {
				$this->webUIFilesContext->theUserOpensFolderNamedUsingTheWebUI(
					"",
					"folder",
					"'$namePart'",
					""
				);
			}
		}
		$linkName = $this->createPublicShareLink($finalName, $settings);
		$linkUrl = $this->publicShareTab->getLinkUrl($linkName);
		$urlParts = \explode("/", $linkUrl);
		$shareToken = \end($urlParts);
		// Find the share id of the share that has this share token.
		// We want to remember it so that later "Then" steps can check
		// attributes of the "last public link share" by using the share id to
		// access the sharing API.
		$currentUser = $this->featureContext->getCurrentUser();
		$shareData = $this->featureContext->getShares($currentUser, $name);
		$shareId = null;
		foreach ($shareData as $shareItem) {
			if ((string) $shareItem->token === $shareToken) {
				$shareId = (string) $shareItem->id;
				break;
			}
		}
		if ($shareId === null) {
			// Fail early here. We know that there was some trouble with the share.
			// It will be confusing if we continue to later steps that try to use
			// a non-existent share id.
			throw new Exception(
				__METHOD__ . " share with token '$shareToken' for user '$currentUser' could not be found."
			);
		}
		$this->featureContext->setLastPublicLinkShareId($shareId);
		$this->featureContext->addToListOfCreatedPublicLinks($linkName, $linkUrl, $name);
	}

	/**
	 * @When the user tries to create a new public link for file/folder :name using the webUI with
	 * @When the user tries to create a new public link for file/folder :name using the webUI
	 *
	 * @param string $name
	 * @param TableNode|null $settings table with the settings and no header
	 *                            	   possible settings: name, permission,
	 *                                 password, expiration, email
	 *                                 the permissions values has to be written exactly
	 *                                 the way its written in the UI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserTriesToCreateANewPublicLinkForFileFolderUsingTheWebUIWith(
		string $name,
		?TableNode $settings = null
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
		string $expectedWarningMessage
	):void {
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
	public function theUserShouldSeeAnErrorMessageOnThPublicLinkPopupSaying(string $message):void {
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
	public function thePublicLinkShouldNotHaveBeenGenerated():void {
		try {
			$this->publicShareTab->getLinkUrl($this->linkName);
		} catch (Exception $e) {
			Assert::assertStringContainsString(
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
	public function theUserClosesTheShareDialog():void {
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
	public function theUserTypesInTheShareWithField(string $input):void {
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
	 * @throws Exception
	 */
	public function theUserSetsTheSharingPermissionsOfForOnTheWebUI(
		string $userOrGroup,
		string $userName,
		string $fileName,
		TableNode $permissionsTable
	):void {
		$this->featureContext->verifyTableNodeRows(
			$permissionsTable,
			[],
			['share', 'edit', 'create', 'change', 'delete', 'edit', 'secure-view', 'print']
		);
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		$userName = $this->featureContext->substituteInLineCodes(\trim($userName, '""'));
		$userAdditionalInfoFromAppConfig = \TestHelpers\AppConfigHelper::getAppConfig(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			'core',
			'user_additional_info_field',
			$this->featureContext->getStepLineRef()
		);
		if ($userOrGroup === "user") {
			$userNameActual = $this->featureContext->getActualUsername($userName);
			$userName = $this->featureContext->getDisplayNameForUser($userNameActual);
			if ($userAdditionalInfoFromAppConfig["value"] === "id") {
				$userName = $userName . " (" . $userNameActual . ")";
			}
		}
		$this->theUserOpensTheShareDialogForFileFolder(\trim($fileName, '""'));
		$this->sharingDialog->setSharingPermissions(
			$userOrGroup,
			$userName,
			$permissionsTable->getRowsHash(),
			$this->getSession()
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
	 * @throws Exception
	 */
	public function theFollowingPermissionsAreSeenForInTheSharingDialogFor(
		string $fileName,
		string $userOrGroup,
		string $userName,
		TableNode $permissionsTable
	):void {
		$this->featureContext->verifyTableNodeRows($permissionsTable, [], ['share', 'edit', 'create', 'change', 'delete']);

		$userName = $this->featureContext->substituteInLineCodes(\trim($userName, '""'));
		if ($userOrGroup === "user") {
			$userName = $this->featureContext->getDisplayNameForUser($userName);
		}
		$this->theUserOpensTheShareDialogForFileFolder(\trim($fileName, '""'));
		$this->sharingDialog->checkSharingPermissions(
			$userOrGroup,
			$userName,
			$permissionsTable->getRowsHash(),
			$this->getSession()
		);
	}

	/**
	 * @When the user accepts the offered federated shares using the webUI
	 * @Given the user has accepted the offered federated shares
	 *
	 * @return void
	 */
	public function theUserAcceptsTheOfferedFederatedShares():void {
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
	 * @throws Exception
	 */
	public function setMinCharactersForAutocomplete(string $minCharacters):void {
		if ($this->oldMinCharactersForAutocomplete === null) {
			$oldMinCharactersForAutocomplete
				= SetupHelper::getSystemConfigValue(
					'user.search_min_length',
					$this->featureContext->getStepLineRef()
				);
			$this->oldMinCharactersForAutocomplete = \trim(
				$oldMinCharactersForAutocomplete
			);
		}
		SetupHelper::setSystemConfig(
			'user.search_min_length',
			$minCharacters,
			$this->featureContext->getStepLineRef()
		);
	}

	/**
	 * @Given the administrator has allowed http fallback for federation sharing
	 *
	 * @return void
	 * @throws Exception
	 */
	public function allowHttpFallbackForFedSharing():void {
		if ($this->oldFedSharingFallbackSetting === null) {
			$oldFedSharingFallbackSetting
				= SetupHelper::getSystemConfigValue(
					'sharing.federation.allowHttpFallback',
					$this->featureContext->getStepLineRef()
				);
			$this->oldFedSharingFallbackSetting = \trim(
				$oldFedSharingFallbackSetting
			);
		}
		SetupHelper::setSystemConfig(
			'sharing.federation.allowHttpFallback',
			'true',
			$this->featureContext->getStepLineRef(),
			'boolean'
		);
	}

	/**
	 * @When the user declines the offered federated shares using the webUI
	 * @Given the user has declined the offered federated shares
	 *
	 * @return void
	 */
	public function theUserDeclinesTheOfferedFederatedShares():void {
		foreach (\array_reverse($this->filesPage->getOcDialogs()) as $ocDialog) {
			$ocDialog->clickButton($this->getSession(), 'Cancel');
		}
	}

	/**
	 * @Given the administrator has :action public link quick action
	 *
	 * @param string $action
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enablePublicLinkQuickAction(string $action):void {
		SetupHelper::setSystemConfig(
			'sharing.showPublicLinkQuickAction',
			($action === "enabled") ? 'true' : 'false',
			$this->featureContext->getStepLineRef(),
			'boolean'
		);
	}

	/**
	 * @When the public accesses the last created public link using the webUI
	 * @Given the public has accessed the last created public link using the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePublicAccessesTheLastCreatedPublicLinkUsingTheWebUI():void {
		$lastCreatedLinkUrl = $this->featureContext->getLastCreatedPublicLinkUrl();
		$path = \str_replace(
			$this->featureContext->getBaseUrl(),
			"",
			$lastCreatedLinkUrl
		);
		$this->publicLinkFilesPage->setPagePath($path);
		$this->publicLinkFilesPage->open();
		$this->publicLinkFilesPage->waitTillPageIsLoaded($this->getSession());
		$this->webUIGeneralContext->setCurrentPageObject($this->publicLinkFilesPage);
	}

	/**
	 * @Then add to your owncloud button should be displayed on the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAddToYourOwncloudButtonShouldBeVisible():void {
		$isPresent = $this->publicLinkFilesPage->isAddtoServerButtonPresent();
		Assert::assertTrue(
			$isPresent,
			__METHOD__
			. " The add to your owncloud button is not present unexpectedly."
		);
	}

	/**
	 * @Then add to your owncloud button should not be displayed on the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAddToYourOwncloudButtonShouldNotBeVisible():void {
		$isPresent = $this->publicLinkFilesPage->isAddtoServerButtonPresent();
		Assert::assertFalse(
			$isPresent,
			__METHOD__
			. " The add to your owncloud button is present unexpectedly."
		);
	}

	/**
	 * @When the public adds the public link to :server as user :username using the webUI
	 * @Given the public has added the public link to :server as user :username using the webUI
	 *
	 * @param string $server
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePublicAddsThePublicLinkToUsingTheWebUI(
		string $server,
		string $username
	):void {
		if (!$this->publicLinkFilesPage->isOpen()) {
			throw new Exception('Not on public link page!');
		}
		if ($server === '%remote_server%') {
			$server = $this->featureContext->substituteInLineCodes($server);
			$this->publicLinkFilesPage->addToServer($server);
		} elseif ($server === '%local_server%') {
			$this->publicLinkFilesPage->saveToSameServer();
		} else {
			throw new Exception(
				"Invalid server provided '" . $server . "'. " .
				"Either should be '%remote_server%' or '%local_server%'"
			);
		}
		// addToServer and saveToSameServer takes us from the public link page to the login page
		// of the remote and local server respectively, waiting for us to login.
		$actualUsername = $this->featureContext->getActualUsername($username);
		$password = $this->featureContext->getUserPassword($actualUsername);
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
	 * @throws Exception
	 */
	public function userReactsToShareOfferedByUsingWebUI(
		string $action,
		string $share,
		string $offeredBy
	):void {
		$offeredBy = $this->featureContext->getActualUsername($offeredBy);
		$offeredByUserDisplayName = $this->featureContext->getDisplayNameForUser($offeredBy);
		$this->webUIFilesContext->theUserBrowsesToTheSharedWithYouPage();
		$fileRows = $this->sharedWithYouPage->findAllFileRowsByName(
			$share,
			$this->getSession()
		);

		$found = false;
		foreach ($fileRows as $fileRow) {
			$mobileResolution = getenv("MOBILE_RESOLUTION");
			// checking if MOBILE_RESOLUTION is set
			if (!empty($mobileResolution)) {
				// getting inner html which contains sharer name in between <span> tag
				// Sharer name is not displayed in mobile resolution so we have to
				// extract it from inner html.
				// eg: <span> Brian</span>
				$tempStr = $fileRow->getSharer();
				// this regex will match text between <span></span> tag
				$pattern = "#<\s*?span\b[^>]*>(.*?)</span\b[^>]*>#s";
				// this built-in function serves matches in different format in multi-dim array
				// we want only the string between tags so we will use second row ([1][...])
				// of this multi-dim array to search for sharer name
				preg_match_all($pattern, $tempStr, $sharerMatch);
				$sharerMatch[1][1] = trim($sharerMatch[1][1]);
				if ($offeredByUserDisplayName === $sharerMatch[1][1]) {
					if (\substr($action, 0, 6) === "accept") {
						$fileRow->acceptShare($this->getSession());
					} else {
						$fileRow->declineShare($this->getSession());
					}
					$found = true;
					break;
				}
			} elseif ($offeredByUserDisplayName === $fileRow->getSharer()) {
				if (\substr($action, 0, 6) === "accept") {
					$fileRow->acceptShare($this->getSession());
				} else {
					$fileRow->declineShare($this->getSession());
				}
				$found = true;
				break;
			}
		}
		Assert::assertTrue(
			$found,
			__METHOD__ . " could not find share '$share' offered by '$offeredByUserDisplayName'"
		);
	}

	/**
	 * @When the public accesses the last created public link with password :password using the webUI
	 *
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePublicAccessesPublicLinkWithPasswordUsingTheWebui(string $password):void {
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
	public function thePublicTriesToAccessPublicLinkWithWrongPasswordUsingTheWebui(string $wrongPassword):void {
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
	public function theUserRemovesThePublicLinkOfFileUsingTheWebui(string $entryName):void {
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$entryName,
			$session
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
	public function theUserCancelsTheRemoveOperationOfFileUsingWebui(string $entryName):void {
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$entryName,
			$session
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
	public function removesPublicLinkAtCertainPosition(int $number, string $entryName):void {
		$session = $this->getSession();
		$this->sharingDialog = $this->filesPage->openSharingDialog(
			$entryName,
			$session
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
	public function sendShareNotificationByEmailUsingTheWebui(string $type, string $receiver):void {
		if ($type === "user") {
			$receiver = $this->featureContext->getActualUsername($receiver);
			$receiver = $this->featureContext->getDisplayNameForUser($receiver);
		}
		Assert::assertNotNull(
			$this->sharingDialog,
			"Sharing Dialog is not open"
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
	public function theUserSendsTheShareNotificationByEmailForGroupUsingTheWebui(string $type, string $receiver):void {
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
	public function theUserShouldNotBeAbleToSendTheShareNotificationByEmailUsingTheWebui(string $type, string $receiver):void {
		$errorMessage = "";
		try {
			$this->sendShareNotificationByEmailUsingTheWebui($type, $receiver);
		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
		}
		Assert::assertStringContainsString(
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
	public function thePublicShouldNotGetAccessToPublicShareFile():void {
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
		string $userName
	):void {
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
		string $groupName
	):void {
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
		string $autocompleteString
	):void {
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
		string $requiredString
	):void {
		$this->allUsersAndGroupsThatContainTheStringInTheirNameShouldBeListedInTheAutocompleteListExcept(
			$requiredString,
			'user',
			''
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
		string $requiredString,
		string $userOrGroup,
		string $notToBeListed
	):void {
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
	public function theUsersOwnNameShouldNotBeListedInTheAutocompleteList():void {
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
	 * @throws Exception
	 */
	public function userShouldBeListedInTheAutocompleteListOnTheWebui(string $username):void {
		$names = $this->sharingDialog->getAutocompleteItemsList();
		Assert::assertContains(
			$this->sharingDialog->userStringsToMatchAutoComplete($username),
			$names,
			"$username not found in autocomplete list"
		);
	}

	/**
	 * @Then the public link quick action button should be displayed for folder/file :name on the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function publicLinkQuickActionShouldBeDisplayedOnTheWebui(string $name):void {
		$isDisplayed = $this->filesPage->isPublicLinkQuickActionVisible($name);
		Assert::assertTrue(
			$isDisplayed,
			"Public link quick action was expected to be displayed but is not"
		);
	}

	/**
	 * @Then the public link quick action button should not be displayed for folder/file :name on the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function publicLinkQuickActionShouldNotBeDisplayedOnTheWebui(string $name):void {
		$isDisplayed = $this->filesPage->isPublicLinkQuickActionVisible($name);
		Assert::assertFalse(
			$isDisplayed,
			"Public link quick action was not expected to be displayed but is"
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
	public function userShouldNotBeListedInTheAutocompleteListOnTheWebui(string $username):void {
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
	public function groupShouldNotBeListedInTheAutocompleteListOnTheWebui(string $groupName):void {
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
	public function aTooltipWithTheTextShouldBeShownNearTheShareWithField(string $text):void {
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
	public function theAutocompleteListShouldNotBeDisplayed():void {
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
	public function theUserShouldNotBeInShareWithUserList(string $username):void {
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
	public function theGroupShouldNotBeInShareWithGroupList(string $groupName):void {
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
	 * @throws Exception
	 */
	public function fileFolderShouldBeMarkedAsSharedBy(
		string $fileOrFolder,
		string $itemName,
		string $sharedWithGroup,
		string $sharerName
	):void {
		$sharerName = $this->featureContext->getActualUsername($sharerName);
		$sharerName = $this->featureContext->getDisplayNameForUser($sharerName);
		//close any open sharing dialog
		//if there is no dialog open and we try to close it
		//an exception will be thrown, but we do not care
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
		}

		$row = $this->filesPage->findFileRowByName($itemName, $this->getSession());
		$sharingBtn = $row->findSharingButton();
		$mobileResolution = getenv("MOBILE_RESOLUTION");
		// checking if MOBILE_RESOLUTION is set and skip this step if true as
		// in mobile resolution sharer name is not displayed in file row
		if (empty($mobileResolution)) {
			Assert::assertSame(
				$sharerName,
				$this->filesPage->getTrimmedText($sharingBtn),
				__METHOD__
				. " The expected sharer name to be displayed is '$sharerName', but got '"
				. $this->filesPage->getTrimmedText($sharingBtn)
				. "' instead."
			);
		}
		$sharingDialog = $this->filesPage->openSharingDialog(
			$itemName,
			$this->getSession()
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
			Assert::assertStringContainsString(
				"folder-shared.svg",
				$row->findThumbnail()->getAttribute("style"),
				__METHOD__
				. " 'folder-shared.svg' is expected to be contained in the 'style' attribute of the thumbnail of particular row."
			);
			$detailsDialog = $this->filesPage->getDetailsDialog();
			Assert::assertStringContainsString(
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
		$this->filesPage->closeDetailsDialog();
	}

	/**
	 * @Then file/folder :item should be in state :state in the shared-with-you page on the webUI
	 *
	 * @param string $item
	 * @param string $state
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertShareIsInStateOnWebUI(string $item, string $state):void {
		$this->webUIFilesContext->theUserBrowsesToTheSharedWithYouPage();
		$fileRow = $this->sharedWithYouPage->findFileRowByName(
			$item,
			$this->getSession()
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
	 * @throws Exception
	 */
	public function assertShareSharedByIsInStateOnWebUI(string $item, string $sharedBy, string $state):void {
		$sharedBy = $this->featureContext->getActualUsername($sharedBy);
		$sharedByUserDisplayName = $this->featureContext->getDisplayNameForUser($sharedBy);

		$this->webUIFilesContext->theUserBrowsesToTheSharedWithYouPage();
		$fileRows = $this->sharedWithYouPage->findAllFileRowsByName(
			$item,
			$this->getSession()
		);
		$found = false;
		$currentState = null;
		foreach ($fileRows as $fileRow) {
			if ($sharedByUserDisplayName === $fileRow->getSharer()) {
				$found = true;
				$currentState = $fileRow->getShareState();
				break;
			}
		}
		Assert::assertTrue(
			$found,
			"could not find item called $item shared by $sharedByUserDisplayName"
		);
		Assert::assertSame(
			$state,
			$currentState,
			" The file/folder '$item' shared by '$sharedByUserDisplayName' is expected to be state '$state', "
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
	 * @throws Exception
	 */
	public function assertSharesIsInStateOnWebUIAfterPageReload(string $item, string $state):void {
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
	 * @throws Exception
	 */
	public function thePublicLinkWithNameShouldNotBeInPublicLinksList(string $entryName):void {
		$this->sharingDialog->checkThatNameIsNotInPublicLinkList($this->getSession(), $entryName);
	}

	/**
	 * @Then the public link with name :entryName should be in the public links list on the webUI
	 *
	 * @param string $entryName
	 *
	 * @return void
	 */
	public function thePublicLinkWithNameShouldBeInPublicLinksList(string $entryName):void {
		$isPresent = $this->sharingDialog->checkThatNameIsInPublicLinkList($this->getSession(), $entryName);
		Assert::assertTrue($isPresent, "Expected " . $entryName . " in public link lists, but not found.");
	}

	/**
	 * @Then the number of public links should be :count
	 *
	 * @param integer $count
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theNumberOfPublicLinksShouldBe(int $count):void {
		$this->sharingDialog->checkPublicLinkCount($this->getSession(), $count);
	}

	/**
	 * @Then /^it should not be possible to share (?:file|folder) "([^"]*)"(?: with (user|group) "([^"]*)")? using the webUI$/
	 *
	 * @param string $fileName
	 * @param string|null $userOrGroup
	 * @param string|null $shareWith
	 *
	 * @return void
	 * @throws Exception
	 */
	public function itShouldNotBePossibleToShareFileFolderUsingTheWebUI(
		string $fileName,
		?string $userOrGroup = null,
		?string $shareWith = null
	):void {
		if ($userOrGroup === "user") {
			$receiverDisplay = $this->featureContext->getDisplayNameForUser($shareWith);
		} else {
			$receiverDisplay = $shareWith;
		}
		$sharingWasPossible = false;
		try {
			$this->theUserSharesFileFolderWithUserOrGroupUsingTheWebUI(
				$fileName,
				$userOrGroup,
				"",
				$shareWith,
				2,
				true
			);
			$sharingWasPossible = true;
		} catch (ElementNotFoundException $e) {
			if ($this->sharingDialog === null) {
				$shareWithText = "";
			} else {
				if ($userOrGroup === "user") {
					$shareWithText = $this->sharingDialog->userStringsToMatchAutoComplete($receiverDisplay);
				} else {
					$shareWithText = $this->sharingDialog->groupStringsToMatchAutoComplete($receiverDisplay);
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
			. " Unexpectedly, it was possible to share the file/folder '$fileName' with '$userOrGroup' '$receiverDisplay'."
		);
	}

	/**
	 * @Then the public should see an error message :errorMsg while accessing last created public link using the webUI
	 *
	 * @param string $errorMsg
	 *
	 * @return void
	 */
	public function thePublicShouldSeeAnErrorMessageWhileAccessingLastCreatedPublicLinkUsingTheWebui(string $errorMsg):void {
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
		Assert::assertStringContainsString(
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
	 * @throws Exception
	 */
	public function createPublicShareLink(string $name, ?TableNode $settings = null):string {
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
			$name,
			$session
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
					$settingsArray ['name'],
					$linkName,
					"set and retrieved public link names are not the same"
				);
			}
		} else {
			$linkName = $this->publicShareTab->createLink($this->getSession());
		}
		return $linkName;
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createReadOnlyPublicShareLinkUsingQuickAction(string $name):void {
		$this->filesPage->clickOnPublicShareQuickAction($name);
	}

	/**
	 * @Then the text preview of the public link should contain :content
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function theTextPreviewOfThePublicLinkShouldContain(string $content):void {
		$previewText = $this->publicLinkFilesPage->getPreviewText();
		Assert::assertStringContainsString(
			$content,
			$previewText,
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
	public function theContentOfTheFileSharedByLastPublicLinkShouldBeTheSameAs(string $originalFile):void {
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
	public function thePublicDownloadsAllTheSharedDataUsingTheWebui():ResponseInterface {
		$url = $this->publicLinkFilesPage->getDownloadUrl();
		return HttpRequestHelper::get(
			$url,
			$this->featureContext->getStepLineRef()
		);
	}

	/**
	 * @Then all the links to download the public share should be the same
	 *
	 * @return void
	 * @throws Exception
	 */
	public function allThePublicShareDownloadLinkShouldBeSame():void {
		$urls = $this->publicLinkFilesPage->getAllDownloadUrls();
		$url = \array_unique($urls);
		Assert::assertCount(1, $url, "Download links are not the same");
	}

	/**
	 * @Then /^the email address "(?P<address>[^"]*)" should have received an email containing the last shared public link$/
	 *
	 * @param string|null $address
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theEmailAddressShouldHaveReceivedAnEmailContainingSharedPublicLink(?string $address):void {
		$content = EmailHelper::getBodyOfLastEmail(
			EmailHelper::getLocalMailhogUrl(),
			$address,
			$this->featureContext->getStepLineRef()
		);
		$createdPublicLinks = $this->featureContext->getCreatedPublicLinks();
		$lastCreatedPublicLink = \end($createdPublicLinks);
		Assert::assertStringContainsString(
			$lastCreatedPublicLink["url"],
			$content,
			__METHOD__
			. " The email content '$content' does not contain '"
			. $lastCreatedPublicLink["url"]
			. "'"
		);
	}

	/**
	 * @Then /^the email address of user "(?P<user>[^"]*)" should have received an email containing the last shared public link$/
	 *
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theEmailAddressOfUserShouldHaveReceivedAnEmailContainingSharedPublicLink(?string $user):void {
		$this->theEmailAddressShouldHaveReceivedAnEmailContainingSharedPublicLink(
			$this->featureContext->getEmailAddressForUser($user)
		);
	}

	/**
	 * @Then the user should see an error message on the share dialog saying :message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function theUserShouldSeeAnErrorMessageOnTheShareDialogSaying(string $message):void {
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
	public function before(BeforeScenarioScope $scope):void {
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
	 * @throws Exception
	 */
	public function tearDownScenario():void {
		//TODO make a function that can be used for different settings
		if ($this->oldMinCharactersForAutocomplete === "") {
			SetupHelper::deleteSystemConfig(
				'user.search_min_length',
				$this->featureContext->getStepLineRef()
			);
		} elseif ($this->oldMinCharactersForAutocomplete !== null) {
			SetupHelper::setSystemConfig(
				'user.search_min_length',
				$this->oldMinCharactersForAutocomplete,
				$this->featureContext->getStepLineRef()
			);
		}

		if ($this->oldFedSharingFallbackSetting === "") {
			SetupHelper::deleteSystemConfig(
				'sharing.federation.allowHttpFallback',
				$this->featureContext->getStepLineRef()
			);
		} elseif ($this->oldFedSharingFallbackSetting !== null) {
			SetupHelper::setSystemConfig(
				'sharing.federation.allowHttpFallback',
				$this->oldFedSharingFallbackSetting,
				$this->featureContext->getStepLineRef(),
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
	 * @throws Exception
	 */
	public function theFollowingResourcesShouldHaveShareIndicatorOnTheWebUI(TableNode $resourceTable):void {
		$this->featureContext->verifyTableNodeColumnsCount($resourceTable, 1);
		$elementRows = $resourceTable->getRows();
		$elements = $this->featureContext->simplifyArray($elementRows);
		foreach ($elements as $filename) {
			$isMarked = $this->filesPage->isSharedIndicatorPresent(
				$filename,
				$this->getSession()
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
	 * @throws Exception
	 */
	public function theFollowingResourcesShouldNotHaveShareIndicatorOnTheWebUI(TableNode $resourceTable):void {
		$this->featureContext->verifyTableNodeColumnsCount($resourceTable, 1);
		$elementRows = $resourceTable->getRows();
		$elements = $this->featureContext->simplifyArray($elementRows);
		foreach ($elements as $filename) {
			$isMarked = $this->filesPage->isSharedIndicatorPresent(
				$filename,
				$this->getSession()
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
	public function publicLinkShareWithNameShouldBeVisibleOnTheWebUI(string $expectedLinkEntryName):void {
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
	public function publicLinkSharesWithNameShouldBeVisibleOnTheWebUI(string $expectedCount, string $expectedLinkEntryName):void {
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
	public function theUserClosesFederationShareDialog():void {
		$this->filesPage->closeFederationDialog();
	}

	/**
	 * @When the user accepts the pending federated share using the webUI
	 *
	 * @return void
	 */
	public function theUserAcceptsThePendingFederatedShareUsingTheWebui():void {
		$this->sharedWithYouPage->acceptPendingShare();
	}

	/**
	 * @Then the user should not see the public link share tab on the webUI
	 *
	 * @return void
	 */
	public function userShouldNotBeAbleToCreateNewPublicLink():void {
		$is_visible = $this->sharingDialog->isPublicLinkTabVisible();
		Assert::assertFalse($is_visible, "Public link tab is expected to be not present but found visible.");
	}

	/**
	 * @Then the user should not see the create public link button on the webUI
	 *
	 * @return void
	 */
	public function theUserShouldSeeCreatePublicLinkButtonOnTheWebui():void {
		$is_visible = $this->publicShareTab->isCreateLinkShareButtonPresent();
		Assert::assertFalse($is_visible, "Create public link button is expected to be not present but found visible.");
	}
}
