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
 * The "resource-entitlements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $resource_entitlements = $apigeeService->resource_entitlements;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesResourceEntitlements extends Google_Service_Resource
{
  /**
   * Lists the resource audience entitlements. (resource-entitlements.get)
   *
   * @param string $name Required. Name of the resource. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}/resource-
   * entitlements/{resourceType}/{resource}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlement
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlement");
  }
  /**
   * Updates audience entitlements for a resource. Not a recognized rest pattern
   * (resource-entitlements.updateResourceEntitlement)
   *
   * @param string $name Required. Name of the resource. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}/resource-
   * entitlements/{resourceType}/{resource}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlementData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlement
   */
  public function updateResourceEntitlement($name, Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlementData $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateResourceEntitlement', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlement");
  }
}
