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

use Google\Service\Compute\BackendService;
use Google\Service\Compute\BackendServiceAggregatedList;
use Google\Service\Compute\BackendServiceGroupHealth;
use Google\Service\Compute\BackendServiceList;
use Google\Service\Compute\Operation;
use Google\Service\Compute\ResourceGroupReference;
use Google\Service\Compute\SecurityPolicyReference;
use Google\Service\Compute\SignedUrlKey;

/**
 * The "backendServices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $backendServices = $computeService->backendServices;
 *  </code>
 */
class BackendServices extends \Google\Service\Resource
{
  /**
   * Adds a key for validating requests with signed URLs for this backend service.
   * (backendServices.addSignedUrlKey)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to which
   * the Signed URL Key should be added. The name should conform to RFC1035.
   * @param SignedUrlKey $postBody
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
  public function addSignedUrlKey($project, $backendService, SignedUrlKey $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addSignedUrlKey', [$params], Operation::class);
  }
  /**
   * Retrieves the list of all BackendService resources, regional and global,
   * available to the specified project. (backendServices.aggregatedList)
   *
   * @param string $project Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
   * (scheduling.automaticRestart = true) ```
   * @opt_param bool includeAllScopes Indicates whether every visible scope for
   * each scope type (zone, region, global) should be included in the response.
   * For new resource types added after this field, the flag has no effect as new
   * resource types will always include every visible scope for each scope type in
   * response. For resource types which predate this field, if this flag is
   * omitted or false, only scopes of the scope types where the resource type is
   * expected to be found will be included.
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
   * @return BackendServiceAggregatedList
   */
  public function aggregatedList($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', [$params], BackendServiceAggregatedList::class);
  }
  /**
   * Deletes the specified BackendService resource. (backendServices.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to delete.
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
  public function delete($project, $backendService, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Deletes a key for validating requests with signed URLs for this backend
   * service. (backendServices.deleteSignedUrlKey)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to which
   * the Signed URL Key should be added. The name should conform to RFC1035.
   * @param string $keyName The name of the Signed URL Key to delete.
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
  public function deleteSignedUrlKey($project, $backendService, $keyName, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService, 'keyName' => $keyName];
    $params = array_merge($params, $optParams);
    return $this->call('deleteSignedUrlKey', [$params], Operation::class);
  }
  /**
   * Returns the specified BackendService resource. Gets a list of available
   * backend services. (backendServices.get)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to return.
   * @param array $optParams Optional parameters.
   * @return BackendService
   */
  public function get($project, $backendService, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BackendService::class);
  }
  /**
   * Gets the most recent health check results for this BackendService. Example
   * request body: { "group": "/zones/us-east1-b/instanceGroups/lb-backend-
   * example" } (backendServices.getHealth)
   *
   * @param string $project
   * @param string $backendService Name of the BackendService resource to which
   * the queried instance belongs.
   * @param ResourceGroupReference $postBody
   * @param array $optParams Optional parameters.
   * @return BackendServiceGroupHealth
   */
  public function getHealth($project, $backendService, ResourceGroupReference $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getHealth', [$params], BackendServiceGroupHealth::class);
  }
  /**
   * Creates a BackendService resource in the specified project using the data
   * included in the request. For more information, see Backend services overview
   * . (backendServices.insert)
   *
   * @param string $project Project ID for this request.
   * @param BackendService $postBody
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
  public function insert($project, BackendService $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves the list of BackendService resources available to the specified
   * project. (backendServices.listBackendServices)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
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
   * @return BackendServiceList
   */
  public function listBackendServices($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BackendServiceList::class);
  }
  /**
   * Patches the specified BackendService resource with the data included in the
   * request. For more information, see Backend services overview. This method
   * supports PATCH semantics and uses the JSON merge patch format and processing
   * rules. (backendServices.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to patch.
   * @param BackendService $postBody
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
  public function patch($project, $backendService, BackendService $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the Google Cloud Armor security policy for the specified backend
   * service. For more information, see Google Cloud Armor Overview
   * (backendServices.setSecurityPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to which
   * the security policy should be set. The name should conform to RFC1035.
   * @param SecurityPolicyReference $postBody
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
  public function setSecurityPolicy($project, $backendService, SecurityPolicyReference $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setSecurityPolicy', [$params], Operation::class);
  }
  /**
   * Updates the specified BackendService resource with the data included in the
   * request. For more information, see Backend services overview.
   * (backendServices.update)
   *
   * @param string $project Project ID for this request.
   * @param string $backendService Name of the BackendService resource to update.
   * @param BackendService $postBody
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
  public function update($project, $backendService, BackendService $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendServices::class, 'Google_Service_Compute_Resource_BackendServices');
