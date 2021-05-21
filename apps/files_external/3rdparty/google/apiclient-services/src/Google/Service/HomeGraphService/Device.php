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

class Google_Service_HomeGraphService_Device extends Google_Collection
{
  protected $collection_key = 'traits';
  public $attributes;
  public $customData;
  protected $deviceInfoType = 'Google_Service_HomeGraphService_DeviceInfo';
  protected $deviceInfoDataType = '';
  public $id;
  protected $nameType = 'Google_Service_HomeGraphService_DeviceNames';
  protected $nameDataType = '';
  public $notificationSupportedByAgent;
  protected $otherDeviceIdsType = 'Google_Service_HomeGraphService_AgentOtherDeviceId';
  protected $otherDeviceIdsDataType = 'array';
  public $roomHint;
  public $structureHint;
  public $traits;
  public $type;
  public $willReportState;

  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setCustomData($customData)
  {
    $this->customData = $customData;
  }
  public function getCustomData()
  {
    return $this->customData;
  }
  /**
   * @param Google_Service_HomeGraphService_DeviceInfo
   */
  public function setDeviceInfo(Google_Service_HomeGraphService_DeviceInfo $deviceInfo)
  {
    $this->deviceInfo = $deviceInfo;
  }
  /**
   * @return Google_Service_HomeGraphService_DeviceInfo
   */
  public function getDeviceInfo()
  {
    return $this->deviceInfo;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_HomeGraphService_DeviceNames
   */
  public function setName(Google_Service_HomeGraphService_DeviceNames $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_HomeGraphService_DeviceNames
   */
  public function getName()
  {
    return $this->name;
  }
  public function setNotificationSupportedByAgent($notificationSupportedByAgent)
  {
    $this->notificationSupportedByAgent = $notificationSupportedByAgent;
  }
  public function getNotificationSupportedByAgent()
  {
    return $this->notificationSupportedByAgent;
  }
  /**
   * @param Google_Service_HomeGraphService_AgentOtherDeviceId[]
   */
  public function setOtherDeviceIds($otherDeviceIds)
  {
    $this->otherDeviceIds = $otherDeviceIds;
  }
  /**
   * @return Google_Service_HomeGraphService_AgentOtherDeviceId[]
   */
  public function getOtherDeviceIds()
  {
    return $this->otherDeviceIds;
  }
  public function setRoomHint($roomHint)
  {
    $this->roomHint = $roomHint;
  }
  public function getRoomHint()
  {
    return $this->roomHint;
  }
  public function setStructureHint($structureHint)
  {
    $this->structureHint = $structureHint;
  }
  public function getStructureHint()
  {
    return $this->structureHint;
  }
  public function setTraits($traits)
  {
    $this->traits = $traits;
  }
  public function getTraits()
  {
    return $this->traits;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWillReportState($willReportState)
  {
    $this->willReportState = $willReportState;
  }
  public function getWillReportState()
  {
    return $this->willReportState;
  }
}
