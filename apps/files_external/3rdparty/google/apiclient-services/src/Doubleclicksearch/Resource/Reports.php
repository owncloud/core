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

namespace Google\Service\Doubleclicksearch\Resource;

use Google\Service\Doubleclicksearch\Report;
use Google\Service\Doubleclicksearch\ReportRequest;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclicksearchService = new Google\Service\Doubleclicksearch(...);
 *   $reports = $doubleclicksearchService->reports;
 *  </code>
 */
class Reports extends \Google\Service\Resource
{
  /**
   * Generates and returns a report immediately. (reports.generate)
   *
   * @param ReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function generate(ReportRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generate', [$params], Report::class);
  }
  /**
   * Polls for the status of a report request. (reports.get)
   *
   * @param string $reportId ID of the report request being polled.
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function get($reportId, $optParams = [])
  {
    $params = ['reportId' => $reportId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Report::class);
  }
  /**
   * Downloads a report file encoded in UTF-8. (reports.getFile)
   *
   * @param string $reportId ID of the report.
   * @param int $reportFragment The index of the report fragment to download.
   * @param array $optParams Optional parameters.
   */
  public function getFile($reportId, $reportFragment, $optParams = [])
  {
    $params = ['reportId' => $reportId, 'reportFragment' => $reportFragment];
    $params = array_merge($params, $optParams);
    return $this->call('getFile', [$params]);
  }
  /**
   * Inserts a report request into the reporting system. (reports.request)
   *
   * @param ReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function request(ReportRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('request', [$params], Report::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Reports::class, 'Google_Service_Doubleclicksearch_Resource_Reports');
