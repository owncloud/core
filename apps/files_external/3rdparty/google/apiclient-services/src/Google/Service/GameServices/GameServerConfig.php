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

class Google_Service_GameServices_GameServerConfig extends Google_Collection
{
  protected $collection_key = 'scalingConfigs';
  public $createTime;
  public $description;
  protected $fleetConfigsType = 'Google_Service_GameServices_FleetConfig';
  protected $fleetConfigsDataType = 'array';
  public $labels;
  public $name;
  protected $scalingConfigsType = 'Google_Service_GameServices_ScalingConfig';
  protected $scalingConfigsDataType = 'array';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_GameServices_FleetConfig[]
   */
  public function setFleetConfigs($fleetConfigs)
  {
    $this->fleetConfigs = $fleetConfigs;
  }
  /**
   * @return Google_Service_GameServices_FleetConfig[]
   */
  public function getFleetConfigs()
  {
    return $this->fleetConfigs;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_GameServices_ScalingConfig[]
   */
  public function setScalingConfigs($scalingConfigs)
  {
    $this->scalingConfigs = $scalingConfigs;
  }
  /**
   * @return Google_Service_GameServices_ScalingConfig[]
   */
  public function getScalingConfigs()
  {
    return $this->scalingConfigs;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
