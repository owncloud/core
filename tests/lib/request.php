<?php

class Test_Request extends PHPUnit_Framework_TestCase {
	public function testParseAcceptLanguage() {
		$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'zh, en-us; q=0.8, en; q=0.6';
		$this->assertEquals(array('zh', 'en_US', 'en'), OC_Request::parseAcceptLanguage());
		$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'zh-tw,zh;q=0.8,en-us;q=0.5,en;q=0.3';
		$this->assertEquals(array('zh_TW', 'zh', 'en_US', 'en'), OC_Request::parseAcceptLanguage());
		$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'zh-TW,zh;q=0.8,en-US;q=0.6,en;q=0.4';
		$this->assertEquals(array('zh_TW', 'zh', 'en_US', 'en'), OC_Request::parseAcceptLanguage());
		$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'zh-TW , zh;q=0.8, en-US;q=0.6, en;q=0.4';
		$this->assertEquals(array('zh_TW', 'zh', 'en_US', 'en'), OC_Request::parseAcceptLanguage());
		unset($_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$this->assertFalse(OC_Request::parseAcceptLanguage());
	}
}
?>
