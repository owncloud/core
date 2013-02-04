<?php

/**
 * ownCloud - bookmarks plugin
 *
 * @author David Iwanowitsch
 * @author Andrew Brown
 * @copyright 2012 David Iwanowitsch <david at unclouded dot de>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Provides search results for bookmarks
 */
class OC_Search_Provider_Bookmark extends OC_Search_Provider {

    /**
     * Search the database for bookmarks containing the given query
     * @param type $query
     * @return array of \OC_Search_Result_Bookmarks
     */
    function search($query) {
	// create query
	$search_words = array();
	if (substr_count($query, ' ') > 0) {
	    $search_words = explode(' ', $query);
	} else {
	    $search_words = $query;
	}
	// search
	$bookmarks = OC_Bookmarks_Bookmarks::searchBookmarks($search_words);
	// format results
	$results = array();
	foreach ($bookmarks as $bookmark) {
	    // create search result
	    $result = new OC_Search_Result_Bookmark($bookmark['id'], $bookmark['title'], $bookmark['url'], '');
	    // fill from data
	    $result->fill($bookmark);
	    // add to results
	    $results[] = $result;
	}
	return $results;
    }
}
