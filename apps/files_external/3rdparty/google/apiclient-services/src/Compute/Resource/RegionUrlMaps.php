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
use Google\Service\Compute\RegionUrlMapsValidateRequest;
use Google\Service\Compute\UrlMap;
use Google\Service\Compute\UrlMapList;
use Google\Service\Compute\UrlMapsValidateResponse;

/**
 * The "regionUrlMaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $regionUrlMaps = $computeService->regionUrlMaps;
 *  </code>
 */
class RegionUrlMaps extends \Google\Service\Resource
{
  /**
   * Deletes the specified UrlMap resource. (regionUrlMaps.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Operation
   */
  public function delete($project, $region, $urlMap, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'urlMap' => $urlMap];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified UrlMap resource. Gets a list of available URL maps by
   * making a list() request. (regionUrlMaps.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to return.
   * @param array $optParams Optional parameters.
   * @return UrlMap
   */
  public function get($project, $region, $urlMap, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'urlMap' => $urlMap];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UrlMap::class);
  }
  /**
   * Creates a UrlMap resource in the specified project using the data included in
   * the request. (regionUrlMaps.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param UrlMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Operation
   */
  public function insert($project, $region, UrlMap $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves the list of UrlMap resources available to the specified project in
   * the specified region. (regionUrlMaps.listRegionUrlMaps)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
   * @return UrlMapList
   */
  public function listRegionUrlMaps($project, $region, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], UrlMapList::class);
  }
  /**
   * Patches the specified UrlMap resource with the data included in the request.
   * This method supports PATCH semantics and uses JSON merge patch format and
   * processing rules. (regionUrlMaps.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to patch.
   * @param UrlMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Operation
   */
  public function patch($project, $region, $urlMap, UrlMap $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'urlMap' => $urlMap, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Updates the specified UrlMap resource with the data included in the request.
   * (regionUrlMaps.update)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to update.
   * @param UrlMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Operation
   */
  public function update($project, $region, $urlMap, UrlMap $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'urlMap' => $urlMap, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
  /**
   * Runs static validation for the UrlMap. In particular, the tests of the
   * provided UrlMap will be run. Calling this method does NOT create the UrlMap.
   * (regionUrlMaps.validate)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to be validated as.
   * @param RegionUrlMapsValidateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UrlMapsValidateResponse
   */
  public function validate($project, $region, $urlMap, RegionUrlMapsValidateRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'urlMap' => $urlMap, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('validate', [$params], UrlMapsValidateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionUrlMaps::class, 'Google_Service_Compute_Resource_RegionUrlMaps');
