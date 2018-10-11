<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
use TestHelpers\EmailHelper;

require_once 'bootstrap.php';

/**
 * context file for email related steps.
 */
class EmailContext implements Context {
	private $localMailhogUrl = null;

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @return string
	 */
	public function getLocalMailhogUrl() {
		return $this->localMailhogUrl;
	}

	/**
	 * @Then the email address :address should have received an email with the body containing
	 *
	 * @param string $address
	 * @param PyStringNode $content
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function assertThatEmailContains($address, PyStringNode $content) {
		$expectedContent = \str_replace("\r\n", "\n", $content->getRaw());
		$expectedContent = $this->featureContext->replaceProductName(
			$expectedContent
		);
		PHPUnit_Framework_Assert::assertContains(
			$expectedContent,
			EmailHelper::getBodyOfLastEmail($this->localMailhogUrl, $address)
		);
	}

	/**
	 * @Then the reset email to :receiverAddress should be from :senderAddress
	 *
	 * @param string $receiverAddress
	 * @param string $senderAddress
	 *
	 * @return void
	 */
	public function theResetEmailSenderEmailAddressShouldBe($receiverAddress, $senderAddress) {
		PHPUnit_Framework_Assert::assertContains(
			$senderAddress,
			EmailHelper::getSenderOfEmail($this->localMailhogUrl, $receiverAddress)
		);
	}

	/**
	 * @Then the email address :address should not have received an email
	 *
	 * @param string $address
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function assertThatEmailDoesntExistWithTheAddress($address) {
		try {
			EmailHelper::getBodyOfLastEmail($this->localMailhogUrl, $address, 3);
		} catch (\Exception $err) {
			PHPUnit_Framework_Assert::assertTrue(true);
			return;
		}
		throw \Exception("Email exists with email address: {$address}.");
	}

	/**
	 * @BeforeScenario @mailhog
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->localMailhogUrl = EmailHelper::getLocalMailhogUrl();
		$this->clearMailHogMessages();
	}

	/**
	 *
	 * @return void
	 */
	protected function clearMailHogMessages() {
		try {
			EmailHelper::deleteAllMessages($this->getLocalMailhogUrl());
		} catch (Exception $e) {
			echo __METHOD__ .
			" could not delete mailhog messages, is mailhog set up?\n" .
			$e->getMessage();
		}
	}
}
