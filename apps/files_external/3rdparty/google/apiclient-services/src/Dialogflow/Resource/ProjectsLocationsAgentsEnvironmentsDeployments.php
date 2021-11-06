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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Deployment;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListDeploymentsResponse;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $deployments = $dialogflowService->deployments;
 *  </code>
 */
class ProjectsLocationsAgentsEnvironmentsDeployments extends \Google\Service\Resource
{
  /**
   * Retrieves the specified Deployment. (deployments.get)
   *
   * @param string $name Required. The name of the Deployment. Format:
   * `projects//locations//agents//environments//deployments/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Deployment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Deployment::class);
  }
  /**
   * Returns the list of all deployments in the specified Environment.
   * (deployments.listProjectsLocationsAgentsEnvironmentsDeployments)
   *
   * @param string $parent Required. The Environment to list all environments for.
   * Format: `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20 and at most 100.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListDeploymentsResponse
   */
  public function listProjectsLocationsAgentsEnvironmentsDeployments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListDeploymentsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsEnvironmentsDeployments::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEnvironmentsDeployments');
