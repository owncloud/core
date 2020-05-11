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
 * The "assignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryreservationService = new Google_Service_BigQueryReservation(...);
 *   $assignments = $bigqueryreservationService->assignments;
 *  </code>
 */
class Google_Service_BigQueryReservation_Resource_ProjectsLocationsReservationsAssignments extends Google_Service_Resource
{
  /**
   * Creates an object which allows the given project to submit jobs of a certain
   * type using slots from the specified reservation. Currently a resource
   * (project, folder, organization) can only have one assignment per {job_type,
   * location}, and that reservation will be used for all jobs of the matching
   * type. Within the organization, different assignments can be created on
   * projects, folders or organization level. During query execution, the
   * assignment is looked up at the project, folder and organization levels in
   * that order. The first assignment found is applied to the query. When creating
   * assignments, it does not matter if other assignments exist at higher levels.
   * E.g: organizationA contains project1, project2. Assignments for
   * organizationA, project1 and project2 could all be created, mapping to the
   * same or different reservations. Returns `google.rpc.Code.PERMISSION_DENIED`
   * if user does not have 'bigquery.admin' permissions on the project using the
   * reservation and the project that owns this reservation. Returns
   * `google.rpc.Code.INVALID_ARGUMENT` when location of the assignment does not
   * match location of the reservation. (assignments.create)
   *
   * @param string $parent Required. The parent resource name of the assignment
   * E.g.: projects/myproject/locations/US/reservations/team1-prod
   * @param Google_Service_BigQueryReservation_Assignment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_Assignment
   */
  public function create($parent, Google_Service_BigQueryReservation_Assignment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigQueryReservation_Assignment");
  }
  /**
   * Deletes a assignment. No expansion will happen. E.g: organizationA contains
   * project1 and project2. Reservation res1 exists. CreateAssignment was invoked
   * previously and following assignments were created explicitly:       Then
   * deletion of  won't affect . After deletion of , queries from project1 will
   * still use res1, while queries from project2 will use on-demand mode.
   * (assignments.delete)
   *
   * @param string $name Required. Name of the resource, e.g.:
   * projects/myproject/locations/US/reservations/team1-prod/assignments/123
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_BigqueryreservationEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_BigQueryReservation_BigqueryreservationEmpty");
  }
  /**
   * Lists assignments. Only explicitly created assignments will be returned. E.g:
   * organizationA contains project1 and project2. Reservation res1 exists.
   * CreateAssignment was invoked previously and following assignments were
   * created explicitly:       Then this API will just return the above two
   * assignments for reservation res1, and no expansion/merge will happen.
   * Wildcard "-" can be used for reservations in the request. In that case all
   * assignments belongs to the specified project and location will be listed.
   * Note "-" cannot be used for projects nor locations.
   * (assignments.listProjectsLocationsReservationsAssignments)
   *
   * @param string $parent Required. The parent resource name e.g.:
   * projects/myproject/locations/US/reservations/team1-prod Or:
   * projects/myproject/locations/US/reservations/-
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return.
   * @return Google_Service_BigQueryReservation_ListAssignmentsResponse
   */
  public function listProjectsLocationsReservationsAssignments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigQueryReservation_ListAssignmentsResponse");
  }
  /**
   * Moves a assignment under a new reservation. Customers can do this by deleting
   * the existing assignment followed by creating another assignment under the new
   * reservation, but this method provides a transactional way to do so, to make
   * sure the assignee always has an associated reservation. Without the method
   * customers might see some queries run on-demand which might be unexpected.
   * (assignments.move)
   *
   * @param string $name Required. The resource name of the assignment, e.g.:
   * projects/myproject/locations/US/reservations/team1-prod/assignments/123
   * @param Google_Service_BigQueryReservation_MoveAssignmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_Assignment
   */
  public function move($name, Google_Service_BigQueryReservation_MoveAssignmentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_BigQueryReservation_Assignment");
  }
}
