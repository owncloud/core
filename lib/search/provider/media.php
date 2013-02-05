<?php

/**
 * Search for media files
 */
class OC_Search_Provider_Media extends OC_Search_Provider {

    /**
     * Search the media collection for artists, albums, and songs
     * @param string $query
     * @return array of OC_Search_Result
     */
    function search($query) {
        $results = array();
        $collection = new OCA\Media\Collection(\OCP\User::getUser());
        // get artists
        $artists = $collection->getArtists($query);
        foreach ($artists as $artist) {
            $result = new OC_Search_Result_Artist('', '', '', '');
            $result->fill($artist);
            $results[] = $result;
        }
        // get albums
        $albums = $collection->getAlbums(0, $query);
        foreach ($albums as $album) {
            $result = new OC_Search_Result_Album('', '', '', '');
            $result->fill($album);
            $results[] = $result;
        }
        // get songs
        $songs = $collection->getSongs(0, 0, $query);
        foreach ($songs as $song) {
            $result = new OC_Search_Result_song('', '', '', '');
            $result->fill($song);
            $results[] = $result;
        }
        return $results;
    }

}
