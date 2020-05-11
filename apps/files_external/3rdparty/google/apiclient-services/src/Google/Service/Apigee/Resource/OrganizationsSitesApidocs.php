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
 * The "apidocs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $apidocs = $apigeeService->apidocs;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesApidocs extends Google_Service_Resource
{
  /**
   * Publishes an API to the portal. (apidocs.create)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:  `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApiDocBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1ApiDocBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc");
  }
  /**
   * Removes a published API from the portal. (apidocs.delete)
   *
   * @param string $name Required. ID of the published API. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apidocs/{apidoc}`
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
   * Removes the current OpenAPI Specification snapshot from the published API.
   * (apidocs.deleteSnapshot)
   *
   * @param string $name Required. ID of the published API. Must be of the form
   * `organizations/{org}/sites/{site}/apidocs/{apidoc}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc
   */
  public function deleteSnapshot($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deleteSnapshot', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc");
  }
  /**
   * Gets the details for a published API. (apidocs.get)
   *
   * @param string $name Required. ID of the published API. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apidocs/{apidoc}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc");
  }
  /**
   * Lists the details for all published APIs.
   * (apidocs.listOrganizationsSitesApidocs)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListApiDocsResponse
   */
  public function listOrganizationsSitesApidocs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListApiDocsResponse");
  }
  /**
   * Lists the APIs that can be published to the portal.
   * (apidocs.listPublishableProducts)
   *
   * @param string $parent Required. Use the following structure in your request:
   * `organizations/{org}/sites/{site}/apidocs:listPublishableProducts`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListPublishableProductsResponse
   */
  public function listPublishableProducts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('listPublishableProducts', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListPublishableProductsResponse");
  }
  /**
   * Uploads the contents of an OpenAPI Specification snapshot for a published
   * API. (apidocs.snapshot)
   *
   * @param string $name Required. ID of the published API. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apidocs/{apidoc}`
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc
   */
  public function snapshot($name, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('snapshot', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc");
  }
  /**
   * Updates the details or specification for a published API. (apidocs.update)
   *
   * @param string $name Required. ID of the published API. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/apidocs/{apidoc}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApiDocBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1ApiDocBody $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiDoc");
  }
}
