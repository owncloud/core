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

namespace Google\Service\CloudOSLogin\Resource;

use Google\Service\CloudOSLogin\SshPublicKey;

/**
 * The "sshPublicKey" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osloginService = new Google\Service\CloudOSLogin(...);
 *   $sshPublicKey = $osloginService->sshPublicKey;
 *  </code>
 */
class UsersSshPublicKey extends \Google\Service\Resource
{
  /**
   * Create an SSH public key (sshPublicKey.create)
   *
   * @param string $parent Required. The unique ID for the user in format
   * `users/{user}`.
   * @param SshPublicKey $postBody
   * @param array $optParams Optional parameters.
   * @return SshPublicKey
   */
  public function create($parent, SshPublicKey $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SshPublicKey::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersSshPublicKey::class, 'Google_Service_CloudOSLogin_Resource_UsersSshPublicKey');
