<?php

/**
 * Searches the filesystem PDFs
 */
class OC_Search_Provider_Reader extends OC_Search_Provider {

    /**
     * Search the database for PDFs with the given file name
     * @param string $query
     * @return array of OC_Search_Result_Book
     */
    function search($query) {
        $files = \OC\Files\Filesystem::search($query);
        $results = array();
        // edit results
        foreach ($files as $fileData) {
            // skip versions
            if (strpos($fileData['path'], '_versions') === 0) {
                continue;
            }
            // only add PDFs
            if ( $fileData['mimetype'] == 'application/pdf' ){
                // create result
                $result = new OC_Search_Result_Book($fileData['id'], '', '', '');
                // fill from file data
                $result->fill($fileData);
                // add to results
                $results[] = $result;
            }
        }
        // return
        return $results;
    }

}