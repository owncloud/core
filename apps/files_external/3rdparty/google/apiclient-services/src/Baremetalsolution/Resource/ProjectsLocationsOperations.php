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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\Operation;

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $operations = $baremetalsolutionService->operations;
 *  </code>
 */
class ProjectsLocationsOperations extends \Google\Service\Resource
{
  /**
   * Get details about an operation. This method used only to work around CCFE
   * lack of passthrough LRO support (b/221498758). (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsOperations::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsOperations');
