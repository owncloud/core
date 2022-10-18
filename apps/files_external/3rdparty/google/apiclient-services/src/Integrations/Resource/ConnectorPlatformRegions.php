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

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaEnumerateConnectorPlatformRegionsResponse;

/**
 * The "connectorPlatformRegions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $connectorPlatformRegions = $integrationsService->connectorPlatformRegions;
 *  </code>
 */
class ConnectorPlatformRegions extends \Google\Service\Resource
{
  /**
   * Enumerates the regions for which Connector Platform is provisioned.
   * (connectorPlatformRegions.enumerate)
   *
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaEnumerateConnectorPlatformRegionsResponse
   */
  public function enumerate($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('enumerate', [$params], GoogleCloudIntegrationsV1alphaEnumerateConnectorPlatformRegionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConnectorPlatformRegions::class, 'Google_Service_Integrations_Resource_ConnectorPlatformRegions');
