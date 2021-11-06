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

namespace Google\Service\CloudSearch\Resource;

use Google\Service\CloudSearch\CheckAccessResponse;
use Google\Service\CloudSearch\Principal;
use Google\Service\CloudSearch\SearchItemsByViewUrlRequest;
use Google\Service\CloudSearch\SearchItemsByViewUrlResponse;

/**
 * The "items" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $items = $cloudsearchService->items;
 *  </code>
 */
class DebugDatasourcesItems extends \Google\Service\Resource
{
  /**
   * Checks whether an item is accessible by specified principal. **Note:** This
   * API requires an admin account to execute. (items.checkAccess)
   *
   * @param string $name Item name, format:
   * datasources/{source_id}/items/{item_id}
   * @param Principal $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return CheckAccessResponse
   */
  public function checkAccess($name, Principal $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkAccess', [$params], CheckAccessResponse::class);
  }
  /**
   * Fetches the item whose viewUrl exactly matches that of the URL provided in
   * the request. **Note:** This API requires an admin account to execute.
   * (items.searchByViewUrl)
   *
   * @param string $name Source name, format: datasources/{source_id}
   * @param SearchItemsByViewUrlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchItemsByViewUrlResponse
   */
  public function searchByViewUrl($name, SearchItemsByViewUrlRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('searchByViewUrl', [$params], SearchItemsByViewUrlResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DebugDatasourcesItems::class, 'Google_Service_CloudSearch_Resource_DebugDatasourcesItems');
