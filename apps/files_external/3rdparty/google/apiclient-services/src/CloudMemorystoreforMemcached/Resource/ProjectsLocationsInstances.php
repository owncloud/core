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

namespace Google\Service\CloudMemorystoreforMemcached\Resource;

use Google\Service\CloudMemorystoreforMemcached\ApplyParametersRequest;
use Google\Service\CloudMemorystoreforMemcached\Instance;
use Google\Service\CloudMemorystoreforMemcached\ListInstancesResponse;
use Google\Service\CloudMemorystoreforMemcached\Operation;
use Google\Service\CloudMemorystoreforMemcached\UpdateParametersRequest;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $memcacheService = new Google\Service\CloudMemorystoreforMemcached(...);
 *   $instances = $memcacheService->instances;
 *  </code>
 */
class ProjectsLocationsInstances extends \Google\Service\Resource
{
  /**
   * `ApplyParameters` restarts the set of specified nodes in order to update them
   * to the current set of parameters for the Memcached Instance.
   * (instances.applyParameters)
   *
   * @param string $name Required. Resource name of the Memcached instance for
   * which parameter group updates should be applied.
   * @param ApplyParametersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function applyParameters($name, ApplyParametersRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('applyParameters', [$params], Operation::class);
  }
  /**
   * Creates a new Instance in a given location. (instances.create)
   *
   * @param string $parent Required. The resource name of the instance location
   * using the form: `projects/{project_id}/locations/{location_id}` where
   * `location_id` refers to a GCP region
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string instanceId Required. The logical name of the Memcached
   * instance in the user project with the following restrictions: * Must contain
   * only lowercase letters, numbers, and hyphens. * Must start with a letter. *
   * Must be between 1-40 characters. * Must end with a number or a letter. * Must
   * be unique within the user project / location. If any of the above are not
   * met, the API raises an invalid argument error.
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
   * @param string $name Required. Memcached instance resource name in the format:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region
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
   * @param string $name Required. Memcached instance resource name in the format:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region
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
   * Lists Instances in a given location.
   * (instances.listProjectsLocationsInstances)
   *
   * @param string $parent Required. The resource name of the instance location
   * using the form: `projects/{project_id}/locations/{location_id}` where
   * `location_id` refers to a GCP region
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter. For example, exclude all Memcached
   * instances with name as my-instance by specifying `"name != my-instance"`.
   * @opt_param string orderBy Sort results. Supported values are "name", "name
   * desc" or "" (unsorted).
   * @opt_param int pageSize The maximum number of items to return. If not
   * specified, a default value of 1000 will be used by the service. Regardless of
   * the `page_size` value, the response may include a partial list and a caller
   * should only rely on response's `next_page_token` to determine if there are
   * more instances left to be queried.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @return ListInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInstancesResponse::class);
  }
  /**
   * Updates an existing Instance in a given project and location.
   * (instances.patch)
   *
   * @param string $name Required. Unique name of the resource in this scope
   * including project and location using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` Note:
   * Memcached instances are managed and addressed at the regional level so
   * `location_id` here refers to a Google Cloud region; however, users may choose
   * which zones Memcached nodes should be provisioned in within an instance.
   * Refer to zones field for more details.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. *
   * `displayName`
   * @return Operation
   */
  public function patch($name, Instance $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Updates the defined Memcached parameters for an existing instance. This
   * method only stages the parameters, it must be followed by `ApplyParameters`
   * to apply the parameters to nodes of the Memcached instance.
   * (instances.updateParameters)
   *
   * @param string $name Required. Resource name of the Memcached instance for
   * which the parameters should be updated.
   * @param UpdateParametersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function updateParameters($name, UpdateParametersRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateParameters', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstances::class, 'Google_Service_CloudMemorystoreforMemcached_Resource_ProjectsLocationsInstances');
