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

namespace Google\Service\BigQueryReservation\Resource;

use Google\Service\BigQueryReservation\BigqueryreservationEmpty;
use Google\Service\BigQueryReservation\ListReservationsResponse;
use Google\Service\BigQueryReservation\Reservation;

/**
 * The "reservations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryreservationService = new Google\Service\BigQueryReservation(...);
 *   $reservations = $bigqueryreservationService->reservations;
 *  </code>
 */
class ProjectsLocationsReservations extends \Google\Service\Resource
{
  /**
   * Creates a new reservation resource. (reservations.create)
   *
   * @param string $parent Required. Project, location. E.g.,
   * `projects/myproject/locations/US`
   * @param Reservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string reservationId The reservation ID. It must only contain
   * lower case alphanumeric characters or dashes. It must start with a letter and
   * must not end with a dash. Its maximum length is 64 characters.
   * @return Reservation
   */
  public function create($parent, Reservation $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Reservation::class);
  }
  /**
   * Deletes a reservation. Returns `google.rpc.Code.FAILED_PRECONDITION` when
   * reservation has assignments. (reservations.delete)
   *
   * @param string $name Required. Resource name of the reservation to retrieve.
   * E.g., `projects/myproject/locations/US/reservations/team1-prod`
   * @param array $optParams Optional parameters.
   * @return BigqueryreservationEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigqueryreservationEmpty::class);
  }
  /**
   * Returns information about the reservation. (reservations.get)
   *
   * @param string $name Required. Resource name of the reservation to retrieve.
   * E.g., `projects/myproject/locations/US/reservations/team1-prod`
   * @param array $optParams Optional parameters.
   * @return Reservation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Reservation::class);
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
   * @return ListReservationsResponse
   */
  public function listProjectsLocationsReservations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReservationsResponse::class);
  }
  /**
   * Updates an existing reservation resource. (reservations.patch)
   *
   * @param string $name The resource name of the reservation, e.g.,
   * `projects/locations/reservations/team1-prod`. The reservation_id must only
   * contain lower case alphanumeric characters or dashes. It must start with a
   * letter and must not end with a dash. Its maximum length is 64 characters.
   * @param Reservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return Reservation
   */
  public function patch($name, Reservation $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Reservation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsReservations::class, 'Google_Service_BigQueryReservation_Resource_ProjectsLocationsReservations');
