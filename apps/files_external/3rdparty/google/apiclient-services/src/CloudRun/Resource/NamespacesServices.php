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

namespace Google\Service\CloudRun\Resource;

use Google\Service\CloudRun\ListServicesResponse;
use Google\Service\CloudRun\Service;
use Google\Service\CloudRun\Status;

/**
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $services = $runService->services;
 *  </code>
 */
class NamespacesServices extends \Google\Service\Resource
{
  /**
   * Create a service. (services.create)
   *
   * @param string $parent The namespace in which the service should be created.
   * For Cloud Run (fully managed), replace {namespace_id} with the project ID or
   * number.
   * @param Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dryRun Indicates that the server should validate the
   * request and populate default values without persisting the request. Supported
   * values: `all`
   * @return Service
   */
  public function create($parent, Service $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Service::class);
  }
  /**
   * Delete a service. This will cause the Service to stop serving traffic and
   * will delete the child entities like Routes, Configurations and Revisions.
   * (services.delete)
   *
   * @param string $name The name of the service to delete. For Cloud Run (fully
   * managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiVersion Cloud Run currently ignores this parameter.
   * @opt_param string dryRun Indicates that the server should validate the
   * request and populate default values without persisting the request. Supported
   * values: `all`
   * @opt_param string kind Cloud Run currently ignores this parameter.
   * @opt_param string propagationPolicy Specifies the propagation policy of
   * delete. Cloud Run currently ignores this setting, and deletes in the
   * background. Please see kubernetes.io/docs/concepts/workloads/controllers
   * /garbage-collection/ for more information.
   * @return Status
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Status::class);
  }
  /**
   * Get information about a service. (services.get)
   *
   * @param string $name The name of the service to retrieve. For Cloud Run (fully
   * managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   * @return Service
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Service::class);
  }
  /**
   * List services. (services.listNamespacesServices)
   *
   * @param string $parent The namespace from which the services should be listed.
   * For Cloud Run (fully managed), replace {namespace_id} with the project ID or
   * number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string continue Optional. Encoded string to continue paging.
   * @opt_param string fieldSelector Allows to filter resources based on a
   * specific value for a field name. Send this in a query string format. i.e.
   * 'metadata.name%3Dlorem'. Not currently used by Cloud Run.
   * @opt_param bool includeUninitialized Not currently used by Cloud Run.
   * @opt_param string labelSelector Allows to filter resources based on a label.
   * Supported operations are =, !=, exists, in, and notIn.
   * @opt_param int limit Optional. The maximum number of records that should be
   * returned.
   * @opt_param string resourceVersion The baseline resource version from which
   * the list or watch operation should start. Not currently used by Cloud Run.
   * @opt_param bool watch Flag that indicates that the client expects to watch
   * this resource as well. Not currently used by Cloud Run.
   * @return ListServicesResponse
   */
  public function listNamespacesServices($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListServicesResponse::class);
  }
  /**
   * Replace a service. Only the spec and metadata labels and annotations are
   * modifiable. After the Update request, Cloud Run will work to make the
   * 'status' match the requested 'spec'. May provide metadata.resourceVersion to
   * enforce update from last read for optimistic concurrency control.
   * (services.replaceService)
   *
   * @param string $name The name of the service being replaced. For Cloud Run
   * (fully managed), replace {namespace_id} with the project ID or number.
   * @param Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dryRun Indicates that the server should validate the
   * request and populate default values without persisting the request. Supported
   * values: `all`
   * @return Service
   */
  public function replaceService($name, Service $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replaceService', [$params], Service::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NamespacesServices::class, 'Google_Service_CloudRun_Resource_NamespacesServices');
