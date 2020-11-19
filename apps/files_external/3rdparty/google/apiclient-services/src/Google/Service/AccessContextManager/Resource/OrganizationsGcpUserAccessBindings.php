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
 * The "gcpUserAccessBindings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google_Service_AccessContextManager(...);
 *   $gcpUserAccessBindings = $accesscontextmanagerService->gcpUserAccessBindings;
 *  </code>
 */
class Google_Service_AccessContextManager_Resource_OrganizationsGcpUserAccessBindings extends Google_Service_Resource
{
  /**
   * Creates a GcpUserAccessBinding. If the client specifies a name, the server
   * will ignore it. Fails if a resource already exists with the same group_key.
   * Completion of this long-running operation does not necessarily signify that
   * the new binding is deployed onto all affected users, which may take more
   * time. (gcpUserAccessBindings.create)
   *
   * @param string $parent Required. Example: "organizations/256"
   * @param Google_Service_AccessContextManager_GcpUserAccessBinding $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function create($parent, Google_Service_AccessContextManager_GcpUserAccessBinding $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AccessContextManager_Operation");
  }
  /**
   * Deletes a GcpUserAccessBinding. Completion of this long-running operation
   * does not necessarily signify that the binding deletion is deployed onto all
   * affected users, which may take more time. (gcpUserAccessBindings.delete)
   *
   * @param string $name Required. Example:
   * "organizations/256/gcpUserAccessBindings/b3-BhcX_Ud5N"
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AccessContextManager_Operation");
  }
  /**
   * Gets the GcpUserAccessBinding with the given name.
   * (gcpUserAccessBindings.get)
   *
   * @param string $name Required. Example:
   * "organizations/256/gcpUserAccessBindings/b3-BhcX_Ud5N"
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_GcpUserAccessBinding
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AccessContextManager_GcpUserAccessBinding");
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
   * @return Google_Service_AccessContextManager_ListGcpUserAccessBindingsResponse
   */
  public function listOrganizationsGcpUserAccessBindings($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AccessContextManager_ListGcpUserAccessBindingsResponse");
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
   * @param Google_Service_AccessContextManager_GcpUserAccessBinding $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Only the fields specified in this mask
   * are updated. Because name and group_key cannot be changed, update_mask is
   * required and must always be: update_mask { paths: "access_levels" }
   * @return Google_Service_AccessContextManager_Operation
   */
  public function patch($name, Google_Service_AccessContextManager_GcpUserAccessBinding $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AccessContextManager_Operation");
  }
}
