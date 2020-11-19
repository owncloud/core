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
 * The "repositories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google_Service_ArtifactRegistry(...);
 *   $repositories = $artifactregistryService->repositories;
 *  </code>
 */
class Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositories extends Google_Service_Resource
{
  /**
   * Creates a repository. The returned Operation will finish once the repository
   * has been created. Its response will be the created Repository.
   * (repositories.create)
   *
   * @param string $parent The name of the parent resource where the repository
   * will be created.
   * @param Google_Service_ArtifactRegistry_Repository $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string repositoryId The repository id to use for this repository.
   * @return Google_Service_ArtifactRegistry_Operation
   */
  public function create($parent, Google_Service_ArtifactRegistry_Repository $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ArtifactRegistry_Operation");
  }
  /**
   * Deletes a repository and all of its contents. The returned Operation will
   * finish once the repository has been deleted. It will not have any Operation
   * metadata and will return a google.protobuf.Empty response.
   * (repositories.delete)
   *
   * @param string $name The name of the repository to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ArtifactRegistry_Operation");
  }
  /**
   * Gets a repository. (repositories.get)
   *
   * @param string $name The name of the repository to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_Repository
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ArtifactRegistry_Repository");
  }
  /**
   * Gets the IAM policy for a given resource. (repositories.getIamPolicy)
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
   * @return Google_Service_ArtifactRegistry_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_ArtifactRegistry_Policy");
  }
  /**
   * Lists repositories. (repositories.listProjectsLocationsRepositories)
   *
   * @param string $parent The name of the parent resource whose repositories will
   * be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of repositories to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return Google_Service_ArtifactRegistry_ListRepositoriesResponse
   */
  public function listProjectsLocationsRepositories($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ArtifactRegistry_ListRepositoriesResponse");
  }
  /**
   * Updates a repository. (repositories.patch)
   *
   * @param string $name The name of the repository, for example:
   * "projects/p1/locations/us-central1/repositories/repo1".
   * @param Google_Service_ArtifactRegistry_Repository $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_ArtifactRegistry_Repository
   */
  public function patch($name, Google_Service_ArtifactRegistry_Repository $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ArtifactRegistry_Repository");
  }
  /**
   * Updates the IAM policy for a given resource. (repositories.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_ArtifactRegistry_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_Policy
   */
  public function setIamPolicy($resource, Google_Service_ArtifactRegistry_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_ArtifactRegistry_Policy");
  }
  /**
   * Tests if the caller has a list of permissions on a resource.
   * (repositories.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_ArtifactRegistry_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_ArtifactRegistry_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_ArtifactRegistry_TestIamPermissionsResponse");
  }
}
