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
 * The "firstAndThirdPartyAudiences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $firstAndThirdPartyAudiences = $displayvideoService->firstAndThirdPartyAudiences;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_FirstAndThirdPartyAudiences extends Google_Service_Resource
{
  /**
   * Gets a first and third party audience. (firstAndThirdPartyAudiences.get)
   *
   * @param string $firstAndThirdPartyAudienceId Required. The ID of the first and
   * third party audience to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the fetched first and third party audience.
   * @opt_param string partnerId The ID of the partner that has access to the
   * fetched first and third party audience.
   * @return Google_Service_DisplayVideo_FirstAndThirdPartyAudience
   */
  public function get($firstAndThirdPartyAudienceId, $optParams = array())
  {
    $params = array('firstAndThirdPartyAudienceId' => $firstAndThirdPartyAudienceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_FirstAndThirdPartyAudience");
  }
  /**
   * Lists first and third party audiences.
   *
   * The order is defined by the order_by parameter.
   * (firstAndThirdPartyAudiences.listFirstAndThirdPartyAudiences)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by first and third party audience
   * fields.
   *
   * Supported syntax:
   *
   * * Filter expressions for first and third party audiences currently can only
   * contain at most one restriction. * A restriction has the form of `{field}
   * {operator} {value}`. * The operator must be `CONTAINS (:)`. * Supported
   * fields:     - `displayName`
   *
   * Examples:
   *
   * * All first and third party audiences for which the display name contains
   * "Google": `displayName : "Google"`.
   *
   * The length of this field should be no more than 500 characters.
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the fetched first and third party audiences.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string partnerId The ID of the partner that has access to the
   * fetched first and third party audiences.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListFirstAndThirdPartyAudiences` method. If not
   * specified, the first page of results will be returned.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are:
   *
   * * `firstAndThirdPartyAudienceId` (default) * `displayName`
   *
   * The default sorting order is ascending. To specify descending order for a
   * field, a suffix "desc" should be added to the field name. Example:
   * `displayName desc`.
   * @return Google_Service_DisplayVideo_ListFirstAndThirdPartyAudiencesResponse
   */
  public function listFirstAndThirdPartyAudiences($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListFirstAndThirdPartyAudiencesResponse");
  }
}
