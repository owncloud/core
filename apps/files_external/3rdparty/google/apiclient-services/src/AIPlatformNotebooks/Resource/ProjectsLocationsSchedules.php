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

namespace Google\Service\AIPlatformNotebooks\Resource;

use Google\Service\AIPlatformNotebooks\ListSchedulesResponse;
use Google\Service\AIPlatformNotebooks\Operation;
use Google\Service\AIPlatformNotebooks\Schedule;
use Google\Service\AIPlatformNotebooks\TriggerScheduleRequest;

/**
 * The "schedules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $notebooksService = new Google\Service\AIPlatformNotebooks(...);
 *   $schedules = $notebooksService->schedules;
 *  </code>
 */
class ProjectsLocationsSchedules extends \Google\Service\Resource
{
  /**
   * Creates a new Scheduled Notebook in a given project and location.
   * (schedules.create)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param Schedule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string scheduleId Required. User-defined unique ID of this
   * schedule.
   * @return Operation
   */
  public function create($parent, Schedule $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes schedule and all underlying jobs (schedules.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/schedules/{schedule_id}`
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of schedule (schedules.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/schedules/{schedule_id}`
   * @param array $optParams Optional parameters.
   * @return Schedule
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Schedule::class);
  }
  /**
   * Lists schedules in a given project and location.
   * (schedules.listProjectsLocationsSchedules)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter applied to resulting schedules.
   * @opt_param string orderBy Field to order results by.
   * @opt_param int pageSize Maximum return size of the list call.
   * @opt_param string pageToken A previous returned page token that can be used
   * to continue listing from the last result.
   * @return ListSchedulesResponse
   */
  public function listProjectsLocationsSchedules($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSchedulesResponse::class);
  }
  /**
   * Triggers execution of an existing schedule. (schedules.trigger)
   *
   * @param string $name Required. Format:
   * `parent=projects/{project_id}/locations/{location}/schedules/{schedule_id}`
   * @param TriggerScheduleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function trigger($name, TriggerScheduleRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('trigger', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSchedules::class, 'Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsSchedules');
