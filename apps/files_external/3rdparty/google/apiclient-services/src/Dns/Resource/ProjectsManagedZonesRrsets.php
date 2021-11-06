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

use Google\Service\Dns\ResourceRecordSet;
use Google\Service\Dns\ResourceRecordSetsDeleteResponse;

/**
 * The "rrsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $rrsets = $dnsService->rrsets;
 *  </code>
 */
class ProjectsManagedZonesRrsets extends \Google\Service\Resource
{
  /**
   * Creates a new ResourceRecordSet. (rrsets.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param ResourceRecordSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResourceRecordSet
   */
  public function create($project, $managedZone, ResourceRecordSet $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ResourceRecordSet::class);
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
   * @return ResourceRecordSetsDeleteResponse
   */
  public function delete($project, $managedZone, $name, $type, $optParams = [])
  {
    $params = ['project' => $project, 'managedZone' => $managedZone, 'name' => $name, 'type' => $type];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ResourceRecordSetsDeleteResponse::class);
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
   * @return ResourceRecordSet
   */
  public function get($project, $managedZone, $name, $type, $optParams = [])
  {
    $params = ['project' => $project, 'managedZone' => $managedZone, 'name' => $name, 'type' => $type];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ResourceRecordSet::class);
  }
  /**
   * Applies a partial update to an existing ResourceRecordSet. (rrsets.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or ID.
   * @param string $name Fully qualified domain name.
   * @param string $type RRSet type.
   * @param ResourceRecordSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResourceRecordSet
   */
  public function patch($project, $managedZone, $name, $type, ResourceRecordSet $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'managedZone' => $managedZone, 'name' => $name, 'type' => $type, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ResourceRecordSet::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsManagedZonesRrsets::class, 'Google_Service_Dns_Resource_ProjectsManagedZonesRrsets');
