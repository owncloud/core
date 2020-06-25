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
   * (managedZones.create)
   *
   * @param string $project
   * @param Google_Service_Dns_ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_ManagedZone
   */
  public function create($project, Google_Service_Dns_ManagedZone $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_ManagedZone");
  }
  /**
   * (managedZones.delete)
   *
   * @param string $project
   * @param string $managedZone
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   */
  public function delete($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * (managedZones.get)
   *
   * @param string $project
   * @param string $managedZone
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_ManagedZone
   */
  public function get($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_ManagedZone");
  }
  /**
   * (managedZones.listManagedZones)
   *
   * @param string $project
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dnsName
   * @opt_param int maxResults
   * @opt_param string pageToken
   * @return Google_Service_Dns_ManagedZonesListResponse
   */
  public function listManagedZones($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_ManagedZonesListResponse");
  }
  /**
   * (managedZones.patch)
   *
   * @param string $project
   * @param string $managedZone
   * @param Google_Service_Dns_ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_Operation
   */
  public function patch($project, $managedZone, Google_Service_Dns_ManagedZone $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dns_Operation");
  }
  /**
   * (managedZones.update)
   *
   * @param string $project
   * @param string $managedZone
   * @param Google_Service_Dns_ManagedZone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_Operation
   */
  public function update($project, $managedZone, Google_Service_Dns_ManagedZone $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dns_Operation");
  }
}
