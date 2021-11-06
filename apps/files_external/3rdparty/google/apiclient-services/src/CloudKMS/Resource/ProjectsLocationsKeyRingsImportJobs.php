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

namespace Google\Service\CloudKMS\Resource;

use Google\Service\CloudKMS\ImportJob;
use Google\Service\CloudKMS\ListImportJobsResponse;
use Google\Service\CloudKMS\Policy;
use Google\Service\CloudKMS\SetIamPolicyRequest;
use Google\Service\CloudKMS\TestIamPermissionsRequest;
use Google\Service\CloudKMS\TestIamPermissionsResponse;

/**
 * The "importJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudkmsService = new Google\Service\CloudKMS(...);
 *   $importJobs = $cloudkmsService->importJobs;
 *  </code>
 */
class ProjectsLocationsKeyRingsImportJobs extends \Google\Service\Resource
{
  /**
   * Create a new ImportJob within a KeyRing. ImportJob.import_method is required.
   * (importJobs.create)
   *
   * @param string $parent Required. The name of the KeyRing associated with the
   * ImportJobs.
   * @param ImportJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string importJobId Required. It must be unique within a KeyRing
   * and match the regular expression `[a-zA-Z0-9_-]{1,63}`
   * @return ImportJob
   */
  public function create($parent, ImportJob $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ImportJob::class);
  }
  /**
   * Returns metadata for a given ImportJob. (importJobs.get)
   *
   * @param string $name Required. The name of the ImportJob to get.
   * @param array $optParams Optional parameters.
   * @return ImportJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ImportJob::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (importJobs.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists ImportJobs. (importJobs.listProjectsLocationsKeyRingsImportJobs)
   *
   * @param string $parent Required. The resource name of the KeyRing to list, in
   * the format `projects/locations/keyRings`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response. For more information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * If not specified, the results will be sorted in the default order. For more
   * information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param int pageSize Optional. Optional limit on the number of ImportJobs
   * to include in the response. Further ImportJobs can subsequently be obtained
   * by including the ListImportJobsResponse.next_page_token in a subsequent
   * request. If unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Optional pagination token, returned
   * earlier via ListImportJobsResponse.next_page_token.
   * @return ListImportJobsResponse
   */
  public function listProjectsLocationsKeyRingsImportJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListImportJobsResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (importJobs.setIamPolicy)
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
   * This operation may "fail open" without warning.
   * (importJobs.testIamPermissions)
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
class_alias(ProjectsLocationsKeyRingsImportJobs::class, 'Google_Service_CloudKMS_Resource_ProjectsLocationsKeyRingsImportJobs');
