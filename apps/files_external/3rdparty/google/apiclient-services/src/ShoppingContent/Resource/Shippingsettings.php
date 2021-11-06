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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\ShippingSettings as ShippingSettingsModel;
use Google\Service\ShoppingContent\ShippingsettingsCustomBatchRequest;
use Google\Service\ShoppingContent\ShippingsettingsCustomBatchResponse;
use Google\Service\ShoppingContent\ShippingsettingsGetSupportedCarriersResponse;
use Google\Service\ShoppingContent\ShippingsettingsGetSupportedHolidaysResponse;
use Google\Service\ShoppingContent\ShippingsettingsGetSupportedPickupServicesResponse;
use Google\Service\ShoppingContent\ShippingsettingsListResponse;

/**
 * The "shippingsettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $shippingsettings = $contentService->shippingsettings;
 *  </code>
 */
class Shippingsettings extends \Google\Service\Resource
{
  /**
   * Retrieves and updates the shipping settings of multiple accounts in a single
   * request. (shippingsettings.custombatch)
   *
   * @param ShippingsettingsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ShippingsettingsCustomBatchResponse
   */
  public function custombatch(ShippingsettingsCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], ShippingsettingsCustomBatchResponse::class);
  }
  /**
   * Retrieves the shipping settings of the account. (shippingsettings.get)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account for which to get/update
   * shipping settings.
   * @param array $optParams Optional parameters.
   * @return ShippingSettingsModel
   */
  public function get($merchantId, $accountId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ShippingSettingsModel::class);
  }
  /**
   * Retrieves supported carriers and carrier services for an account.
   * (shippingsettings.getsupportedcarriers)
   *
   * @param string $merchantId The ID of the account for which to retrieve the
   * supported carriers.
   * @param array $optParams Optional parameters.
   * @return ShippingsettingsGetSupportedCarriersResponse
   */
  public function getsupportedcarriers($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('getsupportedcarriers', [$params], ShippingsettingsGetSupportedCarriersResponse::class);
  }
  /**
   * Retrieves supported holidays for an account.
   * (shippingsettings.getsupportedholidays)
   *
   * @param string $merchantId The ID of the account for which to retrieve the
   * supported holidays.
   * @param array $optParams Optional parameters.
   * @return ShippingsettingsGetSupportedHolidaysResponse
   */
  public function getsupportedholidays($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('getsupportedholidays', [$params], ShippingsettingsGetSupportedHolidaysResponse::class);
  }
  /**
   * Retrieves supported pickup services for an account.
   * (shippingsettings.getsupportedpickupservices)
   *
   * @param string $merchantId The ID of the account for which to retrieve the
   * supported pickup services.
   * @param array $optParams Optional parameters.
   * @return ShippingsettingsGetSupportedPickupServicesResponse
   */
  public function getsupportedpickupservices($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('getsupportedpickupservices', [$params], ShippingsettingsGetSupportedPickupServicesResponse::class);
  }
  /**
   * Lists the shipping settings of the sub-accounts in your Merchant Center
   * account. (shippingsettings.listShippingsettings)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of shipping settings to
   * return in the response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return ShippingsettingsListResponse
   */
  public function listShippingsettings($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ShippingsettingsListResponse::class);
  }
  /**
   * Updates the shipping settings of the account. Any fields that are not
   * provided are deleted from the resource. (shippingsettings.update)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account for which to get/update
   * shipping settings.
   * @param ShippingSettingsModel $postBody
   * @param array $optParams Optional parameters.
   * @return ShippingSettingsModel
   */
  public function update($merchantId, $accountId, ShippingSettingsModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ShippingSettingsModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Shippingsettings::class, 'Google_Service_ShoppingContent_Resource_Shippingsettings');
