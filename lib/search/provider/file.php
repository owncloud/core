<?php

/**
 * This provider only searches file names
 */
class OC_Search_Provider_File extends OC_Search_Provider {

    /**
     * Search the database for files with the given file name
     * @param string $query
     * @return OC_Search_Result
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
            // skip top-level folder
            if ($fileData['name'] == 'files' && $fileData['parent'] == -1) {
                continue;
            }
            // create result
            $result = new OC_Search_Result_File($fileData['fileid'], '', '', '');
            // fill from file data
            $result->fill($fileData);
            // add to results
            $results[] = $result;
        }
        // return
        return $results;
    }

}
