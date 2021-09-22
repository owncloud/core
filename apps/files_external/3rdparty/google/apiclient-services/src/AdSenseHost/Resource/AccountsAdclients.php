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

namespace Google\Service\AdSenseHost\Resource;

use Google\Service\AdSenseHost\AdClient;
use Google\Service\AdSenseHost\AdClients;

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google\Service\AdSenseHost(...);
 *   $adclients = $adsensehostService->adclients;
 *  </code>
 */
class AccountsAdclients extends \Google\Service\Resource
{
  /**
   * Get information about one of the ad clients in the specified publisher's
   * AdSense account. (adclients.get)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client to get.
   * @param array $optParams Optional parameters.
   * @return AdClient
   */
  public function get($accountId, $adClientId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AdClient::class);
  }
  /**
   * List all hosted ad clients in the specified hosted account.
   * (adclients.listAccountsAdclients)
   *
   * @param string $accountId Account for which to list ad clients.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of ad clients to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through ad
   * clients. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return AdClients
   */
  public function listAccountsAdclients($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AdClients::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsAdclients::class, 'Google_Service_AdSenseHost_Resource_AccountsAdclients');
