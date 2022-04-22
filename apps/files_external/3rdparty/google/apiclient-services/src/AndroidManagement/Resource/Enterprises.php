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

namespace Google\Service\AndroidManagement\Resource;

use Google\Service\AndroidManagement\AndroidmanagementEmpty;
use Google\Service\AndroidManagement\Enterprise;
use Google\Service\AndroidManagement\ListEnterprisesResponse;

/**
 * The "enterprises" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google\Service\AndroidManagement(...);
 *   $enterprises = $androidmanagementService->enterprises;
 *  </code>
 */
class Enterprises extends \Google\Service\Resource
{
  /**
   * Creates an enterprise. This is the last step in the enterprise signup flow.
   * (enterprises.create)
   *
   * @param Enterprise $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool agreementAccepted Whether the enterprise admin has seen and
   * agreed to the managed Google Play Agreement
   * (https://www.android.com/enterprise/terms/). Do not set this field for any
   * customer-managed enterprise (https://developers.google.com/android/management
   * /create-enterprise#customer-managed_enterprises). Set this to field to true
   * for all EMM-managed enterprises
   * (https://developers.google.com/android/management/create-enterprise#emm-
   * managed_enterprises).
   * @opt_param string enterpriseToken The enterprise token appended to the
   * callback URL. Set this when creating a customer-managed enterprise
   * (https://developers.google.com/android/management/create-enterprise#customer-
   * managed_enterprises) and not when creating a deprecated EMM-managed
   * enterprise (https://developers.google.com/android/management/create-
   * enterprise#emm-managed_enterprises).
   * @opt_param string projectId The ID of the Google Cloud Platform project which
   * will own the enterprise.
   * @opt_param string signupUrlName The name of the SignupUrl used to sign up for
   * the enterprise. Set this when creating a customer-managed enterprise
   * (https://developers.google.com/android/management/create-enterprise#customer-
   * managed_enterprises) and not when creating a deprecated EMM-managed
   * enterprise (https://developers.google.com/android/management/create-
   * enterprise#emm-managed_enterprises).
   * @return Enterprise
   */
  public function create(Enterprise $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Enterprise::class);
  }
  /**
   * Deletes an enterprise. Only available for EMM-managed enterprises.
   * (enterprises.delete)
   *
   * @param string $name The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param array $optParams Optional parameters.
   * @return AndroidmanagementEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AndroidmanagementEmpty::class);
  }
  /**
   * Gets an enterprise. (enterprises.get)
   *
   * @param string $name The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param array $optParams Optional parameters.
   * @return Enterprise
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Enterprise::class);
  }
  /**
   * Lists EMM-managed enterprises. Only BASIC fields are returned.
   * (enterprises.listEnterprises)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The requested page size. The actual page size may be
   * fixed to a min or max value.
   * @opt_param string pageToken A token identifying a page of results returned by
   * the server.
   * @opt_param string projectId Required. The Cloud project ID of the EMM
   * managing the enterprises.
   * @opt_param string view Specifies which Enterprise fields to return. This
   * method only supports BASIC.
   * @return ListEnterprisesResponse
   */
  public function listEnterprises($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEnterprisesResponse::class);
  }
  /**
   * Updates an enterprise. (enterprises.patch)
   *
   * @param string $name The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param Enterprise $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask indicating the fields to update.
   * If not set, all modifiable fields will be modified.
   * @return Enterprise
   */
  public function patch($name, Enterprise $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Enterprise::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Enterprises::class, 'Google_Service_AndroidManagement_Resource_Enterprises');
