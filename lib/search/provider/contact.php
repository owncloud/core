<?php

/**
 * Provides search results for contacts
 */
class OC_Search_Provider_Contact extends \OC_Search_Provider {

    /**
     * Search all contacts by 'fullname'
     * @param string $query
     * @return array \OC_Search_Result_Contact
     */
    function search($query) {
        // check if app is enabled
        if (!\OCP\App::isEnabled('contacts')) {
            return array();
        }
        // check for address books
        $addressbooks = \OCA\Contacts\Addressbook::all(\OCP\USER::getUser(), 1);
        if (count($addressbooks) == 0) {
            return array();
        }
        // search address books
        $results = array();
        foreach ($addressbooks as $addressbook) {
            $vcards = \OCA\Contacts\VCard::all($addressbook['id']);
            // search all vCards
            foreach ($vcards as $vcard) {
                if (substr_count(strtolower($vcard['fullname']), strtolower($query)) > 0) {
                    // create result
                    $result = new OC_Search_Result_Contact($vcard['id'], '', '', '');
                    // fill result
                    $result->fill($vcard);
                    // add to results array
                    $results[] = $result;
                }
            }
        }
        return $results;
    }

}
