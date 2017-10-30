<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCA\Files\Controller;

use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use Test\TestCase;
use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\DataDisplayResponse;

/**
 * Class ZsyncApiController
 *
 * @package OCA\Files\Controller
 */
class ZsyncApiControllerTest extends TestCase {
	/** @var string */
	private $appName = 'files';
	/** @var \OCP\IUser */
	private $user;
	/** @var \OCP\IUserSession */
	private $userSession;
	/** @var IRequest */
	private $request;
	/** @var ZsyncApiController */
	private $zsyncApiController;
	/** @var \OC\Files\Folder */
	private $rootFolder;
	/** @var \OC\Files\Folder */
	private $zsyncFolder;

	public function setUp() {
		$this->request = $this->getMockBuilder('\OCP\IRequest')
			->disableOriginalConstructor()
			->getMock();
		$this->user = $this->createMock('\OCP\IUser');
		$this->user->expects($this->any())
			->method('getUID')
			->willReturn('testuser1');
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($this->user);

		$this->rootFolder = $this->createMock('\OCP\Files\Folder');
		$this->zsyncFolder = $this->createMock('\OCP\Files\Folder');
	}

	private function construct() {
		$folder = $this->createMock('\OCP\Files\Folder');
		$folder->expects($this->once())
			->method('get')
			->with('testuser1')
			->willReturn($this->rootFolder);

		$this->zsyncApiController = new ZsyncApiController(
				$this->appName,
				$this->request,
				$this->userSession,
				$folder);
	}

	public function testShowRouteWithExistsFile() {
		$file = $this->createMock('\OCP\Files\File');
		$file->expects($this->once())
			->method('getContent')
			->willReturn('bar');

		$this->rootFolder->expects($this->exactly(2))
			->method('get')
			->withConsecutive(
				['files_zsync'],
				['files/file'])
			->willReturnOnConsecutiveCalls(
				$this->zsyncFolder,
				$file);

		$this->zsyncFolder->expects($this->once())
			->method('get')
			->with('file.zsync')
			->willReturn($file);

		$this->construct();

		$expected = new DataDisplayResponse('bar');
		$this->assertEquals($expected, $this->zsyncApiController->show('file'));
	}

	public function testShowRouteWithMissingZsyncFolder() {
		$file = $this->createMock('\OCP\Files\File');
		$file->expects($this->once())
			->method('getContent')
			->willReturn('bar');

		$this->rootFolder->expects($this->once())
			->method('newFolder')
			->willReturn($this->zsyncFolder);

		$this->rootFolder->expects($this->exactly(2))
			->method('get')
			->withConsecutive(
				['files_zsync'],
				['files/file'])
			->willReturnOnConsecutiveCalls(
				$this->throwException(new NotFoundException),
				$file);

		$this->zsyncFolder->expects($this->once())
			->method('get')
			->with('file.zsync')
			->willReturn($file);

		$this->construct();

		$expected = new DataDisplayResponse('bar');
		$this->zsyncApiController->show('file');
	}

	public function testShowRouteWithMissingBaseFile() {
		$this->rootFolder->expects($this->exactly(2))
			->method('get')
			->withConsecutive(
				['files_zsync'],
				['files/file'])
			->willReturnOnConsecutiveCalls(
				$this->zsyncFolder,
				$this->throwException(new NotFoundException));

		$this->construct();

		$expected = new JSONResponse([], Http::STATUS_NOT_FOUND);
		$this->assertEquals($expected, $this->zsyncApiController->show('file'));
	}

	public function testShowRouteWithMissingZsyncFile() {
		$file = $this->createMock('\OCP\Files\File');
		$this->rootFolder->expects($this->exactly(2))
			->method('get')
			->withConsecutive(
				['files_zsync'],
				['files/file'])
			->willReturnOnConsecutiveCalls(
				$this->zsyncFolder,
				$file);

		$this->zsyncFolder->expects($this->once())
			->method('get')
			->with('file.zsync')
			->will($this->throwException(new NotFoundException));

		$this->construct();

		$expected = new JSONResponse([], Http::STATUS_NOT_FOUND);
		$this->assertEquals($expected, $this->zsyncApiController->show('file'));
	}

	public function testShowRouteWithBadPermissionsZsyncFile() {
		$file = $this->createMock('\OCP\Files\File');
		$this->rootFolder->expects($this->exactly(2))
			->method('get')
			->withConsecutive(
				['files_zsync'],
				['files/file'])
			->willReturnOnConsecutiveCalls(
				$this->zsyncFolder,
				$file);

		$this->zsyncFolder->expects($this->once())
			->method('get')
			->with('file.zsync')
			->will($this->throwException(new NotPermittedException));

		$this->construct();

		$expected = new JSONResponse([], Http::STATUS_FORBIDDEN);
		$this->assertEquals($expected, $this->zsyncApiController->show('file'));
	}
}
