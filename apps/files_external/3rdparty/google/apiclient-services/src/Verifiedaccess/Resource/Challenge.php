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

namespace Google\Service\Verifiedaccess\Resource;

use Google\Service\Verifiedaccess\Challenge as ChallengeModel;
use Google\Service\Verifiedaccess\VerifiedaccessEmpty;
use Google\Service\Verifiedaccess\VerifyChallengeResponseRequest;
use Google\Service\Verifiedaccess\VerifyChallengeResponseResult;

/**
 * The "challenge" collection of methods.
 * Typical usage is:
 *  <code>
 *   $verifiedaccessService = new Google\Service\Verifiedaccess(...);
 *   $challenge = $verifiedaccessService->challenge;
 *  </code>
 */
class Challenge extends \Google\Service\Resource
{
  /**
   * Generates a new challenge. (challenge.generate)
   *
   * @param VerifiedaccessEmpty $postBody
   * @param array $optParams Optional parameters.
   * @return ChallengeModel
   */
  public function generate(VerifiedaccessEmpty $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generate', [$params], ChallengeModel::class);
  }
  /**
   * Verifies the challenge response. (challenge.verify)
   *
   * @param VerifyChallengeResponseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VerifyChallengeResponseResult
   */
  public function verify(VerifyChallengeResponseRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verify', [$params], VerifyChallengeResponseResult::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Challenge::class, 'Google_Service_Verifiedaccess_Resource_Challenge');
