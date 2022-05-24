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

use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListVersionsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1SetDefaultVersionRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1Version;
use Google\Service\CloudMachineLearningEngine\GoogleLongrunningOperation;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $versions = $mlService->versions;
 *  </code>
 */
class ProjectsModelsVersions extends \Google\Service\Resource
{
  /**
   * Creates a new version of a model from a trained TensorFlow model. If the
   * version created in the cloud by this call is the first deployed version of
   * the specified model, it will be made the default version of the model. When
   * you add a version to a model that already has one or more versions, the
   * default version does not automatically change. If you want a new version to
   * be the default, you must call projects.models.versions.setDefault.
   * (versions.create)
   *
   * @param string $parent Required. The name of the model.
   * @param GoogleCloudMlV1Version $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudMlV1Version $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes a model version. Each model can have multiple versions deployed and
   * in use at any given time. Use this method to remove a single version. Note:
   * You cannot delete the version that is set as the default version of the model
   * unless it is the only remaining version. (versions.delete)
   *
   * @param string $name Required. The name of the version. You can get the names
   * of all the versions of a model by calling projects.models.versions.list.
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
   * Gets information about a model version. Models can have multiple versions.
   * You can call projects.models.versions.list to get the same information that
   * this method returns for all of the versions of a model. (versions.get)
   *
   * @param string $name Required. The name of the version.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Version
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudMlV1Version::class);
  }
  /**
   * Gets basic information about all the versions of a model. If you expect that
   * a model has many versions, or if you need to handle only a limited number of
   * results at a time, you can request that the list be retrieved in batches
   * (called pages). If there are no versions that match the request parameters,
   * the list request returns an empty response body: {}.
   * (versions.listProjectsModelsVersions)
   *
   * @param string $parent Required. The name of the model for which to list the
   * version.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Specifies the subset of versions to
   * retrieve.
   * @opt_param int pageSize Optional. The number of versions to retrieve per
   * "page" of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results. You get the token from the `next_page_token` field of the
   * response from the previous call.
   * @return GoogleCloudMlV1ListVersionsResponse
   */
  public function listProjectsModelsVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudMlV1ListVersionsResponse::class);
  }
  /**
   * Updates the specified Version resource. Currently the only update-able fields
   * are `description`, `requestLoggingConfig`, `autoScaling.minNodes`, and
   * `manualScaling.nodes`. (versions.patch)
   *
   * @param string $name Required. The name of the model.
   * @param GoogleCloudMlV1Version $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to
   * `Version`, of the field to update. Must be present and non-empty. For
   * example, to change the description of a version to "foo", the `update_mask`
   * parameter would be specified as `description`, and the `PATCH` request body
   * would specify the new value, as follows: ``` { "description": "foo" } ```
   * Currently the only supported update mask fields are `description`,
   * `requestLoggingConfig`, `autoScaling.minNodes`, and `manualScaling.nodes`.
   * However, you can only update `manualScaling.nodes` if the version uses a
   * [Compute Engine (N1) machine type](/ml-engine/docs/machine-types-online-
   * prediction).
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudMlV1Version $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Designates a version to be the default for the model. The default version is
   * used for prediction requests made against the model that don't specify a
   * version. The first version to be created for a model is automatically set as
   * the default. You must make any subsequent changes to the default version
   * setting manually using this method. (versions.setDefault)
   *
   * @param string $name Required. The name of the version to make the default for
   * the model. You can get the names of all the versions of a model by calling
   * projects.models.versions.list.
   * @param GoogleCloudMlV1SetDefaultVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Version
   */
  public function setDefault($name, GoogleCloudMlV1SetDefaultVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setDefault', [$params], GoogleCloudMlV1Version::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsModelsVersions::class, 'Google_Service_CloudMachineLearningEngine_Resource_ProjectsModelsVersions');
