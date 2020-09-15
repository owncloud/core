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
 *   $scriptService = new Google_Service_Script(...);
 *   $projects = $scriptService->projects;
 *  </code>
 */
class Google_Service_Script_Resource_Projects extends Google_Service_Resource
{
  /**
   * Creates a new, empty script project with no script files and a base manifest
   * file. (projects.create)
   *
   * @param Google_Service_Script_CreateProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Script_Project
   */
  public function create(Google_Service_Script_CreateProjectRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Script_Project");
  }
  /**
   * Gets a script project's metadata. (projects.get)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Script_Project
   */
  public function get($scriptId, $optParams = array())
  {
    $params = array('scriptId' => $scriptId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Script_Project");
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
   * @return Google_Service_Script_Content
   */
  public function getContent($scriptId, $optParams = array())
  {
    $params = array('scriptId' => $scriptId);
    $params = array_merge($params, $optParams);
    return $this->call('getContent', array($params), "Google_Service_Script_Content");
  }
  /**
   * Get metrics data for scripts, such as number of executions and active users.
   * (projects.getMetrics)
   *
   * @param string $scriptId Required field indicating the script to get metrics
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string metricsGranularity Required field indicating what
   * granularity of metrics are returned.
   * @opt_param string metricsFilter.deploymentId Optional field indicating a
   * specific deployment to retrieve metrics from.
   * @return Google_Service_Script_Metrics
   */
  public function getMetrics($scriptId, $optParams = array())
  {
    $params = array('scriptId' => $scriptId);
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', array($params), "Google_Service_Script_Metrics");
  }
  /**
   * Updates the content of the specified script project. This content is stored
   * as the HEAD version, and is used when the script is executed as a trigger, in
   * the script editor, in add-on preview mode, or as a web app or Apps Script API
   * in development mode. This clears all the existing files in the project.
   * (projects.updateContent)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param Google_Service_Script_Content $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Script_Content
   */
  public function updateContent($scriptId, Google_Service_Script_Content $postBody, $optParams = array())
  {
    $params = array('scriptId' => $scriptId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateContent', array($params), "Google_Service_Script_Content");
  }
}
