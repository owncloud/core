<?php

/**
 * Searches the gallery images
 */
class OC_Search_Provider_Gallery extends OC_Search_Provider {

    /**
     * Search the database for files with the given file name
     * @param string $query
     * @return array of OC_Search_Result_Image
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
            // only add images
            if ( strpos($fileData['mimetype'], 'image') !== false ){
                // create result
                $result = new OC_Search_Result_Image($fileData['id'], '', '', '');
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