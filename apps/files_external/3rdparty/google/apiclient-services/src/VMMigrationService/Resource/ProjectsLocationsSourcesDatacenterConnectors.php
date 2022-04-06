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

namespace Google\Service\VMMigrationService\Resource;

use Google\Service\VMMigrationService\DatacenterConnector;
use Google\Service\VMMigrationService\ListDatacenterConnectorsResponse;
use Google\Service\VMMigrationService\Operation;
use Google\Service\VMMigrationService\UpgradeApplianceRequest;

/**
 * The "datacenterConnectors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $datacenterConnectors = $vmmigrationService->datacenterConnectors;
 *  </code>
 */
class ProjectsLocationsSourcesDatacenterConnectors extends \Google\Service\Resource
{
  /**
   * Creates a new DatacenterConnector in a given Source.
   * (datacenterConnectors.create)
   *
   * @param string $parent Required. The DatacenterConnector's parent. Required.
   * The Source in where the new DatacenterConnector will be created. For example:
   * `projects/my-project/locations/us-central1/sources/my-source`
   * @param DatacenterConnector $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string datacenterConnectorId Required. The datacenterConnector
   * identifier.
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function create($parent, DatacenterConnector $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single DatacenterConnector. (datacenterConnectors.delete)
   *
   * @param string $name Required. The DatacenterConnector name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes after the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single DatacenterConnector. (datacenterConnectors.get)
   *
   * @param string $name Required. The name of the DatacenterConnector.
   * @param array $optParams Optional parameters.
   * @return DatacenterConnector
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DatacenterConnector::class);
  }
  /**
   * Lists DatacenterConnectors in a given Source.
   * (datacenterConnectors.listProjectsLocationsSourcesDatacenterConnectors)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * connectors.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of connectors to return.
   * The service may return fewer than this value. If unspecified, at most 500
   * sources will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListDatacenterConnectors` call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * `ListDatacenterConnectors` must match the call that provided the page token.
   * @return ListDatacenterConnectorsResponse
   */
  public function listProjectsLocationsSourcesDatacenterConnectors($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDatacenterConnectorsResponse::class);
  }
  /**
   * Upgrades the appliance relate to this DatacenterConnector to the in-place
   * updateable version. (datacenterConnectors.upgradeAppliance)
   *
   * @param string $datacenterConnector Required. The DatacenterConnector name.
   * @param UpgradeApplianceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function upgradeAppliance($datacenterConnector, UpgradeApplianceRequest $postBody, $optParams = [])
  {
    $params = ['datacenterConnector' => $datacenterConnector, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upgradeAppliance', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSourcesDatacenterConnectors::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsSourcesDatacenterConnectors');
