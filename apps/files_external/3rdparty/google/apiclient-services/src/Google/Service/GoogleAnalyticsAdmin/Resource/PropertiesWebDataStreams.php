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
 * The "webDataStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $webDataStreams = $analyticsadminService->webDataStreams;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesWebDataStreams extends Google_Service_Resource
{
  /**
   * Creates a web stream with the specified location and attributes.
   * (webDataStreams.create)
   *
   * @param string $parent Required. The parent resource where this web data
   * stream will be created. Format: properties/123
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function create($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream");
  }
  /**
   * Deletes a web stream on a property. (webDataStreams.delete)
   *
   * @param string $name Required. The name of the web data stream to delete.
   * Format: properties/{property_id}/webDataStreams/{stream_id} Example:
   * "properties/123/webDataStreams/456"
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
   * Lookup for a single WebDataStream Throws "Target not found" if no such web
   * data stream found, or if the caller does not have permissions to access it.
   * (webDataStreams.get)
   *
   * @param string $name Required. The name of the web data stream to lookup.
   * Format: properties/{property_id}/webDataStreams/{stream_id} Example:
   * "properties/123/webDataStreams/456"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream");
  }
  /**
   * Returns the singleton enhanced measurement settings for this web stream. Note
   * that the stream must enable enhanced measurement for these settings to take
   * effect. (webDataStreams.getEnhancedMeasurementSettings)
   *
   * @param string $name Required. The name of the settings to lookup. Format: pro
   * perties/{property_id}/webDataStreams/{stream_id}/enhancedMeasurementSettings
   * Example: "properties/1000/webDataStreams/2000/enhancedMeasurementSettings"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings
   */
  public function getEnhancedMeasurementSettings($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getEnhancedMeasurementSettings', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings");
  }
  /**
   * Returns the Site Tag for the specified web stream. Site Tags are immutable
   * singletons. (webDataStreams.getGlobalSiteTag)
   *
   * @param string $name Required. The name of the site tag to lookup. Note that
   * site tags are singletons and do not have unique IDs. Format:
   * properties/{property_id}/webDataStreams/{stream_id}/globalSiteTag Example:
   * "properties/123/webDataStreams/456/globalSiteTag"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGlobalSiteTag
   */
  public function getGlobalSiteTag($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getGlobalSiteTag', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGlobalSiteTag");
  }
  /**
   * Returns child web data streams under the specified parent property. Web data
   * streams will be excluded if the caller does not have access. Returns an empty
   * list if no relevant web data streams are found.
   * (webDataStreams.listPropertiesWebDataStreams)
   *
   * @param string $parent Required. The name of the parent property. For example,
   * to list results of web streams under the property with Id 123:
   * "properties/123"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200;
   * (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous
   * `ListWebDataStreams` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListWebDataStreams` must match
   * the call that provided the page token.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListWebDataStreamsResponse
   */
  public function listPropertiesWebDataStreams($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListWebDataStreamsResponse");
  }
  /**
   * Updates a web stream on a property. (webDataStreams.patch)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format:
   * properties/{property_id}/webDataStreams/{stream_id} Example:
   * "properties/1000/webDataStreams/2000"
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. Omitted fields
   * will not be updated.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function patch($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream");
  }
  /**
   * Updates the singleton enhanced measurement settings for this web stream. Note
   * that the stream must enable enhanced measurement for these settings to take
   * effect. (webDataStreams.updateEnhancedMeasurementSettings)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format: p
   * roperties/{property_id}/webDataStreams/{stream_id}/enhancedMeasurementSetting
   * s Example: "properties/1000/webDataStreams/2000/enhancedMeasurementSettings"
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. Omitted fields
   * will not be updated.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings
   */
  public function updateEnhancedMeasurementSettings($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateEnhancedMeasurementSettings', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings");
  }
}
