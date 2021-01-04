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
 *   $fileService = new Google_Service_CloudFilestore(...);
 *   $instances = $fileService->instances;
 *  </code>
 */
class Google_Service_CloudFilestore_Resource_ProjectsLocationsInstances extends Google_Service_Resource
{
  /**
   * Creates an instance. When creating from a backup, the capacity of the new
   * instance needs to be equal to or larger than the capacity of the backup (and
   * also equal to or larger than the minimum capacity of the tier).
   * (instances.create)
   *
   * @param string $parent Required. The instance's project and location, in the
   * format projects/{project_id}/locations/{location}. In Cloud Filestore,
   * locations map to GCP zones, for example **us-west1-b**.
   * @param Google_Service_CloudFilestore_Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string instanceId Required. The name of the instance to create.
   * The name must be unique for the specified project and location.
   * @return Google_Service_CloudFilestore_Operation
   */
  public function create($parent, Google_Service_CloudFilestore_Instance $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudFilestore_Operation");
  }
  /**
   * Deletes an instance. (instances.delete)
   *
   * @param string $name Required. The instance resource name, in the format
   * projects/{project_id}/locations/{location}/instances/{instance_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFilestore_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudFilestore_Operation");
  }
  /**
   * Gets the details of a specific instance. (instances.get)
   *
   * @param string $name Required. The instance resource name, in the format
   * projects/{project_id}/locations/{location}/instances/{instance_id}.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFilestore_Instance
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudFilestore_Instance");
  }
  /**
   * Lists all instances in a project for either a specified location or for all
   * locations. (instances.listProjectsLocationsInstances)
   *
   * @param string $parent Required. The project and location for which to
   * retrieve instance information, in the format
   * projects/{project_id}/locations/{location}. In Cloud Filestore, locations map
   * to GCP zones, for example **us-west1-b**. To retrieve instance information
   * for all locations, use "-" for the {location} value.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param string orderBy Sort results. Supported values are "name", "name
   * desc" or "" (unsorted).
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value to use if there are
   * additional results to retrieve for this list request.
   * @return Google_Service_CloudFilestore_ListInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudFilestore_ListInstancesResponse");
  }
  /**
   * Updates the settings of a specific instance. (instances.patch)
   *
   * @param string $name Output only. The resource name of the instance, in the
   * format projects/{project}/locations/{location}/instances/{instance}.
   * @param Google_Service_CloudFilestore_Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask of fields to update. At least one path must
   * be supplied in this field. The elements of the repeated paths field may only
   * include these fields: * "description" * "file_shares" * "labels"
   * @return Google_Service_CloudFilestore_Operation
   */
  public function patch($name, Google_Service_CloudFilestore_Instance $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudFilestore_Operation");
  }
  /**
   * Restores an existing instance's file share from a backup. The instance's file
   * share capacity will be set to the backup's capacity or the minimum capacity
   * of the tier, whichever is larger. (instances.restore)
   *
   * @param string $name Required. The resource name of the instance, in the
   * format
   * projects/{project_number}/locations/{location_id}/instances/{instance_id}.
   * @param Google_Service_CloudFilestore_RestoreInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFilestore_Operation
   */
  public function restore($name, Google_Service_CloudFilestore_RestoreInstanceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restore', array($params), "Google_Service_CloudFilestore_Operation");
  }
}
