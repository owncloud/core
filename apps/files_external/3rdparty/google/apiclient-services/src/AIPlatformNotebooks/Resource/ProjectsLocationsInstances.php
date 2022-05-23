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

namespace Google\Service\AIPlatformNotebooks\Resource;

use Google\Service\AIPlatformNotebooks\GetInstanceHealthResponse;
use Google\Service\AIPlatformNotebooks\Instance;
use Google\Service\AIPlatformNotebooks\IsInstanceUpgradeableResponse;
use Google\Service\AIPlatformNotebooks\ListInstancesResponse;
use Google\Service\AIPlatformNotebooks\Operation;
use Google\Service\AIPlatformNotebooks\Policy;
use Google\Service\AIPlatformNotebooks\RegisterInstanceRequest;
use Google\Service\AIPlatformNotebooks\ReportInstanceInfoRequest;
use Google\Service\AIPlatformNotebooks\ResetInstanceRequest;
use Google\Service\AIPlatformNotebooks\RollbackInstanceRequest;
use Google\Service\AIPlatformNotebooks\SetIamPolicyRequest;
use Google\Service\AIPlatformNotebooks\SetInstanceAcceleratorRequest;
use Google\Service\AIPlatformNotebooks\SetInstanceLabelsRequest;
use Google\Service\AIPlatformNotebooks\SetInstanceMachineTypeRequest;
use Google\Service\AIPlatformNotebooks\StartInstanceRequest;
use Google\Service\AIPlatformNotebooks\StopInstanceRequest;
use Google\Service\AIPlatformNotebooks\TestIamPermissionsRequest;
use Google\Service\AIPlatformNotebooks\TestIamPermissionsResponse;
use Google\Service\AIPlatformNotebooks\UpdateInstanceConfigRequest;
use Google\Service\AIPlatformNotebooks\UpdateInstanceMetadataItemsRequest;
use Google\Service\AIPlatformNotebooks\UpdateInstanceMetadataItemsResponse;
use Google\Service\AIPlatformNotebooks\UpdateShieldedInstanceConfigRequest;
use Google\Service\AIPlatformNotebooks\UpgradeInstanceInternalRequest;
use Google\Service\AIPlatformNotebooks\UpgradeInstanceRequest;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $notebooksService = new Google\Service\AIPlatformNotebooks(...);
 *   $instances = $notebooksService->instances;
 *  </code>
 */
class ProjectsLocationsInstances extends \Google\Service\Resource
{
  /**
   * Creates a new Instance in a given project and location. (instances.create)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string instanceId Required. User-defined unique ID of this
   * instance.
   * @return Operation
   */
  public function create($parent, Instance $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Instance. (instances.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
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
   * Gets details of a single Instance. (instances.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
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
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (instances.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Check if a notebook instance is healthy. (instances.getInstanceHealth)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param array $optParams Optional parameters.
   * @return GetInstanceHealthResponse
   */
  public function getInstanceHealth($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getInstanceHealth', [$params], GetInstanceHealthResponse::class);
  }
  /**
   * Check if a notebook instance is upgradable. (instances.isUpgradeable)
   *
   * @param string $notebookInstance Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type Optional. The optional UpgradeType. Setting this field
   * will search for additional compute images to upgrade this instance.
   * @return IsInstanceUpgradeableResponse
   */
  public function isUpgradeable($notebookInstance, $optParams = [])
  {
    $params = ['notebookInstance' => $notebookInstance];
    $params = array_merge($params, $optParams);
    return $this->call('isUpgradeable', [$params], IsInstanceUpgradeableResponse::class);
  }
  /**
   * Lists instances in a given project and location.
   * (instances.listProjectsLocationsInstances)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum return size of the list call.
   * @opt_param string pageToken A previous returned page token that can be used
   * to continue listing from the last result.
   * @return ListInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInstancesResponse::class);
  }
  /**
   * Registers an existing legacy notebook instance to the Notebooks API server.
   * Legacy instances are instances created with the legacy Compute Engine calls.
   * They are not manageable by the Notebooks API out of the box. This call makes
   * these instances manageable by the Notebooks API. (instances.register)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param RegisterInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function register($parent, RegisterInstanceRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('register', [$params], Operation::class);
  }
  /**
   * Allows notebook instances to report their latest instance information to the
   * Notebooks API server. The server will merge the reported information to the
   * instance metadata store. Do not use this method directly. (instances.report)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param ReportInstanceInfoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function report($name, ReportInstanceInfoRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('report', [$params], Operation::class);
  }
  /**
   * Resets a notebook instance. (instances.reset)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param ResetInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reset($name, ResetInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], Operation::class);
  }
  /**
   * Rollbacks a notebook instance to the previous version. (instances.rollback)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param RollbackInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function rollback($name, RollbackInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rollback', [$params], Operation::class);
  }
  /**
   * Updates the guest accelerators of a single Instance.
   * (instances.setAccelerator)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param SetInstanceAcceleratorRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setAccelerator($name, SetInstanceAcceleratorRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAccelerator', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (instances.setIamPolicy)
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
   * Replaces all the labels of an Instance. (instances.setLabels)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param SetInstanceLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setLabels($name, SetInstanceLabelsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLabels', [$params], Operation::class);
  }
  /**
   * Updates the machine type of a single Instance. (instances.setMachineType)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param SetInstanceMachineTypeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setMachineType($name, SetInstanceMachineTypeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMachineType', [$params], Operation::class);
  }
  /**
   * Starts a notebook instance. (instances.start)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param StartInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function start($name, StartInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
  /**
   * Stops a notebook instance. (instances.stop)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param StopInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stop($name, StopInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (instances.testIamPermissions)
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
  /**
   * Update Notebook Instance configurations. (instances.updateConfig)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param UpdateInstanceConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function updateConfig($name, UpdateInstanceConfigRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateConfig', [$params], Operation::class);
  }
  /**
   * Add/update metadata items for an instance. (instances.updateMetadataItems)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param UpdateInstanceMetadataItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UpdateInstanceMetadataItemsResponse
   */
  public function updateMetadataItems($name, UpdateInstanceMetadataItemsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateMetadataItems', [$params], UpdateInstanceMetadataItemsResponse::class);
  }
  /**
   * Updates the Shielded instance configuration of a single Instance.
   * (instances.updateShieldedInstanceConfig)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param UpdateShieldedInstanceConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function updateShieldedInstanceConfig($name, UpdateShieldedInstanceConfigRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateShieldedInstanceConfig', [$params], Operation::class);
  }
  /**
   * Upgrades a notebook instance to the latest version. (instances.upgrade)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param UpgradeInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function upgrade($name, UpgradeInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upgrade', [$params], Operation::class);
  }
  /**
   * Allows notebook instances to call this endpoint to upgrade themselves. Do not
   * use this method directly. (instances.upgradeInternal)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param UpgradeInstanceInternalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function upgradeInternal($name, UpgradeInstanceInternalRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upgradeInternal', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstances::class, 'Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsInstances');
