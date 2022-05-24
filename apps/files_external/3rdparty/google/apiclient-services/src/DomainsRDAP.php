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
class DomainsRDAP extends \Google\Service
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
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://domainsrdap.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'domainsrdap';

    $this->autnum = new DomainsRDAP\Resource\Autnum(
        $this,
        $this->serviceName,
        'autnum',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/autnum/{autnumId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'autnumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->domain = new DomainsRDAP\Resource\Domain(
        $this,
        $this->serviceName,
        'domain',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/domain/{+domainName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'domainName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->entity = new DomainsRDAP\Resource\Entity(
        $this,
        $this->serviceName,
        'entity',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/entity/{entityId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'entityId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->ip = new DomainsRDAP\Resource\Ip(
        $this,
        $this->serviceName,
        'ip',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/ip/{ipId}/{ipId1}',
              'httpMethod' => 'GET',
              'parameters' => [
                'ipId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ipId1' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->nameserver = new DomainsRDAP\Resource\Nameserver(
        $this,
        $this->serviceName,
        'nameserver',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/nameserver/{nameserverId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'nameserverId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->v1 = new DomainsRDAP\Resource\V1(
        $this,
        $this->serviceName,
        'v1',
        [
          'methods' => [
            'getDomains' => [
              'path' => 'v1/domains',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'getEntities' => [
              'path' => 'v1/entities',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'getHelp' => [
              'path' => 'v1/help',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'getIp' => [
              'path' => 'v1/ip',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'getNameservers' => [
              'path' => 'v1/nameservers',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DomainsRDAP::class, 'Google_Service_DomainsRDAP');
