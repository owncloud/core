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
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $permissions = $driveService->permissions;
 *  </code>
 */
class Google_Service_Drive_Resource_Permissions extends Google_Service_Resource
{
  /**
   * Creates a permission for a file or shared drive. (permissions.create)
   *
   * @param string $fileId The ID of the file or shared drive.
   * @param Google_Service_Drive_Permission $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string emailMessage A plain text custom message to include in the
   * notification email.
   * @opt_param bool enforceSingleParent Set to true to opt in to API behavior
   * that aims for all items to have exactly one parent. This parameter only takes
   * effect if the item is not in a shared drive. See moveToNewOwnersRoot for
   * details.
   * @opt_param bool moveToNewOwnersRoot This parameter only takes effect if the
   * item is not in a shared drive and the request is attempting to transfer the
   * ownership of the item. When set to true, the item is moved to the new owner's
   * My Drive root folder and all prior parents removed. If set to false, when
   * enforceSingleParent=true, parents are not changed. If set to false, when
   * enforceSingleParent=false, existing parents are not changed; however, the
   * file will be added to the new owner's My Drive root folder, unless it is
   * already in the new owner's My Drive.
   * @opt_param bool sendNotificationEmail Whether to send a notification email
   * when sharing to users or groups. This defaults to true for users and groups,
   * and is not allowed for other requests. It must not be disabled for ownership
   * transfers.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param bool transferOwnership Whether to transfer ownership to the
   * specified user and downgrade the current owner to a writer. This parameter is
   * required as an acknowledgement of the side effect.
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * the file ID parameter refers to a shared drive and the requester is an
   * administrator of the domain to which the shared drive belongs.
   * @return Google_Service_Drive_Permission
   */
  public function create($fileId, Google_Service_Drive_Permission $postBody, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Drive_Permission");
  }
  /**
   * Deletes a permission. (permissions.delete)
   *
   * @param string $fileId The ID of the file or shared drive.
   * @param string $permissionId The ID of the permission.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * the file ID parameter refers to a shared drive and the requester is an
   * administrator of the domain to which the shared drive belongs.
   */
  public function delete($fileId, $permissionId, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'permissionId' => $permissionId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a permission by ID. (permissions.get)
   *
   * @param string $fileId The ID of the file.
   * @param string $permissionId The ID of the permission.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * the file ID parameter refers to a shared drive and the requester is an
   * administrator of the domain to which the shared drive belongs.
   * @return Google_Service_Drive_Permission
   */
  public function get($fileId, $permissionId, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'permissionId' => $permissionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Drive_Permission");
  }
  /**
   * Lists a file's or shared drive's permissions. (permissions.listPermissions)
   *
   * @param string $fileId The ID of the file or shared drive.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of permissions to return per page.
   * When not set for files in a shared drive, at most 100 results will be
   * returned. When not set for files that are not in a shared drive, the entire
   * list will be returned.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of 'nextPageToken' from the
   * previous response.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * the file ID parameter refers to a shared drive and the requester is an
   * administrator of the domain to which the shared drive belongs.
   * @return Google_Service_Drive_PermissionList
   */
  public function listPermissions($fileId, $optParams = array())
  {
    $params = array('fileId' => $fileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Drive_PermissionList");
  }
  /**
   * Updates a permission with patch semantics. (permissions.update)
   *
   * @param string $fileId The ID of the file or shared drive.
   * @param string $permissionId The ID of the permission.
   * @param Google_Service_Drive_Permission $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool removeExpiration Whether to remove the expiration date.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param bool transferOwnership Whether to transfer ownership to the
   * specified user and downgrade the current owner to a writer. This parameter is
   * required as an acknowledgement of the side effect.
   * @opt_param bool useDomainAdminAccess Issue the request as a domain
   * administrator; if set to true, then the requester will be granted access if
   * the file ID parameter refers to a shared drive and the requester is an
   * administrator of the domain to which the shared drive belongs.
   * @return Google_Service_Drive_Permission
   */
  public function update($fileId, $permissionId, Google_Service_Drive_Permission $postBody, $optParams = array())
  {
    $params = array('fileId' => $fileId, 'permissionId' => $permissionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Drive_Permission");
  }
}
