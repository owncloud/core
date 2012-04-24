<?php

require_once 'Zend/Search/Lucene.php';
require_once 'Zend/Pdf.php';
require_once 'getid3/getid3.php';
require_once 'pdf2text.php';

/**
 * @author Jörn Dreyer <jfd@butonic.de>
 */
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
        
        // TODO index meta information from media files
        
        //show me what you got
        /*foreach ($data as $key => $value) {
            OC_Log::write('search_lucene',
                        'getid3 extracted '.$key.': '.$value,
                        OC_Log::DEBUG);
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    OC_Log::write('search_lucene',
                            '  ' . $value .'-' .$k.': '.$v,
                            OC_Log::DEBUG);
                }
            }
        }*/
        
        // filename _should_ always work, so log if it does not
        if ( isset($data['filename']) ) {
            $doc->addField(Zend_Search_Lucene_Field::Text('filename', $data['filename']));
        } else {
            OC_Log::write('search_lucene',
                        'failed to extract meta information for '.$path.': '.$data['error']['0'],
                        OC_Log::WARN);
        }
                
        //content
        
        OC_Log::write('search_lucene',
                    'indexer extracting content for '.$path.' ('.$mimetype.')',
                    OC_Log::DEBUG);
        
        $content = '';
            
        if ('text/plain' === $mimetype) {
            $content = OC_Filesystem::file_get_contents($path);
            
        } else if ('application/pdf' === $mimetype) {
            try {
                $zendpdf = Zend_Pdf::parse(OC_Filesystem::file_get_contents($path));
                
                //we currently only display the filename, so we only index metadata here
                if (isset($zendpdf->properties['Title'])) {
                    $doc->addField(Zend_Search_Lucene_Field::UnStored('title',$zendpdf->properties['Title']));
                }
                if (isset($zendpdf->properties['Author'])) {
                    $doc->addField(Zend_Search_Lucene_Field::UnStored('author',$zendpdf->properties['Author']));
                }
                if (isset($zendpdf->properties['Subject'])) {
                    $doc->addField(Zend_Search_Lucene_Field::UnStored('subject',$zendpdf->properties['Subject']));
                }
                if (isset($zendpdf->properties['Keywords'])) {
                    $doc->addField(Zend_Search_Lucene_Field::UnStored('keywords',$zendpdf->properties['Keywords']));
                }
                //TODO handle PDF 1.6 metadata Zend_Pdf::getMetadata()
                
                //do the content extraction
                $pdfParse = new App_Search_Helper_PdfParser();
                $content = $pdfParse->pdf2txt($zendpdf->render());
                
            } catch (Exception $e) {
                OC_Log::write('search_lucene',
                    $e->getMesage().' Trace:\n'.$e->getTraceAsString(),
                    OC_Log::ERROR);
            }
            
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