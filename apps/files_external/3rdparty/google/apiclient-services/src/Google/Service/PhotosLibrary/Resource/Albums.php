<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * The "albums" collection of methods.
 * Typical usage is:
 *  <code>
 *   $photoslibraryService = new Google_Service_PhotosLibrary(...);
 *   $albums = $photoslibraryService->albums;
 *  </code>
 */
class Google_Service_PhotosLibrary_Resource_Albums extends Google_Service_Resource
{
  /**
   * Adds an enrichment to a specified position in a defined album.
   * (albums.addEnrichment)
   *
   * @param string $albumId Identifier of the album where the enrichment will be
   * added.
   * @param Google_Service_PhotosLibrary_AddEnrichmentToAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_AddEnrichmentToAlbumResponse
   */
  public function addEnrichment($albumId, Google_Service_PhotosLibrary_AddEnrichmentToAlbumRequest $postBody, $optParams = array())
  {
    $params = array('albumId' => $albumId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addEnrichment', array($params), "Google_Service_PhotosLibrary_AddEnrichmentToAlbumResponse");
  }
  /**
   * Creates an album in a user's Google Photos library. (albums.create)
   *
   * @param Google_Service_PhotosLibrary_CreateAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_Album
   */
  public function create(Google_Service_PhotosLibrary_CreateAlbumRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_PhotosLibrary_Album");
  }
  /**
   * Returns the album specified by the given album id. (albums.get)
   *
   * @param string $albumId Identifier of the album to be requested.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_Album
   */
  public function get($albumId, $optParams = array())
  {
    $params = array('albumId' => $albumId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PhotosLibrary_Album");
  }
  /**
   * Lists all albums shown to a user in the 'Albums' tab of the Google Photos
   * app. (albums.listAlbums)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A continuation token to get the next page of the
   * results. Adding this to the request will return the rows after the pageToken.
   * The pageToken should be the value returned in the nextPageToken parameter in
   * the response to the listAlbums request.
   * @opt_param int pageSize Maximum number of albums to return in the response.
   * The default number of albums to return at a time is 20. The maximum page size
   * is 50.
   * @return Google_Service_PhotosLibrary_ListAlbumsResponse
   */
  public function listAlbums($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PhotosLibrary_ListAlbumsResponse");
  }
  /**
   * Marks an album as 'shared' and accessible to other users. This action can
   * only be performed on albums which were created by the developer via the API.
   * (albums.share)
   *
   * @param string $albumId Identifier of the album to be shared. This album id
   * must belong to an album created by the developer. .
   * @param Google_Service_PhotosLibrary_ShareAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_ShareAlbumResponse
   */
  public function share($albumId, Google_Service_PhotosLibrary_ShareAlbumRequest $postBody, $optParams = array())
  {
    $params = array('albumId' => $albumId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('share', array($params), "Google_Service_PhotosLibrary_ShareAlbumResponse");
  }
}
