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
 * The "menutypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $menutypes = $apigeeService->menutypes;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesMenutypes extends Google_Service_Resource
{
  /**
   * Creates a menu type. (menutypes.create)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1MenuTypeData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1MenuType
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1MenuTypeData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1MenuType");
  }
  /**
   * Deletes a menu type. (menutypes.delete)
   *
   * @param string $name Required. Name of the menu type. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/menutypes/{menutype}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Lists all menu types. (menutypes.listOrganizationsSitesMenutypes)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListMenuTypesResponse
   */
  public function listOrganizationsSitesMenutypes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListMenuTypesResponse");
  }
}
