<?php

require_once 'Zend/Search/Lucene.php';

/**
 * @author Jörn Dreyer <jfd@butonic.de>
 */
class OC_Search_Lucene extends OC_Search_Provider {
    
    
    /**
     * opens or creates the users lucene index
     * 
     * stores the index in <datadirectory>/<user>/lucene_index
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     *
     * @return Zend_Search_Lucene_Interface 
     */
    public static function openOrCreate() {
        
        try {
            // Create index
            //$ocFilesystemView = OC_App::getStorage('search_lucene'); // encrypt the index on logout, decrypt on login
            
            $indexUrl = OC_Config::getValue( 'datadirectory', OC::$SERVERROOT.'/data' );
            $indexUrl .= '/' . OC_User::getUser() . '/lucene_index';
            if (file_exists($indexUrl)) {
                $index = Zend_Search_Lucene::open($indexUrl);
            } else {
                $index = Zend_Search_Lucene::create($indexUrl);
            }
        } catch ( Exception $e ) {
            OC_Log::write('search_lucene',
                        $e->getMessage().' Trace:\n'.$e->getTraceAsString(),
                        OC_Log::ERROR);
            return null;
        }
        
        return $index;
    }

    
    /**
     * upates a file in the lucene index
     * 
     * 1. the file is deleted from the index
     * 2. the file is readded to the index
     * 3. the file is marked as index in the status table
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param Zend_Search_Lucene_Document $doc  the document to store for the path
     * @param string                      $path path to the document to update
     * 
     * @return void
     */
    static public function updateFile(Zend_Search_Lucene_Document $doc, $path = '') {  
                
        $index = OC_Search_Lucene::openOrCreate();
                        
        // TODO profile perfomance for searching before adding to index
        self::deleteFile($path, $index);
        
        OC_Log::write('search_lucene',
                      'adding ' . $path,
                      OC_Log::DEBUG);
        
        // Add document to the index
        $index->addDocument($doc);
        
        $index->commit();
                
    }
    
    /**
     * removes a file frome the lucene index
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param string                       $path  path to the document to remove from the index
     * @param Zend_Search_Lucene_Interface $index optional can be passed ro reuse an existing instance
     * 
     * @return void
     */
    static public function deleteFile($path, Zend_Search_Lucene_Interface $index = null) {        
        
        if ( $path === '' ) {
            //ignore the empty path element
            return;
        }
        
        if ($index === null) {
           $index = self::openOrCreate();
        }
        
        $root=OC_Filesystem::getRoot();
        $pk = md5($root.$path);
        
        OC_Log::write('search_lucene',
                      'searching hits for pk:' . $pk,
                      OC_Log::DEBUG);

        
        $hits = $index->find( 'pk:' . $pk ); //id would be internal to lucene
        
        OC_Log::write('search_lucene',
                      'found ' . count($hits) . ' hits ',
                      OC_Log::DEBUG);
        
        foreach ($hits as $hit) {
            OC_Log::write('search_lucene',
                          'removing ' . $hit->id . ':' . $hit->path . ' from index',
                          OC_Log::DEBUG);
            $index->delete($hit);
        }
    }
    
    /**
     * performs a search on the users index
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param string $query lucene search query
     * @return array of OC_Search_Result
     */
    public function search($query){
        $results=array();
        if ( $query !== null ) {
            //$query = '*' . $query . '*'; //FIXME emulates the old search but breaks all the nice lucene search query options
            try {
                $index = self::openOrCreate(); 
                //Zend_Search_Lucene_Search_Query_Wildcard::setMinPrefixLength(0); //default is 3, 0 needed to keep current search behaviour

                $hits = $index->find($query);
                
                foreach ($hits as $hit) {
                    $results[] = self::asOCSearchResult($hit);
                }
                
            } catch ( Exception $e ) {
                OC_Log::write('search_lucene',
                            $e->getMessage().' Trace:\n'.$e->getTraceAsString(),
                            OC_Log::ERROR);
            }
            
        }
        return $results;
    }

    /**
     * converts a zend lucene search object to a OC_SearchResult
     *
     * Example:
     * 
     * Text | Some Document.txt
     *      | /path/to/file, 148kb, Score: 0.55
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     *
     * @param Zend_Search_Lucene_Search_QueryHit $hit The Lucene Search Result
     * @return OC_Search_Result an OC_Search_Result
     */
    private static function asOCSearchResult(Zend_Search_Lucene_Search_QueryHit $hit) {

        $mimeBase = self::baseTypeOf($hit->mimetype);
        
        switch($mimeBase){
            case 'audio':
                $type='Music';
                break;
            case 'text':
                $type='Text';
                break;
            case 'image':
                $type='Images';
                break;
            default:
                if ($hit->mimetype=='application/xml') {
                    $type='Text';
                } else {
                    $type='Files';
                }
        }

        return new OC_Search_Result(
                            basename($hit->path),
                            dirname($hit->path) . ', ' . OC_Helper::humanFileSize($hit->size) . ', Score: ' . number_format($hit->score, 2),
                            OC_Helper::linkTo( 'files', 'download.php?file='.$hit->path),
                            $type
                    );
    }
    
    /**
     * get the base type of a mimetype string
     * 
     * returns 'text' for 'text/plain'
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param string $mimetype mimetype
     * @return string basetype 
     */
    public static function baseTypeOf($mimetype) {
        return substr($mimetype,0,strpos($mimetype,'/'));
    }
    
    
    
}
