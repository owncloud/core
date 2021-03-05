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
 * The "rowAccessPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $rowAccessPolicies = $bigqueryService->rowAccessPolicies;
 *  </code>
 */
class Google_Service_Bigquery_Resource_RowAccessPolicies extends Google_Service_Resource
{
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (rowAccessPolicies.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Bigquery_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Policy
   */
  public function getIamPolicy($resource, Google_Service_Bigquery_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Bigquery_Policy");
  }
  /**
   * Lists all row access policies on the specified table.
   * (rowAccessPolicies.listRowAccessPolicies)
   *
   * @param string $projectId Required. Project ID of the row access policies to
   * list.
   * @param string $datasetId Required. Dataset ID of row access policies to list.
   * @param string $tableId Required. Table ID of the table to list row access
   * policies.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response page. Leverage the page tokens to iterate through the entire
   * collection.
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results.
   * @return Google_Service_Bigquery_ListRowAccessPoliciesResponse
   */
  public function listRowAccessPolicies($projectId, $datasetId, $tableId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Bigquery_ListRowAccessPoliciesResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (rowAccessPolicies.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Bigquery_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Policy
   */
  public function setIamPolicy($resource, Google_Service_Bigquery_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Bigquery_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (rowAccessPolicies.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Bigquery_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Bigquery_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Bigquery_TestIamPermissionsResponse");
  }
}
