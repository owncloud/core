<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Event\SchemaColumnDefinitionEventArgs;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\Type;

/**
 * Class MySqlSchemaColumnDefinitionListener
 *
 * @package OC\DB
 *
 * This class contains the smallest portion of native Doctrine code taken from
 * Doctrine\DBAL\Platforms\MySqlSchemaManager that allows to bypass the call to
 * native _getPortableTableColumnDefinition method
 *
 * TODO: remove once https://github.com/owncloud/core/issues/28695 is fixed and Doctrine upgraded
 */
class MySqlSchemaColumnDefinitionListener {
	/**
	 * @var \Doctrine\DBAL\Platforms\AbstractPlatform
	 */
	protected $_platform;

	public function onSchemaColumnDefinition(SchemaColumnDefinitionEventArgs $eventArgs) {
		// We need an instance of platform with ownCloud-specific mappings
		//  this part  can't be moved to constructor - it leads to an infinite recursion
		if ($this->_platform === null) {
			$this->_platform = \OC::$server->getDatabaseConnection()->getDatabasePlatform();
		}

		$version = \OC::$server->getDatabaseConnection()->getDatabaseVersionString();
		$mariadb = \stripos($version, 'mariadb') !== false;
		if ($mariadb && \version_compare($this->getMariaDbMysqlVersionNumber($version), '10.2.7', '>=')) {
			$tableColumn = $eventArgs->getTableColumn();
			try {
				$column = $this->_getPortableTableColumnDefinition($tableColumn);
				$eventArgs->preventDefault();
				$eventArgs->setColumn($column);
			} catch (DBALException $e) {
				// Pass
			}
		}
	}

	/**
	 * Given a table comment this method tries to extract a typehint for Doctrine Type, or returns
	 * the type given as default.
	 *
	 * @param string $comment
	 * @param string $currentType
	 *
	 * @return string
	 */
	public function extractDoctrineTypeFromComment($comment, $currentType) {
		if (\preg_match("(\(DC2Type:([a-zA-Z0-9_]+)\))", $comment, $match)) {
			$currentType = $match[1];
		}

		return $currentType;
	}
	
	/**
	 * @param string $comment
	 * @param string $type
	 *
	 * @return string
	 */
	public function removeDoctrineTypeFromComment($comment, $type) {
		return \str_replace('(DC2Type:'.$type.')', '', $comment);
	}
	
	protected function _getPortableTableColumnDefinition($tableColumn) {
		$tableColumn = \array_change_key_case($tableColumn, CASE_LOWER);

		$dbType = \strtolower($tableColumn['type']);
		$dbType = \strtok($dbType, '(), ');
		if (isset($tableColumn['length'])) {
			$length = $tableColumn['length'];
		} else {
			$length = \strtok('(), ');
		}

		$fixed = null;

		if (! isset($tableColumn['name'])) {
			$tableColumn['name'] = '';
		}

		$scale = null;
		$precision = null;

		$type = $this->_platform->getDoctrineTypeMapping($dbType);

		// In cases where not connected to a database DESCRIBE $table does not return 'Comment'
		if (isset($tableColumn['comment'])) {
			$type = $this->extractDoctrineTypeFromComment($tableColumn['comment'], $type);
			$tableColumn['comment'] = $this->removeDoctrineTypeFromComment($tableColumn['comment'], $type);
		}

		switch ($dbType) {
			case 'char':
			case 'binary':
				$fixed = true;
				break;
			case 'float':
			case 'double':
			case 'real':
			case 'numeric':
			case 'decimal':
				if (\preg_match('([A-Za-z]+\(([0-9]+)\,([0-9]+)\))', $tableColumn['type'], $match)) {
					$precision = $match[1];
					$scale = $match[2];
					$length = null;
				}
				break;
			case 'tinytext':
				$length = MySqlPlatform::LENGTH_LIMIT_TINYTEXT;
				break;
			case 'text':
				$length = MySqlPlatform::LENGTH_LIMIT_TEXT;
				break;
			case 'mediumtext':
				$length = MySqlPlatform::LENGTH_LIMIT_MEDIUMTEXT;
				break;
			case 'tinyblob':
				$length = MySqlPlatform::LENGTH_LIMIT_TINYBLOB;
				break;
			case 'blob':
				$length = MySqlPlatform::LENGTH_LIMIT_BLOB;
				break;
			case 'mediumblob':
				$length = MySqlPlatform::LENGTH_LIMIT_MEDIUMBLOB;
				break;
			case 'tinyint':
			case 'smallint':
			case 'mediumint':
			case 'int':
			case 'integer':
			case 'bigint':
			case 'year':
				$length = null;
				break;
		}

		$length = ((int) $length == 0) ? null : (int) $length;

		$default = isset($tableColumn['default']) ? $tableColumn['default'] : null;
		$columnDefault = $this->getMariaDb1027ColumnDefault($default);

		$options = [
			'length'		=> $length,
			'unsigned'	  => (bool) (\strpos($tableColumn['type'], 'unsigned') !== false),
			'fixed'		 => (bool) $fixed,
			// This line was changed to fix breaking change introduced in MariaDB 10.2.6
			'default'	   => $columnDefault,
			'notnull'	   => (bool) ($tableColumn['null'] != 'YES'),
			'scale'		 => null,
			'precision'	 => null,
			'autoincrement' => (bool) (\strpos($tableColumn['extra'], 'auto_increment') !== false),
			'comment'	   => isset($tableColumn['comment']) && $tableColumn['comment'] !== ''
				? $tableColumn['comment']
				: null,
		];

		if ($scale !== null && $precision !== null) {
			$options['scale'] = $scale;
			$options['precision'] = $precision;
		}

		$column = new Column($tableColumn['field'], Type::getType($type), $options);

		if (isset($tableColumn['collation'])) {
			$column->setPlatformOption('collation', $tableColumn['collation']);
		}

		return $column;
	}

	/**
	 * Return Doctrine/Mysql-compatible column default values for MariaDB 10.2.7+ servers.
	 *
	 * - Since MariaDb 10.2.7 column defaults stored in information_schema are now quoted
	 *   to distinguish them from expressions (see MDEV-10134).
	 * - Note: Quoted 'NULL' is not enforced by Maria, it is technically possible to have
	 *   null in some circumstances (see https://jira.mariadb.org/browse/MDEV-14053)
	 *
	 * @link https://mariadb.com/kb/en/library/information-schema-columns-table/
	 * @link https://jira.mariadb.org/browse/MDEV-13132
	 *
	 * @param null|string $columnDefault default value as stored in information_schema for MariaDB >= 10.2.7
	 * @return string
	 */
	private function getMariaDb1027ColumnDefault($columnDefault) {
		if ($columnDefault === 'NULL' || $columnDefault === null) {
			return null;
		}
		if ($columnDefault[0] === "'") {
			return \preg_replace('/^\'(.*)\'$/', '$1', $columnDefault);
		}

		return $columnDefault;
	}

	/**
	 * Detect MariaDB server version, including hack for some mariadb distributions
	 * that starts with the prefix '5.5.5-'
	 *
	 * @param string $versionString Version string as returned by mariadb server, i.e. '5.5.5-Mariadb-10.0.8-xenial'
	 * @return string
	 * @throws DBALException
	 */
	private function getMariaDbMysqlVersionNumber($versionString) {
		if (!\preg_match('/^(?:5\.5\.5-)?(mariadb-)?(?P<major>\d+)\.(?P<minor>\d+)\.(?P<patch>\d+)/i', $versionString, $versionParts)) {
			throw DBALException::invalidPlatformVersionSpecified(
				$versionString,
				'^(?:5\.5\.5-)?(mariadb-)?<major_version>.<minor_version>.<patch_version>'
			);
		}
		return $versionParts['major'] . '.' . $versionParts['minor'] . '.' . $versionParts['patch'];
	}
}
