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

namespace Google\Service\GamesManagement\Resource;

use Google\Service\GamesManagement\EventsResetMultipleForAllRequest;

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google\Service\GamesManagement(...);
 *   $events = $gamesManagementService->events;
 *  </code>
 */
class Events extends \Google\Service\Resource
{
  /**
   * Resets all player progress on the event with the given ID for the currently
   * authenticated player. This method is only accessible to whitelisted tester
   * accounts for your application. (events.reset)
   *
   * @param string $eventId The ID of the event.
   * @param array $optParams Optional parameters.
   */
  public function reset($eventId, $optParams = [])
  {
    $params = ['eventId' => $eventId];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params]);
  }
  /**
   * Resets all player progress on all events for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. (events.resetAll)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAll($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', [$params]);
  }
  /**
   * Resets all draft events for all players. This method is only available to
   * user accounts for your developer console. (events.resetAllForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAllForAllPlayers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('resetAllForAllPlayers', [$params]);
  }
  /**
   * Resets the event with the given ID for all players. This method is only
   * available to user accounts for your developer console. Only draft events can
   * be reset. (events.resetForAllPlayers)
   *
   * @param string $eventId The ID of the event.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($eventId, $optParams = [])
  {
    $params = ['eventId' => $eventId];
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', [$params]);
  }
  /**
   * Resets events with the given IDs for all players. This method is only
   * available to user accounts for your developer console. Only draft events may
   * be reset. (events.resetMultipleForAllPlayers)
   *
   * @param EventsResetMultipleForAllRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function resetMultipleForAllPlayers(EventsResetMultipleForAllRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resetMultipleForAllPlayers', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Events::class, 'Google_Service_GamesManagement_Resource_Events');
