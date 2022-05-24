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

use Google\Service\DisplayVideo\AssignedTargetingOption;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListPartnerAssignedTargetingOptionsResponse;

/**
 * The "assignedTargetingOptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $assignedTargetingOptions = $displayvideoService->assignedTargetingOptions;
 *  </code>
 */
class PartnersTargetingTypesAssignedTargetingOptions extends \Google\Service\Resource
{
  /**
   * Assigns a targeting option to a partner. Returns the assigned targeting
   * option if successful. (assignedTargetingOptions.create)
   *
   * @param string $partnerId Required. The ID of the partner.
   * @param string $targetingType Required. Identifies the type of this assigned
   * targeting option. Supported targeting types: * `TARGETING_TYPE_CHANNEL`
   * @param AssignedTargetingOption $postBody
   * @param array $optParams Optional parameters.
   * @return AssignedTargetingOption
   */
  public function create($partnerId, $targetingType, AssignedTargetingOption $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'targetingType' => $targetingType, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AssignedTargetingOption::class);
  }
  /**
   * Deletes an assigned targeting option from a partner.
   * (assignedTargetingOptions.delete)
   *
   * @param string $partnerId Required. The ID of the partner.
   * @param string $targetingType Required. Identifies the type of this assigned
   * targeting option. Supported targeting types: * `TARGETING_TYPE_CHANNEL`
   * @param string $assignedTargetingOptionId Required. The ID of the assigned
   * targeting option to delete.
   * @param array $optParams Optional parameters.
   * @return DisplayvideoEmpty
   */
  public function delete($partnerId, $targetingType, $assignedTargetingOptionId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'targetingType' => $targetingType, 'assignedTargetingOptionId' => $assignedTargetingOptionId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Gets a single targeting option assigned to a partner.
   * (assignedTargetingOptions.get)
   *
   * @param string $partnerId Required. The ID of the partner.
   * @param string $targetingType Required. Identifies the type of this assigned
   * targeting option. Supported targeting types: * `TARGETING_TYPE_CHANNEL`
   * @param string $assignedTargetingOptionId Required. An identifier unique to
   * the targeting type in this partner that identifies the assigned targeting
   * option being requested.
   * @param array $optParams Optional parameters.
   * @return AssignedTargetingOption
   */
  public function get($partnerId, $targetingType, $assignedTargetingOptionId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'targetingType' => $targetingType, 'assignedTargetingOptionId' => $assignedTargetingOptionId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AssignedTargetingOption::class);
  }
  /**
   * Lists the targeting options assigned to a partner.
   * (assignedTargetingOptions.listPartnersTargetingTypesAssignedTargetingOptions)
   *
   * @param string $partnerId Required. The ID of the partner.
   * @param string $targetingType Required. Identifies the type of assigned
   * targeting options to list. Supported targeting types: *
   * `TARGETING_TYPE_CHANNEL`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by assigned targeting option
   * properties. Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by the logical operator `OR`. *
   * A restriction has the form of `{field} {operator} {value}`. * The operator
   * must be `EQUALS (=)`. * Supported fields: - `assignedTargetingOptionId`
   * Examples: * AssignedTargetingOption with ID 123456
   * `assignedTargetingOptionId="123456"` The length of this field should be no
   * more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `assignedTargetingOptionId` (default) The default sorting order is
   * ascending. To specify descending order for a field, a suffix "desc" should be
   * added to the field name. Example: `assignedTargetingOptionId desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListPartnerAssignedTargetingOptions` method. If not
   * specified, the first page of results will be returned.
   * @return ListPartnerAssignedTargetingOptionsResponse
   */
  public function listPartnersTargetingTypesAssignedTargetingOptions($partnerId, $targetingType, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'targetingType' => $targetingType];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPartnerAssignedTargetingOptionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersTargetingTypesAssignedTargetingOptions::class, 'Google_Service_DisplayVideo_Resource_PartnersTargetingTypesAssignedTargetingOptions');
