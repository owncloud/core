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

class GoogleCloudVideointelligenceV1VideoContext extends \Google\Collection
{
  protected $collection_key = 'segments';
  protected $explicitContentDetectionConfigType = GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig::class;
  protected $explicitContentDetectionConfigDataType = '';
  protected $faceDetectionConfigType = GoogleCloudVideointelligenceV1FaceDetectionConfig::class;
  protected $faceDetectionConfigDataType = '';
  protected $labelDetectionConfigType = GoogleCloudVideointelligenceV1LabelDetectionConfig::class;
  protected $labelDetectionConfigDataType = '';
  protected $objectTrackingConfigType = GoogleCloudVideointelligenceV1ObjectTrackingConfig::class;
  protected $objectTrackingConfigDataType = '';
  protected $personDetectionConfigType = GoogleCloudVideointelligenceV1PersonDetectionConfig::class;
  protected $personDetectionConfigDataType = '';
  protected $segmentsType = GoogleCloudVideointelligenceV1VideoSegment::class;
  protected $segmentsDataType = 'array';
  protected $shotChangeDetectionConfigType = GoogleCloudVideointelligenceV1ShotChangeDetectionConfig::class;
  protected $shotChangeDetectionConfigDataType = '';
  protected $speechTranscriptionConfigType = GoogleCloudVideointelligenceV1SpeechTranscriptionConfig::class;
  protected $speechTranscriptionConfigDataType = '';
  protected $textDetectionConfigType = GoogleCloudVideointelligenceV1TextDetectionConfig::class;
  protected $textDetectionConfigDataType = '';

  /**
   * @param GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig
   */
  public function setExplicitContentDetectionConfig(GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig $explicitContentDetectionConfig)
  {
    $this->explicitContentDetectionConfig = $explicitContentDetectionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig
   */
  public function getExplicitContentDetectionConfig()
  {
    return $this->explicitContentDetectionConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1FaceDetectionConfig
   */
  public function setFaceDetectionConfig(GoogleCloudVideointelligenceV1FaceDetectionConfig $faceDetectionConfig)
  {
    $this->faceDetectionConfig = $faceDetectionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1FaceDetectionConfig
   */
  public function getFaceDetectionConfig()
  {
    return $this->faceDetectionConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1LabelDetectionConfig
   */
  public function setLabelDetectionConfig(GoogleCloudVideointelligenceV1LabelDetectionConfig $labelDetectionConfig)
  {
    $this->labelDetectionConfig = $labelDetectionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1LabelDetectionConfig
   */
  public function getLabelDetectionConfig()
  {
    return $this->labelDetectionConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1ObjectTrackingConfig
   */
  public function setObjectTrackingConfig(GoogleCloudVideointelligenceV1ObjectTrackingConfig $objectTrackingConfig)
  {
    $this->objectTrackingConfig = $objectTrackingConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1ObjectTrackingConfig
   */
  public function getObjectTrackingConfig()
  {
    return $this->objectTrackingConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1PersonDetectionConfig
   */
  public function setPersonDetectionConfig(GoogleCloudVideointelligenceV1PersonDetectionConfig $personDetectionConfig)
  {
    $this->personDetectionConfig = $personDetectionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1PersonDetectionConfig
   */
  public function getPersonDetectionConfig()
  {
    return $this->personDetectionConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1VideoSegment[]
   */
  public function setSegments($segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return GoogleCloudVideointelligenceV1VideoSegment[]
   */
  public function getSegments()
  {
    return $this->segments;
  }
  /**
   * @param GoogleCloudVideointelligenceV1ShotChangeDetectionConfig
   */
  public function setShotChangeDetectionConfig(GoogleCloudVideointelligenceV1ShotChangeDetectionConfig $shotChangeDetectionConfig)
  {
    $this->shotChangeDetectionConfig = $shotChangeDetectionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1ShotChangeDetectionConfig
   */
  public function getShotChangeDetectionConfig()
  {
    return $this->shotChangeDetectionConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1SpeechTranscriptionConfig
   */
  public function setSpeechTranscriptionConfig(GoogleCloudVideointelligenceV1SpeechTranscriptionConfig $speechTranscriptionConfig)
  {
    $this->speechTranscriptionConfig = $speechTranscriptionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1SpeechTranscriptionConfig
   */
  public function getSpeechTranscriptionConfig()
  {
    return $this->speechTranscriptionConfig;
  }
  /**
   * @param GoogleCloudVideointelligenceV1TextDetectionConfig
   */
  public function setTextDetectionConfig(GoogleCloudVideointelligenceV1TextDetectionConfig $textDetectionConfig)
  {
    $this->textDetectionConfig = $textDetectionConfig;
  }
  /**
   * @return GoogleCloudVideointelligenceV1TextDetectionConfig
   */
  public function getTextDetectionConfig()
  {
    return $this->textDetectionConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1VideoContext::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1VideoContext');
