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
 * The "measurementProtocolSecrets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $measurementProtocolSecrets = $analyticsadminService->measurementProtocolSecrets;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesWebDataStreamsMeasurementProtocolSecrets extends Google_Service_Resource
{
  /**
   * Creates a measurement protocol secret. (measurementProtocolSecrets.create)
   *
   * @param string $parent Required. The parent resource where this secret will be
   * created. Any type of stream (WebDataStream, IosAppDataStream,
   * AndroidAppDataStream) may be a parent. Format:
   * properties/{property}/webDataStreams/{webDataStream}
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret
   */
  public function create($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret");
  }
  /**
   * Deletes target MeasurementProtocolSecret. (measurementProtocolSecrets.delete)
   *
   * @param string $name Required. The name of the MeasurementProtocolSecret to
   * delete. Format: properties/{property}/webDataStreams/{webDataStream}/measurem
   * entProtocolSecrets/{measurementProtocolSecret} Note: Any type of stream
   * (WebDataStream, IosAppDataStream, AndroidAppDataStream) may be a parent.
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
   * Lookup for a single "GA4" MeasurementProtocolSecret.
   * (measurementProtocolSecrets.get)
   *
   * @param string $name Required. The name of the measurement protocol secret to
   * lookup. Format: properties/{property}/webDataStreams/{webDataStream}/measurem
   * entProtocolSecrets/{measurementProtocolSecret} Note: Any type of stream
   * (WebDataStream, IosAppDataStream, AndroidAppDataStream) may be a parent.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret");
  }
  /**
   * Returns child MeasurementProtocolSecrets under the specified parent Property.
   * (measurementProtocolSecrets.listPropertiesWebDataStreamsMeasurementProtocolSe
   * crets)
   *
   * @param string $parent Required. The resource name of the parent stream. Any
   * type of stream (WebDataStream, IosAppDataStream, AndroidAppDataStream) may be
   * a parent. Format: properties/{property}/webDataStreams/{webDataStream}/measur
   * ementProtocolSecrets
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 10 resources will be returned. The maximum value is 10.
   * Higher values will be coerced to the maximum.
   * @opt_param string pageToken A page token, received from a previous
   * `ListMeasurementProtocolSecrets` call. Provide this to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListMeasurementProtocolSecrets` must match the call that provided the page
   * token.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListMeasurementProtocolSecretsResponse
   */
  public function listPropertiesWebDataStreamsMeasurementProtocolSecrets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListMeasurementProtocolSecretsResponse");
  }
  /**
   * Updates a measurement protocol secret. (measurementProtocolSecrets.patch)
   *
   * @param string $name Output only. Resource name of this secret. This secret
   * may be a child of any type of stream. Format: properties/{property}/webDataSt
   * reams/{webDataStream}/measurementProtocolSecrets/{measurementProtocolSecret}
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. Omitted fields
   * will not be updated.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret
   */
  public function patch($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret");
  }
}
