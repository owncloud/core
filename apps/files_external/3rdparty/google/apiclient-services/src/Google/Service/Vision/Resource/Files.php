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
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google_Service_Vision(...);
 *   $files = $visionService->files;
 *  </code>
 */
class Google_Service_Vision_Resource_Files extends Google_Service_Resource
{
  /**
   * Service that performs image detection and annotation for a batch of files.
   * Now only "application/pdf", "image/tiff" and "image/gif" are supported. This
   * service will extract at most 5 (customers can specify which 5 in
   * AnnotateFileRequest.pages) frames (gif) or pages (pdf or tiff) from each file
   * provided and perform detection and annotation for each image extracted.
   * (files.annotate)
   *
   * @param Google_Service_Vision_BatchAnnotateFilesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_BatchAnnotateFilesResponse
   */
  public function annotate(Google_Service_Vision_BatchAnnotateFilesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('annotate', array($params), "Google_Service_Vision_BatchAnnotateFilesResponse");
  }
  /**
   * Run asynchronous image detection and annotation for a list of generic files,
   * such as PDF files, which may contain multiple pages and multiple images per
   * page. Progress and results can be retrieved through the
   * `google.longrunning.Operations` interface. `Operation.metadata` contains
   * `OperationMetadata` (metadata). `Operation.response` contains
   * `AsyncBatchAnnotateFilesResponse` (results). (files.asyncBatchAnnotate)
   *
   * @param Google_Service_Vision_AsyncBatchAnnotateFilesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_Operation
   */
  public function asyncBatchAnnotate(Google_Service_Vision_AsyncBatchAnnotateFilesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('asyncBatchAnnotate', array($params), "Google_Service_Vision_Operation");
  }
}
