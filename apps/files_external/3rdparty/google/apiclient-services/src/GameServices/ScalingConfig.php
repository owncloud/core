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

class ScalingConfig extends \Google\Collection
{
  protected $collection_key = 'selectors';
  public $fleetAutoscalerSpec;
  public $name;
  protected $schedulesType = Schedule::class;
  protected $schedulesDataType = 'array';
  protected $selectorsType = LabelSelector::class;
  protected $selectorsDataType = 'array';

  public function setFleetAutoscalerSpec($fleetAutoscalerSpec)
  {
    $this->fleetAutoscalerSpec = $fleetAutoscalerSpec;
  }
  public function getFleetAutoscalerSpec()
  {
    return $this->fleetAutoscalerSpec;
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
   * @param Schedule[]
   */
  public function setSchedules($schedules)
  {
    $this->schedules = $schedules;
  }
  /**
   * @return Schedule[]
   */
  public function getSchedules()
  {
    return $this->schedules;
  }
  /**
   * @param LabelSelector[]
   */
  public function setSelectors($selectors)
  {
    $this->selectors = $selectors;
  }
  /**
   * @return LabelSelector[]
   */
  public function getSelectors()
  {
    return $this->selectors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScalingConfig::class, 'Google_Service_GameServices_ScalingConfig');
