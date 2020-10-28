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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1VideoContext extends Google_Collection
{
  protected $collection_key = 'segments';
  protected $explicitContentDetectionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig';
  protected $explicitContentDetectionConfigDataType = '';
  protected $faceDetectionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1FaceDetectionConfig';
  protected $faceDetectionConfigDataType = '';
  protected $labelDetectionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelDetectionConfig';
  protected $labelDetectionConfigDataType = '';
  protected $objectTrackingConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ObjectTrackingConfig';
  protected $objectTrackingConfigDataType = '';
  protected $personDetectionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1PersonDetectionConfig';
  protected $personDetectionConfigDataType = '';
  protected $segmentsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1VideoSegment';
  protected $segmentsDataType = 'array';
  protected $shotChangeDetectionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ShotChangeDetectionConfig';
  protected $shotChangeDetectionConfigDataType = '';
  protected $speechTranscriptionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechTranscriptionConfig';
  protected $speechTranscriptionConfigDataType = '';
  protected $textDetectionConfigType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1TextDetectionConfig';
  protected $textDetectionConfigDataType = '';

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig
   */
  public function setExplicitContentDetectionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig $explicitContentDetectionConfig)
  {
    $this->explicitContentDetectionConfig = $explicitContentDetectionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ExplicitContentDetectionConfig
   */
  public function getExplicitContentDetectionConfig()
  {
    return $this->explicitContentDetectionConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1FaceDetectionConfig
   */
  public function setFaceDetectionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1FaceDetectionConfig $faceDetectionConfig)
  {
    $this->faceDetectionConfig = $faceDetectionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1FaceDetectionConfig
   */
  public function getFaceDetectionConfig()
  {
    return $this->faceDetectionConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelDetectionConfig
   */
  public function setLabelDetectionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelDetectionConfig $labelDetectionConfig)
  {
    $this->labelDetectionConfig = $labelDetectionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelDetectionConfig
   */
  public function getLabelDetectionConfig()
  {
    return $this->labelDetectionConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ObjectTrackingConfig
   */
  public function setObjectTrackingConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ObjectTrackingConfig $objectTrackingConfig)
  {
    $this->objectTrackingConfig = $objectTrackingConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ObjectTrackingConfig
   */
  public function getObjectTrackingConfig()
  {
    return $this->objectTrackingConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1PersonDetectionConfig
   */
  public function setPersonDetectionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1PersonDetectionConfig $personDetectionConfig)
  {
    $this->personDetectionConfig = $personDetectionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1PersonDetectionConfig
   */
  public function getPersonDetectionConfig()
  {
    return $this->personDetectionConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1VideoSegment
   */
  public function setSegments($segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1VideoSegment
   */
  public function getSegments()
  {
    return $this->segments;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ShotChangeDetectionConfig
   */
  public function setShotChangeDetectionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ShotChangeDetectionConfig $shotChangeDetectionConfig)
  {
    $this->shotChangeDetectionConfig = $shotChangeDetectionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ShotChangeDetectionConfig
   */
  public function getShotChangeDetectionConfig()
  {
    return $this->shotChangeDetectionConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechTranscriptionConfig
   */
  public function setSpeechTranscriptionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechTranscriptionConfig $speechTranscriptionConfig)
  {
    $this->speechTranscriptionConfig = $speechTranscriptionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1SpeechTranscriptionConfig
   */
  public function getSpeechTranscriptionConfig()
  {
    return $this->speechTranscriptionConfig;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1TextDetectionConfig
   */
  public function setTextDetectionConfig(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1TextDetectionConfig $textDetectionConfig)
  {
    $this->textDetectionConfig = $textDetectionConfig;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1TextDetectionConfig
   */
  public function getTextDetectionConfig()
  {
    return $this->textDetectionConfig;
  }
}
