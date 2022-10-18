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

class GeostoreTransitLineProto extends \Google\Collection
{
  protected $collection_key = 'stations';
  protected $agencyType = GeostoreFeatureIdProto::class;
  protected $agencyDataType = 'array';
  /**
   * @var string
   */
  public $labelBackgroundColor;
  /**
   * @var string
   */
  public $labelTextColor;
  protected $stationsType = GeostoreFeatureIdProto::class;
  protected $stationsDataType = 'array';
  /**
   * @var string
   */
  public $vehicleType;

  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setAgency($agency)
  {
    $this->agency = $agency;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getAgency()
  {
    return $this->agency;
  }
  /**
   * @param string
   */
  public function setLabelBackgroundColor($labelBackgroundColor)
  {
    $this->labelBackgroundColor = $labelBackgroundColor;
  }
  /**
   * @return string
   */
  public function getLabelBackgroundColor()
  {
    return $this->labelBackgroundColor;
  }
  /**
   * @param string
   */
  public function setLabelTextColor($labelTextColor)
  {
    $this->labelTextColor = $labelTextColor;
  }
  /**
   * @return string
   */
  public function getLabelTextColor()
  {
    return $this->labelTextColor;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setStations($stations)
  {
    $this->stations = $stations;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getStations()
  {
    return $this->stations;
  }
  /**
   * @param string
   */
  public function setVehicleType($vehicleType)
  {
    $this->vehicleType = $vehicleType;
  }
  /**
   * @return string
   */
  public function getVehicleType()
  {
    return $this->vehicleType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreTransitLineProto::class, 'Google_Service_Contentwarehouse_GeostoreTransitLineProto');
