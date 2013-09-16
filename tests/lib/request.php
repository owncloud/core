<?php
/**
 * Copyright (c) 2013 Luke Carrier <luke@carrier.im>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */


class Test_Request extends PHPUnit_Framework_TestCase {
	protected $overwritewebroot;

	protected function setUp() {
		$this->server = isset($_SERVER) ? $_SERVER : null;
		$this->overwritewebroot = OC_Config::getValue('overwritewebroot');
	}

	protected function setServer() {
		$_SERVER = array(
			'REQUEST_URI'     => '/owncloud/',
			'SCRIPT_NAME'     => '/owncloud/index.php',
			'SCRIPT_FILENAME' => dirname(dirname(__DIR__)) . '/index.php',
		);
	}

	protected function resetConfig() {
		$_SERVER = $this->server;
		OC_Config::setValue('overwritewebroot', $this->overwritewebroot);
	}

	public function testRequestUriWithEmptyOverwritewebroot() {
		OC_Config::setValue('overwritewebroot', '');
		$this->setServer();

		$this->assertEquals('/index.php', OC_Request::requestUri());

		$this->resetConfig();
	}

	public function testRequestUriWithNullOverwritewebroot() {
		OC_Config::deleteKey('overwritewebroot');
		$this->setServer();

		$this->assertEquals('/owncloud/', OC_Request::requestUri());

		$this->resetConfig();
	}

	public function testRequestUriWithSetOverwritewebroot() {
		OC_Config::setValue('overwritewebroot', 'theircloud');
		$this->setServer();

		$this->assertEquals('/theircloud/index.php', OC_Request::requestUri());

		$this->resetConfig();
	}

	public function testScriptNameWithEmptyOverwritewebroot() {
		OC_Config::setValue('overwritewebroot', '');
		$this->setServer();

		$this->assertEquals('/index.php', OC_Request::scriptName());

		$this->resetConfig();
	}

	public function testScriptNameWithNullOverwritewebroot() {
		OC_Config::deleteKey('overwritewebroot');
		$this->setServer();

		$this->assertEquals('/owncloud/index.php', OC_Request::scriptName());

		$this->resetConfig();
	}

	public function testScriptNameWithSetOverwritewebroot() {
		OC_Config::setValue('overwritewebroot', 'owncloud');
		$this->setServer();

		$this->assertEquals('/owncloud/index.php', OC_Request::scriptName());
		$this->resetConfig();
	}
}