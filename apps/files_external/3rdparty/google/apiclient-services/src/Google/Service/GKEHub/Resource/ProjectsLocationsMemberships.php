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
 * The "memberships" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gkehubService = new Google_Service_GKEHub(...);
 *   $memberships = $gkehubService->memberships;
 *  </code>
 */
class Google_Service_GKEHub_Resource_ProjectsLocationsMemberships extends Google_Service_Resource
{
  /**
   * Creates a new Membership. **This is currently only supported for GKE clusters
   * on Google Cloud**. To register other clusters, follow the instructions at
   * https://cloud.google.com/anthos/multicluster-
   * management/connect/registering-a-cluster. (memberships.create)
   *
   * @param string $parent Required. The parent (project and location) where the
   * Memberships will be created. Specified in the format `projects/locations`.
   * @param Google_Service_GKEHub_Membership $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string membershipId Required. Client chosen ID for the membership.
   * `membership_id` must be a valid RFC 1123 compliant DNS label: 1. At most 63
   * characters in length 2. It must consist of lower case alphanumeric characters
   * or `-` 3. It must start and end with an alphanumeric character Which can be
   * expressed as the regex: `[a-z0-9]([-a-z0-9]*[a-z0-9])?`, with a maximum
   * length of 63 characters.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_GKEHub_Operation
   */
  public function create($parent, Google_Service_GKEHub_Membership $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GKEHub_Operation");
  }
  /**
   * Removes a Membership. **This is currently only supported for GKE clusters on
   * Google Cloud**. To unregister other clusters, follow the instructions at
   * https://cloud.google.com/anthos/multicluster-
   * management/connect/unregistering-a-cluster. (memberships.delete)
   *
   * @param string $name Required. The Membership resource name in the format
   * `projects/locations/memberships`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_GKEHub_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_GKEHub_Operation");
  }
  /**
   * Generates the manifest for deployment of the GKE connect agent. **This method
   * is used internally by Google-provided libraries.** Most clients should not
   * need to call this method directly. (memberships.generateConnectManifest)
   *
   * @param string $name Required. The Membership resource name the Agent will
   * associate with, in the format `projects/locations/memberships`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string imagePullSecretContent Optional. The image pull secret
   * content for the registry, if not public.
   * @opt_param bool isUpgrade Optional. If true, generate the resources for
   * upgrade only. Some resources generated only for installation (e.g. secrets)
   * will be excluded.
   * @opt_param string namespace Optional. Namespace for GKE Connect agent
   * resources. Defaults to `gke-connect`. The Connect Agent is authorized
   * automatically when run in the default namespace. Otherwise, explicit
   * authorization must be granted with an additional IAM binding.
   * @opt_param string proxy Optional. URI of a proxy if connectivity from the
   * agent to gkeconnect.googleapis.com requires the use of a proxy. Format must
   * be in the form `http(s)://{proxy_address}`, depending on the HTTP/HTTPS
   * protocol supported by the proxy. This will direct the connect agent's
   * outbound traffic through a HTTP(S) proxy.
   * @opt_param string registry Optional. The registry to fetch the connect agent
   * image from. Defaults to gcr.io/gkeconnect.
   * @opt_param string version Optional. The Connect agent version to use.
   * Defaults to the most current version.
   * @return Google_Service_GKEHub_GenerateConnectManifestResponse
   */
  public function generateConnectManifest($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('generateConnectManifest', array($params), "Google_Service_GKEHub_GenerateConnectManifestResponse");
  }
  /**
   * Gets the details of a Membership. (memberships.get)
   *
   * @param string $name Required. The Membership resource name in the format
   * `projects/locations/memberships`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GKEHub_Membership
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GKEHub_Membership");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (memberships.getIamPolicy)
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
   * @return Google_Service_GKEHub_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_GKEHub_Policy");
  }
  /**
   * Lists Memberships in a given project and location.
   * (memberships.listProjectsLocationsMemberships)
   *
   * @param string $parent Required. The parent (project and location) where the
   * Memberships will be listed. Specified in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Lists Memberships that match the filter
   * expression, following the syntax outlined in https://google.aip.dev/160.
   * Examples: - Name is `bar` in project `foo-proj` and location `global`: name =
   * "projects/foo-proj/locations/global/membership/bar" - Memberships that have a
   * label called `foo`: labels.foo:* - Memberships that have a label called `foo`
   * whose value is `bar`: labels.foo = bar - Memberships in the CREATING state:
   * state = CREATING
   * @opt_param string orderBy Optional. One or more fields to compare and use to
   * sort the output. See https://google.aip.dev/132#ordering.
   * @opt_param int pageSize Optional. When requesting a 'page' of resources,
   * `page_size` specifies number of resources to return. If unspecified or set to
   * 0, all resources will be returned.
   * @opt_param string pageToken Optional. Token returned by previous call to
   * `ListMemberships` which specifies the position in the list from where to
   * continue listing the resources.
   * @return Google_Service_GKEHub_ListMembershipsResponse
   */
  public function listProjectsLocationsMemberships($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GKEHub_ListMembershipsResponse");
  }
  /**
   * Updates an existing Membership. (memberships.patch)
   *
   * @param string $name Required. The Membership resource name in the format
   * `projects/locations/memberships`.
   * @param Google_Service_GKEHub_Membership $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Required. Mask of fields to update.
   * @return Google_Service_GKEHub_Operation
   */
  public function patch($name, Google_Service_GKEHub_Membership $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GKEHub_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (memberships.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_GKEHub_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GKEHub_Policy
   */
  public function setIamPolicy($resource, Google_Service_GKEHub_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_GKEHub_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (memberships.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_GKEHub_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GKEHub_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_GKEHub_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_GKEHub_TestIamPermissionsResponse");
  }
}
