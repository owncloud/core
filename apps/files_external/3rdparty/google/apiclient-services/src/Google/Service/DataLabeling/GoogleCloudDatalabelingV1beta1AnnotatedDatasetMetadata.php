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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata extends Google_Model
{
  protected $boundingPolyConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig';
  protected $boundingPolyConfigDataType = '';
  protected $eventConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EventConfig';
  protected $eventConfigDataType = '';
  protected $humanAnnotationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig';
  protected $humanAnnotationConfigDataType = '';
  protected $imageClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig';
  protected $imageClassificationConfigDataType = '';
  protected $objectDetectionConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionConfig';
  protected $objectDetectionConfigDataType = '';
  protected $objectTrackingConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectTrackingConfig';
  protected $objectTrackingConfigDataType = '';
  protected $polylineConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig';
  protected $polylineConfigDataType = '';
  protected $segmentationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig';
  protected $segmentationConfigDataType = '';
  protected $textClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig';
  protected $textClassificationConfigDataType = '';
  protected $textEntityExtractionConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig';
  protected $textEntityExtractionConfigDataType = '';
  protected $videoClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationConfig';
  protected $videoClassificationConfigDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function setBoundingPolyConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig $boundingPolyConfig)
  {
    $this->boundingPolyConfig = $boundingPolyConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function getBoundingPolyConfig()
  {
    return $this->boundingPolyConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EventConfig
   */
  public function setEventConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EventConfig $eventConfig)
  {
    $this->eventConfig = $eventConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EventConfig
   */
  public function getEventConfig()
  {
    return $this->eventConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setHumanAnnotationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $humanAnnotationConfig)
  {
    $this->humanAnnotationConfig = $humanAnnotationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getHumanAnnotationConfig()
  {
    return $this->humanAnnotationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function setImageClassificationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig $imageClassificationConfig)
  {
    $this->imageClassificationConfig = $imageClassificationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function getImageClassificationConfig()
  {
    return $this->imageClassificationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionConfig
   */
  public function setObjectDetectionConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionConfig $objectDetectionConfig)
  {
    $this->objectDetectionConfig = $objectDetectionConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionConfig
   */
  public function getObjectDetectionConfig()
  {
    return $this->objectDetectionConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectTrackingConfig
   */
  public function setObjectTrackingConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectTrackingConfig $objectTrackingConfig)
  {
    $this->objectTrackingConfig = $objectTrackingConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectTrackingConfig
   */
  public function getObjectTrackingConfig()
  {
    return $this->objectTrackingConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function setPolylineConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig $polylineConfig)
  {
    $this->polylineConfig = $polylineConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function getPolylineConfig()
  {
    return $this->polylineConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function setSegmentationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig $segmentationConfig)
  {
    $this->segmentationConfig = $segmentationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function getSegmentationConfig()
  {
    return $this->segmentationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function setTextClassificationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig $textClassificationConfig)
  {
    $this->textClassificationConfig = $textClassificationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function getTextClassificationConfig()
  {
    return $this->textClassificationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig
   */
  public function setTextEntityExtractionConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig $textEntityExtractionConfig)
  {
    $this->textEntityExtractionConfig = $textEntityExtractionConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig
   */
  public function getTextEntityExtractionConfig()
  {
    return $this->textEntityExtractionConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationConfig
   */
  public function setVideoClassificationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationConfig $videoClassificationConfig)
  {
    $this->videoClassificationConfig = $videoClassificationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationConfig
   */
  public function getVideoClassificationConfig()
  {
    return $this->videoClassificationConfig;
  }
}
