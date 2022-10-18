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

namespace Google\Service\RecaptchaEnterprise\Resource;

use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupsResponse;

/**
 * The "relatedaccountgroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google\Service\RecaptchaEnterprise(...);
 *   $relatedaccountgroups = $recaptchaenterpriseService->relatedaccountgroups;
 *  </code>
 */
class ProjectsRelatedaccountgroups extends \Google\Service\Resource
{
  /**
   * List groups of related accounts.
   * (relatedaccountgroups.listProjectsRelatedaccountgroups)
   *
   * @param string $parent Required. The name of the project to list related
   * account groups from, in the format "projects/{project}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of groups to return. The
   * service might return fewer than this value. If unspecified, at most 50 groups
   * are returned. The maximum value is 1000; values above 1000 are coerced to
   * 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListRelatedAccountGroups` call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * `ListRelatedAccountGroups` must match the call that provided the page token.
   * @return GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupsResponse
   */
  public function listProjectsRelatedaccountgroups($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRelatedaccountgroups::class, 'Google_Service_RecaptchaEnterprise_Resource_ProjectsRelatedaccountgroups');
