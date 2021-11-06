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

use Google\Service\Connectors\ListRuntimeActionSchemasResponse;

/**
 * The "runtimeActionSchemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $runtimeActionSchemas = $connectorsService->runtimeActionSchemas;
 *  </code>
 */
class ProjectsLocationsConnectionsRuntimeActionSchemas extends \Google\Service\Resource
{
  /**
   * List schema of a runtime actions filtered by action name.
   * (runtimeActionSchemas.listProjectsLocationsConnectionsRuntimeActionSchemas)
   *
   * @param string $parent Required. Parent resource of RuntimeActionSchema
   * Format: projects/{project}/locations/{location}/connections/{connection}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @return ListRuntimeActionSchemasResponse
   */
  public function listProjectsLocationsConnectionsRuntimeActionSchemas($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRuntimeActionSchemasResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectionsRuntimeActionSchemas::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnectionsRuntimeActionSchemas');
