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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\Filter;
use Google\Service\Analytics\Filters;

/**
 * The "filters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $filters = $analyticsService->filters;
 *  </code>
 */
class ManagementFilters extends \Google\Service\Resource
{
  /**
   * Delete a filter. (filters.delete)
   *
   * @param string $accountId Account ID to delete the filter for.
   * @param string $filterId ID of the filter to be deleted.
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function delete($accountId, $filterId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'filterId' => $filterId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Filter::class);
  }
  /**
   * Returns filters to which the user has access. (filters.get)
   *
   * @param string $accountId Account ID to retrieve filters for.
   * @param string $filterId Filter ID to retrieve filters for.
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function get($accountId, $filterId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'filterId' => $filterId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Filter::class);
  }
  /**
   * Create a new filter. (filters.insert)
   *
   * @param string $accountId Account ID to create filter for.
   * @param Filter $postBody
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function insert($accountId, Filter $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Filter::class);
  }
  /**
   * Lists all filters for an account (filters.listManagementFilters)
   *
   * @param string $accountId Account ID to retrieve filters for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of filters to include in this
   * response.
   * @opt_param int start-index An index of the first entity to retrieve. Use this
   * parameter as a pagination mechanism along with the max-results parameter.
   * @return Filters
   */
  public function listManagementFilters($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Filters::class);
  }
  /**
   * Updates an existing filter. This method supports patch semantics.
   * (filters.patch)
   *
   * @param string $accountId Account ID to which the filter belongs.
   * @param string $filterId ID of the filter to be updated.
   * @param Filter $postBody
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function patch($accountId, $filterId, Filter $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'filterId' => $filterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Filter::class);
  }
  /**
   * Updates an existing filter. (filters.update)
   *
   * @param string $accountId Account ID to which the filter belongs.
   * @param string $filterId ID of the filter to be updated.
   * @param Filter $postBody
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function update($accountId, $filterId, Filter $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'filterId' => $filterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Filter::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementFilters::class, 'Google_Service_Analytics_Resource_ManagementFilters');
