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
 *   $keepService = new Google_Service_Keep(...);
 *   $permissions = $keepService->permissions;
 *  </code>
 */
class Google_Service_Keep_Resource_NotesPermissions extends Google_Service_Resource
{
  /**
   * Creates one or more permission on the note. Only permissions with the
   * `WRITER` role may be created. If adding any permission fails, then the entire
   * request fails and no changes are made. (permissions.batchCreate)
   *
   * @param string $parent The parent resource shared by all Permissions being
   * created. Format: `notes/{note}` If this is set, the parent field in the
   * CreatePermission messages must either be empty or match this field.
   * @param Google_Service_Keep_BatchCreatePermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Keep_BatchCreatePermissionsResponse
   */
  public function batchCreate($parent, Google_Service_Keep_BatchCreatePermissionsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_Keep_BatchCreatePermissionsResponse");
  }
  /**
   * Deletes one or more permissions on the note. The specified entities will
   * immediately lose access. A permission with the `OWNER` role can't be removed.
   * If removing a permission fails, then the entire request fails and no changes
   * are made. Returns a 400 bad request error if a specified permission does not
   * exist on the note. (permissions.batchDelete)
   *
   * @param string $parent The parent resource shared by all permissions being
   * deleted. Format: `notes/{note}` If this is set, the parent of all of the
   * permissions specified in the DeletePermissionRequest messages must match this
   * field.
   * @param Google_Service_Keep_BatchDeletePermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Keep_KeepEmpty
   */
  public function batchDelete($parent, Google_Service_Keep_BatchDeletePermissionsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_Keep_KeepEmpty");
  }
}
