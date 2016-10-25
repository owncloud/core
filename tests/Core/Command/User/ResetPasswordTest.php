<?php

namespace Tests\Core\Command\User;

use OC\Core\Command\User\ResetPassword;
use PHPUnit\Framework\TestCase;

class ResetPasswordTest extends TestCase
{

	public function testCommandGetsCorrectUserFromUserManager() {
		$userManagerMock = $this->getMockBuilder('OCP\IUserManager')
			->getMock();

		$userManagerMock
			->expects($this->once())
			->method('get')
			->with('test123');

		$resetPasswordCommand = new ResetPassword($userManagerMock);

		$inputInterfaceMock = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
			->getMock();

		$inputInterfaceMock
			->expects($this->once())
			->method('getArgument')
			->with('user')
			->willReturn('test123');

		$outputInterfaceMock = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
			->getMock();

		$resetPasswordCommand->run($inputInterfaceMock, $outputInterfaceMock);

	}

	public function testErrorMessageIsPrintedIfUserDoesNotExists() {
		$userManagerMock = $this->getMockBuilder('OCP\IUserManager')
			->getMock();

		$userManagerMock
			->method('get')
			->willReturn(null);

		$resetPasswordCommand = new ResetPassword($userManagerMock);

		$inputInterfaceMock = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
			->getMock();

		$inputInterfaceMock
			->method('getArgument')
			->willReturn('test123');

		$outputInterfaceMock = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
			->getMock();

		$outputInterfaceMock
			->expects($this->once())
			->method ('writeln')
			->with('<error>User does not exist</error>');

		$resetPasswordCommand->run($inputInterfaceMock, $outputInterfaceMock);
	}
}
