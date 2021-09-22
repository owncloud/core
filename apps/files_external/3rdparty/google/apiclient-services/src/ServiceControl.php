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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for ServiceControl (v2).
 *
 * <p>
 * Provides admission control and telemetry reporting for services integrated
 * with Service Infrastructure.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/service-control/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ServiceControl extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Manage your Google Service Control data. */
  const SERVICECONTROL =
      "https://www.googleapis.com/auth/servicecontrol";

  public $services;

  /**
   * Constructs the internal representation of the ServiceControl service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://servicecontrol.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'servicecontrol';

    $this->services = new ServiceControl\Resource\Services(
        $this,
        $this->serviceName,
        'services',
        [
          'methods' => [
            'check' => [
              'path' => 'v2/services/{serviceName}:check',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'report' => [
              'path' => 'v2/services/{serviceName}:report',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceControl::class, 'Google_Service_ServiceControl');
