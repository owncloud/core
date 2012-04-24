<?php

/**
 * Stores the file status with regard to lucene:
 * 
 * N ew: needs to be indexed
 * I ndexed: ok
 * C hanged: needs reindexing
 * D eleted: clean up index and remove from status
 * E rror: could not index, do not try again FIXME
 * 
 * 
 * @author Jörn Dreyer <jfd@butonic.de>
 */
class OC_Search_Lucene_Status {

    public static function isValidStatus($status) {
        switch ($status) {
            case 'N':
            case 'I':
            case 'C':
            case 'D':
            case 'E':
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
    public static function markAsError($fscacheId) {
        self::setStatus($fscacheId, 'E');
    }
    
    /**
     * set the status for a file
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param int $id The fscache id
     * @param string $status The index status (one of 'N', 'I', 'C', 'D', 'E')
     * @return boolean
     */
    public static function setStatus ($id, $status) {
        
        if ( ! is_numeric($id) || $id === -1 || ! self::isValidStatus($status) ) {
            return false;
        }
            
        return self::createOrUpdateStatus($id,$status);
    }
    
    /**
     * retrieve the indexer status for the given fscacheId
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param int $id The fscacheId to insert
     * 
     * @return mixed string if successful, NULL if unknown id, false on error
     */
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
     * tries to insert or update the status of the given fscacheId. 
     * 
     * for public access use @see setStatus, as it will check for a valid status
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param int $id The fscacheId to insert
     * @param string $status The new status (will not be checked)
     * 
     * @return boolean true on success, false otherwise
     */
    private static function createOrUpdateStatus ( $id, $status ) {
        
        //TODO: mdb2 does not correctly set up primary keys, so trying to insert a duplicate entry will not throw an error
       
        if (self::getStatus($id) === NULL) { // this makes an extra trip to the db
            //try insert
            return self::createStatus($id, $status);
        } else {
            //update
            return self::updateStatus($id, $status);
        }
        
    }
    /**
     * tries to insert the status of the given fscacheId. 
     * 
     * for public access use @see setStatus, as it will check for a valid status
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param int $id The fscacheId to insert
     * @param string $status The new status (will not be checked)
     * 
     * @return boolean true on success, false otherwise
     */
    private static function createStatus ( $id, $status ) {
        
        $stmt = OC_DB::prepare( 'INSERT INTO *PREFIX*search_lucene_status (fscache_id,status) VALUES(?,?)' );
        $result = $stmt->execute( array( $id, $status ) );
                
        if ( OC_DB::isError($result) ) {
            return false;
        }
        return true;
    }
    
    /**
     * tries to updates the status of the given fscacheId. 
     * 
     * for public access use @see setStatus, as it will check for a valid status
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param int $id The fscacheId to update
     * @param string $status The new status (will not be checked)
     * 
     * @return boolean true on success, false otherwise
     */
    private static function updateStatus ( $id, $status ) {
        
        $stmt = OC_DB::prepare( 'UPDATE *PREFIX*search_lucene_status set status = ? WHERE fscache_id = ?' );
        $result = $stmt->execute( array( $status, $id ) );
                
        if ( OC_DB::isError($result) ) {
            return false;
        }
        return true;
    }
    
    /**
     * counts dirty entries in the search lucene status table
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @return integer
     */
    public static function countDirty() {
        $stmt = OC_DB::prepare( 'SELECT count() AS count FROM *PREFIX*search_lucene_status WHERE status IN ( "N", "C", "D" )' );
        $result = $stmt->execute();
        $row = $result->fetchRow();
        return $row['count'];
    }
    
    /**
     * counts indexed entries in the search lucene status table
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @return integer
     */
    public static function countIndexed() {
        $stmt = OC_DB::prepare( 'SELECT count() AS count FROM *PREFIX*search_lucene_status WHERE status = "I"' );
        $result = $stmt->execute();
        $row = $result->fetchRow();
        return $row['count'];
    }
    
    /**
     * Returns a list of dirty files that need reindexing
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @return array of fscacheIds from the search lucene status table
     */
    public static function getDirtyFiles() {
        $files = array();
        
        $stmt = OC_DB::prepare( 'SELECT fscache_id AS id, status FROM *PREFIX*search_lucene_status WHERE status IN ( "N", "C", "D" )' );
        $result = $stmt->execute();
        
        while( $row = $result->fetchRow()){
                $files[] = $row;
        }
        
        return $files;
    }
    
    
    /**
     * compare fscache with the search lucene status table
     * 
     * index new resources (might have been added via webdav)
     * remove old resources (might have been deleted via webdav)
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param OC_EventSource $eventSource
     */
    public static function syncFromCache(OC_EventSource $eventSource) {
        // add new files from index
        
        $stmt = OC_DB::prepare( 'SELECT id FROM oc_fscache LEFT JOIN oc_search_lucene_status ON oc_fscache.id=oc_search_lucene_status.fscache_id WHERE oc_search_lucene_status.fscache_id IS NULL;' );
        $result = $stmt->execute();
        
        $eventSource->send( 'adding', $result->numRows() );
        
        while( $row = $result->fetchRow() ){
            self::createStatus( $row['id'], 'N' );
        }
        
        $eventSource->send( 'adding done' );
        
        // remove files if vanished from cache
        
        $stmt = OC_DB::prepare( 'SELECT fscache_id FROM oc_search_lucene_status LEFT JOIN oc_fscache ON oc_search_lucene_status.fscache_id=oc_fscache.id WHERE oc_fscache.id IS NULL;' );
        $result = $stmt->execute();
        
        $eventSource->send( 'removing', $result->numRows() );
        
        while( $row = $result->fetchRow() ){
            
            //remove from index
            $index = OC_Search_Lucene::openOrCreate();
            
            OC_Search_Lucene::deleteFile($index, $row['fscache_id']);
            
            //remove from table            
            $stmt = OC_DB::prepare( 'DELETE FROM oc_search_lucene_status WHERE fscache_id=?;' );
            $delResult = $stmt->execute( array( $row['fscache_id'] ) );

            if ( OC_DB::isError($delResult) ) {
                //TODO log?
            } else {
                $eventSource->send( 'removed', $result->numRows() );
            }
            
        }
        $eventSource->send( 'removing done' );
        
        $eventSource->send( 'sync done' );
        
    }
    
}