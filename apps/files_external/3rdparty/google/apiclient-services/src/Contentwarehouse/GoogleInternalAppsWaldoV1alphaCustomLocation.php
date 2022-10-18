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

class GoogleInternalAppsWaldoV1alphaCustomLocation extends \Google\Model
{
  protected $geoCoordinatesType = GoogleTypeLatLng::class;
  protected $geoCoordinatesDataType = '';
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $location;

  /**
   * @param GoogleTypeLatLng
   */
  public function setGeoCoordinates(GoogleTypeLatLng $geoCoordinates)
  {
    $this->geoCoordinates = $geoCoordinates;
  }
  /**
   * @return GoogleTypeLatLng
   */
  public function getGeoCoordinates()
  {
    return $this->geoCoordinates;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaCustomLocation::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaCustomLocation');
