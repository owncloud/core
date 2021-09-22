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

namespace Google\Service\FirebaseManagement\Resource;

use Google\Service\FirebaseManagement\ListAvailableProjectsResponse;

/**
 * The "availableProjects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google\Service\FirebaseManagement(...);
 *   $availableProjects = $firebaseService->availableProjects;
 *  </code>
 */
class AvailableProjects extends \Google\Service\Resource
{
  /**
   * Lists each [Google Cloud Platform (GCP) `Project`] (https://cloud.google.com
   * /resource-manager/reference/rest/v1/projects) that can have Firebase
   * resources added to it. A Project will only be listed if: - The caller has
   * sufficient [Google IAM](https://cloud.google.com/iam) permissions to call
   * AddFirebase. - The Project is not already a FirebaseProject. - The Project is
   * not in an Organization which has policies that prevent Firebase resources
   * from being added.  (availableProjects.listAvailableProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Projects to return in the
   * response. The server may return fewer than this value at its discretion. If
   * no value is specified (or too large a value is specified), the server will
   * impose its own limit. This value cannot be negative.
   * @opt_param string pageToken Token returned from a previous call to
   * `ListAvailableProjects` indicating where in the set of Projects to resume
   * listing.
   * @return ListAvailableProjectsResponse
   */
  public function listAvailableProjects($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAvailableProjectsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AvailableProjects::class, 'Google_Service_FirebaseManagement_Resource_AvailableProjects');
