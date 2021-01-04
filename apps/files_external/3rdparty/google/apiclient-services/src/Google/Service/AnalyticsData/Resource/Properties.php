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
   * Returns multiple pivot reports in a batch. All reports must be for the same
   * GA4 Property. (properties.batchRunPivotReports)
   *
   * @param string $property A Google Analytics GA4 property identifier whose
   * events are tracked. Specified in the URL path and not the body. To learn
   * more, see [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). This property must be specified for the batch. The property
   * within RunPivotReportRequest may either be unspecified or consistent with
   * this property. Example: properties/1234
   * @param Google_Service_AnalyticsData_BatchRunPivotReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_BatchRunPivotReportsResponse
   */
  public function batchRunPivotReports($property, Google_Service_AnalyticsData_BatchRunPivotReportsRequest $postBody, $optParams = array())
  {
    $params = array('property' => $property, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchRunPivotReports', array($params), "Google_Service_AnalyticsData_BatchRunPivotReportsResponse");
  }
  /**
   * Returns multiple reports in a batch. All reports must be for the same GA4
   * Property. (properties.batchRunReports)
   *
   * @param string $property A Google Analytics GA4 property identifier whose
   * events are tracked. Specified in the URL path and not the body. To learn
   * more, see [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). This property must be specified for the batch. The property
   * within RunReportRequest may either be unspecified or consistent with this
   * property. Example: properties/1234
   * @param Google_Service_AnalyticsData_BatchRunReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_BatchRunReportsResponse
   */
  public function batchRunReports($property, Google_Service_AnalyticsData_BatchRunReportsRequest $postBody, $optParams = array())
  {
    $params = array('property' => $property, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchRunReports', array($params), "Google_Service_AnalyticsData_BatchRunReportsResponse");
  }
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
   * Returns a customized pivot report of your Google Analytics event data. Pivot
   * reports are more advanced and expressive formats than regular reports. In a
   * pivot report, dimensions are only visible if they are included in a pivot.
   * Multiple pivots can be specified to further dissect your data.
   * (properties.runPivotReport)
   *
   * @param string $property A Google Analytics GA4 property identifier whose
   * events are tracked. Specified in the URL path and not the body. To learn
   * more, see [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). Within a batch request, this property should either be
   * unspecified or consistent with the batch-level property. Example:
   * properties/1234
   * @param Google_Service_AnalyticsData_RunPivotReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_RunPivotReportResponse
   */
  public function runPivotReport($property, Google_Service_AnalyticsData_RunPivotReportRequest $postBody, $optParams = array())
  {
    $params = array('property' => $property, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runPivotReport', array($params), "Google_Service_AnalyticsData_RunPivotReportResponse");
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
  /**
   * Returns a customized report of your Google Analytics event data. Reports
   * contain statistics derived from data collected by the Google Analytics
   * tracking code. The data returned from the API is as a table with columns for
   * the requested dimensions and metrics. Metrics are individual measurements of
   * user activity on your property, such as active users or event count.
   * Dimensions break down metrics across some common criteria, such as country or
   * event name. (properties.runReport)
   *
   * @param string $property A Google Analytics GA4 property identifier whose
   * events are tracked. Specified in the URL path and not the body. To learn
   * more, see [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). Within a batch request, this property should either be
   * unspecified or consistent with the batch-level property. Example:
   * properties/1234
   * @param Google_Service_AnalyticsData_RunReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_RunReportResponse
   */
  public function runReport($property, Google_Service_AnalyticsData_RunReportRequest $postBody, $optParams = array())
  {
    $params = array('property' => $property, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runReport', array($params), "Google_Service_AnalyticsData_RunReportResponse");
  }
}
