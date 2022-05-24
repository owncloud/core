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

namespace Google\Service\CloudResourceManager\Resource;

use Google\Service\CloudResourceManager\GetIamPolicyRequest;
use Google\Service\CloudResourceManager\Organization;
use Google\Service\CloudResourceManager\Policy;
use Google\Service\CloudResourceManager\SearchOrganizationsResponse;
use Google\Service\CloudResourceManager\SetIamPolicyRequest;
use Google\Service\CloudResourceManager\TestIamPermissionsRequest;
use Google\Service\CloudResourceManager\TestIamPermissionsResponse;

/**
 * The "organizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $organizations = $cloudresourcemanagerService->organizations;
 *  </code>
 */
class Organizations extends \Google\Service\Resource
{
  /**
   * Fetches an organization resource identified by the specified resource name.
   * (organizations.get)
   *
   * @param string $name Required. The resource name of the Organization to fetch.
   * This is the organization's relative path in the API, formatted as
   * "organizations/[organizationId]". For example, "organizations/1234".
   * @param array $optParams Optional parameters.
   * @return Organization
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Organization::class);
  }
  /**
   * Gets the access control policy for an organization resource. The policy may
   * be empty if no such policy or resource exists. The `resource` field should be
   * the organization's resource name, for example: "organizations/123".
   * Authorization requires the IAM permission
   * `resourcemanager.organizations.getIamPolicy` on the specified organization.
   * (organizations.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Searches organization resources that are visible to the user and satisfy the
   * specified filter. This method returns organizations in an unspecified order.
   * New organizations do not necessarily appear at the end of the results, and
   * may take a small amount of time to appear. Search will only return
   * organizations on which the user has the permission
   * `resourcemanager.organizations.get` (organizations.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of organizations to
   * return in the response. The server can return fewer organizations than
   * requested. If unspecified, server picks an appropriate default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `SearchOrganizations` that indicates from where listing
   * should continue.
   * @opt_param string query Optional. An optional query string used to filter the
   * Organizations to return in the response. Query rules are case-insensitive.
   * ``` | Field | Description |
   * |------------------|--------------------------------------------| |
   * directoryCustomerId, owner.directoryCustomerId | Filters by directory
   * customer id. | | domain | Filters by domain. | ``` Organizations may be
   * queried by `directoryCustomerId` or by `domain`, where the domain is a G
   * Suite domain, for example: * Query `directorycustomerid:123456789` returns
   * Organization resources with `owner.directory_customer_id` equal to
   * `123456789`. * Query `domain:google.com` returns Organization resources
   * corresponding to the domain `google.com`.
   * @return SearchOrganizationsResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchOrganizationsResponse::class);
  }
  /**
   * Sets the access control policy on an organization resource. Replaces any
   * existing policy. The `resource` field should be the organization's resource
   * name, for example: "organizations/123". Authorization requires the IAM
   * permission `resourcemanager.organizations.setIamPolicy` on the specified
   * organization. (organizations.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * Returns the permissions that a caller has on the specified organization. The
   * `resource` field should be the organization's resource name, for example:
   * "organizations/123". There are no permissions required for making this API
   * call. (organizations.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(Organizations::class, 'Google_Service_CloudResourceManager_Resource_Organizations');
