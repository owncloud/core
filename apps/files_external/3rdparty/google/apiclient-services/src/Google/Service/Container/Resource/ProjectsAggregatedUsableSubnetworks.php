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
 * The "usableSubnetworks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $usableSubnetworks = $containerService->usableSubnetworks;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsAggregatedUsableSubnetworks extends Google_Service_Resource
{
  /**
   * Lists subnetworks that are usable for creating clusters in a project.
   * (usableSubnetworks.listProjectsAggregatedUsableSubnetworks)
   *
   * @param string $parent The parent project where subnetworks are usable.
   * Specified in the format `projects`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The max number of results per page that should be
   * returned. If the number of available results is larger than `page_size`, a
   * `next_page_token` is returned which can be used to get the next page of
   * results in subsequent requests. Acceptable values are 0 to 500, inclusive.
   * (Default: 500)
   * @opt_param string filter Filtering currently only supports equality on the
   * networkProjectId and must be in the form: "networkProjectId=[PROJECTID]",
   * where `networkProjectId` is the project which owns the listed subnetworks.
   * This defaults to the parent project ID.
   * @opt_param string pageToken Specifies a page token to use. Set this to the
   * nextPageToken returned by previous list requests to get the next page of
   * results.
   * @return Google_Service_Container_ListUsableSubnetworksResponse
   */
  public function listProjectsAggregatedUsableSubnetworks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListUsableSubnetworksResponse");
  }
}
