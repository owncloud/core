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

use Google\Service\Apigee\GoogleCloudApigeeV1Attribute;
use Google\Service\Apigee\GoogleCloudApigeeV1Attributes;

/**
 * The "attributes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $attributes = $apigeeService->attributes;
 *  </code>
 */
class OrganizationsDevelopersAppsAttributes extends \Google\Service\Resource
{
  /**
   * Deletes a developer app attribute. (attributes.delete)
   *
   * @param string $name Required. Name of the developer app attribute. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/apps/{app}/attributes/{attribute}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attribute
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1Attribute::class);
  }
  /**
   * Returns a developer app attribute. (attributes.get)
   *
   * @param string $name Required. Name of the developer app attribute. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/apps/{app}/attributes/{attribute}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attribute
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1Attribute::class);
  }
  /**
   * Returns a list of all developer app attributes.
   * (attributes.listOrganizationsDevelopersAppsAttributes)
   *
   * @param string $parent Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attributes
   */
  public function listOrganizationsDevelopersAppsAttributes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1Attributes::class);
  }
  /**
   * Updates a developer app attribute. **Note**: OAuth access tokens and Key
   * Management Service (KMS) entities (apps, developers, and API products) are
   * cached for 180 seconds (current default). Any custom attributes associated
   * with these entities are cached for at least 180 seconds after the entity is
   * accessed at runtime. Therefore, an `ExpiresIn` element on the OAuthV2 policy
   * won't be able to expire an access token in less than 180 seconds.
   * (attributes.updateDeveloperAppAttribute)
   *
   * @param string $name Required. Name of the developer app attribute. Use the
   * following structure in your request: `organizations/{org}/developers/{develop
   * er_email}/apps/{app}/attributes/{attribute}`
   * @param GoogleCloudApigeeV1Attribute $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attribute
   */
  public function updateDeveloperAppAttribute($name, GoogleCloudApigeeV1Attribute $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateDeveloperAppAttribute', [$params], GoogleCloudApigeeV1Attribute::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsDevelopersAppsAttributes::class, 'Google_Service_Apigee_Resource_OrganizationsDevelopersAppsAttributes');
