<?php

/**
 * Search for news articles
 */
class OC_Search_Provider_News extends OC_Search_Provider {

    /**
     * Search the news application for articles
     * @param string $query
     * @return array of OC_Search_Result_Article
     */
    function search($query) {
        // check if app is enabled
        if (!OCP\App::isEnabled('news')) {
            return array();
        }
        // setup feedmapper
        $feedMapper = new OCA\News\FeedMapper(OCP\USER::getUser());
        $results = array();
        // get feeds
        if ($feedMapper->feedCount() > 0) {
            // find feeds
            $allFeeds = $feedMapper->findAll();
            foreach ($allFeeds as $feed) {
                if (substr_count(strtolower($feed['title']), strtolower($query)) > 0) {
                    // create result
                    $result = new OC_Search_Result_Feed($feed['id'], '', '', '');
                    // fill from file data
                    $result->fill($feed);
                    // add to results
                    $results[] = $result;
                }
            }
            // find articles
            $itemMapper = new OCA\News\ItemMapper(OCP\USER::getUser());
            foreach ($itemMapper->find($query) as $article) {
                // create result
                $result = new OC_Search_Result_Article($article['id'], '', '', '');
                // fill from file data
                $result->fill($article);
                // add to results
                $results[] = $result;
            }
        }
        return $results;
    }

}
