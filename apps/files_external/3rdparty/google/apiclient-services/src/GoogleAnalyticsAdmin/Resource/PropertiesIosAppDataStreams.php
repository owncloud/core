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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaIosAppDataStream;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListIosAppDataStreamsResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "iosAppDataStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $iosAppDataStreams = $analyticsadminService->iosAppDataStreams;
 *  </code>
 */
class PropertiesIosAppDataStreams extends \Google\Service\Resource
{
  /**
   * Deletes an iOS app stream on a property. (iosAppDataStreams.delete)
   *
   * @param string $name Required. The name of the iOS app data stream to delete.
   * Format: properties/{property_id}/iosAppDataStreams/{stream_id} Example:
   * "properties/123/iosAppDataStreams/456"
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
   * Lookup for a single IosAppDataStream (iosAppDataStreams.get)
   *
   * @param string $name Required. The name of the iOS app data stream to lookup.
   * Format: properties/{property_id}/iosAppDataStreams/{stream_id} Example:
   * "properties/123/iosAppDataStreams/456"
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaIosAppDataStream
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaIosAppDataStream::class);
  }
  /**
   * Returns child iOS app data streams under the specified parent property. iOS
   * app data streams will be excluded if the caller does not have access. Returns
   * an empty list if no relevant iOS app data streams are found.
   * (iosAppDataStreams.listPropertiesIosAppDataStreams)
   *
   * @param string $parent Required. The name of the parent property. For example,
   * to list results of app streams under the property with Id 123:
   * "properties/123"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200;
   * (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous
   * `ListIosAppDataStreams` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListIosAppDataStreams`
   * must match the call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListIosAppDataStreamsResponse
   */
  public function listPropertiesIosAppDataStreams($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListIosAppDataStreamsResponse::class);
  }
  /**
   * Updates an iOS app stream on a property. (iosAppDataStreams.patch)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format:
   * properties/{property_id}/iosAppDataStreams/{stream_id} Example:
   * "properties/1000/iosAppDataStreams/2000"
   * @param GoogleAnalyticsAdminV1alphaIosAppDataStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaIosAppDataStream
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaIosAppDataStream $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaIosAppDataStream::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesIosAppDataStreams::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesIosAppDataStreams');
