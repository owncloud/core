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

namespace Google\Service\CloudIdentity\Resource;

use Google\Service\CloudIdentity\CancelUserInvitationRequest;
use Google\Service\CloudIdentity\IsInvitableUserResponse;
use Google\Service\CloudIdentity\ListUserInvitationsResponse;
use Google\Service\CloudIdentity\Operation;
use Google\Service\CloudIdentity\SendUserInvitationRequest;
use Google\Service\CloudIdentity\UserInvitation;

/**
 * The "userinvitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudidentityService = new Google\Service\CloudIdentity(...);
 *   $userinvitations = $cloudidentityService->userinvitations;
 *  </code>
 */
class CustomersUserinvitations extends \Google\Service\Resource
{
  /**
   * Cancels a UserInvitation that was already sent. (userinvitations.cancel)
   *
   * @param string $name Required. `UserInvitation` name in the format
   * `customers/{customer}/userinvitations/{user_email_address}`
   * @param CancelUserInvitationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cancel($name, CancelUserInvitationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], Operation::class);
  }
  /**
   * Retrieves a UserInvitation resource. **Note:** New consumer accounts with the
   * customer's verified domain created within the previous 48 hours will not
   * appear in the result. This delay also applies to newly-verified domains.
   * (userinvitations.get)
   *
   * @param string $name Required. `UserInvitation` name in the format
   * `customers/{customer}/userinvitations/{user_email_address}`
   * @param array $optParams Optional parameters.
   * @return UserInvitation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UserInvitation::class);
  }
  /**
   * Verifies whether a user account is eligible to receive a UserInvitation (is
   * an unmanaged account). Eligibility is based on the following criteria: * the
   * email address is a consumer account and it's the primary email address of the
   * account, and * the domain of the email address matches an existing verified
   * Google Workspace or Cloud Identity domain If both conditions are met, the
   * user is eligible. **Note:** This method is not supported for Workspace
   * Essentials customers. (userinvitations.isInvitableUser)
   *
   * @param string $name Required. `UserInvitation` name in the format
   * `customers/{customer}/userinvitations/{user_email_address}`
   * @param array $optParams Optional parameters.
   * @return IsInvitableUserResponse
   */
  public function isInvitableUser($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('isInvitableUser', [$params], IsInvitableUserResponse::class);
  }
  /**
   * Retrieves a list of UserInvitation resources. **Note:** New consumer accounts
   * with the customer's verified domain created within the previous 48 hours will
   * not appear in the result. This delay also applies to newly-verified domains.
   * (userinvitations.listCustomersUserinvitations)
   *
   * @param string $parent Required. The customer ID of the Google Workspace or
   * Cloud Identity account the UserInvitation resources are associated with.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A query string for filtering
   * `UserInvitation` results by their current state, in the format:
   * `"state=='invited'"`.
   * @opt_param string orderBy Optional. The sort order of the list results. You
   * can sort the results in descending order based on either email or last update
   * timestamp but not both, using `order_by="email desc"`. Currently, sorting is
   * supported for `update_time asc`, `update_time desc`, `email asc`, and `email
   * desc`. If not specified, results will be returned based on `email asc` order.
   * @opt_param int pageSize Optional. The maximum number of UserInvitation
   * resources to return. If unspecified, at most 100 resources will be returned.
   * The maximum value is 200; values above 200 will be set to 200.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListUserInvitations` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListBooks` must match the
   * call that provided the page token.
   * @return ListUserInvitationsResponse
   */
  public function listCustomersUserinvitations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUserInvitationsResponse::class);
  }
  /**
   * Sends a UserInvitation to email. If the `UserInvitation` does not exist for
   * this request and it is a valid request, the request creates a
   * `UserInvitation`. **Note:** The `get` and `list` methods have a 48-hour delay
   * where newly-created consumer accounts will not appear in the results. You can
   * still send a `UserInvitation` to those accounts if you know the unmanaged
   * email address and IsInvitableUser==True. (userinvitations.send)
   *
   * @param string $name Required. `UserInvitation` name in the format
   * `customers/{customer}/userinvitations/{user_email_address}`
   * @param SendUserInvitationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function send($name, SendUserInvitationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('send', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersUserinvitations::class, 'Google_Service_CloudIdentity_Resource_CustomersUserinvitations');
