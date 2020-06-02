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
 * The "catalogTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $catalogTemplates = $dataflowService->catalogTemplates;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsCatalogTemplates extends Google_Service_Resource
{
  /**
   * Creates a new TemplateVersion (Important: not new Template) entry in the
   * spanner table. Requires project_id and display_name (template).
   * (catalogTemplates.commit)
   *
   * @param string $name The location of the template, name includes project_id
   * and display_name.
   *
   * Commit using project_id(pid1) and display_name(tid1).   Format:
   * projects/{pid1}/catalogTemplates/{tid1}
   * @param Google_Service_Dataflow_CommitTemplateVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_TemplateVersion
   */
  public function commit($name, Google_Service_Dataflow_CommitTemplateVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('commit', array($params), "Google_Service_Dataflow_TemplateVersion");
  }
  /**
   * Deletes an existing Template. Do nothing if Template does not exist.
   * (catalogTemplates.delete)
   *
   * @param string $name name includes project_id and display_name.
   *
   * Delete by project_id(pid1) and display_name(tid1).   Format:
   * projects/{pid1}/catalogTemplates/{tid1}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_DataflowEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataflow_DataflowEmpty");
  }
  /**
   * Get TemplateVersion using project_id and display_name with an optional
   * version_id field. Get latest (has tag "latest") TemplateVersion if version_id
   * not set. (catalogTemplates.get)
   *
   * @param string $name Resource name includes project_id and display_name.
   * version_id is optional. Get the latest TemplateVersion if version_id not set.
   *
   * Get by project_id(pid1) and display_name(tid1):   Format:
   * projects/{pid1}/catalogTemplates/{tid1}
   *
   * Get by project_id(pid1), display_name(tid1), and version_id(vid1):   Format:
   * projects/{pid1}/catalogTemplates/{tid1@vid}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_TemplateVersion
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataflow_TemplateVersion");
  }
  /**
   * Updates the label of the TemplateVersion. Label can be duplicated in
   * Template, so either add or remove the label in the TemplateVersion.
   * (catalogTemplates.label)
   *
   * @param string $name Resource name includes project_id, display_name, and
   * version_id.
   *
   * Updates by project_id(pid1), display_name(tid1), and version_id(vid1):
   * Format: projects/{pid1}/catalogTemplates/{tid1@vid}
   * @param Google_Service_Dataflow_ModifyTemplateVersionLabelRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_ModifyTemplateVersionLabelResponse
   */
  public function label($name, Google_Service_Dataflow_ModifyTemplateVersionLabelRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('label', array($params), "Google_Service_Dataflow_ModifyTemplateVersionLabelResponse");
  }
  /**
   * Updates the tag of the TemplateVersion, and tag is unique in Template. If tag
   * exists in another TemplateVersion in the Template, updates the tag to this
   * TemplateVersion will remove it from the old TemplateVersion and add it to
   * this TemplateVersion. If request is remove_only (remove_only = true), remove
   * the tag from this TemplateVersion. (catalogTemplates.tag)
   *
   * @param string $name Resource name includes project_id, display_name, and
   * version_id.
   *
   * Updates by project_id(pid1), display_name(tid1), and version_id(vid1):
   * Format: projects/{pid1}/catalogTemplates/{tid1@vid}
   * @param Google_Service_Dataflow_ModifyTemplateVersionTagRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_ModifyTemplateVersionTagResponse
   */
  public function tag($name, Google_Service_Dataflow_ModifyTemplateVersionTagRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('tag', array($params), "Google_Service_Dataflow_ModifyTemplateVersionTagResponse");
  }
}
