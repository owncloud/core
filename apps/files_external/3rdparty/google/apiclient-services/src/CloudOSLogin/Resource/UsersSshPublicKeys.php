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

use Google\Service\CloudOSLogin\OsloginEmpty;
use Google\Service\CloudOSLogin\SshPublicKey;

/**
 * The "sshPublicKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osloginService = new Google\Service\CloudOSLogin(...);
 *   $sshPublicKeys = $osloginService->sshPublicKeys;
 *  </code>
 */
class UsersSshPublicKeys extends \Google\Service\Resource
{
  /**
   * Deletes an SSH public key. (sshPublicKeys.delete)
   *
   * @param string $name Required. The fingerprint of the public key to update.
   * Public keys are identified by their SHA-256 fingerprint. The fingerprint of
   * the public key is in format `users/{user}/sshPublicKeys/{fingerprint}`.
   * @param array $optParams Optional parameters.
   * @return OsloginEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], OsloginEmpty::class);
  }
  /**
   * Retrieves an SSH public key. (sshPublicKeys.get)
   *
   * @param string $name Required. The fingerprint of the public key to retrieve.
   * Public keys are identified by their SHA-256 fingerprint. The fingerprint of
   * the public key is in format `users/{user}/sshPublicKeys/{fingerprint}`.
   * @param array $optParams Optional parameters.
   * @return SshPublicKey
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SshPublicKey::class);
  }
  /**
   * Updates an SSH public key and returns the profile information. This method
   * supports patch semantics. (sshPublicKeys.patch)
   *
   * @param string $name Required. The fingerprint of the public key to update.
   * Public keys are identified by their SHA-256 fingerprint. The fingerprint of
   * the public key is in format `users/{user}/sshPublicKeys/{fingerprint}`.
   * @param SshPublicKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask to control which fields get updated.
   * Updates all if not present.
   * @return SshPublicKey
   */
  public function patch($name, SshPublicKey $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], SshPublicKey::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersSshPublicKeys::class, 'Google_Service_CloudOSLogin_Resource_UsersSshPublicKeys');
