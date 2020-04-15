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
 * The "companies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $companies = $apigeeService->companies;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsCompanies extends Google_Service_Resource
{
  /**
   * Creates an app for a company. Note that you must first create a profile for
   * the company in your organization before you can register apps that are
   * associated with the company. (companies.create)
   *
   * @param string $parent Name of org that the company will be created in
   * `{parent=organizations}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Company $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Company
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1Company $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Company");
  }
  /**
   * Deletes an existing company. (companies.delete)
   *
   * @param string $name The company resource name
   * `organizations/{org}/companies/{company}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Company
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Company");
  }
  /**
   * List details for a company. (companies.get)
   *
   * @param string $name The company resource name
   * `organizations/{org}/companies/{company}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Company
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Company");
  }
  /**
   * List all companies in an organization, and optionally returns an expanded
   * list of companies, displaying a full profile for each company in the
   * organization. (companies.listOrganizationsCompanies)
   *
   * @param string $parent The parent organization name `organizations/{org}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string count Limits the list to the number you specify. The limit
   * is 100.
   * @opt_param bool expand Set expand to true to return a full profile for each
   * company.
   * @opt_param bool includeDevelopers Optional. include developers in the
   * response.
   * @opt_param string startKey To filter the keys that are returned, enter the
   * email of a developer that the list will start with.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListCompaniesResponse
   */
  public function listOrganizationsCompanies($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListCompaniesResponse");
  }
  /**
   * Updates an existing company. Send the complete company record as a payload
   * with any changes you want to make. Note that to change the status of the
   * Company you use Set the Status of a Company. The attributes in the sample
   * payload below apply to company configuration in monetization. For non-
   * monetized companies, you need send only displayName. (companies.update)
   *
   * @param string $name Name of the company to be updated.
   * `{name=organizations/companies}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Company $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Specify the status as active or inactive.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Company
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1Company $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Company");
  }
}
