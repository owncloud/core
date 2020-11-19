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
 * The "licenses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $licenses = $computeService->licenses;
 *  </code>
 */
class Google_Service_Compute_Resource_Licenses extends Google_Service_Resource
{
  /**
   * Deletes the specified license.  Caution This resource is intended for use
   * only by third-party partners who are creating Cloud Marketplace images.
   * (licenses.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $license Name of the license resource to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function delete($project, $license, $optParams = array())
  {
    $params = array('project' => $project, 'license' => $license);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified License resource.  Caution This resource is intended
   * for use only by third-party partners who are creating Cloud Marketplace
   * images. (licenses.get)
   *
   * @param string $project Project ID for this request.
   * @param string $license Name of the License resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_License
   */
  public function get($project, $license, $optParams = array())
  {
    $params = array('project' => $project, 'license' => $license);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_License");
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists.  Caution This resource is intended for use only by third-
   * party partners who are creating Cloud Marketplace images.
   * (licenses.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Google_Service_Compute_Policy
   */
  public function getIamPolicy($project, $resource, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Create a License resource in the specified project.  Caution This resource is
   * intended for use only by third-party partners who are creating Cloud
   * Marketplace images. (licenses.insert)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_License $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function insert($project, Google_Service_Compute_License $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of licenses available in the specified project. This
   * method does not get any licenses that belong to other projects, including
   * licenses attached to publicly-available images, like Debian 9. If you want to
   * get a list of publicly-available licenses, use this method to make a request
   * to the respective image project, such as debian-cloud or windows-cloud.
   * Caution This resource is intended for use only by third-party partners who
   * are creating Cloud Marketplace images. (licenses.listLicenses)
   *
   * @param string $project Project ID for this request.
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
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is false
   * and the logic is the same as today.
   * @return Google_Service_Compute_LicensesListResponse
   */
  public function listLicenses($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_LicensesListResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.  Caution This resource is intended for use only by third-
   * party partners who are creating Cloud Marketplace images.
   * (licenses.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_GlobalSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Policy
   */
  public function setIamPolicy($project, $resource, Google_Service_Compute_GlobalSetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource.  Caution
   * This resource is intended for use only by third-party partners who are
   * creating Cloud Marketplace images. (licenses.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, Google_Service_Compute_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Compute_TestPermissionsResponse");
  }
}
