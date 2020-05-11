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
 * The "clientId" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $clientId = $analyticsService->clientId;
 *  </code>
 */
class Google_Service_Analytics_Resource_ManagementClientId extends Google_Service_Resource
{
  /**
   * Hashes the given Client ID. (clientId.hashClientId)
   *
   * @param Google_Service_Analytics_HashClientIdRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Analytics_HashClientIdResponse
   */
  public function hashClientId(Google_Service_Analytics_HashClientIdRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('hashClientId', array($params), "Google_Service_Analytics_HashClientIdResponse");
  }
}
