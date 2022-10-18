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

class CountryGeoLocations extends \Google\Collection
{
  protected $collection_key = 'geoLocation';
  protected $geoLocationType = CountryGeoLocation::class;
  protected $geoLocationDataType = 'array';
  /**
   * @var bool
   */
  public $isNonLocationSpecific;
  /**
   * @var int
   */
  public $propagationDepthFromParent;

  /**
   * @param CountryGeoLocation[]
   */
  public function setGeoLocation($geoLocation)
  {
    $this->geoLocation = $geoLocation;
  }
  /**
   * @return CountryGeoLocation[]
   */
  public function getGeoLocation()
  {
    return $this->geoLocation;
  }
  /**
   * @param bool
   */
  public function setIsNonLocationSpecific($isNonLocationSpecific)
  {
    $this->isNonLocationSpecific = $isNonLocationSpecific;
  }
  /**
   * @return bool
   */
  public function getIsNonLocationSpecific()
  {
    return $this->isNonLocationSpecific;
  }
  /**
   * @param int
   */
  public function setPropagationDepthFromParent($propagationDepthFromParent)
  {
    $this->propagationDepthFromParent = $propagationDepthFromParent;
  }
  /**
   * @return int
   */
  public function getPropagationDepthFromParent()
  {
    return $this->propagationDepthFromParent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CountryGeoLocations::class, 'Google_Service_Contentwarehouse_CountryGeoLocations');
