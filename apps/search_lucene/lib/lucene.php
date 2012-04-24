<?php

require_once 'Zend/Search/Lucene.php';

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
            
            $indexUrl = OC_Config::getValue( "datadirectory", OC::$SERVERROOT."/data" );
            $indexUrl .= '/' . OC_User::getUser() . '/lucene_index';
            if (file_exists($indexUrl)) {
                $index = Zend_Search_Lucene::open($indexUrl);
            } else {
                $index = Zend_Search_Lucene::create($indexUrl);
            }
        } catch ( Exception $e ) {
            OC_Log::write('search_lucene',
                        $e->getMesage().' Trace:\n'.$e->getTraceAsString(),
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
     * @param $doc Zend_Search_Lucene_Document the document to store for the path
     * @param $path path to the document to update
     * @param $fscacheId id of the file in the fscache table
     */
    static public function updateFile(Zend_Search_Lucene_Document $doc, $path = '', $fscacheId = -1) {  
                
        $index = OC_Search_Lucene::openOrCreate();
                        
        // TODO profile perfomance for searching before adding to index
        OC_Search_Lucene::deleteFile($index, $path);
        
        OC_Log::write('search_lucene',
                      'adding ' . $path,
                      OC_Log::DEBUG);
        
        // Add document to the index
        $index->addDocument($doc);
        
        OC_Search_Lucene_Status::markAsIndexed($fscacheId);
        
    }
    
    /**
     * removes a file frome the lucene index
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $index Zend_Search_Lucene_Interface
     * @param $removePath path to the document to remove from the index
     */
    static public function deleteFile(Zend_Search_Lucene_Interface $index, $removePath) {        
        
        OC_Log::write('search_lucene',
                      'searching hits for ' . $removePath,
                      OC_Log::DEBUG);
        
        $hits = $index->find('path:' . $removePath);
        
        OC_Log::write('search_lucene',
                      'found ' . sizeof($hits) . ' hits ',
                      OC_Log::DEBUG);
        
        foreach ($hits as $hit) {
            OC_Log::write('search_lucene',
                          'removing ' . $hit->id . ':' . $hit->path . ' from index',
                          OC_Log::DEBUG);
            $index->delete($hit->id);
        }
    }
    
    /**
     * performs a search on the users index
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param $query lucene search query
     * @return array of OC_Search_Result
     */
    public function search($query){
        $results=array();
        if ( $query !== null ) {
            
            try {
                $index = self::openOrCreate(); 

                $hits = $index->find($query);
                
                foreach ($hits as $hit) {
                    $results[] = self::asOCSearchResult($hit);
                }
                
            } catch ( Exception $e ) {
                OC_Log::write('search_lucene',
                            $e->getMesage().' Trace:\n'.$e->getTraceAsString(),
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
                if($hit->mimetype=='application/xml'){
                    $type='Text';
                } else {
                    $type='Files';
                }
        }

        return new OC_Search_Result(
                            basename($hit->path),
                            dirname($hit->path) . ', ' . $hit->size . ', Score: ' . number_format($hit->score, 2),
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
     * @param $mimetype mimetype string
     * @return basetype 
     */
    public static function baseTypeOf($mimetype) {
        return substr($mimetype,0,strpos($mimetype,'/'));
    }
    
    
    
}