<?php

require_once 'Zend/Search/Lucene.php';
require_once 'getid3/getid3.php';

class OC_Search_Lucene_Indexer {
    
    /**
     * start indexing dirty files (as found in the status table)
     * 
     * the event source will be notified on every new file being indexed
     * by sending 'indexing' and when indexing is 'done'
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param OC_EventSource $eventSource
     */
    public static function index(OC_EventSource $eventSource) {
        // get list of files to index
        //TODO limit to 100? loop
        $idsToIndex = OC_Search_Lucene_Status::getDirtyFiles();
        $eventSource->send('count', count($idsToIndex));
        foreach ($idsToIndex as $file) {
            
            $path = OC_FileCache::getPath( $file['id'] );
            
            $eventSource->send( 'indexing', array('path' => $path, 'status' => $file['status'], 'id' => $file['id']) );
            
            //  indexFile
            self::indexFile($path, $file['id']);
            
        }
        
        $eventSource->send('done');
    }
    
    /**
     * index a file
     * 
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param string $path the path of the file
     * @param int $fscacheId the id of the file in the fscache table
     */
    static public function indexFile($path = '', $fscacheId = -1) {
        if ( $path === '' || $fscacheId === -1 ) {
            //ignore the empty path element
            return;
        }
        
        // the cache already knows mime and other basic stuff
        $data = OC_FileCache::getCached($path);
        
        $doc = new Zend_Search_Lucene_Document();

        // store fscacheid as unique id to lookup by when deleting
        $doc->addField(Zend_Search_Lucene_Field::Keyword('pk', $fscacheId));
        
        // Store document URL to identify it in the search results
        $doc->addField(Zend_Search_Lucene_Field::Text('path', $path));
        
        $doc->addField(Zend_Search_Lucene_Field::unIndexed('size', $data['size']));
        
        $doc->addField(Zend_Search_Lucene_Field::unIndexed('mimetype', $data['mimetype']));
        
        self::extractMetadata($doc, $path, $data['mimetype']);
        
        OC_Search_Lucene::updateFile($doc, $path, $fscacheId);
    }
    
    
    /**
     * extract the metadata from a file
     * 
     * uses getid3 to extract metadata.
     * if possible also adds content (currently only for plain text files)
     * hint: use OC_FileCache::getCached($path) to get metadata for the last param
     *  
     * @author Jörn Dreyer <jfd@butonic.de>
     * 
     * @param Zend_Search_Lucene_Document $doc to add the metadata to
     * @param string $path path of the file to extract metadata from
     * @param string $mimetype depending on the mimetype different extractions are performed
     */
    private static function extractMetadata (Zend_Search_Lucene_Document $doc, $path, $mimetype) {
              
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
        
        $mimeBase = OC_Search_Lucene::baseTypeOf($mimetype);
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
    
}