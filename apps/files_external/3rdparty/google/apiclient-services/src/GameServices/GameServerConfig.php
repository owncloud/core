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

namespace Google\Service\GameServices;

class GameServerConfig extends \Google\Collection
{
  protected $collection_key = 'scalingConfigs';
  public $createTime;
  public $description;
  protected $fleetConfigsType = FleetConfig::class;
  protected $fleetConfigsDataType = 'array';
  public $labels;
  public $name;
  protected $scalingConfigsType = ScalingConfig::class;
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
   * @param FleetConfig[]
   */
  public function setFleetConfigs($fleetConfigs)
  {
    $this->fleetConfigs = $fleetConfigs;
  }
  /**
   * @return FleetConfig[]
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
   * @param ScalingConfig[]
   */
  public function setScalingConfigs($scalingConfigs)
  {
    $this->scalingConfigs = $scalingConfigs;
  }
  /**
   * @return ScalingConfig[]
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GameServerConfig::class, 'Google_Service_GameServices_GameServerConfig');
