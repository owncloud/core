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

use Google\Service\Vault\ListSavedQueriesResponse;
use Google\Service\Vault\SavedQuery;
use Google\Service\Vault\VaultEmpty;

/**
 * The "savedQueries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google\Service\Vault(...);
 *   $savedQueries = $vaultService->savedQueries;
 *  </code>
 */
class MattersSavedQueries extends \Google\Service\Resource
{
  /**
   * Creates a saved query. (savedQueries.create)
   *
   * @param string $matterId The ID of the matter to create the saved query in.
   * @param SavedQuery $postBody
   * @param array $optParams Optional parameters.
   * @return SavedQuery
   */
  public function create($matterId, SavedQuery $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SavedQuery::class);
  }
  /**
   * Deletes the specified saved query. (savedQueries.delete)
   *
   * @param string $matterId The ID of the matter to delete the saved query from.
   * @param string $savedQueryId ID of the saved query to delete.
   * @param array $optParams Optional parameters.
   * @return VaultEmpty
   */
  public function delete($matterId, $savedQueryId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'savedQueryId' => $savedQueryId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], VaultEmpty::class);
  }
  /**
   * Retrieves the specified saved query. (savedQueries.get)
   *
   * @param string $matterId The ID of the matter to get the saved query from.
   * @param string $savedQueryId ID of the saved query to retrieve.
   * @param array $optParams Optional parameters.
   * @return SavedQuery
   */
  public function get($matterId, $savedQueryId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'savedQueryId' => $savedQueryId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SavedQuery::class);
  }
  /**
   * Lists the saved queries in a matter. (savedQueries.listMattersSavedQueries)
   *
   * @param string $matterId The ID of the matter to get the saved queries for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of saved queries to return.
   * @opt_param string pageToken The pagination token as returned in the previous
   * response. An empty token means start from the beginning.
   * @return ListSavedQueriesResponse
   */
  public function listMattersSavedQueries($matterId, $optParams = [])
  {
    $params = ['matterId' => $matterId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSavedQueriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MattersSavedQueries::class, 'Google_Service_Vault_Resource_MattersSavedQueries');
