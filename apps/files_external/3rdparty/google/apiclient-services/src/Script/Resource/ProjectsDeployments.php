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

use Google\Service\Script\Deployment;
use Google\Service\Script\DeploymentConfig;
use Google\Service\Script\ListDeploymentsResponse;
use Google\Service\Script\ScriptEmpty;
use Google\Service\Script\UpdateDeploymentRequest;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $scriptService = new Google\Service\Script(...);
 *   $deployments = $scriptService->deployments;
 *  </code>
 */
class ProjectsDeployments extends \Google\Service\Resource
{
  /**
   * Creates a deployment of an Apps Script project. (deployments.create)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param DeploymentConfig $postBody
   * @param array $optParams Optional parameters.
   * @return Deployment
   */
  public function create($scriptId, DeploymentConfig $postBody, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Deployment::class);
  }
  /**
   * Deletes a deployment of an Apps Script project. (deployments.delete)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param string $deploymentId The deployment ID to be undeployed.
   * @param array $optParams Optional parameters.
   * @return ScriptEmpty
   */
  public function delete($scriptId, $deploymentId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'deploymentId' => $deploymentId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ScriptEmpty::class);
  }
  /**
   * Gets a deployment of an Apps Script project. (deployments.get)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param string $deploymentId The deployment ID.
   * @param array $optParams Optional parameters.
   * @return Deployment
   */
  public function get($scriptId, $deploymentId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'deploymentId' => $deploymentId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Deployment::class);
  }
  /**
   * Lists the deployments of an Apps Script project.
   * (deployments.listProjectsDeployments)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of deployments on each returned
   * page. Defaults to 50.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of `nextPageToken` from a
   * previous response.
   * @return ListDeploymentsResponse
   */
  public function listProjectsDeployments($scriptId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDeploymentsResponse::class);
  }
  /**
   * Updates a deployment of an Apps Script project. (deployments.update)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param string $deploymentId The deployment ID for this deployment.
   * @param UpdateDeploymentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Deployment
   */
  public function update($scriptId, $deploymentId, UpdateDeploymentRequest $postBody, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'deploymentId' => $deploymentId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Deployment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDeployments::class, 'Google_Service_Script_Resource_ProjectsDeployments');
