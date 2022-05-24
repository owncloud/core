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

use Google\Service\AdSenseHost\AdCode;
use Google\Service\AdSenseHost\AdUnit;
use Google\Service\AdSenseHost\AdUnits;

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google\Service\AdSenseHost(...);
 *   $adunits = $adsensehostService->adunits;
 *  </code>
 */
class AccountsAdunits extends \Google\Service\Resource
{
  /**
   * Delete the specified ad unit from the specified publisher AdSense account.
   * (adunits.delete)
   *
   * @param string $accountId Account which contains the ad unit.
   * @param string $adClientId Ad client for which to get ad unit.
   * @param string $adUnitId Ad unit to delete.
   * @param array $optParams Optional parameters.
   * @return AdUnit
   */
  public function delete($accountId, $adClientId, $adUnitId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AdUnit::class);
  }
  /**
   * Get the specified host ad unit in this AdSense account. (adunits.get)
   *
   * @param string $accountId Account which contains the ad unit.
   * @param string $adClientId Ad client for which to get ad unit.
   * @param string $adUnitId Ad unit to get.
   * @param array $optParams Optional parameters.
   * @return AdUnit
   */
  public function get($accountId, $adClientId, $adUnitId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AdUnit::class);
  }
  /**
   * Get ad code for the specified ad unit, attaching the specified host custom
   * channels. (adunits.getAdCode)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client with contains the ad unit.
   * @param string $adUnitId Ad unit to get the code for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hostCustomChannelId Host custom channel to attach to the ad
   * code.
   * @return AdCode
   */
  public function getAdCode($accountId, $adClientId, $adUnitId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
    $params = array_merge($params, $optParams);
    return $this->call('getAdCode', [$params], AdCode::class);
  }
  /**
   * Insert the supplied ad unit into the specified publisher AdSense account.
   * (adunits.insert)
   *
   * @param string $accountId Account which will contain the ad unit.
   * @param string $adClientId Ad client into which to insert the ad unit.
   * @param AdUnit $postBody
   * @param array $optParams Optional parameters.
   * @return AdUnit
   */
  public function insert($accountId, $adClientId, AdUnit $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], AdUnit::class);
  }
  /**
   * List all ad units in the specified publisher's AdSense account.
   * (adunits.listAccountsAdunits)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client for which to list ad units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive Whether to include inactive ad units.
   * Default: true.
   * @opt_param string maxResults The maximum number of ad units to include in the
   * response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through ad
   * units. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return AdUnits
   */
  public function listAccountsAdunits($accountId, $adClientId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AdUnits::class);
  }
  /**
   * Update the supplied ad unit in the specified publisher AdSense account. This
   * method supports patch semantics. (adunits.patch)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client which contains the ad unit.
   * @param string $adUnitId Ad unit to get.
   * @param AdUnit $postBody
   * @param array $optParams Optional parameters.
   * @return AdUnit
   */
  public function patch($accountId, $adClientId, $adUnitId, AdUnit $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], AdUnit::class);
  }
  /**
   * Update the supplied ad unit in the specified publisher AdSense account.
   * (adunits.update)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client which contains the ad unit.
   * @param AdUnit $postBody
   * @param array $optParams Optional parameters.
   * @return AdUnit
   */
  public function update($accountId, $adClientId, AdUnit $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], AdUnit::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsAdunits::class, 'Google_Service_AdSenseHost_Resource_AccountsAdunits');
