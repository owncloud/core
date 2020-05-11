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

class Google_Service_JobService_LocationFilter extends Google_Model
{
  public $distanceInMiles;
  public $isTelecommute;
  protected $latLngType = 'Google_Service_JobService_LatLng';
  protected $latLngDataType = '';
  public $name;
  public $regionCode;

  public function setDistanceInMiles($distanceInMiles)
  {
    $this->distanceInMiles = $distanceInMiles;
  }
  public function getDistanceInMiles()
  {
    return $this->distanceInMiles;
  }
  public function setIsTelecommute($isTelecommute)
  {
    $this->isTelecommute = $isTelecommute;
  }
  public function getIsTelecommute()
  {
    return $this->isTelecommute;
  }
  /**
   * @param Google_Service_JobService_LatLng
   */
  public function setLatLng(Google_Service_JobService_LatLng $latLng)
  {
    $this->latLng = $latLng;
  }
  /**
   * @return Google_Service_JobService_LatLng
   */
  public function getLatLng()
  {
    return $this->latLng;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
