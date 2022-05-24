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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\ListInvoicesResponse;
use Google\Service\DisplayVideo\LookupInvoiceCurrencyResponse;

/**
 * The "invoices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $invoices = $displayvideoService->invoices;
 *  </code>
 */
class AdvertisersInvoices extends \Google\Service\Resource
{
  /**
   * Lists invoices posted for an advertiser in a given month. Invoices generated
   * by billing profiles with a "Partner" invoice level are not retrievable
   * through this method. (invoices.listAdvertisersInvoices)
   *
   * @param string $advertiserId Required. The ID of the advertiser to list
   * invoices for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string issueMonth The month to list the invoices for. If not set,
   * the request will retrieve invoices for the previous month. Must be in the
   * format YYYYMM.
   * @opt_param string loiSapinInvoiceType Select type of invoice to retrieve for
   * Loi Sapin advertisers. Only applicable to Loi Sapin advertisers. Will be
   * ignored otherwise.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListInvoices` method. If not specified, the first page
   * of results will be returned.
   * @return ListInvoicesResponse
   */
  public function listAdvertisersInvoices($advertiserId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInvoicesResponse::class);
  }
  /**
   * Retrieves the invoice currency used by an advertiser in a given month.
   * (invoices.lookupInvoiceCurrency)
   *
   * @param string $advertiserId Required. The ID of the advertiser to lookup
   * currency for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string invoiceMonth Month for which the currency is needed. If not
   * set, the request will return existing currency settings for the advertiser.
   * Must be in the format YYYYMM.
   * @return LookupInvoiceCurrencyResponse
   */
  public function lookupInvoiceCurrency($advertiserId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('lookupInvoiceCurrency', [$params], LookupInvoiceCurrencyResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersInvoices::class, 'Google_Service_DisplayVideo_Resource_AdvertisersInvoices');
