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

use Google\Service\Connectors\ConnectorVersion;
use Google\Service\Connectors\ListConnectorVersionsResponse;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $versions = $connectorsService->versions;
 *  </code>
 */
class ProjectsLocationsConnectorsGlobalProvidersConnectorsVersions extends \Google\Service\Resource
{
  /**
   * Gets details of a single connector version. (versions.get)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/providers/connectors/versions`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies which fields of the ConnectorVersion are
   * returned in the response. Defaults to `CUSTOMER` view.
   * @return ConnectorVersion
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ConnectorVersion::class);
  }
  /**
   * Lists Connector Versions in a given project and location.
   * (versions.listProjectsLocationsConnectorsGlobalProvidersConnectorsVersions)
   *
   * @param string $parent Required. Parent resource of the connectors, of the
   * form: `projects/locations/providers/connectors`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @opt_param string view Specifies which fields of the ConnectorVersion are
   * returned in the response. Defaults to `CUSTOMER` view.
   * @return ListConnectorVersionsResponse
   */
  public function listProjectsLocationsConnectorsGlobalProvidersConnectorsVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectorVersionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectorsGlobalProvidersConnectorsVersions::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnectorsGlobalProvidersConnectorsVersions');
