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
 * The "apiproducts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $apiproducts = $apigeeService->apiproducts;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsDevelopersAppsKeysApiproducts extends Google_Service_Resource
{
  /**
   * Removes an API product from an app's consumer key. After the API product is
   * removed, the app cannot access the API resources defined in that API product.
   * **Note**: The consumer key is not removed, only its association with the API
   * product. (apiproducts.delete)
   *
   * @param string $name Name of the API product in the developer app key in the
   * following format: `organizations/{org}/developers/{developer_email}/apps/{app
   * }/keys/{key}/apiproducts/{apiproduct}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperAppKey
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperAppKey");
  }
  /**
   * Approves or revokes the consumer key for an API product. After a consumer key
   * is approved, the app can use it to access APIs. A consumer key that is
   * revoked or pending cannot be used to access an API. Any access tokens
   * associated with a revoked consumer key will remain active. However, Apigee
   * checks the status of the consumer key and if set to `revoked` will not allow
   * access to the API. (apiproducts.updateDeveloperAppKeyApiProduct)
   *
   * @param string $name Name of the API product in the developer app key in the
   * following format: `organizations/{org}/developers/{developer_email}/apps/{app
   * }/keys/{key}/apiproducts/{apiproduct}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Approve or revoke the consumer key by setting this
   * value to `approve` or `revoke`, respectively.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function updateDeveloperAppKeyApiProduct($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('updateDeveloperAppKeyApiProduct', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
}
