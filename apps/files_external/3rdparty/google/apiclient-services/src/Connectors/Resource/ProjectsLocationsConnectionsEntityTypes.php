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

use Google\Service\Connectors\ListEntityTypesResponse;

/**
 * The "entityTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $entityTypes = $connectorsService->entityTypes;
 *  </code>
 */
class ProjectsLocationsConnectionsEntityTypes extends \Google\Service\Resource
{
  /**
   * Lists metadata related to all entity types present in the external system.
   * (entityTypes.listProjectsLocationsConnectionsEntityTypes)
   *
   * @param string $parent Required. Resource name of the Entity Type. Format:
   * projects/{project}/locations/{location}/connections/{connection}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of entity types to return. Defaults to 25.
   * @opt_param string pageToken Page token, return from a previous
   * ListEntityTypes call, that can be used retrieve the next page of content. If
   * unspecified, the request returns the first page of entity types.
   * @return ListEntityTypesResponse
   */
  public function listProjectsLocationsConnectionsEntityTypes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEntityTypesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectionsEntityTypes::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnectionsEntityTypes');
