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

namespace Google\Service\Document\Resource;

use Google\Service\Document\GoogleCloudDocumentaiV1FetchProcessorTypesResponse;
use Google\Service\Document\GoogleCloudLocationListLocationsResponse;
use Google\Service\Document\GoogleCloudLocationLocation;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google\Service\Document(...);
 *   $locations = $documentaiService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Fetches processor types. Note that we do not use ListProcessorTypes here
   * because it is not paginated. (locations.fetchProcessorTypes)
   *
   * @param string $parent Required. The project of processor type to list. The
   * available processor types may depend on the allow-listing on projects.
   * Format: `projects/{project}/locations/{location}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDocumentaiV1FetchProcessorTypesResponse
   */
  public function fetchProcessorTypes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('fetchProcessorTypes', [$params], GoogleCloudDocumentaiV1FetchProcessorTypesResponse::class);
  }
  /**
   * Gets information about a location. (locations.get)
   *
   * @param string $name Resource name for the location.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudLocationLocation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudLocationLocation::class);
  }
  /**
   * Lists information about the supported locations for this service.
   * (locations.listProjectsLocations)
   *
   * @param string $name The resource that owns the locations collection, if
   * applicable.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to narrow down results to a preferred
   * subset. The filtering language accepts strings like "displayName=tokyo", and
   * is documented in more detail in [AIP-160](https://google.aip.dev/160).
   * @opt_param int pageSize The maximum number of results to return. If not set,
   * the service selects a default.
   * @opt_param string pageToken A page token received from the `next_page_token`
   * field in the response. Send that page token to receive the subsequent page.
   * @return GoogleCloudLocationListLocationsResponse
   */
  public function listProjectsLocations($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudLocationListLocationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_Document_Resource_ProjectsLocations');
