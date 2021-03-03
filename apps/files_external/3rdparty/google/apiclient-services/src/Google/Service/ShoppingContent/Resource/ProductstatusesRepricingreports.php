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

/**
 * The "repricingreports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $repricingreports = $contentService->repricingreports;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_ProductstatusesRepricingreports extends Google_Service_Resource
{
  /**
   * Lists the metrics report for a given Repricing product.
   * (repricingreports.listProductstatusesRepricingreports)
   *
   * @param string $merchantId Required. Id of the merchant who owns the Repricing
   * rule.
   * @param string $productId Required. Id of the Repricing product. Also known as
   * the [REST_ID](https://developers.google.com/shopping-
   * content/reference/rest/v2.1/products#Product.FIELDS.id)
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate Gets Repricing reports on and before this date in
   * the merchant's timezone. You can only retrieve data up to 7 days ago
   * (default) or earlier. Format is YYYY-MM-DD.
   * @opt_param int pageSize Maximum number of days of reports to return. There
   * can be more than one rule report returned per day. For example, if 3 rule
   * types got applied to the same product within a 24-hour period, then a
   * page_size of 1 will return 3 rule reports. The page size defaults to 50 and
   * values above 1000 are coerced to 1000. This service may return fewer days of
   * reports than this value, for example, if the time between your start and end
   * date is less than the page size.
   * @opt_param string pageToken Token (if provided) to retrieve the subsequent
   * page. All other parameters must match the original call that provided the
   * page token.
   * @opt_param string ruleId Id of the Repricing rule. If specified, only gets
   * this rule's reports.
   * @opt_param string startDate Gets Repricing reports on and after this date in
   * the merchant's timezone, up to one year ago. Do not use a start date later
   * than 7 days ago (default). Format is YYYY-MM-DD.
   * @return Google_Service_ShoppingContent_ListRepricingProductReportsResponse
   */
  public function listProductstatusesRepricingreports($merchantId, $productId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'productId' => $productId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ListRepricingProductReportsResponse");
  }
}
