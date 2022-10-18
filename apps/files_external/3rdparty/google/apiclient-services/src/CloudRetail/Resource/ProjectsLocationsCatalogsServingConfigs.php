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

namespace Google\Service\CloudRetail\Resource;

use Google\Service\CloudRetail\GoogleCloudRetailV2AddControlRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2ListServingConfigsResponse;
use Google\Service\CloudRetail\GoogleCloudRetailV2PredictRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2PredictResponse;
use Google\Service\CloudRetail\GoogleCloudRetailV2RemoveControlRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2SearchRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2SearchResponse;
use Google\Service\CloudRetail\GoogleCloudRetailV2ServingConfig;
use Google\Service\CloudRetail\GoogleProtobufEmpty;

/**
 * The "servingConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google\Service\CloudRetail(...);
 *   $servingConfigs = $retailService->servingConfigs;
 *  </code>
 */
class ProjectsLocationsCatalogsServingConfigs extends \Google\Service\Resource
{
  /**
   * Enables a Control on the specified ServingConfig. The control is added in the
   * last position of the list of controls it belongs to (e.g. if it's a facet
   * spec control it will be applied in the last position of
   * servingConfig.facetSpecIds) Returns a ALREADY_EXISTS error if the control has
   * already been applied. Returns a FAILED_PRECONDITION error if the addition
   * could exceed maximum number of control allowed for that type of control.
   * (servingConfigs.addControl)
   *
   * @param string $servingConfig Required. The source ServingConfig resource name
   * . Format: `projects/{project_number}/locations/{location_id}/catalogs/{catalo
   * g_id}/servingConfigs/{serving_config_id}`
   * @param GoogleCloudRetailV2AddControlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2ServingConfig
   */
  public function addControl($servingConfig, GoogleCloudRetailV2AddControlRequest $postBody, $optParams = [])
  {
    $params = ['servingConfig' => $servingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addControl', [$params], GoogleCloudRetailV2ServingConfig::class);
  }
  /**
   * Creates a ServingConfig. A maximum of 100 ServingConfigs are allowed in a
   * Catalog, otherwise a FAILED_PRECONDITION error is returned.
   * (servingConfigs.create)
   *
   * @param string $parent Required. Full resource name of parent. Format:
   * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
   * @param GoogleCloudRetailV2ServingConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string servingConfigId Required. The ID to use for the
   * ServingConfig, which will become the final component of the ServingConfig's
   * resource name. This value should be 4-63 characters, and valid characters are
   * /a-z-_/.
   * @return GoogleCloudRetailV2ServingConfig
   */
  public function create($parent, GoogleCloudRetailV2ServingConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudRetailV2ServingConfig::class);
  }
  /**
   * Deletes a ServingConfig. Returns a NotFound error if the ServingConfig does
   * not exist. (servingConfigs.delete)
   *
   * @param string $name Required. The resource name of the ServingConfig to
   * delete. Format: `projects/{project_number}/locations/{location_id}/catalogs/{
   * catalog_id}/servingConfigs/{serving_config_id}`
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
   * Gets a ServingConfig. Returns a NotFound error if the ServingConfig does not
   * exist. (servingConfigs.get)
   *
   * @param string $name Required. The resource name of the ServingConfig to get.
   * Format: `projects/{project_number}/locations/{location_id}/catalogs/{catalog_
   * id}/servingConfigs/{serving_config_id}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2ServingConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRetailV2ServingConfig::class);
  }
  /**
   * Lists all ServingConfigs linked to this catalog.
   * (servingConfigs.listProjectsLocationsCatalogsServingConfigs)
   *
   * @param string $parent Required. The catalog resource name. Format:
   * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of results to return. If
   * unspecified, defaults to 100. If a value greater than 100 is provided, at
   * most 100 results are returned.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListServingConfigs` call. Provide this to retrieve the subsequent page.
   * @return GoogleCloudRetailV2ListServingConfigsResponse
   */
  public function listProjectsLocationsCatalogsServingConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRetailV2ListServingConfigsResponse::class);
  }
  /**
   * Updates a ServingConfig. (servingConfigs.patch)
   *
   * @param string $name Immutable. Fully qualified name
   * `projects/locations/global/catalogs/servingConfig`
   * @param GoogleCloudRetailV2ServingConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Indicates which fields in the provided
   * ServingConfig to update. The following are NOT supported: *
   * ServingConfig.name If not set, all supported fields are updated.
   * @return GoogleCloudRetailV2ServingConfig
   */
  public function patch($name, GoogleCloudRetailV2ServingConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudRetailV2ServingConfig::class);
  }
  /**
   * Makes a recommendation prediction. (servingConfigs.predict)
   *
   * @param string $placement Required. Full resource name of the format: `{placem
   * ent=projects/locations/global/catalogs/default_catalog/servingConfigs}` or
   * `{placement=projects/locations/global/catalogs/default_catalog/placements}`.
   * We recommend using the `servingConfigs` resource. `placements` is a legacy
   * resource. The ID of the Recommendations AI serving config or placement.
   * Before you can request predictions from your model, you must create at least
   * one serving config or placement for it. For more information, see [Managing
   * serving configurations] (https://cloud.google.com/retail/docs/manage-
   * configs). The full list of available serving configs can be seen at
   * https://console.cloud.google.com/ai/retail/catalogs/default_catalog/configs
   * @param GoogleCloudRetailV2PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2PredictResponse
   */
  public function predict($placement, GoogleCloudRetailV2PredictRequest $postBody, $optParams = [])
  {
    $params = ['placement' => $placement, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('predict', [$params], GoogleCloudRetailV2PredictResponse::class);
  }
  /**
   * Disables a Control on the specified ServingConfig. The control is removed
   * from the ServingConfig. Returns a NOT_FOUND error if the Control is not
   * enabled for the ServingConfig. (servingConfigs.removeControl)
   *
   * @param string $servingConfig Required. The source ServingConfig resource name
   * . Format: `projects/{project_number}/locations/{location_id}/catalogs/{catalo
   * g_id}/servingConfigs/{serving_config_id}`
   * @param GoogleCloudRetailV2RemoveControlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2ServingConfig
   */
  public function removeControl($servingConfig, GoogleCloudRetailV2RemoveControlRequest $postBody, $optParams = [])
  {
    $params = ['servingConfig' => $servingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeControl', [$params], GoogleCloudRetailV2ServingConfig::class);
  }
  /**
   * Performs a search. This feature is only available for users who have Retail
   * Search enabled. Enable Retail Search on Cloud Console before using this
   * feature. (servingConfigs.search)
   *
   * @param string $placement Required. The resource name of the Retail Search
   * serving config, such as `projects/locations/global/catalogs/default_catalog/s
   * ervingConfigs/default_serving_config` or the name of the legacy placement
   * resource, such as `projects/locations/global/catalogs/default_catalog/placeme
   * nts/default_search`. This field is used to identify the serving configuration
   * name and the set of models that will be used to make the search.
   * @param GoogleCloudRetailV2SearchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2SearchResponse
   */
  public function search($placement, GoogleCloudRetailV2SearchRequest $postBody, $optParams = [])
  {
    $params = ['placement' => $placement, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudRetailV2SearchResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsServingConfigs::class, 'Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsServingConfigs');
