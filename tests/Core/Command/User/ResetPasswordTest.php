<?php

namespace Tests\Core\Command\User;

use OC\Core\Command\User\ResetPassword;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;

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

		$inputInterfaceMock = $this->getMockBuilder(InputInterface::class)
			->getMock();

		$inputInterfaceMock
			->expects($this->once())
			->method('getArgument')
			->with('user')
			->willReturn('test123');

		$outputInterfaceMock = $this->getMockBuilder(OutputInterface::class)
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

		$inputInterfaceMock = $this->getMockBuilder(InputInterface::class)
			->getMock();

		$inputInterfaceMock
			->method('getArgument')
			->willReturn('test123');

		$outputInterfaceMock = $this->getMockBuilder(OutputInterface::class)
			->getMock();

		$outputInterfaceMock
			->expects($this->once())
			->method ('writeln')
			->with('<error>User does not exist</error>');


		$resetPasswordCommand->run($inputInterfaceMock, $outputInterfaceMock);
	}

	public function testPrintsErrorIfNoPasswordWasGiven() {
		$userMock = $this->getMockBuilder('OCP\IUser')->getMock();
		$userManagerMock = $this->getMockBuilder('OCP\IUserManager')->getMock();
		$userManagerMock->method('get')->with('test123')->willReturn($userMock);

		$command = new ResetPassword($userManagerMock);
		$commandTester = $this->getCommandTester($command);

		$commandTester->setInputs(["\n", "\n"]);

		$commandTester->execute(
			['user' => 'test123'],
			['password-from-env' => false]
		);

		$this->assertContains('You did not enter a Password!', $commandTester->getDisplay());
	}

	public function testPrintsErrorIfPasswordConfirmationDidNotMatch() {
		$userMock = $this->getMockBuilder('OCP\IUser')->getMock();
		$userManagerMock = $this->getMockBuilder('OCP\IUserManager')->getMock();
		$userManagerMock->method('get')->with('test123')->willReturn($userMock);

		$command = new ResetPassword($userManagerMock);
		$commandTester = $this->getCommandTester($command);

		$commandTester->setInputs(["password", "passwordconfirmation"]);

		$commandTester->execute(
			['user' => 'test123'],
			['password-from-env' => false]
		);

		$this->assertContains('Passwords did not match!', $commandTester->getDisplay());
	}

	/**
	 * @param Command $command
	 * @return CommandTester
	 */
	private function getCommandTester(Command $command) {
		$commandTester = new CommandTester($command);
		$command->setHelperSet(new HelperSet(array(new QuestionHelper())));
		return $commandTester;
	}
}
