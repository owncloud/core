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
 * Service definition for Dns (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/dns/docs" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Dns extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud services and see the email address of your Google Account. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** View your DNS records hosted by Google Cloud DNS. */
  const NDEV_CLOUDDNS_READONLY =
      "https://www.googleapis.com/auth/ndev.clouddns.readonly";
  /** View and manage your DNS records hosted by Google Cloud DNS. */
  const NDEV_CLOUDDNS_READWRITE =
      "https://www.googleapis.com/auth/ndev.clouddns.readwrite";

  public $changes;
  public $dnsKeys;
  public $managedZoneOperations;
  public $managedZones;
  public $policies;
  public $projects;
  public $resourceRecordSets;
  public $responsePolicies;
  public $responsePolicyRules;

  /**
   * Constructs the internal representation of the Dns service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://dns.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'dns';

    $this->changes = new Dns\Resource\Changes(
        $this,
        $this->serviceName,
        'changes',
        [
          'methods' => [
            'create' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/changes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/changes/{changeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'changeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/changes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->dnsKeys = new Dns\Resource\DnsKeys(
        $this,
        $this->serviceName,
        'dnsKeys',
        [
          'methods' => [
            'get' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/dnsKeys/{dnsKeyId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dnsKeyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'digestType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/dnsKeys',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'digestType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->managedZoneOperations = new Dns\Resource\ManagedZoneOperations(
        $this,
        $this->serviceName,
        'managedZoneOperations',
        [
          'methods' => [
            'get' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->managedZones = new Dns\Resource\ManagedZones(
        $this,
        $this->serviceName,
        'managedZones',
        [
          'methods' => [
            'create' => [
              'path' => 'dns/v1/projects/{project}/managedZones',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'dns/v1/{+resource}:getIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/managedZones',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dnsName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'dns/v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'dns/v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->policies = new Dns\Resource\Policies(
        $this,
        $this->serviceName,
        'policies',
        [
          'methods' => [
            'create' => [
              'path' => 'dns/v1/projects/{project}/policies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'policy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'policy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/policies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'policy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'policy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects = new Dns\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'get' => [
              'path' => 'dns/v1/projects/{project}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->resourceRecordSets = new Dns\Resource\ResourceRecordSets(
        $this,
        $this->serviceName,
        'resourceRecordSets',
        [
          'methods' => [
            'create' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets/{name}/{type}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets/{name}/{type}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets/{name}/{type}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedZone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->responsePolicies = new Dns\Resource\ResponsePolicies(
        $this,
        $this->serviceName,
        'responsePolicies',
        [
          'methods' => [
            'create' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->responsePolicyRules = new Dns\Resource\ResponsePolicyRules(
        $this,
        $this->serviceName,
        'responsePolicyRules',
        [
          'methods' => [
            'create' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}/rules',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}/rules/{responsePolicyRule}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicyRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}/rules/{responsePolicyRule}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicyRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}/rules',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}/rules/{responsePolicyRule}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicyRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'dns/v1/projects/{project}/responsePolicies/{responsePolicy}/rules/{responsePolicyRule}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responsePolicyRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientOperationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Dns::class, 'Google_Service_Dns');
