<?php
/**
 * @author martin-rueegg <martin.rueegg@metaworx.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author tbelau666 <thomas.belau@gmx.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\DB;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\Type;

class Comparator extends \Doctrine\DBAL\Schema\Comparator {

	/**
	 * {@inheritdoc}
	 */
	public function diffColumn(Column $column1, Column $column2) {
		$changedProperties = parent::diffColumn($column1, $column2);

		// Remove once https://github.com/doctrine/dbal/pull/3182 is merged and
		// DBAL is updated to a version containing this fix.
		if ($column1->getType()->getName() === Type::TEXT) {
			if ($column1->getLength() !== $column2->getLength()) {
				$changedProperties[] = 'length';
			}
		}
		return array_unique($changedProperties);
	}
}
