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
 * The "namespaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicedirectoryService = new Google_Service_ServiceDirectory(...);
 *   $namespaces = $servicedirectoryService->namespaces;
 *  </code>
 */
class Google_Service_ServiceDirectory_Resource_ProjectsLocationsNamespaces extends Google_Service_Resource
{
  /**
   * Creates a namespace, and returns the new Namespace. (namespaces.create)
   *
   * @param string $parent Required. The resource name of the project and location
   * the namespace will be created in.
   * @param Google_Service_ServiceDirectory_ServicedirectoryNamespace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string namespaceId Required. The Resource ID must be 1-63
   * characters long, and comply with RFC1035. Specifically, the name must be 1-63
   * characters long and match the regular expression
   * `[a-z](?:[-a-z0-9]{0,61}[a-z0-9])?` which means the first character must be a
   * lowercase letter, and all following characters must be a dash, lowercase
   * letter, or digit, except the last character, which cannot be a dash.
   * @return Google_Service_ServiceDirectory_ServicedirectoryNamespace
   */
  public function create($parent, Google_Service_ServiceDirectory_ServicedirectoryNamespace $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ServiceDirectory_ServicedirectoryNamespace");
  }
  /**
   * Deletes a namespace. This also deletes all services and endpoints in the
   * namespace. (namespaces.delete)
   *
   * @param string $name Required. The name of the namespace to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_ServicedirectoryEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ServiceDirectory_ServicedirectoryEmpty");
  }
  /**
   * Gets a namespace. (namespaces.get)
   *
   * @param string $name Required. The name of the namespace to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_ServicedirectoryNamespace
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceDirectory_ServicedirectoryNamespace");
  }
  /**
   * Gets the IAM Policy for a resource (namespace or service only).
   * (namespaces.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_ServiceDirectory_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_Policy
   */
  public function getIamPolicy($resource, Google_Service_ServiceDirectory_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_ServiceDirectory_Policy");
  }
  /**
   * Lists all namespaces. (namespaces.listProjectsLocationsNamespaces)
   *
   * @param string $parent Required. The resource name of the project and location
   * whose namespaces we'd like to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to list result by.
   *
   * General filter string syntax:    ()  can be "name", or "labels." for map
   * field.  can be "<, >, <=, >=, !=, =, :". Of which ":" means HAS, and is
   * roughly the same as "=".  must be the same data type as field.  can be "AND,
   * OR, NOT".
   *
   * Examples of valid filters: * "labels.owner" returns Namespaces that have a
   * label with the key "owner"   this is the same as "labels:owner". *
   * "labels.protocol=gRPC" returns Namespaces that have key/value
   * "protocol=gRPC". * "name>projects/my-project/locations/us-
   * east/namespaces/namespace-c"   returns Namespaces that have name that is
   * alphabetically later than the   string, so "namespace-e" will be returned but
   * "namespace-a" will not be. * "labels.owner!=sd AND labels.foo=bar" returns
   * Namespaces that have   "owner" in label key but value is not "sd" AND have
   * key/value foo=bar. * "doesnotexist.foo=bar" returns an empty list. Note that
   * Namespace doesn't   have a field called "doesnotexist". Since the filter does
   * not match any   Namespaces, it returns no results.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @opt_param string orderBy Optional. The order to list result by.
   *
   * General order by string syntax:  () (,)  allows values {"name"}  ascending or
   * descending order by . If this is left blank, "asc" is used. Note that an
   * empty order_by string result in default order, which is order by name in
   * ascending order.
   * @opt_param int pageSize Optional. The maximum number of items to return.
   * @return Google_Service_ServiceDirectory_ListNamespacesResponse
   */
  public function listProjectsLocationsNamespaces($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceDirectory_ListNamespacesResponse");
  }
  /**
   * Updates a namespace. (namespaces.patch)
   *
   * @param string $name Immutable. The resource name for the namespace in the
   * format 'projects/locations/namespaces'.
   * @param Google_Service_ServiceDirectory_ServicedirectoryNamespace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. List of fields to be updated in this
   * request.
   * @return Google_Service_ServiceDirectory_ServicedirectoryNamespace
   */
  public function patch($name, Google_Service_ServiceDirectory_ServicedirectoryNamespace $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ServiceDirectory_ServicedirectoryNamespace");
  }
  /**
   * Sets the IAM Policy for a resource (namespace or service only).
   * (namespaces.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_ServiceDirectory_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_Policy
   */
  public function setIamPolicy($resource, Google_Service_ServiceDirectory_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_ServiceDirectory_Policy");
  }
  /**
   * Tests IAM permissions for a resource (namespace or service only).
   * (namespaces.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_ServiceDirectory_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_ServiceDirectory_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_ServiceDirectory_TestIamPermissionsResponse");
  }
}
