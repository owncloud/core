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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Changelog;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListChangelogsResponse;

/**
 * The "changelogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $changelogs = $dialogflowService->changelogs;
 *  </code>
 */
class ProjectsLocationsAgentsChangelogs extends \Google\Service\Resource
{
  /**
   * Retrieves the specified Changelog. (changelogs.get)
   *
   * @param string $name Required. The name of the changelog to get. Format:
   * `projects//locations//agents//changelogs/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Changelog
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Changelog::class);
  }
  /**
   * Returns the list of Changelogs.
   * (changelogs.listProjectsLocationsAgentsChangelogs)
   *
   * @param string $parent Required. The agent containing the changelogs. Format:
   * `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter string. Supports filter by user_email,
   * resource, type and create_time. Some examples: 1. By user email: user_email =
   * "someone@google.com" 2. By resource name: resource =
   * "projects/123/locations/global/agents/456/flows/789" 3. By resource display
   * name: display_name = "my agent" 4. By action: action = "Create" 5. By type:
   * type = "flows" 6. By create time. Currently predicates on `create_time` and
   * `create_time_epoch_seconds` are supported: create_time_epoch_seconds >
   * 1551790877 AND create_time <= 2017-01-15T01:30:15.01Z 7. Combination of above
   * filters: resource = "projects/123/locations/global/agents/456/flows/789" AND
   * user_email = "someone@google.com" AND create_time <= 2017-01-15T01:30:15.01Z
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListChangelogsResponse
   */
  public function listProjectsLocationsAgentsChangelogs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListChangelogsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsChangelogs::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsChangelogs');
