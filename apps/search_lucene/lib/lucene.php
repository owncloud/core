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
        $index = self::open();
                
	$file=OC_Filesystem::getLocalFile($path);
        $getID3=@new getID3();
	$getID3->encoding='UTF-8';
        $data=$getID3->analyze($file);
        
        if ( isset($data['error']) ) {
            OC_Search_Lucene_Status::markAsError($fscacheId);
            OC_Log::write('search_lucene',
                        'failed to extract meta information for '.$path.': '.$data['error']['0'],
                        OC_Log::WARN);
            
            return;
        }
        
        // TODO remove before insert to update?
        $doc = new Zend_Search_Lucene_Document();

        // Store document URL to identify it in the search results
        $doc->addField(Zend_Search_Lucene_Field::Text('path', $path));
        
        $doc->addField(Zend_Search_Lucene_Field::Text('filename', $data['filename']));
        $doc->addField(Zend_Search_Lucene_Field::unIndexed('filesize', $data['filesize']));
        $doc->addField(Zend_Search_Lucene_Field::unIndexed('mime_type', $data['mime_type']));
        
        // TODO index author, date ... use getid3 ... content
        
        // Index document contents
        //$doc->addField(Zend_Search_Lucene_Field::UnStored('contents', $docContent));

        // Add document to the index
        $index->addDocument($doc);
        
        OC_Search_Lucene_Status::markAsIndexed($fscacheId);
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
                $index = self::open(); 

                $hits = $index->find($query);
                
                foreach ($hits as $hit) {
                    //print_r($hit->mime_type);
                    $mimeBase=substr($hit->mime_type,0,strpos($hit->mime_type,'/'));
                    //print_r($mimeBase);
                    switch($mimeBase){
                        case 'audio':
                            continue; //ignore audio files?
                        case 'text':
                            $type='Text';
                            break;
                        case 'image':
                            $type='Images';
                            break;
                        default:
                            if($hit->mime_type=='application/xml'){
                                $type='Text';
                            } else {
                                $type='Files';
                            }
                    }
                    //$results[]=new OC_Search_Result('fileName','info',OC_Helper::linkTo( 'files', 'download.php?file='.$path ),'Text');
                    $results[]=new OC_Search_Result(
                                        $hit->filename,
                                        'Score: ' . $hit->score . ', Size: ' . $hit->filesize,
                                        OC_Helper::linkTo( 'files', 'download.php?file='.$hit->path),
                                        $type
                               );
                }
                
            } catch ( Exception $e ) {
                OC_Log::write('search_lucene',
                            $e->getMesage().' Trace:\n'.$e->getTraceAsString(),
                            OC_Log::ERROR);
            }
            
        }
        return $results;
    }
    
    public static function index($eventSource) {
        // get list of files to index
        //TODO limit to 100? loop
        $idsToIndex = OC_Search_Lucene_Status::getDirtyFiles();
        $eventSource->send('count', count($idsToIndex));
        foreach ($idsToIndex as $file) {
            
            $path = OC_FileCache::getPath($file['id']);
            
            $eventSource->send( 'indexing', array('path' => $path, 'status' => $file['status']) );
            
            //  indexFile
            self::indexFile($path, $file['id']);
            
        }
        
        $eventSource->send('done');
    }
    
}