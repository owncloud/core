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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\ListNetworkUsageResponse;
use Google\Service\Baremetalsolution\ListNetworksResponse;
use Google\Service\Baremetalsolution\Network;
use Google\Service\Baremetalsolution\Operation;

/**
 * The "networks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $networks = $baremetalsolutionService->networks;
 *  </code>
 */
class ProjectsLocationsNetworks extends \Google\Service\Resource
{
  /**
   * Get details of a single network. (networks.get)
   *
   * @param string $name Required. Name of the resource.
   * @param array $optParams Optional parameters.
   * @return Network
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Network::class);
  }
  /**
   * List network in a given project and location.
   * (networks.listProjectsLocationsNetworks)
   *
   * @param string $parent Required. Parent value for ListNetworksRequest.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param int pageSize Requested page size. The server might return fewer
   * items than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results from the
   * server.
   * @return ListNetworksResponse
   */
  public function listProjectsLocationsNetworks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNetworksResponse::class);
  }
  /**
   * List all Networks (and used IPs for each Network) in the vendor account
   * associated with the specified project. (networks.listNetworkUsage)
   *
   * @param string $location Required. Parent value (project and location).
   * @param array $optParams Optional parameters.
   * @return ListNetworkUsageResponse
   */
  public function listNetworkUsage($location, $optParams = [])
  {
    $params = ['location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('listNetworkUsage', [$params], ListNetworkUsageResponse::class);
  }
  /**
   * Update details of a single network. (networks.patch)
   *
   * @param string $name Output only. The resource name of this `Network`.
   * Resource names are schemeless URIs that follow the conventions in
   * https://cloud.google.com/apis/design/resource_names. Format:
   * `projects/{project}/locations/{location}/networks/{network}`
   * @param Network $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to update. The only currently
   * supported fields are: `labels`, `reservations`, `vrf.vlan_attachments`
   * @return Operation
   */
  public function patch($name, Network $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsNetworks::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsNetworks');
