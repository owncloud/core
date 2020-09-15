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
   * Creates a Folder in the resource hierarchy. Returns an Operation which can be
   * used to track the progress of the folder creation workflow. Upon success the
   * Operation.response field will be populated with the created Folder. In order
   * to succeed, the addition of this new Folder must not violate the Folder
   * naming, height or fanout constraints. + The Folder's display_name must be
   * distinct from all other Folder's that share its parent. + The addition of the
   * Folder must not cause the active Folder hierarchy to exceed a height of 4.
   * Note, the full active + deleted Folder hierarchy is allowed to reach a height
   * of 8; this provides additional headroom when moving folders that contain
   * deleted folders. + The addition of the Folder must not cause the total number
   * of Folders under its parent to exceed 100. If the operation fails due to a
   * folder constraint violation, some errors may be returned by the CreateFolder
   * request, with status code FAILED_PRECONDITION and an error description. Other
   * folder constraint violations will be communicated in the Operation, with the
   * specific PreconditionFailure returned via the details list in the
   * Operation.error field. The caller must have `resourcemanager.folders.create`
   * permission on the identified parent. (folders.create)
   *
   * @param Google_Service_CloudResourceManager_Folder $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent Required. The resource name of the new Folder's
   * parent. Must be of the form `folders/{folder_id}` or
   * `organizations/{org_id}`.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function create(Google_Service_CloudResourceManager_Folder $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Requests deletion of a Folder. The Folder is moved into the DELETE_REQUESTED
   * state immediately, and is deleted approximately 30 days later. This method
   * may only be called on an empty Folder in the ACTIVE state, where a Folder is
   * empty if it doesn't contain any Folders or Projects in the ACTIVE state. The
   * caller must have `resourcemanager.folders.delete` permission on the
   * identified folder. (folders.delete)
   *
   * @param string $name Required. the resource name of the Folder to be deleted.
   * Must be of the form `folders/{folder_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Folder
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudResourceManager_Folder");
  }
  /**
   * Retrieves a Folder identified by the supplied resource name. Valid Folder
   * resource names have the format `folders/{folder_id}` (for example,
   * `folders/1234`). The caller must have `resourcemanager.folders.get`
   * permission on the identified folder. (folders.get)
   *
   * @param string $name Required. The resource name of the Folder to retrieve.
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
   * Gets the access control policy for a Folder. The returned policy may be empty
   * if no such policy or resource exists. The `resource` field should be the
   * Folder's resource name, e.g. "folders/1234". The caller must have
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
   * Lists the Folders that are direct descendants of supplied parent resource.
   * List provides a strongly consistent view of the Folders underneath the
   * specified parent resource. List returns Folders sorted based upon the
   * (ascending) lexical ordering of their display_name. The caller must have
   * `resourcemanager.folders.list` permission on the identified parent.
   * (folders.listFolders)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent Required. The resource name of the Organization or
   * Folder whose Folders are being listed. Must be of the form
   * `folders/{folder_id}` or `organizations/{org_id}`. Access to this method is
   * controlled by checking the `resourcemanager.folders.list` permission on the
   * `parent`.
   * @opt_param bool showDeleted Optional. Controls whether Folders in the
   * DELETE_REQUESTED state should be returned. Defaults to false.
   * @opt_param int pageSize Optional. The maximum number of Folders to return in
   * the response.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListFolders` that indicates where this listing should
   * continue from.
   * @return Google_Service_CloudResourceManager_ListFoldersResponse
   */
  public function listFolders($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudResourceManager_ListFoldersResponse");
  }
  /**
   * Moves a Folder under a new resource parent. Returns an Operation which can be
   * used to track the progress of the folder move workflow. Upon success the
   * Operation.response field will be populated with the moved Folder. Upon
   * failure, a FolderOperationError categorizing the failure cause will be
   * returned - if the failure occurs synchronously then the FolderOperationError
   * will be returned via the Status.details field and if it occurs asynchronously
   * then the FolderOperation will be returned via the Operation.error field. In
   * addition, the Operation.metadata field will be populated with a
   * FolderOperation message as an aid to stateless clients. Folder moves will be
   * rejected if they violate either the naming, height or fanout constraints
   * described in the CreateFolder documentation. The caller must have
   * `resourcemanager.folders.move` permission on the folder's current and
   * proposed new parent. (folders.move)
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
   * Updates a Folder, changing its display_name. Changes to the folder
   * display_name will be rejected if they violate either the display_name
   * formatting rules or naming constraints described in the CreateFolder
   * documentation. The Folder's display name must start and end with a letter or
   * digit, may contain letters, digits, spaces, hyphens and underscores and can
   * be no longer than 30 characters. This is captured by the regular expression:
   * [\p{L}\p{N}]([\p{L}\p{N}_- ]{0,28}[\p{L}\p{N}])?. The caller must have
   * `resourcemanager.folders.update` permission on the identified folder. If the
   * update fails due to the unique name constraint then a PreconditionFailure
   * explaining this violation will be returned in the Status.details field.
   * (folders.patch)
   *
   * @param string $name Output only. The resource name of the Folder. Its format
   * is `folders/{folder_id}`, for example: "folders/1234".
   * @param Google_Service_CloudResourceManager_Folder $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Fields to be updated. Only the
   * `display_name` can be updated.
   * @return Google_Service_CloudResourceManager_Folder
   */
  public function patch($name, Google_Service_CloudResourceManager_Folder $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudResourceManager_Folder");
  }
  /**
   * Search for folders that match specific filter criteria. Search provides an
   * eventually consistent view of the folders a user has access to which meet the
   * specified filter criteria. This will only return folders on which the caller
   * has the permission `resourcemanager.folders.get`. (folders.search)
   *
   * @param Google_Service_CloudResourceManager_SearchFoldersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_SearchFoldersResponse
   */
  public function search(Google_Service_CloudResourceManager_SearchFoldersRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudResourceManager_SearchFoldersResponse");
  }
  /**
   * Sets the access control policy on a Folder, replacing any existing policy.
   * The `resource` field should be the Folder's resource name, e.g.
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
   * Returns permissions that a caller has on the specified Folder. The `resource`
   * field should be the Folder's resource name, e.g. "folders/1234". There are no
   * permissions required for making this API call. (folders.testIamPermissions)
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
   * Cancels the deletion request for a Folder. This method may only be called on
   * a Folder in the DELETE_REQUESTED state. In order to succeed, the Folder's
   * parent must be in the ACTIVE state. In addition, reintroducing the folder
   * into the tree must not violate folder naming, height and fanout constraints
   * described in the CreateFolder documentation. The caller must have
   * `resourcemanager.folders.undelete` permission on the identified folder.
   * (folders.undelete)
   *
   * @param string $name Required. The resource name of the Folder to undelete.
   * Must be of the form `folders/{folder_id}`.
   * @param Google_Service_CloudResourceManager_UndeleteFolderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Folder
   */
  public function undelete($name, Google_Service_CloudResourceManager_UndeleteFolderRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_CloudResourceManager_Folder");
  }
}
