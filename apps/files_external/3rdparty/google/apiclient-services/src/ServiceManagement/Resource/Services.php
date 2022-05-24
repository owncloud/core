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

namespace Google\Service\ServiceManagement\Resource;

use Google\Service\ServiceManagement\GenerateConfigReportRequest;
use Google\Service\ServiceManagement\GenerateConfigReportResponse;
use Google\Service\ServiceManagement\GetIamPolicyRequest;
use Google\Service\ServiceManagement\ListServicesResponse;
use Google\Service\ServiceManagement\ManagedService;
use Google\Service\ServiceManagement\Operation;
use Google\Service\ServiceManagement\Policy;
use Google\Service\ServiceManagement\Service;
use Google\Service\ServiceManagement\SetIamPolicyRequest;
use Google\Service\ServiceManagement\TestIamPermissionsRequest;
use Google\Service\ServiceManagement\TestIamPermissionsResponse;

/**
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicemanagementService = new Google\Service\ServiceManagement(...);
 *   $services = $servicemanagementService->services;
 *  </code>
 */
class Services extends \Google\Service\Resource
{
  /**
   * Creates a new managed service. A managed service is immutable, and is subject
   * to mandatory 30-day data retention. You cannot move a service or recreate it
   * within 30 days after deletion. One producer project can own no more than 500
   * services. For security and reliability purposes, a production service should
   * be hosted in a dedicated producer project. Operation (services.create)
   *
   * @param ManagedService $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create(ManagedService $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a managed service. This method will change the service to the `Soft-
   * Delete` state for 30 days. Within this period, service producers may call
   * UndeleteService to restore the service. After 30 days, the service will be
   * permanently deleted. Operation (services.delete)
   *
   * @param string $serviceName Required. The name of the service. See the
   * [overview](https://cloud.google.com/service-management/overview) for naming
   * requirements. For example: `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($serviceName, $optParams = [])
  {
    $params = ['serviceName' => $serviceName];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Generates and returns a report (errors, warnings and changes from existing
   * configurations) associated with GenerateConfigReportRequest.new_value If
   * GenerateConfigReportRequest.old_value is specified,
   * GenerateConfigReportRequest will contain a single ChangeReport based on the
   * comparison between GenerateConfigReportRequest.new_value and
   * GenerateConfigReportRequest.old_value. If
   * GenerateConfigReportRequest.old_value is not specified, this method will
   * compare GenerateConfigReportRequest.new_value with the last pushed service
   * configuration. (services.generateConfigReport)
   *
   * @param GenerateConfigReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GenerateConfigReportResponse
   */
  public function generateConfigReport(GenerateConfigReportRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateConfigReport', [$params], GenerateConfigReportResponse::class);
  }
  /**
   * Gets a managed service. Authentication is required unless the service is
   * public. (services.get)
   *
   * @param string $serviceName Required. The name of the service. See the
   * `ServiceManager` overview for naming requirements. For example:
   * `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   * @return ManagedService
   */
  public function get($serviceName, $optParams = [])
  {
    $params = ['serviceName' => $serviceName];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ManagedService::class);
  }
  /**
   * Gets a service configuration (version) for a managed service.
   * (services.getConfig)
   *
   * @param string $serviceName Required. The name of the service. See the
   * [overview](https://cloud.google.com/service-management/overview) for naming
   * requirements. For example: `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Required. The id of the service configuration
   * resource. This field must be specified for the server to return all fields,
   * including `SourceInfo`.
   * @opt_param string view Specifies which parts of the Service Config should be
   * returned in the response.
   * @return Service
   */
  public function getConfig($serviceName, $optParams = [])
  {
    $params = ['serviceName' => $serviceName];
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', [$params], Service::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (services.getIamPolicy)
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
   * Lists managed services. Returns all public services. For authenticated users,
   * also returns all services the calling user has
   * "servicemanagement.services.get" permission for. (services.listServices)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consumerId Include services consumed by the specified
   * consumer. The Google Service Management implementation accepts the following
   * forms: - project:
   * @opt_param int pageSize The max number of items to include in the response
   * list. Page size is 50 if not specified. Maximum value is 100.
   * @opt_param string pageToken Token identifying which result to start with;
   * returned by a previous list call.
   * @opt_param string producerProjectId Include services produced by the
   * specified project.
   * @return ListServicesResponse
   */
  public function listServices($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListServicesResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (services.setIamPolicy)
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
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (services.testIamPermissions)
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
  /**
   * Revives a previously deleted managed service. The method restores the service
   * using the configuration at the time the service was deleted. The target
   * service must exist and must have been deleted within the last 30 days.
   * Operation (services.undelete)
   *
   * @param string $serviceName Required. The name of the service. See the
   * [overview](https://cloud.google.com/service-management/overview) for naming
   * requirements. For example: `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function undelete($serviceName, $optParams = [])
  {
    $params = ['serviceName' => $serviceName];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Services::class, 'Google_Service_ServiceManagement_Resource_Services');
