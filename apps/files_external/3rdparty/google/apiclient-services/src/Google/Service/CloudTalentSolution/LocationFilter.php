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

class Google_Service_CloudTalentSolution_LocationFilter extends Google_Model
{
  public $address;
  public $distanceInMiles;
  protected $latLngType = 'Google_Service_CloudTalentSolution_LatLng';
  protected $latLngDataType = '';
  public $regionCode;
  public $telecommutePreference;

  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setDistanceInMiles($distanceInMiles)
  {
    $this->distanceInMiles = $distanceInMiles;
  }
  public function getDistanceInMiles()
  {
    return $this->distanceInMiles;
  }
  /**
   * @param Google_Service_CloudTalentSolution_LatLng
   */
  public function setLatLng(Google_Service_CloudTalentSolution_LatLng $latLng)
  {
    $this->latLng = $latLng;
  }
  /**
   * @return Google_Service_CloudTalentSolution_LatLng
   */
  public function getLatLng()
  {
    return $this->latLng;
  }
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  public function setTelecommutePreference($telecommutePreference)
  {
    $this->telecommutePreference = $telecommutePreference;
  }
  public function getTelecommutePreference()
  {
    return $this->telecommutePreference;
  }
}
