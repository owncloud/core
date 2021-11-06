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
class ProjectsLocationsOperations extends \Google\Service\Resource
{
  /**
   * Cancels the specified operation. (operations.cancel)
   *
   * @param string $name The name (project, location, operation id) of the
   * operation to cancel. Specified in the format `projects/locations/operations`.
   * @param CancelOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ContainerEmpty
   */
  public function cancel($name, CancelOperationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], ContainerEmpty::class);
  }
  /**
   * Gets the specified operation. (operations.get)
   *
   * @param string $name The name (project, location, operation id) of the
   * operation to get. Specified in the format `projects/locations/operations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string operationId Deprecated. The server-assigned `name` of the
   * operation. This field has been deprecated and replaced by the name field.
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @return Operation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Operation::class);
  }
  /**
   * Lists all operations in a project in a specific zone or all zones.
   * (operations.listProjectsLocationsOperations)
   *
   * @param string $parent The parent (project and location) where the operations
   * will be listed. Specified in the format `projects/locations`. Location "-"
   * matches all zones and all regions.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the parent field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) to return
   * operations for, or `-` for all zones. This field has been deprecated and
   * replaced by the parent field.
   * @return ListOperationsResponse
   */
  public function listProjectsLocationsOperations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOperationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsOperations::class, 'Google_Service_Container_Resource_ProjectsLocationsOperations');
