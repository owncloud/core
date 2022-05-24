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

use Google\Service\DisplayVideo\AssignedLocation;
use Google\Service\DisplayVideo\BulkEditAssignedLocationsRequest;
use Google\Service\DisplayVideo\BulkEditAssignedLocationsResponse;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListAssignedLocationsResponse;

/**
 * The "assignedLocations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $assignedLocations = $displayvideoService->assignedLocations;
 *  </code>
 */
class AdvertisersLocationListsAssignedLocations extends \Google\Service\Resource
{
  /**
   * Bulk edits multiple assignments between locations and a single location list.
   * The operation will delete the assigned locations provided in
   * BulkEditAssignedLocationsRequest.deleted_assigned_locations and then create
   * the assigned locations provided in
   * BulkEditAssignedLocationsRequest.created_assigned_locations.
   * (assignedLocations.bulkEdit)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the location list belongs.
   * @param string $locationListId Required. The ID of the location list to which
   * these assignments are assigned.
   * @param BulkEditAssignedLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditAssignedLocationsResponse
   */
  public function bulkEdit($advertiserId, $locationListId, BulkEditAssignedLocationsRequest $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'locationListId' => $locationListId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEdit', [$params], BulkEditAssignedLocationsResponse::class);
  }
  /**
   * Creates an assignment between a location and a location list.
   * (assignedLocations.create)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the location list belongs.
   * @param string $locationListId Required. The ID of the location list for which
   * the assignment will be created.
   * @param AssignedLocation $postBody
   * @param array $optParams Optional parameters.
   * @return AssignedLocation
   */
  public function create($advertiserId, $locationListId, AssignedLocation $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'locationListId' => $locationListId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AssignedLocation::class);
  }
  /**
   * Deletes the assignment between a location and a location list.
   * (assignedLocations.delete)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the location list belongs.
   * @param string $locationListId Required. The ID of the location list to which
   * this assignment is assigned.
   * @param string $assignedLocationId Required. The ID of the assigned location
   * to delete.
   * @param array $optParams Optional parameters.
   * @return DisplayvideoEmpty
   */
  public function delete($advertiserId, $locationListId, $assignedLocationId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'locationListId' => $locationListId, 'assignedLocationId' => $assignedLocationId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Lists locations assigned to a location list.
   * (assignedLocations.listAdvertisersLocationListsAssignedLocations)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the location list belongs.
   * @param string $locationListId Required. The ID of the location list to which
   * these assignments are assigned.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by location list assignment fields.
   * Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by the logical operator `OR`. *
   * A restriction has the form of `{field} {operator} {value}`. * The operator
   * must be `EQUALS (=)`. * Supported fields: - `assignedLocationId` The length
   * of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `assignedLocationId` (default) The default sorting order is ascending.
   * To specify descending order for a field, a suffix " desc" should be added to
   * the field name. Example: `assignedLocationId desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListAssignedLocations` method. If not specified, the
   * first page of results will be returned.
   * @return ListAssignedLocationsResponse
   */
  public function listAdvertisersLocationListsAssignedLocations($advertiserId, $locationListId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'locationListId' => $locationListId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAssignedLocationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersLocationListsAssignedLocations::class, 'Google_Service_DisplayVideo_Resource_AdvertisersLocationListsAssignedLocations');
