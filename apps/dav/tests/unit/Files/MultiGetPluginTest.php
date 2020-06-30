<?php

namespace OCA\DAV\Tests\Unit\Files;

use OCA\DAV\Files\MultiGetPlugin;
use OCP\IUserSession;
use Sabre\DAV\Server;
use Test\TestCase;

class MultiGetPluginTest extends TestCase {
	/**
	 * @var IUserSession|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $userSession;
	/**
	 * @var MultiGetPlugin
	 */
	private $plugin;

	protected function setUp(): void {
		parent::setUp();
		$this->userSession = $this->createMock(IUserSession::class);
		$this->plugin = new MultiGetPlugin($this->userSession);
	}

	public function testInitialize(): void {
		$server = new Server();
		$this->plugin->initialize($server);

		$this->assertArrayHasKey(MultiGetPlugin::NS_OWNCLOUD, $server->xml->namespaceMap);
		$this->assertArrayHasKey(MultiGetPlugin::REPORT_NAME, $server->xml->elementMap);
	}

	public function testSupportedReportSet(): void {
		$rs = $this->plugin->getSupportedReportSet('');
		$this->assertEquals(['{http://owncloud.org/ns}files-multiget'], $rs);
	}

	public function testFeatures(): void {
		$features = $this->plugin->getFeatures();
		$this->assertEquals([], $features);
	}
}
