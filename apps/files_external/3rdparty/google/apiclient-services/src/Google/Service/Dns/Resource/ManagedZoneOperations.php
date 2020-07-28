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
 * The "managedZoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $managedZoneOperations = $dnsService->managedZoneOperations;
 *  </code>
 */
class Google_Service_Dns_Resource_ManagedZoneOperations extends Google_Service_Resource
{
  /**
   * Fetch the representation of an existing Operation.
   * (managedZoneOperations.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request.
   * @param string $operation Identifies the operation addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_Operation
   */
  public function get($project, $managedZone, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_Operation");
  }
  /**
   * Enumerate Operations for the given ManagedZone.
   * (managedZoneOperations.listManagedZoneOperations)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server will decide how many results to return.
   * @opt_param string sortBy Sorting criterion. The only supported values are
   * START_TIME and ID.
   * @return Google_Service_Dns_ManagedZoneOperationsListResponse
   */
  public function listManagedZoneOperations($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_ManagedZoneOperationsListResponse");
  }
}
