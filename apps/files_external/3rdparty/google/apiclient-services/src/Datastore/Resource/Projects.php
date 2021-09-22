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

namespace Google\Service\Datastore\Resource;

use Google\Service\Datastore\AllocateIdsRequest;
use Google\Service\Datastore\AllocateIdsResponse;
use Google\Service\Datastore\BeginTransactionRequest;
use Google\Service\Datastore\BeginTransactionResponse;
use Google\Service\Datastore\CommitRequest;
use Google\Service\Datastore\CommitResponse;
use Google\Service\Datastore\GoogleDatastoreAdminV1ExportEntitiesRequest;
use Google\Service\Datastore\GoogleDatastoreAdminV1ImportEntitiesRequest;
use Google\Service\Datastore\GoogleLongrunningOperation;
use Google\Service\Datastore\LookupRequest;
use Google\Service\Datastore\LookupResponse;
use Google\Service\Datastore\ReserveIdsRequest;
use Google\Service\Datastore\ReserveIdsResponse;
use Google\Service\Datastore\RollbackRequest;
use Google\Service\Datastore\RollbackResponse;
use Google\Service\Datastore\RunQueryRequest;
use Google\Service\Datastore\RunQueryResponse;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastoreService = new Google\Service\Datastore(...);
 *   $projects = $datastoreService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Allocates IDs for the given keys, which is useful for referencing an entity
   * before it is inserted. (projects.allocateIds)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param AllocateIdsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AllocateIdsResponse
   */
  public function allocateIds($projectId, AllocateIdsRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('allocateIds', [$params], AllocateIdsResponse::class);
  }
  /**
   * Begins a new transaction. (projects.beginTransaction)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param BeginTransactionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BeginTransactionResponse
   */
  public function beginTransaction($projectId, BeginTransactionRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('beginTransaction', [$params], BeginTransactionResponse::class);
  }
  /**
   * Commits a transaction, optionally creating, deleting or modifying some
   * entities. (projects.commit)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param CommitRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CommitResponse
   */
  public function commit($projectId, CommitRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('commit', [$params], CommitResponse::class);
  }
  /**
   * Exports a copy of all or a subset of entities from Google Cloud Datastore to
   * another storage system, such as Google Cloud Storage. Recent updates to
   * entities may not be reflected in the export. The export occurs in the
   * background and its progress can be monitored and managed via the Operation
   * resource that is created. The output of an export may only be used once the
   * associated operation is done. If an export operation is cancelled before
   * completion it may leave partial data behind in Google Cloud Storage.
   * (projects.export)
   *
   * @param string $projectId Required. Project ID against which to make the
   * request.
   * @param GoogleDatastoreAdminV1ExportEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function export($projectId, GoogleDatastoreAdminV1ExportEntitiesRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Imports entities into Google Cloud Datastore. Existing entities with the same
   * key are overwritten. The import occurs in the background and its progress can
   * be monitored and managed via the Operation resource that is created. If an
   * ImportEntities operation is cancelled, it is possible that a subset of the
   * data has already been imported to Cloud Datastore. (projects.import)
   *
   * @param string $projectId Required. Project ID against which to make the
   * request.
   * @param GoogleDatastoreAdminV1ImportEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function import($projectId, GoogleDatastoreAdminV1ImportEntitiesRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Looks up entities by key. (projects.lookup)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param LookupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return LookupResponse
   */
  public function lookup($projectId, LookupRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('lookup', [$params], LookupResponse::class);
  }
  /**
   * Prevents the supplied keys' IDs from being auto-allocated by Cloud Datastore.
   * (projects.reserveIds)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param ReserveIdsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ReserveIdsResponse
   */
  public function reserveIds($projectId, ReserveIdsRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reserveIds', [$params], ReserveIdsResponse::class);
  }
  /**
   * Rolls back a transaction. (projects.rollback)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param RollbackRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RollbackResponse
   */
  public function rollback($projectId, RollbackRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rollback', [$params], RollbackResponse::class);
  }
  /**
   * Queries for entities. (projects.runQuery)
   *
   * @param string $projectId Required. The ID of the project against which to
   * make the request.
   * @param RunQueryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RunQueryResponse
   */
  public function runQuery($projectId, RunQueryRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runQuery', [$params], RunQueryResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_Datastore_Resource_Projects');
