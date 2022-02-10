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

namespace Google\Service\Speech;

class RecognitionMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $audioTopic;
  /**
   * @var string
   */
  public $industryNaicsCodeOfAudio;
  /**
   * @var string
   */
  public $interactionType;
  /**
   * @var string
   */
  public $microphoneDistance;
  /**
   * @var string
   */
  public $originalMediaType;
  /**
   * @var string
   */
  public $originalMimeType;
  /**
   * @var string
   */
  public $recordingDeviceName;
  /**
   * @var string
   */
  public $recordingDeviceType;

  /**
   * @param string
   */
  public function setAudioTopic($audioTopic)
  {
    $this->audioTopic = $audioTopic;
  }
  /**
   * @return string
   */
  public function getAudioTopic()
  {
    return $this->audioTopic;
  }
  /**
   * @param string
   */
  public function setIndustryNaicsCodeOfAudio($industryNaicsCodeOfAudio)
  {
    $this->industryNaicsCodeOfAudio = $industryNaicsCodeOfAudio;
  }
  /**
   * @return string
   */
  public function getIndustryNaicsCodeOfAudio()
  {
    return $this->industryNaicsCodeOfAudio;
  }
  /**
   * @param string
   */
  public function setInteractionType($interactionType)
  {
    $this->interactionType = $interactionType;
  }
  /**
   * @return string
   */
  public function getInteractionType()
  {
    return $this->interactionType;
  }
  /**
   * @param string
   */
  public function setMicrophoneDistance($microphoneDistance)
  {
    $this->microphoneDistance = $microphoneDistance;
  }
  /**
   * @return string
   */
  public function getMicrophoneDistance()
  {
    return $this->microphoneDistance;
  }
  /**
   * @param string
   */
  public function setOriginalMediaType($originalMediaType)
  {
    $this->originalMediaType = $originalMediaType;
  }
  /**
   * @return string
   */
  public function getOriginalMediaType()
  {
    return $this->originalMediaType;
  }
  /**
   * @param string
   */
  public function setOriginalMimeType($originalMimeType)
  {
    $this->originalMimeType = $originalMimeType;
  }
  /**
   * @return string
   */
  public function getOriginalMimeType()
  {
    return $this->originalMimeType;
  }
  /**
   * @param string
   */
  public function setRecordingDeviceName($recordingDeviceName)
  {
    $this->recordingDeviceName = $recordingDeviceName;
  }
  /**
   * @return string
   */
  public function getRecordingDeviceName()
  {
    return $this->recordingDeviceName;
  }
  /**
   * @param string
   */
  public function setRecordingDeviceType($recordingDeviceType)
  {
    $this->recordingDeviceType = $recordingDeviceType;
  }
  /**
   * @return string
   */
  public function getRecordingDeviceType()
  {
    return $this->recordingDeviceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecognitionMetadata::class, 'Google_Service_Speech_RecognitionMetadata');
