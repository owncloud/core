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

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sourcerepoService = new Google_Service_CloudSourceRepositories(...);
 *   $projects = $sourcerepoService->projects;
 *  </code>
 */
class Google_Service_CloudSourceRepositories_Resource_Projects extends Google_Service_Resource
{
  /**
   * Returns the Cloud Source Repositories configuration of the project.
   * (projects.getConfig)
   *
   * @param string $name The name of the requested project. Values are of the form
   * `projects/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSourceRepositories_ProjectConfig
   */
  public function getConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_CloudSourceRepositories_ProjectConfig");
  }
  /**
   * Updates the Cloud Source Repositories configuration of the project.
   * (projects.updateConfig)
   *
   * @param string $name The name of the requested project. Values are of the form
   * `projects/`.
   * @param Google_Service_CloudSourceRepositories_UpdateProjectConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSourceRepositories_ProjectConfig
   */
  public function updateConfig($name, Google_Service_CloudSourceRepositories_UpdateProjectConfigRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateConfig', array($params), "Google_Service_CloudSourceRepositories_ProjectConfig");
  }
}
