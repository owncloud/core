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

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListSfdcInstancesResponse;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaSfdcInstance;
use Google\Service\Integrations\GoogleProtobufEmpty;

/**
 * The "sfdcInstances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $sfdcInstances = $integrationsService->sfdcInstances;
 *  </code>
 */
class ProjectsLocationsProductsSfdcInstances extends \Google\Service\Resource
{
  /**
   * Creates an sfdc instance record. Store the sfdc instance in Spanner. Returns
   * the sfdc instance. (sfdcInstances.create)
   *
   * @param string $parent Required. "projects/{project}/locations/{location}"
   * format.
   * @param GoogleCloudIntegrationsV1alphaSfdcInstance $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaSfdcInstance
   */
  public function create($parent, GoogleCloudIntegrationsV1alphaSfdcInstance $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudIntegrationsV1alphaSfdcInstance::class);
  }
  /**
   * Deletes an sfdc instance. (sfdcInstances.delete)
   *
   * @param string $name Required. The name that is associated with the
   * SfdcInstance.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets an sfdc instance. If the instance doesn't exist, Code.NOT_FOUND
   * exception will be thrown. (sfdcInstances.get)
   *
   * @param string $name Required. The name that is associated with the
   * SfdcInstance.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaSfdcInstance
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudIntegrationsV1alphaSfdcInstance::class);
  }
  /**
   * Lists all sfdc instances that match the filter. Restrict to sfdc instances
   * belonging to the current client only.
   * (sfdcInstances.listProjectsLocationsProductsSfdcInstances)
   *
   * @param string $parent Required. The client, which owns this collection of
   * SfdcInstances.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filtering as supported in
   * https://developers.google.com/authorized-buyers/apis/guides/v2/list-filters.
   * @opt_param int pageSize The size of entries in the response. If unspecified,
   * defaults to 100.
   * @opt_param string pageToken The token returned in the previous response.
   * @opt_param string readMask The mask which specifies fields that need to be
   * returned in the SfdcInstance's response.
   * @return GoogleCloudIntegrationsV1alphaListSfdcInstancesResponse
   */
  public function listProjectsLocationsProductsSfdcInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListSfdcInstancesResponse::class);
  }
  /**
   * Updates an sfdc instance. Updates the sfdc instance in spanner. Returns the
   * sfdc instance. (sfdcInstances.patch)
   *
   * @param string $name Resource name of the SFDC instance
   * projects/{project}/locations/{location}/sfdcInstances/{sfdcInstance}.
   * @param GoogleCloudIntegrationsV1alphaSfdcInstance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask specifying the fields in the above
   * SfdcInstance that have been modified and need to be updated.
   * @return GoogleCloudIntegrationsV1alphaSfdcInstance
   */
  public function patch($name, GoogleCloudIntegrationsV1alphaSfdcInstance $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudIntegrationsV1alphaSfdcInstance::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductsSfdcInstances::class, 'Google_Service_Integrations_Resource_ProjectsLocationsProductsSfdcInstances');
