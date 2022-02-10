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

use Google\Service\Compute\ForwardingRule;
use Google\Service\Compute\ForwardingRuleList;
use Google\Service\Compute\GlobalSetLabelsRequest;
use Google\Service\Compute\Operation;
use Google\Service\Compute\TargetReference;

/**
 * The "globalForwardingRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $globalForwardingRules = $computeService->globalForwardingRules;
 *  </code>
 */
class GlobalForwardingRules extends \Google\Service\Resource
{
  /**
   * Deletes the specified GlobalForwardingRule resource.
   * (globalForwardingRules.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $forwardingRule Name of the ForwardingRule resource to delete.
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
  public function delete($project, $forwardingRule, $optParams = [])
  {
    $params = ['project' => $project, 'forwardingRule' => $forwardingRule];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified GlobalForwardingRule resource. Gets a list of available
   * forwarding rules by making a list() request. (globalForwardingRules.get)
   *
   * @param string $project Project ID for this request.
   * @param string $forwardingRule Name of the ForwardingRule resource to return.
   * @param array $optParams Optional parameters.
   * @return ForwardingRule
   */
  public function get($project, $forwardingRule, $optParams = [])
  {
    $params = ['project' => $project, 'forwardingRule' => $forwardingRule];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ForwardingRule::class);
  }
  /**
   * Creates a GlobalForwardingRule resource in the specified project using the
   * data included in the request. (globalForwardingRules.insert)
   *
   * @param string $project Project ID for this request.
   * @param ForwardingRule $postBody
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
  public function insert($project, ForwardingRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves a list of GlobalForwardingRule resources available to the specified
   * project. (globalForwardingRules.listGlobalForwardingRules)
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
   * @return ForwardingRuleList
   */
  public function listGlobalForwardingRules($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ForwardingRuleList::class);
  }
  /**
   * Updates the specified forwarding rule with the data included in the request.
   * This method supports PATCH semantics and uses the JSON merge patch format and
   * processing rules. Currently, you can only patch the network_tier field.
   * (globalForwardingRules.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $forwardingRule Name of the ForwardingRule resource to patch.
   * @param ForwardingRule $postBody
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
  public function patch($project, $forwardingRule, ForwardingRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'forwardingRule' => $forwardingRule, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the labels on the specified resource. To learn more about labels, read
   * the Labeling resources documentation. (globalForwardingRules.setLabels)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param GlobalSetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setLabels($project, $resource, GlobalSetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLabels', [$params], Operation::class);
  }
  /**
   * Changes target URL for the GlobalForwardingRule resource. The new target
   * should be of the same type as the old target.
   * (globalForwardingRules.setTarget)
   *
   * @param string $project Project ID for this request.
   * @param string $forwardingRule Name of the ForwardingRule resource in which
   * target is to be set.
   * @param TargetReference $postBody
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
  public function setTarget($project, $forwardingRule, TargetReference $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'forwardingRule' => $forwardingRule, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setTarget', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GlobalForwardingRules::class, 'Google_Service_Compute_Resource_GlobalForwardingRules');
