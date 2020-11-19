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
 * The "managedZones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $managedZones = $dnsService->managedZones;
 *  </code>
 */
class Google_Service_Dns_Resource_ManagedZones extends Google_Service_Resource
{
  /**
   * Create a new ManagedZone. (managedZones.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param Google_Service_Dns_ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_ManagedZone
   */
  public function create($project, Google_Service_Dns_ManagedZone $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_ManagedZone");
  }
  /**
   * Delete a previously created ManagedZone. (managedZones.delete)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   */
  public function delete($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Fetch the representation of an existing ManagedZone. (managedZones.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_ManagedZone
   */
  public function get($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_ManagedZone");
  }
  /**
   * Enumerate ManagedZones that have been created but not yet deleted.
   * (managedZones.listManagedZones)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server will decide how many results to return.
   * @opt_param string dnsName Restricts the list to return only zones with this
   * domain name.
   * @return Google_Service_Dns_ManagedZonesListResponse
   */
  public function listManagedZones($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_ManagedZonesListResponse");
  }
  /**
   * Apply a partial update to an existing ManagedZone. (managedZones.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param Google_Service_Dns_ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_Operation
   */
  public function patch($project, $managedZone, Google_Service_Dns_ManagedZone $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dns_Operation");
  }
  /**
   * Update an existing ManagedZone. (managedZones.update)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param Google_Service_Dns_ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_Operation
   */
  public function update($project, $managedZone, Google_Service_Dns_ManagedZone $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dns_Operation");
  }
}
