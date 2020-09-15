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
 * The "reservations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryreservationService = new Google_Service_BigQueryReservation(...);
 *   $reservations = $bigqueryreservationService->reservations;
 *  </code>
 */
class Google_Service_BigQueryReservation_Resource_ProjectsLocationsReservations extends Google_Service_Resource
{
  /**
   * Creates a new reservation resource. (reservations.create)
   *
   * @param string $parent Required. Project, location. E.g.,
   * `projects/myproject/locations/US`
   * @param Google_Service_BigQueryReservation_Reservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string reservationId The reservation ID. This field must only
   * contain lower case alphanumeric characters or dash. Max length is 64
   * characters.
   * @return Google_Service_BigQueryReservation_Reservation
   */
  public function create($parent, Google_Service_BigQueryReservation_Reservation $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigQueryReservation_Reservation");
  }
  /**
   * Deletes a reservation. Returns `google.rpc.Code.FAILED_PRECONDITION` when
   * reservation has assignments. (reservations.delete)
   *
   * @param string $name Required. Resource name of the reservation to retrieve.
   * E.g., `projects/myproject/locations/US/reservations/team1-prod`
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
   * Returns information about the reservation. (reservations.get)
   *
   * @param string $name Required. Resource name of the reservation to retrieve.
   * E.g., `projects/myproject/locations/US/reservations/team1-prod`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryReservation_Reservation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigQueryReservation_Reservation");
  }
  /**
   * Lists all the reservations for the project in the specified location.
   * (reservations.listProjectsLocationsReservations)
   *
   * @param string $parent Required. The parent resource name containing project
   * and location, e.g.: `projects/myproject/locations/US`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return per page.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return Google_Service_BigQueryReservation_ListReservationsResponse
   */
  public function listProjectsLocationsReservations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigQueryReservation_ListReservationsResponse");
  }
  /**
   * Updates an existing reservation resource. (reservations.patch)
   *
   * @param string $name The resource name of the reservation, e.g.,
   * `projects/locations/reservations/team1-prod`.
   * @param Google_Service_BigQueryReservation_Reservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Google_Service_BigQueryReservation_Reservation
   */
  public function patch($name, Google_Service_BigQueryReservation_Reservation $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_BigQueryReservation_Reservation");
  }
}
