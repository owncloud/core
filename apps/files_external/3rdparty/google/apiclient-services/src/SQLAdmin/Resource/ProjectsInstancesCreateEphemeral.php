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

use Google\Service\SQLAdmin\SslCert;
use Google\Service\SQLAdmin\SslCertsCreateEphemeralRequest;

/**
 * The "createEphemeral" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $createEphemeral = $sqladminService->createEphemeral;
 *  </code>
 */
class ProjectsInstancesCreateEphemeral extends \Google\Service\Resource
{
  /**
   * Generates a short-lived X509 certificate containing the provided public key
   * and signed by a private key specific to the target instance. Users may use
   * the certificate to authenticate as themselves when connecting to the
   * database. (createEphemeral.create)
   *
   * @param string $project Project ID of the Cloud SQL project.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param SslCertsCreateEphemeralRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SslCert
   */
  public function create($project, $instance, SslCertsCreateEphemeralRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SslCert::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsInstancesCreateEphemeral::class, 'Google_Service_SQLAdmin_Resource_ProjectsInstancesCreateEphemeral');
