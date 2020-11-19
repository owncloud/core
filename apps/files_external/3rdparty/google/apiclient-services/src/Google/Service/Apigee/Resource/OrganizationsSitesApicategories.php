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
 * The "apicategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $apicategories = $apigeeService->apicategories;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesApicategories extends Google_Service_Resource
{
  /**
   * Creates a new category on the portal. (apicategories.create)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request: `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiCategory
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiCategory");
  }
  /**
   * Deletes a category from the portal. (apicategories.delete)
   *
   * @param string $name Required. Name of the category. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apicategories/{apicategory}`
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
   * Gets a category on the portal. (apicategories.get)
   *
   * @param string $name Required. Name of the category. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apicategories/{apicategory}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiCategory
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiCategory");
  }
  /**
   * Lists the categories on the portal.
   * (apicategories.listOrganizationsSitesApicategories)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request: `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListApiCategoriesResponse
   */
  public function listOrganizationsSitesApicategories($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListApiCategoriesResponse");
  }
  /**
   * Updates a category on the portal. (apicategories.patch)
   *
   * @param string $name Required. Name of the category. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apicategories/{apicategory}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiCategory
   */
  public function patch($name, Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiCategory");
  }
}
