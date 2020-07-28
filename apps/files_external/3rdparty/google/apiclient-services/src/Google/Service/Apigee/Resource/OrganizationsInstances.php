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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $instances = $apigeeService->instances;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsInstances extends Google_Service_Resource
{
  /**
   * Creates an Apigee runtime instance. The instance is accessible from the
   * authorized network configured on the organization.
   *
   * **Note:** Not supported for Apigee hybrid. (instances.create)
   *
   * @param string $parent Required. Name of the organization. Use the following
   * structure in your request:   `organizations/{org}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Instance $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1Instance $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Deletes an Apigee runtime instance. The instance stops serving requests and
   * the runtime data is deleted.
   *
   * **Note:** Not supported for Apigee hybrid. (instances.delete)
   *
   * @param string $name Required. Name of the instance. Use the following
   * structure in your request:   `organizations/{org}/instance/{instance}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Gets the details for an Apigee runtime instance.
   *
   * **Note:** Not supported for Apigee hybrid. (instances.get)
   *
   * @param string $name Required. Name of the instance. Use the following
   * structure in your request:   `organizations/{org}/instances/{instance}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Instance
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Instance");
  }
  /**
   * Lists all Apigee runtime instances for the organization.
   *
   * **Note:** Not supported for Apigee hybrid.
   * (instances.listOrganizationsInstances)
   *
   * @param string $parent Required. Name of the organization. Use the following
   * structure in your request:   `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Page token, returned from a previous
   * ListInstances call, that you can use to retrieve the next page of content.
   * @opt_param int pageSize Maximum number of instances to return. Defaults to
   * 25.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListInstancesResponse
   */
  public function listOrganizationsInstances($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListInstancesResponse");
  }
  /**
   * Reports the latest status for a runtime instance. (instances.reportStatus)
   *
   * @param string $instance The name of the instance reporting this status. For
   * SaaS the request will be rejected if no instance exists under this name.
   * Format is organizations/{org}/instances/{instance}
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ReportInstanceStatusRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ReportInstanceStatusResponse
   */
  public function reportStatus($instance, Google_Service_Apigee_GoogleCloudApigeeV1ReportInstanceStatusRequest $postBody, $optParams = array())
  {
    $params = array('instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reportStatus', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ReportInstanceStatusResponse");
  }
}
