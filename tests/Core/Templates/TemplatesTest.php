<?php

namespace Tests\Core\Templates;

class TemplatesTest extends \Test\TestCase {
	public function test403() {
		$template = \OC::$SERVERROOT . '/core/templates/403.php';
		$expectedHtml = "<ul><li class='error'>Access forbidden<br><p class='hint'></p></li></ul>";
		$this->assertTemplate($expectedHtml, $template);
	}

	public function test404() {
		$template = \OC::$SERVERROOT . '/core/templates/404.php';
		$href = \OC::$server->getURLGenerator()->linkTo('', 'index.php');
		$expectedHtml = "<ul><li class=\"error\">File not found<br><p class=\"hint\">The specified document has not been found on the server.</p><p class=\"hint\"><a href=\"$href\">You can click here to return to ownCloud.</a></p></li></ul>";
		$this->assertTemplate($expectedHtml, $template);
	}
}
