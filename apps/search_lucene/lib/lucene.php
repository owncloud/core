<?php

require_once 'Zend/Search/Lucene.php';

class OC_Search_Lucene extends OC_Search_Provider {
    
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
        * @brief cleans up the lucene index after a file has been deleted
        * @param paramters parameters from postDeleteFile-Hook
        * @return array
        */
    static public function deleteFile($parameters) {
            /* FIXME
                */
    }
    
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

        //print_r($hit->mime_type);
        $mimeBase = self::baseTypeOf($hit->mimetype);
        //print_r($mimeBase);
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
    
    
    public static function baseTypeOf($mimetype) {
        return substr($mimetype,0,strpos($mimetype,'/'));
    }
    
}