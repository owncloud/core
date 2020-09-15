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
 * The "v1alpha" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsdataService = new Google_Service_AnalyticsData(...);
 *   $v1alpha = $analyticsdataService->v1alpha;
 *  </code>
 */
class Google_Service_AnalyticsData_Resource_V1alpha extends Google_Service_Resource
{
  /**
   * Returns multiple pivot reports in a batch. All reports must be for the same
   * Entity. (v1alpha.batchRunPivotReports)
   *
   * @param Google_Service_AnalyticsData_BatchRunPivotReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_BatchRunPivotReportsResponse
   */
  public function batchRunPivotReports(Google_Service_AnalyticsData_BatchRunPivotReportsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchRunPivotReports', array($params), "Google_Service_AnalyticsData_BatchRunPivotReportsResponse");
  }
  /**
   * Returns multiple reports in a batch. All reports must be for the same Entity.
   * (v1alpha.batchRunReports)
   *
   * @param Google_Service_AnalyticsData_BatchRunReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_BatchRunReportsResponse
   */
  public function batchRunReports(Google_Service_AnalyticsData_BatchRunReportsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchRunReports', array($params), "Google_Service_AnalyticsData_BatchRunReportsResponse");
  }
  /**
   * Returns metadata for dimensions and metrics available in reporting methods.
   * Used to explore the dimensions and metrics. Dimensions and metrics will be
   * mostly added over time, but renames and deletions may occur. This method
   * returns Universal Metadata. Universal Metadata are dimensions and metrics
   * applicable to any property such as `country` and `totalUsers`.
   * (v1alpha.getUniversalMetadata)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_UniversalMetadata
   */
  public function getUniversalMetadata($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getUniversalMetadata', array($params), "Google_Service_AnalyticsData_UniversalMetadata");
  }
  /**
   * Returns a customized pivot report of your Google Analytics event data. Pivot
   * reports are more advanced and expressive formats than regular reports. In a
   * pivot report, dimensions are only visible if they are included in a pivot.
   * Multiple pivots can be specified to further dissect your data.
   * (v1alpha.runPivotReport)
   *
   * @param Google_Service_AnalyticsData_RunPivotReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_RunPivotReportResponse
   */
  public function runPivotReport(Google_Service_AnalyticsData_RunPivotReportRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runPivotReport', array($params), "Google_Service_AnalyticsData_RunPivotReportResponse");
  }
  /**
   * Returns a customized report of your Google Analytics event data. Reports
   * contain statistics derived from data collected by the Google Analytics
   * tracking code. The data returned from the API is as a table with columns for
   * the requested dimensions and metrics. Metrics are individual measurements of
   * user activity on your property, such as active users or event count.
   * Dimensions break down metrics across some common criteria, such as country or
   * event name. (v1alpha.runReport)
   *
   * @param Google_Service_AnalyticsData_RunReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AnalyticsData_RunReportResponse
   */
  public function runReport(Google_Service_AnalyticsData_RunReportRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runReport', array($params), "Google_Service_AnalyticsData_RunReportResponse");
  }
}
