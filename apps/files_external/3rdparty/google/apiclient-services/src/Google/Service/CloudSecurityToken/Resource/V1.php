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
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $stsService = new Google_Service_CloudSecurityToken(...);
 *   $v1 = $stsService->v1;
 *  </code>
 */
class Google_Service_CloudSecurityToken_Resource_V1 extends Google_Service_Resource
{
  /**
   * Exchanges a credential for a Google OAuth 2.0 access token. (v1.token)
   *
   * @param Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenResponse
   */
  public function token(Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('token', array($params), "Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenResponse");
  }
}
