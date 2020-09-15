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
 * The "targetingOptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $targetingOptions = $displayvideoService->targetingOptions;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_TargetingTypesTargetingOptions extends Google_Service_Resource
{
  /**
   * Gets a single targeting option. (targetingOptions.get)
   *
   * @param string $targetingType Required. The type of targeting option to
   * retrieve.
   * @param string $targetingOptionId Required. The ID of the of targeting option
   * to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Required. The Advertiser this request is being
   * made in the context of.
   * @return Google_Service_DisplayVideo_TargetingOption
   */
  public function get($targetingType, $targetingOptionId, $optParams = array())
  {
    $params = array('targetingType' => $targetingType, 'targetingOptionId' => $targetingOptionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_TargetingOption");
  }
  /**
   * Lists targeting options of a given type.
   * (targetingOptions.listTargetingTypesTargetingOptions)
   *
   * @param string $targetingType Required. The type of targeting option to be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListTargetingOptions` method. If not specified, the
   * first page of results will be returned.
   * @opt_param string advertiserId Required. The Advertiser this request is being
   * made in the context of.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string filter Allows filtering by targeting option properties.
   * Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by `OR` logical operators. * A
   * restriction has the form of `{field} {operator} {value}`. * The operator must
   * be "=" (equal sign). * Supported fields: - `carrier_and_isp_details.type` -
   * `geo_region_details.geo_region_type` - `targetingOptionId` Examples: * All
   * `GEO REGION` targeting options that belong to sub type
   * `GEO_REGION_TYPE_COUNTRY` or `GEO_REGION_TYPE_STATE`:
   * `geo_region_details.geo_region_type="GEO_REGION_TYPE_COUNTRY" OR
   * geo_region_details.geo_region_type="GEO_REGION_TYPE_STATE"` * All `CARRIER
   * AND ISP` targeting options that belong to sub type
   * `CARRIER_AND_ISP_TYPE_CARRIER`:
   * `carrier_and_isp_details.type="CARRIER_AND_ISP_TYPE_CARRIER"`. The length of
   * this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `targetingOptionId` (default) The default sorting order is ascending.
   * To specify descending order for a field, a suffix "desc" should be added to
   * the field name. Example: `targetingOptionId desc`.
   * @return Google_Service_DisplayVideo_ListTargetingOptionsResponse
   */
  public function listTargetingTypesTargetingOptions($targetingType, $optParams = array())
  {
    $params = array('targetingType' => $targetingType);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListTargetingOptionsResponse");
  }
}
