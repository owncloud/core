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

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaConnectionSchemaMetadata;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListConnectionsResponse;

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $connections = $integrationsService->connections;
 *  </code>
 */
class ProjectsLocationsConnections extends \Google\Service\Resource
{
  /**
   * Lists the available entities and actions associated with a Connection.
   * (connections.getConnectionSchemaMetadata)
   *
   * @param string $name Required. ConnectionSchemaMetadata name. Format: projects
   * /{project}/locations/{location}/connections/{connection}/connectionSchemaMeta
   * data
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaConnectionSchemaMetadata
   */
  public function getConnectionSchemaMetadata($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConnectionSchemaMetadata', [$params], GoogleCloudIntegrationsV1alphaConnectionSchemaMetadata::class);
  }
  /**
   * Lists Connections in a given project and location.
   * (connections.listProjectsLocationsConnections)
   *
   * @param string $parent Required. Parent resource of the Connection, of the
   * form: `projects/locations`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter.
   * @opt_param string orderBy Order by parameters.
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @return GoogleCloudIntegrationsV1alphaListConnectionsResponse
   */
  public function listProjectsLocationsConnections($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListConnectionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnections::class, 'Google_Service_Integrations_Resource_ProjectsLocationsConnections');
