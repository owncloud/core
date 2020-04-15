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
class Google_Service_Apigee_Resource_OrganizationsConsumersApps extends Google_Service_Resource
{
  /**
   * Creates an app. (apps.create)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your  request:   `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CreateConsumerAppRequestBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAppResponse
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1CreateConsumerAppRequestBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAppResponse");
  }
  /**
   * Deletes an app. (apps.delete)
   *
   * @param string $name Required. Name of the app. Use the following structure in
   * your request:   `organizations/{org}/consumers/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StringResponse
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1StringResponse");
  }
  /**
   * Gets an app. (apps.get)
   *
   * @param string $name Required. Name of the app. Use the following structure in
   * your request:   `organizations/{org}/consumers/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAppResponse
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAppResponse");
  }
  /**
   * Lists all apps. (apps.listOrganizationsConsumersApps)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request:   `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListConsumerAppsResponse
   */
  public function listOrganizationsConsumersApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListConsumerAppsResponse");
  }
  /**
   * Updates an app. (apps.update)
   *
   * @param string $name Required. Name of the app. Use the following structure in
   * your request:   `organizations/{org}/consumers/apps/{app}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1PortalApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAppResponse
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1PortalApp $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAppResponse");
  }
}
