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

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListExecutionSnapshotsResponse;

/**
 * The "executionsnapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $executionsnapshots = $integrationsService->executionsnapshots;
 *  </code>
 */
class ProjectsLocationsProductsIntegrationsExecutionsnapshots extends \Google\Service\Resource
{
  /**
   * Lists the snapshots of a given integration executions. This RPC is not being
   * used. (executionsnapshots.listProjectsLocationsProductsIntegrationsExecutions
   * napshots)
   *
   * @param string $parent Required. The parent resource name of the integration
   * execution.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Currently supports filter by `execution_info_id` or
   * `execution_snapshot_id`.
   * @opt_param int pageSize Number of entries to be returned in a page.
   * @opt_param string pageToken The token used to retrieve the next page results.
   * @opt_param string readMask View mask for the response data. If set, only the
   * field specified will be returned as part of the result. If not set, all
   * fields in event execution snapshot will be filled and returned.
   * @return GoogleCloudIntegrationsV1alphaListExecutionSnapshotsResponse
   */
  public function listProjectsLocationsProductsIntegrationsExecutionsnapshots($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListExecutionSnapshotsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductsIntegrationsExecutionsnapshots::class, 'Google_Service_Integrations_Resource_ProjectsLocationsProductsIntegrationsExecutionsnapshots');
