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

namespace Google\Service\DeploymentManager\Resource;

use Google\Service\DeploymentManager\Manifest;
use Google\Service\DeploymentManager\ManifestsListResponse;

/**
 * The "manifests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google\Service\DeploymentManager(...);
 *   $manifests = $deploymentmanagerService->manifests;
 *  </code>
 */
class Manifests extends \Google\Service\Resource
{
  /**
   * Gets information about a specific manifest. (manifests.get)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param string $manifest The name of the manifest for this request.
   * @param array $optParams Optional parameters.
   * @return Manifest
   */
  public function get($project, $deployment, $manifest, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment, 'manifest' => $manifest];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Manifest::class);
  }
  /**
   * Lists all manifests for a given deployment. (manifests.listManifests)
   *
   * @param string $project The project ID for this request.
   * @param string $deployment The name of the deployment for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. Most Compute resources support two types of filter expressions:
   * expressions that support regular expressions and expressions that follow API
   * improvement proposal AIP-160. If you want to use AIP-160, your expression
   * must specify the field name, an operator, and the value that you want to use
   * for filtering. The value must be a string, a number, or a boolean. The
   * operator must be either `=`, `!=`, `>`, `<`, `<=`, `>=` or `:`. For example,
   * if you are filtering Compute Engine instances, you can exclude instances
   * named `example-instance` by specifying `name != example-instance`. The `:`
   * operator can be used with string fields to match substrings. For non-string
   * fields it is equivalent to the `=` operator. The `:*` comparison can be used
   * to test whether a key has been defined. For example, to find all objects with
   * `owner` label use: ``` labels.owner:* ``` You can also filter nested fields.
   * For example, you could specify `scheduling.automaticRestart = false` to
   * include instances only if they are not scheduled for automatic restarts. You
   * can use filtering on nested fields to filter based on resource labels. To
   * filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ``` If you want to use a
   * regular expression, use the `eq` (equal) or `ne` (not equal) operator against
   * a single un-parenthesized expression with or without quotes or against
   * multiple parenthesized expressions. Examples: `fieldname eq unquoted literal`
   * `fieldname eq 'single quoted literal'` `fieldname eq "double quoted literal"`
   * `(fieldname1 eq literal) (fieldname2 ne "literal")` The literal value is
   * interpreted as a regular expression using Google RE2 library syntax. The
   * literal value must match the entire field. For example, to filter for
   * instances that do not end with name "instance", you would use `name ne
   * .*instance`.
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
   * @return ManifestsListResponse
   */
  public function listManifests($project, $deployment, $optParams = [])
  {
    $params = ['project' => $project, 'deployment' => $deployment];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ManifestsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Manifests::class, 'Google_Service_DeploymentManager_Resource_Manifests');
