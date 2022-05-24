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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaAndroidAppDataStream;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListAndroidAppDataStreamsResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "androidAppDataStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $androidAppDataStreams = $analyticsadminService->androidAppDataStreams;
 *  </code>
 */
class PropertiesAndroidAppDataStreams extends \Google\Service\Resource
{
  /**
   * Deletes an android app stream on a property. (androidAppDataStreams.delete)
   *
   * @param string $name Required. The name of the android app data stream to
   * delete. Format: properties/{property_id}/androidAppDataStreams/{stream_id}
   * Example: "properties/123/androidAppDataStreams/456"
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
   * Lookup for a single AndroidAppDataStream (androidAppDataStreams.get)
   *
   * @param string $name Required. The name of the android app data stream to
   * lookup. Format: properties/{property_id}/androidAppDataStreams/{stream_id}
   * Example: "properties/123/androidAppDataStreams/456"
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaAndroidAppDataStream::class);
  }
  /**
   * Returns child android app streams under the specified parent property.
   * Android app streams will be excluded if the caller does not have access.
   * Returns an empty list if no relevant android app streams are found.
   * (androidAppDataStreams.listPropertiesAndroidAppDataStreams)
   *
   * @param string $parent Required. The name of the parent property. For example,
   * to limit results to app streams under the property with Id 123:
   * "properties/123"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200;
   * (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous call.
   * Provide this to retrieve the subsequent page. When paginating, all other
   * parameters provided to `ListAndroidAppDataStreams` must match the call that
   * provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListAndroidAppDataStreamsResponse
   */
  public function listPropertiesAndroidAppDataStreams($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListAndroidAppDataStreamsResponse::class);
  }
  /**
   * Updates an android app stream on a property. (androidAppDataStreams.patch)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format:
   * properties/{property_id}/androidAppDataStreams/{stream_id} Example:
   * "properties/1000/androidAppDataStreams/2000"
   * @param GoogleAnalyticsAdminV1alphaAndroidAppDataStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaAndroidAppDataStream $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaAndroidAppDataStream::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesAndroidAppDataStreams::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesAndroidAppDataStreams');
