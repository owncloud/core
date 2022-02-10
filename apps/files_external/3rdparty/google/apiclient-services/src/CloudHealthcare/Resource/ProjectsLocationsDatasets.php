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

namespace Google\Service\CloudHealthcare\Resource;

use Google\Service\CloudHealthcare\Dataset;
use Google\Service\CloudHealthcare\DeidentifyDatasetRequest;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\ListDatasetsResponse;
use Google\Service\CloudHealthcare\Operation;
use Google\Service\CloudHealthcare\Policy;
use Google\Service\CloudHealthcare\SetIamPolicyRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsResponse;

/**
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $datasets = $healthcareService->datasets;
 *  </code>
 */
class ProjectsLocationsDatasets extends \Google\Service\Resource
{
  /**
   * Creates a new health dataset. Results are returned through the Operation
   * interface which returns either an `Operation.response` which contains a
   * Dataset or `Operation.error`. The metadata field type is OperationMetadata.
   * (datasets.create)
   *
   * @param string $parent The name of the project where the server creates the
   * dataset. For example, `projects/{project_id}/locations/{location_id}`.
   * @param Dataset $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string datasetId The ID of the dataset that is being created. The
   * string must match the following regex: `[\p{L}\p{N}_\-\.]{1,256}`.
   * @return Operation
   */
  public function create($parent, Dataset $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Creates a new dataset containing de-identified data from the source dataset.
   * The metadata field type is OperationMetadata. If the request is successful,
   * the response field type is DeidentifySummary. If errors occur, error is set.
   * The LRO result may still be successful if de-identification fails for some
   * DICOM instances. The new de-identified dataset will not contain these failed
   * resources. Failed resource totals are tracked in Operation.metadata. Error
   * details are also logged to Cloud Logging. For more information, see [Viewing
   * error logs in Cloud Logging](https://cloud.google.com/healthcare/docs/how-
   * tos/logging). (datasets.deidentify)
   *
   * @param string $sourceDataset Source dataset resource name. For example,
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`.
   * @param DeidentifyDatasetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function deidentify($sourceDataset, DeidentifyDatasetRequest $postBody, $optParams = [])
  {
    $params = ['sourceDataset' => $sourceDataset, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', [$params], Operation::class);
  }
  /**
   * Deletes the specified health dataset and all data contained in the dataset.
   * Deleting a dataset does not affect the sources from which the dataset was
   * imported (if any). (datasets.delete)
   *
   * @param string $name The name of the dataset to delete. For example,
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`.
   * @param array $optParams Optional parameters.
   * @return HealthcareEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], HealthcareEmpty::class);
  }
  /**
   * Gets any metadata associated with a dataset. (datasets.get)
   *
   * @param string $name The name of the dataset to read. For example,
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`.
   * @param array $optParams Optional parameters.
   * @return Dataset
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Dataset::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (datasets.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists the health datasets in the current project.
   * (datasets.listProjectsLocationsDatasets)
   *
   * @param string $parent The name of the project whose datasets should be
   * listed. For example, `projects/{project_id}/locations/{location_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. If not
   * specified, 100 is used. May not be larger than 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return ListDatasetsResponse
   */
  public function listProjectsLocationsDatasets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDatasetsResponse::class);
  }
  /**
   * Updates dataset metadata. (datasets.patch)
   *
   * @param string $name Resource name of the dataset, of the form
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`.
   * @param Dataset $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Dataset
   */
  public function patch($name, Dataset $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Dataset::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (datasets.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (datasets.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDatasets::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasets');
