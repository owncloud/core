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

use Google\Service\ServiceNetworking\AddDnsRecordSetRequest;
use Google\Service\ServiceNetworking\Operation;
use Google\Service\ServiceNetworking\RemoveDnsRecordSetRequest;
use Google\Service\ServiceNetworking\UpdateDnsRecordSetRequest;

/**
 * The "dnsRecordSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicenetworkingService = new Google\Service\ServiceNetworking(...);
 *   $dnsRecordSets = $servicenetworkingService->dnsRecordSets;
 *  </code>
 */
class ServicesDnsRecordSets extends \Google\Service\Resource
{
  /**
   * Service producers can use this method to add DNS record sets to private DNS
   * zones in the shared producer host project. (dnsRecordSets.add)
   *
   * @param string $parent Required. The service that is managing peering
   * connectivity for a service producer's organization. For Google services that
   * support this functionality, this value is
   * `services/servicenetworking.googleapis.com`.
   * @param AddDnsRecordSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function add($parent, AddDnsRecordSetRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('add', [$params], Operation::class);
  }
  /**
   * Service producers can use this method to remove DNS record sets from private
   * DNS zones in the shared producer host project. (dnsRecordSets.remove)
   *
   * @param string $parent Required. The service that is managing peering
   * connectivity for a service producer's organization. For Google services that
   * support this functionality, this value is
   * `services/servicenetworking.googleapis.com`.
   * @param RemoveDnsRecordSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function remove($parent, RemoveDnsRecordSetRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('remove', [$params], Operation::class);
  }
  /**
   * Service producers can use this method to update DNS record sets from private
   * DNS zones in the shared producer host project. (dnsRecordSets.update)
   *
   * @param string $parent Required. The service that is managing peering
   * connectivity for a service producer's organization. For Google services that
   * support this functionality, this value is
   * `services/servicenetworking.googleapis.com`.
   * @param UpdateDnsRecordSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function update($parent, UpdateDnsRecordSetRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServicesDnsRecordSets::class, 'Google_Service_ServiceNetworking_Resource_ServicesDnsRecordSets');
