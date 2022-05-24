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

namespace Google\Service\CloudRun\Resource;

use Google\Service\CloudRun\GoogleLongrunningListOperationsResponse;
use Google\Service\CloudRun\GoogleLongrunningOperation;
use Google\Service\CloudRun\GoogleProtobufEmpty;

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $operations = $runService->operations;
 *  </code>
 */
class ProjectsLocationsOperations extends \Google\Service\Resource
{
  /**
   * Deletes a long-running operation. This method indicates that the client is no
   * longer interested in the operation result. It does not cancel the operation.
   * If the server doesn't support this method, it returns
   * `google.rpc.Code.UNIMPLEMENTED`. (operations.delete)
   *
   * @param string $name The name of the operation resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets the latest state of a long-running operation. Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`. NOTE: the
   * `name` binding allows API services to override the binding to use different
   * resource name schemes, such as `users/operations`. To override the binding,
   * API services can add a binding such as `"/v1/{name=users}/operations"` to
   * their service configuration. For backwards compatibility, the default name
   * includes the operations collection id, however overriding users must ensure
   * the name binding is the parent resource, without the operations collection
   * id. (operations.listProjectsLocationsOperations)
   *
   * @param string $name Required. To query for all of the operations for a
   * project.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter for matching the completed or in-
   * progress operations. The supported formats of *filter* are: To query for only
   * completed operations: done:true To query for only ongoing operations:
   * done:false Must be empty to query for all of the latest operations for the
   * given parent project.
   * @opt_param int pageSize The maximum number of records that should be
   * returned. Requested page size cannot exceed 100. If not set or set to less
   * than or equal to 0, the default page size is 100. .
   * @opt_param string pageToken Token identifying which result to start with,
   * which is returned by a previous list call.
   * @return GoogleLongrunningListOperationsResponse
   */
  public function listProjectsLocationsOperations($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleLongrunningListOperationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsOperations::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsOperations');
