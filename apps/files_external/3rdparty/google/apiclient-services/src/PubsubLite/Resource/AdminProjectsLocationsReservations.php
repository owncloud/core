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

namespace Google\Service\PubsubLite\Resource;

use Google\Service\PubsubLite\ListReservationsResponse;
use Google\Service\PubsubLite\PubsubliteEmpty;
use Google\Service\PubsubLite\Reservation;

/**
 * The "reservations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google\Service\PubsubLite(...);
 *   $reservations = $pubsubliteService->reservations;
 *  </code>
 */
class AdminProjectsLocationsReservations extends \Google\Service\Resource
{
  /**
   * Creates a new reservation. (reservations.create)
   *
   * @param string $parent Required. The parent location in which to create the
   * reservation. Structured like
   * `projects/{project_number}/locations/{location}`.
   * @param Reservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string reservationId Required. The ID to use for the reservation,
   * which will become the final component of the reservation's name. This value
   * is structured like: `my-reservation-name`.
   * @return Reservation
   */
  public function create($parent, Reservation $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Reservation::class);
  }
  /**
   * Deletes the specified reservation. (reservations.delete)
   *
   * @param string $name Required. The name of the reservation to delete.
   * Structured like:
   * projects/{project_number}/locations/{location}/reservations/{reservation_id}
   * @param array $optParams Optional parameters.
   * @return PubsubliteEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], PubsubliteEmpty::class);
  }
  /**
   * Returns the reservation configuration. (reservations.get)
   *
   * @param string $name Required. The name of the reservation whose configuration
   * to return. Structured like:
   * projects/{project_number}/locations/{location}/reservations/{reservation_id}
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
   * Returns the list of reservations for the given project.
   * (reservations.listAdminProjectsLocationsReservations)
   *
   * @param string $parent Required. The parent whose reservations are to be
   * listed. Structured like `projects/{project_number}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of reservations to return. The
   * service may return fewer than this value. If unset or zero, all reservations
   * for the parent will be returned.
   * @opt_param string pageToken A page token, received from a previous
   * `ListReservations` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListReservations` must match
   * the call that provided the page token.
   * @return ListReservationsResponse
   */
  public function listAdminProjectsLocationsReservations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReservationsResponse::class);
  }
  /**
   * Updates properties of the specified reservation. (reservations.patch)
   *
   * @param string $name The name of the reservation. Structured like:
   * projects/{project_number}/locations/{location}/reservations/{reservation_id}
   * @param Reservation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A mask specifying the reservation
   * fields to change.
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
class_alias(AdminProjectsLocationsReservations::class, 'Google_Service_PubsubLite_Resource_AdminProjectsLocationsReservations');
