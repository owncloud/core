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

namespace Google\Service\Vault\Resource;

use Google\Service\Vault\Export;
use Google\Service\Vault\ListExportsResponse;
use Google\Service\Vault\VaultEmpty;

/**
 * The "exports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google\Service\Vault(...);
 *   $exports = $vaultService->exports;
 *  </code>
 */
class MattersExports extends \Google\Service\Resource
{
  /**
   * Creates an export. (exports.create)
   *
   * @param string $matterId The matter ID.
   * @param Export $postBody
   * @param array $optParams Optional parameters.
   * @return Export
   */
  public function create($matterId, Export $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Export::class);
  }
  /**
   * Deletes an export. (exports.delete)
   *
   * @param string $matterId The matter ID.
   * @param string $exportId The export ID.
   * @param array $optParams Optional parameters.
   * @return VaultEmpty
   */
  public function delete($matterId, $exportId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'exportId' => $exportId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], VaultEmpty::class);
  }
  /**
   * Gets an export. (exports.get)
   *
   * @param string $matterId The matter ID.
   * @param string $exportId The export ID.
   * @param array $optParams Optional parameters.
   * @return Export
   */
  public function get($matterId, $exportId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'exportId' => $exportId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Export::class);
  }
  /**
   * Lists details about the exports in the specified matter.
   * (exports.listMattersExports)
   *
   * @param string $matterId The matter ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of exports to return in the response.
   * @opt_param string pageToken The pagination token as returned in the response.
   * @return ListExportsResponse
   */
  public function listMattersExports($matterId, $optParams = [])
  {
    $params = ['matterId' => $matterId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListExportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MattersExports::class, 'Google_Service_Vault_Resource_MattersExports');
