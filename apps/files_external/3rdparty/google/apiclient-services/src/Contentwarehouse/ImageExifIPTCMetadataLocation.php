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

class ImageExifIPTCMetadataLocation extends \Google\Model
{
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $subLocation;
  /**
   * @var string
   */
  public $worldRegion;

  /**
   * @param string
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setSubLocation($subLocation)
  {
    $this->subLocation = $subLocation;
  }
  /**
   * @return string
   */
  public function getSubLocation()
  {
    return $this->subLocation;
  }
  /**
   * @param string
   */
  public function setWorldRegion($worldRegion)
  {
    $this->worldRegion = $worldRegion;
  }
  /**
   * @return string
   */
  public function getWorldRegion()
  {
    return $this->worldRegion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageExifIPTCMetadataLocation::class, 'Google_Service_Contentwarehouse_ImageExifIPTCMetadataLocation');
