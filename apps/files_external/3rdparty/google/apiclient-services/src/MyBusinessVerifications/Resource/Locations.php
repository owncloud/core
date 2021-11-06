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

use Google\Service\MyBusinessVerifications\FetchVerificationOptionsRequest;
use Google\Service\MyBusinessVerifications\FetchVerificationOptionsResponse;
use Google\Service\MyBusinessVerifications\VerifyLocationRequest;
use Google\Service\MyBusinessVerifications\VerifyLocationResponse;
use Google\Service\MyBusinessVerifications\VoiceOfMerchantState;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessverificationsService = new Google\Service\MyBusinessVerifications(...);
 *   $locations = $mybusinessverificationsService->locations;
 *  </code>
 */
class Locations extends \Google\Service\Resource
{
  /**
   * Reports all eligible verification options for a location in a specific
   * language. (locations.fetchVerificationOptions)
   *
   * @param string $location Required. The location to verify.
   * @param FetchVerificationOptionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FetchVerificationOptionsResponse
   */
  public function fetchVerificationOptions($location, FetchVerificationOptionsRequest $postBody, $optParams = [])
  {
    $params = ['location' => $location, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('fetchVerificationOptions', [$params], FetchVerificationOptionsResponse::class);
  }
  /**
   * Gets the VoiceOfMerchant state. (locations.getVoiceOfMerchantState)
   *
   * @param string $name Required. Resource name of the location.
   * @param array $optParams Optional parameters.
   * @return VoiceOfMerchantState
   */
  public function getVoiceOfMerchantState($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getVoiceOfMerchantState', [$params], VoiceOfMerchantState::class);
  }
  /**
   * Starts the verification process for a location. (locations.verify)
   *
   * @param string $name Required. Resource name of the location to verify.
   * @param VerifyLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VerifyLocationResponse
   */
  public function verify($name, VerifyLocationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verify', [$params], VerifyLocationResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Locations::class, 'Google_Service_MyBusinessVerifications_Resource_Locations');
