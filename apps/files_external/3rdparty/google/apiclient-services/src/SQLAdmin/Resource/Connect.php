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

namespace Google\Service\SQLAdmin\Resource;

use Google\Service\SQLAdmin\ConnectSettings;
use Google\Service\SQLAdmin\GenerateEphemeralCertRequest;
use Google\Service\SQLAdmin\GenerateEphemeralCertResponse;

/**
 * The "connect" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $connect = $sqladminService->connect;
 *  </code>
 */
class Connect extends \Google\Service\Resource
{
  /**
   * Generates a short-lived X509 certificate containing the provided public key
   * and signed by a private key specific to the target instance. Users may use
   * the certificate to authenticate as themselves when connecting to the
   * database. (connect.generateEphemeralCert)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param GenerateEphemeralCertRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GenerateEphemeralCertResponse
   */
  public function generateEphemeralCert($project, $instance, GenerateEphemeralCertRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateEphemeralCert', [$params], GenerateEphemeralCertResponse::class);
  }
  /**
   * Retrieves connect settings about a Cloud SQL instance. (connect.get)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readTime Optional. Optional snapshot read timestamp to
   * trade freshness for performance.
   * @return ConnectSettings
   */
  public function get($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ConnectSettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Connect::class, 'Google_Service_SQLAdmin_Resource_Connect');
