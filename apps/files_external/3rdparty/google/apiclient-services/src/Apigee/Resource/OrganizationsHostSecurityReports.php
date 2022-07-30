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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleApiHttpBody;
use Google\Service\Apigee\GoogleCloudApigeeV1ListSecurityReportsResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1SecurityReport;
use Google\Service\Apigee\GoogleCloudApigeeV1SecurityReportQuery;
use Google\Service\Apigee\GoogleCloudApigeeV1SecurityReportResultView;

/**
 * The "hostSecurityReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $hostSecurityReports = $apigeeService->hostSecurityReports;
 *  </code>
 */
class OrganizationsHostSecurityReports extends \Google\Service\Resource
{
  /**
   * Submit a query at host level to be processed in the background. If the
   * submission of the query succeeds, the API returns a 201 status and an ID that
   * refer to the query. In addition to the HTTP status 201, the `state` of
   * "enqueued" means that the request succeeded. (hostSecurityReports.create)
   *
   * @param string $parent Required. The parent resource name. Must be of the form
   * `organizations/{org}`.
   * @param GoogleCloudApigeeV1SecurityReportQuery $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1SecurityReport
   */
  public function create($parent, GoogleCloudApigeeV1SecurityReportQuery $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1SecurityReport::class);
  }
  /**
   * Get status of a query submitted at host level. If the query is still in
   * progress, the `state` is set to "running" After the query has completed
   * successfully, `state` is set to "completed" (hostSecurityReports.get)
   *
   * @param string $name Required. Name of the security report to get. Must be of
   * the form `organizations/{org}/securityReports/{reportId}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1SecurityReport
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1SecurityReport::class);
  }
  /**
   * After the query is completed, use this API to retrieve the results. If the
   * request succeeds, and there is a non-zero result set, the result is
   * downloaded to the client as a zipped JSON file. The name of the downloaded
   * file will be: OfflineQueryResult-.zip Example: `OfflineQueryResult-
   * 9cfc0d85-0f30-46d6-ae6f-318d0cb961bd.zip` (hostSecurityReports.getResult)
   *
   * @param string $name Required. Name of the security report result to get. Must
   * be of the form `organizations/{org}/securityReports/{reportId}/result`.
   * @param array $optParams Optional parameters.
   * @return GoogleApiHttpBody
   */
  public function getResult($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getResult', [$params], GoogleApiHttpBody::class);
  }
  /**
   * After the query is completed, use this API to view the query result when
   * result size is small. (hostSecurityReports.getResultView)
   *
   * @param string $name Required. Name of the security report result view to get.
   * Must be of the form
   * `organizations/{org}/securityReports/{reportId}/resultView`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1SecurityReportResultView
   */
  public function getResultView($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getResultView', [$params], GoogleCloudApigeeV1SecurityReportResultView::class);
  }
  /**
   * Return a list of Security Reports at host level.
   * (hostSecurityReports.listOrganizationsHostSecurityReports)
   *
   * @param string $parent Required. The parent resource name. Must be of the form
   * `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dataset Filter response list by dataset. Example: `api`,
   * `mint`
   * @opt_param string envgroupHostname Required. Filter response list by
   * hostname.
   * @opt_param string from Filter response list by returning security reports
   * that created after this date time. Time must be in ISO date-time format like
   * '2011-12-03T10:15:30Z'.
   * @opt_param int pageSize The maximum number of security report to return in
   * the list response.
   * @opt_param string pageToken Token returned from the previous list response to
   * fetch the next page.
   * @opt_param string status Filter response list by security report status.
   * @opt_param string submittedBy Filter response list by user who submitted
   * queries.
   * @opt_param string to Filter response list by returning security reports that
   * created before this date time. Time must be in ISO date-time format like
   * '2011-12-03T10:16:30Z'.
   * @return GoogleCloudApigeeV1ListSecurityReportsResponse
   */
  public function listOrganizationsHostSecurityReports($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListSecurityReportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsHostSecurityReports::class, 'Google_Service_Apigee_Resource_OrganizationsHostSecurityReports');
