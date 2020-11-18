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
 * The "customBiddingAlgorithms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $customBiddingAlgorithms = $displayvideoService->customBiddingAlgorithms;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_CustomBiddingAlgorithms extends Google_Service_Resource
{
  /**
   * Gets a custom bidding algorithm. (customBiddingAlgorithms.get)
   *
   * @param string $customBiddingAlgorithmId Required. The ID of the custom
   * bidding algorithm to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the DV360 partner that has access to
   * the custom bidding algorithm.
   * @opt_param string advertiserId The ID of the DV360 partner that has access to
   * the custom bidding algorithm.
   * @return Google_Service_DisplayVideo_CustomBiddingAlgorithm
   */
  public function get($customBiddingAlgorithmId, $optParams = array())
  {
    $params = array('customBiddingAlgorithmId' => $customBiddingAlgorithmId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_CustomBiddingAlgorithm");
  }
  /**
   * Lists custom bidding algorithms that are accessible to the current user and
   * can be used in bidding stratgies. The order is defined by the order_by
   * parameter. (customBiddingAlgorithms.listCustomBiddingAlgorithms)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix "desc" should be added to the
   * field name. Example: `displayName desc`.
   * @opt_param string advertiserId The ID of the DV360 advertiser that has access
   * to the custom bidding algorithm.
   * @opt_param string partnerId The ID of the DV360 partner that has access to
   * the custom bidding algorithm.
   * @opt_param string filter Allows filtering by custom bidding algorithm fields.
   * Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by `AND`. A sequence of
   * restrictions * implicitly uses `AND`. * A restriction has the form of
   * `{field} {operator} {value}`. * The operator must be `CONTAINS (:)` or
   * `EQUALS (=)`. * The operator must be `CONTAINS (:)` for the following field:
   * - `displayName` * The operator must be `EQUALS (=)` for the following field:
   * - `customBiddingAlgorithmType` * For `displayName`, the value is a string. We
   * return all custom bidding algorithms whose display_name contains such string.
   * * For `customBiddingAlgorithmType`, the value is a string. We return all
   * algorithms whose custom_bidding_algorithm_type is equal to the given type.
   * Examples: * All custom bidding algorithms for which the display name contains
   * "politics": `displayName:politics`. * All custom bidding algorithms for which
   * the type is "SCRIPT_BASED": `customBiddingAlgorithmType=SCRIPT_BASED` The
   * length of this field should be no more than 500 characters.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListCustomBiddingAlgorithms` method. If not specified,
   * the first page of results will be returned.
   * @return Google_Service_DisplayVideo_ListCustomBiddingAlgorithmsResponse
   */
  public function listCustomBiddingAlgorithms($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListCustomBiddingAlgorithmsResponse");
  }
}
