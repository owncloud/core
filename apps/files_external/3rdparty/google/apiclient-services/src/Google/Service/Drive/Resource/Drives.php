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
 * The "drives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $drives = $driveService->drives;
 *  </code>
 */
class Google_Service_Drive_Resource_Drives extends Google_Service_Resource
{
  /**
   * Creates a new shared drive. (drives.create)
   *
   * @param string $requestId An ID, such as a random UUID, which uniquely
   * identifies this user's request for idempotent creation of a shared drive. A
   * repeated request by the same user and with the same request ID will avoid
   * creating duplicates by attempting to create the same shared drive. If the
   * shared drive already exists a 409 error will be returned.
   * @param Google_Service_Drive_Drive $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Drive_Drive
   */
  public function create($requestId, Google_Service_Drive_Drive $postBody, $optParams = array())
  {
    $params = array('requestId' => $requestId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Drive_Drive");
  }
  /**
   * Permanently deletes a shared drive for which the user is an organizer. The
   * shared drive cannot contain any untrashed items. (drives.delete)
   *
   * @param string $driveId The ID of the shared drive.
   * @param array $optParams Optional parameters.
   */
  public function delete($driveId, $optParams = array())
  {
    $params = array('driveId' => $driveId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a shared drive's metadata by ID. (drives.get)
   *
   * @param string $driveId The ID of the shared drive.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * they are an administrator of the domain to which the shared drive belongs.
   * @return Google_Service_Drive_Drive
   */
  public function get($driveId, $optParams = array())
  {
    $params = array('driveId' => $driveId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Drive_Drive");
  }
  /**
   * Hides a shared drive from the default view. (drives.hide)
   *
   * @param string $driveId The ID of the shared drive.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Drive_Drive
   */
  public function hide($driveId, $optParams = array())
  {
    $params = array('driveId' => $driveId);
    $params = array_merge($params, $optParams);
    return $this->call('hide', array($params), "Google_Service_Drive_Drive");
  }
  /**
   * Lists the user's shared drives. (drives.listDrives)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of shared drives to return.
   * @opt_param string pageToken Page token for shared drives.
   * @opt_param string q Query string for searching shared drives.
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then all shared drives of the domain in which
   * the requester is an administrator are returned.
   * @return Google_Service_Drive_DriveList
   */
  public function listDrives($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Drive_DriveList");
  }
  /**
   * Restores a shared drive to the default view. (drives.unhide)
   *
   * @param string $driveId The ID of the shared drive.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Drive_Drive
   */
  public function unhide($driveId, $optParams = array())
  {
    $params = array('driveId' => $driveId);
    $params = array_merge($params, $optParams);
    return $this->call('unhide', array($params), "Google_Service_Drive_Drive");
  }
  /**
   * Updates the metadate for a shared drive. (drives.update)
   *
   * @param string $driveId The ID of the shared drive.
   * @param Google_Service_Drive_Drive $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * they are an administrator of the domain to which the shared drive belongs.
   * @return Google_Service_Drive_Drive
   */
  public function update($driveId, Google_Service_Drive_Drive $postBody, $optParams = array())
  {
    $params = array('driveId' => $driveId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Drive_Drive");
  }
}
