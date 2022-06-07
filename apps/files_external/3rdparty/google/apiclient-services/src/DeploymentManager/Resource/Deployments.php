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

namespace Google\Service\DeploymentManager\Resource;

use Google\Service\DeploymentManager\Deployment;
use Google\Service\DeploymentManager\DeploymentsCancelPreviewRequest;
use Google\Service\DeploymentManager\DeploymentsListResponse;
use Google\Service\DeploymentManager\DeploymentsStopRequest;
use Google\Service\DeploymentManager\GlobalSetPolicyRequest;
use Google\Service\DeploymentManager\Operation;
use Google\Service\DeploymentManager\Policy;
use Google\Service\DeploymentManager\TestPermissionsRequest;
use Google\Service\DeploymentManager\TestPermissionsResponse;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google\Service\DeploymentManager(...);
 *   $deployments = $deploymentmanagerService->deployments;
 *  </code>
 */
class Deployments extends \Google\Service\Resource
{
  /**
   * Cancels and removes the preview currently associated with the deployment.
   * (deployments.cancelPreview)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param DeploymentsCancelPreviewRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cancelPreview($project, $deployment, DeploymentsCancelPreviewRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancelPreview', [$params], Operation::class);
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
   * @return Operation
   */
  public function delete($project, $deployment, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets information about a specific deployment. (deployments.get)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param array $optParams Optional parameters.
   * @return Deployment
   */
  public function get($project, $deployment, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Deployment::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (deployments.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Policy
   */
  public function getIamPolicy($project, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Creates a deployment and all of the resources described by the deployment
   * manifest. (deployments.insert)
   *
   * @param string $project The project ID for this request.
   * @param Deployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string createPolicy Sets the policy to use for creating new
   * resources.
   * @opt_param bool preview If set to true, creates a deployment and creates
   * "shell" resources but does not actually instantiate these resources. This
   * allows you to preview what your deployment looks like. After previewing a
   * deployment, you can deploy your resources by making a request with the
   * `update()` method or you can use the `cancelPreview()` method to cancel the
   * preview altogether. Note that the deployment will still exist after you
   * cancel the preview and you must separately delete this deployment if you want
   * to remove it.
   * @return Operation
   */
  public function insert($project, Deployment $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Lists all deployments for a given project. (deployments.listDeployments)
   *
   * @param string $project The project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. Most Compute resources support two types of filter expressions:
   * expressions that support regular expressions and expressions that follow API
   * improvement proposal AIP-160. If you want to use AIP-160, your expression
   * must specify the field name, an operator, and the value that you want to use
   * for filtering. The value must be a string, a number, or a boolean. The
   * operator must be either `=`, `!=`, `>`, `<`, `<=`, `>=` or `:`. For example,
   * if you are filtering Compute Engine instances, you can exclude instances
   * named `example-instance` by specifying `name != example-instance`. The `:`
   * operator can be used with string fields to match substrings. For non-string
   * fields it is equivalent to the `=` operator. The `:*` comparison can be used
   * to test whether a key has been defined. For example, to find all objects with
   * `owner` label use: ``` labels.owner:* ``` You can also filter nested fields.
   * For example, you could specify `scheduling.automaticRestart = false` to
   * include instances only if they are not scheduled for automatic restarts. You
   * can use filtering on nested fields to filter based on resource labels. To
   * filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ``` If you want to use a
   * regular expression, use the `eq` (equal) or `ne` (not equal) operator against
   * a single un-parenthesized expression with or without quotes or against
   * multiple parenthesized expressions. Examples: `fieldname eq unquoted literal`
   * `fieldname eq 'single quoted literal'` `fieldname eq "double quoted literal"`
   * `(fieldname1 eq literal) (fieldname2 ne "literal")` The literal value is
   * interpreted as a regular expression using Google RE2 library syntax. The
   * literal value must match the entire field. For example, to filter for
   * instances that do not end with name "instance", you would use `name ne
   * .*instance`.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @return DeploymentsListResponse
   */
  public function listDeployments($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DeploymentsListResponse::class);
  }
  /**
   * Patches a deployment and all of the resources described by the deployment
   * manifest. (deployments.patch)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param Deployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string createPolicy Sets the policy to use for creating new
   * resources.
   * @opt_param string deletePolicy Sets the policy to use for deleting resources.
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
   * @return Operation
   */
  public function patch($project, $deployment, Deployment $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (deployments.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param GlobalSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($project, $resource, GlobalSetPolicyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Stops an ongoing operation. This does not roll back any work that has already
   * been completed, but prevents any new work from being started.
   * (deployments.stop)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param DeploymentsStopRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stop($project, $deployment, DeploymentsStopRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (deployments.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
  /**
   * Updates a deployment and all of the resources described by the deployment
   * manifest. (deployments.update)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param Deployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string createPolicy Sets the policy to use for creating new
   * resources.
   * @opt_param string deletePolicy Sets the policy to use for deleting resources.
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
   * @return Operation
   */
  public function update($project, $deployment, Deployment $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Deployments::class, 'Google_Service_DeploymentManager_Resource_Deployments');
