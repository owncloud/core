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

namespace Google\Service\ServiceDirectory\Resource;

use Google\Service\ServiceDirectory\GetIamPolicyRequest;
use Google\Service\ServiceDirectory\ListNamespacesResponse;
use Google\Service\ServiceDirectory\Policy;
use Google\Service\ServiceDirectory\ServicedirectoryEmpty;
use Google\Service\ServiceDirectory\ServicedirectoryNamespace;
use Google\Service\ServiceDirectory\SetIamPolicyRequest;
use Google\Service\ServiceDirectory\TestIamPermissionsRequest;
use Google\Service\ServiceDirectory\TestIamPermissionsResponse;

/**
 * The "namespaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicedirectoryService = new Google\Service\ServiceDirectory(...);
 *   $namespaces = $servicedirectoryService->namespaces;
 *  </code>
 */
class ProjectsLocationsNamespaces extends \Google\Service\Resource
{
  /**
   * Creates a namespace, and returns the new namespace. (namespaces.create)
   *
   * @param string $parent Required. The resource name of the project and location
   * the namespace will be created in.
   * @param ServicedirectoryNamespace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string namespaceId Required. The Resource ID must be 1-63
   * characters long, and comply with RFC1035. Specifically, the name must be 1-63
   * characters long and match the regular expression
   * `[a-z](?:[-a-z0-9]{0,61}[a-z0-9])?` which means the first character must be a
   * lowercase letter, and all following characters must be a dash, lowercase
   * letter, or digit, except the last character, which cannot be a dash.
   * @return ServicedirectoryNamespace
   */
  public function create($parent, ServicedirectoryNamespace $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ServicedirectoryNamespace::class);
  }
  /**
   * Deletes a namespace. This also deletes all services and endpoints in the
   * namespace. (namespaces.delete)
   *
   * @param string $name Required. The name of the namespace to delete.
   * @param array $optParams Optional parameters.
   * @return ServicedirectoryEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ServicedirectoryEmpty::class);
  }
  /**
   * Gets a namespace. (namespaces.get)
   *
   * @param string $name Required. The name of the namespace to retrieve.
   * @param array $optParams Optional parameters.
   * @return ServicedirectoryNamespace
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ServicedirectoryNamespace::class);
  }
  /**
   * Gets the IAM Policy for a resource (namespace or service only).
   * (namespaces.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists all namespaces. (namespaces.listProjectsLocationsNamespaces)
   *
   * @param string $parent Required. The resource name of the project and location
   * whose namespaces you'd like to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to list results by. General
   * `filter` string syntax: ` ()` * `` can be `name` or `labels.` for map field *
   * `` can be `<`, `>`, `<=`, `>=`, `!=`, `=`, `:`. Of which `:` means `HAS`, and
   * is roughly the same as `=` * `` must be the same data type as field * `` can
   * be `AND`, `OR`, `NOT` Examples of valid filters: * `labels.owner` returns
   * namespaces that have a label with the key `owner`, this is the same as
   * `labels:owner` * `labels.owner=sd` returns namespaces that have key/value
   * `owner=sd` * `name>projects/my-project/locations/us-
   * east1/namespaces/namespace-c` returns namespaces that have name that is
   * alphabetically later than the string, so "namespace-e" is returned but
   * "namespace-a" is not * `labels.owner!=sd AND labels.foo=bar` returns
   * namespaces that have `owner` in label key but value is not `sd` AND have
   * key/value `foo=bar` * `doesnotexist.foo=bar` returns an empty list. Note that
   * namespace doesn't have a field called "doesnotexist". Since the filter does
   * not match any namespaces, it returns no results For more information about
   * filtering, see [API Filtering](https://aip.dev/160).
   * @opt_param string orderBy Optional. The order to list results by. General
   * `order_by` string syntax: ` () (,)` * `` allows value: `name` * `` ascending
   * or descending order by ``. If this is left blank, `asc` is used Note that an
   * empty `order_by` string results in default order, which is order by `name` in
   * ascending order.
   * @opt_param int pageSize Optional. The maximum number of items to return.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @return ListNamespacesResponse
   */
  public function listProjectsLocationsNamespaces($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNamespacesResponse::class);
  }
  /**
   * Updates a namespace. (namespaces.patch)
   *
   * @param string $name Immutable. The resource name for the namespace in the
   * format `projects/locations/namespaces`.
   * @param ServicedirectoryNamespace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. List of fields to be updated in this
   * request.
   * @return ServicedirectoryNamespace
   */
  public function patch($name, ServicedirectoryNamespace $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ServicedirectoryNamespace::class);
  }
  /**
   * Sets the IAM Policy for a resource (namespace or service only).
   * (namespaces.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Tests IAM permissions for a resource (namespace or service only).
   * (namespaces.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsNamespaces::class, 'Google_Service_ServiceDirectory_Resource_ProjectsLocationsNamespaces');
