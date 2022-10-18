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

namespace Google\Service\Contentwarehouse\Resource;

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1InitializeProjectRequest;
use Google\Service\Contentwarehouse\GoogleLongrunningOperation;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $locations = $contentwarehouseService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Provisions resources for given tenant project. Returns a long running
   * operation. (locations.initialize)
   *
   * @param string $location Required. The location to be initialized Format:
   * projects/{project_number}/locations/{location}.
   * @param GoogleCloudContentwarehouseV1InitializeProjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function initialize($location, GoogleCloudContentwarehouseV1InitializeProjectRequest $postBody, $optParams = [])
  {
    $params = ['location' => $location, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('initialize', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocations');
