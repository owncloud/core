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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaGlobalSiteTag;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListWebDataStreamsResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaWebDataStream;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "webDataStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $webDataStreams = $analyticsadminService->webDataStreams;
 *  </code>
 */
class PropertiesWebDataStreams extends \Google\Service\Resource
{
  /**
   * Creates a web stream with the specified location and attributes.
   * (webDataStreams.create)
   *
   * @param string $parent Required. The parent resource where this web data
   * stream will be created. Format: properties/123
   * @param GoogleAnalyticsAdminV1alphaWebDataStream $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaWebDataStream $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaWebDataStream::class);
  }
  /**
   * Deletes a web stream on a property. (webDataStreams.delete)
   *
   * @param string $name Required. The name of the web data stream to delete.
   * Format: properties/{property_id}/webDataStreams/{stream_id} Example:
   * "properties/123/webDataStreams/456"
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
   * Lookup for a single WebDataStream (webDataStreams.get)
   *
   * @param string $name Required. The name of the web data stream to lookup.
   * Format: properties/{property_id}/webDataStreams/{stream_id} Example:
   * "properties/123/webDataStreams/456"
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaWebDataStream::class);
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
   * @return GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings
   */
  public function getEnhancedMeasurementSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getEnhancedMeasurementSettings', [$params], GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings::class);
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
   * @return GoogleAnalyticsAdminV1alphaGlobalSiteTag
   */
  public function getGlobalSiteTag($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getGlobalSiteTag', [$params], GoogleAnalyticsAdminV1alphaGlobalSiteTag::class);
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
   * @return GoogleAnalyticsAdminV1alphaListWebDataStreamsResponse
   */
  public function listPropertiesWebDataStreams($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListWebDataStreamsResponse::class);
  }
  /**
   * Updates a web stream on a property. (webDataStreams.patch)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format:
   * properties/{property_id}/webDataStreams/{stream_id} Example:
   * "properties/1000/webDataStreams/2000"
   * @param GoogleAnalyticsAdminV1alphaWebDataStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaWebDataStream $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaWebDataStream::class);
  }
  /**
   * Updates the singleton enhanced measurement settings for this web stream. Note
   * that the stream must enable enhanced measurement for these settings to take
   * effect. (webDataStreams.updateEnhancedMeasurementSettings)
   *
   * @param string $name Output only. Resource name of this Data Stream. Format: p
   * roperties/{property_id}/webDataStreams/{stream_id}/enhancedMeasurementSetting
   * s Example: "properties/1000/webDataStreams/2000/enhancedMeasurementSettings"
   * @param GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings
   */
  public function updateEnhancedMeasurementSettings($name, GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateEnhancedMeasurementSettings', [$params], GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesWebDataStreams::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesWebDataStreams');
