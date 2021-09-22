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
 * Service definition for CustomSearchAPI (v1).
 *
 * <p>
 * Searches over a website or collection of websites</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/custom-search/v1/introduction" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CustomSearchAPI extends \Google\Service
{


  public $cse;
  public $cse_siterestrict;

  /**
   * Constructs the internal representation of the CustomSearchAPI service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://customsearch.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'customsearch';

    $this->cse = new CustomSearchAPI\Resource\Cse(
        $this,
        $this->serviceName,
        'cse',
        [
          'methods' => [
            'list' => [
              'path' => 'customsearch/v1',
              'httpMethod' => 'GET',
              'parameters' => [
                'c2coff' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'cr' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'cx' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dateRestrict' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'exactTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'excludeTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fileType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'gl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'googlehost' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'highRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hq' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgColorType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgDominantColor' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgSize' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'linkSite' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'lowRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'lr' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'num' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'relatedSite' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'rights' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'safe' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteSearch' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteSearchFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'start' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->cse_siterestrict = new CustomSearchAPI\Resource\CseSiterestrict(
        $this,
        $this->serviceName,
        'siterestrict',
        [
          'methods' => [
            'list' => [
              'path' => 'customsearch/v1/siterestrict',
              'httpMethod' => 'GET',
              'parameters' => [
                'c2coff' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'cr' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'cx' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dateRestrict' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'exactTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'excludeTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fileType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'gl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'googlehost' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'highRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hq' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgColorType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgDominantColor' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgSize' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'imgType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'linkSite' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'lowRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'lr' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'num' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'relatedSite' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'rights' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'safe' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteSearch' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteSearchFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'start' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomSearchAPI::class, 'Google_Service_CustomSearchAPI');
