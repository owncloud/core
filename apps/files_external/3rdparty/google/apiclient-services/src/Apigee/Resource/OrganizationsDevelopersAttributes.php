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
class OrganizationsDevelopersAttributes extends \Google\Service\Resource
{
  /**
   * Deletes a developer attribute. (attributes.delete)
   *
   * @param string $name Required. Name of the developer attribute. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}/attributes/{attribute}`
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
   * Returns the value of the specified developer attribute. (attributes.get)
   *
   * @param string $name Required. Name of the developer attribute. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}/attributes/{attribute}`
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
   * Returns a list of all developer attributes.
   * (attributes.listOrganizationsDevelopersAttributes)
   *
   * @param string $parent Required. Email address of the developer for which
   * attributes are being listed. Use the following structure in your request:
   * `organizations/{org}/developers/{developer_email}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attributes
   */
  public function listOrganizationsDevelopersAttributes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1Attributes::class);
  }
  /**
   * Updates a developer attribute. **Note**: OAuth access tokens and Key
   * Management Service (KMS) entities (apps, developers, and API products) are
   * cached for 180 seconds (default). Any custom attributes associated with these
   * entities are cached for at least 180 seconds after the entity is accessed at
   * runtime. Therefore, an `ExpiresIn` element on the OAuthV2 policy won't be
   * able to expire an access token in less than 180 seconds.
   * (attributes.updateDeveloperAttribute)
   *
   * @param string $name Required. Name of the developer attribute. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}/attributes/{attribute}`
   * @param GoogleCloudApigeeV1Attribute $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attribute
   */
  public function updateDeveloperAttribute($name, GoogleCloudApigeeV1Attribute $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateDeveloperAttribute', [$params], GoogleCloudApigeeV1Attribute::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsDevelopersAttributes::class, 'Google_Service_Apigee_Resource_OrganizationsDevelopersAttributes');
