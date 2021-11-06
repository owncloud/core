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

namespace Google\Service\AdExchangeBuyer\Resource;

use Google\Service\AdExchangeBuyer\BillingInfo as BillingInfoModel;
use Google\Service\AdExchangeBuyer\BillingInfoList;

/**
 * The "billingInfo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $billingInfo = $adexchangebuyerService->billingInfo;
 *  </code>
 */
class BillingInfo extends \Google\Service\Resource
{
  /**
   * Returns the billing information for one account specified by account ID.
   * (billingInfo.get)
   *
   * @param int $accountId The account id.
   * @param array $optParams Optional parameters.
   * @return BillingInfoModel
   */
  public function get($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BillingInfoModel::class);
  }
  /**
   * Retrieves a list of billing information for all accounts of the authenticated
   * user. (billingInfo.listBillingInfo)
   *
   * @param array $optParams Optional parameters.
   * @return BillingInfoList
   */
  public function listBillingInfo($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BillingInfoList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingInfo::class, 'Google_Service_AdExchangeBuyer_Resource_BillingInfo');
