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

use Google\Service\DisplayVideo\BulkEditPartnerAssignedTargetingOptionsRequest;
use Google\Service\DisplayVideo\BulkEditPartnerAssignedTargetingOptionsResponse;
use Google\Service\DisplayVideo\ListPartnersResponse;
use Google\Service\DisplayVideo\Partner;

/**
 * The "partners" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $partners = $displayvideoService->partners;
 *  </code>
 */
class Partners extends \Google\Service\Resource
{
  /**
   * Bulk edits targeting options under a single partner. The operation will
   * delete the assigned targeting options provided in
   * BulkEditPartnerAssignedTargetingOptionsRequest.deleteRequests and then create
   * the assigned targeting options provided in
   * BulkEditPartnerAssignedTargetingOptionsRequest.createRequests .
   * (partners.bulkEditPartnerAssignedTargetingOptions)
   *
   * @param string $partnerId Required. The ID of the partner.
   * @param BulkEditPartnerAssignedTargetingOptionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditPartnerAssignedTargetingOptionsResponse
   */
  public function bulkEditPartnerAssignedTargetingOptions($partnerId, BulkEditPartnerAssignedTargetingOptionsRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEditPartnerAssignedTargetingOptions', [$params], BulkEditPartnerAssignedTargetingOptionsResponse::class);
  }
  /**
   * Gets a partner. (partners.get)
   *
   * @param string $partnerId Required. The ID of the partner to fetch.
   * @param array $optParams Optional parameters.
   * @return Partner
   */
  public function get($partnerId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Partner::class);
  }
  /**
   * Lists partners that are accessible to the current user. The order is defined
   * by the order_by parameter. (partners.listPartners)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by partner properties. Supported
   * syntax: * Filter expressions are made up of one or more restrictions. *
   * Restrictions can be combined by `AND` or `OR` logical operators. A sequence
   * of restrictions implicitly uses `AND`. * A restriction has the form of
   * `{field} {operator} {value}`. * The operator must be `EQUALS (=)`. *
   * Supported fields: - `entityStatus` Examples: * All active partners:
   * `entityStatus="ENTITY_STATUS_ACTIVE"` The length of this field should be no
   * more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` The default sorting order is ascending. To specify
   * descending order for a field, a suffix "desc" should be added to the field
   * name. For example, `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListPartners` method. If not specified, the first page
   * of results will be returned.
   * @return ListPartnersResponse
   */
  public function listPartners($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPartnersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Partners::class, 'Google_Service_DisplayVideo_Resource_Partners');
