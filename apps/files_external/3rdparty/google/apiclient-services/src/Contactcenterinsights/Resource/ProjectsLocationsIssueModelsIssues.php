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

namespace Google\Service\Contactcenterinsights\Resource;

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1Issue;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ListIssuesResponse;

/**
 * The "issues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $issues = $contactcenterinsightsService->issues;
 *  </code>
 */
class ProjectsLocationsIssueModelsIssues extends \Google\Service\Resource
{
  /**
   * Gets an issue. (issues.get)
   *
   * @param string $name Required. The name of the issue to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1Issue
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContactcenterinsightsV1Issue::class);
  }
  /**
   * Lists issues. (issues.listProjectsLocationsIssueModelsIssues)
   *
   * @param string $parent Required. The parent resource of the issue.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1ListIssuesResponse
   */
  public function listProjectsLocationsIssueModelsIssues($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContactcenterinsightsV1ListIssuesResponse::class);
  }
  /**
   * Updates an issue. (issues.patch)
   *
   * @param string $name Immutable. The resource name of the issue. Format: projec
   * ts/{project}/locations/{location}/issueModels/{issue_model}/issues/{issue}
   * @param GoogleCloudContactcenterinsightsV1Issue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return GoogleCloudContactcenterinsightsV1Issue
   */
  public function patch($name, GoogleCloudContactcenterinsightsV1Issue $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContactcenterinsightsV1Issue::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsIssueModelsIssues::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsIssueModelsIssues');
