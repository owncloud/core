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

class AssistantApiCoreTypesGovernedRingtoneTaskMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $category;
  protected $characterAlarmMetadataType = AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata::class;
  protected $characterAlarmMetadataDataType = '';
  /**
   * @var string
   */
  public $characterTag;
  /**
   * @var string
   */
  public $entityMid;
  protected $funtimeMetadataType = AssistantApiCoreTypesGovernedRingtoneTaskMetadataFuntimeMetadata::class;
  protected $funtimeMetadataDataType = '';
  protected $genMlAlarmMetadataType = AssistantApiCoreTypesGovernedRingtoneTaskMetadataGenMlAlarmMetadata::class;
  protected $genMlAlarmMetadataDataType = '';
  protected $gentleWakeInfoType = AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo::class;
  protected $gentleWakeInfoDataType = '';
  protected $onDeviceAlarmMetadataType = AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata::class;
  protected $onDeviceAlarmMetadataDataType = '';
  /**
   * @var string
   */
  public $onDeviceAlarmSound;
  protected $routineAlarmMetadataType = AssistantApiCoreTypesGovernedRingtoneTaskMetadataRoutineAlarmMetadata::class;
  protected $routineAlarmMetadataDataType = '';

  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata
   */
  public function setCharacterAlarmMetadata(AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata $characterAlarmMetadata)
  {
    $this->characterAlarmMetadata = $characterAlarmMetadata;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadataCharacterAlarmMetadata
   */
  public function getCharacterAlarmMetadata()
  {
    return $this->characterAlarmMetadata;
  }
  /**
   * @param string
   */
  public function setCharacterTag($characterTag)
  {
    $this->characterTag = $characterTag;
  }
  /**
   * @return string
   */
  public function getCharacterTag()
  {
    return $this->characterTag;
  }
  /**
   * @param string
   */
  public function setEntityMid($entityMid)
  {
    $this->entityMid = $entityMid;
  }
  /**
   * @return string
   */
  public function getEntityMid()
  {
    return $this->entityMid;
  }
  /**
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadataFuntimeMetadata
   */
  public function setFuntimeMetadata(AssistantApiCoreTypesGovernedRingtoneTaskMetadataFuntimeMetadata $funtimeMetadata)
  {
    $this->funtimeMetadata = $funtimeMetadata;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadataFuntimeMetadata
   */
  public function getFuntimeMetadata()
  {
    return $this->funtimeMetadata;
  }
  /**
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadataGenMlAlarmMetadata
   */
  public function setGenMlAlarmMetadata(AssistantApiCoreTypesGovernedRingtoneTaskMetadataGenMlAlarmMetadata $genMlAlarmMetadata)
  {
    $this->genMlAlarmMetadata = $genMlAlarmMetadata;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadataGenMlAlarmMetadata
   */
  public function getGenMlAlarmMetadata()
  {
    return $this->genMlAlarmMetadata;
  }
  /**
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo
   */
  public function setGentleWakeInfo(AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo $gentleWakeInfo)
  {
    $this->gentleWakeInfo = $gentleWakeInfo;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo
   */
  public function getGentleWakeInfo()
  {
    return $this->gentleWakeInfo;
  }
  /**
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata
   */
  public function setOnDeviceAlarmMetadata(AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata $onDeviceAlarmMetadata)
  {
    $this->onDeviceAlarmMetadata = $onDeviceAlarmMetadata;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadataOnDeviceAlarmMetadata
   */
  public function getOnDeviceAlarmMetadata()
  {
    return $this->onDeviceAlarmMetadata;
  }
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
   * @param AssistantApiCoreTypesGovernedRingtoneTaskMetadataRoutineAlarmMetadata
   */
  public function setRoutineAlarmMetadata(AssistantApiCoreTypesGovernedRingtoneTaskMetadataRoutineAlarmMetadata $routineAlarmMetadata)
  {
    $this->routineAlarmMetadata = $routineAlarmMetadata;
  }
  /**
   * @return AssistantApiCoreTypesGovernedRingtoneTaskMetadataRoutineAlarmMetadata
   */
  public function getRoutineAlarmMetadata()
  {
    return $this->routineAlarmMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesGovernedRingtoneTaskMetadata::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesGovernedRingtoneTaskMetadata');
