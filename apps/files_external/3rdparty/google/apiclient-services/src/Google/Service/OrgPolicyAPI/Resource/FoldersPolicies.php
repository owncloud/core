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
 * The "policies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orgpolicyService = new Google_Service_OrgPolicyAPI(...);
 *   $policies = $orgpolicyService->policies;
 *  </code>
 */
class Google_Service_OrgPolicyAPI_Resource_FoldersPolicies extends Google_Service_Resource
{
  /**
   * Creates a Policy. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the constraint does not exist. Returns a
   * `google.rpc.Status` with `google.rpc.Code.ALREADY_EXISTS` if the policy
   * already exists on the given Cloud resource. (policies.create)
   *
   * @param string $parent Required. The Cloud resource that will parent the new
   * Policy. Must be in one of the following forms: * `projects/{project_number}`
   * * `projects/{project_id}` * `folders/{folder_id}` *
   * `organizations/{organization_id}`
   * @param Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy
   */
  public function create($parent, Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy");
  }
  /**
   * Deletes a Policy. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the constraint or Org Policy does not exist.
   * (policies.delete)
   *
   * @param string $name Required. Name of the policy to delete. See `Policy` for
   * naming rules.
   * @param array $optParams Optional parameters.
   * @return Google_Service_OrgPolicyAPI_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_OrgPolicyAPI_GoogleProtobufEmpty");
  }
  /**
   * Gets a `Policy` on a resource. If no `Policy` is set on the resource,
   * NOT_FOUND is returned. The `etag` value can be used with `UpdatePolicy()` to
   * update a `Policy` during read-modify-write. (policies.get)
   *
   * @param string $name Required. Resource name of the policy. See `Policy` for
   * naming requirements.
   * @param array $optParams Optional parameters.
   * @return Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy");
  }
  /**
   * Gets the effective `Policy` on a resource. This is the result of merging
   * `Policies` in the resource hierarchy and evaluating conditions. The returned
   * `Policy` will not have an `etag` or `condition` set because it is a computed
   * `Policy` across multiple resources. Subtrees of Resource Manager resource
   * hierarchy with 'under:' prefix will not be expanded.
   * (policies.getEffectivePolicy)
   *
   * @param string $name Required. The effective policy to compute. See `Policy`
   * for naming rules.
   * @param array $optParams Optional parameters.
   * @return Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy
   */
  public function getEffectivePolicy($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getEffectivePolicy', array($params), "Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy");
  }
  /**
   * Retrieves all of the `Policies` that exist on a particular resource.
   * (policies.listFoldersPolicies)
   *
   * @param string $parent Required. The target Cloud resource that parents the
   * set of constraints and policies that will be returned from this call. Must be
   * in one of the following forms: * `projects/{project_number}` *
   * `projects/{project_id}` * `folders/{folder_id}` *
   * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Size of the pages to be returned. This is currently
   * unsupported and will be ignored. The server may at any point start using this
   * field to limit page size.
   * @opt_param string pageToken Page token used to retrieve the next page. This
   * is currently unsupported and will be ignored. The server may at any point
   * start using this field.
   * @return Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2ListPoliciesResponse
   */
  public function listFoldersPolicies($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2ListPoliciesResponse");
  }
  /**
   * Updates a Policy. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the constraint or the policy do not exist.
   * Returns a `google.rpc.Status` with `google.rpc.Code.ABORTED` if the etag
   * supplied in the request does not match the persisted etag of the policy Note:
   * the supplied policy will perform a full overwrite of all fields.
   * (policies.patch)
   *
   * @param string $name Immutable. The resource name of the Policy. Must be one
   * of the following forms, where constraint_name is the name of the constraint
   * which this Policy configures: *
   * `projects/{project_number}/policies/{constraint_name}` *
   * `folders/{folder_id}/policies/{constraint_name}` *
   * `organizations/{organization_id}/policies/{constraint_name}` For example,
   * "projects/123/policies/compute.disableSerialPortAccess". Note:
   * `projects/{project_id}/policies/{constraint_name}` is also an acceptable name
   * for API requests, but responses will return the name using the equivalent
   * project number.
   * @param Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy
   */
  public function patch($name, Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy");
  }
}
