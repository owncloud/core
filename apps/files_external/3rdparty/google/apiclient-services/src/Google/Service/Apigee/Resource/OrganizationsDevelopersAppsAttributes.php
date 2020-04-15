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
 * The "attributes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $attributes = $apigeeService->attributes;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsDevelopersAppsAttributes extends Google_Service_Resource
{
  /**
   * Deletes a developer app attribute. (attributes.delete)
   *
   * @param string $name Required. Name of the developer app attribute. Use the
   * following structure in your request:   `organizations/{org}/developers/{devel
   * oper_email}/apps/{app}/attributes/{attribute}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Attribute");
  }
  /**
   * Returns a developer app attribute. (attributes.get)
   *
   * @param string $name Required. Name of the developer app attribute. Use the
   * following structure in your request:   `organizations/{org}/developers/{devel
   * oper_email}/apps/{app}/attributes/{attribute}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Attribute");
  }
  /**
   * Returns a list of all developer app attributes.
   * (attributes.listOrganizationsDevelopersAppsAttributes)
   *
   * @param string $parent Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attributes
   */
  public function listOrganizationsDevelopersAppsAttributes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Attributes");
  }
  /**
   * Updates a developer app attribute.
   *
   * **Note**: OAuth access tokens and Key Management Service (KMS) entities
   * (apps, developers, and API products) are cached for 180 seconds (current
   * default). Any custom attributes associated with these entities are cached for
   * at least 180 seconds after the entity is accessed at runtime. Therefore, an
   * `ExpiresIn` element on the OAuthV2 policy won't be able to expire an access
   * token in less than 180 seconds. (attributes.updateDeveloperAppAttribute)
   *
   * @param string $name Required. Name of the developer app attribute. Use the
   * following structure in your request:   `organizations/{org}/developers/{devel
   * oper_email}/apps/{app}/attributes/{attribute}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Attribute $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function updateDeveloperAppAttribute($name, Google_Service_Apigee_GoogleCloudApigeeV1Attribute $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateDeveloperAppAttribute', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Attribute");
  }
}
