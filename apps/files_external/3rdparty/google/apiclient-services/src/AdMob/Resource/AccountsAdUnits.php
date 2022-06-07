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

namespace Google\Service\AdMob\Resource;

use Google\Service\AdMob\ListAdUnitsResponse;

/**
 * The "adUnits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $admobService = new Google\Service\AdMob(...);
 *   $adUnits = $admobService->adUnits;
 *  </code>
 */
class AccountsAdUnits extends \Google\Service\Resource
{
  /**
   * List the ad units under the specified AdMob account.
   * (adUnits.listAccountsAdUnits)
   *
   * @param string $parent Required. Resource name of the account to list ad units
   * for. Example: accounts/pub-9876543210987654
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of ad units to return. If
   * unspecified or 0, at most 10,000 ad units will be returned. The maximum value
   * is 20,000; values above 20,000 will be coerced to 20,000.
   * @opt_param string pageToken The value returned by the last
   * `ListAdUnitsResponse`; indicates that this is a continuation of a prior
   * `ListAdUnits` call, and that the system should return the next page of data.
   * @return ListAdUnitsResponse
   */
  public function listAccountsAdUnits($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAdUnitsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsAdUnits::class, 'Google_Service_AdMob_Resource_AccountsAdUnits');
