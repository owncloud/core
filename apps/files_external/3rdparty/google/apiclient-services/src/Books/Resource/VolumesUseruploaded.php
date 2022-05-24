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

namespace Google\Service\Books\Resource;

use Google\Service\Books\Volumes as VolumesModel;

/**
 * The "useruploaded" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $useruploaded = $booksService->useruploaded;
 *  </code>
 */
class VolumesUseruploaded extends \Google\Service\Resource
{
  /**
   * Return a list of books uploaded by the current user.
   * (useruploaded.listVolumesUseruploaded)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
   * 'en_US'. Used for generating recommendations.
   * @opt_param string maxResults Maximum number of results to return.
   * @opt_param string processingState The processing state of the user uploaded
   * volumes to be returned.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string startIndex Index of the first result to return (starts at
   * 0)
   * @opt_param string volumeId The ids of the volumes to be returned. If not
   * specified all that match the processingState are returned.
   * @return Volumes
   */
  public function listVolumesUseruploaded($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VolumesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumesUseruploaded::class, 'Google_Service_Books_Resource_VolumesUseruploaded');
