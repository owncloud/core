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

namespace Google\Service\StreetViewPublish\Resource;

use Google\Service\StreetViewPublish\BatchDeletePhotosRequest;
use Google\Service\StreetViewPublish\BatchDeletePhotosResponse;
use Google\Service\StreetViewPublish\BatchGetPhotosResponse;
use Google\Service\StreetViewPublish\BatchUpdatePhotosRequest;
use Google\Service\StreetViewPublish\BatchUpdatePhotosResponse;
use Google\Service\StreetViewPublish\ListPhotosResponse;

/**
 * The "photos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $streetviewpublishService = new Google\Service\StreetViewPublish(...);
 *   $photos = $streetviewpublishService->photos;
 *  </code>
 */
class Photos extends \Google\Service\Resource
{
  /**
   * Deletes a list of Photos and their metadata. Note that if BatchDeletePhotos
   * fails, either critical fields are missing or there is an authentication
   * error. Even if BatchDeletePhotos succeeds, individual photos in the batch may
   * have failures. These failures are specified in each PhotoResponse.status in
   * BatchDeletePhotosResponse.results. See DeletePhoto for specific failures that
   * can occur per photo. (photos.batchDelete)
   *
   * @param BatchDeletePhotosRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchDeletePhotosResponse
   */
  public function batchDelete(BatchDeletePhotosRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], BatchDeletePhotosResponse::class);
  }
  /**
   * Gets the metadata of the specified Photo batch. Note that if BatchGetPhotos
   * fails, either critical fields are missing or there is an authentication
   * error. Even if BatchGetPhotos succeeds, individual photos in the batch may
   * have failures. These failures are specified in each PhotoResponse.status in
   * BatchGetPhotosResponse.results. See GetPhoto for specific failures that can
   * occur per photo. (photos.batchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The BCP-47 language code, such as "en-US" or
   * "sr-Latn". For more information, see
   * http://www.unicode.org/reports/tr35/#Unicode_locale_identifier. If
   * language_code is unspecified, the user's language preference for Google
   * services is used.
   * @opt_param string photoIds Required. IDs of the Photos. For HTTP GET
   * requests, the URL query parameter should be `photoIds==&...`.
   * @opt_param string view Required. Specifies if a download URL for the photo
   * bytes should be returned in the Photo response.
   * @return BatchGetPhotosResponse
   */
  public function batchGet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetPhotosResponse::class);
  }
  /**
   * Updates the metadata of Photos, such as pose, place association, connections,
   * etc. Changing the pixels of photos is not supported. Note that if
   * BatchUpdatePhotos fails, either critical fields are missing or there is an
   * authentication error. Even if BatchUpdatePhotos succeeds, individual photos
   * in the batch may have failures. These failures are specified in each
   * PhotoResponse.status in BatchUpdatePhotosResponse.results. See UpdatePhoto
   * for specific failures that can occur per photo. Only the fields specified in
   * updateMask field are used. If `updateMask` is not present, the update applies
   * to all fields. The number of UpdatePhotoRequest messages in a
   * BatchUpdatePhotosRequest must not exceed 20. > Note: To update Pose.altitude,
   * Pose.latLngPair has to be filled as well. Otherwise, the request will fail.
   * (photos.batchUpdate)
   *
   * @param BatchUpdatePhotosRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdatePhotosResponse
   */
  public function batchUpdate(BatchUpdatePhotosRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], BatchUpdatePhotosResponse::class);
  }
  /**
   * Lists all the Photos that belong to the user. > Note: Recently created photos
   * that are still being indexed are not returned in the response.
   * (photos.listPhotos)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter expression. For example:
   * `placeId=ChIJj61dQgK6j4AR4GeTYWZsKWw`. The filters supported at the moment
   * are: `placeId`.
   * @opt_param string languageCode Optional. The BCP-47 language code, such as
   * "en-US" or "sr-Latn". For more information, see
   * http://www.unicode.org/reports/tr35/#Unicode_locale_identifier. If
   * language_code is unspecified, the user's language preference for Google
   * services is used.
   * @opt_param int pageSize Optional. The maximum number of photos to return.
   * `pageSize` must be non-negative. If `pageSize` is zero or is not provided,
   * the default page size of 100 is used. The number of photos returned in the
   * response may be less than `pageSize` if the number of photos that belong to
   * the user is less than `pageSize`.
   * @opt_param string pageToken Optional. The nextPageToken value returned from a
   * previous ListPhotos request, if any.
   * @opt_param string view Required. Specifies if a download URL for the photos
   * bytes should be returned in the Photos response.
   * @return ListPhotosResponse
   */
  public function listPhotos($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPhotosResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Photos::class, 'Google_Service_StreetViewPublish_Resource_Photos');
