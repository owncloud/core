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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\EditCustomerMatchMembersRequest;
use Google\Service\DisplayVideo\EditCustomerMatchMembersResponse;
use Google\Service\DisplayVideo\FirstAndThirdPartyAudience;
use Google\Service\DisplayVideo\ListFirstAndThirdPartyAudiencesResponse;

/**
 * The "firstAndThirdPartyAudiences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $firstAndThirdPartyAudiences = $displayvideoService->firstAndThirdPartyAudiences;
 *  </code>
 */
class FirstAndThirdPartyAudiences extends \Google\Service\Resource
{
  /**
   * Creates a FirstAndThirdPartyAudience. Only supported for the following
   * audience_type: * `CUSTOMER_MATCH_CONTACT_INFO` * `CUSTOMER_MATCH_DEVICE_ID`
   * (firstAndThirdPartyAudiences.create)
   *
   * @param FirstAndThirdPartyAudience $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Required. The ID of the advertiser under whom
   * the FirstAndThirdPartyAudience will be created.
   * @return FirstAndThirdPartyAudience
   */
  public function create(FirstAndThirdPartyAudience $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], FirstAndThirdPartyAudience::class);
  }
  /**
   * Updates the member list of a Customer Match audience. Only supported for the
   * following audience_type: * `CUSTOMER_MATCH_CONTACT_INFO` *
   * `CUSTOMER_MATCH_DEVICE_ID`
   * (firstAndThirdPartyAudiences.editCustomerMatchMembers)
   *
   * @param string $firstAndThirdPartyAudienceId Required. The ID of the Customer
   * Match FirstAndThirdPartyAudience whose members will be edited.
   * @param EditCustomerMatchMembersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return EditCustomerMatchMembersResponse
   */
  public function editCustomerMatchMembers($firstAndThirdPartyAudienceId, EditCustomerMatchMembersRequest $postBody, $optParams = [])
  {
    $params = ['firstAndThirdPartyAudienceId' => $firstAndThirdPartyAudienceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('editCustomerMatchMembers', [$params], EditCustomerMatchMembersResponse::class);
  }
  /**
   * Gets a first and third party audience. (firstAndThirdPartyAudiences.get)
   *
   * @param string $firstAndThirdPartyAudienceId Required. The ID of the first and
   * third party audience to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the fetched first and third party audience.
   * @opt_param string partnerId The ID of the partner that has access to the
   * fetched first and third party audience.
   * @return FirstAndThirdPartyAudience
   */
  public function get($firstAndThirdPartyAudienceId, $optParams = [])
  {
    $params = ['firstAndThirdPartyAudienceId' => $firstAndThirdPartyAudienceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FirstAndThirdPartyAudience::class);
  }
  /**
   * Lists first and third party audiences. The order is defined by the order_by
   * parameter. (firstAndThirdPartyAudiences.listFirstAndThirdPartyAudiences)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the fetched first and third party audiences.
   * @opt_param string filter Allows filtering by first and third party audience
   * fields. Supported syntax: * Filter expressions for first and third party
   * audiences currently can only contain at most one restriction. * A restriction
   * has the form of `{field} {operator} {value}`. * The operator must be
   * `CONTAINS (:)`. * Supported fields: - `displayName` Examples: * All first and
   * third party audiences for which the display name contains "Google":
   * `displayName : "Google"`. The length of this field should be no more than 500
   * characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `firstAndThirdPartyAudienceId` (default) * `displayName` The default
   * sorting order is ascending. To specify descending order for a field, a suffix
   * "desc" should be added to the field name. Example: `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListFirstAndThirdPartyAudiences` method. If not
   * specified, the first page of results will be returned.
   * @opt_param string partnerId The ID of the partner that has access to the
   * fetched first and third party audiences.
   * @return ListFirstAndThirdPartyAudiencesResponse
   */
  public function listFirstAndThirdPartyAudiences($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFirstAndThirdPartyAudiencesResponse::class);
  }
  /**
   * Updates an existing FirstAndThirdPartyAudience. Only supported for the
   * following audience_type: * `CUSTOMER_MATCH_CONTACT_INFO` *
   * `CUSTOMER_MATCH_DEVICE_ID` (firstAndThirdPartyAudiences.patch)
   *
   * @param string $firstAndThirdPartyAudienceId Output only. The unique ID of the
   * first and third party audience. Assigned by the system.
   * @param FirstAndThirdPartyAudience $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Required. The ID of the owner advertiser of
   * the updated FirstAndThirdPartyAudience.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update. Updates are only supported for the following fields: * `displayName`
   * * `description` * `membershipDurationDays`
   * @return FirstAndThirdPartyAudience
   */
  public function patch($firstAndThirdPartyAudienceId, FirstAndThirdPartyAudience $postBody, $optParams = [])
  {
    $params = ['firstAndThirdPartyAudienceId' => $firstAndThirdPartyAudienceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], FirstAndThirdPartyAudience::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirstAndThirdPartyAudiences::class, 'Google_Service_DisplayVideo_Resource_FirstAndThirdPartyAudiences');
