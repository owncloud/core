<?php
namespace OC\Migrations;

use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

/**
 * Remove duplicates so Version20170519115025 is able to migrate
 */
class Version20170519112910 implements ISqlMigration {

    public function sql(IDBConnection $connection) {
        // find duplicate records
        $qb = $connection->getQueryBuilder();
        $qb->select('uid', 'type', 'category')
        ->from('vcategory')
        ->groupBy('uid', 'type','category')
        ->having('COUNT(id) > 1');
        $result = $qb->execute();
        $duplicates = $result->fetchAll();
        $result->closeCursor();

        if (empty($duplicates)) {
            return;
        }

        // create SQL condition array
        $where = array();
        foreach ($duplicates as $key => $val) {
            $where[] = "uid='{$val['uid']}' AND type='{$val['type']}' AND category='{$val['category']}'";
        }

        // find duplicate IDs
        $duplicates = array();
        foreach ($where as $condition) {
            $qb = $connection->getQueryBuilder();
            $qb->select('id')
            ->from('vcategory')
            ->where($condition);
            $result = $qb->execute();
            $allIds = $result->fetchAll(\PDO::FETCH_COLUMN);
            $result->closeCursor();
            // preserve first occurrence (id), save others for deletion
            $duplicates[$allIds[0]] = array_merge(array_slice($allIds, 1));
        }

        // fix ids in vcategory_to_object table before removing them in vcategory
        foreach ($duplicates as $key => $val) {
            $qb = $connection->getQueryBuilder();
            $qb->update('vcategory_to_object')
            ->set('categoryid', $qb->createNamedParameter($key))
            ->where($qb->expr()->in(
                'categoryid',
                $qb->createNamedParameter($val, $connection::PARAM_INT_ARRAY)
            ));
            $qb->execute();
        }

        // now we can remove the duplicate ids
        $duplicates = call_user_func_array('array_merge', $duplicates);
        $qb = $connection->getQueryBuilder();
        $qb->delete('vcategory')
        ->where($qb->expr()->in(
            'id',
            $qb->createNamedParameter($duplicates, $connection::PARAM_INT_ARRAY)
        ));
        $qb->execute();
    }
}
