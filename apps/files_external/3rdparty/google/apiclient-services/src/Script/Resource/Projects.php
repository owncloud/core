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

namespace Google\Service\Script\Resource;

use Google\Service\Script\Content;
use Google\Service\Script\CreateProjectRequest;
use Google\Service\Script\Metrics;
use Google\Service\Script\Project;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $scriptService = new Google\Service\Script(...);
 *   $projects = $scriptService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Creates a new, empty script project with no script files and a base manifest
   * file. (projects.create)
   *
   * @param CreateProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Project
   */
  public function create(CreateProjectRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Project::class);
  }
  /**
   * Gets a script project's metadata. (projects.get)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param array $optParams Optional parameters.
   * @return Project
   */
  public function get($scriptId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Project::class);
  }
  /**
   * Gets the content of the script project, including the code source and
   * metadata for each script file. (projects.getContent)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int versionNumber The version number of the project to retrieve.
   * If not provided, the project's HEAD version is returned.
   * @return Content
   */
  public function getContent($scriptId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId];
    $params = array_merge($params, $optParams);
    return $this->call('getContent', [$params], Content::class);
  }
  /**
   * Get metrics data for scripts, such as number of executions and active users.
   * (projects.getMetrics)
   *
   * @param string $scriptId Required field indicating the script to get metrics
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string metricsFilter.deploymentId Optional field indicating a
   * specific deployment to retrieve metrics from.
   * @opt_param string metricsGranularity Required field indicating what
   * granularity of metrics are returned.
   * @return Metrics
   */
  public function getMetrics($scriptId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId];
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', [$params], Metrics::class);
  }
  /**
   * Updates the content of the specified script project. This content is stored
   * as the HEAD version, and is used when the script is executed as a trigger, in
   * the script editor, in add-on preview mode, or as a web app or Apps Script API
   * in development mode. This clears all the existing files in the project.
   * (projects.updateContent)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param Content $postBody
   * @param array $optParams Optional parameters.
   * @return Content
   */
  public function updateContent($scriptId, Content $postBody, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateContent', [$params], Content::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_Script_Resource_Projects');
