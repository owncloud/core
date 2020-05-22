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
 * The "exports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google_Service_Vault(...);
 *   $exports = $vaultService->exports;
 *  </code>
 */
class Google_Service_Vault_Resource_MattersExports extends Google_Service_Resource
{
  /**
   * Creates an Export. (exports.create)
   *
   * @param string $matterId The matter ID.
   * @param Google_Service_Vault_Export $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Export
   */
  public function create($matterId, Google_Service_Vault_Export $postBody, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Vault_Export");
  }
  /**
   * Deletes an Export. (exports.delete)
   *
   * @param string $matterId The matter ID.
   * @param string $exportId The export ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_VaultEmpty
   */
  public function delete($matterId, $exportId, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'exportId' => $exportId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Vault_VaultEmpty");
  }
  /**
   * Gets an Export. (exports.get)
   *
   * @param string $matterId The matter ID.
   * @param string $exportId The export ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vault_Export
   */
  public function get($matterId, $exportId, $optParams = array())
  {
    $params = array('matterId' => $matterId, 'exportId' => $exportId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Vault_Export");
  }
  /**
   * Lists Exports. (exports.listMattersExports)
   *
   * @param string $matterId The matter ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The pagination token as returned in the response.
   * @opt_param int pageSize The number of exports to return in the response.
   * @return Google_Service_Vault_ListExportsResponse
   */
  public function listMattersExports($matterId, $optParams = array())
  {
    $params = array('matterId' => $matterId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Vault_ListExportsResponse");
  }
}
