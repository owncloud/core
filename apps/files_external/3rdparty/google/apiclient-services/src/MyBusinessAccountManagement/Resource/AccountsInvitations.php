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

namespace Google\Service\MyBusinessAccountManagement\Resource;

use Google\Service\MyBusinessAccountManagement\AcceptInvitationRequest;
use Google\Service\MyBusinessAccountManagement\DeclineInvitationRequest;
use Google\Service\MyBusinessAccountManagement\ListInvitationsResponse;
use Google\Service\MyBusinessAccountManagement\MybusinessaccountmanagementEmpty;

/**
 * The "invitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessaccountmanagementService = new Google\Service\MyBusinessAccountManagement(...);
 *   $invitations = $mybusinessaccountmanagementService->invitations;
 *  </code>
 */
class AccountsInvitations extends \Google\Service\Resource
{
  /**
   * Accepts the specified invitation. (invitations.accept)
   *
   * @param string $name Required. The name of the invitation that is being
   * accepted. `accounts/{account_id}/invitations/{invitation_id}`
   * @param AcceptInvitationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MybusinessaccountmanagementEmpty
   */
  public function accept($name, AcceptInvitationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('accept', [$params], MybusinessaccountmanagementEmpty::class);
  }
  /**
   * Declines the specified invitation. (invitations.decline)
   *
   * @param string $name Required. The name of the account invitation that is
   * being declined. `accounts/{account_id}/invitations/{invitation_id}`
   * @param DeclineInvitationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MybusinessaccountmanagementEmpty
   */
  public function decline($name, DeclineInvitationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('decline', [$params], MybusinessaccountmanagementEmpty::class);
  }
  /**
   * Lists pending invitations for the specified account.
   * (invitations.listAccountsInvitations)
   *
   * @param string $parent Required. The name of the account from which the list
   * of invitations is being retrieved. `accounts/{account_id}/invitations`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filtering the response is supported via
   * the Invitation.target_type field.
   * @return ListInvitationsResponse
   */
  public function listAccountsInvitations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInvitationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsInvitations::class, 'Google_Service_MyBusinessAccountManagement_Resource_AccountsInvitations');
