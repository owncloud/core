<?php

require_once 'Zend/Search/Lucene.php';
require_once 'getid3/getid3.php';

class OC_Search_Lucene extends OC_Search_Provider {
    
    public static function open() {
        
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
        * @brief updated a file in the lucene index after a file has been updated
        * @param paramters parameters from postWriteFile-Hook
        * @return array
        */
    static public function indexFile($path = '', $fscacheId = -1) {
        if ( $path === '' ) {
            //ignore the empty path element
            return;
        }
        
        // the cache already knows mime and other basic stuff
        $data = OC_FileCache::getCached($path);
        
        $index = self::open();
                
        // TODO remove before insert to update?
        $doc = new Zend_Search_Lucene_Document();

        // Store document URL to identify it in the search results
        $doc->addField(Zend_Search_Lucene_Field::Text('path', $path));
        
        $doc->addField(Zend_Search_Lucene_Field::unIndexed('size', $data['size']));
        
        $doc->addField(Zend_Search_Lucene_Field::unIndexed('mimetype', $data['mimetype']));
        
        self::extractMetadata($path, $doc, $data['mimetype']);
        
        // Add document to the index
        $index->addDocument($doc);
        
        OC_Search_Lucene_Status::markAsIndexed($fscacheId);
    }
    
    private static function extractMetadata ($path, $doc, $mimetype) {
              
	$file=OC_Filesystem::getLocalFile($path);
        $getID3=@new getID3();
	$getID3->encoding='UTF-8';
        $data=$getID3->analyze($file);
        
        //show me what you got
        foreach ($data as $key => $value) {
            OC_Log::write('search_lucene',
                        'getid3 extracted '.$key.': '.$value,
                        OC_Log::DEBUG);
        }
        
        // filename _should_ always work, so log if it does not
        if ( isset($data['filename']) ) {
            $doc->addField(Zend_Search_Lucene_Field::Text('filename', $data['filename']));
        } else {
            OC_Log::write('search_lucene',
                        'failed to extract meta information for '.$path.': '.$data['error']['0'],
                        OC_Log::WARN);
        }
        
        $metaToIndex = array('artist', 'title');
        foreach ($metaToIndex as $key) {
            if ( isset($data[$key]) ) {
                $doc->addField(Zend_Search_Lucene_Field::Text($key, $data[$key]));
            }
        }
        
        //content
        
        $mimeBase = self::baseTypeOf($mimetype);
        //print_r($mimeBase);
        switch($mimeBase){
            case 'text':
                $content = OC_Filesystem::file_get_contents($path);
                break;
            //TODO case '' index pdf content
            //TODO case '' index office content
            default:
                //dont index content
                $content = '';
        }
        if ($content != '') {
            $doc->addField(Zend_Search_Lucene_Field::UnStored('content', $content));
        }
        
        if ( isset($data['error']) ) {
            //OC_Search_Lucene_Status::markAsError($fscacheId);
            OC_Log::write('search_lucene',
                        'failed to extract meta information for '.$path.': '.$data['error']['0'],
                        OC_Log::WARN);
            
            return;
        }
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
    
    public static function baseTypeOf($mimetype) {
        return substr($mimetype,0,strpos($mimetype,'/'));
    }
    
    public function search($query){
        $results=array();
        if ( $query !== null ) {
            
            try {
                $index = self::open(); 

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
    
    public static function index($eventSource) {
        // get list of files to index
        //TODO limit to 100? loop
        $idsToIndex = OC_Search_Lucene_Status::getDirtyFiles();
        $eventSource->send('count', count($idsToIndex));
        foreach ($idsToIndex as $file) {
            
            $path = OC_FileCache::getPath( $file['id'] );
            
            $eventSource->send( 'indexing', array('path' => $path, 'status' => $file['status']) );
            
            //  indexFile
            self::indexFile($path, $file['id']);
            
        }
        
        $eventSource->send('done');
    }
}