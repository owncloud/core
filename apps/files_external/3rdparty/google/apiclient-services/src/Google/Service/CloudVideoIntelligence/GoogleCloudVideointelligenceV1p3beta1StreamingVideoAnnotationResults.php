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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults extends Google_Collection
{
  protected $collection_key = 'shotAnnotations';
  protected $explicitAnnotationType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation';
  protected $explicitAnnotationDataType = '';
  protected $labelAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1LabelAnnotation';
  protected $labelAnnotationsDataType = 'array';
  protected $objectAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation';
  protected $objectAnnotationsDataType = 'array';
  protected $shotAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment';
  protected $shotAnnotationsDataType = 'array';

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation
   */
  public function setExplicitAnnotation(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation $explicitAnnotation)
  {
    $this->explicitAnnotation = $explicitAnnotation;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ExplicitContentAnnotation
   */
  public function getExplicitAnnotation()
  {
    return $this->explicitAnnotation;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1LabelAnnotation
   */
  public function setLabelAnnotations($labelAnnotations)
  {
    $this->labelAnnotations = $labelAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1LabelAnnotation
   */
  public function getLabelAnnotations()
  {
    return $this->labelAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation
   */
  public function setObjectAnnotations($objectAnnotations)
  {
    $this->objectAnnotations = $objectAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation
   */
  public function getObjectAnnotations()
  {
    return $this->objectAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment
   */
  public function setShotAnnotations($shotAnnotations)
  {
    $this->shotAnnotations = $shotAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment
   */
  public function getShotAnnotations()
  {
    return $this->shotAnnotations;
  }
}
