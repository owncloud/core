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

class GoogleCloudVideointelligenceV1LabelDetectionConfig extends \Google\Model
{
  /**
   * @var float
   */
  public $frameConfidenceThreshold;
  /**
   * @var string
   */
  public $labelDetectionMode;
  /**
   * @var string
   */
  public $model;
  /**
   * @var bool
   */
  public $stationaryCamera;
  /**
   * @var float
   */
  public $videoConfidenceThreshold;

  /**
   * @param float
   */
  public function setFrameConfidenceThreshold($frameConfidenceThreshold)
  {
    $this->frameConfidenceThreshold = $frameConfidenceThreshold;
  }
  /**
   * @return float
   */
  public function getFrameConfidenceThreshold()
  {
    return $this->frameConfidenceThreshold;
  }
  /**
   * @param string
   */
  public function setLabelDetectionMode($labelDetectionMode)
  {
    $this->labelDetectionMode = $labelDetectionMode;
  }
  /**
   * @return string
   */
  public function getLabelDetectionMode()
  {
    return $this->labelDetectionMode;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param bool
   */
  public function setStationaryCamera($stationaryCamera)
  {
    $this->stationaryCamera = $stationaryCamera;
  }
  /**
   * @return bool
   */
  public function getStationaryCamera()
  {
    return $this->stationaryCamera;
  }
  /**
   * @param float
   */
  public function setVideoConfidenceThreshold($videoConfidenceThreshold)
  {
    $this->videoConfidenceThreshold = $videoConfidenceThreshold;
  }
  /**
   * @return float
   */
  public function getVideoConfidenceThreshold()
  {
    return $this->videoConfidenceThreshold;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1LabelDetectionConfig::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelDetectionConfig');
