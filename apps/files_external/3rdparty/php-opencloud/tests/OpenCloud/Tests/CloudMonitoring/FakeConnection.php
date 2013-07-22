<?php

namespace OpenCloud\Tests\CloudMonitoring;

use OpenCloud\OpenStack;
use OpenCloud\Common\Request\Response\Blank;

class FakeConnection extends OpenStack
{
	private $response;
	private $testDir;

	public function __construct($url, $secret, $options = array()) 
	{
		$this->testDir = __DIR__;

		if (is_array($secret)) {
			return parent::__construct($url, $secret, $options);
		} else {
			return parent::__construct(
				$url,
				array(
					'username' => 'X', 
					'password' => 'Y'
				), 
				$options
			);
		}
	}

	public function Request($url, $method = "GET", $headers = array(), $body = null) 
	{
		$this->url = trim($url, '/');
		$response = new Blank;
		$response->headers = array('Content-Length' => '999');

		switch ($method) {
			case 'POST':
				$method = 'doPost'; 
				break;
			default:
			case 'GET':
				$method = 'doGet';
				break;
			case 'DELETE':
				$method = 'doDelete';
				break;
		}

		$response->body = $this->$method($url);

		return $response;
	}

	private function urlContains($substring)
	{
		return strpos($this->url, $substring) !== false;
	}

	private function covertToRegex($array)
	{
		$new = array();
		foreach ($array as $key => $item) {
			$value = str_replace('{d}', '(\d)+', $key);
			$value = str_replace('{s}', '(\s)+', $value);
			$value = str_replace('{w}', '(\w|\-|\.)+', $value);
			$value = str_replace('/', '\/', $value);
			$new[$value] = $item;
		}
		return $new;
	}

	private function matchUrlToArray($array)
	{
		foreach ($array as $key => $item) {
			$pattern = "#{$key}$#";
			if (preg_match($pattern, $this->url)) {
				$path = __DIR__ . "/Resource/{$item}.json";
				if (file_exists($path)) {
					return file_get_contents($path);
				}
			}
		}
	}

	public function doGet()
	{
		$array = include 'Resource/GetResponses.php';
		$array = $this->covertToRegex($array);
		return $this->matchUrlToArray($array);
	}

	public function doPost()
	{
		$array = include 'Resource/PostResponses.php';
		$array = $this->covertToRegex($array);
		return $this->matchUrlToArray($array);
	}

	public function doDelete()
	{

	}

}