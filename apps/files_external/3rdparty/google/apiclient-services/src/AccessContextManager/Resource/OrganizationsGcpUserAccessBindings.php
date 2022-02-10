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

namespace Google\Service\AccessContextManager\Resource;

use Google\Service\AccessContextManager\GcpUserAccessBinding;
use Google\Service\AccessContextManager\ListGcpUserAccessBindingsResponse;
use Google\Service\AccessContextManager\Operation;

/**
 * The "gcpUserAccessBindings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google\Service\AccessContextManager(...);
 *   $gcpUserAccessBindings = $accesscontextmanagerService->gcpUserAccessBindings;
 *  </code>
 */
class OrganizationsGcpUserAccessBindings extends \Google\Service\Resource
{
  /**
   * Creates a GcpUserAccessBinding. If the client specifies a name, the server
   * ignores it. Fails if a resource already exists with the same group_key.
   * Completion of this long-running operation does not necessarily signify that
   * the new binding is deployed onto all affected users, which may take more
   * time. (gcpUserAccessBindings.create)
   *
   * @param string $parent Required. Example: "organizations/256"
   * @param GcpUserAccessBinding $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, GcpUserAccessBinding $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a GcpUserAccessBinding. Completion of this long-running operation
   * does not necessarily signify that the binding deletion is deployed onto all
   * affected users, which may take more time. (gcpUserAccessBindings.delete)
   *
   * @param string $name Required. Example:
   * "organizations/256/gcpUserAccessBindings/b3-BhcX_Ud5N"
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets the GcpUserAccessBinding with the given name.
   * (gcpUserAccessBindings.get)
   *
   * @param string $name Required. Example:
   * "organizations/256/gcpUserAccessBindings/b3-BhcX_Ud5N"
   * @param array $optParams Optional parameters.
   * @return GcpUserAccessBinding
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GcpUserAccessBinding::class);
  }
  /**
   * Lists all GcpUserAccessBindings for a Google Cloud organization.
   * (gcpUserAccessBindings.listOrganizationsGcpUserAccessBindings)
   *
   * @param string $parent Required. Example: "organizations/256"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of items to return. The
   * server may return fewer items. If left blank, the server may return any
   * number of items.
   * @opt_param string pageToken Optional. If left blank, returns the first page.
   * To enumerate all items, use the next_page_token from your previous list
   * operation.
   * @return ListGcpUserAccessBindingsResponse
   */
  public function listOrganizationsGcpUserAccessBindings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGcpUserAccessBindingsResponse::class);
  }
  /**
   * Updates a GcpUserAccessBinding. Completion of this long-running operation
   * does not necessarily signify that the changed binding is deployed onto all
   * affected users, which may take more time. (gcpUserAccessBindings.patch)
   *
   * @param string $name Immutable. Assigned by the server during creation. The
   * last segment has an arbitrary length and has only URI unreserved characters
   * (as defined by [RFC 3986 Section
   * 2.3](https://tools.ietf.org/html/rfc3986#section-2.3)). Should not be
   * specified by the client during creation. Example:
   * "organizations/256/gcpUserAccessBindings/b3-BhcX_Ud5N"
   * @param GcpUserAccessBinding $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Only the fields specified in this mask
   * are updated. Because name and group_key cannot be changed, update_mask is
   * required and must always be: update_mask { paths: "access_levels" }
   * @return Operation
   */
  public function patch($name, GcpUserAccessBinding $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsGcpUserAccessBindings::class, 'Google_Service_AccessContextManager_Resource_OrganizationsGcpUserAccessBindings');
