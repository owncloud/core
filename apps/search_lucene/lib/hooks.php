<?php

class OC_Search_Lucene_Hooks {
    
    /**
     * handle file creates (triggers reindexing)
     * 
     * the file is marked as new in the status table and
     * will be indext upon next refresh
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $param parameters from postCreateFile-Hook
     */
    public static function postCreate(array $param) {
        OC_Search_Lucene_Status::markAsNew( OC_FileCache::getId($param['path']) );
    }

    /**
     * handle file writes (triggers reindexing)
     * 
     * the file is marked as changed in the status table and
     * will be indext upon next refresh
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $param parameters from postWriteFile-Hook
     */
    public static function postWrite(array $param) {
        OC_Search_Lucene_Status::markAsChanged( OC_FileCache::getId($param['path']) );
    }

    /**
     * handle file renames (triggers reindexing)
     * 
     * the file is marked as changed in the status table and
     * will be indext upon next refresh
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $param parameters from postRenameFile-Hook
     */
    public static function postRename(array $param) {
        OC_Search_Lucene_Status::markAsChanged(OC_FileCache::getId($param['path']));
    }

    /**
     * cleanup after a file is deleted
     * 
     * the file is immediately removed from the index and
     * marked as such in the satus table
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $param parameters from postDeleteFile-Hook
     */
    static public function postDelete(array $param) {
            OC_Log::write('search_lucene',
                        'postDelete '.$param['path'],
                        OC_Log::DEBUG);
        //mark as deleted in index
        $index = OC_Search_Lucene::openOrCreate();
        OC_Search_Lucene::deleteFile($index, $param['path']);

        //mark as deleted in status table
        //TODO completely delete from status table?
        OC_Search_Lucene_Status::markAsDeleted( OC_FileCache::getId($param['path']) );
    }
    
}