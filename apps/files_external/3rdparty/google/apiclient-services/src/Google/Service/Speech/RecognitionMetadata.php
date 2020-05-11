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

class Google_Service_Speech_RecognitionMetadata extends Google_Model
{
  public $audioTopic;
  public $industryNaicsCodeOfAudio;
  public $interactionType;
  public $microphoneDistance;
  public $originalMediaType;
  public $originalMimeType;
  public $recordingDeviceName;
  public $recordingDeviceType;

  public function setAudioTopic($audioTopic)
  {
    $this->audioTopic = $audioTopic;
  }
  public function getAudioTopic()
  {
    return $this->audioTopic;
  }
  public function setIndustryNaicsCodeOfAudio($industryNaicsCodeOfAudio)
  {
    $this->industryNaicsCodeOfAudio = $industryNaicsCodeOfAudio;
  }
  public function getIndustryNaicsCodeOfAudio()
  {
    return $this->industryNaicsCodeOfAudio;
  }
  public function setInteractionType($interactionType)
  {
    $this->interactionType = $interactionType;
  }
  public function getInteractionType()
  {
    return $this->interactionType;
  }
  public function setMicrophoneDistance($microphoneDistance)
  {
    $this->microphoneDistance = $microphoneDistance;
  }
  public function getMicrophoneDistance()
  {
    return $this->microphoneDistance;
  }
  public function setOriginalMediaType($originalMediaType)
  {
    $this->originalMediaType = $originalMediaType;
  }
  public function getOriginalMediaType()
  {
    return $this->originalMediaType;
  }
  public function setOriginalMimeType($originalMimeType)
  {
    $this->originalMimeType = $originalMimeType;
  }
  public function getOriginalMimeType()
  {
    return $this->originalMimeType;
  }
  public function setRecordingDeviceName($recordingDeviceName)
  {
    $this->recordingDeviceName = $recordingDeviceName;
  }
  public function getRecordingDeviceName()
  {
    return $this->recordingDeviceName;
  }
  public function setRecordingDeviceType($recordingDeviceType)
  {
    $this->recordingDeviceType = $recordingDeviceType;
  }
  public function getRecordingDeviceType()
  {
    return $this->recordingDeviceType;
  }
}
