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
 * Service definition for Digitalassetlinks (v1).
 *
 * <p>
 * Discovers relationships between online assets such as websites or mobile
 * apps.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/digital-asset-links/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Digitalassetlinks extends \Google\Service
{


  public $assetlinks;
  public $statements;

  /**
   * Constructs the internal representation of the Digitalassetlinks service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://digitalassetlinks.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'digitalassetlinks';

    $this->assetlinks = new Digitalassetlinks\Resource\Assetlinks(
        $this,
        $this->serviceName,
        'assetlinks',
        [
          'methods' => [
            'bulkCheck' => [
              'path' => 'v1/assetlinks:bulkCheck',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'check' => [
              'path' => 'v1/assetlinks:check',
              'httpMethod' => 'GET',
              'parameters' => [
                'relation' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source.androidApp.certificate.sha256Fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source.androidApp.packageName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source.web.site' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'target.androidApp.certificate.sha256Fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'target.androidApp.packageName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'target.web.site' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->statements = new Digitalassetlinks\Resource\Statements(
        $this,
        $this->serviceName,
        'statements',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/statements:list',
              'httpMethod' => 'GET',
              'parameters' => [
                'relation' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source.androidApp.certificate.sha256Fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source.androidApp.packageName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source.web.site' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Digitalassetlinks::class, 'Google_Service_Digitalassetlinks');
