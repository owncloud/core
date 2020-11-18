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
class Google_Service_Iam_Resource_Roles extends Google_Service_Resource
{
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
   * @return Google_Service_Iam_Role
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Lists every predefined Role that IAM supports, or every custom role that is
   * defined for an organization or project. (roles.listRoles)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListRolesResponse.
   * @opt_param string view Optional view for the returned Role objects. When
   * `FULL` is specified, the `includedPermissions` field is returned, which
   * includes a list of all permissions in the role. The default value is `BASIC`,
   * which does not return the `includedPermissions` field.
   * @opt_param string parent The `parent` parameter's value depends on the target
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
   * @opt_param int pageSize Optional limit on the number of roles to include in
   * the response. The default is 300, and the maximum is 1,000.
   * @opt_param bool showDeleted Include Roles that have been deleted.
   * @return Google_Service_Iam_ListRolesResponse
   */
  public function listRoles($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Iam_ListRolesResponse");
  }
  /**
   * Lists roles that can be granted on a Google Cloud resource. A role is
   * grantable if the IAM policy for the resource can contain bindings to the
   * role. (roles.queryGrantableRoles)
   *
   * @param Google_Service_Iam_QueryGrantableRolesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_QueryGrantableRolesResponse
   */
  public function queryGrantableRoles(Google_Service_Iam_QueryGrantableRolesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('queryGrantableRoles', array($params), "Google_Service_Iam_QueryGrantableRolesResponse");
  }
}
