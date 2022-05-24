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

namespace Google\Service\AnalyticsData\Resource;

use Google\Service\AnalyticsData\BatchRunPivotReportsRequest;
use Google\Service\AnalyticsData\BatchRunPivotReportsResponse;
use Google\Service\AnalyticsData\BatchRunReportsRequest;
use Google\Service\AnalyticsData\BatchRunReportsResponse;
use Google\Service\AnalyticsData\CheckCompatibilityRequest;
use Google\Service\AnalyticsData\CheckCompatibilityResponse;
use Google\Service\AnalyticsData\Metadata;
use Google\Service\AnalyticsData\RunPivotReportRequest;
use Google\Service\AnalyticsData\RunPivotReportResponse;
use Google\Service\AnalyticsData\RunRealtimeReportRequest;
use Google\Service\AnalyticsData\RunRealtimeReportResponse;
use Google\Service\AnalyticsData\RunReportRequest;
use Google\Service\AnalyticsData\RunReportResponse;

/**
 * The "properties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsdataService = new Google\Service\AnalyticsData(...);
 *   $properties = $analyticsdataService->properties;
 *  </code>
 */
class Properties extends \Google\Service\Resource
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
   * @param BatchRunPivotReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchRunPivotReportsResponse
   */
  public function batchRunPivotReports($property, BatchRunPivotReportsRequest $postBody, $optParams = [])
  {
    $params = ['property' => $property, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchRunPivotReports', [$params], BatchRunPivotReportsResponse::class);
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
   * @param BatchRunReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchRunReportsResponse
   */
  public function batchRunReports($property, BatchRunReportsRequest $postBody, $optParams = [])
  {
    $params = ['property' => $property, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchRunReports', [$params], BatchRunReportsResponse::class);
  }
  /**
   * This compatibility method lists dimensions and metrics that can be added to a
   * report request and maintain compatibility. This method fails if the request's
   * dimensions and metrics are incompatible. In Google Analytics, reports fail if
   * they request incompatible dimensions and/or metrics; in that case, you will
   * need to remove dimensions and/or metrics from the incompatible report until
   * the report is compatible. The Realtime and Core reports have different
   * compatibility rules. This method checks compatibility for Core reports.
   * (properties.checkCompatibility)
   *
   * @param string $property A Google Analytics GA4 property identifier whose
   * events are tracked. To learn more, see [where to find your Property
   * ID](https://developers.google.com/analytics/devguides/reporting/data/v1
   * /property-id). `property` should be the same value as in your `runReport`
   * request. Example: properties/1234 Set the Property ID to 0 for compatibility
   * checking on dimensions and metrics common to all properties. In this special
   * mode, this method will not return custom dimensions and metrics.
   * @param CheckCompatibilityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CheckCompatibilityResponse
   */
  public function checkCompatibility($property, CheckCompatibilityRequest $postBody, $optParams = [])
  {
    $params = ['property' => $property, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkCompatibility', [$params], CheckCompatibilityResponse::class);
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
   * @return Metadata
   */
  public function getMetadata($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getMetadata', [$params], Metadata::class);
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
   * @param RunPivotReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RunPivotReportResponse
   */
  public function runPivotReport($property, RunPivotReportRequest $postBody, $optParams = [])
  {
    $params = ['property' => $property, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runPivotReport', [$params], RunPivotReportResponse::class);
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
   * @param RunRealtimeReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RunRealtimeReportResponse
   */
  public function runRealtimeReport($property, RunRealtimeReportRequest $postBody, $optParams = [])
  {
    $params = ['property' => $property, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runRealtimeReport', [$params], RunRealtimeReportResponse::class);
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
   * @param RunReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RunReportResponse
   */
  public function runReport($property, RunReportRequest $postBody, $optParams = [])
  {
    $params = ['property' => $property, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runReport', [$params], RunReportResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Properties::class, 'Google_Service_AnalyticsData_Resource_Properties');
