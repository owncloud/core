<?php
class Test_L10N extends PHPUnit_Framework_TestCase {
	public function testFindLanguage() {
	}

	public function testLanguageExists() {
		$this->assertTrue(OC_L10N::languageExists('core', 'en')); // en should always be available
		$this->assertTrue(OC_L10N::languageExists('files', 'zh_TW')); // /apps/files/l10n/zh_TW.php should exist for this to be true
	}

	public function testCheckPreferenceLanguage() {
		$this->assertFalse(OC_L10N::checkPreferenceLanguage(array('en', 'fr')));
		$this->assertFalse(OC_L10N::checkPreferenceLanguage());
		// Currently we don't test when user is logged in
	}
}
?>
