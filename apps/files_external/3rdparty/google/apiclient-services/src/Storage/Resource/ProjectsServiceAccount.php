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

namespace Google\Service\Storage\Resource;

use Google\Service\Storage\ServiceAccount;

/**
 * The "serviceAccount" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $serviceAccount = $storageService->serviceAccount;
 *  </code>
 */
class ProjectsServiceAccount extends \Google\Service\Resource
{
  /**
   * Get the email address of this project's Google Cloud Storage service account.
   * (serviceAccount.get)
   *
   * @param string $projectId Project ID
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * @return ServiceAccount
   */
  public function get($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ServiceAccount::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsServiceAccount::class, 'Google_Service_Storage_Resource_ProjectsServiceAccount');
