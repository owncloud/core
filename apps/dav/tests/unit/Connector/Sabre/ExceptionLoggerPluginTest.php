<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OC\Log;
use OCA\DAV\Connector\Sabre\Exception\InvalidPath;
use OCA\DAV\Connector\Sabre\Exception\UnsupportedMediaType;
use OCA\DAV\Connector\Sabre\ExceptionLoggerPlugin as PluginToTest;
use OCP\Files\ExcludeForbiddenException;
use OCP\Files\FileContentNotAllowedException;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\Exception\InsufficientStorage;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Server;
use Test\TestCase;

class TestLogger extends Log {
	public $message;
	public $level;

	public function __construct($logger = null) {
		//disable original constructor
	}

	public function log($level, $message, array $context = []) {
		$this->level = $level;
		$this->message = $message;
	}
}

class ExceptionLoggerPluginTest extends TestCase {

	/** @var Server */
	private $server;

	/** @var PluginToTest */
	private $plugin;

	/** @var TestLogger | PHPUnit\Framework\MockObject\MockObject */
	private $logger;

	private function init() {
		$this->server = new Server();
		$this->logger = new TestLogger();
		$this->plugin = new PluginToTest('unit-test', $this->logger);
		$this->plugin->initialize($this->server);
	}

	/**
	 * @dataProvider providesExceptions
	 */
	public function testLogging($expectedLogLevel, $expectedMessage, $exception) {
		$this->init();
		$result = $this->plugin->logException($exception);

		if ($exception instanceof FileContentNotAllowedException) {
			$this->assertNull($result);
		} else {
			$this->assertEquals($expectedLogLevel, $this->logger->level);
			$this->assertStringStartsWith('Exception: ' . $expectedMessage, $this->logger->message);
		}
	}

	public function providesExceptions() {
		return [
			[0, 'HTTP/1.1 404 Not Found', new NotFound()],
			[4, 'HTTP/1.1 400 This path leads to nowhere', new InvalidPath('This path leads to nowhere')],
			[0, '', new FileContentNotAllowedException("Testing", 0, new FileContentNotAllowedException("pervious exception", 0))],
			[0, "HTTP/1.1 507 Testing", new InsufficientStorage("Testing", 0, null)]
		];
	}
}
