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
 * Service definition for PostmasterTools (v1beta1).
 *
 * <p>
 * The Postmaster Tools API is a RESTful API that provides programmatic access
 * to email traffic metrics (like spam reports, delivery errors etc) otherwise
 * available through the Gmail Postmaster Tools UI currently.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/gmail/postmaster" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_PostmasterTools extends Google_Service
{
  /** See email traffic metrics for the domains you have registered in Gmail Postmaster Tools. */
  const POSTMASTER_READONLY =
      "https://www.googleapis.com/auth/postmaster.readonly";

  public $domains;
  public $domains_trafficStats;
  
  /**
   * Constructs the internal representation of the PostmasterTools service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://gmailpostmastertools.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'gmailpostmastertools';

    $this->domains = new Google_Service_PostmasterTools_Resource_Domains(
        $this,
        $this->serviceName,
        'domains',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/domains',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->domains_trafficStats = new Google_Service_PostmasterTools_Resource_DomainsTrafficStats(
        $this,
        $this->serviceName,
        'trafficStats',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+parent}/trafficStats',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}
