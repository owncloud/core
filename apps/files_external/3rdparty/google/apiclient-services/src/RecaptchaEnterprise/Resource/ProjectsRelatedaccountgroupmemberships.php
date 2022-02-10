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

use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1SearchRelatedAccountGroupMembershipsRequest;
use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1SearchRelatedAccountGroupMembershipsResponse;

/**
 * The "relatedaccountgroupmemberships" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google\Service\RecaptchaEnterprise(...);
 *   $relatedaccountgroupmemberships = $recaptchaenterpriseService->relatedaccountgroupmemberships;
 *  </code>
 */
class ProjectsRelatedaccountgroupmemberships extends \Google\Service\Resource
{
  /**
   * Search group memberships related to a given account.
   * (relatedaccountgroupmemberships.search)
   *
   * @param string $project Required. The name of the project to search related
   * account group memberships from, in the format "projects/{project}".
   * @param GoogleCloudRecaptchaenterpriseV1SearchRelatedAccountGroupMembershipsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1SearchRelatedAccountGroupMembershipsResponse
   */
  public function search($project, GoogleCloudRecaptchaenterpriseV1SearchRelatedAccountGroupMembershipsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudRecaptchaenterpriseV1SearchRelatedAccountGroupMembershipsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRelatedaccountgroupmemberships::class, 'Google_Service_RecaptchaEnterprise_Resource_ProjectsRelatedaccountgroupmemberships');
