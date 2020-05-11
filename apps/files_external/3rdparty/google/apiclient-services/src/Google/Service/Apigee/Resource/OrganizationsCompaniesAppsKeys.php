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
 * The "keys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $keys = $apigeeService->keys;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsCompaniesAppsKeys extends Google_Service_Resource
{
  /**
   * Deletes a key for a company app and removes all API products associated with
   * the app. The key can no longer be used to access any APIs. (keys.delete)
   *
   * @param string $name Resource name of a company app key
   * `organizations/{org}/companies/{company}/apps/{app}/keys/{key}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey");
  }
  /**
   * Gets information about the consumer key issued to a specific company app.
   * (keys.get)
   *
   * @param string $name Resource name of a company app key
   * `organizations/{org}/companies/{company}/apps/{app}/keys/{key}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey");
  }
  /**
   * Updates an existing company app key to add additional API products or
   * attributes. Note that only a single API product can be resolved per app key
   * at runtime. API products are resolved by name, in alphabetical order. The
   * first API product found in the list will be returned.
   * (keys.updateCompanyAppKey)
   *
   * @param string $name Resource name of a company app key
   * `organizations/{org}/companies/{company}/apps/{app}/keys/{key}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Set action to approve or revoke.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey
   */
  public function updateCompanyAppKey($name, Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateCompanyAppKey', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey");
  }
}
