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

use Google\Service\Apigee\GoogleCloudApigeeV1ApiCategory;
use Google\Service\Apigee\GoogleCloudApigeeV1ApiCategoryData;
use Google\Service\Apigee\GoogleCloudApigeeV1ApiResponseWrapper;
use Google\Service\Apigee\GoogleCloudApigeeV1ListApiCategoriesResponse;

/**
 * The "apicategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $apicategories = $apigeeService->apicategories;
 *  </code>
 */
class OrganizationsSitesApicategories extends \Google\Service\Resource
{
  /**
   * Creates a new category on the portal. (apicategories.create)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request: `organizations/{org}/sites/{site}`
   * @param GoogleCloudApigeeV1ApiCategoryData $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ApiCategory
   */
  public function create($parent, GoogleCloudApigeeV1ApiCategoryData $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1ApiCategory::class);
  }
  /**
   * Deletes a category from the portal. (apicategories.delete)
   *
   * @param string $name Required. Name of the category. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apicategories/{apicategory}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1ApiResponseWrapper::class);
  }
  /**
   * Gets a category on the portal. (apicategories.get)
   *
   * @param string $name Required. Name of the category. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apicategories/{apicategory}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ApiCategory
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1ApiCategory::class);
  }
  /**
   * Lists the categories on the portal.
   * (apicategories.listOrganizationsSitesApicategories)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request: `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ListApiCategoriesResponse
   */
  public function listOrganizationsSitesApicategories($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListApiCategoriesResponse::class);
  }
  /**
   * Updates a category on the portal. (apicategories.patch)
   *
   * @param string $name Required. Name of the category. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apicategories/{apicategory}`
   * @param GoogleCloudApigeeV1ApiCategoryData $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ApiCategory
   */
  public function patch($name, GoogleCloudApigeeV1ApiCategoryData $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudApigeeV1ApiCategory::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsSitesApicategories::class, 'Google_Service_Apigee_Resource_OrganizationsSitesApicategories');
