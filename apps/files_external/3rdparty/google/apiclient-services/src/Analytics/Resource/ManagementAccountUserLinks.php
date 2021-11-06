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

use Google\Service\Analytics\EntityUserLink;
use Google\Service\Analytics\EntityUserLinks;

/**
 * The "accountUserLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $accountUserLinks = $analyticsService->accountUserLinks;
 *  </code>
 */
class ManagementAccountUserLinks extends \Google\Service\Resource
{
  /**
   * Removes a user from the given account. (accountUserLinks.delete)
   *
   * @param string $accountId Account ID to delete the user link for.
   * @param string $linkId Link ID to delete the user link for.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $linkId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'linkId' => $linkId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Adds a new user to the given account. (accountUserLinks.insert)
   *
   * @param string $accountId Account ID to create the user link for.
   * @param EntityUserLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityUserLink
   */
  public function insert($accountId, EntityUserLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], EntityUserLink::class);
  }
  /**
   * Lists account-user links for a given account.
   * (accountUserLinks.listManagementAccountUserLinks)
   *
   * @param string $accountId Account ID to retrieve the user links for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of account-user links to
   * include in this response.
   * @opt_param int start-index An index of the first account-user link to
   * retrieve. Use this parameter as a pagination mechanism along with the max-
   * results parameter.
   * @return EntityUserLinks
   */
  public function listManagementAccountUserLinks($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], EntityUserLinks::class);
  }
  /**
   * Updates permissions for an existing user on the given account.
   * (accountUserLinks.update)
   *
   * @param string $accountId Account ID to update the account-user link for.
   * @param string $linkId Link ID to update the account-user link for.
   * @param EntityUserLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityUserLink
   */
  public function update($accountId, $linkId, EntityUserLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'linkId' => $linkId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], EntityUserLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementAccountUserLinks::class, 'Google_Service_Analytics_Resource_ManagementAccountUserLinks');
