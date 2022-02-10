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

namespace Google\Service\Iam\Resource;

use Google\Service\Iam\ListRolesResponse;
use Google\Service\Iam\QueryGrantableRolesRequest;
use Google\Service\Iam\QueryGrantableRolesResponse;
use Google\Service\Iam\Role;

/**
 * The "roles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google\Service\Iam(...);
 *   $roles = $iamService->roles;
 *  </code>
 */
class Roles extends \Google\Service\Resource
{
  /**
   * Gets the definition of a Role. (roles.get)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`roles`](https://cloud.google.com/iam/reference/rest/v1/roles),
   * [`projects`](https://cloud.google.com/iam/reference/rest/v1/projects.roles),
   * or [`organizations`](https://cloud.google.com/iam/reference/rest/v1/organizat
   * ions.roles). Each resource type's `name` value format is described below: *
   * [`roles.get()`](https://cloud.google.com/iam/reference/rest/v1/roles/get):
   * `roles/{ROLE_NAME}`. This method returns results from all [predefined
   * roles](https://cloud.google.com/iam/docs/understanding-
   * roles#predefined_roles) in Cloud IAM. Example request URL:
   * `https://iam.googleapis.com/v1/roles/{ROLE_NAME}` * [`projects.roles.get()`](
   * https://cloud.google.com/iam/reference/rest/v1/projects.roles/get):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method returns only
   * [custom roles](https://cloud.google.com/iam/docs/understanding-custom-roles)
   * that have been created at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   * * [`organizations.roles.get()`](https://cloud.google.com/iam/reference/rest/v
   * 1/organizations.roles/get):
   * `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This method returns
   * only [custom roles](https://cloud.google.com/iam/docs/understanding-custom-
   * roles) that have been created at the organization level. Example request URL:
   * `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_
   * ROLE_ID}` Note: Wildcard (*) values are invalid; you must specify a complete
   * project ID or organization ID.
   * @param array $optParams Optional parameters.
   * @return Role
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Role::class);
  }
  /**
   * Lists every predefined Role that IAM supports, or every custom role that is
   * defined for an organization or project. (roles.listRoles)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional limit on the number of roles to include in
   * the response. The default is 300, and the maximum is 1,000.
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListRolesResponse.
   * @opt_param string parent The `parent` parameter's value depends on the target
   * resource for the request, namely
   * [`roles`](https://cloud.google.com/iam/reference/rest/v1/roles),
   * [`projects`](https://cloud.google.com/iam/reference/rest/v1/projects.roles),
   * or [`organizations`](https://cloud.google.com/iam/reference/rest/v1/organizat
   * ions.roles). Each resource type's `parent` value format is described below: *
   * [`roles.list()`](https://cloud.google.com/iam/reference/rest/v1/roles/list):
   * An empty string. This method doesn't require a resource; it simply returns
   * all [predefined roles](https://cloud.google.com/iam/docs/understanding-
   * roles#predefined_roles) in Cloud IAM. Example request URL:
   * `https://iam.googleapis.com/v1/roles` * [`projects.roles.list()`](https://clo
   * ud.google.com/iam/reference/rest/v1/projects.roles/list):
   * `projects/{PROJECT_ID}`. This method lists all project-level [custom
   * roles](https://cloud.google.com/iam/docs/understanding-custom-roles). Example
   * request URL: `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles` * [`
   * organizations.roles.list()`](https://cloud.google.com/iam/reference/rest/v1/o
   * rganizations.roles/list): `organizations/{ORGANIZATION_ID}`. This method
   * lists all organization-level [custom roles](https://cloud.google.com/iam/docs
   * /understanding-custom-roles). Example request URL:
   * `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles` Note:
   * Wildcard (*) values are invalid; you must specify a complete project ID or
   * organization ID.
   * @opt_param bool showDeleted Include Roles that have been deleted.
   * @opt_param string view Optional view for the returned Role objects. When
   * `FULL` is specified, the `includedPermissions` field is returned, which
   * includes a list of all permissions in the role. The default value is `BASIC`,
   * which does not return the `includedPermissions` field.
   * @return ListRolesResponse
   */
  public function listRoles($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRolesResponse::class);
  }
  /**
   * Lists roles that can be granted on a Google Cloud resource. A role is
   * grantable if the IAM policy for the resource can contain bindings to the
   * role. (roles.queryGrantableRoles)
   *
   * @param QueryGrantableRolesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return QueryGrantableRolesResponse
   */
  public function queryGrantableRoles(QueryGrantableRolesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('queryGrantableRoles', [$params], QueryGrantableRolesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Roles::class, 'Google_Service_Iam_Resource_Roles');
