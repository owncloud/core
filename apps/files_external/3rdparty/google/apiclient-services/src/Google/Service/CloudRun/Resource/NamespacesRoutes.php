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
 * The "routes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google_Service_CloudRun(...);
 *   $routes = $runService->routes;
 *  </code>
 */
class Google_Service_CloudRun_Resource_NamespacesRoutes extends Google_Service_Resource
{
  /**
   * Get information about a route. (routes.get)
   *
   * @param string $name The name of the route to retrieve. For Cloud Run (fully
   * managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_Route
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudRun_Route");
  }
  /**
   * List routes. (routes.listNamespacesRoutes)
   *
   * @param string $parent The namespace from which the routes should be listed.
   * For Cloud Run (fully managed), replace {namespace_id} with the project ID or
   * number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string continue Optional encoded string to continue paging.
   * @opt_param string fieldSelector Allows to filter resources based on a
   * specific value for a field name. Send this in a query string format. i.e.
   * 'metadata.name%3Dlorem'. Not currently used by Cloud Run.
   * @opt_param bool includeUninitialized Not currently used by Cloud Run.
   * @opt_param string labelSelector Allows to filter resources based on a label.
   * Supported operations are =, !=, exists, in, and notIn.
   * @opt_param int limit The maximum number of records that should be returned.
   * @opt_param string resourceVersion The baseline resource version from which
   * the list or watch operation should start. Not currently used by Cloud Run.
   * @opt_param bool watch Flag that indicates that the client expects to watch
   * this resource as well. Not currently used by Cloud Run.
   * @return Google_Service_CloudRun_ListRoutesResponse
   */
  public function listNamespacesRoutes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudRun_ListRoutesResponse");
  }
}
