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

use Google\Service\Document\GoogleCloudDocumentaiV1ListProcessorTypesResponse;

/**
 * The "processorTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google\Service\Document(...);
 *   $processorTypes = $documentaiService->processorTypes;
 *  </code>
 */
class ProjectsLocationsProcessorTypes extends \Google\Service\Resource
{
  /**
   * Lists the processor types that exist.
   * (processorTypes.listProjectsLocationsProcessorTypes)
   *
   * @param string $parent Required. The location of processor type to list. The
   * available processor types may depend on the allow-listing on projects.
   * Format: `projects/{project}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of processor types to return. If
   * unspecified, at most 100 processor types will be returned. The maximum value
   * is 500; values above 500 will be coerced to 500.
   * @opt_param string pageToken Used to retrieve the next page of results, empty
   * if at the end of the list.
   * @return GoogleCloudDocumentaiV1ListProcessorTypesResponse
   */
  public function listProjectsLocationsProcessorTypes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDocumentaiV1ListProcessorTypesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProcessorTypes::class, 'Google_Service_Document_Resource_ProjectsLocationsProcessorTypes');
