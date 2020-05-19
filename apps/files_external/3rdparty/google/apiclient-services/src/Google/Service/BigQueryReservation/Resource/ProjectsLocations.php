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
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryreservationService = new Google_Service_BigQueryReservation(...);
 *   $locations = $bigqueryreservationService->locations;
 *  </code>
 */
class Google_Service_BigQueryReservation_Resource_ProjectsLocations extends Google_Service_Resource
{
  /**
   * Retrieves a BI reservation. (locations.getBiReservation)
   *
   * @param string $name Required. Name of the requested reservation, for example:
   * `projects/{project_id}/locations/{location_id}/bireservation`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_BiReservation
   */
  public function getBiReservation($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getBiReservation', array($params), "Google_Service_BigQueryReservation_BiReservation");
  }
  /**
   * Looks up assignments for a specified resource for a particular region. If the
   * request is about a project:
   *
   * 1. Assignments created on the project will be returned if they exist. 2.
   * Otherwise assignments created on the closest ancestor will be    returned. 3.
   * Assignments for different JobTypes will all be returned.
   *
   * The same logic applies if the request is about a folder.
   *
   * If the request is about an organization, then assignments created on the
   * organization will be returned (organization doesn't have ancestors).
   *
   * Comparing to ListAssignments, there are some behavior differences:
   *
   * 1. permission on the assignee will be verified in this API. 2. Hierarchy
   * lookup (project->folder->organization) happens in this API. 3. Parent here is
   * `projects/locations`, instead of    `projects/locationsreservations`.
   *
   * **Note** "-" cannot be used for projects nor locations.
   * (locations.searchAssignments)
   *
   * @param string $parent Required. The resource name of the admin
   * project(containing project and location), e.g.:
   * "projects/myproject/locations/US".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return per page.
   * @opt_param string query Please specify resource name as assignee in the
   * query.
   *
   * Examples:
   *
   * * `assignee=projects/myproject` * `assignee=folders/123` *
   * `assignee=organizations/456`
   * @return Google_Service_BigQueryReservation_SearchAssignmentsResponse
   */
  public function searchAssignments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('searchAssignments', array($params), "Google_Service_BigQueryReservation_SearchAssignmentsResponse");
  }
  /**
   * Updates a BI reservation.
   *
   * Only fields specified in the `field_mask` are updated.
   *
   * A singleton BI reservation always exists with default size 0. In order to
   * reserve BI capacity it needs to be updated to an amount greater than 0. In
   * order to release BI capacity reservation size must be set to 0.
   * (locations.updateBiReservation)
   *
   * @param string $name The resource name of the singleton BI reservation.
   * Reservation names have the form
   * `projects/{project_id}/locations/{location_id}/bireservation`.
   * @param Google_Service_BigQueryReservation_BiReservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A list of fields to be updated in this request.
   * @return Google_Service_BigQueryReservation_BiReservation
   */
  public function updateBiReservation($name, Google_Service_BigQueryReservation_BiReservation $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateBiReservation', array($params), "Google_Service_BigQueryReservation_BiReservation");
  }
}
