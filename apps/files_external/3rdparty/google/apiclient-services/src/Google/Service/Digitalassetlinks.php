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
class Google_Service_Digitalassetlinks extends Google_Service
{


  public $assetlinks;
  public $statements;
  
  /**
   * Constructs the internal representation of the Digitalassetlinks service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://digitalassetlinks.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'digitalassetlinks';

    $this->assetlinks = new Google_Service_Digitalassetlinks_Resource_Assetlinks(
        $this,
        $this->serviceName,
        'assetlinks',
        array(
          'methods' => array(
            'check' => array(
              'path' => 'v1/assetlinks:check',
              'httpMethod' => 'GET',
              'parameters' => array(
                'relation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'target.web.site' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'target.androidApp.certificate.sha256Fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source.web.site' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source.androidApp.certificate.sha256Fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source.androidApp.packageName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'target.androidApp.packageName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->statements = new Google_Service_Digitalassetlinks_Resource_Statements(
        $this,
        $this->serviceName,
        'statements',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/statements:list',
              'httpMethod' => 'GET',
              'parameters' => array(
                'source.androidApp.packageName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source.androidApp.certificate.sha256Fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source.web.site' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'relation' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
