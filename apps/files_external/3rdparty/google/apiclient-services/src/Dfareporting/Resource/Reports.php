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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\DfareportingFile;
use Google\Service\Dfareporting\Report;
use Google\Service\Dfareporting\ReportList;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $reports = $dfareportingService->reports;
 *  </code>
 */
class Reports extends \Google\Service\Resource
{
  /**
   * Deletes a report by its ID. (reports.delete)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param string $reportId The ID of the report.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $reportId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'reportId' => $reportId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a report by its ID. (reports.get)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param string $reportId The ID of the report.
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function get($profileId, $reportId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'reportId' => $reportId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Report::class);
  }
  /**
   * Creates a report. (reports.insert)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param Report $postBody
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function insert($profileId, Report $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Report::class);
  }
  /**
   * Retrieves list of reports. (reports.listReports)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken The value of the nextToken from the previous
   * result page.
   * @opt_param string scope The scope that defines which results are returned.
   * @opt_param string sortField The field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return ReportList
   */
  public function listReports($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ReportList::class);
  }
  /**
   * Updates an existing report. This method supports patch semantics.
   * (reports.patch)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param string $reportId The ID of the report.
   * @param Report $postBody
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function patch($profileId, $reportId, Report $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'reportId' => $reportId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Report::class);
  }
  /**
   * Runs a report. (reports.run)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param string $reportId The ID of the report.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool synchronous If set and true, tries to run the report
   * synchronously.
   * @return DfareportingFile
   */
  public function run($profileId, $reportId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'reportId' => $reportId];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], DfareportingFile::class);
  }
  /**
   * Updates a report. (reports.update)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param string $reportId The ID of the report.
   * @param Report $postBody
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function update($profileId, $reportId, Report $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'reportId' => $reportId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Report::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Reports::class, 'Google_Service_Dfareporting_Resource_Reports');
