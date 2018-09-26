<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

use OC\Core\Command\User\Add;
use OC\User\Service\CreateUserService;
use OC\User\Service\PasswordGeneratorService;
use OC\User\Service\UserSendMailService;
use OC\User\User;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class AddTest
 *
 * @group DB
 */
class AddTest extends TestCase {
	use UserTrait;

	/** @var CommandTester */
	private $commandTester;

	protected function setUp() {
		parent::setUp();

		$application = new Application(\OC::$server->getConfig(), \OC::$server->getEventDispatcher(), \OC::$server->getRequest());
		$command = new Add(\OC::$server->getUserManager(), \OC::$server->getGroupManager(), \OC::$server->getMailer(),
			new CreateUserService(
				\OC::$server->getUserSession(), \OC::$server->getGroupManager(),
				\OC::$server->getUserManager(), \OC::$server->getMailer(),
				\OC::$server->getSecureRandom(), \OC::$server->getLogger(), new UserSendMailService(
					\OC::$server->getSecureRandom(), \OC::$server->getConfig(),
					\OC::$server->getMailer(), \OC::$server->getURLGenerator(),
					new \OC_Defaults(), \OC::$server->getTimeFactory(), \OC::$server->getL10N('settings')),
				new PasswordGeneratorService(\OC::$server->getEventDispatcher(), \OC::$server->getSecureRandom())));
		$command->setApplication($application);
		$this->commandTester = new CommandTester($command);
		$this->createUser('user1');
	}

	protected function tearDown() {
		parent::tearDown();
		if (\OC::$server->getUserManager()->get('user2') instanceof User) {
			\OC::$server->getUserManager()->get('user2')->delete();
		}
	}

	/**
	 * @dataProvider inputProvider
	 * @param array $input
	 * @param array $answers
	 * @param string $expectedOutput
	 */
	public function testCommandInput($input, $answers, $expectedOutput) {
		$this->commandTester->setInputs($answers);
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	/**
	 * @TODO Drone is failing for interactive tests cases, remove commented code after fix of drone
	 */
	public function inputProvider() {
		return [
			[['uid' => 'user1', ''],[], 'already exists.'],
			[['uid' => 'user2', '--email' => 'invalidemail'], [], 'Invalid email address supplied'],
			[['uid' => 'user2', '--password-from-env' => null], [], '--password-from-env given, but OC_PASS is empty!'],
			[['uid' => 'user3', '--email' => 'foo@bar.com', '--display-name' => 'tester'], [], "Email address set to \"foo@bar.com\"\nThe user \"user3\" was created successfully\nDisplay name set to \"tester\"\n"],
			/*[['uid' => 'user2'], ['p@ssw0rd', 'password'], 'Passwords did not match'],
			[['uid' => 'user2'], ['p@ssw0rd', 'p@ssw0rd'], 'was created successfully'],
			[['uid' => 'user2', '--display-name' => 'John Doe'], ['p@ssw0rd', 'p@ssw0rd'], 'Display name set to '],
			[['uid' => 'user2', '--email' => 'user1@example.com'], ['p@ssw0rd', 'p@ssw0rd'], 'Email address set to '],
			[['uid' => 'user2', '--group' => ['admin']], ['p@ssw0rd', 'p@ssw0rd'], 'added to group '],*/
		];
	}
}
