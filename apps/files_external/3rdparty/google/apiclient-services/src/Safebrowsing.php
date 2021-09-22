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
 * Service definition for Safebrowsing (v4).
 *
 * <p>
 * Enables client applications to check web resources (most commonly URLs)
 * against Google-generated lists of unsafe web resources. The Safe Browsing
 * APIs are for non-commercial use only. If you need to use APIs to detect
 * malicious URLs for commercial purposes – meaning “for sale or revenue-
 * generating purposes” – please refer to the Web Risk API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/safe-browsing/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Safebrowsing extends \Google\Service
{


  public $encodedFullHashes;
  public $encodedUpdates;
  public $fullHashes;
  public $threatHits;
  public $threatListUpdates;
  public $threatLists;
  public $threatMatches;

  /**
   * Constructs the internal representation of the Safebrowsing service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://safebrowsing.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v4';
    $this->serviceName = 'safebrowsing';

    $this->encodedFullHashes = new Safebrowsing\Resource\EncodedFullHashes(
        $this,
        $this->serviceName,
        'encodedFullHashes',
        [
          'methods' => [
            'get' => [
              'path' => 'v4/encodedFullHashes/{encodedRequest}',
              'httpMethod' => 'GET',
              'parameters' => [
                'encodedRequest' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->encodedUpdates = new Safebrowsing\Resource\EncodedUpdates(
        $this,
        $this->serviceName,
        'encodedUpdates',
        [
          'methods' => [
            'get' => [
              'path' => 'v4/encodedUpdates/{encodedRequest}',
              'httpMethod' => 'GET',
              'parameters' => [
                'encodedRequest' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->fullHashes = new Safebrowsing\Resource\FullHashes(
        $this,
        $this->serviceName,
        'fullHashes',
        [
          'methods' => [
            'find' => [
              'path' => 'v4/fullHashes:find',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->threatHits = new Safebrowsing\Resource\ThreatHits(
        $this,
        $this->serviceName,
        'threatHits',
        [
          'methods' => [
            'create' => [
              'path' => 'v4/threatHits',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->threatListUpdates = new Safebrowsing\Resource\ThreatListUpdates(
        $this,
        $this->serviceName,
        'threatListUpdates',
        [
          'methods' => [
            'fetch' => [
              'path' => 'v4/threatListUpdates:fetch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->threatLists = new Safebrowsing\Resource\ThreatLists(
        $this,
        $this->serviceName,
        'threatLists',
        [
          'methods' => [
            'list' => [
              'path' => 'v4/threatLists',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->threatMatches = new Safebrowsing\Resource\ThreatMatches(
        $this,
        $this->serviceName,
        'threatMatches',
        [
          'methods' => [
            'find' => [
              'path' => 'v4/threatMatches:find',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Safebrowsing::class, 'Google_Service_Safebrowsing');
