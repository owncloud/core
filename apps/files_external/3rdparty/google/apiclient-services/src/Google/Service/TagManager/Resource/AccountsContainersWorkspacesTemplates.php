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
 * The "templates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $templates = $tagmanagerService->templates;
 *  </code>
 */
class Google_Service_TagManager_Resource_AccountsContainersWorkspacesTemplates extends Google_Service_Resource
{
  /**
   * Creates a GTM Custom Template. (templates.create)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Google_Service_TagManager_CustomTemplate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_CustomTemplate
   */
  public function create($parent, Google_Service_TagManager_CustomTemplate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_TagManager_CustomTemplate");
  }
  /**
   * Deletes a GTM Template. (templates.delete)
   *
   * @param string $path GTM Custom Template's API relative path. Example: account
   * s/{account_id}/containers/{container_id}/workspaces/{workspace_id}/templates/
   * {template_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a GTM Template. (templates.get)
   *
   * @param string $path GTM Custom Template's API relative path. Example: account
   * s/{account_id}/containers/{container_id}/workspaces/{workspace_id}/templates/
   * {template_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_CustomTemplate
   */
  public function get($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_TagManager_CustomTemplate");
  }
  /**
   * Lists all GTM Templates of a GTM container workspace.
   * (templates.listAccountsContainersWorkspacesTemplates)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return Google_Service_TagManager_ListTemplatesResponse
   */
  public function listAccountsContainersWorkspacesTemplates($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_TagManager_ListTemplatesResponse");
  }
  /**
   * Reverts changes to a GTM Template in a GTM Workspace. (templates.revert)
   *
   * @param string $path GTM Custom Template's API relative path. Example: account
   * s/{account_id}/containers/{container_id}/workspaces/{workspace_id}/templates/
   * {template_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the template in storage.
   * @return Google_Service_TagManager_RevertTemplateResponse
   */
  public function revert($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('revert', array($params), "Google_Service_TagManager_RevertTemplateResponse");
  }
  /**
   * Updates a GTM Template. (templates.update)
   *
   * @param string $path GTM Custom Template's API relative path. Example: account
   * s/{account_id}/containers/{container_id}/workspaces/{workspace_id}/templates/
   * {template_id}
   * @param Google_Service_TagManager_CustomTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the templates in storage.
   * @return Google_Service_TagManager_CustomTemplate
   */
  public function update($path, Google_Service_TagManager_CustomTemplate $postBody, $optParams = array())
  {
    $params = array('path' => $path, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_TagManager_CustomTemplate");
  }
}
