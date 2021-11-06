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

namespace Google\Service\BinaryAuthorization\Resource;

use Google\Service\BinaryAuthorization\Attestor;
use Google\Service\BinaryAuthorization\BinaryauthorizationEmpty;
use Google\Service\BinaryAuthorization\IamPolicy;
use Google\Service\BinaryAuthorization\ListAttestorsResponse;
use Google\Service\BinaryAuthorization\SetIamPolicyRequest;
use Google\Service\BinaryAuthorization\TestIamPermissionsRequest;
use Google\Service\BinaryAuthorization\TestIamPermissionsResponse;
use Google\Service\BinaryAuthorization\ValidateAttestationOccurrenceRequest;
use Google\Service\BinaryAuthorization\ValidateAttestationOccurrenceResponse;

/**
 * The "attestors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $binaryauthorizationService = new Google\Service\BinaryAuthorization(...);
 *   $attestors = $binaryauthorizationService->attestors;
 *  </code>
 */
class ProjectsAttestors extends \Google\Service\Resource
{
  /**
   * Creates an attestor, and returns a copy of the new attestor. Returns
   * NOT_FOUND if the project does not exist, INVALID_ARGUMENT if the request is
   * malformed, ALREADY_EXISTS if the attestor already exists. (attestors.create)
   *
   * @param string $parent Required. The parent of this attestor.
   * @param Attestor $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string attestorId Required. The attestors ID.
   * @return Attestor
   */
  public function create($parent, Attestor $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Attestor::class);
  }
  /**
   * Deletes an attestor. Returns NOT_FOUND if the attestor does not exist.
   * (attestors.delete)
   *
   * @param string $name Required. The name of the attestors to delete, in the
   * format `projects/attestors`.
   * @param array $optParams Optional parameters.
   * @return BinaryauthorizationEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BinaryauthorizationEmpty::class);
  }
  /**
   * Gets an attestor. Returns NOT_FOUND if the attestor does not exist.
   * (attestors.get)
   *
   * @param string $name Required. The name of the attestor to retrieve, in the
   * format `projects/attestors`.
   * @param array $optParams Optional parameters.
   * @return Attestor
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Attestor::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (attestors.getIamPolicy)
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
   * @return IamPolicy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], IamPolicy::class);
  }
  /**
   * Lists attestors. Returns INVALID_ARGUMENT if the project does not exist.
   * (attestors.listProjectsAttestors)
   *
   * @param string $parent Required. The resource name of the project associated
   * with the attestors, in the format `projects`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListAttestorsResponse.next_page_token returned from the previous call to the
   * `ListAttestors` method.
   * @return ListAttestorsResponse
   */
  public function listProjectsAttestors($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAttestorsResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (attestors.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IamPolicy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], IamPolicy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (attestors.testIamPermissions)
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
  /**
   * Updates an attestor. Returns NOT_FOUND if the attestor does not exist.
   * (attestors.update)
   *
   * @param string $name Required. The resource name, in the format:
   * `projects/attestors`. This field may not be updated.
   * @param Attestor $postBody
   * @param array $optParams Optional parameters.
   * @return Attestor
   */
  public function update($name, Attestor $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Attestor::class);
  }
  /**
   * Returns whether the given Attestation for the given image URI was signed by
   * the given Attestor (attestors.validateAttestationOccurrence)
   *
   * @param string $attestor Required. The resource name of the Attestor of the
   * occurrence, in the format `projects/attestors`.
   * @param ValidateAttestationOccurrenceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ValidateAttestationOccurrenceResponse
   */
  public function validateAttestationOccurrence($attestor, ValidateAttestationOccurrenceRequest $postBody, $optParams = [])
  {
    $params = ['attestor' => $attestor, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('validateAttestationOccurrence', [$params], ValidateAttestationOccurrenceResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAttestors::class, 'Google_Service_BinaryAuthorization_Resource_ProjectsAttestors');
