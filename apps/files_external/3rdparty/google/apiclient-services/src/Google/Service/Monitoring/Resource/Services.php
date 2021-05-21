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
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $services = $monitoringService->services;
 *  </code>
 */
class Google_Service_Monitoring_Resource_Services extends Google_Service_Resource
{
  /**
   * Create a Service. (services.create)
   *
   * @param string $parent Required. Resource name
   * (https://cloud.google.com/monitoring/api/v3#project_name) of the parent
   * workspace. The format is: projects/[PROJECT_ID_OR_NUMBER]
   * @param Google_Service_Monitoring_Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceId Optional. The Service id to use for this Service.
   * If omitted, an id will be generated instead. Must match the pattern
   * [a-z0-9\-]+
   * @return Google_Service_Monitoring_Service
   */
  public function create($parent, Google_Service_Monitoring_Service $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_Service");
  }
  /**
   * Soft delete this Service. (services.delete)
   *
   * @param string $name Required. Resource name of the Service to delete. The
   * format is: projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Get the named Service. (services.get)
   *
   * @param string $name Required. Resource name of the Service. The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_Service
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_Service");
  }
  /**
   * List Services for this workspace. (services.listServices)
   *
   * @param string $parent Required. Resource name of the parent containing the
   * listed services, either a project
   * (https://cloud.google.com/monitoring/api/v3#project_name) or a Monitoring
   * Workspace. The formats are: projects/[PROJECT_ID_OR_NUMBER]
   * workspaces/[HOST_PROJECT_ID_OR_NUMBER]
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter specifying what Services to return. The
   * filter currently supports the following fields: - `identifier_case` -
   * `app_engine.module_id` - `cloud_endpoints.service` (reserved for future use)
   * - `mesh_istio.mesh_uid` - `mesh_istio.service_namespace` -
   * `mesh_istio.service_name` - `cluster_istio.location` (deprecated) -
   * `cluster_istio.cluster_name` (deprecated) - `cluster_istio.service_namespace`
   * (deprecated) - `cluster_istio.service_name` (deprecated) identifier_case
   * refers to which option in the identifier oneof is populated. For example, the
   * filter identifier_case = "CUSTOM" would match all services with a value for
   * the custom field. Valid options are "CUSTOM", "APP_ENGINE", "MESH_ISTIO",
   * plus "CLUSTER_ISTIO" (deprecated) and "CLOUD_ENDPOINTS" (reserved for future
   * use).
   * @opt_param int pageSize A non-negative number that is the maximum number of
   * results to return. When 0, use default page size.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return Google_Service_Monitoring_ListServicesResponse
   */
  public function listServices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListServicesResponse");
  }
  /**
   * Update this Service. (services.patch)
   *
   * @param string $name Resource name for this Service. The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]
   * @param Google_Service_Monitoring_Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A set of field paths defining which fields to
   * use for the update.
   * @return Google_Service_Monitoring_Service
   */
  public function patch($name, Google_Service_Monitoring_Service $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Monitoring_Service");
  }
}
