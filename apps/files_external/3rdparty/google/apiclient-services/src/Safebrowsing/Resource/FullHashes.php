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

namespace Google\Service\Safebrowsing\Resource;

use Google\Service\Safebrowsing\GoogleSecuritySafebrowsingV4FindFullHashesRequest;
use Google\Service\Safebrowsing\GoogleSecuritySafebrowsingV4FindFullHashesResponse;

/**
 * The "fullHashes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $safebrowsingService = new Google\Service\Safebrowsing(...);
 *   $fullHashes = $safebrowsingService->fullHashes;
 *  </code>
 */
class FullHashes extends \Google\Service\Resource
{
  /**
   * Finds the full hashes that match the requested hash prefixes.
   * (fullHashes.find)
   *
   * @param GoogleSecuritySafebrowsingV4FindFullHashesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleSecuritySafebrowsingV4FindFullHashesResponse
   */
  public function find(GoogleSecuritySafebrowsingV4FindFullHashesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('find', [$params], GoogleSecuritySafebrowsingV4FindFullHashesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FullHashes::class, 'Google_Service_Safebrowsing_Resource_FullHashes');
