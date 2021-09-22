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

namespace Google\Service\CertificateAuthorityService\Resource;

use Google\Service\CertificateAuthorityService\CaPool;
use Google\Service\CertificateAuthorityService\FetchCaCertsRequest;
use Google\Service\CertificateAuthorityService\FetchCaCertsResponse;
use Google\Service\CertificateAuthorityService\ListCaPoolsResponse;
use Google\Service\CertificateAuthorityService\Operation;
use Google\Service\CertificateAuthorityService\Policy;
use Google\Service\CertificateAuthorityService\SetIamPolicyRequest;
use Google\Service\CertificateAuthorityService\TestIamPermissionsRequest;
use Google\Service\CertificateAuthorityService\TestIamPermissionsResponse;

/**
 * The "caPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $privatecaService = new Google\Service\CertificateAuthorityService(...);
 *   $caPools = $privatecaService->caPools;
 *  </code>
 */
class ProjectsLocationsCaPools extends \Google\Service\Resource
{
  /**
   * Create a CaPool. (caPools.create)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the CaPool, in the format `projects/locations`.
   * @param CaPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string caPoolId Required. It must be unique within a location and
   * match the regular expression `[a-zA-Z0-9_-]{1,63}`
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function create($parent, CaPool $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete a CaPool. (caPools.delete)
   *
   * @param string $name Required. The resource name for this CaPool in the format
   * `projects/locations/caPools`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * FetchCaCerts returns the current trust anchor for the CaPool. This will
   * include CA certificate chains for all ACTIVE CertificateAuthority resources
   * in the CaPool. (caPools.fetchCaCerts)
   *
   * @param string $caPool Required. The resource name for the CaPool in the
   * format `projects/locations/caPools`.
   * @param FetchCaCertsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FetchCaCertsResponse
   */
  public function fetchCaCerts($caPool, FetchCaCertsRequest $postBody, $optParams = [])
  {
    $params = ['caPool' => $caPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('fetchCaCerts', [$params], FetchCaCertsResponse::class);
  }
  /**
   * Returns a CaPool. (caPools.get)
   *
   * @param string $name Required. The name of the CaPool to get.
   * @param array $optParams Optional parameters.
   * @return CaPool
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CaPool::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (caPools.getIamPolicy)
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
   * Lists CaPools. (caPools.listProjectsLocationsCaPools)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the CaPools, in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response.
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * @opt_param int pageSize Optional. Limit on the number of CaPools to include
   * in the response. Further CaPools can subsequently be obtained by including
   * the ListCaPoolsResponse.next_page_token in a subsequent request. If
   * unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListCaPoolsResponse.next_page_token.
   * @return ListCaPoolsResponse
   */
  public function listProjectsLocationsCaPools($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCaPoolsResponse::class);
  }
  /**
   * Update a CaPool. (caPools.patch)
   *
   * @param string $name Output only. The resource name for this CaPool in the
   * format `projects/locations/caPools`.
   * @param CaPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Required. A list of fields to be updated in this
   * request.
   * @return Operation
   */
  public function patch($name, CaPool $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (caPools.setIamPolicy)
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
   * This operation may "fail open" without warning. (caPools.testIamPermissions)
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
class_alias(ProjectsLocationsCaPools::class, 'Google_Service_CertificateAuthorityService_Resource_ProjectsLocationsCaPools');
