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

class GeostoreRoadConditionalProto extends \Google\Collection
{
  protected $collection_key = 'vehicleType';
  protected $timeScheduleType = GeostoreTimeScheduleProto::class;
  protected $timeScheduleDataType = '';
  protected $vehicleAttributeType = GeostoreVehicleAttributeFilterProto::class;
  protected $vehicleAttributeDataType = '';
  /**
   * @var string[]
   */
  public $vehicleType;

  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setTimeSchedule(GeostoreTimeScheduleProto $timeSchedule)
  {
    $this->timeSchedule = $timeSchedule;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getTimeSchedule()
  {
    return $this->timeSchedule;
  }
  /**
   * @param GeostoreVehicleAttributeFilterProto
   */
  public function setVehicleAttribute(GeostoreVehicleAttributeFilterProto $vehicleAttribute)
  {
    $this->vehicleAttribute = $vehicleAttribute;
  }
  /**
   * @return GeostoreVehicleAttributeFilterProto
   */
  public function getVehicleAttribute()
  {
    return $this->vehicleAttribute;
  }
  /**
   * @param string[]
   */
  public function setVehicleType($vehicleType)
  {
    $this->vehicleType = $vehicleType;
  }
  /**
   * @return string[]
   */
  public function getVehicleType()
  {
    return $this->vehicleType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRoadConditionalProto::class, 'Google_Service_Contentwarehouse_GeostoreRoadConditionalProto');
