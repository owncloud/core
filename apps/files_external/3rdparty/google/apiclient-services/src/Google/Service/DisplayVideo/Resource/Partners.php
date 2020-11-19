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
 * The "partners" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $partners = $displayvideoService->partners;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_Partners extends Google_Service_Resource
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
   * @param Google_Service_DisplayVideo_BulkEditPartnerAssignedTargetingOptionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_BulkEditPartnerAssignedTargetingOptionsResponse
   */
  public function bulkEditPartnerAssignedTargetingOptions($partnerId, Google_Service_DisplayVideo_BulkEditPartnerAssignedTargetingOptionsRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulkEditPartnerAssignedTargetingOptions', array($params), "Google_Service_DisplayVideo_BulkEditPartnerAssignedTargetingOptionsResponse");
  }
  /**
   * Gets a partner. (partners.get)
   *
   * @param string $partnerId Required. The ID of the partner to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_Partner
   */
  public function get($partnerId, $optParams = array())
  {
    $params = array('partnerId' => $partnerId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_Partner");
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
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` The default sorting order is ascending. To specify
   * descending order for a field, a suffix "desc" should be added to the field
   * name. For example, `displayName desc`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListPartners` method. If not specified, the first page
   * of results will be returned.
   * @return Google_Service_DisplayVideo_ListPartnersResponse
   */
  public function listPartners($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListPartnersResponse");
  }
}
