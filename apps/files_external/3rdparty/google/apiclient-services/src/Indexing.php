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
 * Service definition for Indexing (v3).
 *
 * <p>
 * Notifies Google when your web pages change.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/search/apis/indexing-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Indexing extends \Google\Service
{
  /** Submit data to Google for indexing. */
  const INDEXING =
      "https://www.googleapis.com/auth/indexing";

  public $urlNotifications;

  /**
   * Constructs the internal representation of the Indexing service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://indexing.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'indexing';

    $this->urlNotifications = new Indexing\Resource\UrlNotifications(
        $this,
        $this->serviceName,
        'urlNotifications',
        [
          'methods' => [
            'getMetadata' => [
              'path' => 'v3/urlNotifications/metadata',
              'httpMethod' => 'GET',
              'parameters' => [
                'url' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'publish' => [
              'path' => 'v3/urlNotifications:publish',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Indexing::class, 'Google_Service_Indexing');
