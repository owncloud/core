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
 * The "androidAppDataStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $androidAppDataStreams = $analyticsadminService->androidAppDataStreams;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesAndroidAppDataStreams extends Google_Service_Resource
{
  /**
   * Creates an android app stream with the specified location and attributes.
   * (androidAppDataStreams.create)
   *
   * @param string $parent Required. The parent resource where this android app
   * data stream will be created. Format: properties/123
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function create($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream");
  }
  /**
   * Deletes an android app stream on a property. (androidAppDataStreams.delete)
   *
   * @param string $name Required. The name of the android app data stream to
   * delete. Format: properties/{property_id}/androidAppDataStreams/{stream_id}
   * Example: "properties/123/androidAppDataStreams/456"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty");
  }
  /**
   * Lookup for a single AndroidAppDataStream Throws "Target not found" if no such
   * android app data stream found, or if the caller does not have permissions to
   * access it. (androidAppDataStreams.get)
   *
   * @param string $name Required. The name of the android app data stream to
   * lookup. Format: properties/{property_id}/androidAppDataStreams/{stream_id}
   * Example: "properties/123/androidAppDataStreams/456"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream");
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
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListAndroidAppDataStreamsResponse
   */
  public function listPropertiesAndroidAppDataStreams($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListAndroidAppDataStreamsResponse");
  }
  /**
   * Updates an android app stream on a property. (androidAppDataStreams.patch)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format:
   * properties/{property_id}/androidAppDataStreams/{stream_id} Example:
   * "properties/1000/androidAppDataStreams/2000"
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. Omitted fields
   * will not be updated.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function patch($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream");
  }
}
