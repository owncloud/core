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

/**
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google_Service_Vision(...);
 *   $images = $visionService->images;
 *  </code>
 */
class Google_Service_Vision_Resource_ProjectsLocationsImages extends Google_Service_Resource
{
  /**
   * Run image detection and annotation for a batch of images. (images.annotate)
   *
   * @param string $parent Optional. Target project and location to make a call.
   *
   * Format: `projects/{project-id}/locations/{location-id}`.
   *
   * If no parent is specified, a region will be chosen automatically.
   *
   * Supported location-ids:     `us`: USA country only,     `asia`: East asia
   * areas, like Japan, Taiwan,     `eu`: The European Union.
   *
   * Example: `projects/project-A/locations/eu`.
   * @param Google_Service_Vision_BatchAnnotateImagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_BatchAnnotateImagesResponse
   */
  public function annotate($parent, Google_Service_Vision_BatchAnnotateImagesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('annotate', array($params), "Google_Service_Vision_BatchAnnotateImagesResponse");
  }
  /**
   * Run asynchronous image detection and annotation for a list of images.
   *
   * Progress and results can be retrieved through the
   * `google.longrunning.Operations` interface. `Operation.metadata` contains
   * `OperationMetadata` (metadata). `Operation.response` contains
   * `AsyncBatchAnnotateImagesResponse` (results).
   *
   * This service will write image annotation outputs to json files in customer
   * GCS bucket, each json file containing BatchAnnotateImagesResponse proto.
   * (images.asyncBatchAnnotate)
   *
   * @param string $parent Optional. Target project and location to make a call.
   *
   * Format: `projects/{project-id}/locations/{location-id}`.
   *
   * If no parent is specified, a region will be chosen automatically.
   *
   * Supported location-ids:     `us`: USA country only,     `asia`: East asia
   * areas, like Japan, Taiwan,     `eu`: The European Union.
   *
   * Example: `projects/project-A/locations/eu`.
   * @param Google_Service_Vision_AsyncBatchAnnotateImagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_Operation
   */
  public function asyncBatchAnnotate($parent, Google_Service_Vision_AsyncBatchAnnotateImagesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('asyncBatchAnnotate', array($params), "Google_Service_Vision_Operation");
  }
}
