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

namespace Google\Service\MyBusinessVerifications\Resource;

use Google\Service\MyBusinessVerifications\GenerateVerificationTokenRequest;
use Google\Service\MyBusinessVerifications\GenerateVerificationTokenResponse;

/**
 * The "verificationTokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessverificationsService = new Google\Service\MyBusinessVerifications(...);
 *   $verificationTokens = $mybusinessverificationsService->verificationTokens;
 *  </code>
 */
class VerificationTokens extends \Google\Service\Resource
{
  /**
   * Generates a token for the provided location data as a vetted
   * [partner](https://support.google.com/business/answer/7674102). Throws
   * PERMISSION_DENIED if the caller is not a vetted partner account. Throws
   * FAILED_PRECONDITION if the caller's VettedStatus is INVALID.
   * (verificationTokens.generate)
   *
   * @param GenerateVerificationTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GenerateVerificationTokenResponse
   */
  public function generate(GenerateVerificationTokenRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generate', [$params], GenerateVerificationTokenResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerificationTokens::class, 'Google_Service_MyBusinessVerifications_Resource_VerificationTokens');
