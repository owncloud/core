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
 * Service definition for DomainsRDAP (v1).
 *
 * <p>
 * Read-only public API that lets users search for information about domain
 * names.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/domains/rdap/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_DomainsRDAP extends Google_Service
{


  public $autnum;
  public $domain;
  public $entity;
  public $ip;
  public $nameserver;
  public $v1;

  /**
   * Constructs the internal representation of the DomainsRDAP service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://domainsrdap.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'domainsrdap';

    $this->autnum = new Google_Service_DomainsRDAP_Resource_Autnum(
        $this,
        $this->serviceName,
        'autnum',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/autnum/{autnumId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'autnumId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->domain = new Google_Service_DomainsRDAP_Resource_Domain(
        $this,
        $this->serviceName,
        'domain',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/domain/{+domainName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'domainName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->entity = new Google_Service_DomainsRDAP_Resource_Entity(
        $this,
        $this->serviceName,
        'entity',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/entity/{entityId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'entityId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->ip = new Google_Service_DomainsRDAP_Resource_Ip(
        $this,
        $this->serviceName,
        'ip',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/ip/{ipId}/{ipId1}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'ipId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ipId1' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->nameserver = new Google_Service_DomainsRDAP_Resource_Nameserver(
        $this,
        $this->serviceName,
        'nameserver',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/nameserver/{nameserverId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'nameserverId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->v1 = new Google_Service_DomainsRDAP_Resource_V1(
        $this,
        $this->serviceName,
        'v1',
        array(
          'methods' => array(
            'getDomains' => array(
              'path' => 'v1/domains',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'getEntities' => array(
              'path' => 'v1/entities',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'getHelp' => array(
              'path' => 'v1/help',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'getIp' => array(
              'path' => 'v1/ip',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'getNameservers' => array(
              'path' => 'v1/nameservers',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
