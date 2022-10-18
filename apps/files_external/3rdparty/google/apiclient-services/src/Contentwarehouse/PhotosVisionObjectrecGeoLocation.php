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

class PhotosVisionObjectrecGeoLocation extends \Google\Model
{
  public $altitudeMeters;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var bool
   */
  public $fromGps;
  public $lat;
  public $latErrorBound;
  public $lon;
  public $lonErrorBound;

  public function setAltitudeMeters($altitudeMeters)
  {
    $this->altitudeMeters = $altitudeMeters;
  }
  public function getAltitudeMeters()
  {
    return $this->altitudeMeters;
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
   * @param bool
   */
  public function setFromGps($fromGps)
  {
    $this->fromGps = $fromGps;
  }
  /**
   * @return bool
   */
  public function getFromGps()
  {
    return $this->fromGps;
  }
  public function setLat($lat)
  {
    $this->lat = $lat;
  }
  public function getLat()
  {
    return $this->lat;
  }
  public function setLatErrorBound($latErrorBound)
  {
    $this->latErrorBound = $latErrorBound;
  }
  public function getLatErrorBound()
  {
    return $this->latErrorBound;
  }
  public function setLon($lon)
  {
    $this->lon = $lon;
  }
  public function getLon()
  {
    return $this->lon;
  }
  public function setLonErrorBound($lonErrorBound)
  {
    $this->lonErrorBound = $lonErrorBound;
  }
  public function getLonErrorBound()
  {
    return $this->lonErrorBound;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecGeoLocation::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecGeoLocation');
