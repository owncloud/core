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

use Google\Service\Connectors\Connector;
use Google\Service\Connectors\ListConnectorsResponse;

/**
 * The "connectors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $connectors = $connectorsService->connectors;
 *  </code>
 */
class ProjectsLocationsConnectorsGlobalProvidersConnectors extends \Google\Service\Resource
{
  /**
   * Gets details of a single Connector. (connectors.get)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/providers/connectors`
   * @param array $optParams Optional parameters.
   * @return Connector
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Connector::class);
  }
  /**
   * Lists Connectors in a given project and location.
   * (connectors.listProjectsLocationsConnectorsGlobalProvidersConnectors)
   *
   * @param string $parent Required. Parent resource of the connectors, of the
   * form: `projects/locations/providers`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @return ListConnectorsResponse
   */
  public function listProjectsLocationsConnectorsGlobalProvidersConnectors($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectorsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectorsGlobalProvidersConnectors::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnectorsGlobalProvidersConnectors');
