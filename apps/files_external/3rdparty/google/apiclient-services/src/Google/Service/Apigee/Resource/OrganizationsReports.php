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
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $reports = $apigeeService->reports;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsReports extends Google_Service_Resource
{
  /**
   * Creates a Custom Report for an Organization. A Custom Report provides Apigee
   * Customers to create custom dashboards in addition to the standard dashboards
   * which are provided. The Custom Report in its simplest form contains
   * specifications about metrics, dimensions and filters. It is important to note
   * that the custom report by itself does not provide an executable entity. The
   * Edge UI converts the custom report definition into an analytics query and
   * displays the result in a chart. (reports.create)
   *
   * @param string $parent Required. The parent organization name under which the
   * Custom Report will be created. Must be of the form:
   * `organizations/{organization_id}/reports`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomReport $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomReport
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1CustomReport $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomReport");
  }
  /**
   * Deletes an existing custom report definition (reports.delete)
   *
   * @param string $name Required. Custom Report name of the form:
   * `organizations/{organization_id}/reports/{report_name}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeleteCustomReportResponse
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeleteCustomReportResponse");
  }
  /**
   * Retrieve a custom report definition. (reports.get)
   *
   * @param string $name Required. Custom Report name of the form:
   * `organizations/{organization_id}/reports/{report_name}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomReport
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomReport");
  }
  /**
   * Return a list of Custom Reports (reports.listOrganizationsReports)
   *
   * @param string $parent Required. The parent organization name under which the
   * API product will be listed `organizations/{organization_id}/reports`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool expand Set to 'true' to get expanded details about each
   * custom report.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListCustomReportsResponse
   */
  public function listOrganizationsReports($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListCustomReportsResponse");
  }
  /**
   * Update an existing custom report definition (reports.update)
   *
   * @param string $name Required. Custom Report name of the form:
   * `organizations/{organization_id}/reports/{report_name}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomReport $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomReport
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1CustomReport $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomReport");
  }
}
