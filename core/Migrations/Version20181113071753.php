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

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Add assignable column to unique index in oc_systemtags table
 */
class Version20181113071753 implements ISchemaMigration {
	/** @var string */
	private $prefix;

	public function changeSchema(Schema $schema, array $options) {
		$this->prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$this->prefix}systemtag");
		if ($schema->hasTable("{$this->prefix}systemtag")) {
			$table->dropIndex('tag_ident');
			$table->addUniqueIndex(['name', 'visibility', 'editable', 'assignable'], 'tag_ident');
		}
	}
}
