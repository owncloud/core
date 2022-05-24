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

namespace Google\Service\Dns\Resource;

use Google\Service\Dns\ManagedZoneOperationsListResponse;
use Google\Service\Dns\Operation;

/**
 * The "managedZoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $managedZoneOperations = $dnsService->managedZoneOperations;
 *  </code>
 */
class ManagedZoneOperations extends \Google\Service\Resource
{
  /**
   * Fetches the representation of an existing Operation.
   * (managedZoneOperations.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request.
   * @param string $operation Identifies the operation addressed by this request
   * (ID of the operation).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Operation
   */
  public function get($project, $managedZone, $operation, $optParams = [])
  {
    $params = ['project' => $project, 'managedZone' => $managedZone, 'operation' => $operation];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Operation::class);
  }
  /**
   * Enumerates Operations for the given ManagedZone.
   * (managedZoneOperations.listManagedZoneOperations)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server decides how many results to return.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @opt_param string sortBy Sorting criterion. The only supported values are
   * START_TIME and ID.
   * @return ManagedZoneOperationsListResponse
   */
  public function listManagedZoneOperations($project, $managedZone, $optParams = [])
  {
    $params = ['project' => $project, 'managedZone' => $managedZone];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ManagedZoneOperationsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedZoneOperations::class, 'Google_Service_Dns_Resource_ManagedZoneOperations');
