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
use Google\Service\CloudResourceManager\ListProjectsResponse;
use Google\Service\CloudResourceManager\MoveProjectRequest;
use Google\Service\CloudResourceManager\Operation;
use Google\Service\CloudResourceManager\Policy;
use Google\Service\CloudResourceManager\Project;
use Google\Service\CloudResourceManager\SearchProjectsResponse;
use Google\Service\CloudResourceManager\SetIamPolicyRequest;
use Google\Service\CloudResourceManager\TestIamPermissionsRequest;
use Google\Service\CloudResourceManager\TestIamPermissionsResponse;
use Google\Service\CloudResourceManager\UndeleteProjectRequest;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $projects = $cloudresourcemanagerService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Request that a new project be created. The result is an `Operation` which can
   * be used to track the creation process. This process usually takes a few
   * seconds, but can sometimes take much longer. The tracking `Operation` is
   * automatically deleted after a few hours, so there is no need to call
   * `DeleteOperation`. (projects.create)
   *
   * @param Project $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create(Project $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Marks the project identified by the specified `name` (for example,
   * `projects/415104041262`) for deletion. This method will only affect the
   * project if it has a lifecycle state of ACTIVE. This method changes the
   * Project's lifecycle state from ACTIVE to DELETE_REQUESTED. The deletion
   * starts at an unspecified time, at which point the Project is no longer
   * accessible. Until the deletion completes, you can check the lifecycle state
   * checked by retrieving the project with GetProject, and the project remains
   * visible to ListProjects. However, you cannot update the project. After the
   * deletion completes, the project is not retrievable by the GetProject,
   * ListProjects, and SearchProjects methods. This method behaves idempotently,
   * such that deleting a `DELETE_REQUESTED` project will not cause an error, but
   * also won't do anything. The caller must have
   * `resourcemanager.projects.delete` permissions for this project.
   * (projects.delete)
   *
   * @param string $name Required. The name of the Project (for example,
   * `projects/415104041262`).
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves the project identified by the specified `name` (for example,
   * `projects/415104041262`). The caller must have `resourcemanager.projects.get`
   * permission for this project. (projects.get)
   *
   * @param string $name Required. The name of the project (for example,
   * `projects/415104041262`).
   * @param array $optParams Optional parameters.
   * @return Project
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Project::class);
  }
  /**
   * Returns the IAM access control policy for the specified project, in the
   * format `projects/{ProjectIdOrNumber}` e.g. projects/123. Permission is denied
   * if the policy or the resource do not exist. (projects.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
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
   * Lists projects that are direct children of the specified folder or
   * organization resource. `list()` provides a strongly consistent view of the
   * projects underneath the specified parent resource. `list()` returns projects
   * sorted based upon the (ascending) lexical ordering of their `display_name`.
   * The caller must have `resourcemanager.projects.list` permission on the
   * identified parent. (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of projects to return in
   * the response. The server can return fewer projects than requested. If
   * unspecified, server picks an appropriate default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to ListProjects that indicates from where listing should
   * continue.
   * @opt_param string parent Required. The name of the parent resource to list
   * projects under. For example, setting this field to 'folders/1234' would list
   * all projects directly under that folder.
   * @opt_param bool showDeleted Optional. Indicate that projects in the
   * `DELETE_REQUESTED` state should also be returned. Normally only `ACTIVE`
   * projects are returned.
   * @return ListProjectsResponse
   */
  public function listProjects($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListProjectsResponse::class);
  }
  /**
   * Move a project to another place in your resource hierarchy, under a new
   * resource parent. Returns an operation which can be used to track the process
   * of the project move workflow. Upon success, the `Operation.response` field
   * will be populated with the moved project. The caller must have
   * `resourcemanager.projects.move` permission on the project, on the project's
   * current and proposed new parent. If project has no current parent, or it
   * currently does not have an associated organization resource, you will also
   * need the `resourcemanager.projects.setIamPolicy` permission in the project.
   * (projects.move)
   *
   * @param string $name Required. The name of the project to move.
   * @param MoveProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function move($name, MoveProjectRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('move', [$params], Operation::class);
  }
  /**
   * Updates the `display_name` and labels of the project identified by the
   * specified `name` (for example, `projects/415104041262`). Deleting all labels
   * requires an update mask for labels field. The caller must have
   * `resourcemanager.projects.update` permission for this project.
   * (projects.patch)
   *
   * @param string $name Output only. The unique resource name of the project. It
   * is an int64 generated number prefixed by "projects/". Example:
   * `projects/415104041262`
   * @param Project $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. An update mask to selectively update
   * fields.
   * @return Operation
   */
  public function patch($name, Project $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Search for projects that the caller has both `resourcemanager.projects.get`
   * permission on, and also satisfy the specified query. This method returns
   * projects in an unspecified order. This method is eventually consistent with
   * project mutations; this means that a newly created project may not appear in
   * the results or recent updates to an existing project may not be reflected in
   * the results. To retrieve the latest state of a project, use the GetProject
   * method. (projects.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of projects to return in
   * the response. The server can return fewer projects than requested. If
   * unspecified, server picks an appropriate default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to ListProjects that indicates from where listing should
   * continue.
   * @opt_param string query Optional. A query string for searching for projects
   * that the caller has `resourcemanager.projects.get` permission to. If multiple
   * fields are included in the query, the it will return results that match any
   * of the fields. Some eligible fields are: ``` | Field | Description |
   * |-------------------------|----------------------------------------------| |
   * displayName, name | Filters by displayName. | | parent | Project's parent
   * (for example: folders/123, organizations). Prefer parent field over
   * parent.type and parent.id.| | parent.type | Parent's type: `folder` or
   * `organization`. | | parent.id | Parent's id number (for example: 123) | | id,
   * projectId | Filters by projectId. | | state, lifecycleState | Filters by
   * state. | | labels | Filters by label name or value. | | labels.\ (where *key*
   * is the name of a label) | Filters by label name.| ``` Search expressions are
   * case insensitive. Some examples queries: ``` | Query | Description |
   * |------------------|-----------------------------------------------------| |
   * name:how* | The project's name starts with "how". | | name:Howl | The
   * project's name is `Howl` or `howl`. | | name:HOWL | Equivalent to above. | |
   * NAME:howl | Equivalent to above. | | labels.color:* | The project has the
   * label `color`. | | labels.color:red | The project's label `color` has the
   * value `red`. | | labels.color:red labels.size:big | The project's label
   * `color` has the value `red` and its label `size` has the value `big`.| ``` If
   * no query is specified, the call will return projects for which the user has
   * the `resourcemanager.projects.get` permission.
   * @return SearchProjectsResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchProjectsResponse::class);
  }
  /**
   * Sets the IAM access control policy for the specified project, in the format
   * `projects/{ProjectIdOrNumber}` e.g. projects/123. CAUTION: This method will
   * replace the existing policy, and cannot be used to append additional IAM
   * settings. Note: Removing service accounts from policies or changing their
   * roles can render services completely inoperable. It is important to
   * understand how the service account is being used before removing or updating
   * its roles. The following constraints apply when using `setIamPolicy()`: +
   * Project does not support `allUsers` and `allAuthenticatedUsers` as `members`
   * in a `Binding` of a `Policy`. + The owner role can be granted to a `user`,
   * `serviceAccount`, or a group that is part of an organization. For example,
   * group@myownpersonaldomain.com could be added as an owner to a project in the
   * myownpersonaldomain.com organization, but not the examplepetstore.com
   * organization. + Service accounts can be made owners of a project directly
   * without any restrictions. However, to be added as an owner, a user must be
   * invited using the Cloud Platform console and must accept the invitation. + A
   * user cannot be granted the owner role using `setIamPolicy()`. The user must
   * be granted the owner role using the Cloud Platform Console and must
   * explicitly accept the invitation. + Invitations to grant the owner role
   * cannot be sent using `setIamPolicy()`; they must be sent only using the Cloud
   * Platform Console. + Membership changes that leave the project without any
   * owners that have accepted the Terms of Service (ToS) will be rejected. + If
   * the project is not part of an organization, there must be at least one owner
   * who has accepted the Terms of Service (ToS) agreement in the policy. Calling
   * `setIamPolicy()` to remove the last ToS-accepted owner from the policy will
   * fail. This restriction also applies to legacy projects that no longer have
   * owners who have accepted the ToS. Edits to IAM policies will be rejected
   * until the lack of a ToS-accepting owner is rectified. + Calling this method
   * requires enabling the App Engine Admin API. (projects.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
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
   * Returns permissions that a caller has on the specified project, in the format
   * `projects/{ProjectIdOrNumber}` e.g. projects/123..
   * (projects.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
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
  /**
   * Restores the project identified by the specified `name` (for example,
   * `projects/415104041262`). You can only use this method for a project that has
   * a lifecycle state of DELETE_REQUESTED. After deletion starts, the project
   * cannot be restored. The caller must have `resourcemanager.projects.undelete`
   * permission for this project. (projects.undelete)
   *
   * @param string $name Required. The name of the project (for example,
   * `projects/415104041262`). Required.
   * @param UndeleteProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function undelete($name, UndeleteProjectRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_CloudResourceManager_Resource_Projects');
