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

use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupMembershipsResponse;

/**
 * The "memberships" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google\Service\RecaptchaEnterprise(...);
 *   $memberships = $recaptchaenterpriseService->memberships;
 *  </code>
 */
class ProjectsRelatedaccountgroupsMemberships extends \Google\Service\Resource
{
  /**
   * Get the memberships in a group of related accounts.
   * (memberships.listProjectsRelatedaccountgroupsMemberships)
   *
   * @param string $parent Required. The resource name for the related account
   * group in the format
   * `projects/{project}/relatedaccountgroups/{relatedaccountgroup}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of accounts to return.
   * The service may return fewer than this value. If unspecified, at most 50
   * accounts will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListRelatedAccountGroupMemberships` call. When paginating, all other
   * parameters provided to `ListRelatedAccountGroupMemberships` must match the
   * call that provided the page token.
   * @return GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupMembershipsResponse
   */
  public function listProjectsRelatedaccountgroupsMemberships($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupMembershipsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRelatedaccountgroupsMemberships::class, 'Google_Service_RecaptchaEnterprise_Resource_ProjectsRelatedaccountgroupsMemberships');
