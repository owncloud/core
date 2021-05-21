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
class Google_Service_Dns extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud Platform services. */
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
  public $projects_managedZones_rrsets;
  public $resourceRecordSets;

  /**
   * Constructs the internal representation of the Dns service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://dns.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'dns';

    $this->changes = new Google_Service_Dns_Resource_Changes(
        $this,
        $this->serviceName,
        'changes',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/changes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/changes/{changeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'changeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/changes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->dnsKeys = new Google_Service_Dns_Resource_DnsKeys(
        $this,
        $this->serviceName,
        'dnsKeys',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/dnsKeys/{dnsKeyId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dnsKeyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'digestType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/dnsKeys',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'digestType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
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
    $this->managedZoneOperations = new Google_Service_Dns_Resource_ManagedZoneOperations(
        $this,
        $this->serviceName,
        'managedZoneOperations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'operation' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->managedZones = new Google_Service_Dns_Resource_ManagedZones(
        $this,
        $this->serviceName,
        'managedZones',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'dns/v1/projects/{project}/managedZones',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'dns/v1/projects/{project}/managedZones',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dnsName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->policies = new Google_Service_Dns_Resource_Policies(
        $this,
        $this->serviceName,
        'policies',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'dns/v1/projects/{project}/policies',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'policy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'policy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'dns/v1/projects/{project}/policies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'policy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'dns/v1/projects/{project}/policies/{policy}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'policy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new Google_Service_Dns_Resource_Projects(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'dns/v1/projects/{project}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_managedZones_rrsets = new Google_Service_Dns_Resource_ProjectsManagedZonesRrsets(
        $this,
        $this->serviceName,
        'rrsets',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets/{name}/{type}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets/{name}/{type}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets/{name}/{type}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientOperationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->resourceRecordSets = new Google_Service_Dns_Resource_ResourceRecordSets(
        $this,
        $this->serviceName,
        'resourceRecordSets',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'dns/v1/projects/{project}/managedZones/{managedZone}/rrsets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'managedZone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
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
