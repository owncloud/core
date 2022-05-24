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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1Instance;
use Google\Service\Apigee\GoogleCloudApigeeV1ListInstancesResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1ReportInstanceStatusRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1ReportInstanceStatusResponse;
use Google\Service\Apigee\GoogleLongrunningOperation;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $instances = $apigeeService->instances;
 *  </code>
 */
class OrganizationsInstances extends \Google\Service\Resource
{
  /**
   * Creates an Apigee runtime instance. The instance is accessible from the
   * authorized network configured on the organization. **Note:** Not supported
   * for Apigee hybrid. (instances.create)
   *
   * @param string $parent Required. Name of the organization. Use the following
   * structure in your request: `organizations/{org}`.
   * @param GoogleCloudApigeeV1Instance $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudApigeeV1Instance $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an Apigee runtime instance. The instance stops serving requests and
   * the runtime data is deleted. **Note:** Not supported for Apigee hybrid.
   * (instances.delete)
   *
   * @param string $name Required. Name of the instance. Use the following
   * structure in your request: `organizations/{org}/instances/{instance}`.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets the details for an Apigee runtime instance. **Note:** Not supported for
   * Apigee hybrid. (instances.get)
   *
   * @param string $name Required. Name of the instance. Use the following
   * structure in your request: `organizations/{org}/instances/{instance}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Instance
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1Instance::class);
  }
  /**
   * Lists all Apigee runtime instances for the organization. **Note:** Not
   * supported for Apigee hybrid. (instances.listOrganizationsInstances)
   *
   * @param string $parent Required. Name of the organization. Use the following
   * structure in your request: `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of instances to return. Defaults to
   * 25.
   * @opt_param string pageToken Page token, returned from a previous
   * ListInstances call, that you can use to retrieve the next page of content.
   * @return GoogleCloudApigeeV1ListInstancesResponse
   */
  public function listOrganizationsInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListInstancesResponse::class);
  }
  /**
   * Updates an Apigee runtime instance. You can update the fields described in
   * NodeConfig. No other fields will be updated. **Note:** Not supported for
   * Apigee hybrid. (instances.patch)
   *
   * @param string $name Required. Name of the instance. Use the following
   * structure in your request: `organizations/{org}/instances/{instance}`.
   * @param GoogleCloudApigeeV1Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudApigeeV1Instance $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Reports the latest status for a runtime instance. (instances.reportStatus)
   *
   * @param string $instance The name of the instance reporting this status. For
   * SaaS the request will be rejected if no instance exists under this name.
   * Format is organizations/{org}/instances/{instance}
   * @param GoogleCloudApigeeV1ReportInstanceStatusRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ReportInstanceStatusResponse
   */
  public function reportStatus($instance, GoogleCloudApigeeV1ReportInstanceStatusRequest $postBody, $optParams = [])
  {
    $params = ['instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reportStatus', [$params], GoogleCloudApigeeV1ReportInstanceStatusResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsInstances::class, 'Google_Service_Apigee_Resource_OrganizationsInstances');
