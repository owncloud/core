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
 * The "regions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $regions = $contentService->regions;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Regions extends Google_Service_Resource
{
  /**
   * Creates a region definition in your Merchant Center account. (regions.create)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * create region definition.
   * @param Google_Service_ShoppingContent_Region $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string regionId Required. The id of the region to create.
   * @return Google_Service_ShoppingContent_Region
   */
  public function create($merchantId, Google_Service_ShoppingContent_Region $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ShoppingContent_Region");
  }
  /**
   * Deletes a region definition from your Merchant Center account.
   * (regions.delete)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * delete region definition.
   * @param string $regionId Required. The id of the region to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $regionId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'regionId' => $regionId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a region defined in your Merchant Center account. (regions.get)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve region definition.
   * @param string $regionId Required. The id of the region to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Region
   */
  public function get($merchantId, $regionId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'regionId' => $regionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_Region");
  }
  /**
   * Lists the regions in your Merchant Center account. (regions.listRegions)
   *
   * @param string $merchantId Required. The id of the merchant for which to list
   * region definitions.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of regions to return. The service
   * may return fewer than this value. If unspecified, at most 50 rules will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListRegions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListRegions` must match the
   * call that provided the page token.
   * @return Google_Service_ShoppingContent_ListRegionsResponse
   */
  public function listRegions($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ListRegionsResponse");
  }
  /**
   * Updates a region definition in your Merchant Center account. (regions.patch)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * update region definition.
   * @param string $regionId Required. The id of the region to update.
   * @param Google_Service_ShoppingContent_Region $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The comma-separated field mask
   * indicating the fields to update. Example:
   * `"displayName,postalCodeArea.regionCode"`.
   * @return Google_Service_ShoppingContent_Region
   */
  public function patch($merchantId, $regionId, Google_Service_ShoppingContent_Region $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'regionId' => $regionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ShoppingContent_Region");
  }
}
