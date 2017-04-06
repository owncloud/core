<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20170406131248 implements ISchemaMigration {

	/**
	 * @param Schema $schema
	 * @param array $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$tableName = $options['tablePrefix'] . 'authtoken';
		$table = $schema->getTable($tableName);

		if (!$table->hasIndex('uid_name_index')) {
			$table->addUniqueIndex(
				['uid', 'name'],
				'uid_name_index'
			);
		}
    }
}
