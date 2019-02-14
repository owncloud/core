<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test\Files\Storage;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use OC\Files\Cache\Cache;
use OC\Files\Storage\DAV;
use OCP\AppFramework\Http;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Files\FileInfo;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use OCP\Http\Client\IClient;
use OCP\Http\Client\IClientService;
use OCP\Http\Client\IWebDavClientService;
use OCP\Lock\LockedException;
use Sabre\DAV\Client;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\InsufficientStorage;
use Sabre\HTTP\ClientHttpException;
use Test\TestCase;

/**
 * Class DavTest
 *
 * @group DB
 *
 * @package Test\Files\Storage
 */
class DavTest extends TestCase {

	/**
	 * @var DAV | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $instance;

	/**
	 * @var IClientService | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $httpClientService;

	/**
	 * @var IWebDavClientService | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $webDavClientService;

	/**
	 * @var Client | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $davClient;

	/**
	 * @var IClient | \PHPUnit\Framework\MockObject\MockObject
	 **/
	private $httpClient;

	/**
	 * @var ITimeFactory | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $timeFactory;

	/**
	 * @var Cache | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $cache;

	protected function setUp(): void {
		parent::setUp();

		$this->httpClientService = $this->createMock(IClientService::class);
		$this->overwriteService('HttpClientService', $this->httpClientService);

		$this->webDavClientService = $this->createMock(IWebDavClientService::class);
		$this->overwriteService('WebDavClientService', $this->webDavClientService);

		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->overwriteService('TimeFactory', $this->timeFactory);

		$this->httpClient = $this->createMock(IClient::class);
		$this->httpClientService->method('newClient')->willReturn($this->httpClient);

		$this->davClient = $this->createMock(Client::class);
		$this->webDavClientService->method('newClient')->willReturn($this->davClient);

		$this->instance = $this->getMockBuilder(\OC\Files\Storage\DAV::class)
			->setConstructorArgs([[
				'user' => 'davuser',
				'password' => 'davpassword',
				'host' => 'davhost',
				'root' => 'davroot',
				'secure' => true
			]])
			->setMethods(['getCache'])
			->getMock();

		$this->cache = $this->createMock(Cache::class);
		$this->instance->method('getCache')->willReturn($this->cache);
	}

	protected function tearDown(): void {
		$this->restoreService('HttpClientService');
		$this->restoreService('WebDavClientService');
		$this->restoreService('TimeFactory');
		parent::tearDown();
	}

	public function testId() {
		$this->assertEquals('webdav::davuser@davhost//davroot/', $this->instance->getId());
	}

	public function instantiateWebDavClientDataProvider() {
		return [
			[false, 'http'],
			[true, 'https'],
		];
	}

	/**
	 * @dataProvider instantiateWebDavClientDataProvider
	 */
	public function testInstantiateWebDavClient($secure, $protocol) {
		$this->restoreService('WebDavClientService');
		$this->webDavClientService = $this->createMock(IWebDavClientService::class);
		$this->overwriteService('WebDavClientService', $this->webDavClientService);
		$this->webDavClientService->expects($this->once())
			->method('newClient')
			->with([
				'baseUri' => $protocol . '://davhost/davroot/',
				'userName' => 'davuser',
				'password' => 'davpassword',
				'authType' => 'basic',
			])
			->willReturn($this->davClient);

		$this->instance = new \OC\Files\Storage\DAV([
			'user' => 'davuser',
			'password' => 'davpassword',
			'host' => 'davhost',
			'root' => 'davroot',
			'authType' => 'basic',
			'secure' => $secure
		]);

		// trigger lazy init
		$this->instance->mkdir('/test');
	}

	public function invalidConfigDataProvider() {
		return [
			[[
				'user' => 'davuser',
				'password' => 'davpassword',
				'root' => 'davroot',
			], [
				'user' => 'davuser',
				'host' => 'davhost',
				'root' => 'davroot',
			], [
				'password' => 'davpassword',
				'host' => 'davhost',
				'root' => 'davroot',
			]],
		];
	}

	/**
	 * @dataProvider invalidConfigDataProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testInstantiateWebDavClientInvalidConfig($params) {
		new \OC\Files\Storage\DAV($params);
	}

	private function createClientHttpException($statusCode) {
		$response = $this->createMock(\Sabre\HTTP\ResponseInterface::class);
		$response->method('getStatusText')->willReturn('');
		$response->method('getStatus')->willReturn($statusCode);
		return new ClientHttpException($response);
	}

	private function createGuzzleClientException($statusCode) {
		$request = $this->createMock(\GuzzleHttp\Message\RequestInterface::class);
		$response = $this->createMock(\GuzzleHttp\Message\ResponseInterface::class);
		$response->method('getStatusCode')->willReturn($statusCode);
		return new ClientException('ClientException', $request, $response);
	}

	private function createGuzzleServerException($statusCode) {
		$request = $this->createMock(\GuzzleHttp\Message\RequestInterface::class);
		$response = $this->createMock(\GuzzleHttp\Message\ResponseInterface::class);
		$response->method('getStatusCode')->willReturn($statusCode);
		return new ServerException('ServerException', $request, $response);
	}

	public function convertExceptionDataProvider() {
		$statusCases = [
			[Http::STATUS_UNAUTHORIZED, StorageInvalidException::class],
			[Http::STATUS_LOCKED, LockedException::class],
			[Http::STATUS_INSUFFICIENT_STORAGE, InsufficientStorage::class],
			[Http::STATUS_FORBIDDEN, Forbidden::class],
			[Http::STATUS_INTERNAL_SERVER_ERROR, StorageNotAvailableException::class],
		];

		$testCases = [
			[new \Sabre\DAV\Exception\Forbidden('Forbidden'), \Sabre\DAV\Exception\Forbidden::class],
			[new \InvalidArgumentException(), StorageNotAvailableException::class],
			[new StorageNotAvailableException(), StorageNotAvailableException::class],
			[new StorageInvalidException(), StorageInvalidException::class],
		];

		// map to ClientHttpException
		foreach ($statusCases as $statusCase) {
			$testCases[] = [$this->createClientHttpException($statusCase[0]), $statusCase[1]];
			$testCases[] = [$this->createGuzzleClientException($statusCase[0]), $statusCase[1]];
			$testCases[] = [$this->createGuzzleServerException($statusCase[0]), $statusCase[1]];
		}

		// one case where Guzzle response is null, for whatever reason
		$testCases[] = [
			new ServerException(
				'ServerException with no response',
				$this->createMock(\GuzzleHttp\Message\RequestInterface::class),
				null
			),
			StorageNotAvailableException::class
		];

		return $testCases;
	}

	/**
	 * @dataProvider convertExceptionDataProvider
	 */
	public function testConvertException($inputException, $expectedExceptionClass) {
		$this->davClient->method('propfind')->will($this->throwException($inputException));

		$thrownException = null;
		try {
			$this->instance->opendir('/test');
		} catch (\Exception $e) {
			$thrownException = $e;
		}

		$this->assertNotNull($thrownException);
		$this->assertInstanceOf($expectedExceptionClass, $thrownException);
	}

	public function testMkdir() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('MKCOL', 'new%25dir', null)
			->willReturn(['statusCode' => Http::STATUS_CREATED]);

		$this->assertTrue($this->instance->mkdir('/new%dir'));
	}

	public function testMkdirAlreadyExists() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('MKCOL', 'new%25dir', null)
			->willThrowException($this->createClientHttpException(Http::STATUS_METHOD_NOT_ALLOWED));

		$this->assertFalse($this->instance->mkdir('/new%dir'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testMkdirException() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('MKCOL', 'new%25dir', null)
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->mkdir('/new%dir');
	}

	public function testRmdir() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25dir', null)
			->willReturn(['statusCode' => Http::STATUS_NO_CONTENT]);

		$this->assertTrue($this->instance->rmdir('/old%dir'));
	}

	public function testRmdirUnexist() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25dir', null)
			->willReturn(['statusCode' => Http::STATUS_NOT_FOUND]);

		$this->assertFalse($this->instance->rmdir('/old%dir'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testRmdirException() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25dir', null)
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->rmdir('/old%dir');
	}

	public function testOpenDir() {
		$responseBody = [
			// root entry
			'some%25dir' => [],
			'some%25dir/first%25folder' => [],
			'some%25dir/second' => [],
		];

		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', [], 1)
			->willReturn($responseBody);

		// do operation twice, second time will not trigger propfind
		// due to stat cache
		$i = 0;
		while ($i < 1) {
			$i++;

			$dir = $this->instance->opendir('/some%dir');
			$entries = [];
			while ($entry = \readdir($dir)) {
				$entries[] = $entry;
			}

			$this->assertCount(2, $entries);
			$this->assertEquals('first%folder', $entries[0]);
			$this->assertEquals('second', $entries[1]);
		}
	}

	public function testOpenDirNotFound() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', [], 1)
			->willThrowException($this->createClientHttpException(Http::STATUS_NOT_FOUND));

		$this->assertFalse($this->instance->opendir('/some%dir'));
	}

	public function testOpenDirNotFound2() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', [], 1)
			->willReturn(false);

		$this->assertFalse($this->instance->opendir('/some%dir'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testOpenDirException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', [], 1)
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->opendir('/some%dir');
	}

	private function getResourceTypeResponse($isDir) {
		$resourceTypeObj = $this->getMockBuilder('\stdclass')
			->setMethods(['getValue'])
			->getMock();
		if ($isDir) {
			$resourceTypeObj->method('getValue')
				->willReturn(['{DAV:}collection']);
		} else {
			$resourceTypeObj->method('getValue')
				->willReturn([]);
		}
		return $resourceTypeObj;
	}

	public function testFileTypeDir() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25type', $this->contains('{DAV:}resourcetype'))
			->willReturn([
				'{DAV:}resourcetype' => $this->getResourceTypeResponse(true)
			]);

		$this->assertEquals('dir', $this->instance->filetype('/some%dir/file%type'));
	}

	public function testFileTypeFile() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25type', $this->contains('{DAV:}resourcetype'))
			->willReturn([]);

		$this->assertEquals('file', $this->instance->filetype('/some%dir/file%type'));
	}

	public function testFileTypeNotFound() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25type', $this->contains('{DAV:}resourcetype'))
			->willThrowException($this->createClientHttpException(Http::STATUS_NOT_FOUND));

		$this->assertFalse($this->instance->filetype('/some%dir/file%type'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testFileTypeException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25type', $this->contains('{DAV:}resourcetype'))
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->filetype('/some%dir/file%type');
	}

	public function testFileExists() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn(true);

		$this->assertTrue($this->instance->file_exists('/some%dir/file%.txt'));

		// stat cache: calling again does not redo a propfind
		$this->assertTrue($this->instance->file_exists('/some%dir/file%.txt'));
	}

	public function testFileExistsDoesNot() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn(false);

		$this->assertFalse($this->instance->file_exists('/some%dir/file%.txt'));

		// stat cache: calling again does not redo a propfind
		$this->assertFalse($this->instance->file_exists('/some%dir/file%.txt'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testFileExistsException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->file_exists('/some%dir/file%.txt');
	}

	public function testUnlink() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25file.txt', null)
			->willReturn(['statusCode' => Http::STATUS_NO_CONTENT]);

		$this->assertTrue($this->instance->unlink('/old%file.txt'));
	}

	public function testUnlinkUnexist() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25file.txt', null)
			->willReturn(['statusCode' => Http::STATUS_NOT_FOUND]);

		$this->assertFalse($this->instance->unlink('/old%file.txt'));
	}

	public function testUnlinkUnexist2() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25file.txt', null)
			->willThrowException($this->createClientHttpException(Http::STATUS_NOT_FOUND));

		$this->assertFalse($this->instance->unlink('/old%file.txt'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testUnlinkException() {
		$this->davClient->expects($this->once())
			->method('request')
			->with('DELETE', 'old%25file.txt', null)
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->unlink('/old%file.txt');
	}

	public function testFopenRead() {
		$response = $this->createMock(\GuzzleHttp\Message\ResponseInterface::class);
		$response->method('getStatusCode')->willReturn(Http::STATUS_OK);
		$response->method('getBody')->willReturn(\fopen('data://text/plain,response body', 'r'));

		$this->httpClient->expects($this->once())
			->method('get')
			->with(
				'https://davhost/davroot/some%25dir/file%25.txt', [
					'auth' => ['davuser', 'davpassword'],
					'stream' => true
				]
			)
			->willReturn($response);

		$fh = $this->instance->fopen('/some%dir/file%.txt', 'r');
		$contents = \stream_get_contents($fh);
		\fclose($fh);

		$this->assertEquals('response body', $contents);
	}

	public function testFopenReadNotFound() {
		$this->httpClient->expects($this->once())
			->method('get')
			->with(
				'https://davhost/davroot/some%25dir/file%25.txt', [
					'auth' => ['davuser', 'davpassword'],
					'stream' => true
				]
			)
			->willThrowException($this->createGuzzleClientException(Http::STATUS_NOT_FOUND));

		$this->assertFalse($this->instance->fopen('/some%dir/file%.txt', 'r'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testFopenReadException() {
		$this->httpClient->expects($this->once())
			->method('get')
			->with(
				'https://davhost/davroot/some%25dir/file%25.txt', [
					'auth' => ['davuser', 'davpassword'],
					'stream' => true
				]
			)
			->willThrowException($this->createGuzzleClientException(Http::STATUS_FORBIDDEN));

		$this->instance->fopen('/some%dir/file%.txt', 'r');
	}

	/**
	 * @expectedException \OCP\Lock\LockedException
	 */
	public function testFopenReadLockedException() {
		$response = $this->createMock(\GuzzleHttp\Message\ResponseInterface::class);
		$response->method('getStatusCode')->willReturn(Http::STATUS_LOCKED);
		$response->method('getBody')->willReturn(\fopen('data://text/plain,response body', 'r'));

		$this->httpClient->expects($this->once())
			->method('get')
			->with(
				'https://davhost/davroot/some%25dir/file%25.txt', [
					'auth' => ['davuser', 'davpassword'],
					'stream' => true
				]
			)
			->willReturn($response);

		$this->instance->fopen('/some%dir/file%.txt', 'r');
	}

	public function testFopenWriteNewFile() {
		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn(false);

		// isCreatable on parent / getPermissions
		$this->davClient->expects($this->at(1))
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn([
				'{http://owncloud.org/ns}permissions' => 'RDWCK'
			]);

		$uploadUrl = null;
		$uploadOptions = null;
		$this->httpClient->expects($this->once())
			->method('put')
			->will($this->returnCallback(function ($url, $options) use (&$uploadUrl, &$uploadOptions) {
				$uploadUrl = $url;
				$uploadOptions = $options;
			}));

		$fh = $this->instance->fopen('/some%dir/file%.txt', 'w');
		\fwrite($fh, 'whatever');
		\fclose($fh);

		$this->assertEquals('https://davhost/davroot/some%25dir/file%25.txt', $uploadUrl);
		$this->assertEquals(['davuser', 'davpassword'], $uploadOptions['auth']);
		$this->assertEquals('whatever', \stream_get_contents($uploadOptions['body']));
	}

	public function testFopenWriteNewFileNoPermission() {
		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn(false);

		// isCreatable on parent / getPermissions
		$this->davClient->expects($this->at(1))
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn([
				'{http://owncloud.org/ns}permissions' => 'R'
			]);

		$this->httpClient->expects($this->never())
			->method('put');

		$this->assertFalse($this->instance->fopen('/some%dir/file%.txt', 'w'));
	}

	public function testFopenWriteExistingFile() {
		// file_exists, and cached response for isUpdatable / getPermissions
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn([
				'{http://owncloud.org/ns}permissions' => 'RDWCK'
			]);

		$uploadUrl = null;
		$uploadOptions = null;
		$this->httpClient->expects($this->once())
			->method('put')
			->will($this->returnCallback(function ($url, $options) use (&$uploadUrl, &$uploadOptions) {
				$uploadUrl = $url;
				$uploadOptions = $options;
			}));

		$fh = $this->instance->fopen('/some%dir/file%.txt', 'w');
		\fwrite($fh, 'whatever');
		\fclose($fh);

		$this->assertEquals('https://davhost/davroot/some%25dir/file%25.txt', $uploadUrl);
		$this->assertEquals(['davuser', 'davpassword'], $uploadOptions['auth']);
		$this->assertEquals('whatever', \stream_get_contents($uploadOptions['body']));
	}

	public function testFopenWriteExistingFileNoPermission() {
		// file_exists, and cached response for isUpdatable / getPermissions
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn([
				'{http://owncloud.org/ns}permissions' => 'R'
			]);

		$this->httpClient->expects($this->never())
			->method('put');

		$this->assertFalse($this->instance->fopen('/some%dir/file%.txt', 'w'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testFopenWriteExceptionEarly() {
		// file_exists, and cached response for isUpdatable / getPermissions
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->httpClient->expects($this->never())
			->method('put');

		$this->instance->fopen('/some%dir/file%.txt', 'w');
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testFopenWriteExceptionLate() {
		// file_exists, and cached response for isUpdatable / getPermissions
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn([
				'{http://owncloud.org/ns}permissions' => 'RDWCK'
			]);

		$uploadUrl = null;
		$uploadOptions = null;
		$this->httpClient->expects($this->once())
			->method('put')
			->willThrowException($this->createGuzzleClientException(Http::STATUS_FORBIDDEN));

		$fh = $this->instance->fopen('/some%dir/file%.txt', 'w');
		\fwrite($fh, 'whatever');
		\fclose($fh);
	}

	public function freespaceProvider() {
		return [
			[false, FileInfo::SPACE_UNKNOWN],
			[['{DAV:}quota-available-bytes' => 123], 123],
			[['{DAV:}quota-available-bytes' => FileInfo::SPACE_UNKNOWN], FileInfo::SPACE_UNKNOWN],
			[[], FileInfo::SPACE_UNKNOWN],
		];
	}

	/**
	 * @dataProvider freespaceProvider
	 */
	public function testFreeSpace($propFindResponse, $apiResponse) {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}quota-available-bytes'), 0)
			->willReturn($propFindResponse);

		$this->assertEquals($apiResponse, $this->instance->free_space('/some%dir'));
	}

	public function testFreeSpaceException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->assertEquals(FileInfo::SPACE_UNKNOWN, $this->instance->free_space('/some%dir'));
	}

	public function touchProvider() {
		return [
			// server accepted mtime
			[1508496363, null, '2017-10-20T12:46:03+02:00', true],
			// server did not accept mtime
			[1508496363, null, '2017-10-20T12:40:00+02:00', false],
			// time factory generated mtime
			[null, 1508496363, '2017-10-20T12:46:03+02:00', true],
		];
	}

	/**
	 * @dataProvider touchProvider
	 */
	public function testTouchExisting($setMtime, $factoryTime, $readMtime, $expectedResult) {
		if ($factoryTime !== null) {
			$this->timeFactory->expects($this->once())
				->method('getTime')
				->willReturn($factoryTime);
		} else {
			$this->timeFactory->expects($this->never())
				->method('getTime');
		}

		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir')
			->willReturn([]);

		$this->davClient->expects($this->at(1))
			->method('proppatch')
			->with('some%25dir', ['{DAV:}lastmodified' => $setMtime || $factoryTime]);

		// propfind after proppatch, to check if applied
		$this->davClient->expects($this->at(2))
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}getlastmodified'), 0)
			->willReturn([
				'{DAV:}getlastmodified' => $readMtime
			]);

		$this->assertEquals($expectedResult, $this->instance->touch('/some%dir', $setMtime));
	}

	public function testTouchNonExisting() {
		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir/file%25.txt')
			->willReturn(false);

		// isCreatable on parent / getPermissions
		$this->davClient->expects($this->at(1))
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn([
				'{http://owncloud.org/ns}permissions' => 'RDWCK'
			]);

		$uploadUrl = null;
		$uploadOptions = null;
		$this->httpClient->expects($this->once())
			->method('put')
			->will($this->returnCallback(function ($url, $options) use (&$uploadUrl, &$uploadOptions) {
				$uploadUrl = $url;
				$uploadOptions = $options;
			}));

		$this->assertTrue($this->instance->touch('/some%dir/file%.txt'));

		$this->assertEquals('https://davhost/davroot/some%25dir/file%25.txt', $uploadUrl);
		$this->assertEquals(['davuser', 'davpassword'], $uploadOptions['auth']);
		$this->assertEquals('', \stream_get_contents($uploadOptions['body']));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testTouchException() {
		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir')
			->willReturn([]);

		$this->davClient->expects($this->at(1))
			->method('proppatch')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->touch('/some%dir', 1508496363);
	}

	public function testTouchNotFound() {
		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir')
			->willReturn([]);

		$this->davClient->expects($this->at(1))
			->method('proppatch');

		// maybe the file disappeared in-between ?
		$this->davClient->expects($this->at(2))
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}getlastmodified'), 0)
			->willReturn(false);

		$this->assertFalse($this->instance->touch('/some%dir', 1508496363));
	}
	
	public function testTouchNoServerSupport() {
		// file_exists
		$this->davClient->expects($this->at(0))
			->method('propfind')
			->with('some%25dir')
			->willReturn([]);

		$this->davClient->expects($this->at(1))
			->method('proppatch')
			->willThrowException($this->createClientHttpException(Http::STATUS_NOT_IMPLEMENTED));

		$this->assertFalse($this->instance->touch('/some%dir', 1508496363));
	}

	public function renameDataProvider() {
		return [
			['MOVE', 'rename', false, ''],
			['MOVE', 'rename', true, '/'],
			['COPY', 'copy', false, ''],
			['COPY', 'copy', true, '/'],
		];
	}

	/**
	 * @dataProvider renameDataProvider
	 */
	public function testRename($httpMethod, $storageMethod, $isDir, $extra) {
		$mock = $this->davClient->expects($this->once())
			->method('propfind')
			->with('new%25path/new%25file.txt', $this->contains('{DAV:}resourcetype'));
		$mock->willReturn([
				'{DAV:}resourcetype' => $this->getResourceTypeResponse($isDir)
			]);

		$this->davClient->expects($this->once())
			->method('request')
			->with($httpMethod, 'old%25path/old%25file.txt', null, ['Destination' => 'https://davhost/davroot/new%25path/new%25file.txt' . $extra])
			->willReturn(['statusCode' => Http::STATUS_OK]);

		$this->assertTrue($this->instance->$storageMethod('/old%path/old%file.txt', '/new%path/new%file.txt'));
	}

	public function statDataProvider() {
		return [
			[[
				'{DAV:}getlastmodified' => '2017-10-20T12:46:03+02:00',
				'{DAV:}getcontentlength' => 1024,
			], [
				'mtime' => 1508496363,
				'size' => 1024
			]],
			[[
				'{DAV:}getlastmodified' => '2017-10-20T12:46:03+02:00',
			], [
				'mtime' => 1508496363,
				'size' => 0
			]],
		];
	}

	/**
	 * @dataProvider statDataProvider
	 */
	public function testStat($davResponse, $apiResponse) {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25type', $this->logicalAnd($this->contains('{DAV:}getlastmodified'), $this->contains('{DAV:}getcontentlength')))
			->willReturn($davResponse);

		$this->assertEquals($apiResponse, $this->instance->stat('/some%dir/file%type'));
	}

	public function testStatRoot() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('', $this->logicalAnd($this->contains('{DAV:}getlastmodified'), $this->contains('{DAV:}getcontentlength')))
			->willReturn(['{DAV:}getlastmodified' => '2017-10-20T12:46:03+02:00']);

		$this->assertEquals(['mtime' => 1508496363, 'size' => 0], $this->instance->stat(''));
		$this->assertEquals(['mtime' => 1508496363, 'size' => 0], $this->instance->stat(''));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testStatException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->stat('/some%dir/file%type');
	}

	public function mimeTypeDataProvider() {
		return [
			[
				[
					'{DAV:}resourcetype' => $this->getResourceTypeResponse(true),
				],
				'httpd/unix-directory'
			],
			[
				[
					'{DAV:}resourcetype' => $this->getResourceTypeResponse(false),
					'{DAV:}getcontenttype' => 'text/plain'
				],
				'text/plain'
			],
			[
				[
					'{DAV:}getcontenttype' => 'text/plain'
				],
				'text/plain'
			],
			[
				[
				],
				false
			],
		];
	}

	/**
	 * @dataProvider mimeTypeDataProvider
	 */
	public function testMimeType($davResponse, $apiResponse) {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir/file%25type', $this->logicalAnd($this->contains('{DAV:}resourcetype'), $this->contains('{DAV:}getcontenttype')))
			->willReturn($davResponse);

		$this->assertEquals($apiResponse, $this->instance->getMimeType('/some%dir/file%type'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testMimeTypeException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->getMimeType('/some%dir/file%type');
	}

	public function permissionsDataProvider() {
		return [
			['CK', true, true, false, false],
			['W', false, true, false, false],
			['D', false, false, true, false],
			['R', false, false, false, true],
			['RDWCK', true, true, true, true],
		];
	}

	/**
	 * @dataProvider permissionsDataProvider
	 */
	public function testPermissions($perms, $creatable, $updatable, $deletable, $sharable) {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn([
				'{http://owncloud.org/ns}permissions' => $perms
			]);

		$path = 'some%dir';
		$this->assertEquals($creatable, $this->instance->isCreatable($path));
		$this->assertEquals($updatable, $this->instance->isUpdatable($path));
		$this->assertEquals($deletable, $this->instance->isDeletable($path));
		$this->assertEquals($sharable, $this->instance->isSharable($path));
	}

	public function testNoPermissionsDir() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn(['{DAV:}resourcetype' => $this->getResourceTypeResponse(true)]);

		// all perms given
		$path = 'some%dir';
		$this->assertTrue($this->instance->isCreatable($path));
		$this->assertTrue($this->instance->isUpdatable($path));
		$this->assertTrue($this->instance->isDeletable($path));
		$this->assertTrue($this->instance->isSharable($path));
	}

	public function testNoPermissionsFile() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn(['{DAV:}resourcetype' => $this->getResourceTypeResponse(false)]);

		// all perms given except create
		$path = 'some%dir';
		$this->assertFalse($this->instance->isCreatable($path));
		$this->assertTrue($this->instance->isUpdatable($path));
		$this->assertTrue($this->instance->isDeletable($path));
		$this->assertTrue($this->instance->isSharable($path));
	}

	public function testGetPermissionsUnexist() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{http://owncloud.org/ns}permissions'))
			->willReturn(false);

		// all perms given
		$path = 'some%dir';
		$this->assertFalse($this->instance->isCreatable($path));
		$this->assertFalse($this->instance->isUpdatable($path));
		$this->assertFalse($this->instance->isDeletable($path));
		$this->assertFalse($this->instance->isSharable($path));
		$this->assertEquals(0, $this->instance->getPermissions($path));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testGetPermissionsException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$path = 'some%dir';
		$this->instance->isSharable($path);
	}

	public function testGetEtag() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}getetag'))
			->willReturn([
				'{DAV:}getetag' => '"thisisanetagisntit"'
			]);

		$this->assertEquals('thisisanetagisntit', $this->instance->getETag('some%dir'));
	}

	public function testGetEtagFallback() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}getetag'))
			->willReturn([]);

		// unique id
		$this->assertInternalType('string', $this->instance->getETag('some%dir'));
	}

	public function testGetEtagUnexist() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}getetag'))
			->willReturn(false);

		$this->assertNull($this->instance->getETag('some%dir'));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testGetEtagException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir', $this->contains('{DAV:}getetag'))
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->getETag('some%dir');
	}

	public function hasUpdatedDataProvider() {
		return [
			// etag did not change
			[
				[
					'{DAV:}getetag' => '"oldetag"'
				],
				[
					'etag' => 'oldetag'
				],
				false
			],
			// etag changed
			[
				[
					'{DAV:}getetag' => '"newetag"'
				],
				[
					'etag' => 'oldetag'
				],
				true
			],
			// etag did not change, share permissions did
			[
				[
					'{DAV:}getetag' => '"oldetag"',
					'{http://open-collaboration-services.org/ns}share-permissions' => 1
				],
				[
					'etag' => 'oldetag',
					'permissions' => 31
				],
				true
			],
			// etag did not change, share permissions did not
			[
				[
					'{DAV:}getetag' => '"oldetag"',
					'{http://open-collaboration-services.org/ns}share-permissions' => 1
				],
				[
					'etag' => 'oldetag',
					'permissions' => 1
				],
				false
			],
			// etag did not change, regular permissions did
			[
				[
					'{DAV:}getetag' => '"oldetag"',
					'{http://owncloud.org/ns}permissions' => 1
				],
				[
					'etag' => 'oldetag',
					'permissions' => 31
				],
				true
			],
			// etag did not change, regular permissions did not
			[
				[
					'{DAV:}getetag' => '"oldetag"',
					'{http://owncloud.org/ns}permissions' => 1
				],
				[
					'etag' => 'oldetag',
					'permissions' => 1
				],
				false
			],
			// no etag, fallback to last modified, unchanged case
			[
				[
					'{DAV:}getlastmodified' => '2017-10-20T12:46:03+02:00'
				],
				null,
				false
			],
			// no etag, fallback to last modified, older case
			[
				[
					'{DAV:}getlastmodified' => '2017-10-20T12:40:03+02:00'
				],
				null,
				false
			],
			// no etag, fallback to last modified, remote mtime higher case
			[
				[
					'{DAV:}getlastmodified' => '2017-10-20T12:50:03+02:00'
				],
				null,
				true
			],
		];
	}

	/**
	 * @dataProvider hasUpdatedDataProvider
	 */
	public function testHasUpdated($davResponse, $cacheResponse, $expectedResult) {
		$this->davClient->expects($this->once())
			->method('propfind')
			->with('some%25dir',
				$this->logicalAnd(
					$this->contains('{DAV:}getetag'),
					$this->contains('{DAV:}getlastmodified'),
					$this->contains('{http://owncloud.org/ns}permissions'),
					$this->contains('{http://open-collaboration-services.org/ns}share-permissions')
				)
			)
			->willReturn($davResponse);

		if ($cacheResponse !== null) {
			$this->cache->expects($this->once())
				->method('get')
				->with('some%dir')
				->willReturn($cacheResponse);
		} else {
			$this->cache->expects($this->never())
				->method('get');
		}

		$this->assertEquals($expectedResult, $this->instance->hasUpdated('some%dir', 1508496363));
	}

	public function testHasUpdatedPathNotfound() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willReturn(false);

		$this->assertFalse($this->instance->hasUpdated('some%dir', 1508496363));
	}

	/**
	 * @expectedException \OCP\Files\StorageNotAvailableException
	 */
	public function testHasUpdatedRootPathNotfound() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willReturn(false);

		$this->instance->hasUpdated('', 1508496363);
	}

	/**
	 * @expectedException \OCP\Files\StorageNotAvailableException
	 */
	public function testHasUpdatedRootPathMethodNotAllowed() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_METHOD_NOT_ALLOWED));

		$this->instance->hasUpdated('', 1508496363);
	}

	/**
	 * @expectedException \OCP\Files\StorageNotAvailableException
	 */
	public function testHasUpdatedMethodNotAllowed() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_METHOD_NOT_ALLOWED));

		$this->assertFalse($this->instance->hasUpdated('some%dir', 1508496363));
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\Forbidden
	 */
	public function testHasUpdatedException() {
		$this->davClient->expects($this->once())
			->method('propfind')
			->willThrowException($this->createClientHttpException(Http::STATUS_FORBIDDEN));

		$this->instance->hasUpdated('some%dir', 1508496363);
	}
}
