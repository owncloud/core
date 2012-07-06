<?php

/**
 * @author Jörn Dreyer <jfd@butonic.de>
 */
class OC_Search_Lucene_Hooks {
    
    /**
     * handle file writes (triggers reindexing)
     * 
     * the file is indexed immediately
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $param array from postWriteFile-Hook
     */
    public static function indexFile(array $param) {
	if (isset($param['path'])) {
	    OC_Search_Lucene_Indexer::indexFile($param['path']);
	} else {
            OC_Log::write('search_lucene',
                    'missing path parameter',
                    OC_Log::WARN);
	}
    }


    /**
     * cleanup when deleting a file
     *
     * the file is immediately removed from the index
     *
     * @author Jörn Dreyer <jfd@butonic.de>
     *
     * @param $param array from postDeleteFile-Hook
     */
    static public function delete(array $param) {
        // we cannot use post_delete as $param would not contain the id
        // of the deleted file and we could not fetch it with getId
	if (isset($param['path'])) {
            OC_Search_Lucene::deleteFile($param['path']);
	} else {
            OC_Log::write('search_lucene',
                    'missing path parameter',
                    OC_Log::WARN);
	}
      
    }
    
}
