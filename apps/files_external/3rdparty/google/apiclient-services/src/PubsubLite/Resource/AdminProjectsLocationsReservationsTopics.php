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

use Google\Service\PubsubLite\ListReservationTopicsResponse;

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google\Service\PubsubLite(...);
 *   $topics = $pubsubliteService->topics;
 *  </code>
 */
class AdminProjectsLocationsReservationsTopics extends \Google\Service\Resource
{
  /**
   * Lists the topics attached to the specified reservation.
   * (topics.listAdminProjectsLocationsReservationsTopics)
   *
   * @param string $name Required. The name of the reservation whose topics to
   * list. Structured like:
   * projects/{project_number}/locations/{location}/reservations/{reservation_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of topics to return. The service
   * may return fewer than this value. If unset or zero, all topics for the given
   * reservation will be returned.
   * @opt_param string pageToken A page token, received from a previous
   * `ListReservationTopics` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListReservationTopics`
   * must match the call that provided the page token.
   * @return ListReservationTopicsResponse
   */
  public function listAdminProjectsLocationsReservationsTopics($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReservationTopicsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdminProjectsLocationsReservationsTopics::class, 'Google_Service_PubsubLite_Resource_AdminProjectsLocationsReservationsTopics');
