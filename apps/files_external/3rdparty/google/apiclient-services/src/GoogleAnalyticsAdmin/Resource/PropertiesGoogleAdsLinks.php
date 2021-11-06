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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaGoogleAdsLink;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListGoogleAdsLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "googleAdsLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $googleAdsLinks = $analyticsadminService->googleAdsLinks;
 *  </code>
 */
class PropertiesGoogleAdsLinks extends \Google\Service\Resource
{
  /**
   * Creates a GoogleAdsLink. (googleAdsLinks.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaGoogleAdsLink $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaGoogleAdsLink
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaGoogleAdsLink $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaGoogleAdsLink::class);
  }
  /**
   * Deletes a GoogleAdsLink on a property (googleAdsLinks.delete)
   *
   * @param string $name Required. Example format:
   * properties/1234/googleAdsLinks/5678
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
   * Lists GoogleAdsLinks on a property.
   * (googleAdsLinks.listPropertiesGoogleAdsLinks)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListGoogleAdsLinks` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListGoogleAdsLinks` must match
   * the call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListGoogleAdsLinksResponse
   */
  public function listPropertiesGoogleAdsLinks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListGoogleAdsLinksResponse::class);
  }
  /**
   * Updates a GoogleAdsLink on a property (googleAdsLinks.patch)
   *
   * @param string $name Output only. Format:
   * properties/{propertyId}/googleAdsLinks/{googleAdsLinkId} Note:
   * googleAdsLinkId is not the Google Ads customer ID.
   * @param GoogleAnalyticsAdminV1alphaGoogleAdsLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaGoogleAdsLink
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaGoogleAdsLink $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaGoogleAdsLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesGoogleAdsLinks::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesGoogleAdsLinks');
