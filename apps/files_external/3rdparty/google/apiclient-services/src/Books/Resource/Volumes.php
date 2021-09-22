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

use Google\Service\Books\Volume;
use Google\Service\Books\Volumes as VolumesModel;

/**
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $volumes = $booksService->volumes;
 *  </code>
 */
class Volumes extends \Google\Service\Resource
{
  /**
   * Gets volume information for a single volume. (volumes.get)
   *
   * @param string $volumeId ID of volume to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string country ISO-3166-1 code to override the IP-based location.
   * @opt_param bool includeNonComicsSeries Set to true to include non-comics
   * series. Defaults to false.
   * @opt_param string partner Brand results for partner ID.
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string source string to identify the originator of this request.
   * @opt_param bool user_library_consistent_read
   * @return Volume
   */
  public function get($volumeId, $optParams = [])
  {
    $params = ['volumeId' => $volumeId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Volume::class);
  }
  /**
   * Performs a book search. (volumes.listVolumes)
   *
   * @param string $q Full-text search query string.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string download Restrict to volumes by download availability.
   * @opt_param string filter Filter search results.
   * @opt_param string langRestrict Restrict results to books with this language
   * code.
   * @opt_param string libraryRestrict Restrict search to this user's library.
   * @opt_param string maxAllowedMaturityRating The maximum allowed maturity
   * rating of returned recommendations. Books with a higher maturity rating are
   * filtered out.
   * @opt_param string maxResults Maximum number of results to return.
   * @opt_param string orderBy Sort search results.
   * @opt_param string partner Restrict and brand results for partner ID.
   * @opt_param string printType Restrict to books or magazines.
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param bool showPreorders Set to true to show books available for
   * preorder. Defaults to false.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string startIndex Index of the first result to return (starts at
   * 0)
   * @return VolumesModel
   */
  public function listVolumes($q, $optParams = [])
  {
    $params = ['q' => $q];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VolumesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Volumes::class, 'Google_Service_Books_Resource_Volumes');
