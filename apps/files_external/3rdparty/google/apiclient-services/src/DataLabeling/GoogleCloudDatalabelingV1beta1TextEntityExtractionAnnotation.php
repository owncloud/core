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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation extends \Google\Model
{
  protected $annotationSpecType = GoogleCloudDatalabelingV1beta1AnnotationSpec::class;
  protected $annotationSpecDataType = '';
  protected $sequentialSegmentType = GoogleCloudDatalabelingV1beta1SequentialSegment::class;
  protected $sequentialSegmentDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function setAnnotationSpec(GoogleCloudDatalabelingV1beta1AnnotationSpec $annotationSpec)
  {
    $this->annotationSpec = $annotationSpec;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function getAnnotationSpec()
  {
    return $this->annotationSpec;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1SequentialSegment
   */
  public function setSequentialSegment(GoogleCloudDatalabelingV1beta1SequentialSegment $sequentialSegment)
  {
    $this->sequentialSegment = $sequentialSegment;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1SequentialSegment
   */
  public function getSequentialSegment()
  {
    return $this->sequentialSegment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation');
