<?php
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
use Behat\Behat\Context\SnippetAcceptingContext;
use GuzzleHttp\Message\ResponseInterface;

require_once 'bootstrap.php';

/**
 * Sharees context.
 */
class ShareesContext implements Context, SnippetAcceptingContext {
	use BasicStructure;

	/**
	 * @When /^the user gets the sharees using the API with parameters$/
	 *
	 * @param \Behat\Gherkin\Node\TableNode $body
	 *
	 * @return void
	 */
	public function theUserGetsTheShareesWithParameters($body) {
		$this->userGetsTheShareesWithParameters($this->currentUser, $body);
	}

	/**
	 * @When /^user "([^"]*)" gets the sharees using the API with parameters$/
	 *
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode $body
	 *
	 * @return void
	 */
	public function userGetsTheShareesWithParameters($user, $body) {
		$url = '/apps/files_sharing/api/v1/sharees';
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$parameters = [];
			foreach ($body->getRowsHash() as $key => $value) {
				$parameters[] = $key . '=' . $value;
			}
			if (!empty($parameters)) {
				$url .= '?' . \implode('&', $parameters);
			}
		}

		$this->userSendsHTTPMethodToAPIEndpointWithBody(
			$user, 'GET', $url, null
		);
	}

	/**
	 * @Then /^the "([^"]*)" sharees returned should be$/
	 *
	 * @param string $shareeType
	 * @param \Behat\Gherkin\Node\TableNode $shareesList
	 *
	 * @return void
	 */
	public function theShareesReturnedShouldBe($shareeType, $shareesList) {
		$sharees = $shareesList->getRows();
		$respondedArray = $this->getArrayOfShareesResponded(
			$this->response, $shareeType
		);
		PHPUnit_Framework_Assert::assertEquals($sharees, $respondedArray);
	}

	/**
	 * @Then /^the "([^"]*)" sharees returned should be empty$/
	 *
	 * @param string $shareeType
	 *
	 * @return void
	 */
	public function theShareesReturnedShouldBeEmpty($shareeType) {
		$respondedArray = $this->getArrayOfShareesResponded(
			$this->response, $shareeType
		);
		PHPUnit_Framework_Assert::assertEmpty($respondedArray);
	}

	/**
	 * @param ResponseInterface $response
	 * @param string $shareeType
	 *
	 * @return array
	 */
	public function getArrayOfShareesResponded(
		ResponseInterface $response, $shareeType
	) {
		$elements = $response->xml()->data;
		$elements = \json_decode(\json_encode($elements), 1);
		if (\strpos($shareeType, 'exact ') === 0) {
			$elements = $elements['exact'];
			$shareeType = \substr($shareeType, 6);
		}

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
	 * @return void
	 */
	protected function resetAppConfigs() {
		// Remember the current capabilities
		$this->getCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$capabilitiesArray = $this->getCommonSharingConfigs();
		$capabilitiesArray = \array_merge(
			$capabilitiesArray,
			$this->getCommonFederationConfigs()
		);
		$this->setCapabilities($capabilitiesArray);
	}
}
