<?php
namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OCA\DAV\Connector\Sabre\MSOFBAPlugin;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\Server;
use stdClass;
use Test\TestCase;

class MSOFBAPluginTest extends TestCase {

	/**
	 * @var Server
	 */
	private $server;

	/**
	 * @var MSOFBAPlugin
	 */
	private $plugin;

	/**
	 * @var IUserSession | MockObject
	 */
	private $userSession;

	public function setUp(): void {
		parent::setUp();
		$this->server = new Server();

		$this->server->sapi = $this->getMockBuilder(stdClass::class)
			->setMethods(['sendResponse'])
			->getMock();

		$this->server->httpRequest->setMethod('OPTIONS');

		$this->userSession = $this->createMock(IUserSession::class);

		$this->plugin = new MSOFBAPlugin($this->userSession, \OC::$server->getURLGenerator());
	}

	public function testMSOfficeNotAuthorized(): void {
		# sapi to be called
		$this->server->sapi->expects(self::once())->method('sendResponse')->with($this->server->httpResponse);

		$this->server->httpRequest->setAbsoluteUrl('https://currentdomain.tld:8080/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setUrl('/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setHeader('User-Agent', 'Microsoft Office');

		$this->server->addPlugin($this->plugin);
		$this->server->start();

		self::assertEquals(403, $this->server->httpResponse->getStatus());
		self::assertStringEndsWith('index.php/login?redirect_url=/index.php/apps/dav/msofba-success', $this->server->httpResponse->getHeader('X-FORMS_BASED_AUTH_REQUIRED'));
	}

	public function testMSOfficeAuthorized(): void {
		$this->userSession->expects(self::once())->method('isLoggedIn')->willReturn(true);
		# sapi to be called
		$this->server->sapi->expects(self::once())->method('sendResponse')->with($this->server->httpResponse);

		$this->server->httpRequest->setAbsoluteUrl('https://currentdomain.tld:8080/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setUrl('/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setHeader('User-Agent', 'Microsoft Office');

		$this->server->addPlugin($this->plugin);
		$this->server->start();

		self::assertEquals(200, $this->server->httpResponse->getStatus());
		self::assertTrue($this->server->httpResponse->hasHeader('DAV'));
	}

	public function testNonMSOffice(): void {
		$this->userSession->expects(self::never())->method('isLoggedIn');
		# sapi to be called
		$this->server->sapi->expects(self::once())->method('sendResponse')->with($this->server->httpResponse);

		$this->server->httpRequest->setAbsoluteUrl('https://currentdomain.tld:8080/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setUrl('/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setHeader('User-Agent', 'Firefox');

		$this->server->addPlugin($this->plugin);
		$this->server->start();

		self::assertEquals(200, $this->server->httpResponse->getStatus());
		self::assertTrue($this->server->httpResponse->hasHeader('DAV'));
	}
}
