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

namespace Google\Service\AndroidPublisher;

class DeviceTierConfig extends \Google\Collection
{
  protected $collection_key = 'deviceGroups';
  protected $deviceGroupsType = DeviceGroup::class;
  protected $deviceGroupsDataType = 'array';
  /**
   * @var string
   */
  public $deviceTierConfigId;
  protected $deviceTierSetType = DeviceTierSet::class;
  protected $deviceTierSetDataType = '';

  /**
   * @param DeviceGroup[]
   */
  public function setDeviceGroups($deviceGroups)
  {
    $this->deviceGroups = $deviceGroups;
  }
  /**
   * @return DeviceGroup[]
   */
  public function getDeviceGroups()
  {
    return $this->deviceGroups;
  }
  /**
   * @param string
   */
  public function setDeviceTierConfigId($deviceTierConfigId)
  {
    $this->deviceTierConfigId = $deviceTierConfigId;
  }
  /**
   * @return string
   */
  public function getDeviceTierConfigId()
  {
    return $this->deviceTierConfigId;
  }
  /**
   * @param DeviceTierSet
   */
  public function setDeviceTierSet(DeviceTierSet $deviceTierSet)
  {
    $this->deviceTierSet = $deviceTierSet;
  }
  /**
   * @return DeviceTierSet
   */
  public function getDeviceTierSet()
  {
    return $this->deviceTierSet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceTierConfig::class, 'Google_Service_AndroidPublisher_DeviceTierConfig');
