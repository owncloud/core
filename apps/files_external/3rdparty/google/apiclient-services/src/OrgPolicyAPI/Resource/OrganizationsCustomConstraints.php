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

namespace Google\Service\OrgPolicyAPI\Resource;

use Google\Service\OrgPolicyAPI\GoogleCloudOrgpolicyV2CustomConstraint;
use Google\Service\OrgPolicyAPI\GoogleCloudOrgpolicyV2ListCustomConstraintsResponse;
use Google\Service\OrgPolicyAPI\GoogleProtobufEmpty;

/**
 * The "customConstraints" collection of methods.
 * Typical usage is:
 *  <code>
 *   $orgpolicyService = new Google\Service\OrgPolicyAPI(...);
 *   $customConstraints = $orgpolicyService->customConstraints;
 *  </code>
 */
class OrganizationsCustomConstraints extends \Google\Service\Resource
{
  /**
   * Creates a CustomConstraint. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the organization does not exist. Returns a
   * `google.rpc.Status` with `google.rpc.Code.ALREADY_EXISTS` if the constraint
   * already exists on the given organization. (customConstraints.create)
   *
   * @param string $parent Required. Must be in the following form: *
   * `organizations/{organization_id}`
   * @param GoogleCloudOrgpolicyV2CustomConstraint $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudOrgpolicyV2CustomConstraint
   */
  public function create($parent, GoogleCloudOrgpolicyV2CustomConstraint $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudOrgpolicyV2CustomConstraint::class);
  }
  /**
   * Deletes a Custom Constraint. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the constraint does not exist.
   * (customConstraints.delete)
   *
   * @param string $name Required. Name of the custom constraint to delete. See
   * `CustomConstraint` for naming rules.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a CustomConstraint. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the CustomConstraint does not exist.
   * (customConstraints.get)
   *
   * @param string $name Required. Resource name of the custom constraint. See
   * `CustomConstraint` for naming requirements.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudOrgpolicyV2CustomConstraint
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudOrgpolicyV2CustomConstraint::class);
  }
  /**
   * Retrieves all of the `CustomConstraints` that exist on a particular
   * organization resource. (customConstraints.listOrganizationsCustomConstraints)
   *
   * @param string $parent Required. The target Cloud resource that parents the
   * set of custom constraints that will be returned from this call. Must be in
   * one of the following forms: * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Size of the pages to be returned. This is currently
   * unsupported and will be ignored. The server may at any point start using this
   * field to limit page size.
   * @opt_param string pageToken Page token used to retrieve the next page. This
   * is currently unsupported and will be ignored. The server may at any point
   * start using this field.
   * @return GoogleCloudOrgpolicyV2ListCustomConstraintsResponse
   */
  public function listOrganizationsCustomConstraints($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudOrgpolicyV2ListCustomConstraintsResponse::class);
  }
  /**
   * Updates a Custom Constraint. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the constraint does not exist. Note: the
   * supplied policy will perform a full overwrite of all fields.
   * (customConstraints.patch)
   *
   * @param string $name Immutable. Name of the constraint. This is unique within
   * the organization. Format of the name should be *
   * `organizations/{organization_id}/customConstraints/{custom_constraint_id}`
   * Example : "organizations/123/customConstraints/custom.createOnlyE2TypeVms"
   * @param GoogleCloudOrgpolicyV2CustomConstraint $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudOrgpolicyV2CustomConstraint
   */
  public function patch($name, GoogleCloudOrgpolicyV2CustomConstraint $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudOrgpolicyV2CustomConstraint::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsCustomConstraints::class, 'Google_Service_OrgPolicyAPI_Resource_OrganizationsCustomConstraints');
