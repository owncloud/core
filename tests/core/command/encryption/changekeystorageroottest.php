<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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


namespace Tests\Core\Command\Encryption;


use OC\Core\Command\Encryption\ChangeKeyStorageRoot;
use OC\Encryption\Util;
use OC\Files\View;
use OCP\IConfig;
use OCP\IUserManager;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

class ChangeKeyStorageRootTest extends TestCase {

	/** @var ChangeKeyStorageRoot */
	protected $changeKeyStorageRoot;

	/** @var View | \PHPUnit_Framework_MockObject_MockObject */
	protected $view;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	protected $userManager;

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/**  @var Util | \PHPUnit_Framework_MockObject_MockObject */
	protected $util;

	/** @var QuestionHelper | \PHPUnit_Framework_MockObject_MockObject */
	protected $questionHelper;

	/** @var InputInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $inputInterface;

	/** @var OutputInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $outputInterface;

	public function setUp() {
		parent::setUp();

		$this->view = $this->getMock('\OC\Files\View');
		$this->userManager = $this->getMock('\OCP\IUserManager');
		$this->config = $this->getMock('\OCP\IConfig');
		$this->util = $this->getMockBuilder('OC\Encryption\Util')->disableOriginalConstructor()->getMock();
		$this->questionHelper = $this->getMock('Symfony\Component\Console\Helper\QuestionHelper');
		$this->inputInterface = $this->getMock('Symfony\Component\Console\Input\InputInterface');
		$this->outputInterface = $this->getMock('Symfony\Component\Console\Output\OutputInterface');

		$outputFormaterInterface = $this->getMock('Symfony\Component\Console\Formatter\OutputFormatterInterface');
		$this->outputInterface->expects($this->any())->method('getFormatter')
			->willReturn($outputFormaterInterface);

		$this->changeKeyStorageRoot = new ChangeKeyStorageRoot(
			$this->view,
			$this->userManager,
			$this->config,
			$this->util,
			$this->questionHelper
		);

	}

	/**
	 * @dataProvider dataTestExecute
	 */
	public function testExecute($newRoot, $answer, $successMoveKey) {

		$changeKeyStorageRoot = $this->getMockBuilder('OC\Core\Command\Encryption\ChangeKeyStorageRoot')
			->setConstructorArgs(
				[
					$this->view,
					$this->userManager,
					$this->config,
					$this->util,
					$this->questionHelper
				]
			)->setMethods(['moveKeys'])->getMock();

		$this->util->expects($this->once())->method('getKeyStorageRoot')
			->willReturn('');
		$this->inputInterface->expects($this->once())->method('getArgument')
			->with('newRoot')->willReturn($newRoot);

		if ($answer === true || $newRoot !== null) {
			$changeKeyStorageRoot->expects($this->once())->method('moveKeys')
				->willReturn($successMoveKey);
		} else {
			$changeKeyStorageRoot->expects($this->never())->method('moveKeys');
		}

		if ($successMoveKey === true) {
			$this->util->expects($this->once())->method('setKeyStorageRoot');
		} else {
			$this->util->expects($this->never())->method('setKeyStorageRoot');
		}

		if ($newRoot === null) {
			$this->questionHelper->expects($this->once())->method('ask')->willReturn($answer);
		} else {
			$this->questionHelper->expects($this->never())->method('ask');
		}

		$this->invokePrivate(
			$changeKeyStorageRoot,
			'execute',
			[$this->inputInterface, $this->outputInterface]
		);
	}

	public function dataTestExecute() {
		return [
			[null, true, true],
			[null, true, false],
			[null, false, null],
			['/newRoot', null, true],
			['/newRoot', null, false]
		];
	}

	/**
	 * @dataProvider dataTestMoveKeys
	 */
	public function testMoveKeys($oldRoot, $newRoot, $dirContent, $expected) {

		$this->view->expects($this->any())->method(('is_dir'))
			->willReturnCallback(
				function($path) {
					if ($path === 'doesNotExist') {
						return false;
					}
					return true;
				}
			);

		$this->view->expects($this->any())->method('getDirectoryContent')
			->willReturn($dirContent);

		$changeKeyStorageRoot = $this->getMockBuilder('OC\Core\Command\Encryption\ChangeKeyStorageRoot')
			->setConstructorArgs(
				[
					$this->view,
					$this->userManager,
					$this->config,
					$this->util,
					$this->questionHelper
				]
			)->setMethods(['moveUserEncryptionFolder'])->getMock();

		$changeKeyStorageRoot->expects($this->exactly(count($dirContent)))
			->method('moveUserEncryptionFolder')
			->willReturnCallback(
				function($user, $old, $new) use ($dirContent, $oldRoot, $newRoot) {
					$found = false;
					foreach ($dirContent as $c) {
						if ($c['name'] === $user) {
							$found = true;
							break;
						}
					}
					$this->assertTrue($found);
					$this->assertSame($oldRoot, $old);
					$this->assertSame($newRoot, $new);
				}
			);


		$result = $this->invokePrivate(
			$changeKeyStorageRoot,
			'moveKeys',
			[$oldRoot, $newRoot, $this->outputInterface]
		);

		$this->assertSame($expected, $result);

	}

	public function dataTestMoveKeys() {
		return [
			['/foo', '/bar', [['name' => 'user1'], ['name' => 'user2']], true],
			['doesNotExist', '/bar', [], false],
		];
	}


	/**
	 * @dataProvider dataTestPrepareParentFolder
	 */
	public function testPrepareParentFolder($path, $pathExists) {
		$this->view->expects($this->any())->method('file_exists')
			->willReturnCallback(
				function($fileExistsPath) use ($path, $pathExists) {
					if ($path === $fileExistsPath) {
						return $pathExists;
					}
					return false;
				}
			);

		if ($pathExists === false) {
			$subDirs = explode('/', ltrim($path, '/'));
			$this->view->expects($this->exactly(count($subDirs)))->method('mkdir');
		} else {
			$this->view->expects($this->never())->method('mkdir');
		}

		$this->invokePrivate(
			$this->changeKeyStorageRoot,
			'prepareParentFolder',
			[$path]
		);
	}

	public function dataTestPrepareParentFolder() {
		return [
			['/user/folder/sub_folder/keystorage', true],
			['/user/folder/sub_folder/keystorage', false]
		];
	}

}
