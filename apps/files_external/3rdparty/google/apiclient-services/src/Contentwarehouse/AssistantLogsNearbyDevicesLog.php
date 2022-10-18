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

class AssistantLogsNearbyDevicesLog extends \Google\Collection
{
  protected $collection_key = 'nearbyDevices';
  /**
   * @var string
   */
  public $deviceArbitrationCreationTimestampMs;
  /**
   * @var int
   */
  public $eliminatedByFurtherDistance;
  /**
   * @var int
   */
  public $eliminatedByLocalClosest;
  /**
   * @var int
   */
  public $eliminatedByUnknownDifferentRoom;
  /**
   * @var int
   */
  public $eliminatedByUnregisteredDevice;
  protected $localDeviceType = AssistantLogsDeviceInfoLog::class;
  protected $localDeviceDataType = '';
  protected $nearbyDevicesType = AssistantLogsDeviceInfoLog::class;
  protected $nearbyDevicesDataType = 'array';
  /**
   * @var int
   */
  public $numClosestDevices;
  /**
   * @var int
   */
  public $numEquallyCloseDevices;
  /**
   * @var int
   */
  public $numFurtherDevices;
  /**
   * @var int
   */
  public $numHearingDevices;
  /**
   * @var int
   */
  public $numUnknownDistanceDevices;

  /**
   * @param string
   */
  public function setDeviceArbitrationCreationTimestampMs($deviceArbitrationCreationTimestampMs)
  {
    $this->deviceArbitrationCreationTimestampMs = $deviceArbitrationCreationTimestampMs;
  }
  /**
   * @return string
   */
  public function getDeviceArbitrationCreationTimestampMs()
  {
    return $this->deviceArbitrationCreationTimestampMs;
  }
  /**
   * @param int
   */
  public function setEliminatedByFurtherDistance($eliminatedByFurtherDistance)
  {
    $this->eliminatedByFurtherDistance = $eliminatedByFurtherDistance;
  }
  /**
   * @return int
   */
  public function getEliminatedByFurtherDistance()
  {
    return $this->eliminatedByFurtherDistance;
  }
  /**
   * @param int
   */
  public function setEliminatedByLocalClosest($eliminatedByLocalClosest)
  {
    $this->eliminatedByLocalClosest = $eliminatedByLocalClosest;
  }
  /**
   * @return int
   */
  public function getEliminatedByLocalClosest()
  {
    return $this->eliminatedByLocalClosest;
  }
  /**
   * @param int
   */
  public function setEliminatedByUnknownDifferentRoom($eliminatedByUnknownDifferentRoom)
  {
    $this->eliminatedByUnknownDifferentRoom = $eliminatedByUnknownDifferentRoom;
  }
  /**
   * @return int
   */
  public function getEliminatedByUnknownDifferentRoom()
  {
    return $this->eliminatedByUnknownDifferentRoom;
  }
  /**
   * @param int
   */
  public function setEliminatedByUnregisteredDevice($eliminatedByUnregisteredDevice)
  {
    $this->eliminatedByUnregisteredDevice = $eliminatedByUnregisteredDevice;
  }
  /**
   * @return int
   */
  public function getEliminatedByUnregisteredDevice()
  {
    return $this->eliminatedByUnregisteredDevice;
  }
  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setLocalDevice(AssistantLogsDeviceInfoLog $localDevice)
  {
    $this->localDevice = $localDevice;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getLocalDevice()
  {
    return $this->localDevice;
  }
  /**
   * @param AssistantLogsDeviceInfoLog[]
   */
  public function setNearbyDevices($nearbyDevices)
  {
    $this->nearbyDevices = $nearbyDevices;
  }
  /**
   * @return AssistantLogsDeviceInfoLog[]
   */
  public function getNearbyDevices()
  {
    return $this->nearbyDevices;
  }
  /**
   * @param int
   */
  public function setNumClosestDevices($numClosestDevices)
  {
    $this->numClosestDevices = $numClosestDevices;
  }
  /**
   * @return int
   */
  public function getNumClosestDevices()
  {
    return $this->numClosestDevices;
  }
  /**
   * @param int
   */
  public function setNumEquallyCloseDevices($numEquallyCloseDevices)
  {
    $this->numEquallyCloseDevices = $numEquallyCloseDevices;
  }
  /**
   * @return int
   */
  public function getNumEquallyCloseDevices()
  {
    return $this->numEquallyCloseDevices;
  }
  /**
   * @param int
   */
  public function setNumFurtherDevices($numFurtherDevices)
  {
    $this->numFurtherDevices = $numFurtherDevices;
  }
  /**
   * @return int
   */
  public function getNumFurtherDevices()
  {
    return $this->numFurtherDevices;
  }
  /**
   * @param int
   */
  public function setNumHearingDevices($numHearingDevices)
  {
    $this->numHearingDevices = $numHearingDevices;
  }
  /**
   * @return int
   */
  public function getNumHearingDevices()
  {
    return $this->numHearingDevices;
  }
  /**
   * @param int
   */
  public function setNumUnknownDistanceDevices($numUnknownDistanceDevices)
  {
    $this->numUnknownDistanceDevices = $numUnknownDistanceDevices;
  }
  /**
   * @return int
   */
  public function getNumUnknownDistanceDevices()
  {
    return $this->numUnknownDistanceDevices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsNearbyDevicesLog::class, 'Google_Service_Contentwarehouse_AssistantLogsNearbyDevicesLog');
