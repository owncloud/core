<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @copyright 2012 Bernhard Posselt <dev@bernhard-posselt.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OCP\AppFramework;

use OC\AppFramework\Http\Request;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\CrossOriginResourceSharing;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\DataResponse;


class ChildController extends Controller {

	public function __construct($appName, $request, $cors = null) {
		parent::__construct($appName, $request, $cors);
		$this->registerResponder('tom', function ($response) {
			return 'hi';
		});
	}

	public function custom($in) {
		$this->registerResponder('json', function ($response) {
			return new JSONResponse(array(strlen($response)));
		});

		return $in;
	}

	public function customDataResponse($in) {
		$response = new DataResponse($in, 300);
		$response->addHeader('test', 'something');
		return $response;
	}
};

class ControllerTest extends \Test\TestCase {

	/**
	 * @var Controller
	 */
	private $controller;
	private $app;

	protected function setUp(){
		parent::setUp();

		$request = new Request(
			[
				'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
				'post' => ['name' => 'Jane Doe', 'nickname' => 'Janey'],
				'urlParams' => ['name' => 'Johnny Weissmüller'],
				'files' => ['file' => 'filevalue'],
				'env' => ['PATH' => 'daheim'],
				'session' => ['sezession' => 'kein'],
				'method' => 'hi',
			],
			$this->getMock('\OCP\Security\ISecureRandom'),
			$this->getMock('\OCP\IConfig')
		);

		$this->app = $this->getMock('OC\AppFramework\DependencyInjection\DIContainer',
									array('getAppName'), array('test'));
		$this->app->expects($this->any())
				->method('getAppName')
				->will($this->returnValue('apptemplate_advanced'));

		$this->controller = new ChildController($this->app, $request);
	}


	public function testParamsGet(){
		$this->assertEquals('Johnny Weissmüller', $this->controller->params('name', 'Tarzan'));
	}


	public function testParamsGetDefault(){
		$this->assertEquals('Tarzan', $this->controller->params('Ape Man', 'Tarzan'));
	}


	public function testParamsFile(){
		$this->assertEquals('filevalue', $this->controller->params('file', 'filevalue'));
	}


	public function testGetUploadedFile(){
		$this->assertEquals('filevalue', $this->controller->getUploadedFile('file'));
	}



	public function testGetUploadedFileDefault(){
		$this->assertEquals('default', $this->controller->params('files', 'default'));
	}


	public function testGetParams(){
		$params = array(
				'name' => 'Johnny Weissmüller',
				'nickname' => 'Janey',
			);

		$this->assertEquals($params, $this->controller->getParams());
	}


	public function testRender(){
		$this->assertTrue($this->controller->render('') instanceof TemplateResponse);
	}


	public function testSetParams(){
		$params = array('john' => 'foo');
		$response = $this->controller->render('home', $params);

		$this->assertEquals($params, $response->getParams());
	}


	public function testRenderHeaders(){
		$headers = array('one', 'two');
		$response = $this->controller->render('', array(), '', $headers);

		$this->assertTrue(in_array($headers[0], $response->getHeaders()));
		$this->assertTrue(in_array($headers[1], $response->getHeaders()));
	}


	public function testGetRequestMethod(){
		$this->assertEquals('hi', $this->controller->method());
	}


	public function testGetEnvVariable(){
		$this->assertEquals('daheim', $this->controller->env('PATH'));
	}


	/**
	 * @expectedException \DomainException
	 */
	public function testFormatResonseInvalidFormat() {
		$this->controller->buildResponse(null, 'test');
	}


	public function testFormat() {
		$response = $this->controller->buildResponse(array('hi'), 'json');

		$this->assertEquals(array('hi'), $response->getData());
	}


	public function testFormatDataResponseJSON() {
		$expectedHeaders = [
			'test' => 'something',
			'Cache-Control' => 'no-cache, must-revalidate',
			'Content-Type' => 'application/json; charset=utf-8',
			'Content-Security-Policy' => "default-src 'none';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self';font-src 'self';connect-src 'self';media-src 'self'",
		];

		$response = $this->controller->customDataResponse(array('hi'));
		$response = $this->controller->buildResponse($response, 'json');

		$this->assertEquals(array('hi'), $response->getData());
		$this->assertEquals(300, $response->getStatus());
		$this->assertEquals($expectedHeaders, $response->getHeaders());
	}


	public function testCustomFormatter() {
		$response = $this->controller->custom('hi');
		$response = $this->controller->buildResponse($response, 'json');

		$this->assertEquals(array(2), $response->getData());
	}


	public function testDefaultResponderToJSON() {
		$responder = $this->controller->getResponderByHTTPHeader('*/*');

		$this->assertEquals('json', $responder);
	}


	public function testResponderAcceptHeaderParsed() {
		$responder = $this->controller->getResponderByHTTPHeader(
			'*/*, application/tom, application/json'
		);

		$this->assertEquals('tom', $responder);
	}


	public function testResponderAcceptHeaderParsedUpperCase() {
		$responder = $this->controller->getResponderByHTTPHeader(
			'*/*, apPlication/ToM, application/json'
		);

		$this->assertEquals('tom', $responder);
	}

	/**
	 * @expectedException \OC\AppFramework\Middleware\Security\SecurityException
	 */
	public function testCorsWebsiteCall() {
		$request = new Request(
			['server' => [
				'HTTP_ORIGIN' => 'test',
				'REQUEST_URI' => '/index.php/app/news',
				'SCRIPT_NAME' => '/index.php',
			]],
			$this->getMock('\OCP\Security\ISecureRandom'),
			$this->getMock('\OCP\IConfig')
		);
		$this->controller = new ChildController('app', $request);

		$response = $this->controller->options();
	}

	public function testCors() {
		$request = new Request(
			['server' => [
				'HTTP_ORIGIN' => 'test',
				'REQUEST_URI' => '/index.php/api/news',
				'SCRIPT_NAME' => '/index.php',
			]],
			$this->getMock('\OCP\Security\ISecureRandom'),
			$this->getMock('\OCP\IConfig')
		);
		$this->controller = new ChildController('app', $request);

		$response = $this->controller->options();

		$headers = $response->getHeaders();

		$methods = 'GET,POST,PUT,DELETE,PATCH,HEAD';
		$heads = 'Authorization,Content-Type,Accept';

		$this->assertEquals('test', $headers['Access-Control-Allow-Origin']);
		$this->assertEquals($methods, $headers['Access-Control-Allow-Methods']);
		$this->assertEquals($heads, $headers['Access-Control-Allow-Headers']);
		$this->assertEquals('false', $headers['Access-Control-Allow-Credentials']);
		$this->assertEquals(3600, $headers['Access-Control-Max-Age']);
	}

	public function testCorsOverwrite() {
		$request = new Request(
			['server' => [
				'HTTP_ORIGIN' => 'test',
				'REQUEST_URI' => '/index.php/api/news',
				'SCRIPT_NAME' => '/index.php',
			]],
			$this->getMock('\OCP\Security\ISecureRandom'),
			$this->getMock('\OCP\IConfig')
		);
		$cors = new CrossOriginResourceSharing;
		$cors->setAccessControlAllowMethods(['verbs', 'verbs2'])
			->setAccessControlAllowHeaders(['headers', 'headers2'])
			->setAccessControlMaxAge(100);

		$this->controller = new ChildController('app', $request, $cors);

		$response = $this->controller->options();

		$headers = $response->getHeaders();

		$this->assertEquals('test', $headers['Access-Control-Allow-Origin']);
		$this->assertEquals('VERBS,VERBS2', $headers['Access-Control-Allow-Methods']);
		$this->assertEquals('headers,headers2', $headers['Access-Control-Allow-Headers']);
		$this->assertEquals('false', $headers['Access-Control-Allow-Credentials']);
		$this->assertEquals(100, $headers['Access-Control-Max-Age']);
	}

}
