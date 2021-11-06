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

use Google\Service\ServiceNetworking\Connection;
use Google\Service\ServiceNetworking\DeleteConnectionRequest;
use Google\Service\ServiceNetworking\ListConnectionsResponse;
use Google\Service\ServiceNetworking\Operation;

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicenetworkingService = new Google\Service\ServiceNetworking(...);
 *   $connections = $servicenetworkingService->connections;
 *  </code>
 */
class ServicesConnections extends \Google\Service\Resource
{
  /**
   * Creates a private connection that establishes a VPC Network Peering
   * connection to a VPC network in the service producer's organization. The
   * administrator of the service consumer's VPC network invokes this method. The
   * administrator must assign one or more allocated IP ranges for provisioning
   * subnetworks in the service producer's VPC network. This connection is used
   * for all supported services in the service producer's organization, so it only
   * needs to be invoked once. (connections.create)
   *
   * @param string $parent The service that is managing peering connectivity for a
   * service producer's organization. For Google services that support this
   * functionality, this value is `services/servicenetworking.googleapis.com`.
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, Connection $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a private service access connection. (connections.deleteConnection)
   *
   * @param string $name Required. The private service connection that connects to
   * a service producer organization. The name includes both the private service
   * name and the VPC network peering name in the format of
   * `services/{peering_service_name}/connections/{vpc_peering_name}`. For Google
   * services that support this functionality, this is
   * `services/servicenetworking.googleapis.com/connections/servicenetworking-
   * googleapis-com`.
   * @param DeleteConnectionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function deleteConnection($name, DeleteConnectionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deleteConnection', [$params], Operation::class);
  }
  /**
   * List the private connections that are configured in a service consumer's VPC
   * network. (connections.listServicesConnections)
   *
   * @param string $parent The service that is managing peering connectivity for a
   * service producer's organization. For Google services that support this
   * functionality, this value is `services/servicenetworking.googleapis.com`. If
   * you specify `services/-` as the parameter value, all configured peering
   * services are listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string network The name of service consumer's VPC network that's
   * connected with service producer network through a private connection. The
   * network name must be in the following format:
   * `projects/{project}/global/networks/{network}`. {project} is a project
   * number, such as in `12345` that includes the VPC service consumer's VPC
   * network. {network} is the name of the service consumer's VPC network.
   * @return ListConnectionsResponse
   */
  public function listServicesConnections($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectionsResponse::class);
  }
  /**
   * Updates the allocated ranges that are assigned to a connection.
   * (connections.patch)
   *
   * @param string $name The private service connection that connects to a service
   * producer organization. The name includes both the private service name and
   * the VPC network peering name in the format of
   * `services/{peering_service_name}/connections/{vpc_peering_name}`. For Google
   * services that support this functionality, this is
   * `services/servicenetworking.googleapis.com/connections/servicenetworking-
   * googleapis-com`.
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force If a previously defined allocated range is removed,
   * force flag must be set to true.
   * @opt_param string updateMask The update mask. If this is omitted, it defaults
   * to "*". You can only update the listed peering ranges.
   * @return Operation
   */
  public function patch($name, Connection $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServicesConnections::class, 'Google_Service_ServiceNetworking_Resource_ServicesConnections');
