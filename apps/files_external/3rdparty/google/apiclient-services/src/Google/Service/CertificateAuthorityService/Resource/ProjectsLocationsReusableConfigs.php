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
 * The "reusableConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $privatecaService = new Google_Service_CertificateAuthorityService(...);
 *   $reusableConfigs = $privatecaService->reusableConfigs;
 *  </code>
 */
class Google_Service_CertificateAuthorityService_Resource_ProjectsLocationsReusableConfigs extends Google_Service_Resource
{
  /**
   * Returns a ReusableConfig. (reusableConfigs.get)
   *
   * @param string $name Required. The name of the ReusableConfigs to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_ReusableConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CertificateAuthorityService_ReusableConfig");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (reusableConfigs.getIamPolicy)
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
   * @return Google_Service_CertificateAuthorityService_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CertificateAuthorityService_Policy");
  }
  /**
   * Lists ReusableConfigs. (reusableConfigs.listProjectsLocationsReusableConfigs)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the ReusableConfigs, in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response.
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * @opt_param int pageSize Optional. Limit on the number of ReusableConfigs to
   * include in the response. Further ReusableConfigs can subsequently be obtained
   * by including the ListReusableConfigsResponse.next_page_token in a subsequent
   * request. If unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListReusableConfigsResponse.next_page_token.
   * @return Google_Service_CertificateAuthorityService_ListReusableConfigsResponse
   */
  public function listProjectsLocationsReusableConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CertificateAuthorityService_ListReusableConfigsResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (reusableConfigs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CertificateAuthorityService_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Policy
   */
  public function setIamPolicy($resource, Google_Service_CertificateAuthorityService_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CertificateAuthorityService_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (reusableConfigs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CertificateAuthorityService_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CertificateAuthorityService_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CertificateAuthorityService_TestIamPermissionsResponse");
  }
}
