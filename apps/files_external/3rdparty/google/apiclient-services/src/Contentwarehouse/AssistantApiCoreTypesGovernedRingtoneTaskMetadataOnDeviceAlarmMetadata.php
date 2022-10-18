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

namespace Google\Service\Contentwarehouse;

class AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $onDeviceAlarmSound;
  /**
   * @var string
   */
  public $onDeviceAlarmSoundLabel;
  /**
   * @var string
   */
  public $ttsServiceRequestBytes;

  /**
   * @param string
   */
  public function setOnDeviceAlarmSound($onDeviceAlarmSound)
  {
    $this->onDeviceAlarmSound = $onDeviceAlarmSound;
  }
  /**
   * @return string
   */
  public function getOnDeviceAlarmSound()
  {
    return $this->onDeviceAlarmSound;
  }
  /**
   * @param string
   */
  public function setOnDeviceAlarmSoundLabel($onDeviceAlarmSoundLabel)
  {
    $this->onDeviceAlarmSoundLabel = $onDeviceAlarmSoundLabel;
  }
  /**
   * @return string
   */
  public function getOnDeviceAlarmSoundLabel()
  {
    return $this->onDeviceAlarmSoundLabel;
  }
  /**
   * @param string
   */
  public function setTtsServiceRequestBytes($ttsServiceRequestBytes)
  {
    $this->ttsServiceRequestBytes = $ttsServiceRequestBytes;
  }
  /**
   * @return string
   */
  public function getTtsServiceRequestBytes()
  {
    return $this->ttsServiceRequestBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata');
