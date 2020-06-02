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
 * The "templateVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $templateVersions = $dataflowService->templateVersions;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsTemplateVersions extends Google_Service_Resource
{
  /**
   * List TemplateVersions using project_id and an optional display_name field.
   * List all the TemplateVersions in the Template if display set. List all the
   * TemplateVersions in the Project if display_name not set.
   * (templateVersions.listProjectsTemplateVersions)
   *
   * @param string $parent parent includes project_id, and display_name is
   * optional.
   *
   * List by project_id(pid1) and display_name(tid1).   Format:
   * projects/{pid1}/catalogTemplates/{tid1}
   *
   * List by project_id(pid1).   Format: projects/{pid1}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The page token, received from a previous
   * ListTemplateVersions call. Provide this to retrieve the subsequent page.
   * @opt_param int pageSize The maximum number of TemplateVersions to return per
   * page.
   * @return Google_Service_Dataflow_ListTemplateVersionsResponse
   */
  public function listProjectsTemplateVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataflow_ListTemplateVersionsResponse");
  }
}
