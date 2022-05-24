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

namespace Google\Service\Keep\Resource;

use Google\Service\Keep\BatchCreatePermissionsRequest;
use Google\Service\Keep\BatchCreatePermissionsResponse;
use Google\Service\Keep\BatchDeletePermissionsRequest;
use Google\Service\Keep\KeepEmpty;

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $keepService = new Google\Service\Keep(...);
 *   $permissions = $keepService->permissions;
 *  </code>
 */
class NotesPermissions extends \Google\Service\Resource
{
  /**
   * Creates one or more permissions on the note. Only permissions with the
   * `WRITER` role may be created. If adding any permission fails, then the entire
   * request fails and no changes are made. (permissions.batchCreate)
   *
   * @param string $parent The parent resource shared by all Permissions being
   * created. Format: `notes/{note}` If this is set, the parent field in the
   * CreatePermission messages must either be empty or match this field.
   * @param BatchCreatePermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreatePermissionsResponse
   */
  public function batchCreate($parent, BatchCreatePermissionsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], BatchCreatePermissionsResponse::class);
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
   * @param BatchDeletePermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return KeepEmpty
   */
  public function batchDelete($parent, BatchDeletePermissionsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], KeepEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NotesPermissions::class, 'Google_Service_Keep_Resource_NotesPermissions');
