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

namespace Google\Service\Compute\Resource;

use Google\Service\Compute\ExchangedPeeringRoutesList;
use Google\Service\Compute\Network;
use Google\Service\Compute\NetworkList;
use Google\Service\Compute\NetworksAddPeeringRequest;
use Google\Service\Compute\NetworksGetEffectiveFirewallsResponse;
use Google\Service\Compute\NetworksRemovePeeringRequest;
use Google\Service\Compute\NetworksUpdatePeeringRequest;
use Google\Service\Compute\Operation;

/**
 * The "networks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $networks = $computeService->networks;
 *  </code>
 */
class Networks extends \Google\Service\Resource
{
  /**
   * Adds a peering to the specified network. (networks.addPeering)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network resource to add peering to.
   * @param NetworksAddPeeringRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function addPeering($project, $network, NetworksAddPeeringRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addPeering', [$params], Operation::class);
  }
  /**
   * Deletes the specified network. (networks.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($project, $network, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified network. Gets a list of available networks by making a
   * list() request. (networks.get)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network to return.
   * @param array $optParams Optional parameters.
   * @return Network
   */
  public function get($project, $network, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Network::class);
  }
  /**
   * Returns the effective firewalls on a given network.
   * (networks.getEffectiveFirewalls)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network for this request.
   * @param array $optParams Optional parameters.
   * @return NetworksGetEffectiveFirewallsResponse
   */
  public function getEffectiveFirewalls($project, $network, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network];
    $params = array_merge($params, $optParams);
    return $this->call('getEffectiveFirewalls', [$params], NetworksGetEffectiveFirewallsResponse::class);
  }
  /**
   * Creates a network in the specified project using the data included in the
   * request. (networks.insert)
   *
   * @param string $project Project ID for this request.
   * @param Network $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function insert($project, Network $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves the list of networks available to the specified project.
   * (networks.listNetworks)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, an operator, and
   * the value that you want to use for filtering. The value must be a string, a
   * number, or a boolean. The operator must be either `=`, `!=`, `>`, `<`, `<=`,
   * `>=` or `:`. For example, if you are filtering Compute Engine instances, you
   * can exclude instances named `example-instance` by specifying `name !=
   * example-instance`. The `:` operator can be used with string fields to match
   * substrings. For non-string fields it is equivalent to the `=` operator. The
   * `:*` comparison can be used to test whether a key has been defined. For
   * example, to find all objects with `owner` label use: ``` labels.owner:* ```
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels. To filter on multiple expressions,
   * provide each separate expression within parentheses. For example: ```
   * (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By
   * default, each expression is an `AND` expression. However, you can include
   * `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel
   * Skylake") OR (cpuPlatform = "Intel Broadwell") AND
   * (scheduling.automaticRestart = true) ```
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return NetworkList
   */
  public function listNetworks($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], NetworkList::class);
  }
  /**
   * Lists the peering routes exchanged over peering connection.
   * (networks.listPeeringRoutes)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string direction The direction of the exchanged routes.
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, an operator, and
   * the value that you want to use for filtering. The value must be a string, a
   * number, or a boolean. The operator must be either `=`, `!=`, `>`, `<`, `<=`,
   * `>=` or `:`. For example, if you are filtering Compute Engine instances, you
   * can exclude instances named `example-instance` by specifying `name !=
   * example-instance`. The `:` operator can be used with string fields to match
   * substrings. For non-string fields it is equivalent to the `=` operator. The
   * `:*` comparison can be used to test whether a key has been defined. For
   * example, to find all objects with `owner` label use: ``` labels.owner:* ```
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels. To filter on multiple expressions,
   * provide each separate expression within parentheses. For example: ```
   * (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By
   * default, each expression is an `AND` expression. However, you can include
   * `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel
   * Skylake") OR (cpuPlatform = "Intel Broadwell") AND
   * (scheduling.automaticRestart = true) ```
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param string peeringName The response will show routes exchanged over
   * the given peering connection.
   * @opt_param string region The region of the request. The response will include
   * all subnet routes, static routes and dynamic routes in the region.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return ExchangedPeeringRoutesList
   */
  public function listPeeringRoutes($project, $network, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network];
    $params = array_merge($params, $optParams);
    return $this->call('listPeeringRoutes', [$params], ExchangedPeeringRoutesList::class);
  }
  /**
   * Patches the specified network with the data included in the request. Only the
   * following fields can be modified: routingConfig.routingMode. (networks.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network to update.
   * @param Network $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function patch($project, $network, Network $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Removes a peering from the specified network. (networks.removePeering)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network resource to remove peering from.
   * @param NetworksRemovePeeringRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function removePeering($project, $network, NetworksRemovePeeringRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removePeering', [$params], Operation::class);
  }
  /**
   * Switches the network mode from auto subnet mode to custom subnet mode.
   * (networks.switchToCustomMode)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network to be updated.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function switchToCustomMode($project, $network, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network];
    $params = array_merge($params, $optParams);
    return $this->call('switchToCustomMode', [$params], Operation::class);
  }
  /**
   * Updates the specified network peering with the data included in the request.
   * You can only modify the NetworkPeering.export_custom_routes field and the
   * NetworkPeering.import_custom_routes field. (networks.updatePeering)
   *
   * @param string $project Project ID for this request.
   * @param string $network Name of the network resource which the updated peering
   * is belonging to.
   * @param NetworksUpdatePeeringRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function updatePeering($project, $network, NetworksUpdatePeeringRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'network' => $network, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatePeering', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Networks::class, 'Google_Service_Compute_Resource_Networks');
