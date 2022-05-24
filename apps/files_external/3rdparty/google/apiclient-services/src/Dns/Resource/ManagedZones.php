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

use Google\Service\Dns\ManagedZone;
use Google\Service\Dns\ManagedZonesListResponse;
use Google\Service\Dns\Operation;

/**
 * The "managedZones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $managedZones = $dnsService->managedZones;
 *  </code>
 */
class ManagedZones extends \Google\Service\Resource
{
  /**
   * Creates a new ManagedZone. (managedZones.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ManagedZone
   */
  public function create($project, $location, ManagedZone $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ManagedZone::class);
  }
  /**
   * Deletes a previously created ManagedZone. (managedZones.delete)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   */
  public function delete($project, $location, $managedZone, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'managedZone' => $managedZone];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Fetches the representation of an existing ManagedZone. (managedZones.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ManagedZone
   */
  public function get($project, $location, $managedZone, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'managedZone' => $managedZone];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ManagedZone::class);
  }
  /**
   * Enumerates ManagedZones that have been created but not yet deleted.
   * (managedZones.listManagedZones)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dnsName Restricts the list to return only zones with this
   * domain name.
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server decides how many results to return.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @return ManagedZonesListResponse
   */
  public function listManagedZones($project, $location, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ManagedZonesListResponse::class);
  }
  /**
   * Applies a partial update to an existing ManagedZone. (managedZones.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Operation
   */
  public function patch($project, $location, $managedZone, ManagedZone $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'managedZone' => $managedZone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Updates an existing ManagedZone. (managedZones.update)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Operation
   */
  public function update($project, $location, $managedZone, ManagedZone $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'managedZone' => $managedZone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedZones::class, 'Google_Service_Dns_Resource_ManagedZones');
