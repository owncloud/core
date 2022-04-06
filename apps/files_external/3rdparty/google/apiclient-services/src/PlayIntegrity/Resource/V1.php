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

namespace Google\Service\PlayIntegrity\Resource;

use Google\Service\PlayIntegrity\DecodeIntegrityTokenRequest;
use Google\Service\PlayIntegrity\DecodeIntegrityTokenResponse;

/**
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playintegrityService = new Google\Service\PlayIntegrity(...);
 *   $v1 = $playintegrityService->v1;
 *  </code>
 */
class V1 extends \Google\Service\Resource
{
  /**
   * Decodes the integrity token and returns the token payload.
   * (v1.decodeIntegrityToken)
   *
   * @param string $packageName Package name of the app the attached integrity
   * token belongs to.
   * @param DecodeIntegrityTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DecodeIntegrityTokenResponse
   */
  public function decodeIntegrityToken($packageName, DecodeIntegrityTokenRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('decodeIntegrityToken', [$params], DecodeIntegrityTokenResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1::class, 'Google_Service_PlayIntegrity_Resource_V1');
