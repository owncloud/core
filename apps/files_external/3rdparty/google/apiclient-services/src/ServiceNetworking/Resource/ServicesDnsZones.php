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

namespace Google\Service\ServiceNetworking\Resource;

use Google\Service\ServiceNetworking\AddDnsZoneRequest;
use Google\Service\ServiceNetworking\Operation;
use Google\Service\ServiceNetworking\RemoveDnsZoneRequest;

/**
 * The "dnsZones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicenetworkingService = new Google\Service\ServiceNetworking(...);
 *   $dnsZones = $servicenetworkingService->dnsZones;
 *  </code>
 */
class ServicesDnsZones extends \Google\Service\Resource
{
  /**
   * Service producers can use this method to add private DNS zones in the shared
   * producer host project and matching peering zones in the consumer project.
   * (dnsZones.add)
   *
   * @param string $parent Required. The service that is managing peering
   * connectivity for a service producer's organization. For Google services that
   * support this functionality, this value is
   * `services/servicenetworking.googleapis.com`.
   * @param AddDnsZoneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function add($parent, AddDnsZoneRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('add', [$params], Operation::class);
  }
  /**
   * Service producers can use this method to remove private DNS zones in the
   * shared producer host project and matching peering zones in the consumer
   * project. (dnsZones.remove)
   *
   * @param string $parent Required. The service that is managing peering
   * connectivity for a service producer's organization. For Google services that
   * support this functionality, this value is
   * `services/servicenetworking.googleapis.com`.
   * @param RemoveDnsZoneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function remove($parent, RemoveDnsZoneRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('remove', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServicesDnsZones::class, 'Google_Service_ServiceNetworking_Resource_ServicesDnsZones');
