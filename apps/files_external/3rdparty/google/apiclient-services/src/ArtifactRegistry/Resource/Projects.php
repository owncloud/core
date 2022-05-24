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

namespace Google\Service\ArtifactRegistry\Resource;

use Google\Service\ArtifactRegistry\ProjectSettings;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google\Service\ArtifactRegistry(...);
 *   $projects = $artifactregistryService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Retrieves the Settings for the Project. (projects.getProjectSettings)
   *
   * @param string $name Required. The name of the projectSettings resource.
   * @param array $optParams Optional parameters.
   * @return ProjectSettings
   */
  public function getProjectSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getProjectSettings', [$params], ProjectSettings::class);
  }
  /**
   * Updates the Settings for the Project. (projects.updateProjectSettings)
   *
   * @param string $name The name of the project's settings. Always of the form:
   * projects/{project-id}/projectSettings In update request: never set In
   * response: always set
   * @param ProjectSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask to support partial updates.
   * @return ProjectSettings
   */
  public function updateProjectSettings($name, ProjectSettings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateProjectSettings', [$params], ProjectSettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_ArtifactRegistry_Resource_Projects');
