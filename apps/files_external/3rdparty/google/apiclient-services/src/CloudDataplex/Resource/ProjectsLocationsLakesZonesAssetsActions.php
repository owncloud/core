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

namespace Google\Service\CloudDataplex\Resource;

use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListActionsResponse;

/**
 * The "actions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $actions = $dataplexService->actions;
 *  </code>
 */
class ProjectsLocationsLakesZonesAssetsActions extends \Google\Service\Resource
{
  /**
   * Lists action resources in an asset.
   * (actions.listProjectsLocationsLakesZonesAssetsActions)
   *
   * @param string $parent Required. The resource name of the parent asset: projec
   * ts/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}/a
   * ssets/{asset_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of actions to return. The
   * service may return fewer than this value. If unspecified, at most 10 actions
   * will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListAssetActions call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to ListAssetActions must match the
   * call that provided the page token.
   * @return GoogleCloudDataplexV1ListActionsResponse
   */
  public function listProjectsLocationsLakesZonesAssetsActions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListActionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesZonesAssetsActions::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesZonesAssetsActions');
