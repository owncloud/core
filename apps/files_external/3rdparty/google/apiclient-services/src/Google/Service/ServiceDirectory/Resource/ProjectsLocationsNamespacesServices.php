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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicedirectoryService = new Google_Service_ServiceDirectory(...);
 *   $services = $servicedirectoryService->services;
 *  </code>
 */
class Google_Service_ServiceDirectory_Resource_ProjectsLocationsNamespacesServices extends Google_Service_Resource
{
  /**
   * Creates a service, and returns the new Service. (services.create)
   *
   * @param string $parent Required. The resource name of the namespace this
   * service will belong to.
   * @param Google_Service_ServiceDirectory_Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceId Required. The Resource ID must be 1-63 characters
   * long, and comply with RFC1035. Specifically, the name must be 1-63 characters
   * long and match the regular expression `[a-z](?:[-a-z0-9]{0,61}[a-z0-9])?`
   * which means the first character must be a lowercase letter, and all following
   * characters must be a dash, lowercase letter, or digit, except the last
   * character, which cannot be a dash.
   * @return Google_Service_ServiceDirectory_Service
   */
  public function create($parent, Google_Service_ServiceDirectory_Service $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ServiceDirectory_Service");
  }
  /**
   * Deletes a service. This also deletes all endpoints associated with the
   * service. (services.delete)
   *
   * @param string $name Required. The name of the service to delete.
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
   * Gets a service. (services.get)
   *
   * @param string $name Required. The name of the service to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_Service
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceDirectory_Service");
  }
  /**
   * Gets the IAM Policy for a resource (namespace or service only).
   * (services.getIamPolicy)
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
   * Lists all services belonging to a namespace.
   * (services.listProjectsLocationsNamespacesServices)
   *
   * @param string $parent Required. The resource name of the namespace whose
   * services we'd like to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return.
   * @opt_param string orderBy Optional. The order to list result by.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @opt_param string filter Optional. The filter to list result by. General
   * filter string syntax: () can be "name", or "metadata." for map field. can be
   * "<, >, <=, >=, !=, =, :". Of which ":" means HAS, and is roughly the same as
   * "=". must be the same data type as field. can be "AND, OR, NOT". Examples of
   * valid filters: * "metadata.owner" returns Services that have a label with the
   * key "owner" this is the same as "metadata:owner". * "metadata.protocol=gRPC"
   * returns Services that have key/value "protocol=gRPC". * "name>projects/my-
   * project/locations/us-east/namespaces/my-namespace/services/service-c" returns
   * Services that have name that is alphabetically later than the string, so
   * "service-e" will be returned but "service-a" will not be. *
   * "metadata.owner!=sd AND metadata.foo=bar" returns Services that have "owner"
   * in label key but value is not "sd" AND have key/value foo=bar. *
   * "doesnotexist.foo=bar" returns an empty list. Note that Service doesn't have
   * a field called "doesnotexist". Since the filter does not match any Services,
   * it returns no results.
   * @return Google_Service_ServiceDirectory_ListServicesResponse
   */
  public function listProjectsLocationsNamespacesServices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceDirectory_ListServicesResponse");
  }
  /**
   * Updates a service. (services.patch)
   *
   * @param string $name Immutable. The resource name for the service in the
   * format 'projects/locations/namespaces/services'.
   * @param Google_Service_ServiceDirectory_Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. List of fields to be updated in this
   * request.
   * @return Google_Service_ServiceDirectory_Service
   */
  public function patch($name, Google_Service_ServiceDirectory_Service $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ServiceDirectory_Service");
  }
  /**
   * Returns a service and its associated endpoints. Resolving a service is not
   * considered an active developer method. (services.resolve)
   *
   * @param string $name Required. The name of the service to resolve.
   * @param Google_Service_ServiceDirectory_ResolveServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_ResolveServiceResponse
   */
  public function resolve($name, Google_Service_ServiceDirectory_ResolveServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resolve', array($params), "Google_Service_ServiceDirectory_ResolveServiceResponse");
  }
  /**
   * Sets the IAM Policy for a resource (namespace or service only).
   * (services.setIamPolicy)
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
   * (services.testIamPermissions)
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
