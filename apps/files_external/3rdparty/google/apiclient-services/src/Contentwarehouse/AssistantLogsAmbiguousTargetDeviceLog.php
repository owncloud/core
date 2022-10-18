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

class AssistantLogsAmbiguousTargetDeviceLog extends \Google\Collection
{
  protected $collection_key = 'structureFilteredDeviceIndex';
  /**
   * @var int[]
   */
  public $ambiguousDeviceIndex;
  protected $finalTargetDeviceType = AssistantLogsDeviceInfoLog::class;
  protected $finalTargetDeviceDataType = '';
  /**
   * @var int[]
   */
  public $playabilityFilteredDevicesIndex;
  protected $puntInfoLogType = AssistantLogsAmbiguousTargetDeviceLogPuntInfoLog::class;
  protected $puntInfoLogDataType = 'array';
  /**
   * @var int[]
   */
  public $structureFilteredDeviceIndex;

  /**
   * @param int[]
   */
  public function setAmbiguousDeviceIndex($ambiguousDeviceIndex)
  {
    $this->ambiguousDeviceIndex = $ambiguousDeviceIndex;
  }
  /**
   * @return int[]
   */
  public function getAmbiguousDeviceIndex()
  {
    return $this->ambiguousDeviceIndex;
  }
  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setFinalTargetDevice(AssistantLogsDeviceInfoLog $finalTargetDevice)
  {
    $this->finalTargetDevice = $finalTargetDevice;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getFinalTargetDevice()
  {
    return $this->finalTargetDevice;
  }
  /**
   * @param int[]
   */
  public function setPlayabilityFilteredDevicesIndex($playabilityFilteredDevicesIndex)
  {
    $this->playabilityFilteredDevicesIndex = $playabilityFilteredDevicesIndex;
  }
  /**
   * @return int[]
   */
  public function getPlayabilityFilteredDevicesIndex()
  {
    return $this->playabilityFilteredDevicesIndex;
  }
  /**
   * @param AssistantLogsAmbiguousTargetDeviceLogPuntInfoLog[]
   */
  public function setPuntInfoLog($puntInfoLog)
  {
    $this->puntInfoLog = $puntInfoLog;
  }
  /**
   * @return AssistantLogsAmbiguousTargetDeviceLogPuntInfoLog[]
   */
  public function getPuntInfoLog()
  {
    return $this->puntInfoLog;
  }
  /**
   * @param int[]
   */
  public function setStructureFilteredDeviceIndex($structureFilteredDeviceIndex)
  {
    $this->structureFilteredDeviceIndex = $structureFilteredDeviceIndex;
  }
  /**
   * @return int[]
   */
  public function getStructureFilteredDeviceIndex()
  {
    return $this->structureFilteredDeviceIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsAmbiguousTargetDeviceLog::class, 'Google_Service_Contentwarehouse_AssistantLogsAmbiguousTargetDeviceLog');
