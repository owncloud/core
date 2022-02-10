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
 * Service definition for SearchConsole (v1).
 *
 * <p>
 * The Search Console API provides access to both Search Console data (verified
 * users only) and to public information on an URL basis (anyone)</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/webmaster-tools/search-console-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SearchConsole extends \Google\Service
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
  public $urlInspection_index;
  public $urlTestingTools_mobileFriendlyTest;

  /**
   * Constructs the internal representation of the SearchConsole service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://searchconsole.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'searchconsole';

    $this->searchanalytics = new SearchConsole\Resource\Searchanalytics(
        $this,
        $this->serviceName,
        'searchanalytics',
        [
          'methods' => [
            'query' => [
              'path' => 'webmasters/v3/sites/{siteUrl}/searchAnalytics/query',
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
    $this->sitemaps = new SearchConsole\Resource\Sitemaps(
        $this,
        $this->serviceName,
        'sitemaps',
        [
          'methods' => [
            'delete' => [
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps/{feedpath}',
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
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps/{feedpath}',
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
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps',
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
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps/{feedpath}',
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
    $this->sites = new SearchConsole\Resource\Sites(
        $this,
        $this->serviceName,
        'sites',
        [
          'methods' => [
            'add' => [
              'path' => 'webmasters/v3/sites/{siteUrl}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'webmasters/v3/sites/{siteUrl}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'webmasters/v3/sites/{siteUrl}',
              'httpMethod' => 'GET',
              'parameters' => [
                'siteUrl' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'webmasters/v3/sites',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->urlInspection_index = new SearchConsole\Resource\UrlInspectionIndex(
        $this,
        $this->serviceName,
        'index',
        [
          'methods' => [
            'inspect' => [
              'path' => 'v1/urlInspection/index:inspect',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->urlTestingTools_mobileFriendlyTest = new SearchConsole\Resource\UrlTestingToolsMobileFriendlyTest(
        $this,
        $this->serviceName,
        'mobileFriendlyTest',
        [
          'methods' => [
            'run' => [
              'path' => 'v1/urlTestingTools/mobileFriendlyTest:run',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchConsole::class, 'Google_Service_SearchConsole');
