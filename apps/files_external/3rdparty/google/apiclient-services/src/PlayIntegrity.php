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
 * Service definition for PlayIntegrity (v1).
 *
 * <p>
 * Play Integrity</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developer.android.com/google/play/integrity" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class PlayIntegrity extends \Google\Service
{
  /** Private Service: https://www.googleapis.com/auth/playintegrity. */
  const PLAYINTEGRITY =
      "https://www.googleapis.com/auth/playintegrity";

  public $v1;

  /**
   * Constructs the internal representation of the PlayIntegrity service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://playintegrity.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'playintegrity';

    $this->v1 = new PlayIntegrity\Resource\V1(
        $this,
        $this->serviceName,
        'v1',
        [
          'methods' => [
            'decodeIntegrityToken' => [
              'path' => 'v1/{+packageName}:decodeIntegrityToken',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
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
class_alias(PlayIntegrity::class, 'Google_Service_PlayIntegrity');
