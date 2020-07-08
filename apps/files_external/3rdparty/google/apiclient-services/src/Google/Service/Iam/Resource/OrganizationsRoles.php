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
 * The "roles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google_Service_Iam(...);
 *   $roles = $iamService->roles;
 *  </code>
 */
class Google_Service_Iam_Resource_OrganizationsRoles extends Google_Service_Resource
{
  /**
   * Creates a new Role. (roles.create)
   *
   * @param string $parent The `parent` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `parent` value format is described below:
   *
   * * [`projects.roles.create()`](/iam/reference/rest/v1/projects.roles/create):
   * `projects/{PROJECT_ID}`. This method creates project-level   [custom
   * roles](/iam/docs/understanding-custom-roles).   Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles`
   *
   * * [`organizations.roles.create()`](/iam/reference/rest/v1/organizations.roles
   * /create):   `organizations/{ORGANIZATION_ID}`. This method creates
   * organization-level   [custom roles](/iam/docs/understanding-custom-roles).
   * Example request   URL:
   * `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles`
   *
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param Google_Service_Iam_CreateRoleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Role
   */
  public function create($parent, Google_Service_Iam_CreateRoleRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Soft deletes a role. The role is suspended and cannot be used to create new
   * IAM Policy Bindings. The Role will not be included in `ListRoles()` unless
   * `show_deleted` is set in the `ListRolesRequest`. The Role contains the
   * deleted boolean set. Existing Bindings remains, but are inactive. The Role
   * can be undeleted within 7 days. After 7 days the Role is deleted and all
   * Bindings associated with the role are removed. (roles.delete)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below:
   *
   * * [`projects.roles.delete()`](/iam/reference/rest/v1/projects.roles/delete):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method deletes only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been   created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   *
   * * [`organizations.roles.delete()`](/iam/reference/rest/v1/organizations.roles
   * /delete):   `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This
   * method   deletes only [custom roles](/iam/docs/understanding-custom-roles)
   * that   have been created at the organization level. Example request URL:   `h
   * ttps://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_RO
   * LE_ID}`
   *
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Used to perform a consistent read-modify-write.
   * @return Google_Service_Iam_Role
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Gets a Role definition. (roles.get)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely [`roles`](/iam/reference/rest/v1/roles),
   * [`projects`](/iam/reference/rest/v1/projects.roles), or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below:
   *
   * * [`roles.get()`](/iam/reference/rest/v1/roles/get): `roles/{ROLE_NAME}`.
   * This method returns results from all   [predefined roles](/iam/docs
   * /understanding-roles#predefined_roles) in   Cloud IAM. Example request URL:
   * `https://iam.googleapis.com/v1/roles/{ROLE_NAME}`
   *
   * * [`projects.roles.get()`](/iam/reference/rest/v1/projects.roles/get):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method returns only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been   created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   *
   * * [`organizations.roles.get()`](/iam/reference/rest/v1/organizations.roles/ge
   * t):   `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This method
   * returns only [custom roles](/iam/docs/understanding-custom-roles) that   have
   * been created at the organization level. Example request URL:   `https://iam.g
   * oogleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`
   *
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Role
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Lists the Roles defined on a resource. (roles.listOrganizationsRoles)
   *
   * @param string $parent The `parent` parameter's value depends on the target
   * resource for the request, namely [`roles`](/iam/reference/rest/v1/roles),
   * [`projects`](/iam/reference/rest/v1/projects.roles), or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `parent` value format is described below:
   *
   * * [`roles.list()`](/iam/reference/rest/v1/roles/list): An empty string.
   * This method doesn't require a resource; it simply returns all   [predefined
   * roles](/iam/docs/understanding-roles#predefined_roles) in   Cloud IAM.
   * Example request URL:   `https://iam.googleapis.com/v1/roles`
   *
   * * [`projects.roles.list()`](/iam/reference/rest/v1/projects.roles/list):
   * `projects/{PROJECT_ID}`. This method lists all project-level   [custom
   * roles](/iam/docs/understanding-custom-roles).   Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles`
   *
   * * [`organizations.roles.list()`](/iam/reference/rest/v1/organizations.roles/l
   * ist):   `organizations/{ORGANIZATION_ID}`. This method lists all
   * organization-level [custom roles](/iam/docs/understanding-custom-roles).
   * Example request URL:
   * `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles`
   *
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional view for the returned Role objects. When
   * `FULL` is specified, the `includedPermissions` field is returned, which
   * includes a list of all permissions in the role. The default value is `BASIC`,
   * which does not return the `includedPermissions` field.
   * @opt_param bool showDeleted Include Roles that have been deleted.
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListRolesResponse.
   * @opt_param int pageSize Optional limit on the number of roles to include in
   * the response.
   * @return Google_Service_Iam_ListRolesResponse
   */
  public function listOrganizationsRoles($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Iam_ListRolesResponse");
  }
  /**
   * Updates a Role definition. (roles.patch)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below:
   *
   * * [`projects.roles.patch()`](/iam/reference/rest/v1/projects.roles/patch):
   * `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method updates only
   * [custom roles](/iam/docs/understanding-custom-roles) that have been   created
   * at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   *
   * * [`organizations.roles.patch()`](/iam/reference/rest/v1/organizations.roles/
   * patch):   `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`. This
   * method   updates only [custom roles](/iam/docs/understanding-custom-roles)
   * that   have been created at the organization level. Example request URL:   `h
   * ttps://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{CUSTOM_RO
   * LE_ID}`
   *
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param Google_Service_Iam_Role $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask describing which fields in the Role have
   * changed.
   * @return Google_Service_Iam_Role
   */
  public function patch($name, Google_Service_Iam_Role $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Undelete a Role, bringing it back in its previous state. (roles.undelete)
   *
   * @param string $name The `name` parameter's value depends on the target
   * resource for the request, namely
   * [`projects`](/iam/reference/rest/v1/projects.roles) or
   * [`organizations`](/iam/reference/rest/v1/organizations.roles). Each resource
   * type's `name` value format is described below:
   *
   * * [`projects.roles.undelete()`](/iam/reference/rest/v1/projects.roles/undelet
   * e):   `projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`. This method undeletes
   * only [custom roles](/iam/docs/understanding-custom-roles) that have been
   * created at the project level. Example request URL:
   * `https://iam.googleapis.com/v1/projects/{PROJECT_ID}/roles/{CUSTOM_ROLE_ID}`
   *
   * * [`organizations.roles.undelete()`](/iam/reference/rest/v1/organizations.rol
   * es/undelete):   `organizations/{ORGANIZATION_ID}/roles/{CUSTOM_ROLE_ID}`.
   * This method   undeletes only [custom roles](/iam/docs/understanding-custom-
   * roles) that   have been created at the organization level. Example request
   * URL:   `https://iam.googleapis.com/v1/organizations/{ORGANIZATION_ID}/roles/{
   * CUSTOM_ROLE_ID}`
   *
   * Note: Wildcard (*) values are invalid; you must specify a complete project ID
   * or organization ID.
   * @param Google_Service_Iam_UndeleteRoleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Role
   */
  public function undelete($name, Google_Service_Iam_UndeleteRoleRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Iam_Role");
  }
}
