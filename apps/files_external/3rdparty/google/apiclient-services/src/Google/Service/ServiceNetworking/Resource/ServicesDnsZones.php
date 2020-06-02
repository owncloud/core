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
 * The "dnsZones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicenetworkingService = new Google_Service_ServiceNetworking(...);
 *   $dnsZones = $servicenetworkingService->dnsZones;
 *  </code>
 */
class Google_Service_ServiceNetworking_Resource_ServicesDnsZones extends Google_Service_Resource
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
   * @param Google_Service_ServiceNetworking_AddDnsZoneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceNetworking_Operation
   */
  public function add($parent, Google_Service_ServiceNetworking_AddDnsZoneRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('add', array($params), "Google_Service_ServiceNetworking_Operation");
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
   * @param Google_Service_ServiceNetworking_RemoveDnsZoneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceNetworking_Operation
   */
  public function remove($parent, Google_Service_ServiceNetworking_RemoveDnsZoneRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('remove', array($params), "Google_Service_ServiceNetworking_Operation");
  }
}
