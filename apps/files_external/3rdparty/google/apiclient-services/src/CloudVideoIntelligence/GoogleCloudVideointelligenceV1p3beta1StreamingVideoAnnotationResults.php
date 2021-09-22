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

class GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults extends \Google\Collection
{
  protected $collection_key = 'shotAnnotations';
  protected $explicitAnnotationType = GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation::class;
  protected $explicitAnnotationDataType = '';
  public $frameTimestamp;
  protected $labelAnnotationsType = GoogleCloudVideointelligenceV1p3beta1LabelAnnotation::class;
  protected $labelAnnotationsDataType = 'array';
  protected $objectAnnotationsType = GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation::class;
  protected $objectAnnotationsDataType = 'array';
  protected $shotAnnotationsType = GoogleCloudVideointelligenceV1p3beta1VideoSegment::class;
  protected $shotAnnotationsDataType = 'array';

  /**
   * @param GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation
   */
  public function setExplicitAnnotation(GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation $explicitAnnotation)
  {
    $this->explicitAnnotation = $explicitAnnotation;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation
   */
  public function getExplicitAnnotation()
  {
    return $this->explicitAnnotation;
  }
  public function setFrameTimestamp($frameTimestamp)
  {
    $this->frameTimestamp = $frameTimestamp;
  }
  public function getFrameTimestamp()
  {
    return $this->frameTimestamp;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p3beta1LabelAnnotation[]
   */
  public function setLabelAnnotations($labelAnnotations)
  {
    $this->labelAnnotations = $labelAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1LabelAnnotation[]
   */
  public function getLabelAnnotations()
  {
    return $this->labelAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation[]
   */
  public function setObjectAnnotations($objectAnnotations)
  {
    $this->objectAnnotations = $objectAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation[]
   */
  public function getObjectAnnotations()
  {
    return $this->objectAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p3beta1VideoSegment[]
   */
  public function setShotAnnotations($shotAnnotations)
  {
    $this->shotAnnotations = $shotAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1VideoSegment[]
   */
  public function getShotAnnotations()
  {
    return $this->shotAnnotations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults');
