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

namespace Google\Service\Dns\Resource;

use Google\Service\Dns\Project;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $projects = $dnsService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Fetches the representation of an existing Project. (projects.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Project
   */
  public function get($project, $location, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Project::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_Dns_Resource_Projects');
