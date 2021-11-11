<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
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
use Behat\Gherkin\Node\TableNode;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * Sharees context.
 */
class ShareesContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var OCSContext
	 */
	private $ocsContext;

	/**
	 * @When /^the user gets the sharees using the sharing API with parameters$/
	 *
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function theUserGetsTheShareesWithParameters(TableNode $body):void {
		$this->userGetsTheShareesWithParameters(
			$this->featureContext->getCurrentUser(),
			$body
		);
	}

	/**
	 * @When /^user "([^"]*)" gets the sharees using the sharing API with parameters$/
	 *
	 * @param string $user
	 * @param TableNode $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsTheShareesWithParameters(string $user, TableNode $body):void {
		$user = $this->featureContext->getActualUsername($user);
		$url = '/apps/files_sharing/api/v1/sharees';
		$this->featureContext->verifyTableNodeColumnsCount($body, 2);
		if ($body instanceof TableNode) {
			$parameters = [];
			foreach ($body->getRowsHash() as $key => $value) {
				$parameters[] = "$key=$value";
			}
			if (!empty($parameters)) {
				$url .= '?' . \implode('&', $parameters);
			}
		}

		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			$url,
			null
		);
	}

	/**
	 * @Then /^the "([^"]*)" sharees returned should be$/
	 *
	 * @param string $shareeType
	 * @param TableNode $shareesList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theShareesReturnedShouldBe(string $shareeType, TableNode $shareesList):void {
		$this->featureContext->verifyTableNodeColumnsCount($shareesList, 3);
		$sharees = $shareesList->getRows();
		$respondedArray = $this->getArrayOfShareesResponded(
			$this->featureContext->getResponse(),
			$shareeType
		);
		Assert::assertEquals(
			$sharees,
			$respondedArray,
			"Returned sharees do not match the expected ones. See the differences below."
		);
	}

	/**
	 * @Then /^the "([^"]*)" sharees returned should include$/
	 *
	 * @param string $shareeType
	 * @param TableNode $shareesList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theShareesReturnedShouldInclude(string $shareeType, TableNode $shareesList):void {
		$this->featureContext->verifyTableNodeColumnsCount($shareesList, 3);
		$sharees = $shareesList->getRows();
		$respondedArray = $this->getArrayOfShareesResponded(
			$this->featureContext->getResponse(),
			$shareeType
		);
		foreach ($sharees as $sharee) {
			Assert::assertContains(
				$sharee,
				$respondedArray,
				"Returned sharees do not match the expected ones. See the differences below."
			);
		}
	}

	/**
	 * @Then /^the "([^"]*)" sharees returned should be empty$/
	 *
	 * @param string $shareeType
	 *
	 * @return void
	 */
	public function theShareesReturnedShouldBeEmpty(string $shareeType):void {
		$respondedArray = $this->getArrayOfShareesResponded(
			$this->featureContext->getResponse(),
			$shareeType
		);
		if (isset($respondedArray[0])) {
			// [0] is display name and [2] is user or group id
			$firstEntry = $respondedArray[0][0] . " (" . $respondedArray[0][2] . ")";
		} else {
			$firstEntry = "";
		}

		Assert::assertEmpty(
			$respondedArray,
			"'$shareeType' array should be empty, but it starts with $firstEntry"
		);
	}

	/**
	 * @param ResponseInterface $response
	 * @param string $shareeType
	 *
	 * @return array
	 */
	public function getArrayOfShareesResponded(
		ResponseInterface $response,
		string $shareeType
	):array {
		$elements = $this->featureContext->getResponseXml($response, __METHOD__)->data;
		$elements = \json_decode(\json_encode($elements), true);
		if (\strpos($shareeType, 'exact ') === 0) {
			$elements = $elements['exact'];
			$shareeType = \substr($shareeType, 6);
		}

		Assert::assertArrayHasKey(
			$shareeType,
			$elements,
			__METHOD__ . " The sharees response does not have key '$shareeType'"
		);

		$sharees = [];
		foreach ($elements[$shareeType] as $element) {
			if (\is_int(\key($element))) {
				// this is a list of elements instead of just one item,
				// so return the list
				foreach ($element as $innerItem) {
					$sharees[] = [
						$innerItem['label'],
						$innerItem['value']['shareType'],
						$innerItem['value']['shareWith']
					];
				}
			} else {
				$sharees[] = [
					$element['label'],
					$element['value']['shareType'],
					$element['value']['shareWith']
				];
			}
		}
		return $sharees;
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
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
		$this->ocsContext = $environment->getContext('OCSContext');
	}
}
