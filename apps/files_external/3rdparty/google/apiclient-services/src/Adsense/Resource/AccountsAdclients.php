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

namespace Google\Service\Adsense\Resource;

use Google\Service\Adsense\AdClientAdCode;
use Google\Service\Adsense\ListAdClientsResponse;

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google\Service\Adsense(...);
 *   $adclients = $adsenseService->adclients;
 *  </code>
 */
class AccountsAdclients extends \Google\Service\Resource
{
  /**
   * Gets the AdSense code for a given ad client. This returns what was previously
   * known as the 'auto ad code'. This is only supported for ad clients with a
   * product_code of AFC. For more information, see [About the AdSense
   * code](https://support.google.com/adsense/answer/9274634).
   * (adclients.getAdcode)
   *
   * @param string $name Required. Name of the ad client for which to get the
   * adcode. Format: accounts/{account}/adclients/{adclient}
   * @param array $optParams Optional parameters.
   * @return AdClientAdCode
   */
  public function getAdcode($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getAdcode', [$params], AdClientAdCode::class);
  }
  /**
   * Lists all the ad clients available in an account.
   * (adclients.listAccountsAdclients)
   *
   * @param string $parent Required. The account which owns the collection of ad
   * clients. Format: accounts/{account}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of ad clients to include in the
   * response, used for paging. If unspecified, at most 10000 ad clients will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListAdClients` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAdClients` must match the
   * call that provided the page token.
   * @return ListAdClientsResponse
   */
  public function listAccountsAdclients($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAdClientsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsAdclients::class, 'Google_Service_Adsense_Resource_AccountsAdclients');
