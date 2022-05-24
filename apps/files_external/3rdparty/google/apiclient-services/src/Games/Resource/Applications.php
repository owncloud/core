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

namespace Google\Service\Games\Resource;

use Google\Service\Games\Application;
use Google\Service\Games\ApplicationVerifyResponse;
use Google\Service\Games\EndPoint;

/**
 * The "applications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $applications = $gamesService->applications;
 *  </code>
 */
class Applications extends \Google\Service\Resource
{
  /**
   * Retrieves the metadata of the application with the given ID. If the requested
   * application is not available for the specified `platformType`, the returned
   * response will not include any instance data. (applications.get)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param string platformType Restrict application details returned to the
   * specific platform.
   * @return Application
   */
  public function get($applicationId, $optParams = [])
  {
    $params = ['applicationId' => $applicationId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Application::class);
  }
  /**
   * Returns a URL for the requested end point type. (applications.getEndPoint)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string applicationId The application ID from the Google Play
   * developer console.
   * @opt_param string endPointType Type of endpoint being requested.
   * @return EndPoint
   */
  public function getEndPoint($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getEndPoint', [$params], EndPoint::class);
  }
  /**
   * Indicate that the currently authenticated user is playing your application.
   * (applications.played)
   *
   * @param array $optParams Optional parameters.
   */
  public function played($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('played', [$params]);
  }
  /**
   * Verifies the auth token provided with this request is for the application
   * with the specified ID, and returns the ID of the player it was granted for.
   * (applications.verify)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param array $optParams Optional parameters.
   * @return ApplicationVerifyResponse
   */
  public function verify($applicationId, $optParams = [])
  {
    $params = ['applicationId' => $applicationId];
    $params = array_merge($params, $optParams);
    return $this->call('verify', [$params], ApplicationVerifyResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Applications::class, 'Google_Service_Games_Resource_Applications');
