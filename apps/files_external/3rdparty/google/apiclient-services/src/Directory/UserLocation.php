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

namespace Google\Service\Directory;

class UserLocation extends \Google\Model
{
  /**
   * @var string
   */
  public $area;
  /**
   * @var string
   */
  public $buildingId;
  /**
   * @var string
   */
  public $customType;
  /**
   * @var string
   */
  public $deskCode;
  /**
   * @var string
   */
  public $floorName;
  /**
   * @var string
   */
  public $floorSection;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setArea($area)
  {
    $this->area = $area;
  }
  /**
   * @return string
   */
  public function getArea()
  {
    return $this->area;
  }
  /**
   * @param string
   */
  public function setBuildingId($buildingId)
  {
    $this->buildingId = $buildingId;
  }
  /**
   * @return string
   */
  public function getBuildingId()
  {
    return $this->buildingId;
  }
  /**
   * @param string
   */
  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }
  /**
   * @return string
   */
  public function getCustomType()
  {
    return $this->customType;
  }
  /**
   * @param string
   */
  public function setDeskCode($deskCode)
  {
    $this->deskCode = $deskCode;
  }
  /**
   * @return string
   */
  public function getDeskCode()
  {
    return $this->deskCode;
  }
  /**
   * @param string
   */
  public function setFloorName($floorName)
  {
    $this->floorName = $floorName;
  }
  /**
   * @return string
   */
  public function getFloorName()
  {
    return $this->floorName;
  }
  /**
   * @param string
   */
  public function setFloorSection($floorSection)
  {
    $this->floorSection = $floorSection;
  }
  /**
   * @return string
   */
  public function getFloorSection()
  {
    return $this->floorSection;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserLocation::class, 'Google_Service_Directory_UserLocation');
