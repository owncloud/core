<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Add unique index
 */
class Version20170519115025 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
        $prefix = $options['tablePrefix'];
        if ($schema->hasTable("{$prefix}vcategory")) {
            $table = $schema->getTable("{$prefix}vcategory");

            foreach ($table->getIndexes() as $index) {
                if (empty(array_diff($index->getColumns(), ['uid', 'type','category']))) {
                    return;
                }
            }

            $table->addUniqueIndex(['uid', 'type','category'], 'vcategory_uid_type_cat_idx');
        }
    }
}
