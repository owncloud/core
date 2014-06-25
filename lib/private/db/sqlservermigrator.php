<?php
/**
 * Copyright (c) 2014 Thomas Müller <deepdiver@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\DB;

use Doctrine\DBAL\Schema\ColumnDiff;
use Doctrine\DBAL\Schema\Schema;

class SQLServerMigrator extends NoCheckMigrator {
	/**
	 * @param Schema $targetSchema
	 * @param \Doctrine\DBAL\Connection $connection
	 * @return \Doctrine\DBAL\Schema\SchemaDiff
	 */
	protected function getDiff(Schema $targetSchema, \Doctrine\DBAL\Connection $connection) {
		$schemaDiff = parent::getDiff($targetSchema, $connection);

		foreach($schemaDiff->changedTables as $tableDiff) {
			// strip off changes on the unsigned option - mssql does not support that option
			$tableDiff->changedColumns = array_filter($tableDiff->changedColumns, function(&$changedColumn) {
				/** @var $changedColumn ColumnDiff */
				$changedColumn->changedProperties = array_filter($changedColumn->changedProperties, function($prop) {
					return $prop !== 'unsigned';
				});
				return count($changedColumn->changedProperties) !== 0;
			});

			// Until http://www.doctrine-project.org/jira/browse/DBAL-825 is resolved we need to tweak column type changes
			// and add 'default' to the changed properties to trigger proper migration
			$tableDiff->changedColumns = array_map(function($changedColumn) {
				/** @var $changedColumn ColumnDiff */
				if (!in_array('default', $changedColumn->changedProperties)) {
					// 'default' is added if 'type' of 'fixed' are changed
					if (in_array('type', $changedColumn->changedProperties) ||
						in_array('fixed', $changedColumn->changedProperties)
					) {
						$changedColumn->changedProperties[] = 'default';
					}
				}
				return $changedColumn;
			}, $tableDiff->changedColumns);
		}

		return $schemaDiff;
	}

	/**
	 * @param string $name
	 * @return string
	 */
	protected function generateTemporaryTableName($name) {
		return 'oc_' . uniqid();
	}
}
