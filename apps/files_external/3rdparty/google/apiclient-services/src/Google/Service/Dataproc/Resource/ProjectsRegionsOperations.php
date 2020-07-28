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
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $operations = $dataprocService->operations;
 *  </code>
 */
class Google_Service_Dataproc_Resource_ProjectsRegionsOperations extends Google_Service_Resource
{
  /**
   * Starts asynchronous cancellation on a long-running operation. The server
   * makes a best effort to cancel the operation, but success is not guaranteed.
   * If the server doesn't support this method, it returns
   * google.rpc.Code.UNIMPLEMENTED. Clients can use Operations.GetOperation or
   * other methods to check whether the cancellation succeeded or whether the
   * operation completed despite cancellation. On successful cancellation, the
   * operation is not deleted; instead, it becomes an operation with an
   * Operation.error value with a google.rpc.Status.code of 1, corresponding to
   * Code.CANCELLED. (operations.cancel)
   *
   * @param string $name The name of the operation resource to be cancelled.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_DataprocEmpty
   */
  public function cancel($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Dataproc_DataprocEmpty");
  }
  /**
   * Deletes a long-running operation. This method indicates that the client is no
   * longer interested in the operation result. It does not cancel the operation.
   * If the server doesn't support this method, it returns
   * google.rpc.Code.UNIMPLEMENTED. (operations.delete)
   *
   * @param string $name The name of the operation resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_DataprocEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataproc_DataprocEmpty");
  }
  /**
   * Gets the latest state of a long-running operation. Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataproc_Operation");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (operations.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Dataproc_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Policy
   */
  public function getIamPolicy($resource, Google_Service_Dataproc_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Dataproc_Policy");
  }
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns UNIMPLEMENTED.NOTE: the name
   * binding allows API services to override the binding to use different resource
   * name schemes, such as users/operations. To override the binding, API services
   * can add a binding such as "/v1/{name=users}/operations" to their service
   * configuration. For backwards compatibility, the default name includes the
   * operations collection id, however overriding users must ensure the name
   * binding is the parent resource, without the operations collection id.
   * (operations.listProjectsRegionsOperations)
   *
   * @param string $name The name of the operation's parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The standard list page size.
   * @opt_param string filter The standard list filter.
   * @opt_param string pageToken The standard list page token.
   * @return Google_Service_Dataproc_ListOperationsResponse
   */
  public function listProjectsRegionsOperations($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataproc_ListOperationsResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (operations.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Dataproc_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Policy
   */
  public function setIamPolicy($resource, Google_Service_Dataproc_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Dataproc_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (operations.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Dataproc_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Dataproc_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Dataproc_TestIamPermissionsResponse");
  }
}
