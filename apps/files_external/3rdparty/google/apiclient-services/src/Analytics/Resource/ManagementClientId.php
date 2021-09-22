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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\HashClientIdRequest;
use Google\Service\Analytics\HashClientIdResponse;

/**
 * The "clientId" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $clientId = $analyticsService->clientId;
 *  </code>
 */
class ManagementClientId extends \Google\Service\Resource
{
  /**
   * Hashes the given Client ID. (clientId.hashClientId)
   *
   * @param HashClientIdRequest $postBody
   * @param array $optParams Optional parameters.
   * @return HashClientIdResponse
   */
  public function hashClientId(HashClientIdRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('hashClientId', [$params], HashClientIdResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementClientId::class, 'Google_Service_Analytics_Resource_ManagementClientId');
