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
 * The "servicePerimeters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google_Service_AccessContextManager(...);
 *   $servicePerimeters = $accesscontextmanagerService->servicePerimeters;
 *  </code>
 */
class Google_Service_AccessContextManager_Resource_AccessPoliciesServicePerimeters extends Google_Service_Resource
{
  /**
   * Commit the dry-run spec for all the Service Perimeters in an Access Policy. A
   * commit operation on a Service Perimeter involves copying its `spec` field to
   * that Service Perimeter's `status` field. Only Service Perimeters with
   * `use_explicit_dry_run_spec` field set to true are affected by a commit
   * operation. The longrunning operation from this RPC will have a successful
   * status once the dry-run specs for all the Service Perimeters have been
   * committed. If a commit fails, it will cause the longrunning operation to
   * return an error response and the entire commit operation will be cancelled.
   * When successful, Operation.response field will contain
   * CommitServicePerimetersResponse. The `dry_run` and the `spec` fields will be
   * cleared after a successful commit operation. (servicePerimeters.commit)
   *
   * @param string $parent Required. Resource name for the parent Access Policy
   * which owns all Service Perimeters in scope for the commit operation. Format:
   * `accessPolicies/{policy_id}`
   * @param Google_Service_AccessContextManager_CommitServicePerimetersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function commit($parent, Google_Service_AccessContextManager_CommitServicePerimetersRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('commit', array($params), "Google_Service_AccessContextManager_Operation");
  }
  /**
   * Create a Service Perimeter. The longrunning operation from this RPC will have
   * a successful status once the Service Perimeter has propagated to long-lasting
   * storage. Service Perimeters containing errors will result in an error
   * response for the first error encountered. (servicePerimeters.create)
   *
   * @param string $parent Required. Resource name for the access policy which
   * owns this Service Perimeter. Format: `accessPolicies/{policy_id}`
   * @param Google_Service_AccessContextManager_ServicePerimeter $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function create($parent, Google_Service_AccessContextManager_ServicePerimeter $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AccessContextManager_Operation");
  }
  /**
   * Delete a Service Perimeter by resource name. The longrunning operation from
   * this RPC will have a successful status once the Service Perimeter has been
   * removed from long-lasting storage. (servicePerimeters.delete)
   *
   * @param string $name Required. Resource name for the Service Perimeter.
   * Format: `accessPolicies/{policy_id}/servicePerimeters/{service_perimeter_id}`
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
   * Get a Service Perimeter by resource name. (servicePerimeters.get)
   *
   * @param string $name Required. Resource name for the Service Perimeter.
   * Format:
   * `accessPolicies/{policy_id}/servicePerimeters/{service_perimeters_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_ServicePerimeter
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AccessContextManager_ServicePerimeter");
  }
  /**
   * List all Service Perimeters for an access policy.
   * (servicePerimeters.listAccessPoliciesServicePerimeters)
   *
   * @param string $parent Required. Resource name for the access policy to list
   * Service Perimeters from. Format: `accessPolicies/{policy_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Next page token for the next batch of Service
   * Perimeter instances. Defaults to the first page of results.
   * @opt_param int pageSize Number of Service Perimeters to include in the list.
   * Default 100.
   * @return Google_Service_AccessContextManager_ListServicePerimetersResponse
   */
  public function listAccessPoliciesServicePerimeters($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AccessContextManager_ListServicePerimetersResponse");
  }
  /**
   * Update a Service Perimeter. The longrunning operation from this RPC will have
   * a successful status once the changes to the Service Perimeter have propagated
   * to long-lasting storage. Service Perimeter containing errors will result in
   * an error response for the first error encountered. (servicePerimeters.patch)
   *
   * @param string $name Required. Resource name for the ServicePerimeter. The
   * `short_name` component must begin with a letter and only include alphanumeric
   * and '_'. Format: `accessPolicies/{policy_id}/servicePerimeters/{short_name}`
   * @param Google_Service_AccessContextManager_ServicePerimeter $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask to control which fields get
   * updated. Must be non-empty.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function patch($name, Google_Service_AccessContextManager_ServicePerimeter $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AccessContextManager_Operation");
  }
  /**
   * Replace all existing Service Perimeters in an Access Policy with the Service
   * Perimeters provided. This is done atomically. The longrunning operation from
   * this RPC will have a successful status once all replacements have propagated
   * to long-lasting storage. Replacements containing errors will result in an
   * error response for the first error encountered. Replacement will be cancelled
   * on error, existing Service Perimeters will not be affected.
   * Operation.response field will contain ReplaceServicePerimetersResponse.
   * (servicePerimeters.replaceAll)
   *
   * @param string $parent Required. Resource name for the access policy which
   * owns these Service Perimeters. Format: `accessPolicies/{policy_id}`
   * @param Google_Service_AccessContextManager_ReplaceServicePerimetersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AccessContextManager_Operation
   */
  public function replaceAll($parent, Google_Service_AccessContextManager_ReplaceServicePerimetersRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('replaceAll', array($params), "Google_Service_AccessContextManager_Operation");
  }
}
