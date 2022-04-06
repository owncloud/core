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

use Google\Service\CloudDataplex\DataplexEmpty;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1Entity;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListEntitiesResponse;

/**
 * The "entities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $entities = $dataplexService->entities;
 *  </code>
 */
class ProjectsLocationsLakesZonesEntities extends \Google\Service\Resource
{
  /**
   * Create a metadata entity. (entities.create)
   *
   * @param string $parent Required. The resource name of the parent zone: project
   * s/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}.
   * @param GoogleCloudDataplexV1Entity $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Entity
   */
  public function create($parent, GoogleCloudDataplexV1Entity $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDataplexV1Entity::class);
  }
  /**
   * Delete a metadata entity. (entities.delete)
   *
   * @param string $name Required. The resource name of the entity: projects/{proj
   * ect_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}/entities/
   * {entity_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Required. The etag associated with the entity, which
   * can be retrieved with a GetEntity request.
   * @return DataplexEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataplexEmpty::class);
  }
  /**
   * Get a metadata entity. (entities.get)
   *
   * @param string $name Required. The resource name of the entity: projects/{proj
   * ect_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}/entities/
   * {entity_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. Used to select the subset of entity
   * information to return. Defaults to BASIC.
   * @return GoogleCloudDataplexV1Entity
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDataplexV1Entity::class);
  }
  /**
   * List metadata entities in a zone.
   * (entities.listProjectsLocationsLakesZonesEntities)
   *
   * @param string $parent Required. The resource name of the parent zone: project
   * s/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The following filter parameters can be
   * added to the URL to limit the entities returned by the API: Entity ID:
   * ?filter="id=entityID" Asset ID: ?filter="asset=assetID" Data path
   * ?filter="data_path=gs://my-bucket" Is HIVE compatible:
   * ?filter="hive_compatible=true" Is BigQuery compatible:
   * ?filter="bigquery_compatible=true"
   * @opt_param int pageSize Optional. Maximum number of entities to return. The
   * service may return fewer than this value. If unspecified, 100 entities will
   * be returned by default. The maximum value is 500; larger values will will be
   * truncated to 500.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListEntities call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to ListEntities must match the call
   * that provided the page token.
   * @opt_param string view Required. Specify the entity view to make a partial
   * list request.
   * @return GoogleCloudDataplexV1ListEntitiesResponse
   */
  public function listProjectsLocationsLakesZonesEntities($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListEntitiesResponse::class);
  }
  /**
   * Update a metadata entity. Only supports full resource update.
   * (entities.update)
   *
   * @param string $name Output only. The resource name of the entity, of the
   * form: projects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones
   * /{zone_id}/entities/{id}.
   * @param GoogleCloudDataplexV1Entity $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Entity
   */
  public function update($name, GoogleCloudDataplexV1Entity $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudDataplexV1Entity::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesZonesEntities::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesZonesEntities');
