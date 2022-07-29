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

use Google\Service\StreetViewPublish\ListPhotoSequencesResponse;

/**
 * The "photoSequences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $streetviewpublishService = new Google\Service\StreetViewPublish(...);
 *   $photoSequences = $streetviewpublishService->photoSequences;
 *  </code>
 */
class PhotoSequences extends \Google\Service\Resource
{
  /**
   * Lists all the PhotoSequences that belong to the user, in descending
   * CreatePhotoSequence timestamp order. (photoSequences.listPhotoSequences)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter expression. For example:
   * `imagery_type=SPHERICAL`. The filters supported are: `imagery_type`,
   * `processing_state`, `min_latitude`, `max_latitude`, `min_longitude`,
   * `max_longitude`, and `filename_query`. See https://google.aip.dev/160 for
   * more information. Filename queries should sent as a Phrase in order to
   * support multple words and special characters by adding escaped quotes. Ex:
   * filename_query="example of a phrase.mp4"
   * @opt_param int pageSize Optional. The maximum number of photo sequences to
   * return. `pageSize` must be non-negative. If `pageSize` is zero or is not
   * provided, the default page size of 100 is used. The number of photo sequences
   * returned in the response may be less than `pageSize` if the number of matches
   * is less than `pageSize`. This is currently unimplemented but is in process.
   * @opt_param string pageToken Optional. The nextPageToken value returned from a
   * previous ListPhotoSequences request, if any.
   * @return ListPhotoSequencesResponse
   */
  public function listPhotoSequences($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPhotoSequencesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotoSequences::class, 'Google_Service_StreetViewPublish_Resource_PhotoSequences');
