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

use Google\Service\Iam\CreateRoleRequest;
use Google\Service\Iam\ListRolesResponse;
use Google\Service\Iam\Role;
use Google\Service\Iam\UndeleteRoleRequest;

/**
 * The "roles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google\Service\Iam(...);
 *   $roles = $iamService->roles;
 *  </code>
 */
class OrganizationsRoles extends \Google\Service\Resource
{
  /**
   * Creates a new custom Role. (roles.create)
   *
   * @param string $parent The `parent` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `parent` value format is described below: *
   * [`projects.roles.create()`](/iam/reference/rest/v1/projects.roles/create):
   * `projects/{PROJECT_ID}`. This method creates project-level [custom
   * roles](/iam/docs/understanding-custom-roles). Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles` * [`organizations
   * .roles.create()`](/iam/reference/rest/v1/organizations.roles/create):
   * `organizations/{ORGANIZATION_ID}`. This method creates organization-level
   * [custom roles](/iam/docs/understanding-custom-roles). Example request URL:
   * `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles` Note:
   * Wildcard (*) values are invalid; you must specify a complete project ID or
   * organization ID.
   * @param CreateRoleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Role
   */
  public function create($parent, CreateRoleRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Role::class);
  }
  /**
   * Deletes a custom Role. When you delete a custom role, the following changes
   * occur immediately: * You cannot bind a principal to the custom role in an IAM
   * Policy. * Existing bindings to the custom role are not changed, but they have
   * no effect. * By default, the response from ListRoles does not include the
   * custom role. You have 7 days to undelete the custom role. After 7 days, the
   * following changes occur: * The custom role is permanently deleted and cannot
   * be recovered. * If an IAM policy contains a binding to the custom role, the
   * binding is permanently removed. (roles.delete)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below: *
   * [`projects.roles.delete()`](/iam/reference/rest/v1/projects.roles/delete):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method deletes only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   * * [`organizations.roles.delete()`](/iam/reference/rest/v1/organizations.roles
   * /delete): `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This
   * method deletes only [custom roles](/iam/docs/understanding-custom-roles) that
   * have been created at the organization level. Example request URL: `https://ia
   * m.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Used to perform a consistent read-modify-write.
   * @return Role
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Role::class);
  }
  /**
   * Gets the definition of a Role. (roles.get)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely [`roles`](/iam/reference/rest/v1/roles),
   * [`projects`](/iam/reference/rest/v1/projects.roles), or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below: *
   * [`roles.get()`](/iam/reference/rest/v1/roles/get): `roles/{ROLE_NAME}`. This
   * method returns results from all [predefined roles](/iam/docs/understanding-
   * roles#predefined_roles) in Cloud IAM. Example request URL:
   * `https://iam.googleapis.com/v1/roles/{ROLE_NAME}` *
   * [`projects.roles.get()`](/iam/reference/rest/v1/projects.roles/get):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method returns only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   * * [`organizations.roles.get()`](/iam/reference/rest/v1/organizations.roles/ge
   * t): `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This method
   * returns only [custom roles](/iam/docs/understanding-custom-roles) that have
   * been created at the organization level. Example request URL: `https://iam.goo
   * gleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}` Note:
   * Wildcard (*) values are invalid; you must specify a complete project ID or
   * organization ID.
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
   * defined for an organization or project. (roles.listOrganizationsRoles)
   *
   * @param string $parent The `parent` parameter's value depends on the target
   * resource for the request, namely [`roles`](/iam/reference/rest/v1/roles),
   * [`projects`](/iam/reference/rest/v1/projects.roles), or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `parent` value format is described below: *
   * [`roles.list()`](/iam/reference/rest/v1/roles/list): An empty string. This
   * method doesn't require a resource; it simply returns all [predefined
   * roles](/iam/docs/understanding-roles#predefined_roles) in Cloud IAM. Example
   * request URL: `https://iam.googleapis.com/v1/roles` *
   * [`projects.roles.list()`](/iam/reference/rest/v1/projects.roles/list):
   * `projects/{PROJECT_ID}`. This method lists all project-level [custom
   * roles](/iam/docs/understanding-custom-roles). Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles` * [`organizations
   * .roles.list()`](/iam/reference/rest/v1/organizations.roles/list):
   * `organizations/{ORGANIZATION_ID}`. This method lists all organization-level
   * [custom roles](/iam/docs/understanding-custom-roles). Example request URL:
   * `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles` Note:
   * Wildcard (*) values are invalid; you must specify a complete project ID or
   * organization ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional limit on the number of roles to include in
   * the response. The default is 300, and the maximum is 1,000.
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListRolesResponse.
   * @opt_param bool showDeleted Include Roles that have been deleted.
   * @opt_param string view Optional view for the returned Role objects. When
   * `FULL` is specified, the `includedPermissions` field is returned, which
   * includes a list of all permissions in the role. The default value is `BASIC`,
   * which does not return the `includedPermissions` field.
   * @return ListRolesResponse
   */
  public function listOrganizationsRoles($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRolesResponse::class);
  }
  /**
   * Updates the definition of a custom Role. (roles.patch)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below: *
   * [`projects.roles.patch()`](/iam/reference/rest/v1/projects.roles/patch):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method updates only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   * * [`organizations.roles.patch()`](/iam/reference/rest/v1/organizations.roles/
   * patch): `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This method
   * updates only [custom roles](/iam/docs/understanding-custom-roles) that have
   * been created at the organization level. Example request URL: `https://iam.goo
   * gleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}` Note:
   * Wildcard (*) values are invalid; you must specify a complete project ID or
   * organization ID.
   * @param Role $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask describing which fields in the Role have
   * changed.
   * @return Role
   */
  public function patch($name, Role $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Role::class);
  }
  /**
   * Undeletes a custom Role. (roles.undelete)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below: * [`projects.roles.undelete()`
   * ](/iam/reference/rest/v1/projects.roles/undelete):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method undeletes only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   * * [`organizations.roles.undelete()`](/iam/reference/rest/v1/organizations.rol
   * es/undelete): `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This
   * method undeletes only [custom roles](/iam/docs/understanding-custom-roles)
   * that have been created at the organization level. Example request URL: `https
   * ://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_I
   * D}` Note: Wildcard (*) values are invalid; you must specify a complete
   * project ID or organization ID.
   * @param UndeleteRoleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Role
   */
  public function undelete($name, UndeleteRoleRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Role::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsRoles::class, 'Google_Service_Iam_Resource_OrganizationsRoles');
