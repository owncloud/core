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
 * The "orgunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromepolicyService = new Google_Service_ChromePolicy(...);
 *   $orgunits = $chromepolicyService->orgunits;
 *  </code>
 */
class Google_Service_ChromePolicy_Resource_CustomersPoliciesOrgunits extends Google_Service_Resource
{
  /**
   * Modify multiple policy values that are applied to a specific org unit so that
   * they now inherit the value from a parent (if applicable). All targets must
   * have the same target format. That is to say that they must point to the same
   * target resource and must have the same keys specified in
   * `additionalTargetKeyNames`. On failure the request will return the error
   * details as part of the google.rpc.Status. (orgunits.batchInherit)
   *
   * @param string $customer ID of the G Suite account or literal "my_customer"
   * for the customer associated to the request.
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1BatchInheritOrgUnitPoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ChromePolicy_GoogleProtobufEmpty
   */
  public function batchInherit($customer, Google_Service_ChromePolicy_GoogleChromePolicyV1BatchInheritOrgUnitPoliciesRequest $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchInherit', array($params), "Google_Service_ChromePolicy_GoogleProtobufEmpty");
  }
  /**
   * Modify multiple policy values that are applied to a specific org unit. All
   * targets must have the same target format. That is to say that they must point
   * to the same target resource and must have the same keys specified in
   * `additionalTargetKeyNames`. On failure the request will return the error
   * details as part of the google.rpc.Status. (orgunits.batchModify)
   *
   * @param string $customer ID of the G Suite account or literal "my_customer"
   * for the customer associated to the request.
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1BatchModifyOrgUnitPoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ChromePolicy_GoogleProtobufEmpty
   */
  public function batchModify($customer, Google_Service_ChromePolicy_GoogleChromePolicyV1BatchModifyOrgUnitPoliciesRequest $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchModify', array($params), "Google_Service_ChromePolicy_GoogleProtobufEmpty");
  }
}
