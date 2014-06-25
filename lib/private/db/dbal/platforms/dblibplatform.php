<?php

namespace OC\DB\DBAL\Platforms;

class DblibPlatform extends  \Realestate\MssqlBundle\Platforms\DblibPlatform
{
	/**
	 * {@inheritDoc}
	 */
	public function getClobTypeDeclarationSQL(array $field)
	{
		return 'VARCHAR(MAX)';
	}

}
