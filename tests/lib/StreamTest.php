<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace Test\Files;

use OC\Files\View;
use OC\Streamer;
use Test\TestCase;
use Test\Traits\UserTrait;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class StreamTest
 *
 * @group DB
 * @package Test\Files
 */
class StreamTest extends TestCase {

	use UserTrait;

	/**
	 * @var Streamer
	 */
	private $streamer;

	protected function setUp() {
		parent::setUp();
	}

	/**
	 * Test the events for file read.
	 */
	public function testAddDirRecursive() {
		$this->createUser('foo', 'foo');
		$this->loginAsUser('foo');

		$view = new View('/foo/files');
		$view->mkdir('test');
		$view->touch('test/foo.txt');
		$view->touch('test/bar.txt');

		$calledAfterEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.afterread', function ($event) use (&$calledAfterEvent) {
			$calledAfterEvent[] = 'file.afterread';
			$calledAfterEvent[] = $event;
		});
		$this->streamer = new Streamer();
		$this->streamer->addDirRecursive('test');
		$this->assertInstanceOf(GenericEvent::class, $calledAfterEvent[1]);
		$this->assertArrayHasKey('path', $calledAfterEvent[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterEvent[3]);
		$this->assertArrayHasKey('path', $calledAfterEvent[3]);
	}
}