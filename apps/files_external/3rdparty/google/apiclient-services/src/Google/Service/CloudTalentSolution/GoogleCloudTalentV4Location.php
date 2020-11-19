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

class Google_Service_CloudTalentSolution_GoogleCloudTalentV4Location extends Google_Model
{
  protected $latLngType = 'Google_Service_CloudTalentSolution_LatLng';
  protected $latLngDataType = '';
  public $locationType;
  protected $postalAddressType = 'Google_Service_CloudTalentSolution_PostalAddress';
  protected $postalAddressDataType = '';
  public $radiusMiles;

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
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  public function getLocationType()
  {
    return $this->locationType;
  }
  /**
   * @param Google_Service_CloudTalentSolution_PostalAddress
   */
  public function setPostalAddress(Google_Service_CloudTalentSolution_PostalAddress $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  /**
   * @return Google_Service_CloudTalentSolution_PostalAddress
   */
  public function getPostalAddress()
  {
    return $this->postalAddress;
  }
  public function setRadiusMiles($radiusMiles)
  {
    $this->radiusMiles = $radiusMiles;
  }
  public function getRadiusMiles()
  {
    return $this->radiusMiles;
  }
}
