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
 * The "policies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromepolicyService = new Google_Service_ChromePolicy(...);
 *   $policies = $chromepolicyService->policies;
 *  </code>
 */
class Google_Service_ChromePolicy_Resource_CustomersPolicies extends Google_Service_Resource
{
  /**
   * Gets the resolved policy values for a list of policies that match a search
   * query. (policies.resolve)
   *
   * @param string $customer ID of the G Suite account or literal "my_customer"
   * for the customer associated to the request.
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1ResolveRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1ResolveResponse
   */
  public function resolve($customer, Google_Service_ChromePolicy_GoogleChromePolicyV1ResolveRequest $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resolve', array($params), "Google_Service_ChromePolicy_GoogleChromePolicyV1ResolveResponse");
  }
}
