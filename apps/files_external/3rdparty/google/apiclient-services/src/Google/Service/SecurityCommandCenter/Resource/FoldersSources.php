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
 * The "sources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google_Service_SecurityCommandCenter(...);
 *   $sources = $securitycenterService->sources;
 *  </code>
 */
class Google_Service_SecurityCommandCenter_Resource_FoldersSources extends Google_Service_Resource
{
  /**
   * Lists all sources belonging to an organization. (sources.listFoldersSources)
   *
   * @param string $parent Required. Resource name of the parent of sources to
   * list. Its format should be "organizations/[organization_id],
   * folders/[folder_id], or projects/[project_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @opt_param string pageToken The value returned by the last
   * `ListSourcesResponse`; indicates that this is a continuation of a prior
   * `ListSources` call, and that the system should return the next page of data.
   * @return Google_Service_SecurityCommandCenter_ListSourcesResponse
   */
  public function listFoldersSources($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SecurityCommandCenter_ListSourcesResponse");
  }
}
