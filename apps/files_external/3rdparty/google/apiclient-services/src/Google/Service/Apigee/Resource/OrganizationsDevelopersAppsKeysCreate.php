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
 * The "create" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $create = $apigeeService->create;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsDevelopersAppsKeysCreate extends Google_Service_Resource
{
  /**
   * Creates a custom consumer key and secret for a developer app. This is
   * particularly useful if you want to migrate existing consumer keys and secrets
   * to Apigee hybrid from another system.
   *
   * Consumer keys and secrets can contain letters, numbers, underscores, and
   * hyphens. No other special characters are allowed.
   *
   * **Note**: To avoid service disruptions, a consumer key and secret should not
   * exceed 2 KBs each.
   *
   * After creating the consumer key and secret, associate the key with an API
   * product using the UpdateDeveloperAppKey API.
   *
   * If a consumer key and secret already exist, you can keep them or delete them
   * using the DeleteDeveloperAppKey API. (create.create)
   *
   * @param string $parent Parent of the developer app key. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeveloperAppKey $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperAppKey
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1DeveloperAppKey $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperAppKey");
  }
}
