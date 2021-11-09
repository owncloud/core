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

namespace Google\Service\CloudProfiler\Resource;

use Google\Service\CloudProfiler\CreateProfileRequest;
use Google\Service\CloudProfiler\Profile;

/**
 * The "profiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudprofilerService = new Google\Service\CloudProfiler(...);
 *   $profiles = $cloudprofilerService->profiles;
 *  </code>
 */
class ProjectsProfiles extends \Google\Service\Resource
{
  /**
   * CreateProfile creates a new profile resource in the online mode. The server
   * ensures that the new profiles are created at a constant rate per deployment,
   * so the creation request may hang for some time until the next profile session
   * is available. The request may fail with ABORTED error if the creation is not
   * available within ~1m, the response will indicate the duration of the backoff
   * the client should take before attempting creating a profile again. The
   * backoff duration is returned in google.rpc.RetryInfo extension on the
   * response status. To a gRPC client, the extension will be return as a binary-
   * serialized proto in the trailing metadata item named "google.rpc.retryinfo-
   * bin".  (profiles.create)
   *
   * @param string $parent Parent project to create the profile in.
   * @param CreateProfileRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function create($parent, CreateProfileRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Profile::class);
  }
  /**
   * CreateOfflineProfile creates a new profile resource in the offline mode. The
   * client provides the profile to create along with the profile bytes, the
   * server records it. (profiles.createOffline)
   *
   * @param string $parent Parent project to create the profile in.
   * @param Profile $postBody
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function createOffline($parent, Profile $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createOffline', [$params], Profile::class);
  }
  /**
   * UpdateProfile updates the profile bytes and labels on the profile resource
   * created in the online mode. Updating the bytes for profiles created in the
   * offline mode is currently not supported: the profile content must be provided
   * at the time of the profile creation. (profiles.patch)
   *
   * @param string $name Output only. Opaque, server-assigned, unique ID for this
   * profile.
   * @param Profile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask used to specify the fields to be
   * overwritten. Currently only profile_bytes and labels fields are supported by
   * UpdateProfile, so only those fields can be specified in the mask. When no
   * mask is provided, all fields are overwritten.
   * @return Profile
   */
  public function patch($name, Profile $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Profile::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsProfiles::class, 'Google_Service_CloudProfiler_Resource_ProjectsProfiles');
