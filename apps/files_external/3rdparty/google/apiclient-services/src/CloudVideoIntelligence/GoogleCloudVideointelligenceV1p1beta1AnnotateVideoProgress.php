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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1p1beta1AnnotateVideoProgress extends \Google\Collection
{
  protected $collection_key = 'annotationProgress';
  protected $annotationProgressType = GoogleCloudVideointelligenceV1p1beta1VideoAnnotationProgress::class;
  protected $annotationProgressDataType = 'array';

  /**
   * @param GoogleCloudVideointelligenceV1p1beta1VideoAnnotationProgress[]
   */
  public function setAnnotationProgress($annotationProgress)
  {
    $this->annotationProgress = $annotationProgress;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1VideoAnnotationProgress[]
   */
  public function getAnnotationProgress()
  {
    return $this->annotationProgress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p1beta1AnnotateVideoProgress::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1AnnotateVideoProgress');
