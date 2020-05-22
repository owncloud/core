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
class Google_Service_Apigee_Resource_OrganizationsConsumersAppsKeys extends Google_Service_Resource
{
  /**
   * Approves or revokes an API key for an app. Not a recognized rest pattern
   * (keys.approveRevokeConsumerAppKey)
   *
   * @param string $name Required. Name of the API key. Use the following
   * structure in your request:
   * `organizations/{org}/consumers/apps/{app}/keys/{key}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1KeyStatusChange $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function approveRevokeConsumerAppKey($name, Google_Service_Apigee_GoogleCloudApigeeV1KeyStatusChange $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('approveRevokeConsumerAppKey', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Creates an API key for an app. (keys.create)
   *
   * @param string $parent Required. Name of the app. Use the following structure
   * in your request:   `organizations/{org}/consumers/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StringResponse
   */
  public function create($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1StringResponse");
  }
}
