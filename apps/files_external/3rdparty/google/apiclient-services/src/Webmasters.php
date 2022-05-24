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
 * Service definition for Webmasters (v3).
 *
 * <p>
 * View Google Search Console data for your verified sites.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/webmaster-tools/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Webmasters extends \Google\Service
{
  /** View and manage Search Console data for your verified sites. */
  const WEBMASTERS =
      "https://www.googleapis.com/auth/webmasters";
  /** View Search Console data for your verified sites. */
  const WEBMASTERS_READONLY =
      "https://www.googleapis.com/auth/webmasters.readonly";

  public $searchanalytics;
  public $sitemaps;
  public $sites;

  /**
   * Constructs the internal representation of the Webmasters service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'webmasters/v3/';
    $this->batchPath = 'batch/webmasters/v3';
    $this->version = 'v3';
    $this->serviceName = 'webmasters';

    $this->searchanalytics = new Webmasters\Resource\Searchanalytics(
        $this,
        $this->serviceName,
        'searchanalytics',
        [
          'methods' => [
            'query' => [
              'path' => 'sites/{siteUrl}/searchAnalytics/query',
              'httpMethod' => 'POST',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->sitemaps = new Webmasters\Resource\Sitemaps(
        $this,
        $this->serviceName,
        'sitemaps',
        [
          'methods' => [
            'delete' => [
              'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'feedpath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'GET',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'feedpath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'sites/{siteUrl}/sitemaps',
              'httpMethod' => 'GET',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sitemapIndex' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'submit' => [
              'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'feedpath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->sites = new Webmasters\Resource\Sites(
        $this,
        $this->serviceName,
        'sites',
        [
          'methods' => [
            'add' => [
              'path' => 'sites/{siteUrl}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'sites/{siteUrl}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'sites/{siteUrl}',
              'httpMethod' => 'GET',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'sites',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Webmasters::class, 'Google_Service_Webmasters');
