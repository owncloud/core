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
 * The "hl7V2Stores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $hl7V2Stores = $healthcareService->hl7V2Stores;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsHl7V2Stores extends Google_Service_Resource
{
  /**
   * Creates a new HL7v2 store within the parent dataset. (hl7V2Stores.create)
   *
   * @param string $parent The name of the dataset this HL7v2 store belongs to.
   * @param Google_Service_CloudHealthcare_Hl7V2Store $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl7V2StoreId The ID of the HL7v2 store that is being
   * created. The string must match the following regex:
   * `[\p{L}\p{N}_\-\.]{1,256}`.
   * @return Google_Service_CloudHealthcare_Hl7V2Store
   */
  public function create($parent, Google_Service_CloudHealthcare_Hl7V2Store $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_Hl7V2Store");
  }
  /**
   * Deletes the specified HL7v2 store and removes all messages that are contained
   * within it. (hl7V2Stores.delete)
   *
   * @param string $name The resource name of the HL7v2 store to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Gets the specified HL7v2 store. (hl7V2Stores.get)
   *
   * @param string $name The resource name of the HL7v2 store to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Hl7V2Store
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_Hl7V2Store");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (hl7V2Stores.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned.
   *
   * Valid values are 0, 1, and 3. Requests specifying an invalid value will be
   * rejected.
   *
   * Requests for policies with any conditional bindings must specify version 3.
   * Policies without any conditional bindings may specify any valid value or
   * leave the field unset.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Lists the HL7v2 stores in the given dataset.
   * (hl7V2Stores.listProjectsLocationsDatasetsHl7V2Stores)
   *
   * @param string $parent Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts stores returned to those matching a
   * filter. Syntax:
   * https://cloud.google.com/appengine/docs/standard/python/search/query_strings
   * Only filtering on labels is supported. For example, `labels.key=value`.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @opt_param int pageSize Limit on the number of HL7v2 stores to return in a
   * single response. If zero the default page size of 100 is used.
   * @return Google_Service_CloudHealthcare_ListHl7V2StoresResponse
   */
  public function listProjectsLocationsDatasetsHl7V2Stores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListHl7V2StoresResponse");
  }
  /**
   * Updates the HL7v2 store. (hl7V2Stores.patch)
   *
   * @param string $name Output only. Resource name of the HL7v2 store, of the
   * form
   * `projects/{project_id}/datasets/{dataset_id}/hl7V2Stores/{hl7v2_store_id}`.
   * @param Google_Service_CloudHealthcare_Hl7V2Store $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_CloudHealthcare_Hl7V2Store
   */
  public function patch($name, Google_Service_CloudHealthcare_Hl7V2Store $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_Hl7V2Store");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.
   *
   * Can return Public Errors: NOT_FOUND, INVALID_ARGUMENT and PERMISSION_DENIED
   * (hl7V2Stores.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (hl7V2Stores.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudHealthcare_TestIamPermissionsResponse");
  }
}
