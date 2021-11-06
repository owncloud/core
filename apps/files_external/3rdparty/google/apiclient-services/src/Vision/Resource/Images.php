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

namespace Google\Service\Vision\Resource;

use Google\Service\Vision\AsyncBatchAnnotateImagesRequest;
use Google\Service\Vision\BatchAnnotateImagesRequest;
use Google\Service\Vision\BatchAnnotateImagesResponse;
use Google\Service\Vision\Operation;

/**
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google\Service\Vision(...);
 *   $images = $visionService->images;
 *  </code>
 */
class Images extends \Google\Service\Resource
{
  /**
   * Run image detection and annotation for a batch of images. (images.annotate)
   *
   * @param BatchAnnotateImagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchAnnotateImagesResponse
   */
  public function annotate(BatchAnnotateImagesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('annotate', [$params], BatchAnnotateImagesResponse::class);
  }
  /**
   * Run asynchronous image detection and annotation for a list of images.
   * Progress and results can be retrieved through the
   * `google.longrunning.Operations` interface. `Operation.metadata` contains
   * `OperationMetadata` (metadata). `Operation.response` contains
   * `AsyncBatchAnnotateImagesResponse` (results). This service will write image
   * annotation outputs to json files in customer GCS bucket, each json file
   * containing BatchAnnotateImagesResponse proto. (images.asyncBatchAnnotate)
   *
   * @param AsyncBatchAnnotateImagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function asyncBatchAnnotate(AsyncBatchAnnotateImagesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('asyncBatchAnnotate', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Images::class, 'Google_Service_Vision_Resource_Images');
