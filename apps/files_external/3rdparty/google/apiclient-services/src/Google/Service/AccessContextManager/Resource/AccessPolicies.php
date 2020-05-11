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
 * The "accessPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google_Service_AccessContextManager(...);
 *   $accessPolicies = $accesscontextmanagerService->accessPolicies;
 *  </code>
 */
class Google_Service_AccessContextManager_Resource_AccessPolicies extends Google_Service_Resource
{
  /**
   * Create an `AccessPolicy`. Fails if this organization already has a
   * `AccessPolicy`. The longrunning Operation will have a successful status once
   * the `AccessPolicy` has propagated to long-lasting storage. Syntactic and
   * basic semantic errors will be returned in `metadata` as a BadRequest proto.
   * (accessPolicies.create)
   *
   * @param Google_Service_AccessContextManager_AccessPolicy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function create(Google_Service_AccessContextManager_AccessPolicy $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AccessContextManager_Operation");
  }
  /**
   * Delete an AccessPolicy by resource name. The longrunning Operation will have
   * a successful status once the AccessPolicy has been removed from long-lasting
   * storage. (accessPolicies.delete)
   *
   * @param string $name Required. Resource name for the access policy to delete.
   *
   * Format `accessPolicies/{policy_id}`
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
   * Get an AccessPolicy by name. (accessPolicies.get)
   *
   * @param string $name Required. Resource name for the access policy to get.
   *
   * Format `accessPolicies/{policy_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_AccessPolicy
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AccessContextManager_AccessPolicy");
  }
  /**
   * List all AccessPolicies under a container.
   * (accessPolicies.listAccessPolicies)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Next page token for the next batch of
   * AccessPolicy instances. Defaults to the first page of results.
   * @opt_param int pageSize Number of AccessPolicy instances to include in the
   * list. Default 100.
   * @opt_param string parent Required. Resource name for the container to list
   * AccessPolicy instances from.
   *
   * Format: `organizations/{org_id}`
   * @return Google_Service_AccessContextManager_ListAccessPoliciesResponse
   */
  public function listAccessPolicies($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AccessContextManager_ListAccessPoliciesResponse");
  }
  /**
   * Update an AccessPolicy. The longrunning Operation from this RPC will have a
   * successful status once the changes to the AccessPolicy have propagated to
   * long-lasting storage. Syntactic and basic semantic errors will be returned in
   * `metadata` as a BadRequest proto. (accessPolicies.patch)
   *
   * @param string $name Output only. Resource name of the `AccessPolicy`. Format:
   * `accessPolicies/{policy_id}`
   * @param Google_Service_AccessContextManager_AccessPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask to control which fields get
   * updated. Must be non-empty.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function patch($name, Google_Service_AccessContextManager_AccessPolicy $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AccessContextManager_Operation");
  }
}
