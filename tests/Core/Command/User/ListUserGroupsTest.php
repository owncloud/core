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

use OC\Core\Command\User\ListUserGroups;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;

/**
 * Class ListUserGroupsTest
 *
 * @group DB
 */
class ListUserGroupsTest extends TestCase {
    use UserTrait;
    use GroupTrait;

    /** @var CommandTester */
    private $commandTester;

    protected function setUp() {
        parent::setUp();

        $command = new ListUserGroups(\OC::$server->getUserManager(), \OC::$server->getGroupManager());
        $this->commandTester = new CommandTester($command);
        $user = $this->createUser('user1');
        $this->createGroup('testgroup');
        \OC::$server->getGroupManager()->get('testgroup')->addUser($user);
    }

    /**
     * @dataProvider inputProvider
     * @param array $input
     * @param string $expectedOutput
     */
    public function testCommandInput($input, $expectedOutput) {
        $this->commandTester->execute($input);
        $output = $this->commandTester->getDisplay();
        $this->assertContains($expectedOutput, $output);
    }

    public function inputProvider() {
        return [
            [['uid' => 'user2'], 'does not exist'],
            [['uid' => 'user1'], 'testgroup'],
        ];
    }

}