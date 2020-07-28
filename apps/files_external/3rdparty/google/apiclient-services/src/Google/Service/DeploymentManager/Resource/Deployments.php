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
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google_Service_DeploymentManager(...);
 *   $deployments = $deploymentmanagerService->deployments;
 *  </code>
 */
class Google_Service_DeploymentManager_Resource_Deployments extends Google_Service_Resource
{
  /**
   * Cancels and removes the preview currently associated with the deployment.
   * (deployments.cancelPreview)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param Google_Service_DeploymentManager_DeploymentsCancelPreviewRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DeploymentManager_Operation
   */
  public function cancelPreview($project, $deployment, Google_Service_DeploymentManager_DeploymentsCancelPreviewRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'deployment' => $deployment, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancelPreview', array($params), "Google_Service_DeploymentManager_Operation");
  }
  /**
   * Deletes a deployment and all of the resources in the deployment.
   * (deployments.delete)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string deletePolicy Sets the policy to use for deleting resources.
   * @return Google_Service_DeploymentManager_Operation
   */
  public function delete($project, $deployment, $optParams = array())
  {
    $params = array('project' => $project, 'deployment' => $deployment);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DeploymentManager_Operation");
  }
  /**
   * Gets information about a specific deployment. (deployments.get)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DeploymentManager_Deployment
   */
  public function get($project, $deployment, $optParams = array())
  {
    $params = array('project' => $project, 'deployment' => $deployment);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DeploymentManager_Deployment");
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (deployments.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DeploymentManager_Policy
   */
  public function getIamPolicy($project, $resource, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_DeploymentManager_Policy");
  }
  /**
   * Creates a deployment and all of the resources described by the deployment
   * manifest. (deployments.insert)
   *
   * @param string $project The project ID for this request.
   * @param Google_Service_DeploymentManager_Deployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool preview If set to true, creates a deployment and creates
   * "shell" resources but does not actually instantiate these resources. This
   * allows you to preview what your deployment looks like. After previewing a
   * deployment, you can deploy your resources by making a request with the
   * `update()` method or you can use the `cancelPreview()` method to cancel the
   * preview altogether. Note that the deployment will still exist after you
   * cancel the preview and you must separately delete this deployment if you want
   * to remove it.
   * @opt_param string createPolicy Sets the policy to use for creating new
   * resources.
   * @return Google_Service_DeploymentManager_Operation
   */
  public function insert($project, Google_Service_DeploymentManager_Deployment $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_DeploymentManager_Operation");
  }
  /**
   * Lists all deployments for a given project. (deployments.listDeployments)
   *
   * @param string $project The project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first.
   *
   * Currently, only sorting by `name` or `creationTimestamp desc` is supported.
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`.
   *
   * For example, if you are filtering Compute Engine instances, you can exclude
   * instances named `example-instance` by specifying `name != example-instance`.
   *
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels.
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ```
   * @return Google_Service_DeploymentManager_DeploymentsListResponse
   */
  public function listDeployments($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DeploymentManager_DeploymentsListResponse");
  }
  /**
   * Patches a deployment and all of the resources described by the deployment
   * manifest. (deployments.patch)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param Google_Service_DeploymentManager_Deployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool preview If set to true, updates the deployment and creates
   * and updates the "shell" resources but does not actually alter or instantiate
   * these resources. This allows you to preview what your deployment will look
   * like. You can use this intent to preview how an update would affect your
   * deployment. You must provide a `target.config` with a configuration if this
   * is set to true. After previewing a deployment, you can deploy your resources
   * by making a request with the `update()` or you can `cancelPreview()` to
   * remove the preview altogether. Note that the deployment will still exist
   * after you cancel the preview and you must separately delete this deployment
   * if you want to remove it.
   * @opt_param string createPolicy Sets the policy to use for creating new
   * resources.
   * @opt_param string deletePolicy Sets the policy to use for deleting resources.
   * @return Google_Service_DeploymentManager_Operation
   */
  public function patch($project, $deployment, Google_Service_DeploymentManager_Deployment $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'deployment' => $deployment, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DeploymentManager_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (deployments.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_DeploymentManager_GlobalSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DeploymentManager_Policy
   */
  public function setIamPolicy($project, $resource, Google_Service_DeploymentManager_GlobalSetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_DeploymentManager_Policy");
  }
  /**
   * Stops an ongoing operation. This does not roll back any work that has already
   * been completed, but prevents any new work from being started.
   * (deployments.stop)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param Google_Service_DeploymentManager_DeploymentsStopRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DeploymentManager_Operation
   */
  public function stop($project, $deployment, Google_Service_DeploymentManager_DeploymentsStopRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'deployment' => $deployment, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('stop', array($params), "Google_Service_DeploymentManager_Operation");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (deployments.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_DeploymentManager_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DeploymentManager_TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, Google_Service_DeploymentManager_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_DeploymentManager_TestPermissionsResponse");
  }
  /**
   * Updates a deployment and all of the resources described by the deployment
   * manifest. (deployments.update)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param Google_Service_DeploymentManager_Deployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string deletePolicy Sets the policy to use for deleting resources.
   * @opt_param string createPolicy Sets the policy to use for creating new
   * resources.
   * @opt_param bool preview If set to true, updates the deployment and creates
   * and updates the "shell" resources but does not actually alter or instantiate
   * these resources. This allows you to preview what your deployment will look
   * like. You can use this intent to preview how an update would affect your
   * deployment. You must provide a `target.config` with a configuration if this
   * is set to true. After previewing a deployment, you can deploy your resources
   * by making a request with the `update()` or you can `cancelPreview()` to
   * remove the preview altogether. Note that the deployment will still exist
   * after you cancel the preview and you must separately delete this deployment
   * if you want to remove it.
   * @return Google_Service_DeploymentManager_Operation
   */
  public function update($project, $deployment, Google_Service_DeploymentManager_Deployment $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'deployment' => $deployment, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_DeploymentManager_Operation");
  }
}
