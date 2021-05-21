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
 * The "folders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $folders = $cloudresourcemanagerService->folders;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_Folders extends Google_Service_Resource
{
  /**
   * Creates a folder in the resource hierarchy. Returns an `Operation` which can
   * be used to track the progress of the folder creation workflow. Upon success,
   * the `Operation.response` field will be populated with the created Folder. In
   * order to succeed, the addition of this new folder must not violate the folder
   * naming, height, or fanout constraints. + The folder's `display_name` must be
   * distinct from all other folders that share its parent. + The addition of the
   * folder must not cause the active folder hierarchy to exceed a height of 10.
   * Note, the full active + deleted folder hierarchy is allowed to reach a height
   * of 20; this provides additional headroom when moving folders that contain
   * deleted folders. + The addition of the folder must not cause the total number
   * of folders under its parent to exceed 300. If the operation fails due to a
   * folder constraint violation, some errors may be returned by the
   * `CreateFolder` request, with status code `FAILED_PRECONDITION` and an error
   * description. Other folder constraint violations will be communicated in the
   * `Operation`, with the specific `PreconditionFailure` returned in the details
   * list in the `Operation.error` field. The caller must have
   * `resourcemanager.folders.create` permission on the identified parent.
   * (folders.create)
   *
   * @param Google_Service_CloudResourceManager_Folder $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function create(Google_Service_CloudResourceManager_Folder $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Requests deletion of a folder. The folder is moved into the DELETE_REQUESTED
   * state immediately, and is deleted approximately 30 days later. This method
   * may only be called on an empty folder, where a folder is empty if it doesn't
   * contain any folders or projects in the ACTIVE state. If called on a folder in
   * DELETE_REQUESTED state the operation will result in a no-op success. The
   * caller must have `resourcemanager.folders.delete` permission on the
   * identified folder. (folders.delete)
   *
   * @param string $name Required. The resource name of the folder to be deleted.
   * Must be of the form `folders/{folder_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Retrieves a folder identified by the supplied resource name. Valid folder
   * resource names have the format `folders/{folder_id}` (for example,
   * `folders/1234`). The caller must have `resourcemanager.folders.get`
   * permission on the identified folder. (folders.get)
   *
   * @param string $name Required. The resource name of the folder to retrieve.
   * Must be of the form `folders/{folder_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Folder
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudResourceManager_Folder");
  }
  /**
   * Gets the access control policy for a folder. The returned policy may be empty
   * if no such policy or resource exists. The `resource` field should be the
   * folder's resource name, for example: "folders/1234". The caller must have
   * `resourcemanager.folders.getIamPolicy` permission on the identified folder.
   * (folders.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudResourceManager_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Policy
   */
  public function getIamPolicy($resource, Google_Service_CloudResourceManager_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudResourceManager_Policy");
  }
  /**
   * Lists the folders that are direct descendants of supplied parent resource.
   * `list()` provides a strongly consistent view of the folders underneath the
   * specified parent resource. `list()` returns folders sorted based upon the
   * (ascending) lexical ordering of their display_name. The caller must have
   * `resourcemanager.folders.list` permission on the identified parent.
   * (folders.listFolders)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of folders to return in
   * the response. If unspecified, server picks an appropriate default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListFolders` that indicates where this listing should
   * continue from.
   * @opt_param string parent Required. The resource name of the organization or
   * folder whose folders are being listed. Must be of the form
   * `folders/{folder_id}` or `organizations/{org_id}`. Access to this method is
   * controlled by checking the `resourcemanager.folders.list` permission on the
   * `parent`.
   * @opt_param bool showDeleted Optional. Controls whether folders in the
   * DELETE_REQUESTED state should be returned. Defaults to false.
   * @return Google_Service_CloudResourceManager_ListFoldersResponse
   */
  public function listFolders($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudResourceManager_ListFoldersResponse");
  }
  /**
   * Moves a folder under a new resource parent. Returns an `Operation` which can
   * be used to track the progress of the folder move workflow. Upon success, the
   * `Operation.response` field will be populated with the moved folder. Upon
   * failure, a `FolderOperationError` categorizing the failure cause will be
   * returned - if the failure occurs synchronously then the
   * `FolderOperationError` will be returned in the `Status.details` field. If it
   * occurs asynchronously, then the FolderOperation will be returned in the
   * `Operation.error` field. In addition, the `Operation.metadata` field will be
   * populated with a `FolderOperation` message as an aid to stateless clients.
   * Folder moves will be rejected if they violate either the naming, height, or
   * fanout constraints described in the CreateFolder documentation. The caller
   * must have `resourcemanager.folders.move` permission on the folder's current
   * and proposed new parent. (folders.move)
   *
   * @param string $name Required. The resource name of the Folder to move. Must
   * be of the form folders/{folder_id}
   * @param Google_Service_CloudResourceManager_MoveFolderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function move($name, Google_Service_CloudResourceManager_MoveFolderRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Updates a folder, changing its `display_name`. Changes to the folder
   * `display_name` will be rejected if they violate either the `display_name`
   * formatting rules or the naming constraints described in the CreateFolder
   * documentation. The folder's `display_name` must start and end with a letter
   * or digit, may contain letters, digits, spaces, hyphens and underscores and
   * can be between 3 and 30 characters. This is captured by the regular
   * expression: `\p{L}\p{N}{1,28}[\p{L}\p{N}]`. The caller must have
   * `resourcemanager.folders.update` permission on the identified folder. If the
   * update fails due to the unique name constraint then a `PreconditionFailure`
   * explaining this violation will be returned in the Status.details field.
   * (folders.patch)
   *
   * @param string $name Output only. The resource name of the folder. Its format
   * is `folders/{folder_id}`, for example: "folders/1234".
   * @param Google_Service_CloudResourceManager_Folder $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Fields to be updated. Only the
   * `display_name` can be updated.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function patch($name, Google_Service_CloudResourceManager_Folder $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Search for folders that match specific filter criteria. `search()` provides
   * an eventually consistent view of the folders a user has access to which meet
   * the specified filter criteria. This will only return folders on which the
   * caller has the permission `resourcemanager.folders.get`. (folders.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of folders to return in
   * the response. If unspecified, server picks an appropriate default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `SearchFolders` that indicates from where search should
   * continue.
   * @opt_param string query Optional. Search criteria used to select the folders
   * to return. If no search criteria is specified then all accessible folders
   * will be returned. Query expressions can be used to restrict results based
   * upon displayName, state and parent, where the operators `=` (`:`) `NOT`,
   * `AND` and `OR` can be used along with the suffix wildcard symbol `*`. The
   * `displayName` field in a query expression should use escaped quotes for
   * values that include whitespace to prevent unexpected behavior. | Field |
   * Description |
   * |-------------------------|----------------------------------------| |
   * displayName | Filters by displayName. | | parent | Filters by parent (for
   * example: folders/123). | | state, lifecycleState | Filters by state. | Some
   * example queries are: * Query `displayName=Test*` returns Folder resources
   * whose display name starts with "Test". * Query `state=ACTIVE` returns Folder
   * resources with `state` set to `ACTIVE`. * Query `parent=folders/123` returns
   * Folder resources that have `folders/123` as a parent resource. * Query
   * `parent=folders/123 AND state=ACTIVE` returns active Folder resources that
   * have `folders/123` as a parent resource. * Query `displayName=\\"Test
   * String\\"` returns Folder resources with display names that include both
   * "Test" and "String".
   * @return Google_Service_CloudResourceManager_SearchFoldersResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudResourceManager_SearchFoldersResponse");
  }
  /**
   * Sets the access control policy on a folder, replacing any existing policy.
   * The `resource` field should be the folder's resource name, for example:
   * "folders/1234". The caller must have `resourcemanager.folders.setIamPolicy`
   * permission on the identified folder. (folders.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudResourceManager_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudResourceManager_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudResourceManager_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified folder. The `resource`
   * field should be the folder's resource name, for example: "folders/1234".
   * There are no permissions required for making this API call.
   * (folders.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudResourceManager_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudResourceManager_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudResourceManager_TestIamPermissionsResponse");
  }
  /**
   * Cancels the deletion request for a folder. This method may be called on a
   * folder in any state. If the folder is in the ACTIVE state the result will be
   * a no-op success. In order to succeed, the folder's parent must be in the
   * ACTIVE state. In addition, reintroducing the folder into the tree must not
   * violate folder naming, height, and fanout constraints described in the
   * CreateFolder documentation. The caller must have
   * `resourcemanager.folders.undelete` permission on the identified folder.
   * (folders.undelete)
   *
   * @param string $name Required. The resource name of the folder to undelete.
   * Must be of the form `folders/{folder_id}`.
   * @param Google_Service_CloudResourceManager_UndeleteFolderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function undelete($name, Google_Service_CloudResourceManager_UndeleteFolderRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_CloudResourceManager_Operation");
  }
}
