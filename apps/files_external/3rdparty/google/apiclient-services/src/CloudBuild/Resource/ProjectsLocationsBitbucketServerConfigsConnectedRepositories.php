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

namespace Google\Service\CloudBuild\Resource;

use Google\Service\CloudBuild\BatchCreateBitbucketServerConnectedRepositoriesRequest;
use Google\Service\CloudBuild\Operation;

/**
 * The "connectedRepositories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $connectedRepositories = $cloudbuildService->connectedRepositories;
 *  </code>
 */
class ProjectsLocationsBitbucketServerConfigsConnectedRepositories extends \Google\Service\Resource
{
  /**
   * Batch connecting Bitbucket Server repositories to Cloud Build.
   * (connectedRepositories.batchCreate)
   *
   * @param string $parent The name of the `BitbucketServerConfig` that added
   * connected repository. Format:
   * `projects/{project}/locations/{location}/bitbucketServerConfigs/{config}`
   * @param BatchCreateBitbucketServerConnectedRepositoriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function batchCreate($parent, BatchCreateBitbucketServerConnectedRepositoriesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsBitbucketServerConfigsConnectedRepositories::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsBitbucketServerConfigsConnectedRepositories');
