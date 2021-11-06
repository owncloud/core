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

namespace Google\Service\MyBusinessBusinessInformation;

class ServiceAreaBusiness extends \Google\Model
{
  public $businessType;
  protected $placesType = Places::class;
  protected $placesDataType = '';
  public $regionCode;

  public function setBusinessType($businessType)
  {
    $this->businessType = $businessType;
  }
  public function getBusinessType()
  {
    return $this->businessType;
  }
  /**
   * @param Places
   */
  public function setPlaces(Places $places)
  {
    $this->places = $places;
  }
  /**
   * @return Places
   */
  public function getPlaces()
  {
    return $this->places;
  }
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAreaBusiness::class, 'Google_Service_MyBusinessBusinessInformation_ServiceAreaBusiness');
