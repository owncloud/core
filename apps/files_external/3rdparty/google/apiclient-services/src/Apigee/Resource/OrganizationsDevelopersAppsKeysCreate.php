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

use Google\Service\Apigee\GoogleCloudApigeeV1DeveloperAppKey;

/**
 * The "create" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $create = $apigeeService->create;
 *  </code>
 */
class OrganizationsDevelopersAppsKeysCreate extends \Google\Service\Resource
{
  /**
   * Creates a custom consumer key and secret for a developer app. This is
   * particularly useful if you want to migrate existing consumer keys and secrets
   * to Apigee from another system. Consumer keys and secrets can contain letters,
   * numbers, underscores, and hyphens. No other special characters are allowed.
   * To avoid service disruptions, a consumer key and secret should not exceed 2
   * KBs each. **Note**: When creating the consumer key and secret, an association
   * to API products will not be made. Therefore, you should not specify the
   * associated API products in your request. Instead, use the
   * UpdateDeveloperAppKey API to make the association after the consumer key and
   * secret are created. If a consumer key and secret already exist, you can keep
   * them or delete them using the DeleteDeveloperAppKey API. (create.create)
   *
   * @param string $parent Parent of the developer app key. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps`
   * @param GoogleCloudApigeeV1DeveloperAppKey $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperAppKey
   */
  public function create($parent, GoogleCloudApigeeV1DeveloperAppKey $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1DeveloperAppKey::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsDevelopersAppsKeysCreate::class, 'Google_Service_Apigee_Resource_OrganizationsDevelopersAppsKeysCreate');
