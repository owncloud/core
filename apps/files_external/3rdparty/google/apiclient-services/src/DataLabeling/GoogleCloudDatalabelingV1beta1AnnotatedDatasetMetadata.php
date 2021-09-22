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

class GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata extends \Google\Model
{
  protected $boundingPolyConfigType = GoogleCloudDatalabelingV1beta1BoundingPolyConfig::class;
  protected $boundingPolyConfigDataType = '';
  protected $eventConfigType = GoogleCloudDatalabelingV1beta1EventConfig::class;
  protected $eventConfigDataType = '';
  protected $humanAnnotationConfigType = GoogleCloudDatalabelingV1beta1HumanAnnotationConfig::class;
  protected $humanAnnotationConfigDataType = '';
  protected $imageClassificationConfigType = GoogleCloudDatalabelingV1beta1ImageClassificationConfig::class;
  protected $imageClassificationConfigDataType = '';
  protected $objectDetectionConfigType = GoogleCloudDatalabelingV1beta1ObjectDetectionConfig::class;
  protected $objectDetectionConfigDataType = '';
  protected $objectTrackingConfigType = GoogleCloudDatalabelingV1beta1ObjectTrackingConfig::class;
  protected $objectTrackingConfigDataType = '';
  protected $polylineConfigType = GoogleCloudDatalabelingV1beta1PolylineConfig::class;
  protected $polylineConfigDataType = '';
  protected $segmentationConfigType = GoogleCloudDatalabelingV1beta1SegmentationConfig::class;
  protected $segmentationConfigDataType = '';
  protected $textClassificationConfigType = GoogleCloudDatalabelingV1beta1TextClassificationConfig::class;
  protected $textClassificationConfigDataType = '';
  protected $textEntityExtractionConfigType = GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig::class;
  protected $textEntityExtractionConfigDataType = '';
  protected $videoClassificationConfigType = GoogleCloudDatalabelingV1beta1VideoClassificationConfig::class;
  protected $videoClassificationConfigDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function setBoundingPolyConfig(GoogleCloudDatalabelingV1beta1BoundingPolyConfig $boundingPolyConfig)
  {
    $this->boundingPolyConfig = $boundingPolyConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function getBoundingPolyConfig()
  {
    return $this->boundingPolyConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1EventConfig
   */
  public function setEventConfig(GoogleCloudDatalabelingV1beta1EventConfig $eventConfig)
  {
    $this->eventConfig = $eventConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1EventConfig
   */
  public function getEventConfig()
  {
    return $this->eventConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setHumanAnnotationConfig(GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $humanAnnotationConfig)
  {
    $this->humanAnnotationConfig = $humanAnnotationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getHumanAnnotationConfig()
  {
    return $this->humanAnnotationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function setImageClassificationConfig(GoogleCloudDatalabelingV1beta1ImageClassificationConfig $imageClassificationConfig)
  {
    $this->imageClassificationConfig = $imageClassificationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function getImageClassificationConfig()
  {
    return $this->imageClassificationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ObjectDetectionConfig
   */
  public function setObjectDetectionConfig(GoogleCloudDatalabelingV1beta1ObjectDetectionConfig $objectDetectionConfig)
  {
    $this->objectDetectionConfig = $objectDetectionConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ObjectDetectionConfig
   */
  public function getObjectDetectionConfig()
  {
    return $this->objectDetectionConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ObjectTrackingConfig
   */
  public function setObjectTrackingConfig(GoogleCloudDatalabelingV1beta1ObjectTrackingConfig $objectTrackingConfig)
  {
    $this->objectTrackingConfig = $objectTrackingConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ObjectTrackingConfig
   */
  public function getObjectTrackingConfig()
  {
    return $this->objectTrackingConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function setPolylineConfig(GoogleCloudDatalabelingV1beta1PolylineConfig $polylineConfig)
  {
    $this->polylineConfig = $polylineConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function getPolylineConfig()
  {
    return $this->polylineConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function setSegmentationConfig(GoogleCloudDatalabelingV1beta1SegmentationConfig $segmentationConfig)
  {
    $this->segmentationConfig = $segmentationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function getSegmentationConfig()
  {
    return $this->segmentationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function setTextClassificationConfig(GoogleCloudDatalabelingV1beta1TextClassificationConfig $textClassificationConfig)
  {
    $this->textClassificationConfig = $textClassificationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function getTextClassificationConfig()
  {
    return $this->textClassificationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig
   */
  public function setTextEntityExtractionConfig(GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig $textEntityExtractionConfig)
  {
    $this->textEntityExtractionConfig = $textEntityExtractionConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig
   */
  public function getTextEntityExtractionConfig()
  {
    return $this->textEntityExtractionConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1VideoClassificationConfig
   */
  public function setVideoClassificationConfig(GoogleCloudDatalabelingV1beta1VideoClassificationConfig $videoClassificationConfig)
  {
    $this->videoClassificationConfig = $videoClassificationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1VideoClassificationConfig
   */
  public function getVideoClassificationConfig()
  {
    return $this->videoClassificationConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata');
