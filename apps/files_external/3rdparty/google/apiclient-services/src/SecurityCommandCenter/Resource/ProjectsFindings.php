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

namespace Google\Service\SecurityCommandCenter\Resource;

use Google\Service\SecurityCommandCenter\BulkMuteFindingsRequest;
use Google\Service\SecurityCommandCenter\Operation;

/**
 * The "findings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $findings = $securitycenterService->findings;
 *  </code>
 */
class ProjectsFindings extends \Google\Service\Resource
{
  /**
   * Kicks off an LRO to bulk mute findings for a parent based on a filter. The
   * parent can be either an organization, folder or project. The findings matched
   * by the filter will be muted after the LRO is done. (findings.bulkMute)
   *
   * @param string $parent Required. The parent, at which bulk action needs to be
   * applied. Its format is "organizations/[organization_id]",
   * "folders/[folder_id]", "projects/[project_id]".
   * @param BulkMuteFindingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function bulkMute($parent, BulkMuteFindingsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkMute', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsFindings::class, 'Google_Service_SecurityCommandCenter_Resource_ProjectsFindings');
