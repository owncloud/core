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
 *   $containerService = new Google_Service_Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsLocationsOperations extends Google_Service_Resource
{
  /**
   * Cancels the specified operation. (operations.cancel)
   *
   * @param string $name The name (project, location, operation id) of the
   * operation to cancel. Specified in the format 'projects/locations/operations'.
   * @param Google_Service_Container_CancelOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ContainerEmpty
   */
  public function cancel($name, Google_Service_Container_CancelOperationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Container_ContainerEmpty");
  }
  /**
   * Gets the specified operation. (operations.get)
   *
   * @param string $name The name (project, location, operation id) of the
   * operation to get. Specified in the format 'projects/locations/operations'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides. This
   * field has been deprecated and replaced by the name field.
   * @opt_param string operationId Deprecated. The server-assigned `name` of the
   * operation. This field has been deprecated and replaced by the name field.
   * @return Google_Service_Container_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Lists all operations in a project in a specific zone or all zones.
   * (operations.listProjectsLocationsOperations)
   *
   * @param string $parent The parent (project and location) where the operations
   * will be listed. Specified in the format 'projects/locations'. Location "-"
   * matches all zones and all regions.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the parent field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) to return operations for, or `-` for
   * all zones. This field has been deprecated and replaced by the parent field.
   * @return Google_Service_Container_ListOperationsResponse
   */
  public function listProjectsLocationsOperations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListOperationsResponse");
  }
}
