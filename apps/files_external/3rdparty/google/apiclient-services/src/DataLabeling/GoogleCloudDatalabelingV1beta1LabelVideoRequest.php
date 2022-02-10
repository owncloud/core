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

class GoogleCloudDatalabelingV1beta1LabelVideoRequest extends \Google\Model
{
  protected $basicConfigType = GoogleCloudDatalabelingV1beta1HumanAnnotationConfig::class;
  protected $basicConfigDataType = '';
  protected $eventConfigType = GoogleCloudDatalabelingV1beta1EventConfig::class;
  protected $eventConfigDataType = '';
  /**
   * @var string
   */
  public $feature;
  protected $objectDetectionConfigType = GoogleCloudDatalabelingV1beta1ObjectDetectionConfig::class;
  protected $objectDetectionConfigDataType = '';
  protected $objectTrackingConfigType = GoogleCloudDatalabelingV1beta1ObjectTrackingConfig::class;
  protected $objectTrackingConfigDataType = '';
  protected $videoClassificationConfigType = GoogleCloudDatalabelingV1beta1VideoClassificationConfig::class;
  protected $videoClassificationConfigDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setBasicConfig(GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $basicConfig)
  {
    $this->basicConfig = $basicConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getBasicConfig()
  {
    return $this->basicConfig;
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
   * @param string
   */
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  /**
   * @return string
   */
  public function getFeature()
  {
    return $this->feature;
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
class_alias(GoogleCloudDatalabelingV1beta1LabelVideoRequest::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoRequest');
