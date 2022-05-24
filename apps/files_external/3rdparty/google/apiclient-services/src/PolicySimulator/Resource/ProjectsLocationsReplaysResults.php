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

namespace Google\Service\PolicySimulator\Resource;

use Google\Service\PolicySimulator\GoogleCloudPolicysimulatorV1ListReplayResultsResponse;

/**
 * The "results" collection of methods.
 * Typical usage is:
 *  <code>
 *   $policysimulatorService = new Google\Service\PolicySimulator(...);
 *   $results = $policysimulatorService->results;
 *  </code>
 */
class ProjectsLocationsReplaysResults extends \Google\Service\Resource
{
  /**
   * Lists the results of running a Replay.
   * (results.listProjectsLocationsReplaysResults)
   *
   * @param string $parent Required. The Replay whose results are listed, in the
   * following format: `{projects|folders|organizations}/{resource-
   * id}/locations/global/replays/{replay-id}` Example: `projects/my-
   * project/locations/global/replays/506a5f7f-38ce-4d7d-8e03-479ce1833c36`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of ReplayResult objects to return.
   * Defaults to 5000. The maximum value is 5000; values above 5000 are rounded
   * down to 5000.
   * @opt_param string pageToken A page token, received from a previous
   * Simulator.ListReplayResults call. Provide this token to retrieve the next
   * page of results. When paginating, all other parameters provided to
   * [Simulator.ListReplayResults[] must match the call that provided the page
   * token.
   * @return GoogleCloudPolicysimulatorV1ListReplayResultsResponse
   */
  public function listProjectsLocationsReplaysResults($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudPolicysimulatorV1ListReplayResultsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsReplaysResults::class, 'Google_Service_PolicySimulator_Resource_ProjectsLocationsReplaysResults');
