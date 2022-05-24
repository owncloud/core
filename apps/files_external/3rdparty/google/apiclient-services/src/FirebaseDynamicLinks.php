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
 * Service definition for FirebaseDynamicLinks (v1).
 *
 * <p>
 * Programmatically creates and manages Firebase Dynamic Links.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://firebase.google.com/docs/dynamic-links/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class FirebaseDynamicLinks extends \Google\Service
{
  /** View and administer all your Firebase data and settings. */
  const FIREBASE =
      "https://www.googleapis.com/auth/firebase";

  public $managedShortLinks;
  public $shortLinks;
  public $v1;

  /**
   * Constructs the internal representation of the FirebaseDynamicLinks service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://firebasedynamiclinks.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'firebasedynamiclinks';

    $this->managedShortLinks = new FirebaseDynamicLinks\Resource\ManagedShortLinks(
        $this,
        $this->serviceName,
        'managedShortLinks',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/managedShortLinks:create',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->shortLinks = new FirebaseDynamicLinks\Resource\ShortLinks(
        $this,
        $this->serviceName,
        'shortLinks',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/shortLinks',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->v1 = new FirebaseDynamicLinks\Resource\V1(
        $this,
        $this->serviceName,
        'v1',
        [
          'methods' => [
            'getLinkStats' => [
              'path' => 'v1/{dynamicLink}/linkStats',
              'httpMethod' => 'GET',
              'parameters' => [
                'dynamicLink' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'durationDays' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sdkVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'installAttribution' => [
              'path' => 'v1/installAttribution',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'reopenAttribution' => [
              'path' => 'v1/reopenAttribution',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirebaseDynamicLinks::class, 'Google_Service_FirebaseDynamicLinks');
