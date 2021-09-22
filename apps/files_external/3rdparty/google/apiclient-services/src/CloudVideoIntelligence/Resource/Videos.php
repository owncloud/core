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

namespace Google\Service\CloudVideoIntelligence\Resource;

use Google\Service\CloudVideoIntelligence\GoogleCloudVideointelligenceV1AnnotateVideoRequest;
use Google\Service\CloudVideoIntelligence\GoogleLongrunningOperation;

/**
 * The "videos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $videointelligenceService = new Google\Service\CloudVideoIntelligence(...);
 *   $videos = $videointelligenceService->videos;
 *  </code>
 */
class Videos extends \Google\Service\Resource
{
  /**
   * Performs asynchronous video annotation. Progress and results can be retrieved
   * through the `google.longrunning.Operations` interface. `Operation.metadata`
   * contains `AnnotateVideoProgress` (progress). `Operation.response` contains
   * `AnnotateVideoResponse` (results). (videos.annotate)
   *
   * @param GoogleCloudVideointelligenceV1AnnotateVideoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function annotate(GoogleCloudVideointelligenceV1AnnotateVideoRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('annotate', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Videos::class, 'Google_Service_CloudVideoIntelligence_Resource_Videos');
