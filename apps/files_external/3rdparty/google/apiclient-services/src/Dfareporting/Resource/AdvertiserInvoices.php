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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\AdvertiserInvoicesListResponse;

/**
 * The "advertiserInvoices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $advertiserInvoices = $dfareportingService->advertiserInvoices;
 *  </code>
 */
class AdvertiserInvoices extends \Google\Service\Resource
{
  /**
   * Retrieves a list of invoices for a particular issue month. The api only works
   * if the billing profile invoice level is set to either advertiser or campaign
   * non-consolidated invoice level. (advertiserInvoices.listAdvertiserInvoices)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $advertiserId Advertiser ID of this invoice.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string issueMonth Month for which invoices are needed in the
   * format YYYYMM. Required field
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @return AdvertiserInvoicesListResponse
   */
  public function listAdvertiserInvoices($profileId, $advertiserId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AdvertiserInvoicesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertiserInvoices::class, 'Google_Service_Dfareporting_Resource_AdvertiserInvoices');
