<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\DB\QueryBuilder\ExpressionBuilder;

use OC\DB\QueryBuilder\QueryFunction;

class MySqlExpressionBuilder extends ExpressionBuilder {

	/**
	 * @inheritdoc
	 */
	public function iLike($x, $y, $type = null) {
		$x = $this->helper->quoteColumnName($x);
		$y = $this->helper->quoteColumnName($y);

		$characterSet = \OC::$server->getConfig()->getSystemValue('mysql.utf8mb4', false) ? 'utf8mb4' : 'utf8';
		return $this->expressionBuilder->comparison($x, " COLLATE {$characterSet}_general_ci LIKE", $y);
	}

	/**
	 * Use CHAR_LENGTH on MySQL to return number of characters not bytes.
	 * @inheritdoc
	 */
	public function length($column) {
		$column = $this->helper->quoteColumnName($column);
		return new QueryFunction("CHAR_LENGTH({$column})");
	}
}
