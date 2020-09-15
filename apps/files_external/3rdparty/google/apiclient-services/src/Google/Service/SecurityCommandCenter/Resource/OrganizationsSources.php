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
 * The "sources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google_Service_SecurityCommandCenter(...);
 *   $sources = $securitycenterService->sources;
 *  </code>
 */
class Google_Service_SecurityCommandCenter_Resource_OrganizationsSources extends Google_Service_Resource
{
  /**
   * Creates a source. (sources.create)
   *
   * @param string $parent Required. Resource name of the new source's parent. Its
   * format should be "organizations/[organization_id]".
   * @param Google_Service_SecurityCommandCenter_Source $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_Source
   */
  public function create($parent, Google_Service_SecurityCommandCenter_Source $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_SecurityCommandCenter_Source");
  }
  /**
   * Gets a source. (sources.get)
   *
   * @param string $name Required. Relative resource name of the source. Its
   * format is "organizations/[organization_id]/source/[source_id]".
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_Source
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SecurityCommandCenter_Source");
  }
  /**
   * Gets the access control policy on the specified Source.
   * (sources.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_SecurityCommandCenter_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_Policy
   */
  public function getIamPolicy($resource, Google_Service_SecurityCommandCenter_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_SecurityCommandCenter_Policy");
  }
  /**
   * Lists all sources belonging to an organization.
   * (sources.listOrganizationsSources)
   *
   * @param string $parent Required. Resource name of the parent of sources to
   * list. Its format should be "organizations/[organization_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The value returned by the last
   * `ListSourcesResponse`; indicates that this is a continuation of a prior
   * `ListSources` call, and that the system should return the next page of data.
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @return Google_Service_SecurityCommandCenter_ListSourcesResponse
   */
  public function listOrganizationsSources($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SecurityCommandCenter_ListSourcesResponse");
  }
  /**
   * Updates a source. (sources.patch)
   *
   * @param string $name The relative resource name of this source. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example: "organizations/{organization_id}/sources/{source_id}"
   * @param Google_Service_SecurityCommandCenter_Source $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the source
   * resource. If empty all mutable fields will be updated.
   * @return Google_Service_SecurityCommandCenter_Source
   */
  public function patch($name, Google_Service_SecurityCommandCenter_Source $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SecurityCommandCenter_Source");
  }
  /**
   * Sets the access control policy on the specified Source.
   * (sources.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_SecurityCommandCenter_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_Policy
   */
  public function setIamPolicy($resource, Google_Service_SecurityCommandCenter_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_SecurityCommandCenter_Policy");
  }
  /**
   * Returns the permissions that a caller has on the specified source.
   * (sources.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_SecurityCommandCenter_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_SecurityCommandCenter_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_SecurityCommandCenter_TestIamPermissionsResponse");
  }
}
