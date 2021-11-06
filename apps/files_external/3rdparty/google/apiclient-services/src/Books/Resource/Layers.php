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

namespace Google\Service\Books\Resource;

use Google\Service\Books\Layersummaries;
use Google\Service\Books\Layersummary;

/**
 * The "layers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $layers = $booksService->layers;
 *  </code>
 */
class Layers extends \Google\Service\Resource
{
  /**
   * Gets the layer summary for a volume. (layers.get)
   *
   * @param string $volumeId The volume to retrieve layers for.
   * @param string $summaryId The ID for the layer to get the summary for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string contentVersion The content version for the requested
   * volume.
   * @opt_param string source String to identify the originator of this request.
   * @return Layersummary
   */
  public function get($volumeId, $summaryId, $optParams = [])
  {
    $params = ['volumeId' => $volumeId, 'summaryId' => $summaryId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Layersummary::class);
  }
  /**
   * List the layer summaries for a volume. (layers.listLayers)
   *
   * @param string $volumeId The volume to retrieve layers for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string contentVersion The content version for the requested
   * volume.
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken The value of the nextToken from the previous
   * page.
   * @opt_param string source String to identify the originator of this request.
   * @return Layersummaries
   */
  public function listLayers($volumeId, $optParams = [])
  {
    $params = ['volumeId' => $volumeId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Layersummaries::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Layers::class, 'Google_Service_Books_Resource_Layers');
