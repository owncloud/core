<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

use OC\Core\Command\User\Report;
use OC\Files\Storage\Storage;
use OC\Files\View;
use OC\Helper\UserTypeHelper;
use OC\User\User;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class ReportTest
 *
 * @group DB
 */
class ReportTest extends TestCase {
	use UserTrait;

	/** @var CommandTester */
	private $commandTester;

	protected function setUp(): void {
		parent::setUp();

		$userTypeHelper = new UserTypeHelper();
		$command = new Report(\OC::$server->getUserManager(), $userTypeHelper);
		$command->setApplication(new Application());
		$this->commandTester = new CommandTester($command);
		$this->createUser('user1');
		$this->createUser('user2');
		$this->loginAsUser('user1');

		$view = new View('');
		list($storage) = $view->resolvePath('');
		/** @var $storage Storage */

		$storage->mkdir('avatars');
	}

	public function testCommandInput() {
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();

		$expectedOutput = <<<EOS
+------------------+---+
| User Report      |   |
+------------------+---+
| OC\User\Database | 2 |
|                  |   |
| guest users      | 0 |
|                  |   |
| total users      | 2 |
|                  |   |
| user directories | 1 |
+------------------+---+

EOS;

		$this->assertEquals($expectedOutput, $output);
	}
}
