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

namespace Google\Service\ChromePolicy\Resource;

use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1BatchDeleteGroupPoliciesRequest;
use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1BatchModifyGroupPoliciesRequest;
use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1ListGroupPriorityOrderingRequest;
use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1ListGroupPriorityOrderingResponse;
use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1UpdateGroupPriorityOrderingRequest;
use Google\Service\ChromePolicy\GoogleProtobufEmpty;

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromepolicyService = new Google\Service\ChromePolicy(...);
 *   $groups = $chromepolicyService->groups;
 *  </code>
 */
class CustomersPoliciesGroups extends \Google\Service\Resource
{
  /**
   * Delete multiple policy values that are applied to a specific group. All
   * targets must have the same target format. That is to say that they must point
   * to the same target resource and must have the same keys specified in
   * `additionalTargetKeyNames`, though the values for those keys may be
   * different. On failure the request will return the error details as part of
   * the google.rpc.Status. (groups.batchDelete)
   *
   * @param string $customer ID of the Google Workspace account or literal
   * "my_customer" for the customer associated to the request.
   * @param GoogleChromePolicyVersionsV1BatchDeleteGroupPoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function batchDelete($customer, GoogleChromePolicyVersionsV1BatchDeleteGroupPoliciesRequest $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Modify multiple policy values that are applied to a specific group. All
   * targets must have the same target format. That is to say that they must point
   * to the same target resource and must have the same keys specified in
   * `additionalTargetKeyNames`, though the values for those keys may be
   * different. On failure the request will return the error details as part of
   * the google.rpc.Status. (groups.batchModify)
   *
   * @param string $customer ID of the Google Workspace account or literal
   * "my_customer" for the customer associated to the request.
   * @param GoogleChromePolicyVersionsV1BatchModifyGroupPoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function batchModify($customer, GoogleChromePolicyVersionsV1BatchModifyGroupPoliciesRequest $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchModify', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Retrieve a group priority ordering for an app. The target app must be
   * supplied in `additionalTargetKeyNames` in the PolicyTargetKey. On failure the
   * request will return the error details as part of the google.rpc.Status.
   * (groups.listGroupPriorityOrdering)
   *
   * @param string $customer Required. ID of the Google Workspace account or
   * literal "my_customer" for the customer associated to the request.
   * @param GoogleChromePolicyVersionsV1ListGroupPriorityOrderingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleChromePolicyVersionsV1ListGroupPriorityOrderingResponse
   */
  public function listGroupPriorityOrdering($customer, GoogleChromePolicyVersionsV1ListGroupPriorityOrderingRequest $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('listGroupPriorityOrdering', [$params], GoogleChromePolicyVersionsV1ListGroupPriorityOrderingResponse::class);
  }
  /**
   * Update a group priority ordering for an app. The target app must be supplied
   * in `additionalTargetKeyNames` in the PolicyTargetKey. On failure the request
   * will return the error details as part of the google.rpc.Status.
   * (groups.updateGroupPriorityOrdering)
   *
   * @param string $customer Required. ID of the Google Workspace account or
   * literal "my_customer" for the customer associated to the request.
   * @param GoogleChromePolicyVersionsV1UpdateGroupPriorityOrderingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function updateGroupPriorityOrdering($customer, GoogleChromePolicyVersionsV1UpdateGroupPriorityOrderingRequest $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateGroupPriorityOrdering', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersPoliciesGroups::class, 'Google_Service_ChromePolicy_Resource_CustomersPoliciesGroups');
