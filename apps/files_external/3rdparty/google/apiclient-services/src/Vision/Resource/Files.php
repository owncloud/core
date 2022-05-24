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

use Google\Service\Vision\AsyncBatchAnnotateFilesRequest;
use Google\Service\Vision\BatchAnnotateFilesRequest;
use Google\Service\Vision\BatchAnnotateFilesResponse;
use Google\Service\Vision\Operation;

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google\Service\Vision(...);
 *   $files = $visionService->files;
 *  </code>
 */
class Files extends \Google\Service\Resource
{
  /**
   * Service that performs image detection and annotation for a batch of files.
   * Now only "application/pdf", "image/tiff" and "image/gif" are supported. This
   * service will extract at most 5 (customers can specify which 5 in
   * AnnotateFileRequest.pages) frames (gif) or pages (pdf or tiff) from each file
   * provided and perform detection and annotation for each image extracted.
   * (files.annotate)
   *
   * @param BatchAnnotateFilesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchAnnotateFilesResponse
   */
  public function annotate(BatchAnnotateFilesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('annotate', [$params], BatchAnnotateFilesResponse::class);
  }
  /**
   * Run asynchronous image detection and annotation for a list of generic files,
   * such as PDF files, which may contain multiple pages and multiple images per
   * page. Progress and results can be retrieved through the
   * `google.longrunning.Operations` interface. `Operation.metadata` contains
   * `OperationMetadata` (metadata). `Operation.response` contains
   * `AsyncBatchAnnotateFilesResponse` (results). (files.asyncBatchAnnotate)
   *
   * @param AsyncBatchAnnotateFilesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function asyncBatchAnnotate(AsyncBatchAnnotateFilesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('asyncBatchAnnotate', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Files::class, 'Google_Service_Vision_Resource_Files');
