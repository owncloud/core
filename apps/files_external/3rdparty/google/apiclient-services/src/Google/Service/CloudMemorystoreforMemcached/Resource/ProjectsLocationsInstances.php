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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $memcacheService = new Google_Service_CloudMemorystoreforMemcached(...);
 *   $instances = $memcacheService->instances;
 *  </code>
 */
class Google_Service_CloudMemorystoreforMemcached_Resource_ProjectsLocationsInstances extends Google_Service_Resource
{
  /**
   * ApplyParameters will update current set of Parameters to the set of specified
   * nodes of the Memcached Instance. (instances.applyParameters)
   *
   * @param string $name Required. Resource name of the Memcached instance for
   * which parameter group updates should be applied.
   * @param Google_Service_CloudMemorystoreforMemcached_ApplyParametersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMemorystoreforMemcached_Operation
   */
  public function applyParameters($name, Google_Service_CloudMemorystoreforMemcached_ApplyParametersRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('applyParameters', array($params), "Google_Service_CloudMemorystoreforMemcached_Operation");
  }
  /**
   * Creates a new Instance in a given project and location. (instances.create)
   *
   * @param string $parent Required. The resource name of the instance location
   * using the form: `projects/{project_id}/locations/{location_id}` where
   * `location_id` refers to a GCP region
   * @param Google_Service_CloudMemorystoreforMemcached_Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string instanceId Required. The logical name of the Memcached
   * instance in the user project with the following restrictions: * Must contain
   * only lowercase letters, numbers, and hyphens. * Must start with a letter. *
   * Must be between 1-40 characters. * Must end with a number or a letter. * Must
   * be unique within the user project / location
   * @return Google_Service_CloudMemorystoreforMemcached_Operation
   */
  public function create($parent, Google_Service_CloudMemorystoreforMemcached_Instance $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudMemorystoreforMemcached_Operation");
  }
  /**
   * Deletes a single Instance. (instances.delete)
   *
   * @param string $name Required. Memcached instance resource name in the format:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMemorystoreforMemcached_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudMemorystoreforMemcached_Operation");
  }
  /**
   * Gets details of a single Instance. (instances.get)
   *
   * @param string $name Required. Memcached instance resource name in the format:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` where
   * `location_id` refers to a GCP region
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMemorystoreforMemcached_Instance
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudMemorystoreforMemcached_Instance");
  }
  /**
   * Lists Instances in a given project and location.
   * (instances.listProjectsLocationsInstances)
   *
   * @param string $parent Required. The resource name of the instance location
   * using the form: `projects/{project_id}/locations/{location_id}` where
   * `location_id` refers to a GCP region
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return. If not
   * specified, a default value of 1000 will be used by the service. Regardless of
   * the page_size value, the response may include a partial list and a caller
   * should only rely on response's next_page_token to determine if there are more
   * instances left to be queried.
   * @opt_param string filter List filter. For example, exclude all Memcached
   * instances with name as my-instance by specifying "name != my-instance".
   * @opt_param string orderBy Sort results. Supported values are "name", "name
   * desc" or "" (unsorted).
   * @return Google_Service_CloudMemorystoreforMemcached_ListInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudMemorystoreforMemcached_ListInstancesResponse");
  }
  /**
   * Updates an existing Instance in a given project and location.
   * (instances.patch)
   *
   * @param string $name Required. Unique name of the resource in this scope
   * including project and location using the form:
   * `projects/{project_id}/locations/{location_id}/instances/{instance_id}` Note:
   * Memcached instances are managed and addressed at regional level so
   * location_id here refers to a GCP region; however, users may choose which
   * zones Memcached nodes within an instances should be provisioned in. Refer to
   * [zones] field for more details.
   * @param Google_Service_CloudMemorystoreforMemcached_Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. *
   * `displayName`
   * @return Google_Service_CloudMemorystoreforMemcached_Operation
   */
  public function patch($name, Google_Service_CloudMemorystoreforMemcached_Instance $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudMemorystoreforMemcached_Operation");
  }
  /**
   * Updates the defined Memcached Parameters for an existing Instance. This
   * method only stages the parameters, it must be followed by ApplyParameters to
   * apply the parameters to nodes of the Memcached Instance.
   * (instances.updateParameters)
   *
   * @param string $name Required. Resource name of the Memcached instance for
   * which the parameters should be updated.
   * @param Google_Service_CloudMemorystoreforMemcached_UpdateParametersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMemorystoreforMemcached_Operation
   */
  public function updateParameters($name, Google_Service_CloudMemorystoreforMemcached_UpdateParametersRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateParameters', array($params), "Google_Service_CloudMemorystoreforMemcached_Operation");
  }
}
