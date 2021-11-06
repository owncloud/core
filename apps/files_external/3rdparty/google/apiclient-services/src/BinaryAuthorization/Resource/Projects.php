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

namespace Google\Service\BinaryAuthorization\Resource;

use Google\Service\BinaryAuthorization\Policy;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $binaryauthorizationService = new Google\Service\BinaryAuthorization(...);
 *   $projects = $binaryauthorizationService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * A policy specifies the attestors that must attest to a container image,
   * before the project is allowed to deploy that image. There is at most one
   * policy per project. All image admission requests are permitted if a project
   * has no policy. Gets the policy for this project. Returns a default policy if
   * the project does not have one. (projects.getPolicy)
   *
   * @param string $name Required. The resource name of the policy to retrieve, in
   * the format `projects/policy`.
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getPolicy($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getPolicy', [$params], Policy::class);
  }
  /**
   * Creates or updates a project's policy, and returns a copy of the new policy.
   * A policy is always updated as a whole, to avoid race conditions with
   * concurrent policy enforcement (or management!) requests. Returns NOT_FOUND if
   * the project does not exist, INVALID_ARGUMENT if the request is malformed.
   * (projects.updatePolicy)
   *
   * @param string $name Output only. The resource name, in the format
   * `projects/policy`. There is at most one policy per project.
   * @param Policy $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function updatePolicy($name, Policy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatePolicy', [$params], Policy::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_BinaryAuthorization_Resource_Projects');
