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
use Google\Service\DisplayVideo\ListInsertionOrderAssignedTargetingOptionsResponse;

/**
 * The "assignedTargetingOptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $assignedTargetingOptions = $displayvideoService->assignedTargetingOptions;
 *  </code>
 */
class AdvertisersInsertionOrdersTargetingTypesAssignedTargetingOptions extends \Google\Service\Resource
{
  /**
   * Gets a single targeting option assigned to an insertion order.
   * (assignedTargetingOptions.get)
   *
   * @param string $advertiserId Required. The ID of the advertiser the insertion
   * order belongs to.
   * @param string $insertionOrderId Required. The ID of the insertion order the
   * assigned targeting option belongs to.
   * @param string $targetingType Required. Identifies the type of this assigned
   * targeting option.
   * @param string $assignedTargetingOptionId Required. An identifier unique to
   * the targeting type in this insertion order that identifies the assigned
   * targeting option being requested.
   * @param array $optParams Optional parameters.
   * @return AssignedTargetingOption
   */
  public function get($advertiserId, $insertionOrderId, $targetingType, $assignedTargetingOptionId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'insertionOrderId' => $insertionOrderId, 'targetingType' => $targetingType, 'assignedTargetingOptionId' => $assignedTargetingOptionId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AssignedTargetingOption::class);
  }
  /**
   * Lists the targeting options assigned to an insertion order. (assignedTargetin
   * gOptions.listAdvertisersInsertionOrdersTargetingTypesAssignedTargetingOptions
   * )
   *
   * @param string $advertiserId Required. The ID of the advertiser the insertion
   * order belongs to.
   * @param string $insertionOrderId Required. The ID of the insertion order to
   * list assigned targeting options for.
   * @param string $targetingType Required. Identifies the type of assigned
   * targeting options to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by assigned targeting option
   * properties. Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by the logical operator `OR`. *
   * A restriction has the form of `{field} {operator} {value}`. * The operator
   * must be `EQUALS (=)`. * Supported fields: - `assignedTargetingOptionId` -
   * `inheritance` Examples: * AssignedTargetingOptions with ID 1 or 2
   * `assignedTargetingOptionId="1" OR assignedTargetingOptionId="2"` *
   * AssignedTargetingOptions with inheritance status of NOT_INHERITED or
   * INHERITED_FROM_PARTNER `inheritance="NOT_INHERITED" OR
   * inheritance="INHERITED_FROM_PARTNER"` The length of this field should be no
   * more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `assignedTargetingOptionId` (default) The default sorting order is
   * ascending. To specify descending order for a field, a suffix "desc" should be
   * added to the field name. Example: `assignedTargetingOptionId desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `5000`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListInsertionOrderAssignedTargetingOptions` method. If
   * not specified, the first page of results will be returned.
   * @return ListInsertionOrderAssignedTargetingOptionsResponse
   */
  public function listAdvertisersInsertionOrdersTargetingTypesAssignedTargetingOptions($advertiserId, $insertionOrderId, $targetingType, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'insertionOrderId' => $insertionOrderId, 'targetingType' => $targetingType];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInsertionOrderAssignedTargetingOptionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersInsertionOrdersTargetingTypesAssignedTargetingOptions::class, 'Google_Service_DisplayVideo_Resource_AdvertisersInsertionOrdersTargetingTypesAssignedTargetingOptions');
