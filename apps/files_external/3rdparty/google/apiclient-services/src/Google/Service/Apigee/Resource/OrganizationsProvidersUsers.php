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
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $users = $apigeeService->users;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsProvidersUsers extends Google_Service_Resource
{
  /**
   * Deletes a user. (users.delete)
   *
   * @param string $name Required. Name of the user. Use the following structure
   * in your request:   `organizations/{org}/providers/{provider}/users/{user}`
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
   * Retrieves a user. (users.get)
   *
   * @param string $name Required. Name of the user. Use the following structure
   * in your request:   `organizations/{org}/providers/{provider}/users/{user}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUserResponse
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUserResponse");
  }
  /**
   * Lists all users. (users.listOrganizationsProvidersUsers)
   *
   * @param string $parent Required. Name of the identity provider. Use the
   * following structure in your request:
   * `organizations/{org}/providers/{provider}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startIndex Starting index of the list.
   * @opt_param string count Number of items.
   * @opt_param string sortBy Field on which to sort the list.
   * @opt_param string sortOrder Order in which to sort the list, such as
   * ascending or descending.
   * @opt_param string filter String used to filter the list.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUserListResponse
   */
  public function listOrganizationsProvidersUsers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUserListResponse");
  }
  /**
   * Updates a user. (users.update)
   *
   * @param string $name Required. Name of the user. Use the following structure
   * in your request:   `organizations/{org}/providers/{provider}/users/{user}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUser $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUserResponse
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUser $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUserResponse");
  }
}
