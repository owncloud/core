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
use Behat\Gherkin\Node\PyStringNode;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\LoginPage;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * WebUI Login context.
 */
class WebUILoginContext extends RawMinkContext implements Context {
	private $loginPage;
	private $filesPage;
	private $expectedPage;

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
	 * WebUILoginContext constructor.
	 *
	 * @param LoginPage $loginPage
	 */
	public function __construct(LoginPage $loginPage) {
		$this->loginPage = $loginPage;
	}

	/**
	 * @return string
	 */
	private function getExpectedLoginSuccessPageTitle():string {
		// When the login succeeds, we end up on the Files page
		return "Files - " . $this->featureContext->getProductNameFromStatus();
	}

	/**
	 * after a successful login we always end up on the Files Page
	 *
	 * @return void
	 */
	public function webUILoginShouldHaveBeenSuccessful():void {
		Assert::assertEquals(
			$this->getExpectedLoginSuccessPageTitle(),
			$this->filesPage->getPageTitle()
		);
	}

	/**
	 * @return string
	 */
	private function getExpectedLoginFailedPageTitle():string {
		// When the login fails, we end up at a page with a title that is the
		// themed product name, e.g. "ownCloud"
		return $this->featureContext->getProductNameFromStatus();
	}

	/**
	 * @return void
	 */
	public function webUILoginShouldHaveBeenUnsuccessful():void {
		Assert::assertEquals(
			$this->getExpectedLoginFailedPageTitle(),
			$this->loginPage->getPageTitle()
		);
	}

	/**
	 * @When the user browses to the login page
	 *
	 * @return void
	 */
	public function theUserBrowsesToTheLoginPage():void {
		$this->loginPage->open();
	}

	/**
	 * @Given the user has browsed to the login page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasBrowsedToTheLoginPage():void {
		$this->loginPage->open();
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When the user re-logs in as :username using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserRelogsInUsingTheWebUI(string $username):void {
		$this->userReLogsInWithUsernameAndPassword(
			$username,
			$this->featureContext->getPasswordForUser($username)
		);
	}

	/**
	 * @Given the user has re-logged in as :username using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasReloggedInUsingTheWebUI(string $username):void {
		$this->userReLogsInWithUsernameAndPassword(
			$username,
			$this->featureContext->getPasswordForUser($username)
		);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @When the user re-logs in with username :username and password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userReLogsInWithUsernameAndPassword(string $username, string $password):void {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		$this->logInWithUsernameAndPasswordUsingTheWebUI(
			$username,
			$password
		);
	}

	/**
	 * @When the user re-logs in with username :username using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userReLogsInWithUsername(string $username):void {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		$actualUsername = $this->featureContext->getActualUsername($username);
		$password = $this->featureContext->getUserPassword($actualUsername);
		$this->logInWithUsernameAndPasswordUsingTheWebUI(
			$username,
			$password
		);
	}

	/**
	 * @Given the user has re-logged in with username :username and password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasReloggedInWithUsernameAndPasswordUsingTheWebUI(
		string $username,
		string $password
	):void {
		$this->userReLogsInWithUsernameAndPassword(
			$username,
			$password
		);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @When user :username logs in using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function logInWithUsernameUsingTheWebUI(string $username):void {
		$usernameActual = $this->featureContext->getActualUsername($username);
		$this->theUserBrowsesToTheLoginPage();
		$this->logInWithUsernameAndPasswordUsingTheWebUI(
			$usernameActual,
			$this->featureContext->getPasswordForUser($usernameActual)
		);
	}

	/**
	 * @Given user :username has logged in using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasLoggedInUsingTheWebUI(string $username):void {
		$this->logInWithUsernameUsingTheWebUI($username);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @When the user logs in with username :username and password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function logInWithUsernameAndPasswordUsingTheWebUI(
		string $username,
		string $password
	):void {
		$this->filesPage = $this->webUIGeneralContext->loginAs($username, $password);
		$this->webUIGeneralContext->setCurrentPageObject($this->filesPage);
	}

	/**
	 * @Given the user has logged in with username :username and password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasLoggedInWithUsernameAndPasswordUsingTheWebUIi(
		string $username,
		string $password
	):void {
		$this->logInWithUsernameAndPasswordUsingTheWebUI($username, $password);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @When user :user logs in with their email address using the webUI
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userLogsInWithTheirEmailAddressUsingTheWebui(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$email = $this->featureContext->getEmailAddressForUser($user);
		$password = $this->featureContext->getPasswordForUser($user);
		$this->loginPage->loginAs($email, $password, 'LoginPage');
	}

	/**
	 * @Given user :user has logged in with their email address using the webUI
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasLoggedInWithTheirEmailAddressUsingTheWebui(string $user):void {
		$this->userLogsInWithTheirEmailAddressUsingTheWebui($user);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @Given user :user logs in with email and invalid password :password using the webUI
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userLogsInWithEmailAndInvalidPasswordUsingTheWebui(
		string $user,
		string $password
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$email = $this->featureContext->getEmailAddressForUser($user);
		$this->loginPage->loginAs($email, $password, 'LoginPage');
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
		$this->webUILoginShouldHaveBeenUnsuccessful();
	}

	/**
	 * @When the user logs in with username :username and invalid password :password using the webUI
	 * @When the user logs in with invalid username :username and password :password using the webUI
	 * @When the user logs in with invalid username :username and invalid password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userLogInWithUsernameAndInvalidPasswordUsingTheWebUI(
		string $username,
		string $password
	):void {
		$username = $this->featureContext->getActualUsername($username);
		$password = $this->featureContext->getActualPassword($password);
		$this->loginPage->loginAs($username, $password, 'LoginPage');
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given the user has logged in with username :username and invalid password :password using the webUI
	 * @Given the user has logged in with invalid username :username and password :password using the webUI
	 * @Given the user has logged in with invalid username :username and invalid password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasLoggedInWithUsernameAndInvalidPasswordUsingTheWebUI(
		string $username,
		string $password
	):void {
		$username = $this->featureContext->getActualUsername($username);
		$this->userLogInWithUsernameAndInvalidPasswordUsingTheWebUI(
			$username,
			$password
		);
		$this->webUILoginShouldHaveBeenUnsuccessful();
	}

	/**
	 * @When the administrator tries to login with an invalid password :password using the webUI
	 *
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTriesToLoginWithAnInvalidPasswordUsingTheWebui(string $password):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userLogInWithUsernameAndInvalidPasswordUsingTheWebUI($admin, $password);
	}

	/**
	 * @param string $username
	 * @param string $page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userLogInAfterRedirectFromThePage(
		string $username,
		string $page
	):void {
		$this->userLogInWithUsernameAndPasswordAfterRedirectFromPage(
			$username,
			$this->featureContext->getPasswordForUser($username),
			$page
		);
	}

	/**
	 * @When user :username logs in using the webUI after a redirect from the :page page
	 *
	 * @param string $username
	 * @param string $page text name of a page that I expect to be taken to
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserLogsInAfterRedirectFromThePage(
		string $username,
		string $page
	):void {
		$this->userLogInAfterRedirectFromThePage(
			$username,
			$page
		);
	}

	/**
	 * @Given user :username has logged in using the webUI after a redirect from the :page page
	 *
	 * @param string $username
	 * @param string $page text name of a page that I expect to be taken to
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasLoggedInAfterRedirectFromThePage(
		string $username,
		string $page
	):void {
		$this->userLogInAfterRedirectFromThePage(
			$username,
			$page
		);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator logs in using the webUI after a redirect from the :page page
	 *
	 * @param string $page text name of a page that I expect to be taken to
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorLogsInUsingTheWebuiAfterARedirectFromThePage(string $page):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userLogInAfterRedirectFromThePage($admin, $page);
	}

	/**
	 * @When the user logs in with username :username and password :password using the webUI after a redirect from the :page page
	 *
	 * @param string $username
	 * @param string $password
	 * @param string $page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userLogInWithUsernameAndPasswordAfterRedirectFromPage(
		string $username,
		string $password,
		string $page
	):void {
		$this->expectedPage = $this->webUIGeneralContext->loginAs(
			$username,
			$password,
			\str_replace(' ', '', \ucwords($page)) . 'Page'
		);
	}

	/**
	 * @Given the user has logged in with username :username and password :password using the webUI after a redirect from the :page page
	 *
	 * @param string $username
	 * @param string $password
	 * @param string $page text name of a page that I expect to be taken to
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasLoggedInWithUsernameAndPasswordAfterRedirectFromThePage(
		string $username,
		string $password,
		string $page
	):void {
		$this->userLogInWithUsernameAndPasswordAfterRedirectFromPage(
			$username,
			$password,
			$page
		);
		$this->webUILoginShouldHaveBeenSuccessful();
	}

	/**
	 * @Then the username field on the login page should have label text :expectedLabelText
	 *
	 * @param string $expectedLabelText
	 *
	 * @return void
	 */
	public function usernameFieldOnLoginPageShouldHaveLabelText(string $expectedLabelText):void {
		$actualPLabelText = $this->loginPage->getUserLabelText();
		Assert::assertEquals(
			$expectedLabelText,
			$actualPLabelText,
			__METHOD__
			. " The username label text was expected to be '$expectedLabelText', but got '$actualPLabelText' instead."
		);
	}

	/**
	 * @Then the password field on the login page should have label text :expectedPlaceholderText
	 *
	 * @param string $expectedLabelText
	 *
	 * @return void
	 */
	public function passwordFieldOnLoginPageShouldHaveLabelText(string $expectedLabelText):void {
		$actualLabelText = $this->loginPage->getPasswordLabelText();
		Assert::assertEquals(
			$expectedLabelText,
			$actualLabelText,
			__METHOD__
			. " The password label text was expected to be '$expectedLabelText', but got '$actualLabelText' instead."
		);
	}

	/**
	 * @Then /^it should (not|)\s?be possible to login with the username ((?:'[^']*')|(?:"[^"]*")) and password ((?:'[^']*')|(?:"[^"]*")) using the WebUI$/
	 *
	 * @param string $shouldOrNot
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function itShouldBePossibleToLogin(string $shouldOrNot, string $username, string $password):void {
		$should = ($shouldOrNot !== "not");

		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($username !== "") {
			$username = \trim($username, $username[0]);
		}
		if ($password !== "") {
			$password = \trim($password, $password[0]);
		}
		$this->theUserBrowsesToTheLoginPage();
		if ($should) {
			$this->logInWithUsernameAndPasswordUsingTheWebUI(
				$username,
				$password
			);
			$this->webUIGeneralContext->theUserShouldBeRedirectedToAWebUIPageWithTheTitle(
				$this->getExpectedLoginSuccessPageTitle()
			);
		} else {
			$this->userLogInWithUsernameAndInvalidPasswordUsingTheWebUI(
				$username,
				$password
			);
			$this->webUIGeneralContext->theUserShouldBeRedirectedToAWebUIPageWithTheTitle(
				$this->getExpectedLoginFailedPageTitle()
			);
		}
	}

	/**
	 * @When the user requests the password reset link using the webUI
	 * @Given the user has requested the password reset link using the webUI
	 *
	 * @return void
	 */
	public function theUserRequestsThePasswordResetLinkUsingTheWebui():void {
		$this->loginPage->requestPasswordReset($this->getSession());
	}

	/**
	 * @Then a message with this text should be displayed on the webUI:
	 *
	 * @param PyStringNode $string
	 *
	 * @return void
	 */
	public function thisMessageShouldBeDisplayed(PyStringNode $string):void {
		$expectedString = $string->getRaw();
		$passwordRecoveryMessage = $this->loginPage->getLostPasswordMessage();
		Assert::assertEquals(
			$expectedString,
			$passwordRecoveryMessage,
			__METHOD__
			. " The message expected to be displayed on the webUI was '$expectedString', but got '$passwordRecoveryMessage' instead"
		);
	}

	/**
	 * @Then a set password error message with this text should be displayed on the webUI:
	 *
	 * @param PyStringNode $string
	 *
	 * @return void
	 */
	public function aSetPasswordErrorMessageWithTheTextShouldBeDisplayed(
		PyStringNode $string
	):void {
		$expectedString = $string->getRaw();
		$setPasswordErrorMessage = $this->loginPage->getSetPasswordErrorMessage();
		Assert::assertEquals(
			$expectedString,
			$setPasswordErrorMessage,
			__METHOD__
			. " The expected set password error message was '$expectedString', but got '$setPasswordErrorMessage' instead"
		);
	}

	/**
	 * @Then a lost password reset error message with this text should be displayed on the webUI:
	 *
	 * @param PyStringNode $string
	 *
	 * @return void
	 */
	public function aLostPasswordResetErrorMessageWithTheTextShouldBeDisplayed(
		PyStringNode $string
	):void {
		$expectedString = $string->getRaw();
		$resetPasswordErrorMessage = $this->loginPage->getLostPasswordResetErrorMessage();
		Assert::assertEquals(
			$expectedString,
			$resetPasswordErrorMessage,
			__METHOD__
			. " The expected reset password error message was '$expectedString', but got '$resetPasswordErrorMessage' instead."
		);
	}

	/**
	 * @Then the imprint url on the login page should link to :expectedImprintUrl
	 *
	 * @param string $expectedImprintUrl
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theImprintUrlOnTheLoginPageShouldLinkTo(string $expectedImprintUrl):void {
		$actualImprintUrl = $this->loginPage->getLegalUrl("Imprint");
		Assert::assertEquals(
			$expectedImprintUrl,
			$actualImprintUrl,
			__METHOD__
			. " The imprint url on the login page should link to '$expectedImprintUrl', but got '$actualImprintUrl' instead."
		);
	}

	/**
	 * @Then the privacy policy url on the login page should link to :expectedPrivacyPolicyUrl
	 *
	 * @param string $expectedPrivacyPolicyUrl
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePrivacyPolicyUrlOnTheLoginPageShouldLinkTo(string $expectedPrivacyPolicyUrl):void {
		$actualPrivacyPolicyUrl = $this->loginPage->getLegalUrl("Privacy Policy");
		Assert::assertEquals(
			$expectedPrivacyPolicyUrl,
			$actualPrivacyPolicyUrl,
			__METHOD__
			. " The privacy policy url on the login page should link to '$expectedPrivacyPolicyUrl', but got '$actualPrivacyPolicyUrl' instead."
		);
	}

	/**
	 * @When the user follows the password reset link from the email address of user :user
	 * @Given the user has followed the password reset link from the email address of user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserFollowsThePasswordResetLinkFromTheirEmail(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$emailAddress = $this->featureContext->getEmailAddressForUser($user);
		$this->featureContext->pushEmailRecipientAsMailBox($emailAddress);
		$this->webUIGeneralContext->followLinkFromEmail(
			$emailAddress,
			"/Use the following link to reset your password: (http.*)/",
			"Couldn't find password reset link in the email"
		);
	}

	/**
	 * @When the user follows the password reset link from email address of the user :user but supplying invalid user name :username
	 *
	 * @param string $user
	 * @param string $username
	 *
	 * @return void
	 */
	public function theUserFollowsThePasswordResetLinkFromTheirEmailUsingInvalidUsername(
		string $user,
		string $username
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$emailAddress = $this->featureContext->getEmailAddressForUser($user);
		$this->featureContext->pushEmailRecipientAsMailBox($emailAddress);
		$link = $this->webUIGeneralContext->getLinkFromEmail(
			$emailAddress,
			"/Use the following link to reset your password: (http.*)/",
			"Couldn't find password reset link in the email"
		);
		// The link has a form like:
		// http://172.17.0.1:8080/index.php/lostpassword/reset/form/ossdSL1Q95s4e0seCwsTb/Brian
		// pop off the last part and replace it with the invalid username
		$linkParts = \explode('/', $link);
		\array_pop($linkParts);
		\array_push($linkParts, $username);
		$adjustedLink = \implode('/', $linkParts);
		$this->visitPath($adjustedLink);
	}

	/**
	 * @When the user follows the password reset link from email address of the user :user but supplying an invalid token
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theUserFollowsThePasswordResetLinkFromTheirEmailUsingInvalidToken(
		string $user
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$emailAddress = $this->featureContext->getEmailAddressForUser($user);
		$this->featureContext->pushEmailRecipientAsMailBox($emailAddress);
		$link = $this->webUIGeneralContext->getLinkFromEmail(
			$emailAddress,
			"/Use the following link to reset your password: (http.*)/",
			"Couldn't find password reset link in the email"
		);
		// The link has a form like:
		// http://172.17.0.1:8080/index.php/lostpassword/reset/form/ossdSL1Q95s4e0seCwsTb/Brian
		$linkParts = \explode('/', $link);
		$username = \array_pop($linkParts);
		$goodToken = \array_pop($linkParts);
		// reverse the token string, an easy way to make the token invalid
		$invalidToken = \strrev($goodToken);
		\array_push($linkParts, $invalidToken);
		\array_push($linkParts, $username);
		$adjustedLink = \implode('/', $linkParts);
		$this->visitPath($adjustedLink);
	}

	/**
	 * @When the user resets/sets the password to :newPassword and confirms with the same password using the webUI
	 * @Given the user has reset/set the password to :newPassword and confirms with the same password using the webUI
	 *
	 * @param string $newPassword
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserResetsThePasswordWithSameConfirmationToUsingTheWebui(string $newPassword):void {
		$newPassword = $this->featureContext->getActualPassword($newPassword);
		$confirmNewPassword = $this->featureContext->getActualPassword($newPassword);
		$this->loginPage->resetThePassword($newPassword, $confirmNewPassword, $this->getSession());
	}

	/**
	 * @When the user resets/sets the password to :newPassword and confirms with :confirmPassword using the webUI
	 * @Given the user has reset/set the password to :newPassword and confirms with :confirmPassword using the webUI
	 *
	 * @param string $newPassword
	 * @param string $confirmNewPassword
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function theUserResetsPasswordWIthDiffConfirmUsingTheWebUI(string $newPassword, string $confirmNewPassword):void {
		$newPassword = $this->featureContext->getActualPassword($newPassword);
		$this->loginPage->resetThePassword($newPassword, $confirmNewPassword, $this->getSession());
	}

	/**
	 * @Then the user should see a password mismatch message displayed on the webUI
	 *
	 * @param PyStringNode $string
	 *
	 * @return void
	 */
	public function theUserResetConfirmPasswordErrorMessage(PyStringNode $string):void {
		$expectedString = $string->getRaw();
		$passwordMismatchMessage = $this->loginPage->getRestPasswordConfirmError();
		Assert::assertEquals(
			$expectedString,
			$passwordMismatchMessage,
			__METHOD__
			. " The password mismatch message expected to be displayed on the webUI was '$expectedString', but got '$passwordMismatchMessage' instead."
		);
	}

	/**
	 * @Then the user should be redirected to the login page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldBeRedirectedToTheLoginPage():void {
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When /^the user follows the password set link received by "([^"]*)"(?: in Email number (\d+))? using the webUI$/
	 *
	 * @param string $emailAddress
	 * @param int $numEmails which number of multiple emails to read (first email is 1)
	 *
	 * @return void
	 * @throws Exception
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function theUserFollowsThePasswordSetLinkReceivedByEmail(string $emailAddress, int $numEmails = 1):void {
		$this->featureContext->pushEmailRecipientAsMailBox($emailAddress);
		$this->webUIGeneralContext->followLinkFromEmail(
			$emailAddress,
			"/Access it: (http.*)/",
			"Couldn't find password set link in the email",
			$numEmails
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
	}
}
