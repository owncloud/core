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

namespace Google\Service\CloudSourceRepositories\Resource;

use Google\Service\CloudSourceRepositories\ProjectConfig;
use Google\Service\CloudSourceRepositories\UpdateProjectConfigRequest;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sourcerepoService = new Google\Service\CloudSourceRepositories(...);
 *   $projects = $sourcerepoService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Returns the Cloud Source Repositories configuration of the project.
   * (projects.getConfig)
   *
   * @param string $name The name of the requested project. Values are of the form
   * `projects/`.
   * @param array $optParams Optional parameters.
   * @return ProjectConfig
   */
  public function getConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', [$params], ProjectConfig::class);
  }
  /**
   * Updates the Cloud Source Repositories configuration of the project.
   * (projects.updateConfig)
   *
   * @param string $name The name of the requested project. Values are of the form
   * `projects/`.
   * @param UpdateProjectConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ProjectConfig
   */
  public function updateConfig($name, UpdateProjectConfigRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateConfig', [$params], ProjectConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_CloudSourceRepositories_Resource_Projects');
