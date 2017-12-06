<?php
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright 2017 ownCloud GmbH
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
use Psr\Http\Message\ResponseInterface;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Sharees context.
 */
class ShareesContext implements Context, SnippetAcceptingContext {
	use BasicStructure;

	/**
	 * @When /^getting sharees for$/
	 * @param \Behat\Gherkin\Node\TableNode $body
	 * @return void
	 */
	public function whenGettingShareesFor($body) {
		$url = '/apps/files_sharing/api/v1/sharees';
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$parameters = [];
			foreach ($body->getRowsHash() as $key => $value) {
				$parameters[] = $key . '=' . $value;
			}
			if (!empty($parameters)) {
				$url .= '?' . implode('&', $parameters);
			}
		}

		$this->sendingTo('GET', $url);
	}

	/**
	 * @Then /^"([^"]*)" sharees returned (are|is empty)$/
	 * @param string $shareeType
	 * @param string $isEmpty
	 * @param \Behat\Gherkin\Node\TableNode|null $shareesList
	 * @return void
	 */
	public function thenListOfSharees($shareeType, $isEmpty, $shareesList = null) {
		if ($isEmpty !== 'is empty') {
			$sharees = $shareesList->getRows();
			$respondedArray = $this->getArrayOfShareesResponded(
				$this->response, $shareeType
			);
			PHPUnit_Framework_Assert::assertEquals($sharees, $respondedArray);
		} else {
			$respondedArray = $this->getArrayOfShareesResponded(
				$this->response, $shareeType
			);
			PHPUnit_Framework_Assert::assertEmpty($respondedArray);
		}
	}

	/**
	 * @param ResponseInterface $response
	 * @param string $shareeType
	 * @return array
	 */
	public function getArrayOfShareesResponded(
		ResponseInterface $response, $shareeType
	) {
		$elements = $this->getResponseXml($response)->data;
		$elements = json_decode(json_encode($elements), 1);
		if (strpos($shareeType, 'exact ') === 0) {
			$elements = $elements['exact'];
			$shareeType = substr($shareeType, 6);
		}

		$sharees = [];
		foreach ($elements[$shareeType] as $element) {
			if (is_int(key($element))) {
				// this is a list of elements instead of just one item, so return the list
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
		$this->setupCommonSharingConfigs();
		$this->setupCommonFederationConfigs();
	}
}
