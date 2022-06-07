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
 * Service definition for Compute (v1).
 *
 * <p>
 * Creates and runs virtual machines on Google Cloud Platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/compute/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Compute extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Compute Engine resources. */
  const COMPUTE =
      "https://www.googleapis.com/auth/compute";
  /** View your Google Compute Engine resources. */
  const COMPUTE_READONLY =
      "https://www.googleapis.com/auth/compute.readonly";
  /** Manage your data and permissions in Cloud Storage and see the email address for your Google Account. */
  const DEVSTORAGE_FULL_CONTROL =
      "https://www.googleapis.com/auth/devstorage.full_control";
  /** View your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_ONLY =
      "https://www.googleapis.com/auth/devstorage.read_only";
  /** Manage your data in Cloud Storage and see the email address of your Google Account. */
  const DEVSTORAGE_READ_WRITE =
      "https://www.googleapis.com/auth/devstorage.read_write";

  public $acceleratorTypes;
  public $addresses;
  public $autoscalers;
  public $backendBuckets;
  public $backendServices;
  public $diskTypes;
  public $disks;
  public $externalVpnGateways;
  public $firewallPolicies;
  public $firewalls;
  public $forwardingRules;
  public $globalAddresses;
  public $globalForwardingRules;
  public $globalNetworkEndpointGroups;
  public $globalOperations;
  public $globalOrganizationOperations;
  public $globalPublicDelegatedPrefixes;
  public $healthChecks;
  public $httpHealthChecks;
  public $httpsHealthChecks;
  public $imageFamilyViews;
  public $images;
  public $instanceGroupManagers;
  public $instanceGroups;
  public $instanceTemplates;
  public $instances;
  public $interconnectAttachments;
  public $interconnectLocations;
  public $interconnects;
  public $licenseCodes;
  public $licenses;
  public $machineImages;
  public $machineTypes;
  public $networkEdgeSecurityServices;
  public $networkEndpointGroups;
  public $networkFirewallPolicies;
  public $networks;
  public $nodeGroups;
  public $nodeTemplates;
  public $nodeTypes;
  public $packetMirrorings;
  public $projects;
  public $publicAdvertisedPrefixes;
  public $publicDelegatedPrefixes;
  public $regionAutoscalers;
  public $regionBackendServices;
  public $regionCommitments;
  public $regionDiskTypes;
  public $regionDisks;
  public $regionHealthCheckServices;
  public $regionHealthChecks;
  public $regionInstanceGroupManagers;
  public $regionInstanceGroups;
  public $regionInstances;
  public $regionNetworkEndpointGroups;
  public $regionNetworkFirewallPolicies;
  public $regionNotificationEndpoints;
  public $regionOperations;
  public $regionSecurityPolicies;
  public $regionSslCertificates;
  public $regionTargetHttpProxies;
  public $regionTargetHttpsProxies;
  public $regionUrlMaps;
  public $regions;
  public $reservations;
  public $resourcePolicies;
  public $routers;
  public $routes;
  public $securityPolicies;
  public $serviceAttachments;
  public $snapshots;
  public $sslCertificates;
  public $sslPolicies;
  public $subnetworks;
  public $targetGrpcProxies;
  public $targetHttpProxies;
  public $targetHttpsProxies;
  public $targetInstances;
  public $targetPools;
  public $targetSslProxies;
  public $targetTcpProxies;
  public $targetVpnGateways;
  public $urlMaps;
  public $vpnGateways;
  public $vpnTunnels;
  public $zoneOperations;
  public $zones;

  /**
   * Constructs the internal representation of the Compute service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://compute.googleapis.com/';
    $this->servicePath = 'compute/v1/';
    $this->batchPath = 'batch/compute/v1';
    $this->version = 'v1';
    $this->serviceName = 'compute';

    $this->acceleratorTypes = new Compute\Resource\AcceleratorTypes(
        $this,
        $this->serviceName,
        'acceleratorTypes',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/acceleratorTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/acceleratorTypes/{acceleratorType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acceleratorType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/acceleratorTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->addresses = new Compute\Resource\Addresses(
        $this,
        $this->serviceName,
        'addresses',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/addresses',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/addresses/{address}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'address' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/addresses/{address}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'address' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/addresses',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/addresses',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->autoscalers = new Compute\Resource\Autoscalers(
        $this,
        $this->serviceName,
        'autoscalers',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/autoscalers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/autoscalers',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/autoscalers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/zones/{zone}/autoscalers',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/zones/{zone}/autoscalers',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->backendBuckets = new Compute\Resource\BackendBuckets(
        $this,
        $this->serviceName,
        'backendBuckets',
        [
          'methods' => [
            'addSignedUrlKey' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}/addSignedUrlKey',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteSignedUrlKey' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}/deleteSignedUrlKey',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'keyName' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/backendBuckets',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/backendBuckets',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setEdgeSecurityPolicy' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}/setEdgeSecurityPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/backendBuckets/{backendBucket}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendBucket' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->backendServices = new Compute\Resource\BackendServices(
        $this,
        $this->serviceName,
        'backendServices',
        [
          'methods' => [
            'addSignedUrlKey' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}/addSignedUrlKey',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/backendServices',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteSignedUrlKey' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}/deleteSignedUrlKey',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'keyName' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getHealth' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}/getHealth',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/backendServices',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/backendServices',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setEdgeSecurityPolicy' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}/setEdgeSecurityPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setSecurityPolicy' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}/setSecurityPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/backendServices/{backendService}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->diskTypes = new Compute\Resource\DiskTypes(
        $this,
        $this->serviceName,
        'diskTypes',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/diskTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/diskTypes/{diskType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'diskType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/diskTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->disks = new Compute\Resource\Disks(
        $this,
        $this->serviceName,
        'disks',
        [
          'methods' => [
            'addResourcePolicies' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{disk}/addResourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/disks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'createSnapshot' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{disk}/createSnapshot',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'guestFlush' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{disk}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{disk}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/disks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceImage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/disks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'removeResourcePolicies' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{disk}/removeResourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'resize' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{disk}/resize',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/zones/{zone}/disks/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->externalVpnGateways = new Compute\Resource\ExternalVpnGateways(
        $this,
        $this->serviceName,
        'externalVpnGateways',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/externalVpnGateways/{externalVpnGateway}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'externalVpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/externalVpnGateways/{externalVpnGateway}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'externalVpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/externalVpnGateways',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/externalVpnGateways',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/global/externalVpnGateways/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/externalVpnGateways/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->firewallPolicies = new Compute\Resource\FirewallPolicies(
        $this,
        $this->serviceName,
        'firewallPolicies',
        [
          'methods' => [
            'addAssociation' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/addAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replaceExistingAssociation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'addRule' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/addRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'cloneRules' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/cloneRules',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceFirewallPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getAssociation' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/getAssociation',
              'httpMethod' => 'GET',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'locations/global/firewallPolicies/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getRule' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/getRule',
              'httpMethod' => 'GET',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'locations/global/firewallPolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'locations/global/firewallPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listAssociations' => [
              'path' => 'locations/global/firewallPolicies/listAssociations',
              'httpMethod' => 'GET',
              'parameters' => [
                'targetResource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'move' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/move',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patchRule' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/patchRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeAssociation' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/removeAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeRule' => [
              'path' => 'locations/global/firewallPolicies/{firewallPolicy}/removeRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'locations/global/firewallPolicies/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'locations/global/firewallPolicies/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->firewalls = new Compute\Resource\Firewalls(
        $this,
        $this->serviceName,
        'firewalls',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/firewalls/{firewall}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewall' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/firewalls/{firewall}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewall' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/firewalls',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/firewalls',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/firewalls/{firewall}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewall' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/firewalls/{firewall}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewall' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->forwardingRules = new Compute\Resource\ForwardingRules(
        $this,
        $this->serviceName,
        'forwardingRules',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/forwardingRules',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules/{forwardingRule}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules/{forwardingRule}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules/{forwardingRule}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setTarget' => [
              'path' => 'projects/{project}/regions/{region}/forwardingRules/{forwardingRule}/setTarget',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->globalAddresses = new Compute\Resource\GlobalAddresses(
        $this,
        $this->serviceName,
        'globalAddresses',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/addresses/{address}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'address' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/addresses/{address}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'address' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/addresses',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/addresses',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->globalForwardingRules = new Compute\Resource\GlobalForwardingRules(
        $this,
        $this->serviceName,
        'globalForwardingRules',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/forwardingRules/{forwardingRule}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/forwardingRules/{forwardingRule}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/forwardingRules',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/forwardingRules',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/forwardingRules/{forwardingRule}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/global/forwardingRules/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setTarget' => [
              'path' => 'projects/{project}/global/forwardingRules/{forwardingRule}/setTarget',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingRule' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->globalNetworkEndpointGroups = new Compute\Resource\GlobalNetworkEndpointGroups(
        $this,
        $this->serviceName,
        'globalNetworkEndpointGroups',
        [
          'methods' => [
            'attachNetworkEndpoints' => [
              'path' => 'projects/{project}/global/networkEndpointGroups/{networkEndpointGroup}/attachNetworkEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/networkEndpointGroups/{networkEndpointGroup}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'detachNetworkEndpoints' => [
              'path' => 'projects/{project}/global/networkEndpointGroups/{networkEndpointGroup}/detachNetworkEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/networkEndpointGroups/{networkEndpointGroup}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/networkEndpointGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/networkEndpointGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listNetworkEndpoints' => [
              'path' => 'projects/{project}/global/networkEndpointGroups/{networkEndpointGroup}/listNetworkEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->globalOperations = new Compute\Resource\GlobalOperations(
        $this,
        $this->serviceName,
        'globalOperations',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'wait' => [
              'path' => 'projects/{project}/global/operations/{operation}/wait',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->globalOrganizationOperations = new Compute\Resource\GlobalOrganizationOperations(
        $this,
        $this->serviceName,
        'globalOrganizationOperations',
        [
          'methods' => [
            'delete' => [
              'path' => 'locations/global/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'locations/global/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'locations/global/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->globalPublicDelegatedPrefixes = new Compute\Resource\GlobalPublicDelegatedPrefixes(
        $this,
        $this->serviceName,
        'globalPublicDelegatedPrefixes',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/publicDelegatedPrefixes/{publicDelegatedPrefix}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicDelegatedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/publicDelegatedPrefixes/{publicDelegatedPrefix}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicDelegatedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/publicDelegatedPrefixes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/publicDelegatedPrefixes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/publicDelegatedPrefixes/{publicDelegatedPrefix}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicDelegatedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->healthChecks = new Compute\Resource\HealthChecks(
        $this,
        $this->serviceName,
        'healthChecks',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/healthChecks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/healthChecks/{healthCheck}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/healthChecks/{healthCheck}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/healthChecks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/healthChecks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/healthChecks/{healthCheck}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/healthChecks/{healthCheck}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->httpHealthChecks = new Compute\Resource\HttpHealthChecks(
        $this,
        $this->serviceName,
        'httpHealthChecks',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/httpHealthChecks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/httpHealthChecks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->httpsHealthChecks = new Compute\Resource\HttpsHealthChecks(
        $this,
        $this->serviceName,
        'httpsHealthChecks',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/httpsHealthChecks/{httpsHealthCheck}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpsHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/httpsHealthChecks/{httpsHealthCheck}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpsHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/httpsHealthChecks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/httpsHealthChecks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/httpsHealthChecks/{httpsHealthCheck}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpsHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/httpsHealthChecks/{httpsHealthCheck}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'httpsHealthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->imageFamilyViews = new Compute\Resource\ImageFamilyViews(
        $this,
        $this->serviceName,
        'imageFamilyViews',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/zones/{zone}/imageFamilyViews/{family}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'family' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->images = new Compute\Resource\Images(
        $this,
        $this->serviceName,
        'images',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/images/{image}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'image' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deprecate' => [
              'path' => 'projects/{project}/global/images/{image}/deprecate',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'image' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/images/{image}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'image' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getFromFamily' => [
              'path' => 'projects/{project}/global/images/family/{family}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'family' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/global/images/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/images',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forceCreate' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/images',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/images/{image}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'image' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/global/images/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/global/images/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/images/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->instanceGroupManagers = new Compute\Resource\InstanceGroupManagers(
        $this,
        $this->serviceName,
        'instanceGroupManagers',
        [
          'methods' => [
            'abandonInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/abandonInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/instanceGroupManagers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'applyUpdatesToInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/applyUpdatesToInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/createInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/deleteInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deletePerInstanceConfigs' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/deletePerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listErrors' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/listErrors',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listManagedInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/listManagedInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listPerInstanceConfigs' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/listPerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patchPerInstanceConfigs' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/patchPerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'recreateInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/recreateInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'resize' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/resize',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'size' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setInstanceTemplate' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/setInstanceTemplate',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setTargetPools' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/setTargetPools',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updatePerInstanceConfigs' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/updatePerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->instanceGroups = new Compute\Resource\InstanceGroups(
        $this,
        $this->serviceName,
        'instanceGroups',
        [
          'methods' => [
            'addInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups/{instanceGroup}/addInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/instanceGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups/{instanceGroup}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups/{instanceGroup}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups/{instanceGroup}/listInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'removeInstances' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups/{instanceGroup}/removeInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setNamedPorts' => [
              'path' => 'projects/{project}/zones/{zone}/instanceGroups/{instanceGroup}/setNamedPorts',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->instanceTemplates = new Compute\Resource\InstanceTemplates(
        $this,
        $this->serviceName,
        'instanceTemplates',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/instanceTemplates/{instanceTemplate}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceTemplate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/instanceTemplates/{instanceTemplate}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceTemplate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/global/instanceTemplates/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/instanceTemplates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/instanceTemplates',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/global/instanceTemplates/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/instanceTemplates/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->instances = new Compute\Resource\Instances(
        $this,
        $this->serviceName,
        'instances',
        [
          'methods' => [
            'addAccessConfig' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/addAccessConfig',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkInterface' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'addResourcePolicies' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/addResourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/instances',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'attachDisk' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/attachDisk',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forceAttach' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'bulkInsert' => [
              'path' => 'projects/{project}/zones/{zone}/instances/bulkInsert',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteAccessConfig' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/deleteAccessConfig',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accessConfig' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkInterface' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'detachDisk' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/detachDisk',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceName' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getEffectiveFirewalls' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/getEffectiveFirewalls',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkInterface' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getGuestAttributes' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/getGuestAttributes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'queryPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'variableKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getScreenshot' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/screenshot',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getSerialPortOutput' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/serialPort',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'port' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getShieldedInstanceIdentity' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/getShieldedInstanceIdentity',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/instances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceInstanceTemplate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceMachineImage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/instances',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listReferrers' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/referrers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'removeResourcePolicies' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/removeResourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'reset' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/reset',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'resume' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/resume',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'sendDiagnosticInterrupt' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/sendDiagnosticInterrupt',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setDeletionProtection' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{resource}/setDeletionProtection',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deletionProtection' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setDiskAutoDelete' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setDiskAutoDelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoDelete' => [
                  'location' => 'query',
                  'type' => 'boolean',
                  'required' => true,
                ],
                'deviceName' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setMachineResources' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setMachineResources',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setMachineType' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setMachineType',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setMetadata' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setMetadata',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setMinCpuPlatform' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setMinCpuPlatform',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setScheduling' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setScheduling',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setServiceAccount' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setServiceAccount',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setShieldedInstanceIntegrityPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setShieldedInstanceIntegrityPolicy',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setTags' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/setTags',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'simulateMaintenanceEvent' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/simulateMaintenanceEvent',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'start' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/start',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'startWithEncryptionKey' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/startWithEncryptionKey',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'stop' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/stop',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'suspend' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/suspend',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'minimalAction' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'mostDisruptiveAllowedAction' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateAccessConfig' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/updateAccessConfig',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkInterface' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateDisplayDevice' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/updateDisplayDevice',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateNetworkInterface' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/updateNetworkInterface',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkInterface' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateShieldedInstanceConfig' => [
              'path' => 'projects/{project}/zones/{zone}/instances/{instance}/updateShieldedInstanceConfig',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->interconnectAttachments = new Compute\Resource\InterconnectAttachments(
        $this,
        $this->serviceName,
        'interconnectAttachments',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/interconnectAttachments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/interconnectAttachments/{interconnectAttachment}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnectAttachment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/interconnectAttachments/{interconnectAttachment}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnectAttachment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/interconnectAttachments',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/interconnectAttachments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/interconnectAttachments/{interconnectAttachment}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnectAttachment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->interconnectLocations = new Compute\Resource\InterconnectLocations(
        $this,
        $this->serviceName,
        'interconnectLocations',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/global/interconnectLocations/{interconnectLocation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnectLocation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/interconnectLocations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->interconnects = new Compute\Resource\Interconnects(
        $this,
        $this->serviceName,
        'interconnects',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/interconnects/{interconnect}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnect' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/interconnects/{interconnect}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnect' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getDiagnostics' => [
              'path' => 'projects/{project}/global/interconnects/{interconnect}/getDiagnostics',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnect' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/interconnects',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/interconnects',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/interconnects/{interconnect}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'interconnect' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->licenseCodes = new Compute\Resource\LicenseCodes(
        $this,
        $this->serviceName,
        'licenseCodes',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/global/licenseCodes/{licenseCode}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'licenseCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/licenseCodes/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->licenses = new Compute\Resource\Licenses(
        $this,
        $this->serviceName,
        'licenses',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/licenses/{license}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'license' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/licenses/{license}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'license' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/global/licenses/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/licenses',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/licenses',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/global/licenses/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/licenses/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->machineImages = new Compute\Resource\MachineImages(
        $this,
        $this->serviceName,
        'machineImages',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/machineImages/{machineImage}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'machineImage' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/machineImages/{machineImage}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'machineImage' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/global/machineImages/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/machineImages',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceInstance' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/machineImages',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/global/machineImages/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/machineImages/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->machineTypes = new Compute\Resource\MachineTypes(
        $this,
        $this->serviceName,
        'machineTypes',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/machineTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/machineTypes/{machineType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'machineType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/machineTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->networkEdgeSecurityServices = new Compute\Resource\NetworkEdgeSecurityServices(
        $this,
        $this->serviceName,
        'networkEdgeSecurityServices',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/networkEdgeSecurityServices',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/networkEdgeSecurityServices/{networkEdgeSecurityService}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEdgeSecurityService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/networkEdgeSecurityServices/{networkEdgeSecurityService}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEdgeSecurityService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/networkEdgeSecurityServices',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/networkEdgeSecurityServices/{networkEdgeSecurityService}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEdgeSecurityService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'paths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->networkEndpointGroups = new Compute\Resource\NetworkEndpointGroups(
        $this,
        $this->serviceName,
        'networkEndpointGroups',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/networkEndpointGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'attachNetworkEndpoints' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups/{networkEndpointGroup}/attachNetworkEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups/{networkEndpointGroup}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'detachNetworkEndpoints' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups/{networkEndpointGroup}/detachNetworkEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups/{networkEndpointGroup}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listNetworkEndpoints' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups/{networkEndpointGroup}/listNetworkEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/zones/{zone}/networkEndpointGroups/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->networkFirewallPolicies = new Compute\Resource\NetworkFirewallPolicies(
        $this,
        $this->serviceName,
        'networkFirewallPolicies',
        [
          'methods' => [
            'addAssociation' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/addAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replaceExistingAssociation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'addRule' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/addRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxPriority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'minPriority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'cloneRules' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/cloneRules',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceFirewallPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getAssociation' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/getAssociation',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/global/firewallPolicies/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getRule' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/getRule',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/firewallPolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/firewallPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patchRule' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/patchRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeAssociation' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/removeAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeRule' => [
              'path' => 'projects/{project}/global/firewallPolicies/{firewallPolicy}/removeRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/global/firewallPolicies/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/firewallPolicies/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->networks = new Compute\Resource\Networks(
        $this,
        $this->serviceName,
        'networks',
        [
          'methods' => [
            'addPeering' => [
              'path' => 'projects/{project}/global/networks/{network}/addPeering',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/networks/{network}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/networks/{network}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getEffectiveFirewalls' => [
              'path' => 'projects/{project}/global/networks/{network}/getEffectiveFirewalls',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/networks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/networks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listPeeringRoutes' => [
              'path' => 'projects/{project}/global/networks/{network}/listPeeringRoutes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'direction' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'peeringName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'region' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/networks/{network}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removePeering' => [
              'path' => 'projects/{project}/global/networks/{network}/removePeering',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'switchToCustomMode' => [
              'path' => 'projects/{project}/global/networks/{network}/switchToCustomMode',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updatePeering' => [
              'path' => 'projects/{project}/global/networks/{network}/updatePeering',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->nodeGroups = new Compute\Resource\NodeGroups(
        $this,
        $this->serviceName,
        'nodeGroups',
        [
          'methods' => [
            'addNodes' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}/addNodes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/nodeGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteNodes' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}/deleteNodes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'initialNodeCount' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listNodes' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}/listNodes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setNodeTemplate' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{nodeGroup}/setNodeTemplate',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/zones/{zone}/nodeGroups/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->nodeTemplates = new Compute\Resource\NodeTemplates(
        $this,
        $this->serviceName,
        'nodeTemplates',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/nodeTemplates',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates/{nodeTemplate}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeTemplate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates/{nodeTemplate}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeTemplate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/nodeTemplates/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->nodeTypes = new Compute\Resource\NodeTypes(
        $this,
        $this->serviceName,
        'nodeTypes',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/nodeTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/nodeTypes/{nodeType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'nodeType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/nodeTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->packetMirrorings = new Compute\Resource\PacketMirrorings(
        $this,
        $this->serviceName,
        'packetMirrorings',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/packetMirrorings',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/packetMirrorings/{packetMirroring}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'packetMirroring' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/packetMirrorings/{packetMirroring}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'packetMirroring' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/packetMirrorings',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/packetMirrorings',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/packetMirrorings/{packetMirroring}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'packetMirroring' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/packetMirrorings/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects = new Compute\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'disableXpnHost' => [
              'path' => 'projects/{project}/disableXpnHost',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'disableXpnResource' => [
              'path' => 'projects/{project}/disableXpnResource',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'enableXpnHost' => [
              'path' => 'projects/{project}/enableXpnHost',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'enableXpnResource' => [
              'path' => 'projects/{project}/enableXpnResource',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getXpnHost' => [
              'path' => 'projects/{project}/getXpnHost',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getXpnResources' => [
              'path' => 'projects/{project}/getXpnResources',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listXpnHosts' => [
              'path' => 'projects/{project}/listXpnHosts',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'moveDisk' => [
              'path' => 'projects/{project}/moveDisk',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'moveInstance' => [
              'path' => 'projects/{project}/moveInstance',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setCommonInstanceMetadata' => [
              'path' => 'projects/{project}/setCommonInstanceMetadata',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setDefaultNetworkTier' => [
              'path' => 'projects/{project}/setDefaultNetworkTier',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setUsageExportBucket' => [
              'path' => 'projects/{project}/setUsageExportBucket',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->publicAdvertisedPrefixes = new Compute\Resource\PublicAdvertisedPrefixes(
        $this,
        $this->serviceName,
        'publicAdvertisedPrefixes',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/publicAdvertisedPrefixes/{publicAdvertisedPrefix}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicAdvertisedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/publicAdvertisedPrefixes/{publicAdvertisedPrefix}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicAdvertisedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/publicAdvertisedPrefixes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/publicAdvertisedPrefixes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/publicAdvertisedPrefixes/{publicAdvertisedPrefix}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicAdvertisedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->publicDelegatedPrefixes = new Compute\Resource\PublicDelegatedPrefixes(
        $this,
        $this->serviceName,
        'publicDelegatedPrefixes',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/publicDelegatedPrefixes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/publicDelegatedPrefixes/{publicDelegatedPrefix}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicDelegatedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/publicDelegatedPrefixes/{publicDelegatedPrefix}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicDelegatedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/publicDelegatedPrefixes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/publicDelegatedPrefixes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/publicDelegatedPrefixes/{publicDelegatedPrefix}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publicDelegatedPrefix' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionAutoscalers = new Compute\Resource\RegionAutoscalers(
        $this,
        $this->serviceName,
        'regionAutoscalers',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/autoscalers/{autoscaler}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/autoscalers/{autoscaler}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/autoscalers',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/autoscalers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/autoscalers',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/regions/{region}/autoscalers',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoscaler' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionBackendServices = new Compute\Resource\RegionBackendServices(
        $this,
        $this->serviceName,
        'regionBackendServices',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/backendServices/{backendService}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/backendServices/{backendService}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getHealth' => [
              'path' => 'projects/{project}/regions/{region}/backendServices/{backendService}/getHealth',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/backendServices',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/backendServices',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/backendServices/{backendService}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/regions/{region}/backendServices/{backendService}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'backendService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionCommitments = new Compute\Resource\RegionCommitments(
        $this,
        $this->serviceName,
        'regionCommitments',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/commitments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/commitments/{commitment}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commitment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/commitments',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/commitments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/regions/{region}/commitments/{commitment}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commitment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'paths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionDiskTypes = new Compute\Resource\RegionDiskTypes(
        $this,
        $this->serviceName,
        'regionDiskTypes',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/regions/{region}/diskTypes/{diskType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'diskType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/diskTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionDisks = new Compute\Resource\RegionDisks(
        $this,
        $this->serviceName,
        'regionDisks',
        [
          'methods' => [
            'addResourcePolicies' => [
              'path' => 'projects/{project}/regions/{region}/disks/{disk}/addResourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'createSnapshot' => [
              'path' => 'projects/{project}/regions/{region}/disks/{disk}/createSnapshot',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/disks/{disk}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/disks/{disk}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/disks/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/disks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceImage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/disks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'removeResourcePolicies' => [
              'path' => 'projects/{project}/regions/{region}/disks/{disk}/removeResourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'resize' => [
              'path' => 'projects/{project}/regions/{region}/disks/{disk}/resize',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disk' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/disks/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/regions/{region}/disks/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/disks/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionHealthCheckServices = new Compute\Resource\RegionHealthCheckServices(
        $this,
        $this->serviceName,
        'regionHealthCheckServices',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/healthCheckServices/{healthCheckService}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheckService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/healthCheckServices/{healthCheckService}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheckService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/healthCheckServices',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/healthCheckServices',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/healthCheckServices/{healthCheckService}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheckService' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionHealthChecks = new Compute\Resource\RegionHealthChecks(
        $this,
        $this->serviceName,
        'regionHealthChecks',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/healthChecks/{healthCheck}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/healthChecks/{healthCheck}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/healthChecks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/healthChecks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/healthChecks/{healthCheck}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/regions/{region}/healthChecks/{healthCheck}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'healthCheck' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionInstanceGroupManagers = new Compute\Resource\RegionInstanceGroupManagers(
        $this,
        $this->serviceName,
        'regionInstanceGroupManagers',
        [
          'methods' => [
            'abandonInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/abandonInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'applyUpdatesToInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/applyUpdatesToInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/createInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/deleteInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deletePerInstanceConfigs' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/deletePerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listErrors' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/listErrors',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listManagedInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/listManagedInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listPerInstanceConfigs' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/listPerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patchPerInstanceConfigs' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/patchPerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'recreateInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/recreateInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'resize' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/resize',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'size' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setInstanceTemplate' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/setInstanceTemplate',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setTargetPools' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/setTargetPools',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updatePerInstanceConfigs' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroupManagers/{instanceGroupManager}/updatePerInstanceConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroupManager' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionInstanceGroups = new Compute\Resource\RegionInstanceGroups(
        $this,
        $this->serviceName,
        'regionInstanceGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroups/{instanceGroup}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listInstances' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroups/{instanceGroup}/listInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setNamedPorts' => [
              'path' => 'projects/{project}/regions/{region}/instanceGroups/{instanceGroup}/setNamedPorts',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instanceGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionInstances = new Compute\Resource\RegionInstances(
        $this,
        $this->serviceName,
        'regionInstances',
        [
          'methods' => [
            'bulkInsert' => [
              'path' => 'projects/{project}/regions/{region}/instances/bulkInsert',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionNetworkEndpointGroups = new Compute\Resource\RegionNetworkEndpointGroups(
        $this,
        $this->serviceName,
        'regionNetworkEndpointGroups',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/networkEndpointGroups/{networkEndpointGroup}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/networkEndpointGroups/{networkEndpointGroup}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'networkEndpointGroup' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/networkEndpointGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/networkEndpointGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionNetworkFirewallPolicies = new Compute\Resource\RegionNetworkFirewallPolicies(
        $this,
        $this->serviceName,
        'regionNetworkFirewallPolicies',
        [
          'methods' => [
            'addAssociation' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/addAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replaceExistingAssociation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'addRule' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/addRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxPriority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'minPriority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'cloneRules' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/cloneRules',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sourceFirewallPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getAssociation' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/getAssociation',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getEffectiveFirewalls' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/getEffectiveFirewalls',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getRule' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/getRule',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patchRule' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/patchRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeAssociation' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/removeAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeRule' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{firewallPolicy}/removeRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'firewallPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/firewallPolicies/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionNotificationEndpoints = new Compute\Resource\RegionNotificationEndpoints(
        $this,
        $this->serviceName,
        'regionNotificationEndpoints',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/notificationEndpoints/{notificationEndpoint}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'notificationEndpoint' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/notificationEndpoints/{notificationEndpoint}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'notificationEndpoint' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/notificationEndpoints',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/notificationEndpoints',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionOperations = new Compute\Resource\RegionOperations(
        $this,
        $this->serviceName,
        'regionOperations',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'wait' => [
              'path' => 'projects/{project}/regions/{region}/operations/{operation}/wait',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionSecurityPolicies = new Compute\Resource\RegionSecurityPolicies(
        $this,
        $this->serviceName,
        'regionSecurityPolicies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/securityPolicies/{securityPolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/securityPolicies/{securityPolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/securityPolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/securityPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/securityPolicies/{securityPolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionSslCertificates = new Compute\Resource\RegionSslCertificates(
        $this,
        $this->serviceName,
        'regionSslCertificates',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/sslCertificates/{sslCertificate}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslCertificate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/sslCertificates/{sslCertificate}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslCertificate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/sslCertificates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/sslCertificates',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionTargetHttpProxies = new Compute\Resource\RegionTargetHttpProxies(
        $this,
        $this->serviceName,
        'regionTargetHttpProxies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setUrlMap' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpProxies/{targetHttpProxy}/setUrlMap',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionTargetHttpsProxies = new Compute\Resource\RegionTargetHttpsProxies(
        $this,
        $this->serviceName,
        'regionTargetHttpsProxies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies/{targetHttpsProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies/{targetHttpsProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies/{targetHttpsProxy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setSslCertificates' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies/{targetHttpsProxy}/setSslCertificates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setUrlMap' => [
              'path' => 'projects/{project}/regions/{region}/targetHttpsProxies/{targetHttpsProxy}/setUrlMap',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionUrlMaps = new Compute\Resource\RegionUrlMaps(
        $this,
        $this->serviceName,
        'regionUrlMaps',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps/{urlMap}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps/{urlMap}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps/{urlMap}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps/{urlMap}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'validate' => [
              'path' => 'projects/{project}/regions/{region}/urlMaps/{urlMap}/validate',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->regions = new Compute\Resource\Regions(
        $this,
        $this->serviceName,
        'regions',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/regions/{region}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->reservations = new Compute\Resource\Reservations(
        $this,
        $this->serviceName,
        'reservations',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/reservations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{reservation}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reservation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{reservation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reservation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/reservations',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/reservations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'resize' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{reservation}/resize',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reservation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/zones/{zone}/reservations/{reservation}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reservation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'paths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->resourcePolicies = new Compute\Resource\ResourcePolicies(
        $this,
        $this->serviceName,
        'resourcePolicies',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/resourcePolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies/{resourcePolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resourcePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies/{resourcePolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resourcePolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/resourcePolicies/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->routers = new Compute\Resource\Routers(
        $this,
        $this->serviceName,
        'routers',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/routers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getNatMappingInfo' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}/getNatMappingInfo',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'getRouterStatus' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}/getRouterStatus',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/routers',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/routers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'preview' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}/preview',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/regions/{region}/routers/{router}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'router' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->routes = new Compute\Resource\Routes(
        $this,
        $this->serviceName,
        'routes',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/routes/{route}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'route' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/routes/{route}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'route' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/routes',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/routes',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->securityPolicies = new Compute\Resource\SecurityPolicies(
        $this,
        $this->serviceName,
        'securityPolicies',
        [
          'methods' => [
            'addRule' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}/addRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/securityPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getRule' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}/getRule',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/securityPolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/securityPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listPreconfiguredExpressionSets' => [
              'path' => 'projects/{project}/global/securityPolicies/listPreconfiguredExpressionSets',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patchRule' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}/patchRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'removeRule' => [
              'path' => 'projects/{project}/global/securityPolicies/{securityPolicy}/removeRule',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'securityPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->serviceAttachments = new Compute\Resource\ServiceAttachments(
        $this,
        $this->serviceName,
        'serviceAttachments',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/serviceAttachments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments/{serviceAttachment}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'serviceAttachment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments/{serviceAttachment}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'serviceAttachment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments/{serviceAttachment}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'serviceAttachment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/serviceAttachments/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->snapshots = new Compute\Resource\Snapshots(
        $this,
        $this->serviceName,
        'snapshots',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/snapshots/{snapshot}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'snapshot' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/snapshots/{snapshot}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'snapshot' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/global/snapshots/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/snapshots',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/snapshots',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/global/snapshots/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/global/snapshots/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/global/snapshots/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->sslCertificates = new Compute\Resource\SslCertificates(
        $this,
        $this->serviceName,
        'sslCertificates',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/sslCertificates',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/sslCertificates/{sslCertificate}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslCertificate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/sslCertificates/{sslCertificate}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslCertificate' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/sslCertificates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/sslCertificates',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->sslPolicies = new Compute\Resource\SslPolicies(
        $this,
        $this->serviceName,
        'sslPolicies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/sslPolicies/{sslPolicy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/sslPolicies/{sslPolicy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/sslPolicies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/sslPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listAvailableFeatures' => [
              'path' => 'projects/{project}/global/sslPolicies/listAvailableFeatures',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/sslPolicies/{sslPolicy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sslPolicy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->subnetworks = new Compute\Resource\Subnetworks(
        $this,
        $this->serviceName,
        'subnetworks',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/subnetworks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{subnetwork}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subnetwork' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'expandIpCidrRange' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{subnetwork}/expandIpCidrRange',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subnetwork' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{subnetwork}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subnetwork' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'listUsable' => [
              'path' => 'projects/{project}/aggregated/subnetworks/listUsable',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{subnetwork}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subnetwork' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'drainTimeoutSeconds' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setPrivateIpGoogleAccess' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{subnetwork}/setPrivateIpGoogleAccess',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subnetwork' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/subnetworks/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetGrpcProxies = new Compute\Resource\TargetGrpcProxies(
        $this,
        $this->serviceName,
        'targetGrpcProxies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/targetGrpcProxies/{targetGrpcProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetGrpcProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/targetGrpcProxies/{targetGrpcProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetGrpcProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/targetGrpcProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/targetGrpcProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/targetGrpcProxies/{targetGrpcProxy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetGrpcProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetHttpProxies = new Compute\Resource\TargetHttpProxies(
        $this,
        $this->serviceName,
        'targetHttpProxies',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/targetHttpProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/targetHttpProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/targetHttpProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setUrlMap' => [
              'path' => 'projects/{project}/targetHttpProxies/{targetHttpProxy}/setUrlMap',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetHttpsProxies = new Compute\Resource\TargetHttpsProxies(
        $this,
        $this->serviceName,
        'targetHttpsProxies',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/targetHttpsProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/targetHttpsProxies/{targetHttpsProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/targetHttpsProxies/{targetHttpsProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/targetHttpsProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/targetHttpsProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/targetHttpsProxies/{targetHttpsProxy}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setCertificateMap' => [
              'path' => 'projects/{project}/global/targetHttpsProxies/{targetHttpsProxy}/setCertificateMap',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setQuicOverride' => [
              'path' => 'projects/{project}/global/targetHttpsProxies/{targetHttpsProxy}/setQuicOverride',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setSslCertificates' => [
              'path' => 'projects/{project}/targetHttpsProxies/{targetHttpsProxy}/setSslCertificates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setSslPolicy' => [
              'path' => 'projects/{project}/global/targetHttpsProxies/{targetHttpsProxy}/setSslPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setUrlMap' => [
              'path' => 'projects/{project}/targetHttpsProxies/{targetHttpsProxy}/setUrlMap',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetHttpsProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetInstances = new Compute\Resource\TargetInstances(
        $this,
        $this->serviceName,
        'targetInstances',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/targetInstances',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/zones/{zone}/targetInstances/{targetInstance}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetInstance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/targetInstances/{targetInstance}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetInstance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/zones/{zone}/targetInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/targetInstances',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetPools = new Compute\Resource\TargetPools(
        $this,
        $this->serviceName,
        'targetPools',
        [
          'methods' => [
            'addHealthCheck' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}/addHealthCheck',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'addInstance' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}/addInstance',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/targetPools',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getHealth' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}/getHealth',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/targetPools',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/targetPools',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'removeHealthCheck' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}/removeHealthCheck',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeInstance' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}/removeInstance',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setBackup' => [
              'path' => 'projects/{project}/regions/{region}/targetPools/{targetPool}/setBackup',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetPool' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'failoverRatio' => [
                  'location' => 'query',
                  'type' => 'number',
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetSslProxies = new Compute\Resource\TargetSslProxies(
        $this,
        $this->serviceName,
        'targetSslProxies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/targetSslProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/targetSslProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setBackendService' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}/setBackendService',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setCertificateMap' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}/setCertificateMap',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setProxyHeader' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}/setProxyHeader',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setSslCertificates' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}/setSslCertificates',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setSslPolicy' => [
              'path' => 'projects/{project}/global/targetSslProxies/{targetSslProxy}/setSslPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetSslProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetTcpProxies = new Compute\Resource\TargetTcpProxies(
        $this,
        $this->serviceName,
        'targetTcpProxies',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/global/targetTcpProxies/{targetTcpProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetTcpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/targetTcpProxies/{targetTcpProxy}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetTcpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/targetTcpProxies',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/targetTcpProxies',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setBackendService' => [
              'path' => 'projects/{project}/global/targetTcpProxies/{targetTcpProxy}/setBackendService',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetTcpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setProxyHeader' => [
              'path' => 'projects/{project}/global/targetTcpProxies/{targetTcpProxy}/setProxyHeader',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetTcpProxy' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetVpnGateways = new Compute\Resource\TargetVpnGateways(
        $this,
        $this->serviceName,
        'targetVpnGateways',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/targetVpnGateways',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/targetVpnGateways/{targetVpnGateway}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetVpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/targetVpnGateways/{targetVpnGateway}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetVpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/targetVpnGateways',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/targetVpnGateways',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->urlMaps = new Compute\Resource\UrlMaps(
        $this,
        $this->serviceName,
        'urlMaps',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/urlMaps',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/global/urlMaps',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'invalidateCache' => [
              'path' => 'projects/{project}/global/urlMaps/{urlMap}/invalidateCache',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/global/urlMaps',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'projects/{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'projects/{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'validate' => [
              'path' => 'projects/{project}/global/urlMaps/{urlMap}/validate',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlMap' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->vpnGateways = new Compute\Resource\VpnGateways(
        $this,
        $this->serviceName,
        'vpnGateways',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/vpnGateways',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways/{vpnGateway}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'vpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways/{vpnGateway}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'vpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getStatus' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways/{vpnGateway}/getStatus',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'vpnGateway' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setLabels' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways/{resource}/setLabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'projects/{project}/regions/{region}/vpnGateways/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->vpnTunnels = new Compute\Resource\VpnTunnels(
        $this,
        $this->serviceName,
        'vpnTunnels',
        [
          'methods' => [
            'aggregatedList' => [
              'path' => 'projects/{project}/aggregated/vpnTunnels',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllScopes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'projects/{project}/regions/{region}/vpnTunnels/{vpnTunnel}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'vpnTunnel' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/regions/{region}/vpnTunnels/{vpnTunnel}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'vpnTunnel' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'projects/{project}/regions/{region}/vpnTunnels',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/regions/{region}/vpnTunnels',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'region' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->zoneOperations = new Compute\Resource\ZoneOperations(
        $this,
        $this->serviceName,
        'zoneOperations',
        [
          'methods' => [
            'delete' => [
              'path' => 'projects/{project}/zones/{zone}/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'projects/{project}/zones/{zone}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones/{zone}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'wait' => [
              'path' => 'projects/{project}/zones/{zone}/operations/{operation}/wait',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->zones = new Compute\Resource\Zones(
        $this,
        $this->serviceName,
        'zones',
        [
          'methods' => [
            'get' => [
              'path' => 'projects/{project}/zones/{zone}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'zone' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'projects/{project}/zones',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'returnPartialSuccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Compute::class, 'Google_Service_Compute');
