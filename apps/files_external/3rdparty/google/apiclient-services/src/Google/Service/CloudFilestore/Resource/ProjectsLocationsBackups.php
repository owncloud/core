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
 * The "backups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fileService = new Google_Service_CloudFilestore(...);
 *   $backups = $fileService->backups;
 *  </code>
 */
class Google_Service_CloudFilestore_Resource_ProjectsLocationsBackups extends Google_Service_Resource
{
  /**
   * Creates a backup. (backups.create)
   *
   * @param string $parent Required. The backup's project and location, in the
   * format projects/{project_number}/locations/{location}. In Cloud Filestore,
   * backup locations map to GCP regions, for example **us-west1**.
   * @param Google_Service_CloudFilestore_Backup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string backupId Required. The ID to use for the backup. The ID
   * must be unique within the specified project and location. This value must
   * start with a lowercase letter followed by up to 62 lowercase letters,
   * numbers, or hyphens, and cannot end with a hyphen. Values that do not match
   * this pattern will trigger an INVALID_ARGUMENT error.
   * @return Google_Service_CloudFilestore_Operation
   */
  public function create($parent, Google_Service_CloudFilestore_Backup $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudFilestore_Operation");
  }
  /**
   * Deletes a backup. (backups.delete)
   *
   * @param string $name Required. The backup resource name, in the format
   * projects/{project_number}/locations/{location}/backups/{backup_id}
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
   * Gets the details of a specific backup. (backups.get)
   *
   * @param string $name Required. The backup resource name, in the format
   * projects/{project_number}/locations/{location}/backups/{backup_id}.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFilestore_Backup
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudFilestore_Backup");
  }
  /**
   * Lists all backups in a project for either a specified location or for all
   * locations. (backups.listProjectsLocationsBackups)
   *
   * @param string $parent Required. The project and location for which to
   * retrieve backup information, in the format
   * projects/{project_number}/locations/{location}. In Cloud Filestore, backup
   * locations map to GCP regions, for example **us-west1**. To retrieve backup
   * information for all locations, use "-" for the {location} value.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param string orderBy Sort results. Supported values are "name", "name
   * desc" or "" (unsorted).
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value to use if there are
   * additional results to retrieve for this list request.
   * @return Google_Service_CloudFilestore_ListBackupsResponse
   */
  public function listProjectsLocationsBackups($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudFilestore_ListBackupsResponse");
  }
  /**
   * Updates the settings of a specific backup. (backups.patch)
   *
   * @param string $name Output only. The resource name of the backup, in the
   * format projects/{project_number}/locations/{location_id}/backups/{backup_id}.
   * @param Google_Service_CloudFilestore_Backup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field.
   * @return Google_Service_CloudFilestore_Operation
   */
  public function patch($name, Google_Service_CloudFilestore_Backup $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudFilestore_Operation");
  }
}
