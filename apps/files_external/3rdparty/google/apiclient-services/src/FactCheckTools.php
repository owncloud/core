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
 * Service definition for FactCheckTools (v1alpha1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fact-check/tools/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class FactCheckTools extends \Google\Service
{
  /** See your primary Google Account email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $claims;
  public $pages;

  /**
   * Constructs the internal representation of the FactCheckTools service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://factchecktools.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1alpha1';
    $this->serviceName = 'factchecktools';

    $this->claims = new FactCheckTools\Resource\Claims(
        $this,
        $this->serviceName,
        'claims',
        [
          'methods' => [
            'search' => [
              'path' => 'v1alpha1/claims:search',
              'httpMethod' => 'GET',
              'parameters' => [
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAgeDays' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'offset' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'reviewPublisherSiteFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->pages = new FactCheckTools\Resource\Pages(
        $this,
        $this->serviceName,
        'pages',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha1/pages',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1alpha1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha1/pages',
              'httpMethod' => 'GET',
              'parameters' => [
                'offset' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'organization' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'url' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v1alpha1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
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
class_alias(FactCheckTools::class, 'Google_Service_FactCheckTools');
