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

namespace Google\Service\Container\Resource;

use Google\Service\Container\CancelOperationRequest;
use Google\Service\Container\ContainerEmpty;
use Google\Service\Container\ListOperationsResponse;
use Google\Service\Container\Operation;

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google\Service\Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class ProjectsZonesOperations extends \Google\Service\Resource
{
  /**
   * Cancels the specified operation. (operations.cancel)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * operation resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $operationId Deprecated. The server-assigned `name` of the
   * operation. This field has been deprecated and replaced by the name field.
   * @param CancelOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ContainerEmpty
   */
  public function cancel($projectId, $zone, $operationId, CancelOperationRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'operationId' => $operationId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], ContainerEmpty::class);
  }
  /**
   * Gets the specified operation. (operations.get)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $operationId Deprecated. The server-assigned `name` of the
   * operation. This field has been deprecated and replaced by the name field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name (project, location, operation id) of the
   * operation to get. Specified in the format `projects/locations/operations`.
   * @return Operation
   */
  public function get($projectId, $zone, $operationId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'operationId' => $operationId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Operation::class);
  }
  /**
   * Lists all operations in a project in a specific zone or all zones.
   * (operations.listProjectsZonesOperations)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the parent field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) to return
   * operations for, or `-` for all zones. This field has been deprecated and
   * replaced by the parent field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent The parent (project and location) where the
   * operations will be listed. Specified in the format `projects/locations`.
   * Location "-" matches all zones and all regions.
   * @return ListOperationsResponse
   */
  public function listProjectsZonesOperations($projectId, $zone, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOperationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsZonesOperations::class, 'Google_Service_Container_Resource_ProjectsZonesOperations');
