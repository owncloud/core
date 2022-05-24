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

use Google\Service\ShoppingContent\ListRegionsResponse;
use Google\Service\ShoppingContent\Region;

/**
 * The "regions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $regions = $contentService->regions;
 *  </code>
 */
class Regions extends \Google\Service\Resource
{
  /**
   * Creates a region definition in your Merchant Center account. (regions.create)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * create region definition.
   * @param Region $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string regionId Required. The id of the region to create.
   * @return Region
   */
  public function create($merchantId, Region $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Region::class);
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
  public function delete($merchantId, $regionId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionId' => $regionId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a region defined in your Merchant Center account. (regions.get)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve region definition.
   * @param string $regionId Required. The id of the region to retrieve.
   * @param array $optParams Optional parameters.
   * @return Region
   */
  public function get($merchantId, $regionId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionId' => $regionId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Region::class);
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
   * @return ListRegionsResponse
   */
  public function listRegions($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRegionsResponse::class);
  }
  /**
   * Updates a region definition in your Merchant Center account. (regions.patch)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * update region definition.
   * @param string $regionId Required. The id of the region to update.
   * @param Region $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The comma-separated field mask
   * indicating the fields to update. Example:
   * `"displayName,postalCodeArea.regionCode"`.
   * @return Region
   */
  public function patch($merchantId, $regionId, Region $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionId' => $regionId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Region::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Regions::class, 'Google_Service_ShoppingContent_Resource_Regions');
