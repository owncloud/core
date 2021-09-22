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
 * Service definition for SiteVerification (v1).
 *
 * <p>
 * Verifies ownership of websites or domains with Google.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/site-verification/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SiteVerification extends \Google\Service
{
  /** Manage the list of sites and domains you control. */
  const SITEVERIFICATION =
      "https://www.googleapis.com/auth/siteverification";
  /** Manage your new site verifications with Google. */
  const SITEVERIFICATION_VERIFY_ONLY =
      "https://www.googleapis.com/auth/siteverification.verify_only";

  public $webResource;

  /**
   * Constructs the internal representation of the SiteVerification service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'siteVerification/v1/';
    $this->batchPath = 'batch/siteVerification/v1';
    $this->version = 'v1';
    $this->serviceName = 'siteVerification';

    $this->webResource = new SiteVerification\Resource\WebResource(
        $this,
        $this->serviceName,
        'webResource',
        [
          'methods' => [
            'delete' => [
              'path' => 'webResource/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'webResource/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getToken' => [
              'path' => 'token',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'insert' => [
              'path' => 'webResource',
              'httpMethod' => 'POST',
              'parameters' => [
                'verificationMethod' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'webResource',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'patch' => [
              'path' => 'webResource/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'webResource/{id}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'id' => [
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
class_alias(SiteVerification::class, 'Google_Service_SiteVerification');
