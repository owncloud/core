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

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaCertificate;

/**
 * The "certificates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $certificates = $integrationsService->certificates;
 *  </code>
 */
class ProjectsLocationsCertificates extends \Google\Service\Resource
{
  /**
   * Get a certificates in the specified project. (certificates.get)
   *
   * @param string $name Required. The certificate to retrieve. Format:
   * projects/{project}/locations/{location}/certificates/{certificate}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaCertificate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudIntegrationsV1alphaCertificate::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCertificates::class, 'Google_Service_Integrations_Resource_ProjectsLocationsCertificates');
