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

use Google\Service\PolicySimulator\GoogleCloudPolicysimulatorV1Replay;
use Google\Service\PolicySimulator\GoogleLongrunningOperation;

/**
 * The "replays" collection of methods.
 * Typical usage is:
 *  <code>
 *   $policysimulatorService = new Google\Service\PolicySimulator(...);
 *   $replays = $policysimulatorService->replays;
 *  </code>
 */
class ProjectsLocationsReplays extends \Google\Service\Resource
{
  /**
   * Creates and starts a Replay using the given ReplayConfig. (replays.create)
   *
   * @param string $parent Required. The parent resource where this Replay will be
   * created. This resource must be a project, folder, or organization with a
   * location. Example: `projects/my-example-project/locations/global`
   * @param GoogleCloudPolicysimulatorV1Replay $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudPolicysimulatorV1Replay $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets the specified Replay. Each `Replay` is available for at least 7 days.
   * (replays.get)
   *
   * @param string $name Required. The name of the Replay to retrieve, in the
   * following format: `{projects|folders|organizations}/{resource-
   * id}/locations/global/replays/{replay-id}`, where `{resource-id}` is the ID of
   * the project, folder, or organization that owns the `Replay`. Example:
   * `projects/my-example-project/locations/global/replays/506a5f7f-38ce-4d7d-
   * 8e03-479ce1833c36`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudPolicysimulatorV1Replay
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudPolicysimulatorV1Replay::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsReplays::class, 'Google_Service_PolicySimulator_Resource_ProjectsLocationsReplays');
