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
 * The "conversionEvents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $conversionEvents = $analyticsadminService->conversionEvents;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesConversionEvents extends Google_Service_Resource
{
  /**
   * Creates a conversion event with the specified attributes.
   * (conversionEvents.create)
   *
   * @param string $parent Required. The resource name of the parent property
   * where this conversion event will be created. Format: properties/123
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaConversionEvent $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaConversionEvent
   */
  public function create($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaConversionEvent $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaConversionEvent");
  }
  /**
   * Deletes a conversion event in a property. (conversionEvents.delete)
   *
   * @param string $name Required. The resource name of the conversion event to
   * delete. Format: properties/{property}/conversionEvents/{conversion_event}
   * Example: "properties/123/conversionEvents/456"
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
   * Retrieve a single conversion event. (conversionEvents.get)
   *
   * @param string $name Required. The resource name of the conversion event to
   * retrieve. Format: properties/{property}/conversionEvents/{conversion_event}
   * Example: "properties/123/conversionEvents/456"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaConversionEvent
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaConversionEvent");
  }
  /**
   * Returns a list of conversion events in the specified parent property. Returns
   * an empty list if no conversion events are found.
   * (conversionEvents.listPropertiesConversionEvents)
   *
   * @param string $parent Required. The resource name of the parent property.
   * Example: 'properties/123'
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200;
   * (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous
   * `ListConversionEvents` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListConversionEvents` must
   * match the call that provided the page token.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListConversionEventsResponse
   */
  public function listPropertiesConversionEvents($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListConversionEventsResponse");
  }
}
