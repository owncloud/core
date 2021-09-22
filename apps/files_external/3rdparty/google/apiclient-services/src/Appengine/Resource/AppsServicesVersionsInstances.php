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

namespace Google\Service\Appengine\Resource;

use Google\Service\Appengine\DebugInstanceRequest;
use Google\Service\Appengine\Instance;
use Google\Service\Appengine\ListInstancesResponse;
use Google\Service\Appengine\Operation;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google\Service\Appengine(...);
 *   $instances = $appengineService->instances;
 *  </code>
 */
class AppsServicesVersionsInstances extends \Google\Service\Resource
{
  /**
   * Enables debugging on a VM instance. This allows you to use the SSH command to
   * connect to the virtual machine where the instance lives. While in "debug
   * mode", the instance continues to serve live traffic. You should delete the
   * instance when you are done debugging and then allow the system to take over
   * and determine if another instance should be started.Only applicable for
   * instances in App Engine flexible environment. (instances.debug)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/services/default/versions/v1/instances/instance-1.
   * @param string $servicesId Part of `name`. See documentation of `appsId`.
   * @param string $versionsId Part of `name`. See documentation of `appsId`.
   * @param string $instancesId Part of `name`. See documentation of `appsId`.
   * @param DebugInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function debug($appsId, $servicesId, $versionsId, $instancesId, DebugInstanceRequest $postBody, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId, 'instancesId' => $instancesId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('debug', [$params], Operation::class);
  }
  /**
   * Stops a running instance.The instance might be automatically recreated based
   * on the scaling settings of the version. For more information, see "How
   * Instances are Managed" (standard environment
   * (https://cloud.google.com/appengine/docs/standard/python/how-instances-are-
   * managed) | flexible environment
   * (https://cloud.google.com/appengine/docs/flexible/python/how-instances-are-
   * managed)).To ensure that instances are not re-created and avoid getting
   * billed, you can stop all instances within the target version by changing the
   * serving status of the version to STOPPED with the
   * apps.services.versions.patch (https://cloud.google.com/appengine/docs/admin-
   * api/reference/rest/v1/apps.services.versions/patch) method.
   * (instances.delete)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/services/default/versions/v1/instances/instance-1.
   * @param string $servicesId Part of `name`. See documentation of `appsId`.
   * @param string $versionsId Part of `name`. See documentation of `appsId`.
   * @param string $instancesId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($appsId, $servicesId, $versionsId, $instancesId, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId, 'instancesId' => $instancesId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets instance information. (instances.get)
   *
   * @param string $appsId Part of `name`. Name of the resource requested.
   * Example: apps/myapp/services/default/versions/v1/instances/instance-1.
   * @param string $servicesId Part of `name`. See documentation of `appsId`.
   * @param string $versionsId Part of `name`. See documentation of `appsId`.
   * @param string $instancesId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Instance
   */
  public function get($appsId, $servicesId, $versionsId, $instancesId, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId, 'instancesId' => $instancesId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Instance::class);
  }
  /**
   * Lists the instances of a version.Tip: To aggregate details about instances
   * over time, see the Stackdriver Monitoring API (https://cloud.google.com/monit
   * oring/api/ref_v3/rest/v3/projects.timeSeries/list).
   * (instances.listAppsServicesVersionsInstances)
   *
   * @param string $appsId Part of `parent`. Name of the parent Version resource.
   * Example: apps/myapp/services/default/versions/v1.
   * @param string $servicesId Part of `parent`. See documentation of `appsId`.
   * @param string $versionsId Part of `parent`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum results to return per page.
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListInstancesResponse
   */
  public function listAppsServicesVersionsInstances($appsId, $servicesId, $versionsId, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'servicesId' => $servicesId, 'versionsId' => $versionsId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInstancesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsServicesVersionsInstances::class, 'Google_Service_Appengine_Resource_AppsServicesVersionsInstances');
