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
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $apps = $apigeeService->apps;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsCompaniesApps extends Google_Service_Resource
{
  /**
   * Creates an app for a company. (apps.create)
   *
   * @param string $parent Resource path of the parent:
   * `organizations/{org}/companies/{company_name}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp");
  }
  /**
   * Deletes a company app. (apps.delete)
   *
   * @param string $name name of the app resource:
   * `organizations/{org}/companies/{company_name}/apps/{app_name}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp");
  }
  /**
   * Gets the profile of a specific company app. (apps.get)
   *
   * @param string $name name of the app resource:
   * `organizations/{org}/companies/{company_name}/apps/{app_name}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp");
  }
  /**
   * List company apps in an organization. You can optionally expand the response
   * to include the profile for each app. (apps.listOrganizationsCompaniesApps)
   *
   * @param string $parent The name of a company resource:
   * `organizations/{org}/companies/{company_name}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startKey Lets you return a list of app starting with a
   * specific app name in the list.
   * @opt_param string count Limits the list to the number you specify. The limit
   * is 100.
   * @opt_param bool expand Set expand to true to return a full profile
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListCompanyAppsResponse
   */
  public function listOrganizationsCompaniesApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListCompanyAppsResponse");
  }
  /**
   * Updates an existing company app. (apps.update)
   *
   * @param string $name Resource path of the app:
   * `organizations/{org}/companies/{company_name}/apps/{app_name}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyApp");
  }
}
