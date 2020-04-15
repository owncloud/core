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
 * The "mediaItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $photoslibraryService = new Google_Service_PhotosLibrary(...);
 *   $mediaItems = $photoslibraryService->mediaItems;
 *  </code>
 */
class Google_Service_PhotosLibrary_Resource_MediaItems extends Google_Service_Resource
{
  /**
   * Creates one or more media items in a user's Google Photos library. If an
   * album id is specified, the media item(s) are also added to the album. By
   * default the media item(s) will be added to the end of the library or album.
   *
   * If an album id and position are both defined, then the media items will be
   * added to the album at the specified position.
   *
   * If multiple media items are given, they will be inserted at the specified
   * position. (mediaItems.batchCreate)
   *
   * @param Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_BatchCreateMediaItemsResponse
   */
  public function batchCreate(Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_PhotosLibrary_BatchCreateMediaItemsResponse");
  }
  /**
   * Returns the media item specified based on a given media item id.
   * (mediaItems.get)
   *
   * @param string $mediaItemId Identifier of media item to be requested.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_MediaItem
   */
  public function get($mediaItemId, $optParams = array())
  {
    $params = array('mediaItemId' => $mediaItemId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PhotosLibrary_MediaItem");
  }
  /**
   * Searches for media items in a user's Google Photos library. If no filters are
   * set, then all media items in the user's library will be returned.
   *
   * If an album is set, all media items in the specified album will be returned.
   *
   * If filters are specified, anything that matches the filters from the user's
   * library will be listed.
   *
   * If an album and filters are set, then this will result in an error.
   * (mediaItems.search)
   *
   * @param Google_Service_PhotosLibrary_SearchMediaItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_SearchMediaItemsResponse
   */
  public function search(Google_Service_PhotosLibrary_SearchMediaItemsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_PhotosLibrary_SearchMediaItemsResponse");
  }
}
