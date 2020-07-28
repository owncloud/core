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
class Google_Service_Apigee_Resource_OrganizationsApps extends Google_Service_Resource
{
  /**
   * Gets the app profile for the specified app ID. (apps.get)
   *
   * @param string $name Required. App ID in the following format:
   * `organizations/{org}/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1App
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1App");
  }
  /**
   * Lists IDs of apps within an organization that have the specified app status
   * (approved or revoked) or are of the specified app type (developer or
   * company). (apps.listOrganizationsApps)
   *
   * @param string $parent Required. Resource path of the parent in the following
   * format:  `organizations/{org}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Optional. Comma-separated list of app IDs on which to
   * filter.
   * @opt_param string keyStatus Optional. Key status of the app. Valid values
   * include `approved` or `revoked`. Defaults to `approved`.
   * @opt_param string apiProduct API product.
   * @opt_param bool expand Optional. Flag that specifies whether to return an
   * expanded list of apps for the organization. Defaults to `false`.
   * @opt_param string status Optional. Filter by the status of the app. Valid
   * values are `approved` or `revoked`. Defaults to `approved`.
   * @opt_param string startKey Returns the list of apps starting from the
   * specified app ID.
   * @opt_param string apptype Optional. Filter by the type of the app. Valid
   * values are `company` or `developer`. Defaults to `developer`.
   * @opt_param string rows Optional. Maximum number of app IDs to return.
   * Defaults to 10000.
   * @opt_param bool includeCred Optional. Flag that specifies whether to include
   * credentials in the response.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListAppsResponse
   */
  public function listOrganizationsApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListAppsResponse");
  }
}
