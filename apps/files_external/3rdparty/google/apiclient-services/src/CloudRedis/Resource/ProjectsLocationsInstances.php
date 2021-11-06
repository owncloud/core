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

namespace Google\Service\CloudRedis\Resource;

use Google\Service\CloudRedis\ExportInstanceRequest;
use Google\Service\CloudRedis\FailoverInstanceRequest;
use Google\Service\CloudRedis\ImportInstanceRequest;
use Google\Service\CloudRedis\Instance;
use Google\Service\CloudRedis\InstanceAuthString;
use Google\Service\CloudRedis\ListInstancesResponse;
use Google\Service\CloudRedis\Operation;
use Google\Service\CloudRedis\RescheduleMaintenanceRequest;
use Google\Service\CloudRedis\UpgradeInstanceRequest;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $redisService = new Google\Service\CloudRedis(...);
 *   $instances = $redisService->instances;
 *  </code>
 */
class ProjectsLocationsInstances extends \Google\Service\Resource
{
  /**
   * Creates a Redis instance based on the specified tier and memory size. By
   * default, the instance is accessible from the project's [default
   * network](https://cloud.google.com/vpc/docs/vpc). The creation is executed
   * asynchronously and callers may check the returned operation to track its
   * progress. Once the operation is completed the Redis instance will be fully
   * functional. Completed longrunning.Operation will contain the new instance
   * object in the response field. The returned operation is automatically deleted
   * after a few hours, so there is no need to call DeleteOperation.
   * (instances.create)
   *
   * @param string $parent Required. The resource name of the instance location
   * using the form: `projects/{project_id}/locations/{location_id}` where
   * `location_id` refers to a GCP region.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string instanceId Required. The logical name of the Redis instance
   * in the customer project with the following restrictions: * Must contain only
   * lowercase letters, numbers, and hyphens. * Must start with a letter. * Must
   * be between 1-40 characters. * Must end with a number or a letter. * Must be
   * unique within the customer project / location
   * @return Operation
   */
  public function create($parent, Instance $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a specific Redis instance. Instance stops serving and data is
   * deleted. (instances.delete)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
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
   * Export Redis instance data into a Redis RDB format file in Cloud Storage.
   * Redis will continue serving during this operation. The returned operation is
   * automatically deleted after a few hours, so there is no need to call
   * DeleteOperation. (instances.export)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
   * @param ExportInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function export($name, ExportInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], Operation::class);
  }
  /**
   * Initiates a failover of the primary node to current replica node for a
   * specific STANDARD tier Cloud Memorystore for Redis instance.
   * (instances.failover)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
   * @param FailoverInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function failover($name, FailoverInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('failover', [$params], Operation::class);
  }
  /**
   * Gets the details of a specific Redis instance. (instances.get)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
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
   * Gets the AUTH string for a Redis instance. If AUTH is not enabled for the
   * instance the response will be empty. This information is not included in the
   * details returned to GetInstance. (instances.getAuthString)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
   * @param array $optParams Optional parameters.
   * @return InstanceAuthString
   */
  public function getAuthString($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getAuthString', [$params], InstanceAuthString::class);
  }
  /**
   * Import a Redis RDB snapshot file from Cloud Storage into a Redis instance.
   * Redis may stop serving during this operation. Instance state will be
   * IMPORTING for entire operation. When complete, the instance will contain only
   * data from the imported file. The returned operation is automatically deleted
   * after a few hours, so there is no need to call DeleteOperation.
   * (instances.import)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
   * @param ImportInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function import($name, ImportInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], Operation::class);
  }
  /**
   * Lists all Redis instances owned by a project in either the specified location
   * (region) or all locations. The location should have the following format: *
   * `projects/{project_id}/locations/{location_id}` If `location_id` is specified
   * as `-` (wildcard), then all regions available to the project are queried, and
   * the results are aggregated. (instances.listProjectsLocationsInstances)
   *
   * @param string $parent Required. The resource name of the instance location
   * using the form: `projects/{project_id}/locations/{location_id}` where
   * `location_id` refers to a GCP region.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. If not
   * specified, a default value of 1000 will be used by the service. Regardless of
   * the page_size value, the response may include a partial list and a caller
   * should only rely on response's `next_page_token` to determine if there are
   * more instances left to be queried.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous ListInstances request, if any.
   * @return ListInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInstancesResponse::class);
  }
  /**
   * Updates the metadata and configuration of a specific Redis instance.
   * Completed longrunning.Operation will contain the new instance object in the
   * response field. The returned operation is automatically deleted after a few
   * hours, so there is no need to call DeleteOperation. (instances.patch)
   *
   * @param string $name Required. Unique name of the resource in this scope
   * including project and location using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` Note:
   * Redis instances are managed and addressed at regional level so location_id
   * here refers to a GCP region; however, users may choose which specific zone
   * (or collection of zones for cross-zone instances) an instance should be
   * provisioned in. Refer to location_id and alternative_location_id fields for
   * more details.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. The elements of the repeated paths field
   * may only include these fields from Instance: * `displayName` * `labels` *
   * `memorySizeGb` * `redisConfig`
   * @return Operation
   */
  public function patch($name, Instance $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Reschedule maintenance for a given instance in a given project and location.
   * (instances.rescheduleMaintenance)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
   * @param RescheduleMaintenanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function rescheduleMaintenance($name, RescheduleMaintenanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rescheduleMaintenance', [$params], Operation::class);
  }
  /**
   * Upgrades Redis instance to the newer Redis version specified in the request.
   * (instances.upgrade)
   *
   * @param string $name Required. Redis instance resource name using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region.
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstances::class, 'Google_Service_CloudRedis_Resource_ProjectsLocationsInstances');
