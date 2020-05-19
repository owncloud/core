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
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigtableadminService = new Google_Service_BigtableAdmin(...);
 *   $operations = $bigtableadminService->operations;
 *  </code>
 */
class Google_Service_BigtableAdmin_Resource_OperationsProjectsOperations extends Google_Service_Resource
{
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`.
   *
   * NOTE: the `name` binding allows API services to override the binding to use
   * different resource name schemes, such as `users/operations`. To override the
   * binding, API services can add a binding such as
   * `"/v1/{name=users}/operations"` to their service configuration. For backwards
   * compatibility, the default name includes the operations collection id,
   * however overriding users must ensure the name binding is the parent resource,
   * without the operations collection id.
   * (operations.listOperationsProjectsOperations)
   *
   * @param string $name The name of the operation's parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The standard list page token.
   * @opt_param int pageSize The standard list page size.
   * @opt_param string filter The standard list filter.
   * @return Google_Service_BigtableAdmin_ListOperationsResponse
   */
  public function listOperationsProjectsOperations($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigtableAdmin_ListOperationsResponse");
  }
}
