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
 * The "properties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsdataService = new Google_Service_AnalyticsData(...);
 *   $properties = $analyticsdataService->properties;
 *  </code>
 */
class Google_Service_AnalyticsData_Resource_Properties extends Google_Service_Resource
{
  /**
   * Returns metadata for dimensions and metrics available in reporting methods.
   * Used to explore the dimensions and metrics. In this method, a Google
   * Analytics GA4 Property Identifier is specified in the request, and the
   * metadata response includes Custom dimensions and metrics as well as Universal
   * metadata. For example if a custom metric with parameter name
   * `levels_unlocked` is registered to a property, the Metadata response will
   * contain `customEvent:levels_unlocked`. Universal metadata are dimensions and
   * metrics applicable to any property such as `country` and `totalUsers`.
   * (properties.getMetadata)
   *
   * @param string $name Required. The resource name of the metadata to retrieve.
   * This name field is specified in the URL path and not URL parameters. Property
   * is a numeric Google Analytics GA4 Property identifier. To learn more, see
   * [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). Example: properties/1234/metadata Set the Property ID to 0 for
   * dimensions and metrics common to all properties. In this special mode, this
   * method will not return custom dimensions and metrics.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_Metadata
   */
  public function getMetadata($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getMetadata', array($params), "Google_Service_AnalyticsData_Metadata");
  }
  /**
   * The Google Analytics Realtime API returns a customized report of realtime
   * event data for your property. These reports show events and usage from the
   * last 30 minutes. (properties.runRealtimeReport)
   *
   * @param string $property A Google Analytics GA4 property identifier whose
   * events are tracked. Specified in the URL path and not the body. To learn
   * more, see [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). Example: properties/1234
   * @param Google_Service_AnalyticsData_RunRealtimeReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_RunRealtimeReportResponse
   */
  public function runRealtimeReport($property, Google_Service_AnalyticsData_RunRealtimeReportRequest $postBody, $optParams = array())
  {
    $params = array('property' => $property, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runRealtimeReport', array($params), "Google_Service_AnalyticsData_RunRealtimeReportResponse");
  }
}
