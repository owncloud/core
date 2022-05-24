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

namespace Google\Service\DisplayVideo;

class PoiAssignedTargetingOptionDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  public $latitude;
  public $longitude;
  public $proximityRadiusAmount;
  /**
   * @var string
   */
  public $proximityRadiusUnit;
  /**
   * @var string
   */
  public $targetingOptionId;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  public function setProximityRadiusAmount($proximityRadiusAmount)
  {
    $this->proximityRadiusAmount = $proximityRadiusAmount;
  }
  public function getProximityRadiusAmount()
  {
    return $this->proximityRadiusAmount;
  }
  /**
   * @param string
   */
  public function setProximityRadiusUnit($proximityRadiusUnit)
  {
    $this->proximityRadiusUnit = $proximityRadiusUnit;
  }
  /**
   * @return string
   */
  public function getProximityRadiusUnit()
  {
    return $this->proximityRadiusUnit;
  }
  /**
   * @param string
   */
  public function setTargetingOptionId($targetingOptionId)
  {
    $this->targetingOptionId = $targetingOptionId;
  }
  /**
   * @return string
   */
  public function getTargetingOptionId()
  {
    return $this->targetingOptionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PoiAssignedTargetingOptionDetails::class, 'Google_Service_DisplayVideo_PoiAssignedTargetingOptionDetails');
