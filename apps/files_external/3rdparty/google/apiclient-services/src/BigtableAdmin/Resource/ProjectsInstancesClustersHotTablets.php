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

namespace Google\Service\BigtableAdmin\Resource;

use Google\Service\BigtableAdmin\ListHotTabletsResponse;

/**
 * The "hotTablets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigtableadminService = new Google\Service\BigtableAdmin(...);
 *   $hotTablets = $bigtableadminService->hotTablets;
 *  </code>
 */
class ProjectsInstancesClustersHotTablets extends \Google\Service\Resource
{
  /**
   * Lists hot tablets in a cluster, within the time range provided. Hot tablets
   * are ordered based on CPU usage.
   * (hotTablets.listProjectsInstancesClustersHotTablets)
   *
   * @param string $parent Required. The cluster name to list hot tablets. Value
   * is in the following form:
   * `projects/{project}/instances/{instance}/clusters/{cluster}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endTime The end time to list hot tablets.
   * @opt_param int pageSize Maximum number of results per page. A page_size that
   * is empty or zero lets the server choose the number of items to return. A
   * page_size which is strictly positive will return at most that many items. A
   * negative page_size will cause an error. Following the first request,
   * subsequent paginated calls do not need a page_size field. If a page_size is
   * set in subsequent calls, it must match the page_size given in the first
   * request.
   * @opt_param string pageToken The value of `next_page_token` returned by a
   * previous call.
   * @opt_param string startTime The start time to list hot tablets. The hot
   * tablets in the response will have start times between the requested start
   * time and end time. Start time defaults to Now if it is unset, and end time
   * defaults to Now - 24 hours if it is unset. The start time should be less than
   * the end time, and the maximum allowed time range between start time and end
   * time is 48 hours. Start time and end time should have values between Now and
   * Now - 14 days.
   * @return ListHotTabletsResponse
   */
  public function listProjectsInstancesClustersHotTablets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListHotTabletsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsInstancesClustersHotTablets::class, 'Google_Service_BigtableAdmin_Resource_ProjectsInstancesClustersHotTablets');
