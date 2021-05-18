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
 * The "rrsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $rrsets = $dnsService->rrsets;
 *  </code>
 */
class Google_Service_Dns_Resource_ProjectsManagedZonesRrsets extends Google_Service_Resource
{
  /**
   * Creates a new ResourceRecordSet. (rrsets.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param Google_Service_Dns_ResourceRecordSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_ResourceRecordSet
   */
  public function create($project, $managedZone, Google_Service_Dns_ResourceRecordSet $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_ResourceRecordSet");
  }
  /**
   * Deletes a previously created ResourceRecordSet. (rrsets.delete)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param string $name Fully qualified domain name.
   * @param string $type RRSet type.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_ResourceRecordSetsDeleteResponse
   */
  public function delete($project, $managedZone, $name, $type, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'name' => $name, 'type' => $type);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dns_ResourceRecordSetsDeleteResponse");
  }
  /**
   * Fetches the representation of an existing ResourceRecordSet. (rrsets.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param string $name Fully qualified domain name.
   * @param string $type RRSet type.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_ResourceRecordSet
   */
  public function get($project, $managedZone, $name, $type, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'name' => $name, 'type' => $type);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_ResourceRecordSet");
  }
  /**
   * Applies a partial update to an existing ResourceRecordSet. (rrsets.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param string $name Fully qualified domain name.
   * @param string $type RRSet type.
   * @param Google_Service_Dns_ResourceRecordSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_ResourceRecordSet
   */
  public function patch($project, $managedZone, $name, $type, Google_Service_Dns_ResourceRecordSet $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'name' => $name, 'type' => $type, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dns_ResourceRecordSet");
  }
}
