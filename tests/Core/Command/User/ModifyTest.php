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

namespace Tests\Core\Command\User;

use OC\Core\Command\User\Modify;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class ModifyTest
 *
 * @group DB
 * @package Tests\Core\Command\User
 */
class ModifyTest extends TestCase {
	use UserTrait;

	/** @var  IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	protected $userManager;

	/** @var  IMailer | \PHPUnit_Framework_MockObject_MockObject */
	protected $mailer;
	/** @var  InputInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleInput;

	/** @var  OutputInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleOutput;

	protected function setUp() {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);
		$this->mailer = $this->createMock(IMailer::class);
		$this->consoleInput = $this->createMock(InputInterface::class);
		$this->consoleOutput = $this->createMock(OutputInterface::class);
	}

	public function providerValidateInputMethod() {
		return [
			[false, 'foo', '', '', 'The user foo does not exist'],
			[true, '', '', '', 'The user  does not exist'],
			[true, null, '', '', 'The user  does not exist'],
			[true, 'foo', null, '', 'The key cannot be empty'],
			[true, 'foo', '', '', 'The key cannot be empty'],
			[true, 'foo', 'test', '', 'Supported keys are displayname, email'],
			[true, 'foo', 'displayname', '', 'The value cannot be empty'],
			[true, 'foo', 'email', '', 'The value cannot be empty'],
			[true, 'foo', 'email', null, 'The value cannot be empty'],
			[true, 'foo', 'displayname', null, 'The value cannot be empty'],
		];
	}

	/**
	 * @dataProvider providerValidateInputMethod
	 * @param string $uidExist
	 * @param string $uidVal
	 * @param string $key
	 * @param string $value
	 * @param string $expectedException
	 */
	public function testValidateInput($uidExist, $uidVal, $key, $value, $expectedException) {
		$usermodify = new Modify($this->userManager, $this->mailer);
		if ($uidExist === false) {
			$this->consoleInput->expects($this->once())
				->method('getArgument')
				->willReturn($uidVal);
			$this->userManager->expects($this->once())
				->method('userExists')
				->with($uidVal)
				->willReturn(false);
		} else {
			$this->consoleInput->expects($this->any())
				->method('getArgument')
				->willReturnMap([
					['uid', $uidVal],
					['key', $key],
					['value', $value]
				]);
		}

		try {
			$reflector = new \ReflectionClass($usermodify);
			$property = $reflector->getProperty('allowedKeys');
			$property->setAccessible(true);
			$property->setValue($usermodify, ['displayname', 'email']);

			static::invokePrivate($usermodify, 'validateInput', [$this->consoleInput]);
			$this->assertFalse($expectedException);
		} catch (\InvalidArgumentException $e) {
			$this->assertEquals($expectedException, $e->getMessage());
		}
	}

	public function testNonExistentUser() {
		$userModify = new Modify($this->userManager, $this->mailer);
		$this->consoleInput->expects($this->any())
			->method('getArgument')
			->willReturnMap([
				['uid', 'foo'],
				['key', 'displayname'],
				['value', 'foobar'],
			]);
		$this->consoleInput->expects($this->any())
			->method('getOption')
			->willReturn('test');

		$this->userManager->expects($this->once())
			->method('get')
			->willReturn(null);

		$retVal = static::invokePrivate($userModify, 'execute', [$this->consoleInput, $this->consoleOutput]);
		$this->assertEquals(1, $retVal);
	}

	public function providerExecuteMethod() {
		return [
			['foo', 'displayname', 'foo123'],
			['foo', 'email', 'foo@bar.com'],
			['foo', 'email', 'foo@bar.com@foobar'], //Test for invalid email
		];
	}

	/**
	 * @dataProvider providerExecuteMethod
	 * @param string $uid
	 * @param string $key
	 * @param string $value
	 */
	public function testExecute($uid, $key, $value) {
		$validateEmail = null;
		$userModify = new Modify($this->userManager, $this->mailer);
		$this->consoleInput->expects($this->any())
			->method('getArgument')
			->willReturnMap([
				['uid', $uid],
				['key', $key],
				['value', $value]
			]);

		$user = $this->createMock(IUser::class);
		if ($key === 'email') {
			$user->expects($this->any())
				->method('canChangeDisplayName')
				->willReturn(true);
			$user->expects($this->any())
				->method('setEMailAddress')
				->with($value)
				->willReturn(null);
			$validateEmail = \OC::$server->getMailer()->validateMailAddress($value);
			$this->mailer->expects($this->once())
				->method('validateMailAddress')
				->willReturn($validateEmail);
		} elseif ($key === 'displayname') {
			$user->expects($this->once())
				->method('setDisplayName')
				->with($value)
				->willReturn(true);
		}
		$this->userManager->expects($this->once())
			->method('get')
			->willReturn($user);
		$retVal = static::invokePrivate($userModify, 'execute', [$this->consoleInput, $this->consoleOutput]);
		if (($validateEmail !== null) && ($validateEmail === false)) {
			$this->assertEquals(1, $retVal);
		} else {
			$this->assertEquals(0, $retVal);
		}
	}
}
