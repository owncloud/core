<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OCA\Files_Sharing\Tests\Controllers;

use OCA\Files_Sharing\Controllers\ExternalSharesController;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\Http\Client\IClient;
use OCP\Http\Client\IClientService;
use OCP\Http\Client\IResponse;
use OCP\IRequest;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class ExternalShareControllerTest
 * @group DB
 *
 * @package OCA\Files_Sharing\Controllers
 */
class ExternalShareControllerTest extends \Test\TestCase {
	/** @var IRequest */
	private $request;
	/** @var \OCA\Files_Sharing\External\Manager */
	private $externalManager;
	/** @var IClientService */
	private $clientService;

	public function setUp(): void {
		parent::setUp();
		$this->request = $this->getMockBuilder('\\OCP\\IRequest')
			->disableOriginalConstructor()->getMock();
		$this->externalManager = $this->getMockBuilder('\\OCA\\Files_Sharing\\External\\Manager')
			->disableOriginalConstructor()->getMock();
		$this->clientService = $this->getMockBuilder('\\OCP\Http\\Client\\IClientService')
			->disableOriginalConstructor()->getMock();
	}

	/**
	 * @return ExternalSharesController
	 */
	public function getExternalShareController() {
		return new ExternalSharesController(
			'files_sharing',
			$this->request,
			$this->externalManager,
			$this->clientService,
			\OC::$server->getEventDispatcher(),
			\OC::$server->getConfig()
		);
	}

	public function testIndex() {
		$this->externalManager
			->expects($this->once())
			->method('getOpenShares')
			->will($this->returnValue(['MyDummyArray']));

		$this->assertEquals(new JSONResponse(['MyDummyArray']), $this->getExternalShareController()->index());
	}

	public function testCreate() {
		$shareId = 4;
		$this->externalManager
			->expects($this->once())
			->method('acceptShare')
			->with($shareId);
		$this->externalManager->expects($this->once())
			->method('getShare')
			->with($shareId)
			->willReturn(
				[
					'owner' => 'foo',
					'user' => 'user',
					'name' => 'name',
					'remote' => 'abc'
				]
			);
		$this->externalManager
			->method('getShareRecipientMountPoint')
			->willReturn('/mountPoint');
		$this->externalManager
			->method('getShareFileId')
			->willReturn('1');

		$called = [];
		\OC::$server->getEventDispatcher()->addListener('remoteshare.accepted', function ($event) use (&$called) {
			$called[] = 'remoteshare.accepted';
			\array_push($called, $event);
		});
		$this->assertEquals(new JSONResponse(), $this->getExternalShareController()->create($shareId, "remote"));

		$this->assertSame('remoteshare.accepted', $called[0]);
		$this->assertInstanceOf(GenericEvent::class, $called[1]);
	}

	public function testDestroy() {
		$shareId = 4;
		$this->externalManager
			->expects($this->once())
			->method('declineShare')
			->with($shareId);
		$this->externalManager->expects($this->once())
			->method('getShare')
			->with($shareId)
			->willReturn(
				[
					'owner' => 'foo',
					'user' => 'user',
					'name' => 'name',
					'remote' => 'abc'
				]
			);

		$called = [];
		\OC::$server->getEventDispatcher()->addListener('remoteshare.declined', function ($event) use (&$called) {
			$called[] = 'remoteshare.declined';
			\array_push($called, $event);
		});

		$this->assertEquals(new JSONResponse(), $this->getExternalShareController()->destroy($shareId, "user"));

		$this->assertSame('remoteshare.declined', $called[0]);
		$this->assertInstanceOf(GenericEvent::class, $called[1]);
	}
}
