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

namespace Google\Service\CloudMachineLearningEngine\Resource;

use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListModelsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1Model;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1Policy;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1SetIamPolicyRequest;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1TestIamPermissionsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleLongrunningOperation;

/**
 * The "models" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $models = $mlService->models;
 *  </code>
 */
class ProjectsModels extends \Google\Service\Resource
{
  /**
   * Creates a model which will later contain one or more versions. You must add
   * at least one version before you can request predictions from the model. Add
   * versions by calling projects.models.versions.create. (models.create)
   *
   * @param string $parent Required. The project name.
   * @param GoogleCloudMlV1Model $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Model
   */
  public function create($parent, GoogleCloudMlV1Model $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudMlV1Model::class);
  }
  /**
   * Deletes a model. You can only delete a model if there are no versions in it.
   * You can delete versions by calling projects.models.versions.delete.
   * (models.delete)
   *
   * @param string $name Required. The name of the model.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets information about a model, including its name, the description (if set),
   * and the default version (if at least one version of the model has been
   * deployed). (models.get)
   *
   * @param string $name Required. The name of the model.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Model
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudMlV1Model::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (models.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Lists the models in a project. Each project can contain multiple models, and
   * each model can have multiple versions. If there are no models that match the
   * request parameters, the list request returns an empty response body: {}.
   * (models.listProjectsModels)
   *
   * @param string $parent Required. The name of the project whose models are to
   * be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Specifies the subset of models to
   * retrieve.
   * @opt_param int pageSize Optional. The number of models to retrieve per "page"
   * of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results. You get the token from the `next_page_token` field of the
   * response from the previous call.
   * @return GoogleCloudMlV1ListModelsResponse
   */
  public function listProjectsModels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudMlV1ListModelsResponse::class);
  }
  /**
   * Updates a specific model resource. Currently the only supported fields to
   * update are `description` and `default_version.name`. (models.patch)
   *
   * @param string $name Required. The project name.
   * @param GoogleCloudMlV1Model $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to
   * `Model`, of the field to update. For example, to change the description of a
   * model to "foo" and set its default version to "version_1", the `update_mask`
   * parameter would be specified as `description`, `default_version.name`, and
   * the `PATCH` request body would specify the new value, as follows: {
   * "description": "foo", "defaultVersion": { "name":"version_1" } } Currently
   * the supported update masks are `description` and `default_version.name`.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudMlV1Model $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (models.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1Policy
   */
  public function setIamPolicy($resource, GoogleIamV1SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (models.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], GoogleIamV1TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsModels::class, 'Google_Service_CloudMachineLearningEngine_Resource_ProjectsModels');
