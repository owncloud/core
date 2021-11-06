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

use Google\Service\Books\Metadata;

/**
 * The "dictionary" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $dictionary = $booksService->dictionary;
 *  </code>
 */
class Dictionary extends \Google\Service\Resource
{
  /**
   * Returns a list of offline dictionary metadata available
   * (dictionary.listOfflineMetadata)
   *
   * @param string $cpksver The device/version ID from which to request the data.
   * @param array $optParams Optional parameters.
   * @return Metadata
   */
  public function listOfflineMetadata($cpksver, $optParams = [])
  {
    $params = ['cpksver' => $cpksver];
    $params = array_merge($params, $optParams);
    return $this->call('listOfflineMetadata', [$params], Metadata::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Dictionary::class, 'Google_Service_Books_Resource_Dictionary');
