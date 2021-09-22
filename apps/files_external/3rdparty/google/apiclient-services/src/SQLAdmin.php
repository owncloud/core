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
 * Service definition for SQLAdmin (v1).
 *
 * <p>
 * API for Cloud SQL database instance management</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-sql/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SQLAdmin extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Manage your Google SQL Service instances. */
  const SQLSERVICE_ADMIN =
      "https://www.googleapis.com/auth/sqlservice.admin";

  public $backupRuns;
  public $connect;
  public $databases;
  public $flags;
  public $instances;
  public $operations;
  public $projects_instances;
  public $sslCerts;
  public $tiers;
  public $users;

  /**
   * Constructs the internal representation of the SQLAdmin service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://sqladmin.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'sqladmin';

    $this->backupRuns = new SQLAdmin\Resource\BackupRuns(
        $this,
        $this->serviceName,
        'backupRuns',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/projects/{project}/instances/{instance}/backupRuns/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{project}/instances/{instance}/backupRuns/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'v1/projects/{project}/instances/{instance}/backupRuns',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'list' => [
              'path' => 'v1/projects/{project}/instances/{instance}/backupRuns',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
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
            ],
          ]
        ]
    );
    $this->connect = new SQLAdmin\Resource\Connect(
        $this,
        $this->serviceName,
        'connect',
        [
          'methods' => [
            'generateEphemeralCert' => [
              'path' => 'v1/projects/{project}/instances/{instance}:generateEphemeralCert',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'get' => [
              'path' => 'v1/projects/{project}/instances/{instance}/connectSettings',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'readTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->databases = new SQLAdmin\Resource\Databases(
        $this,
        $this->serviceName,
        'databases',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/projects/{project}/instances/{instance}/databases/{database}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{project}/instances/{instance}/databases/{database}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'v1/projects/{project}/instances/{instance}/databases',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'list' => [
              'path' => 'v1/projects/{project}/instances/{instance}/databases',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
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
            ],'patch' => [
              'path' => 'v1/projects/{project}/instances/{instance}/databases/{database}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/projects/{project}/instances/{instance}/databases/{database}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->flags = new SQLAdmin\Resource\Flags(
        $this,
        $this->serviceName,
        'flags',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/flags',
              'httpMethod' => 'GET',
              'parameters' => [
                'databaseVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->instances = new SQLAdmin\Resource\Instances(
        $this,
        $this->serviceName,
        'instances',
        [
          'methods' => [
            'addServerCa' => [
              'path' => 'v1/projects/{project}/instances/{instance}/addServerCa',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'clone' => [
              'path' => 'v1/projects/{project}/instances/{instance}/clone',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'delete' => [
              'path' => 'v1/projects/{project}/instances/{instance}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
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
            ],'demoteMaster' => [
              'path' => 'v1/projects/{project}/instances/{instance}/demoteMaster',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'export' => [
              'path' => 'v1/projects/{project}/instances/{instance}/export',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'failover' => [
              'path' => 'v1/projects/{project}/instances/{instance}/failover',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'get' => [
              'path' => 'v1/projects/{project}/instances/{instance}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
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
            ],'import' => [
              'path' => 'v1/projects/{project}/instances/{instance}/import',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
              'path' => 'v1/projects/{project}/instances',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/projects/{project}/instances',
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
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listServerCas' => [
              'path' => 'v1/projects/{project}/instances/{instance}/listServerCas',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
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
            ],'patch' => [
              'path' => 'v1/projects/{project}/instances/{instance}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
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
            ],'promoteReplica' => [
              'path' => 'v1/projects/{project}/instances/{instance}/promoteReplica',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'resetSslConfig' => [
              'path' => 'v1/projects/{project}/instances/{instance}/resetSslConfig',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'restart' => [
              'path' => 'v1/projects/{project}/instances/{instance}/restart',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'restoreBackup' => [
              'path' => 'v1/projects/{project}/instances/{instance}/restoreBackup',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'rotateServerCa' => [
              'path' => 'v1/projects/{project}/instances/{instance}/rotateServerCa',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'startReplica' => [
              'path' => 'v1/projects/{project}/instances/{instance}/startReplica',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'stopReplica' => [
              'path' => 'v1/projects/{project}/instances/{instance}/stopReplica',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'truncateLog' => [
              'path' => 'v1/projects/{project}/instances/{instance}/truncateLog',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'update' => [
              'path' => 'v1/projects/{project}/instances/{instance}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
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
            ],
          ]
        ]
    );
    $this->operations = new SQLAdmin\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/projects/{project}/operations/{operation}',
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
              'path' => 'v1/projects/{project}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
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
    $this->projects_instances = new SQLAdmin\Resource\ProjectsInstances(
        $this,
        $this->serviceName,
        'instances',
        [
          'methods' => [
            'rescheduleMaintenance' => [
              'path' => 'v1/projects/{project}/instances/{instance}/rescheduleMaintenance',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'startExternalSync' => [
              'path' => 'v1/projects/{project}/instances/{instance}/startExternalSync',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'verifyExternalSyncSettings' => [
              'path' => 'v1/projects/{project}/instances/{instance}/verifyExternalSyncSettings',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],
          ]
        ]
    );
    $this->sslCerts = new SQLAdmin\Resource\SslCerts(
        $this,
        $this->serviceName,
        'sslCerts',
        [
          'methods' => [
            'createEphemeral' => [
              'path' => 'v1/projects/{project}/instances/{instance}/createEphemeral',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'delete' => [
              'path' => 'v1/projects/{project}/instances/{instance}/sslCerts/{sha1Fingerprint}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sha1Fingerprint' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{project}/instances/{instance}/sslCerts/{sha1Fingerprint}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sha1Fingerprint' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'v1/projects/{project}/instances/{instance}/sslCerts',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'list' => [
              'path' => 'v1/projects/{project}/instances/{instance}/sslCerts',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
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
            ],
          ]
        ]
    );
    $this->tiers = new SQLAdmin\Resource\Tiers(
        $this,
        $this->serviceName,
        'tiers',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/projects/{project}/tiers',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users = new SQLAdmin\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/projects/{project}/instances/{instance}/users',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'host' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'v1/projects/{project}/instances/{instance}/users',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
            ],'list' => [
              'path' => 'v1/projects/{project}/instances/{instance}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
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
            ],'update' => [
              'path' => 'v1/projects/{project}/instances/{instance}/users',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'host' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
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
class_alias(SQLAdmin::class, 'Google_Service_SQLAdmin');
