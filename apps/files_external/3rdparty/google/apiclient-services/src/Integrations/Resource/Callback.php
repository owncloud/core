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

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaGenerateTokenResponse;

/**
 * The "callback" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $callback = $integrationsService->callback;
 *  </code>
 */
class Callback extends \Google\Service\Resource
{
  /**
   * Receives the auth code and auth config id to combine that with the client id
   * and secret to retrieve access tokens from the token endpoint. Returns either
   * a success or error message when it's done. (callback.generateToken)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string code The auth code for the given request
   * @opt_param string gcpProjectId The gcp project id of the request
   * @opt_param string product Which product sends the request
   * @opt_param string redirectUri Redirect uri of the auth code request
   * @opt_param string state The auth config id for the given request
   * @return GoogleCloudIntegrationsV1alphaGenerateTokenResponse
   */
  public function generateToken($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('generateToken', [$params], GoogleCloudIntegrationsV1alphaGenerateTokenResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Callback::class, 'Google_Service_Integrations_Resource_Callback');
