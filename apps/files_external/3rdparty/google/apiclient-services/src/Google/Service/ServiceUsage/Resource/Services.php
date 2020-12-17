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
 *   $serviceusageService = new Google_Service_ServiceUsage(...);
 *   $services = $serviceusageService->services;
 *  </code>
 */
class Google_Service_ServiceUsage_Resource_Services extends Google_Service_Resource
{
  /**
   * Enable multiple services on a project. The operation is atomic: if enabling
   * any service fails, then the entire batch fails, and no state changes occur.
   * To enable a single service, use the `EnableService` method instead.
   * (services.batchEnable)
   *
   * @param string $parent Parent to enable services on. An example name would be:
   * `projects/123` where `123` is the project number. The `BatchEnableServices`
   * method currently only supports projects.
   * @param Google_Service_ServiceUsage_BatchEnableServicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceUsage_Operation
   */
  public function batchEnable($parent, Google_Service_ServiceUsage_BatchEnableServicesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchEnable', array($params), "Google_Service_ServiceUsage_Operation");
  }
  /**
   * Returns the service configurations and enabled states for a given list of
   * services. (services.batchGet)
   *
   * @param string $parent Parent to retrieve services from. If this is set, the
   * parent of all of the services specified in `names` must match this field. An
   * example name would be: `projects/123` where `123` is the project number. The
   * `BatchGetServices` method currently only supports projects.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Names of the services to retrieve. An example name
   * would be: `projects/123/services/serviceusage.googleapis.com` where `123` is
   * the project number. A single request can get a maximum of 30 services at a
   * time.
   * @return Google_Service_ServiceUsage_BatchGetServicesResponse
   */
  public function batchGet($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_ServiceUsage_BatchGetServicesResponse");
  }
  /**
   * Disable a service so that it can no longer be used with a project. This
   * prevents unintended usage that may cause unexpected billing charges or
   * security leaks. It is not valid to call the disable method on a service that
   * is not currently enabled. Callers will receive a `FAILED_PRECONDITION` status
   * if the target service is not currently enabled. (services.disable)
   *
   * @param string $name Name of the consumer and service to disable the service
   * on. The enable and disable methods currently only support projects. An
   * example name would be: `projects/123/services/serviceusage.googleapis.com`
   * where `123` is the project number.
   * @param Google_Service_ServiceUsage_DisableServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceUsage_Operation
   */
  public function disable($name, Google_Service_ServiceUsage_DisableServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_ServiceUsage_Operation");
  }
  /**
   * Enable a service so that it can be used with a project. (services.enable)
   *
   * @param string $name Name of the consumer and service to enable the service
   * on. The `EnableService` and `DisableService` methods currently only support
   * projects. Enabling a service requires that the service is public or is shared
   * with the user enabling the service. An example name would be:
   * `projects/123/services/serviceusage.googleapis.com` where `123` is the
   * project number.
   * @param Google_Service_ServiceUsage_EnableServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceUsage_Operation
   */
  public function enable($name, Google_Service_ServiceUsage_EnableServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enable', array($params), "Google_Service_ServiceUsage_Operation");
  }
  /**
   * Returns the service configuration and enabled state for a given service.
   * (services.get)
   *
   * @param string $name Name of the consumer and service to get the
   * `ConsumerState` for. An example name would be:
   * `projects/123/services/serviceusage.googleapis.com` where `123` is the
   * project number.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceUsage_GoogleApiServiceusageV1Service
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceUsage_GoogleApiServiceusageV1Service");
  }
  /**
   * List all services available to the specified project, and the current state
   * of those services with respect to the project. The list includes all public
   * services, all services for which the calling user has the
   * `servicemanagement.services.bind` permission, and all services that have
   * already been enabled on the project. The list can be filtered to only include
   * services in a specific state, for example to only include services enabled on
   * the project. WARNING: If you need to query enabled services frequently or
   * across an organization, you should use [Cloud Asset Inventory
   * API](https://cloud.google.com/asset-inventory/docs/apis), which provides
   * higher throughput and richer filtering capability. (services.listServices)
   *
   * @param string $parent Parent to search for services on. An example name would
   * be: `projects/123` where `123` is the project number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Only list services that conform to the given filter.
   * The allowed filter strings are `state:ENABLED` and `state:DISABLED`.
   * @opt_param int pageSize Requested size of the next page of data. Requested
   * page size cannot exceed 200. If not set, the default page size is 50.
   * @opt_param string pageToken Token identifying which result to start with,
   * which is returned by a previous list call.
   * @return Google_Service_ServiceUsage_ListServicesResponse
   */
  public function listServices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceUsage_ListServicesResponse");
  }
}
