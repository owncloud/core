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

class GeostoreParkingRestrictionProto extends \Google\Collection
{
  protected $collection_key = 'vehicleType';
  protected $restrictedHoursType = GeostoreTimeScheduleProto::class;
  protected $restrictedHoursDataType = '';
  /**
   * @var string
   */
  public $restrictionType;
  /**
   * @var string[]
   */
  public $serviceType;
  /**
   * @var string[]
   */
  public $vehicleType;

  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setRestrictedHours(GeostoreTimeScheduleProto $restrictedHours)
  {
    $this->restrictedHours = $restrictedHours;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getRestrictedHours()
  {
    return $this->restrictedHours;
  }
  /**
   * @param string
   */
  public function setRestrictionType($restrictionType)
  {
    $this->restrictionType = $restrictionType;
  }
  /**
   * @return string
   */
  public function getRestrictionType()
  {
    return $this->restrictionType;
  }
  /**
   * @param string[]
   */
  public function setServiceType($serviceType)
  {
    $this->serviceType = $serviceType;
  }
  /**
   * @return string[]
   */
  public function getServiceType()
  {
    return $this->serviceType;
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
class_alias(GeostoreParkingRestrictionProto::class, 'Google_Service_Contentwarehouse_GeostoreParkingRestrictionProto');
