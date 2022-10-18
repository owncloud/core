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

class QualityActionsTimer extends \Google\Model
{
  protected $creationTimeType = AssistantApiTimestamp::class;
  protected $creationTimeDataType = '';
  protected $deviceType = AssistantApiSettingsDeviceSettings::class;
  protected $deviceDataType = '';
  /**
   * @var string
   */
  public $expireTime;
  protected $expireTimerTimeType = NlpSemanticParsingDatetimeDateTime::class;
  protected $expireTimerTimeDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $label;
  protected $lastUpdatedType = AssistantApiTimestamp::class;
  protected $lastUpdatedDataType = '';
  /**
   * @var string
   */
  public $originalDuration;
  protected $originalTimerDurationType = NlpSemanticParsingDatetimeDuration::class;
  protected $originalTimerDurationDataType = '';
  protected $providerType = AssistantApiCoreTypesProvider::class;
  protected $providerDataType = '';
  /**
   * @var string
   */
  public $remainingDuration;
  protected $remainingTimerDurationType = NlpSemanticParsingDatetimeDuration::class;
  protected $remainingTimerDurationDataType = '';
  protected $ringtoneType = QualityActionsRingtone::class;
  protected $ringtoneDataType = '';
  protected $ringtoneTaskMetadataType = AssistantApiCoreTypesGovernedRingtoneTaskMetadata::class;
  protected $ringtoneTaskMetadataDataType = '';
  protected $roomType = QualityActionsRoom::class;
  protected $roomDataType = '';
  /**
   * @var string
   */
  public $status;
  /**
   * @var bool
   */
  public $vibrate;

  /**
   * @param AssistantApiTimestamp
   */
  public function setCreationTime(AssistantApiTimestamp $creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param AssistantApiSettingsDeviceSettings
   */
  public function setDevice(AssistantApiSettingsDeviceSettings $device)
  {
    $this->device = $device;
  }
  /**
   * @return AssistantApiSettingsDeviceSettings
   */
  public function getDevice()
  {
    return $this->device;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setExpireTimerTime(NlpSemanticParsingDatetimeDateTime $expireTimerTime)
  {
    $this->expireTimerTime = $expireTimerTime;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getExpireTimerTime()
  {
    return $this->expireTimerTime;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setLastUpdated(AssistantApiTimestamp $lastUpdated)
  {
    $this->lastUpdated = $lastUpdated;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getLastUpdated()
  {
    return $this->lastUpdated;
  }
  /**
   * @param string
   */
  public function setOriginalDuration($originalDuration)
  {
    $this->originalDuration = $originalDuration;
  }
  /**
   * @return string
   */
  public function getOriginalDuration()
  {
    return $this->originalDuration;
  }
  /**
   * @param NlpSemanticParsingDatetimeDuration
   */
  public function setOriginalTimerDuration(NlpSemanticParsingDatetimeDuration $originalTimerDuration)
  {
    $this->originalTimerDuration = $originalTimerDuration;
  }
  /**
   * @return NlpSemanticParsingDatetimeDuration
   */
  public function getOriginalTimerDuration()
  {
    return $this->originalTimerDuration;
  }
  /**
   * @param AssistantApiCoreTypesProvider
   */
  public function setProvider(AssistantApiCoreTypesProvider $provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return AssistantApiCoreTypesProvider
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param string
   */
  public function setRemainingDuration($remainingDuration)
  {
    $this->remainingDuration = $remainingDuration;
  }
  /**
   * @return string
   */
  public function getRemainingDuration()
  {
    return $this->remainingDuration;
  }
  /**
   * @param NlpSemanticParsingDatetimeDuration
   */
  public function setRemainingTimerDuration(NlpSemanticParsingDatetimeDuration $remainingTimerDuration)
  {
    $this->remainingTimerDuration = $remainingTimerDuration;
  }
  /**
   * @return NlpSemanticParsingDatetimeDuration
   */
  public function getRemainingTimerDuration()
  {
    return $this->remainingTimerDuration;
  }
  /**
   * @param QualityActionsRingtone
   */
  public function setRingtone(QualityActionsRingtone $ringtone)
  {
    $this->ringtone = $ringtone;
  }
  /**
   * @return QualityActionsRingtone
   */
  public function getRingtone()
  {
    return $this->ringtone;
  }
  /**
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadata
   */
  public function setRingtoneTaskMetadata(AssistantApiCoreTypesGovernedRingtoneTaskMetadata $ringtoneTaskMetadata)
  {
    $this->ringtoneTaskMetadata = $ringtoneTaskMetadata;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadata
   */
  public function getRingtoneTaskMetadata()
  {
    return $this->ringtoneTaskMetadata;
  }
  /**
   * @param QualityActionsRoom
   */
  public function setRoom(QualityActionsRoom $room)
  {
    $this->room = $room;
  }
  /**
   * @return QualityActionsRoom
   */
  public function getRoom()
  {
    return $this->room;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param bool
   */
  public function setVibrate($vibrate)
  {
    $this->vibrate = $vibrate;
  }
  /**
   * @return bool
   */
  public function getVibrate()
  {
    return $this->vibrate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsTimer::class, 'Google_Service_Contentwarehouse_QualityActionsTimer');
