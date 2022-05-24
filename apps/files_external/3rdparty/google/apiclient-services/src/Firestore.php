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
 * Service definition for Firestore (v1).
 *
 * <p>
 * Accesses the NoSQL document database built for automatic scaling, high
 * performance, and ease of application development.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/firestore" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Firestore extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Cloud Datastore data. */
  const DATASTORE =
      "https://www.googleapis.com/auth/datastore";

  public $projects_databases;
  public $projects_databases_collectionGroups_fields;
  public $projects_databases_collectionGroups_indexes;
  public $projects_databases_documents;
  public $projects_databases_operations;
  public $projects_locations;

  /**
   * Constructs the internal representation of the Firestore service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://firestore.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'firestore';

    $this->projects_databases = new Firestore\Resource\ProjectsDatabases(
        $this,
        $this->serviceName,
        'databases',
        [
          'methods' => [
            'exportDocuments' => [
              'path' => 'v1/{+name}:exportDocuments',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'importDocuments' => [
              'path' => 'v1/{+name}:importDocuments',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/databases',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->projects_databases_collectionGroups_fields = new Firestore\Resource\ProjectsDatabasesCollectionGroupsFields(
        $this,
        $this->serviceName,
        'fields',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/fields',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->projects_databases_collectionGroups_indexes = new Firestore\Resource\ProjectsDatabasesCollectionGroupsIndexes(
        $this,
        $this->serviceName,
        'indexes',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/indexes',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/indexes',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
              ],
            ],
          ]
        ]
    );
    $this->projects_databases_documents = new Firestore\Resource\ProjectsDatabasesDocuments(
        $this,
        $this->serviceName,
        'documents',
        [
          'methods' => [
            'batchGet' => [
              'path' => 'v1/{+database}/documents:batchGet',
              'httpMethod' => 'POST',
              'parameters' => [
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchWrite' => [
              'path' => 'v1/{+database}/documents:batchWrite',
              'httpMethod' => 'POST',
              'parameters' => [
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'beginTransaction' => [
              'path' => 'v1/{+database}/documents:beginTransaction',
              'httpMethod' => 'POST',
              'parameters' => [
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'commit' => [
              'path' => 'v1/{+database}/documents:commit',
              'httpMethod' => 'POST',
              'parameters' => [
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createDocument' => [
              'path' => 'v1/{+parent}/{collectionId}',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collectionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'documentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'mask.fieldPaths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currentDocument.exists' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'currentDocument.updateTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'mask.fieldPaths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'readTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'transaction' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/{collectionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collectionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'mask.fieldPaths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
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
                'readTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showMissing' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'transaction' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listCollectionIds' => [
              'path' => 'v1/{+parent}:listCollectionIds',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'listDocuments' => [
              'path' => 'v1/{+parent}/{collectionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collectionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'mask.fieldPaths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
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
                'readTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showMissing' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'transaction' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listen' => [
              'path' => 'v1/{+database}/documents:listen',
              'httpMethod' => 'POST',
              'parameters' => [
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'partitionQuery' => [
              'path' => 'v1/{+parent}:partitionQuery',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currentDocument.exists' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'currentDocument.updateTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'mask.fieldPaths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'updateMask.fieldPaths' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'rollback' => [
              'path' => 'v1/{+database}/documents:rollback',
              'httpMethod' => 'POST',
              'parameters' => [
                'database' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'runAggregationQuery' => [
              'path' => 'v1/{+parent}:runAggregationQuery',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'runQuery' => [
              'path' => 'v1/{+parent}:runQuery',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'write' => [
              'path' => 'v1/{+database}/documents:write',
              'httpMethod' => 'POST',
              'parameters' => [
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
    $this->projects_databases_operations = new Firestore\Resource\ProjectsDatabasesOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+name}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
              ],
            ],
          ]
        ]
    );
    $this->projects_locations = new Firestore\Resource\ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Firestore::class, 'Google_Service_Firestore');
