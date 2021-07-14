<?php
namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OCA\DAV\Connector\Sabre\MSOFBAPlugin;
use OCP\IURLGenerator;
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
	/**
	 * @var IURLGenerator|MockObject
	 */
	private $urlGenerator;

	public function setUp(): void {
		parent::setUp();
		$this->server = new Server();

		$this->server->sapi = $this->getMockBuilder(stdClass::class)
			->setMethods(['sendResponse'])
			->getMock();

		$this->server->httpRequest->setMethod('OPTIONS');

		$this->userSession = $this->createMock(IUserSession::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);

		$this->plugin = new MSOFBAPlugin($this->userSession, $this->urlGenerator);
	}

	public function testMSOfficeNotAuthorized(): void {
		# sapi to be called
		$this->server->sapi->expects(self::once())->method('sendResponse')->with($this->server->httpResponse);

		# some url need to be generated
		$this->urlGenerator->expects(self::once())->method('linkToRoute')->willReturn('/success');
		$this->urlGenerator->expects(self::exactly(2))->method('linkToRouteAbsolute')->willReturnCallback(static function ($routeName) {
			if ($routeName === 'dav.msofba.success') {
				return 'https://example.net/success';
			}
			if ($routeName === 'core.login.showLoginForm') {
				return 'https://example.net/login';
			}
		});

		$this->server->httpRequest->setAbsoluteUrl('https://currentdomain.tld:8080/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setUrl('/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setHeader('User-Agent', 'Microsoft Office');

		$this->server->addPlugin($this->plugin);
		$this->server->start();

		self::assertEquals(403, $this->server->httpResponse->getStatus());
		self::assertEquals('https://example.net/login', $this->server->httpResponse->getHeader('X-FORMS_BASED_AUTH_REQUIRED'));
	}

	public function testMSOfficeAuthorized(): void {
		$this->userSession->expects(self::once())->method('isLoggedIn')->willReturn(true);
		# sapi to be called
		$this->server->sapi->expects(self::once())->method('sendResponse')->with($this->server->httpResponse);

		# some url need to be generated
		$this->urlGenerator->expects(self::never())->method('linkToRoute');
		$this->urlGenerator->expects(self::never())->method('linkToRouteAbsolute');

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

		# some url need to be generated
		$this->urlGenerator->expects(self::never())->method('linkToRoute');
		$this->urlGenerator->expects(self::never())->method('linkToRouteAbsolute');

		$this->server->httpRequest->setAbsoluteUrl('https://currentdomain.tld:8080/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setUrl('/owncloud/remote.php/dav/files/user1/target/path');
		$this->server->httpRequest->setHeader('User-Agent', 'Firefox');

		$this->server->addPlugin($this->plugin);
		$this->server->start();

		self::assertEquals(200, $this->server->httpResponse->getStatus());
		self::assertTrue($this->server->httpResponse->hasHeader('DAV'));
	}
}
