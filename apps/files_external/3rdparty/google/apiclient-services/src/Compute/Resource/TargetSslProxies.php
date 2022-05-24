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

use Google\Service\Compute\Operation;
use Google\Service\Compute\SslPolicyReference;
use Google\Service\Compute\TargetSslProxiesSetBackendServiceRequest;
use Google\Service\Compute\TargetSslProxiesSetCertificateMapRequest;
use Google\Service\Compute\TargetSslProxiesSetProxyHeaderRequest;
use Google\Service\Compute\TargetSslProxiesSetSslCertificatesRequest;
use Google\Service\Compute\TargetSslProxy;
use Google\Service\Compute\TargetSslProxyList;

/**
 * The "targetSslProxies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $targetSslProxies = $computeService->targetSslProxies;
 *  </code>
 */
class TargetSslProxies extends \Google\Service\Resource
{
  /**
   * Deletes the specified TargetSslProxy resource. (targetSslProxies.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource to delete.
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
  public function delete($project, $targetSslProxy, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified TargetSslProxy resource. Gets a list of available
   * target SSL proxies by making a list() request. (targetSslProxies.get)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource to return.
   * @param array $optParams Optional parameters.
   * @return TargetSslProxy
   */
  public function get($project, $targetSslProxy, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TargetSslProxy::class);
  }
  /**
   * Creates a TargetSslProxy resource in the specified project using the data
   * included in the request. (targetSslProxies.insert)
   *
   * @param string $project Project ID for this request.
   * @param TargetSslProxy $postBody
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
  public function insert($project, TargetSslProxy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves the list of TargetSslProxy resources available to the specified
   * project. (targetSslProxies.listTargetSslProxies)
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
   * @return TargetSslProxyList
   */
  public function listTargetSslProxies($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TargetSslProxyList::class);
  }
  /**
   * Changes the BackendService for TargetSslProxy.
   * (targetSslProxies.setBackendService)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * BackendService resource is to be set.
   * @param TargetSslProxiesSetBackendServiceRequest $postBody
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
  public function setBackendService($project, $targetSslProxy, TargetSslProxiesSetBackendServiceRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setBackendService', [$params], Operation::class);
  }
  /**
   * Changes the Certificate Map for TargetSslProxy.
   * (targetSslProxies.setCertificateMap)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * CertificateMap is to be set. The name must be 1-63 characters long, and
   * comply with RFC1035.
   * @param TargetSslProxiesSetCertificateMapRequest $postBody
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
  public function setCertificateMap($project, $targetSslProxy, TargetSslProxiesSetCertificateMapRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setCertificateMap', [$params], Operation::class);
  }
  /**
   * Changes the ProxyHeaderType for TargetSslProxy.
   * (targetSslProxies.setProxyHeader)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * ProxyHeader is to be set.
   * @param TargetSslProxiesSetProxyHeaderRequest $postBody
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
  public function setProxyHeader($project, $targetSslProxy, TargetSslProxiesSetProxyHeaderRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setProxyHeader', [$params], Operation::class);
  }
  /**
   * Changes SslCertificates for TargetSslProxy.
   * (targetSslProxies.setSslCertificates)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose
   * SslCertificate resource is to be set.
   * @param TargetSslProxiesSetSslCertificatesRequest $postBody
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
  public function setSslCertificates($project, $targetSslProxy, TargetSslProxiesSetSslCertificatesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setSslCertificates', [$params], Operation::class);
  }
  /**
   * Sets the SSL policy for TargetSslProxy. The SSL policy specifies the server-
   * side support for SSL features. This affects connections between clients and
   * the SSL proxy load balancer. They do not affect the connection between the
   * load balancer and the backends. (targetSslProxies.setSslPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $targetSslProxy Name of the TargetSslProxy resource whose SSL
   * policy is to be set. The name must be 1-63 characters long, and comply with
   * RFC1035.
   * @param SslPolicyReference $postBody
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
  public function setSslPolicy($project, $targetSslProxy, SslPolicyReference $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'targetSslProxy' => $targetSslProxy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setSslPolicy', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetSslProxies::class, 'Google_Service_Compute_Resource_TargetSslProxies');
