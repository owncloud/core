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

namespace Google\Service\HomeGraphService;

class Device extends \Google\Collection
{
  protected $collection_key = 'traits';
  /**
   * @var array[]
   */
  public $attributes;
  /**
   * @var array[]
   */
  public $customData;
  protected $deviceInfoType = DeviceInfo::class;
  protected $deviceInfoDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $nameType = DeviceNames::class;
  protected $nameDataType = '';
  /**
   * @var bool
   */
  public $notificationSupportedByAgent;
  protected $otherDeviceIdsType = AgentOtherDeviceId::class;
  protected $otherDeviceIdsDataType = 'array';
  /**
   * @var string
   */
  public $roomHint;
  /**
   * @var string
   */
  public $structureHint;
  /**
   * @var string[]
   */
  public $traits;
  /**
   * @var string
   */
  public $type;
  /**
   * @var bool
   */
  public $willReportState;

  /**
   * @param array[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return array[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param array[]
   */
  public function setCustomData($customData)
  {
    $this->customData = $customData;
  }
  /**
   * @return array[]
   */
  public function getCustomData()
  {
    return $this->customData;
  }
  /**
   * @param DeviceInfo
   */
  public function setDeviceInfo(DeviceInfo $deviceInfo)
  {
    $this->deviceInfo = $deviceInfo;
  }
  /**
   * @return DeviceInfo
   */
  public function getDeviceInfo()
  {
    return $this->deviceInfo;
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
   * @param DeviceNames
   */
  public function setName(DeviceNames $name)
  {
    $this->name = $name;
  }
  /**
   * @return DeviceNames
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setNotificationSupportedByAgent($notificationSupportedByAgent)
  {
    $this->notificationSupportedByAgent = $notificationSupportedByAgent;
  }
  /**
   * @return bool
   */
  public function getNotificationSupportedByAgent()
  {
    return $this->notificationSupportedByAgent;
  }
  /**
   * @param AgentOtherDeviceId[]
   */
  public function setOtherDeviceIds($otherDeviceIds)
  {
    $this->otherDeviceIds = $otherDeviceIds;
  }
  /**
   * @return AgentOtherDeviceId[]
   */
  public function getOtherDeviceIds()
  {
    return $this->otherDeviceIds;
  }
  /**
   * @param string
   */
  public function setRoomHint($roomHint)
  {
    $this->roomHint = $roomHint;
  }
  /**
   * @return string
   */
  public function getRoomHint()
  {
    return $this->roomHint;
  }
  /**
   * @param string
   */
  public function setStructureHint($structureHint)
  {
    $this->structureHint = $structureHint;
  }
  /**
   * @return string
   */
  public function getStructureHint()
  {
    return $this->structureHint;
  }
  /**
   * @param string[]
   */
  public function setTraits($traits)
  {
    $this->traits = $traits;
  }
  /**
   * @return string[]
   */
  public function getTraits()
  {
    return $this->traits;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param bool
   */
  public function setWillReportState($willReportState)
  {
    $this->willReportState = $willReportState;
  }
  /**
   * @return bool
   */
  public function getWillReportState()
  {
    return $this->willReportState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Device::class, 'Google_Service_HomeGraphService_Device');
