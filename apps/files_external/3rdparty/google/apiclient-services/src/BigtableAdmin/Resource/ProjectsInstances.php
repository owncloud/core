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

namespace Google\Service\BigtableAdmin\Resource;

use Google\Service\BigtableAdmin\BigtableadminEmpty;
use Google\Service\BigtableAdmin\CreateInstanceRequest;
use Google\Service\BigtableAdmin\GetIamPolicyRequest;
use Google\Service\BigtableAdmin\Instance;
use Google\Service\BigtableAdmin\ListInstancesResponse;
use Google\Service\BigtableAdmin\Operation;
use Google\Service\BigtableAdmin\Policy;
use Google\Service\BigtableAdmin\SetIamPolicyRequest;
use Google\Service\BigtableAdmin\TestIamPermissionsRequest;
use Google\Service\BigtableAdmin\TestIamPermissionsResponse;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigtableadminService = new Google\Service\BigtableAdmin(...);
 *   $instances = $bigtableadminService->instances;
 *  </code>
 */
class ProjectsInstances extends \Google\Service\Resource
{
  /**
   * Create an instance within a project. (instances.create)
   *
   * @param string $parent Required. The unique name of the project in which to
   * create the new instance. Values are of the form `projects/{project}`.
   * @param CreateInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, CreateInstanceRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete an instance from a project. (instances.delete)
   *
   * @param string $name Required. The unique name of the instance to be deleted.
   * Values are of the form `projects/{project}/instances/{instance}`.
   * @param array $optParams Optional parameters.
   * @return BigtableadminEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigtableadminEmpty::class);
  }
  /**
   * Gets information about an instance. (instances.get)
   *
   * @param string $name Required. The unique name of the requested instance.
   * Values are of the form `projects/{project}/instances/{instance}`.
   * @param array $optParams Optional parameters.
   * @return Instance
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Instance::class);
  }
  /**
   * Gets the access control policy for an instance resource. Returns an empty
   * policy if an instance exists but does not have a policy set.
   * (instances.getIamPolicy)
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
   * Lists information about instances in a project.
   * (instances.listProjectsInstances)
   *
   * @param string $parent Required. The unique name of the project for which a
   * list of instances is requested. Values are of the form `projects/{project}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken DEPRECATED: This field is unused and ignored.
   * @return ListInstancesResponse
   */
  public function listProjectsInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInstancesResponse::class);
  }
  /**
   * Partially updates an instance within a project. This method can modify all
   * fields of an Instance and is the preferred way to update an Instance.
   * (instances.partialUpdateInstance)
   *
   * @param string $name The unique name of the instance. Values are of the form
   * `projects/{project}/instances/a-z+[a-z0-9]`.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The subset of Instance fields which
   * should be replaced. Must be explicitly set.
   * @return Operation
   */
  public function partialUpdateInstance($name, Instance $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('partialUpdateInstance', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on an instance resource. Replaces any existing
   * policy. (instances.setIamPolicy)
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
   * Returns permissions that the caller has on the specified instance resource.
   * (instances.testIamPermissions)
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
   * Updates an instance within a project. This method updates only the display
   * name and type for an Instance. To update other Instance properties, such as
   * labels, use PartialUpdateInstance. (instances.update)
   *
   * @param string $name The unique name of the instance. Values are of the form
   * `projects/{project}/instances/a-z+[a-z0-9]`.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   * @return Instance
   */
  public function update($name, Instance $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Instance::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsInstances::class, 'Google_Service_BigtableAdmin_Resource_ProjectsInstances');
