<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use GuzzleHttp\Client;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Capabilities context.
 */
class CapabilitiesContext implements Context, SnippetAcceptingContext {

	use BasicStructure;

	/**
	 * @Then /^fields of capabilities match with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $formData
	 */
	public function checkCapabilitiesResponse(\Behat\Gherkin\Node\TableNode $formData) {
		$capabilitiesXML = $this->getResponseXml()->data->capabilities;

		foreach ($formData->getHash() as $row) {
			$path_to_element = explode('@@@', $row['path_to_element']);
			$answeredValue = $capabilitiesXML->{$row['capability']};
			for ($i = 0; $i < count($path_to_element); $i++) {
				$answeredValue = $answeredValue->{$path_to_element[$i]};
			}
			$answeredValue = (string)$answeredValue;
			PHPUnit_Framework_Assert::assertEquals(
				$row['value'] === "EMPTY" ? '' : $row['value'],
				$answeredValue,
				"Failed field " . $row['capability'] . " " . $row['path_to_element']
			);

		}
	}

	protected function resetAppConfigs() {
		$this->resetCommonSharingAppConfigs();
		$this->modifyServerConfig('core', 'shareapi_allow_resharing', 'yes');
		$this->modifyServerConfig('files_sharing', 'outgoing_server2server_share_enabled', 'yes');
		$this->modifyServerConfig('files_sharing', 'incoming_server2server_share_enabled', 'yes');
		$this->modifyServerConfig('core', 'shareapi_enforce_links_password', 'no');
		$this->modifyServerConfig('core', 'shareapi_allow_public_notification', 'no');
		$this->modifyServerConfig('core', 'shareapi_allow_social_share', 'yes');
		$this->modifyServerConfig('core', 'shareapi_default_expire_date', 'no');
		$this->modifyServerConfig('core', 'shareapi_enforce_expire_date', 'no');
		$this->modifyServerConfig('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes');
		$this->modifyServerConfig('core', 'shareapi_share_dialog_user_enumeration_group_members', 'no');
	}
}
