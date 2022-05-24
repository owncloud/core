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

namespace Google\Service\Gmail\Resource;

use Google\Service\Gmail\Filter;
use Google\Service\Gmail\ListFiltersResponse;

/**
 * The "filters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $filters = $gmailService->filters;
 *  </code>
 */
class UsersSettingsFilters extends \Google\Service\Resource
{
  /**
   * Creates a filter. Note: you can only create a maximum of 1,000 filters.
   * (filters.create)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Filter $postBody
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function create($userId, Filter $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Filter::class);
  }
  /**
   * Immediately and permanently deletes the specified filter. (filters.delete)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the filter to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a filter. (filters.get)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the filter to be fetched.
   * @param array $optParams Optional parameters.
   * @return Filter
   */
  public function get($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Filter::class);
  }
  /**
   * Lists the message filters of a Gmail user. (filters.listUsersSettingsFilters)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return ListFiltersResponse
   */
  public function listUsersSettingsFilters($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFiltersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersSettingsFilters::class, 'Google_Service_Gmail_Resource_UsersSettingsFilters');
