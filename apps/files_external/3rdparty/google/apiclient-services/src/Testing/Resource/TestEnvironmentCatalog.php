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

namespace Google\Service\Testing\Resource;

use Google\Service\Testing\TestEnvironmentCatalog as TestEnvironmentCatalogModel;

/**
 * The "testEnvironmentCatalog" collection of methods.
 * Typical usage is:
 *  <code>
 *   $testingService = new Google\Service\Testing(...);
 *   $testEnvironmentCatalog = $testingService->testEnvironmentCatalog;
 *  </code>
 */
class TestEnvironmentCatalog extends \Google\Service\Resource
{
  /**
   * Gets the catalog of supported test environments. May return any of the
   * following canonical error codes: - INVALID_ARGUMENT - if the request is
   * malformed - NOT_FOUND - if the environment type does not exist - INTERNAL -
   * if an internal error occurred (testEnvironmentCatalog.get)
   *
   * @param string $environmentType Required. The type of environment that should
   * be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId For authorization, the cloud project requesting
   * the TestEnvironmentCatalog.
   * @return TestEnvironmentCatalogModel
   */
  public function get($environmentType, $optParams = [])
  {
    $params = ['environmentType' => $environmentType];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TestEnvironmentCatalogModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestEnvironmentCatalog::class, 'Google_Service_Testing_Resource_TestEnvironmentCatalog');
