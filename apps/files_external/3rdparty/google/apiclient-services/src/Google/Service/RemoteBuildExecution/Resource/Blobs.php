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
 * The "blobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $remotebuildexecutionService = new Google_Service_RemoteBuildExecution(...);
 *   $blobs = $remotebuildexecutionService->blobs;
 *  </code>
 */
class Google_Service_RemoteBuildExecution_Resource_Blobs extends Google_Service_Resource
{
  /**
   * Download many blobs at once.
   *
   * The server may enforce a limit of the combined total size of blobs to be
   * downloaded using this API. This limit may be obtained using the Capabilities
   * API. Requests exceeding the limit should either be split into smaller chunks
   * or downloaded using the ByteStream API, as appropriate.
   *
   * This request is equivalent to calling a Bytestream `Read` request on each
   * individual blob, in parallel. The requests may succeed or fail independently.
   *
   * Errors:
   *
   * * `INVALID_ARGUMENT`: The client attempted to read more than the   server
   * supported limit.
   *
   * Every error on individual read will be returned in the corresponding digest
   * status. (blobs.batchRead)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchReadBlobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchReadBlobsResponse
   */
  public function batchRead($instanceName, Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchReadBlobsRequest $postBody, $optParams = array())
  {
    $params = array('instanceName' => $instanceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchRead', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchReadBlobsResponse");
  }
  /**
   * Upload many blobs at once.
   *
   * The server may enforce a limit of the combined total size of blobs to be
   * uploaded using this API. This limit may be obtained using the Capabilities
   * API. Requests exceeding the limit should either be split into smaller chunks
   * or uploaded using the ByteStream API, as appropriate.
   *
   * This request is equivalent to calling a Bytestream `Write` request on each
   * individual blob, in parallel. The requests may succeed or fail independently.
   *
   * Errors:
   *
   * * `INVALID_ARGUMENT`: The client attempted to upload more than the   server
   * supported limit.
   *
   * Individual requests may return the following errors, additionally:
   *
   * * `RESOURCE_EXHAUSTED`: There is insufficient disk quota to store the blob. *
   * `INVALID_ARGUMENT`: The Digest does not match the provided data.
   * (blobs.batchUpdate)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchUpdateBlobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchUpdateBlobsResponse
   */
  public function batchUpdate($instanceName, Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchUpdateBlobsRequest $postBody, $optParams = array())
  {
    $params = array('instanceName' => $instanceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchUpdateBlobsResponse");
  }
  /**
   * Determine if blobs are present in the CAS.
   *
   * Clients can use this API before uploading blobs to determine which ones are
   * already present in the CAS and do not need to be uploaded again.
   *
   * Servers SHOULD increase the TTLs of the referenced blobs if necessary and
   * applicable.
   *
   * There are no method-specific errors. (blobs.findMissing)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FindMissingBlobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FindMissingBlobsResponse
   */
  public function findMissing($instanceName, Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FindMissingBlobsRequest $postBody, $optParams = array())
  {
    $params = array('instanceName' => $instanceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('findMissing', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FindMissingBlobsResponse");
  }
  /**
   * Fetch the entire directory tree rooted at a node.
   *
   * This request must be targeted at a Directory stored in the
   * ContentAddressableStorage (CAS). The server will enumerate the `Directory`
   * tree recursively and return every node descended from the root.
   *
   * The GetTreeRequest.page_token parameter can be used to skip ahead in the
   * stream (e.g. when retrying a partially completed and aborted request), by
   * setting it to a value taken from GetTreeResponse.next_page_token of the last
   * successfully processed GetTreeResponse).
   *
   * The exact traversal order is unspecified and, unless retrieving subsequent
   * pages from an earlier request, is not guaranteed to be stable across multiple
   * invocations of `GetTree`.
   *
   * If part of the tree is missing from the CAS, the server will return the
   * portion present and omit the rest.
   *
   * Errors:
   *
   * * `NOT_FOUND`: The requested tree root is not present in the CAS.
   * (blobs.getTree)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param string $hash The hash. In the case of SHA-256, it will always be a
   * lowercase hex string exactly 64 characters long.
   * @param string $sizeBytes The size of the blob, in bytes.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A page token, which must be a value received in a
   * previous GetTreeResponse. If present, the server will use that token as an
   * offset, returning only that page and the ones that succeed it.
   * @opt_param int pageSize A maximum page size to request. If present, the
   * server will request no more than this many items. Regardless of whether a
   * page size is specified, the server may place its own limit on the number of
   * items to be returned and require the client to retrieve more items using a
   * subsequent request.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2GetTreeResponse
   */
  public function getTree($instanceName, $hash, $sizeBytes, $optParams = array())
  {
    $params = array('instanceName' => $instanceName, 'hash' => $hash, 'sizeBytes' => $sizeBytes);
    $params = array_merge($params, $optParams);
    return $this->call('getTree', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2GetTreeResponse");
  }
}
