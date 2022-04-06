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

use Google\Service\SecurityCommandCenter\GoogleCloudSecuritycenterV1ExternalSystem;

/**
 * The "externalSystems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $externalSystems = $securitycenterService->externalSystems;
 *  </code>
 */
class ProjectsSourcesFindingsExternalSystems extends \Google\Service\Resource
{
  /**
   * Updates external system. This is for a given finding. (externalSystems.patch)
   *
   * @param string $name External System Name e.g. jira, demisto, etc. e.g.:
   * `organizations/1234/sources/5678/findings/123456/externalSystems/jira`
   * `folders/1234/sources/5678/findings/123456/externalSystems/jira`
   * `projects/1234/sources/5678/findings/123456/externalSystems/jira`
   * @param GoogleCloudSecuritycenterV1ExternalSystem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the external
   * system resource. If empty all mutable fields will be updated.
   * @return GoogleCloudSecuritycenterV1ExternalSystem
   */
  public function patch($name, GoogleCloudSecuritycenterV1ExternalSystem $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudSecuritycenterV1ExternalSystem::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsSourcesFindingsExternalSystems::class, 'Google_Service_SecurityCommandCenter_Resource_ProjectsSourcesFindingsExternalSystems');
