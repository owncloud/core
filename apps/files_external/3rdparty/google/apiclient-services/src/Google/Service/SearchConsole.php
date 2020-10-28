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
class Google_Service_SearchConsole extends Google_Service
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
  public $urlTestingTools_mobileFriendlyTest;
  
  /**
   * Constructs the internal representation of the SearchConsole service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://searchconsole.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'searchconsole';

    $this->searchanalytics = new Google_Service_SearchConsole_Resource_Searchanalytics(
        $this,
        $this->serviceName,
        'searchanalytics',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}/searchAnalytics/query',
              'httpMethod' => 'POST',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->sitemaps = new Google_Service_SearchConsole_Resource_Sitemaps(
        $this,
        $this->serviceName,
        'sitemaps',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedpath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedpath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sitemapIndex' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'submit' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedpath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->sites = new Google_Service_SearchConsole_Resource_Sites(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'add' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'webmasters/v3/sites/{siteUrl}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'webmasters/v3/sites',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->urlTestingTools_mobileFriendlyTest = new Google_Service_SearchConsole_Resource_UrlTestingToolsMobileFriendlyTest(
        $this,
        $this->serviceName,
        'mobileFriendlyTest',
        array(
          'methods' => array(
            'run' => array(
              'path' => 'v1/urlTestingTools/mobileFriendlyTest:run',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
