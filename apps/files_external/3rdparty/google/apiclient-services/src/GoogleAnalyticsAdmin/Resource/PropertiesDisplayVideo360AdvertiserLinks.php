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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "displayVideo360AdvertiserLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $displayVideo360AdvertiserLinks = $analyticsadminService->displayVideo360AdvertiserLinks;
 *  </code>
 */
class PropertiesDisplayVideo360AdvertiserLinks extends \Google\Service\Resource
{
  /**
   * Creates a DisplayVideo360AdvertiserLink. This can only be utilized by users
   * who have proper authorization both on the Google Analytics property and on
   * the Display & Video 360 advertiser. Users who do not have access to the
   * Display & Video 360 advertiser should instead seek to create a
   * DisplayVideo360LinkProposal. (displayVideo360AdvertiserLinks.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink::class);
  }
  /**
   * Deletes a DisplayVideo360AdvertiserLink on a property.
   * (displayVideo360AdvertiserLinks.delete)
   *
   * @param string $name Required. The name of the DisplayVideo360AdvertiserLink
   * to delete. Example format:
   * properties/1234/displayVideo360AdvertiserLinks/5678
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
   * Look up a single DisplayVideo360AdvertiserLink
   * (displayVideo360AdvertiserLinks.get)
   *
   * @param string $name Required. The name of the DisplayVideo360AdvertiserLink
   * to get. Example format: properties/1234/displayVideo360AdvertiserLink/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink::class);
  }
  /**
   * Lists all DisplayVideo360AdvertiserLinks on a property.
   * (displayVideo360AdvertiserLinks.listPropertiesDisplayVideo360AdvertiserLinks)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListDisplayVideo360AdvertiserLinks` call. Provide this to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListDisplayVideo360AdvertiserLinks` must match the call that provided the
   * page token.
   * @return GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinksResponse
   */
  public function listPropertiesDisplayVideo360AdvertiserLinks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinksResponse::class);
  }
  /**
   * Updates a DisplayVideo360AdvertiserLink on a property.
   * (displayVideo360AdvertiserLinks.patch)
   *
   * @param string $name Output only. The resource name for this
   * DisplayVideo360AdvertiserLink resource. Format:
   * properties/{propertyId}/displayVideo360AdvertiserLinks/{linkId} Note: linkId
   * is not the Display & Video 360 Advertiser ID
   * @param GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Omitted fields will not be updated. To replace the entire entity, use one
   * path with the string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesDisplayVideo360AdvertiserLinks::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesDisplayVideo360AdvertiserLinks');
