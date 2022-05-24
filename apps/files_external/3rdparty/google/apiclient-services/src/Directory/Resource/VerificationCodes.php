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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\VerificationCodes as VerificationCodesModel;

/**
 * The "verificationCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $verificationCodes = $adminService->verificationCodes;
 *  </code>
 */
class VerificationCodes extends \Google\Service\Resource
{
  /**
   * Generates new backup verification codes for the user.
   * (verificationCodes.generate)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   */
  public function generate($userKey, $optParams = [])
  {
    $params = ['userKey' => $userKey];
    $params = array_merge($params, $optParams);
    return $this->call('generate', [$params]);
  }
  /**
   * Invalidates the current backup verification codes for the user.
   * (verificationCodes.invalidate)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   */
  public function invalidate($userKey, $optParams = [])
  {
    $params = ['userKey' => $userKey];
    $params = array_merge($params, $optParams);
    return $this->call('invalidate', [$params]);
  }
  /**
   * Returns the current set of valid backup verification codes for the specified
   * user. (verificationCodes.listVerificationCodes)
   *
   * @param string $userKey Identifies the user in the API request. The value can
   * be the user's primary email address, alias email address, or unique user ID.
   * @param array $optParams Optional parameters.
   * @return VerificationCodesModel
   */
  public function listVerificationCodes($userKey, $optParams = [])
  {
    $params = ['userKey' => $userKey];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VerificationCodesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerificationCodes::class, 'Google_Service_Directory_Resource_VerificationCodes');
