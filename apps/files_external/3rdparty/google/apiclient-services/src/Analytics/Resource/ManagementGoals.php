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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\Goal;
use Google\Service\Analytics\Goals;

/**
 * The "goals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $goals = $analyticsService->goals;
 *  </code>
 */
class ManagementGoals extends \Google\Service\Resource
{
  /**
   * Gets a goal to which the user has access. (goals.get)
   *
   * @param string $accountId Account ID to retrieve the goal for.
   * @param string $webPropertyId Web property ID to retrieve the goal for.
   * @param string $profileId View (Profile) ID to retrieve the goal for.
   * @param string $goalId Goal ID to retrieve the goal for.
   * @param array $optParams Optional parameters.
   * @return Goal
   */
  public function get($accountId, $webPropertyId, $profileId, $goalId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'goalId' => $goalId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Goal::class);
  }
  /**
   * Create a new goal. (goals.insert)
   *
   * @param string $accountId Account ID to create the goal for.
   * @param string $webPropertyId Web property ID to create the goal for.
   * @param string $profileId View (Profile) ID to create the goal for.
   * @param Goal $postBody
   * @param array $optParams Optional parameters.
   * @return Goal
   */
  public function insert($accountId, $webPropertyId, $profileId, Goal $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Goal::class);
  }
  /**
   * Lists goals to which the user has access. (goals.listManagementGoals)
   *
   * @param string $accountId Account ID to retrieve goals for. Can either be a
   * specific account ID or '~all', which refers to all the accounts that user has
   * access to.
   * @param string $webPropertyId Web property ID to retrieve goals for. Can
   * either be a specific web property ID or '~all', which refers to all the web
   * properties that user has access to.
   * @param string $profileId View (Profile) ID to retrieve goals for. Can either
   * be a specific view (profile) ID or '~all', which refers to all the views
   * (profiles) that user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of goals to include in this
   * response.
   * @opt_param int start-index An index of the first goal to retrieve. Use this
   * parameter as a pagination mechanism along with the max-results parameter.
   * @return Goals
   */
  public function listManagementGoals($accountId, $webPropertyId, $profileId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Goals::class);
  }
  /**
   * Updates an existing goal. This method supports patch semantics. (goals.patch)
   *
   * @param string $accountId Account ID to update the goal.
   * @param string $webPropertyId Web property ID to update the goal.
   * @param string $profileId View (Profile) ID to update the goal.
   * @param string $goalId Index of the goal to be updated.
   * @param Goal $postBody
   * @param array $optParams Optional parameters.
   * @return Goal
   */
  public function patch($accountId, $webPropertyId, $profileId, $goalId, Goal $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'goalId' => $goalId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Goal::class);
  }
  /**
   * Updates an existing goal. (goals.update)
   *
   * @param string $accountId Account ID to update the goal.
   * @param string $webPropertyId Web property ID to update the goal.
   * @param string $profileId View (Profile) ID to update the goal.
   * @param string $goalId Index of the goal to be updated.
   * @param Goal $postBody
   * @param array $optParams Optional parameters.
   * @return Goal
   */
  public function update($accountId, $webPropertyId, $profileId, $goalId, Goal $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'goalId' => $goalId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Goal::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementGoals::class, 'Google_Service_Analytics_Resource_ManagementGoals');
