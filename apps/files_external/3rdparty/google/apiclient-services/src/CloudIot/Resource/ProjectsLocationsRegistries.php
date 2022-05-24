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

namespace Google\Service\CloudIot\Resource;

use Google\Service\CloudIot\BindDeviceToGatewayRequest;
use Google\Service\CloudIot\BindDeviceToGatewayResponse;
use Google\Service\CloudIot\CloudiotEmpty;
use Google\Service\CloudIot\DeviceRegistry;
use Google\Service\CloudIot\GetIamPolicyRequest;
use Google\Service\CloudIot\ListDeviceRegistriesResponse;
use Google\Service\CloudIot\Policy;
use Google\Service\CloudIot\SetIamPolicyRequest;
use Google\Service\CloudIot\TestIamPermissionsRequest;
use Google\Service\CloudIot\TestIamPermissionsResponse;
use Google\Service\CloudIot\UnbindDeviceFromGatewayRequest;
use Google\Service\CloudIot\UnbindDeviceFromGatewayResponse;

/**
 * The "registries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudiotService = new Google\Service\CloudIot(...);
 *   $registries = $cloudiotService->registries;
 *  </code>
 */
class ProjectsLocationsRegistries extends \Google\Service\Resource
{
  /**
   * Associates the device with the gateway. (registries.bindDeviceToGateway)
   *
   * @param string $parent Required. The name of the registry. For example,
   * `projects/example-project/locations/us-central1/registries/my-registry`.
   * @param BindDeviceToGatewayRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BindDeviceToGatewayResponse
   */
  public function bindDeviceToGateway($parent, BindDeviceToGatewayRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bindDeviceToGateway', [$params], BindDeviceToGatewayResponse::class);
  }
  /**
   * Creates a device registry that contains devices. (registries.create)
   *
   * @param string $parent Required. The project and cloud region where this
   * device registry must be created. For example, `projects/example-
   * project/locations/us-central1`.
   * @param DeviceRegistry $postBody
   * @param array $optParams Optional parameters.
   * @return DeviceRegistry
   */
  public function create($parent, DeviceRegistry $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], DeviceRegistry::class);
  }
  /**
   * Deletes a device registry configuration. (registries.delete)
   *
   * @param string $name Required. The name of the device registry. For example,
   * `projects/example-project/locations/us-central1/registries/my-registry`.
   * @param array $optParams Optional parameters.
   * @return CloudiotEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], CloudiotEmpty::class);
  }
  /**
   * Gets a device registry configuration. (registries.get)
   *
   * @param string $name Required. The name of the device registry. For example,
   * `projects/example-project/locations/us-central1/registries/my-registry`.
   * @param array $optParams Optional parameters.
   * @return DeviceRegistry
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DeviceRegistry::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (registries.getIamPolicy)
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
   * Lists device registries. (registries.listProjectsLocationsRegistries)
   *
   * @param string $parent Required. The project and cloud region path. For
   * example, `projects/example-project/locations/us-central1`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of registries to return in the
   * response. If this value is zero, the service will select a default size. A
   * call may return fewer objects than requested. A non-empty `next_page_token`
   * in the response indicates that more data is available.
   * @opt_param string pageToken The value returned by the last
   * `ListDeviceRegistriesResponse`; indicates that this is a continuation of a
   * prior `ListDeviceRegistries` call and the system should return the next page
   * of data.
   * @return ListDeviceRegistriesResponse
   */
  public function listProjectsLocationsRegistries($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDeviceRegistriesResponse::class);
  }
  /**
   * Updates a device registry configuration. (registries.patch)
   *
   * @param string $name The resource path name. For example, `projects/example-
   * project/locations/us-central1/registries/my-registry`.
   * @param DeviceRegistry $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Only updates the `device_registry`
   * fields indicated by this mask. The field mask must not be empty, and it must
   * not contain fields that are immutable or only set by the server. Mutable top-
   * level fields: `event_notification_config`, `http_config`, `mqtt_config`, and
   * `state_notification_config`.
   * @return DeviceRegistry
   */
  public function patch($name, DeviceRegistry $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], DeviceRegistry::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (registries.setIamPolicy)
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
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error. (registries.testIamPermissions)
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
   * Deletes the association between the device and the gateway.
   * (registries.unbindDeviceFromGateway)
   *
   * @param string $parent Required. The name of the registry. For example,
   * `projects/example-project/locations/us-central1/registries/my-registry`.
   * @param UnbindDeviceFromGatewayRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UnbindDeviceFromGatewayResponse
   */
  public function unbindDeviceFromGateway($parent, UnbindDeviceFromGatewayRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unbindDeviceFromGateway', [$params], UnbindDeviceFromGatewayResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRegistries::class, 'Google_Service_CloudIot_Resource_ProjectsLocationsRegistries');
