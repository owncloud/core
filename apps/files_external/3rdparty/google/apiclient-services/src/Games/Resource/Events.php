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

namespace Google\Service\Games\Resource;

use Google\Service\Games\EventDefinitionListResponse;
use Google\Service\Games\EventRecordRequest;
use Google\Service\Games\EventUpdateResponse;
use Google\Service\Games\PlayerEventListResponse;

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $events = $gamesService->events;
 *  </code>
 */
class Events extends \Google\Service\Resource
{
  /**
   * Returns a list showing the current progress on events in this application for
   * the currently authenticated user. (events.listByPlayer)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of events to return in the
   * response, used for paging. For any response, the actual number of events to
   * return may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return PlayerEventListResponse
   */
  public function listByPlayer($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('listByPlayer', [$params], PlayerEventListResponse::class);
  }
  /**
   * Returns a list of the event definitions in this application.
   * (events.listDefinitions)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of event definitions to return
   * in the response, used for paging. For any response, the actual number of
   * event definitions to return may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return EventDefinitionListResponse
   */
  public function listDefinitions($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('listDefinitions', [$params], EventDefinitionListResponse::class);
  }
  /**
   * Records a batch of changes to the number of times events have occurred for
   * the currently authenticated user of this application. (events.record)
   *
   * @param EventRecordRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return EventUpdateResponse
   */
  public function record(EventRecordRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('record', [$params], EventUpdateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Events::class, 'Google_Service_Games_Resource_Events');
