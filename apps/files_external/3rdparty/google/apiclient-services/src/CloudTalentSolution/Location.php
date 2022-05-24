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

namespace Google\Service\CloudTalentSolution;

class Location extends \Google\Model
{
  protected $latLngType = LatLng::class;
  protected $latLngDataType = '';
  /**
   * @var string
   */
  public $locationType;
  protected $postalAddressType = PostalAddress::class;
  protected $postalAddressDataType = '';
  public $radiusMiles;

  /**
   * @param LatLng
   */
  public function setLatLng(LatLng $latLng)
  {
    $this->latLng = $latLng;
  }
  /**
   * @return LatLng
   */
  public function getLatLng()
  {
    return $this->latLng;
  }
  /**
   * @param string
   */
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  /**
   * @return string
   */
  public function getLocationType()
  {
    return $this->locationType;
  }
  /**
   * @param PostalAddress
   */
  public function setPostalAddress(PostalAddress $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  /**
   * @return PostalAddress
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Location::class, 'Google_Service_CloudTalentSolution_Location');
