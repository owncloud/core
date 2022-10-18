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

namespace Google\Service\Connectors\Resource;

use Google\Service\Connectors\ConnectorsEmpty;
use Google\Service\Connectors\Entity;
use Google\Service\Connectors\ListEntitiesResponse;
use Google\Service\Connectors\UpdateEntitiesWithConditionsResponse;

/**
 * The "entities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $entities = $connectorsService->entities;
 *  </code>
 */
class ProjectsLocationsConnectionsEntityTypesEntities extends \Google\Service\Resource
{
  /**
   * Creates a new entity row of the specified entity type in the external system.
   * The field values for creating the row are contained in the body of the
   * request. The response message contains a `Entity` message object returned as
   * a response by the external system. (entities.create)
   *
   * @param string $parent Required. Resource name of the Entity Type. Format: pro
   * jects/{project}/locations/{location}/connections/{connection}/entityTypes/{ty
   * pe}
   * @param Entity $postBody
   * @param array $optParams Optional parameters.
   * @return Entity
   */
  public function create($parent, Entity $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Entity::class);
  }
  /**
   * Deletes an existing entity row matching the entity type and entity id
   * specified in the request. (entities.delete)
   *
   * @param string $name Required. Resource name of the Entity Type. Format: proje
   * cts/{project}/locations/{location}/connections/{connection}/entityTypes/{type
   * }/entities/{id}
   * @param array $optParams Optional parameters.
   * @return ConnectorsEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ConnectorsEmpty::class);
  }
  /**
   * Deletes entities based on conditions specified in the request and not on
   * entity id. (entities.deleteEntitiesWithConditions)
   *
   * @param string $entityType Required. Resource name of the Entity Type. Format:
   * projects/{project}/locations/{location}/connections/{connection}/entityTypes/
   * {type}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string conditions Required. Conditions to be used when deleting
   * entities. From a proto standpoint, There are no restrictions on what can be
   * passed using this field. The connector documentation should have information
   * about what format of filters/conditions are supported. Note: If this
   * conditions field is left empty, an exception is thrown. We don't want to
   * consider 'empty conditions' to be a match-all case. Connector developers can
   * determine and document what a match-all case constraint would be.
   * @return ConnectorsEmpty
   */
  public function deleteEntitiesWithConditions($entityType, $optParams = [])
  {
    $params = ['entityType' => $entityType];
    $params = array_merge($params, $optParams);
    return $this->call('deleteEntitiesWithConditions', [$params], ConnectorsEmpty::class);
  }
  /**
   * Gets a single entity row matching the entity type and entity id specified in
   * the request. (entities.get)
   *
   * @param string $name Required. Resource name of the Entity Type. Format: proje
   * cts/{project}/locations/{location}/connections/{connection}/entityTypes/{type
   * }/entities/{id}
   * @param array $optParams Optional parameters.
   * @return Entity
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Entity::class);
  }
  /**
   * Lists entity rows of a particular entity type contained in the request. Note:
   * 1. Currently, only max of one 'sort_by' column is supported. 2. If no
   * 'sort_by' column is provided, the primary key of the table is used. If zero
   * or more than one primary key is available, we default to the unpaginated list
   * entities logic which only returns the first page. 3. The values of the
   * 'sort_by' columns must uniquely identify an entity row, otherwise undefined
   * behaviors may be observed during pagination. 4. Since transactions are not
   * supported, any updates, inserts or deletes during pagination can lead to
   * stale data being returned or other unexpected behaviors.
   * (entities.listProjectsLocationsConnectionsEntityTypesEntities)
   *
   * @param string $parent Required. Resource name of the Entity Type. Format: pro
   * jects/{project}/locations/{location}/connections/{connection}/entityTypes/{ty
   * pe}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string conditions Conditions to be used when listing entities.
   * From a proto standpoint, There are no restrictions on what can be passed
   * using this field. The connector documentation should have information about
   * what format of filters/conditions are supported.
   * @opt_param int pageSize Number of entity rows to return. Defaults page size =
   * 25. Max page size = 200.
   * @opt_param string pageToken Page token value if available from a previous
   * request.
   * @opt_param string sortBy List of 'sort_by' columns to use when returning the
   * results.
   * @return ListEntitiesResponse
   */
  public function listProjectsLocationsConnectionsEntityTypesEntities($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEntitiesResponse::class);
  }
  /**
   * Updates an existing entity row matching the entity type and entity id
   * specified in the request. The fields in the entity row that need to be
   * modified are contained in the body of the request. All unspecified fields are
   * left unchanged. The response message contains a `Entity` message object
   * returned as a response by the external system. (entities.patch)
   *
   * @param string $name Output only. Resource name of the Entity. Format: project
   * s/{project}/locations/{location}/connections/{connection}/entityTypes/{type}/
   * entities/{id}
   * @param Entity $postBody
   * @param array $optParams Optional parameters.
   * @return Entity
   */
  public function patch($name, Entity $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Entity::class);
  }
  /**
   * Updates entities based on conditions specified in the request and not on
   * entity id. (entities.updateEntitiesWithConditions)
   *
   * @param string $entityType Required. Resource name of the Entity Type. Format:
   * projects/{project}/locations/{location}/connections/{connection}/entityTypes/
   * {type}
   * @param Entity $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string conditions Required. Conditions to be used when updating
   * entities. From a proto standpoint, There are no restrictions on what can be
   * passed using this field. The connector documentation should have information
   * about what format of filters/conditions are supported. Note: If this
   * conditions field is left empty, an exception is thrown. We don't want to
   * consider 'empty conditions' to be a match-all case. Connector developers can
   * determine and document what a match-all case constraint would be.
   * @return UpdateEntitiesWithConditionsResponse
   */
  public function updateEntitiesWithConditions($entityType, Entity $postBody, $optParams = [])
  {
    $params = ['entityType' => $entityType, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateEntitiesWithConditions', [$params], UpdateEntitiesWithConditionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectionsEntityTypesEntities::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnectionsEntityTypesEntities');
