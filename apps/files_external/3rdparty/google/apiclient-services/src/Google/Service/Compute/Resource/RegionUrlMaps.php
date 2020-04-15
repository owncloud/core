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
 * The "regionUrlMaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $regionUrlMaps = $computeService->regionUrlMaps;
 *  </code>
 */
class Google_Service_Compute_Resource_RegionUrlMaps extends Google_Service_Resource
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
   * @return Google_Service_Compute_Operation
   */
  public function delete($project, $region, $urlMap, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'urlMap' => $urlMap);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified UrlMap resource. Gets a list of available URL maps by
   * making a list() request. (regionUrlMaps.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_UrlMap
   */
  public function get($project, $region, $urlMap, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'urlMap' => $urlMap);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_UrlMap");
  }
  /**
   * Creates a UrlMap resource in the specified project using the data included in
   * the request. (regionUrlMaps.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param Google_Service_Compute_UrlMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Google_Service_Compute_Operation
   */
  public function insert($project, $region, Google_Service_Compute_UrlMap $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
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
   * `!=`, `>`, or `<`.
   *
   * For example, if you are filtering Compute Engine instances, you can exclude
   * instances named `example-instance` by specifying `name != example-instance`.
   *
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels.
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ```
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first.
   *
   * Currently, only sorting by `name` or `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @return Google_Service_Compute_UrlMapList
   */
  public function listRegionUrlMaps($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_UrlMapList");
  }
  /**
   * Patches the specified UrlMap resource with the data included in the request.
   * This method supports PATCH semantics and uses JSON merge patch format and
   * processing rules. (regionUrlMaps.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to patch.
   * @param Google_Service_Compute_UrlMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Google_Service_Compute_Operation
   */
  public function patch($project, $region, $urlMap, Google_Service_Compute_UrlMap $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'urlMap' => $urlMap, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Updates the specified UrlMap resource with the data included in the request.
   * (regionUrlMaps.update)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to update.
   * @param Google_Service_Compute_UrlMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId begin_interface: MixerMutationRequestBuilder
   * Request ID to support idempotency.
   * @return Google_Service_Compute_Operation
   */
  public function update($project, $region, $urlMap, Google_Service_Compute_UrlMap $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'urlMap' => $urlMap, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Runs static validation for the UrlMap. In particular, the tests of the
   * provided UrlMap will be run. Calling this method does NOT create the UrlMap.
   * (regionUrlMaps.validate)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $urlMap Name of the UrlMap resource to be validated as.
   * @param Google_Service_Compute_RegionUrlMapsValidateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_UrlMapsValidateResponse
   */
  public function validate($project, $region, $urlMap, Google_Service_Compute_RegionUrlMapsValidateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'urlMap' => $urlMap, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_Compute_UrlMapsValidateResponse");
  }
}
