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

use Google\Service\AIPlatformNotebooks\DiagnoseRuntimeRequest;
use Google\Service\AIPlatformNotebooks\ListRuntimesResponse;
use Google\Service\AIPlatformNotebooks\Operation;
use Google\Service\AIPlatformNotebooks\Policy;
use Google\Service\AIPlatformNotebooks\RefreshRuntimeTokenInternalRequest;
use Google\Service\AIPlatformNotebooks\RefreshRuntimeTokenInternalResponse;
use Google\Service\AIPlatformNotebooks\ReportRuntimeEventRequest;
use Google\Service\AIPlatformNotebooks\ResetRuntimeRequest;
use Google\Service\AIPlatformNotebooks\Runtime;
use Google\Service\AIPlatformNotebooks\SetIamPolicyRequest;
use Google\Service\AIPlatformNotebooks\StartRuntimeRequest;
use Google\Service\AIPlatformNotebooks\StopRuntimeRequest;
use Google\Service\AIPlatformNotebooks\SwitchRuntimeRequest;
use Google\Service\AIPlatformNotebooks\TestIamPermissionsRequest;
use Google\Service\AIPlatformNotebooks\TestIamPermissionsResponse;
use Google\Service\AIPlatformNotebooks\UpgradeRuntimeRequest;

/**
 * The "runtimes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $notebooksService = new Google\Service\AIPlatformNotebooks(...);
 *   $runtimes = $notebooksService->runtimes;
 *  </code>
 */
class ProjectsLocationsRuntimes extends \Google\Service\Resource
{
  /**
   * Creates a new Runtime in a given project and location. (runtimes.create)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param Runtime $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Idempotent request UUID.
   * @opt_param string runtimeId Required. User-defined unique ID of this Runtime.
   * @return Operation
   */
  public function create($parent, Runtime $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Runtime. (runtimes.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Idempotent request UUID.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Creates a Diagnostic File and runs Diagnostic Tool given a Runtime.
   * (runtimes.diagnose)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtimes_id}`
   * @param DiagnoseRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function diagnose($name, DiagnoseRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('diagnose', [$params], Operation::class);
  }
  /**
   * Gets details of a single Runtime. The location must be a regional endpoint
   * rather than zonal. (runtimes.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param array $optParams Optional parameters.
   * @return Runtime
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Runtime::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (runtimes.getIamPolicy)
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
   * Lists Runtimes in a given project and location.
   * (runtimes.listProjectsLocationsRuntimes)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum return size of the list call.
   * @opt_param string pageToken A previous returned page token that can be used
   * to continue listing from the last result.
   * @return ListRuntimesResponse
   */
  public function listProjectsLocationsRuntimes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRuntimesResponse::class);
  }
  /**
   * Update Notebook Runtime configuration. (runtimes.patch)
   *
   * @param string $name Output only. The resource name of the runtime. Format:
   * `projects/{project}/locations/{location}/runtimes/{runtimeId}`
   * @param Runtime $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Idempotent request UUID.
   * @opt_param string updateMask Required. Specifies the path, relative to
   * `Runtime`, of the field to update. For example, to change the software
   * configuration kernels, the `update_mask` parameter would be specified as
   * `software_config.kernels`, and the `PATCH` request body would specify the new
   * value, as follows: { "software_config":{ "kernels": [{ 'repository': 'gcr.io
   * /deeplearning-platform-release/pytorch-gpu', 'tag': 'latest' }], } }
   * Currently, only the following fields can be updated: -
   * software_config.kernels - software_config.post_startup_script -
   * software_config.custom_gpu_driver_path - software_config.idle_shutdown -
   * software_config.idle_shutdown_timeout - software_config.disable_terminal
   * @return Operation
   */
  public function patch($name, Runtime $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Gets an access token for the consumer service account that the customer
   * attached to the runtime. Only accessible from the tenant instance.
   * (runtimes.refreshRuntimeTokenInternal)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param RefreshRuntimeTokenInternalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RefreshRuntimeTokenInternalResponse
   */
  public function refreshRuntimeTokenInternal($name, RefreshRuntimeTokenInternalRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('refreshRuntimeTokenInternal', [$params], RefreshRuntimeTokenInternalResponse::class);
  }
  /**
   * Report and process a runtime event. (runtimes.reportEvent)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param ReportRuntimeEventRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reportEvent($name, ReportRuntimeEventRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reportEvent', [$params], Operation::class);
  }
  /**
   * Resets a Managed Notebook Runtime. (runtimes.reset)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param ResetRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reset($name, ResetRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (runtimes.setIamPolicy)
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
   * Starts a Managed Notebook Runtime. Perform "Start" on GPU instances; "Resume"
   * on CPU instances See: https://cloud.google.com/compute/docs/instances/stop-
   * start-instance https://cloud.google.com/compute/docs/instances/suspend-
   * resume-instance (runtimes.start)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param StartRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function start($name, StartRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
  /**
   * Stops a Managed Notebook Runtime. Perform "Stop" on GPU instances; "Suspend"
   * on CPU instances See: https://cloud.google.com/compute/docs/instances/stop-
   * start-instance https://cloud.google.com/compute/docs/instances/suspend-
   * resume-instance (runtimes.stop)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param StopRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stop($name, StopRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * Switch a Managed Notebook Runtime. (runtimes.switchProjectsLocationsRuntimes)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param SwitchRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function switchProjectsLocationsRuntimes($name, SwitchRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('switch', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (runtimes.testIamPermissions)
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
   * Upgrades a Managed Notebook Runtime to the latest version. (runtimes.upgrade)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param UpgradeRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function upgrade($name, UpgradeRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upgrade', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRuntimes::class, 'Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsRuntimes');
