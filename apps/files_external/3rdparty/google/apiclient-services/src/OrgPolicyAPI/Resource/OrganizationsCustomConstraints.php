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
