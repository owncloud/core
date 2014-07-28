<?php

namespace OC\DB\DBAL\Platforms;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Schema\Index;

class DblibPlatform extends  \Realestate\MssqlBundle\Platforms\DblibPlatform
{
	/**
	 * {@inheritDoc}
	 */
	public function getDateTimeFormatString()
	{
		return 'Y-m-d H:i:s.000';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getClobTypeDeclarationSQL(array $field)
	{
		return 'VARCHAR(MAX)';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIndexFieldDeclarationListSQL(array $fields)
	{
		$ret = array();

		foreach ($fields as $field => $definition) {
			if (!is_array($definition)) {
				$field = $definition;
			}
			$ret[] = $this->quoteIdentifier($field);
		}

		return implode(', ', $ret);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCreateIndexSQL(Index $index, $table)
	{
		$constraint = AbstractPlatform::getCreateIndexSQL($index, $table);

		if ($index->isUnique() && !$index->isPrimary()) {
			$constraint = $this->_appendUniqueConstraintDefinition($constraint, $index);
		}

		return $constraint;
	}

	/**
	 * Extend unique key constraint with required filters
	 *
	 * @param string $sql
	 * @param Index $index
	 *
	 * @return string
	 */
	private function _appendUniqueConstraintDefinition($sql, Index $index)
	{
		$fields = array();
		foreach ($index->getColumns() as $field => $definition) {
			if (!is_array($definition)) {
				$field = $definition;
			}

			$fields[] = $this->quoteIdentifier($field) . ' IS NOT NULL';
		}

		return $sql . ' WHERE ' . implode(' AND ', $fields);
	}


}
