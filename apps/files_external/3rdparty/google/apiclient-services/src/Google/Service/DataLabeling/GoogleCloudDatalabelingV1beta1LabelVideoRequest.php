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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoRequest extends Google_Model
{
  protected $basicConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig';
  protected $basicConfigDataType = '';
  protected $eventConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EventConfig';
  protected $eventConfigDataType = '';
  public $feature;
  protected $objectDetectionConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionConfig';
  protected $objectDetectionConfigDataType = '';
  protected $objectTrackingConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectTrackingConfig';
  protected $objectTrackingConfigDataType = '';
  protected $videoClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationConfig';
  protected $videoClassificationConfigDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setBasicConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $basicConfig)
  {
    $this->basicConfig = $basicConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getBasicConfig()
  {
    return $this->basicConfig;
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
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  public function getFeature()
  {
    return $this->feature;
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
