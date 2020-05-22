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

/**
 * The "challenge" collection of methods.
 * Typical usage is:
 *  <code>
 *   $verifiedaccessService = new Google_Service_Verifiedaccess(...);
 *   $challenge = $verifiedaccessService->challenge;
 *  </code>
 */
class Google_Service_Verifiedaccess_Resource_Challenge extends Google_Service_Resource
{
  /**
   * CreateChallenge API (challenge.create)
   *
   * @param Google_Service_Verifiedaccess_VerifiedaccessEmpty $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Verifiedaccess_Challenge
   */
  public function create(Google_Service_Verifiedaccess_VerifiedaccessEmpty $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Verifiedaccess_Challenge");
  }
  /**
   * VerifyChallengeResponse API (challenge.verify)
   *
   * @param Google_Service_Verifiedaccess_VerifyChallengeResponseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Verifiedaccess_VerifyChallengeResponseResult
   */
  public function verify(Google_Service_Verifiedaccess_VerifyChallengeResponseRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verify', array($params), "Google_Service_Verifiedaccess_VerifyChallengeResponseResult");
  }
}
