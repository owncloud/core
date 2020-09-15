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
 * The "items" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_CloudSearch(...);
 *   $items = $cloudsearchService->items;
 *  </code>
 */
class Google_Service_CloudSearch_Resource_DebugDatasourcesItems extends Google_Service_Resource
{
  /**
   * Checks whether an item is accessible by specified principal. **Note:** This
   * API requires an admin account to execute. (items.checkAccess)
   *
   * @param string $name Item name, format:
   * datasources/{source_id}/items/{item_id}
   * @param Google_Service_CloudSearch_Principal $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Google_Service_CloudSearch_CheckAccessResponse
   */
  public function checkAccess($name, Google_Service_CloudSearch_Principal $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('checkAccess', array($params), "Google_Service_CloudSearch_CheckAccessResponse");
  }
  /**
   * Fetches the item whose viewUrl exactly matches that of the URL provided in
   * the request. **Note:** This API requires an admin account to execute.
   * (items.searchByViewUrl)
   *
   * @param string $name Source name, format: datasources/{source_id}
   * @param Google_Service_CloudSearch_SearchItemsByViewUrlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_SearchItemsByViewUrlResponse
   */
  public function searchByViewUrl($name, Google_Service_CloudSearch_SearchItemsByViewUrlRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('searchByViewUrl', array($params), "Google_Service_CloudSearch_SearchItemsByViewUrlResponse");
  }
}
