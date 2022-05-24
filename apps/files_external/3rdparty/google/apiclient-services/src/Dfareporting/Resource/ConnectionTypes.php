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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\ConnectionType;
use Google\Service\Dfareporting\ConnectionTypesListResponse;

/**
 * The "connectionTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $connectionTypes = $dfareportingService->connectionTypes;
 *  </code>
 */
class ConnectionTypes extends \Google\Service\Resource
{
  /**
   * Gets one connection type by ID. (connectionTypes.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Connection type ID.
   * @param array $optParams Optional parameters.
   * @return ConnectionType
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ConnectionType::class);
  }
  /**
   * Retrieves a list of connection types. (connectionTypes.listConnectionTypes)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   * @return ConnectionTypesListResponse
   */
  public function listConnectionTypes($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ConnectionTypesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConnectionTypes::class, 'Google_Service_Dfareporting_Resource_ConnectionTypes');
