<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\DAV\Tests\unit\AppInfo\Migrations;

use OCA\DAV\Migrations\Version20170202213905;
use OCP\DB\QueryBuilder\IExpressionBuilder;
use OCP\DB\QueryBuilder\IQueryBuilder;
use Test\TestCase;

require_once(\str_replace('/dav/tests/unit/AppInfo/', '/dav/appinfo/', __DIR__) . '/Version20170202213905.php');

class Version20170202213905Test extends TestCase {
	public function testGetRepairQuery() {
		$expressionBuilder = $this->createMock(IExpressionBuilder::class);
		$expressionBuilder->expects($this->any())->method('eq')->will($this->returnArgument(1));
		$expressionBuilder->expects($this->any())->method('literal')->will(
			$this->returnCallback(function ($arg) {
				return \sprintf("'%s'", $arg);
			})
		);

		$queryBuilder = $this->createMock(IQueryBuilder::class);
		$queryBuilder->expects($this->any())->method('resetQueryParts')->will($this->returnSelf());
		$queryBuilder->expects($this->any())->method('update')->will($this->returnSelf());
		$queryBuilder->expects($this->any())->method('set')->will($this->returnSelf());
		$queryBuilder->expects($this->any())->method('where')->will($this->returnSelf());
		$queryBuilder->expects($this->any())->method('andWhere')->will($this->returnSelf());
		$queryBuilder->expects($this->any())->method('expr')->willReturn($expressionBuilder);

		$queryBuilder->expects($this->once())->method('where')->with("'nobody'");

		$step = $this->createMock(Version20170202213905::class);
		$this->invokePrivate($step, 'getRepairQuery', [$queryBuilder, 42, 'nobody', 'muchacha']);
	}
}
