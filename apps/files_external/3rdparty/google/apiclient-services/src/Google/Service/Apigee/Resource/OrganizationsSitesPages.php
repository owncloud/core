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
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $pages = $apigeeService->pages;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesPages extends Google_Service_Resource
{
  /**
   * Updates the draft content of a page on the portal. (pages.content)
   *
   * @param string $parent Required. Name of the page. Use the following structure
   * in your request:  `organizations/{org}/sites/{site}/pages/{page}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1PageContentPayload $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function content($parent, Google_Service_Apigee_GoogleCloudApigeeV1PageContentPayload $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('content', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Creates a new page on the portal. (pages.create)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:  `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1PageBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Page
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1PageBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Page");
  }
  /**
   * Deletes a page from the portal. (pages.delete)
   *
   * @param string $name Required. Name of the page. Use the following structure
   * in your request:  `organizations/{org}/sites/{site}/pages/{page}`
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
   * Gets a page on the portal. (pages.get)
   *
   * @param string $name Required. Name of the page. Use the following structure
   * in your request:  `organizations/{org}/sites/{site}/pages/{page}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Page
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Page");
  }
  /**
   * Lists the pages on the portal. (pages.listOrganizationsSitesPages)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:  `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListPagesResponse
   */
  public function listOrganizationsSitesPages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListPagesResponse");
  }
  /**
   * Publishes a page on the portal. (pages.publish)
   *
   * @param string $parent Required. Name of the page. Use the following structure
   * in your request:  `organizations/{org}/sites/{site}/pages/{page}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function publish($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Unpublishes a page on the portal. (pages.unpublish)
   *
   * @param string $parent Required. Name of the page. Use the following structure
   * in your request:  `organizations/{org}/sites/{site}/pages/{page}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function unpublish($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('unpublish', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Updates a page on the portal. (pages.update)
   *
   * @param string $name Required. Name of the page. Use the following structure
   * in your request:  `organizations/{org}/sites/{site}/pages/{page}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1PageBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Page
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1PageBody $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Page");
  }
}
