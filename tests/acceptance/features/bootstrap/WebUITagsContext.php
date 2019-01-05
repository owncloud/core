<?php
/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2019 Phil Davis phil@jankaritech.com
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
use Behat\MinkExtension\Context\RawMinkContext;
use Page\FilesPage;
use Page\TagsPage;

require_once 'bootstrap.php';

/**
 * WebUI Tags context.
 */
class WebUITagsContext extends RawMinkContext implements Context {

	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 *
	 * @var TagsPage
	 */
	private $tagsPage;

	/**
	 *
	 * @var TagsContext
	 */
	private $tagsContext;

	/**
	 * WebUITagsContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param TagsPage $tagsPage
	 *
	 * @return void
	 */
	public function __construct(
		FilesPage $filesPage,
		TagsPage $tagsPage
	) {
		$this->filesPage = $filesPage;
		$this->tagsPage = $tagsPage;
	}

	/**
	 * @Given the user has added a tag :tagName to the file using the webUI
	 * @Given the user has toggled a tag :tagName on the file using the webUI
	 * @When the user adds a tag :tagName to the file using the webUI
	 * @When the user toggles a tag :tagName on the file using the webUI
	 *
	 * @param string $tagName
	 *
	 * @return void
	 */
	public function theUserAddsATagToTheFileUsingTheWebUI($tagName) {
		$this->filesPage->getDetailsDialog()->addTag($tagName);

		// For tags to be created, OC checks (|for the permission) if the tag could be created
		// and if it can, then only it creates a tag. So, in the webUI, it does two
		// requests before the tags are created.
		// If we use a single wait, it returns after it has checked for the permission.
		// Locally that passes but sometimes fail on the ci. So, we need two waits for each requests.
		// FIXME: Find a better way to wait for these calls
		$this->filesPage->waitForAjaxCallsToStartAndFinish($this->getSession());
		$this->filesPage->waitForAjaxCallsToStartAndFinish($this->getSession());

		$this->tagsContext->addToTheListOfCreatedTagsByDisplayName($tagName);
	}

	/**
	 * @When the user types :value in the collaborative tags field using the webUI
	 *
	 * @param string $value
	 *
	 * @return void
	 */
	public function theUserTypesAValueInTheCollaborativeTagsFieldUsingTheWebUI($value) {
		$this->filesPage->getDetailsDialog()->insertTagNameInTheTagsField($value);
	}

	/**
	 * @Then all the tags starting with :value in their name should be listed in the dropdown list on the webUI
	 *
	 * @param string $value
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function allTheTagsStartingWithInTheirNameShouldBeListedInTheDropdownListOnTheWebUI($value) {
		$results = $this->filesPage->getDetailsDialog()->getDropDownTagsSuggestionResults();
		foreach ($results as $tagResult) {
			PHPUnit_Framework_Assert::assertStringStartsWith($value, $tagResult->getText());
		}

		// check also that all tags that have been created and starts with $value
		// are also shown in the dropdown
		$createdTags = $this->tagsContext->getListOfCreatedTags();
		foreach ($createdTags as $tag) {
			$tagName = $tag['name'];
			if (\substr($tagName, 0, \strlen($value)) === $value && !empty($tag['userAssignable'])) {
				$this->theTagShouldBeListedInTheDropdownListOnTheWebUI($tagName);
			}
		}
	}

	/**
	 * @Then the tag :tagName should be listed in the dropdown list on the webUI
	 *
	 * @param string $tagName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theTagShouldBeListedInTheDropdownListOnTheWebUI($tagName) {
		$results = $this->filesPage->getDetailsDialog()->getDropDownTagsSuggestionResults();
		foreach ($results as $tagResult) {
			if ($tagResult->getText() === $tagName) {
				return;
			}
		}
		throw new \Exception("No tags could be found with $tagName.");
	}

	/**
	 * @Then tag :tagName should not be listed in the dropdown list on the webUI
	 *
	 * @param string $tagName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function tagShouldNotBeListedInTheDropdownListOnTheWebui($tagName) {
		try {
			$this->theTagShouldBeListedInTheDropdownListOnTheWebUI($tagName);
		} catch (\Exception $e) {
			return;
		}
		throw new \Exception("Tag $tagName should not be on the dropdown.");
	}

	/**
	 * @When the user deletes tag with name :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserDeletesTagWithNameUsingTheWebui($name) {
		$this->filesPage->getDetailsDialog()->deleteTag($name);
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
		$this->tagsContext = $environment->getContext('TagsContext');
	}
}
