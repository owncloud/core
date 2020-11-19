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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation extends Google_Model
{
  protected $annotationSpecType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec';
  protected $annotationSpecDataType = '';
  protected $sequentialSegmentType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SequentialSegment';
  protected $sequentialSegmentDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function setAnnotationSpec(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec $annotationSpec)
  {
    $this->annotationSpec = $annotationSpec;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function getAnnotationSpec()
  {
    return $this->annotationSpec;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SequentialSegment
   */
  public function setSequentialSegment(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SequentialSegment $sequentialSegment)
  {
    $this->sequentialSegment = $sequentialSegment;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SequentialSegment
   */
  public function getSequentialSegment()
  {
    return $this->sequentialSegment;
  }
}
