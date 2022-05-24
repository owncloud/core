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

namespace Google\Service\VMMigrationService\Resource;

use Google\Service\VMMigrationService\ListUtilizationReportsResponse;
use Google\Service\VMMigrationService\Operation;
use Google\Service\VMMigrationService\UtilizationReport;

/**
 * The "utilizationReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $utilizationReports = $vmmigrationService->utilizationReports;
 *  </code>
 */
class ProjectsLocationsSourcesUtilizationReports extends \Google\Service\Resource
{
  /**
   * Creates a new UtilizationReport. (utilizationReports.create)
   *
   * @param string $parent Required. The Utilization Report's parent.
   * @param UtilizationReport $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string utilizationReportId Required. The ID to use for the report,
   * which will become the final component of the reports's resource name. This
   * value maximum length is 63 characters, and valid characters are /a-z-/. It
   * must start with an english letter and must not end with a hyphen.
   * @return Operation
   */
  public function create($parent, UtilizationReport $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Utilization Report. (utilizationReports.delete)
   *
   * @param string $name Required. The Utilization Report name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and t he
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets a single Utilization Report. (utilizationReports.get)
   *
   * @param string $name Required. The Utilization Report name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. The level of details of the report. Defaults
   * to FULL
   * @return UtilizationReport
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UtilizationReport::class);
  }
  /**
   * Lists Utilization Reports of the given Source.
   * (utilizationReports.listProjectsLocationsSourcesUtilizationReports)
   *
   * @param string $parent Required. The Utilization Reports parent.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of reports to return.
   * The service may return fewer than this value. If unspecified, at most 500
   * reports will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListUtilizationReports` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListUtilizationReports`
   * must match the call that provided the page token.
   * @opt_param string view Optional. The level of details of each report.
   * Defaults to BASIC.
   * @return ListUtilizationReportsResponse
   */
  public function listProjectsLocationsSourcesUtilizationReports($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUtilizationReportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSourcesUtilizationReports::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsSourcesUtilizationReports');
