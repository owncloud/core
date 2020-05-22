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
 * The "sharedAlbums" collection of methods.
 * Typical usage is:
 *  <code>
 *   $photoslibraryService = new Google_Service_PhotosLibrary(...);
 *   $sharedAlbums = $photoslibraryService->sharedAlbums;
 *  </code>
 */
class Google_Service_PhotosLibrary_Resource_SharedAlbums extends Google_Service_Resource
{
  /**
   * Joins a shared album on behalf of the Google Photos user. (sharedAlbums.join)
   *
   * @param Google_Service_PhotosLibrary_JoinSharedAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PhotosLibrary_JoinSharedAlbumResponse
   */
  public function join(Google_Service_PhotosLibrary_JoinSharedAlbumRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('join', array($params), "Google_Service_PhotosLibrary_JoinSharedAlbumResponse");
  }
  /**
   * Lists all shared albums shown to a user in the 'Sharing' tab of the Google
   * Photos app. (sharedAlbums.listSharedAlbums)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A continuation token to get the next page of the
   * results. Adding this to the request will return the rows after the pageToken.
   * The pageToken should be the value returned in the nextPageToken parameter in
   * the response to the listSharedAlbums request.
   * @opt_param int pageSize Maximum number of albums to return in the response.
   * The default number of albums to return at a time is 20. The maximum page size
   * is 50.
   * @return Google_Service_PhotosLibrary_ListSharedAlbumsResponse
   */
  public function listSharedAlbums($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PhotosLibrary_ListSharedAlbumsResponse");
  }
}
