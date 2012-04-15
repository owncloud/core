<?php


/**
 * Stores the file status with regard to lucene:
 * 
 * N ew: needs to be indexed
 * I ndexed: ok
 * C hanged: needs reindexing
 * D eleted: clean up index and remove from status
 * 
 */
class OC_Search_Lucene_Status {
    
    public static function isValidStatus($status) {
        switch ($status) {
            case 'N':
            case 'I':
            case 'C':
            case 'D':
                return true;
            default:
                return false;
        }
    }
    
    public static function markAsNew($fscacheId) {
        self::setStatus($fscacheId, 'N');
    }
    public static function markAsIndexed($fscacheId) {
        self::setStatus($fscacheId, 'I');
    }
    public static function markAsChanged($fscacheId) {
        self::setStatus($fscacheId, 'C');
    }
    public static function markAsDeleted($fscacheId) {
        self::setStatus($fscacheId, 'D');
    }
    
    /**
     * @brief set the status for a file
     * @param fscache id, status (one of 'N', 'I', 'C', 'D')
     * @return boolean
     */
    public static function setStatus ($id, $status) {
        
        if ( ! is_int($id) || ! self::isValidStatus($status) ) {
            return false;
        }
            
        return self::createOrUpdateStatus($id,$status);
    }
    
    private static function createOrUpdateStatus ( $id, $status ) {
        //try update
        $stmt = OC_DB::prepare( 'UPDATE *PREFIX*search_lucene_status set status = ? WHERE fscache_id = ?' );
        $result = $stmt->execute(array( $status, $id) );
       
        if (OC_DB::isError($result)) {
            //try insert
            $stmt = OC_DB::prepare( 'INSERT INTO *PREFIX*search_lucene_status (fscache_id,status) VALUES(?,?)' );
            $result = $stmt->execute(array( $id, $status ));
        }
                
        if (OC_DB::isError($result)) {
            return false;
        }
        return true;
    }
    
    public static function getStatus ( $id ) {
        $stmt = OC_DB::prepare( 'SELECT status FROM *PREFIX*search_lucene_status WHERE fscache_id = ?' );
        $result = $stmt->execute(array($id));
        if (OC_DB::isError($result)) {
            return false;
        }
        if ($result->numRows() <= 0) {
            return NULL;
        }
        $row = $result->fetchRow();
        return $row['status'];
    }
    
    /**
     * @brief counts entries in the queue table
     * @param 
     * @return integer
     */
    public static function countDirty() {
        $stmt = OC_DB::prepare( 'SELECT count() AS count FROM *PREFIX*search_lucene_status WHERE status IN ( "N", "C", "D" )' );
        $result = $stmt->execute();
        $row = $result->fetchRow();
        return $row['count'];
    }
    public static function countIndexed() {
        $stmt = OC_DB::prepare( 'SELECT count() AS count FROM *PREFIX*search_lucene_status WHERE status = "I"' );
        $result = $stmt->execute();
        $row = $result->fetchRow();
        return $row['count'];
    }
    
    public static function onPostCreate($path) {
        self::markAsNew( OC_FileCache::getFileId($path) );
    }
    public static function onPostWrite($path) {
        self::markAsChanged( OC_FileCache::getFileId($path) );
    }
    public static function onPostRename($path) {
        self::markAsChanged( OC_FileCache::getFileId($path) );
    }
    public static function onPostDelete($path) {
        self::markAsDeleted( OC_FileCache::getFileId($path) );
    }
    
}