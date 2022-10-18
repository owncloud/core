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

namespace Google\Service\GoogleAnalyticsAdmin\Resource;

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListSearchAds360LinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaSearchAds360Link;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "searchAds360Links" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $searchAds360Links = $analyticsadminService->searchAds360Links;
 *  </code>
 */
class PropertiesSearchAds360Links extends \Google\Service\Resource
{
  /**
   * Creates a SearchAds360Link. (searchAds360Links.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaSearchAds360Link $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaSearchAds360Link
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaSearchAds360Link $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaSearchAds360Link::class);
  }
  /**
   * Deletes a SearchAds360Link on a property. (searchAds360Links.delete)
   *
   * @param string $name Required. The name of the SearchAds360Link to delete.
   * Example format: properties/1234/SearchAds360Links/5678
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Look up a single SearchAds360Link (searchAds360Links.get)
   *
   * @param string $name Required. The name of the SearchAds360Link to get.
   * Example format: properties/1234/SearchAds360Link/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaSearchAds360Link
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaSearchAds360Link::class);
  }
  /**
   * Lists all SearchAds360Links on a property.
   * (searchAds360Links.listPropertiesSearchAds360Links)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListSearchAds360Links` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListSearchAds360Links`
   * must match the call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListSearchAds360LinksResponse
   */
  public function listPropertiesSearchAds360Links($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListSearchAds360LinksResponse::class);
  }
  /**
   * Updates a SearchAds360Link on a property. (searchAds360Links.patch)
   *
   * @param string $name Output only. The resource name for this SearchAds360Link
   * resource. Format: properties/{propertyId}/searchAds360Links/{linkId} Note:
   * linkId is not the Search Ads 360 advertiser ID
   * @param GoogleAnalyticsAdminV1alphaSearchAds360Link $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Omitted fields will not be updated. To replace the entire entity, use one
   * path with the string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaSearchAds360Link
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaSearchAds360Link $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaSearchAds360Link::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesSearchAds360Links::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesSearchAds360Links');
