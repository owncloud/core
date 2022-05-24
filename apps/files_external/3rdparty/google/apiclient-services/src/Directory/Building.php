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

class Building extends \Google\Collection
{
  protected $collection_key = 'floorNames';
  protected $addressType = BuildingAddress::class;
  protected $addressDataType = '';
  /**
   * @var string
   */
  public $buildingId;
  /**
   * @var string
   */
  public $buildingName;
  protected $coordinatesType = BuildingCoordinates::class;
  protected $coordinatesDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etags;
  /**
   * @var string[]
   */
  public $floorNames;
  /**
   * @var string
   */
  public $kind;

  /**
   * @param BuildingAddress
   */
  public function setAddress(BuildingAddress $address)
  {
    $this->address = $address;
  }
  /**
   * @return BuildingAddress
   */
  public function getAddress()
  {
    return $this->address;
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
  public function setBuildingName($buildingName)
  {
    $this->buildingName = $buildingName;
  }
  /**
   * @return string
   */
  public function getBuildingName()
  {
    return $this->buildingName;
  }
  /**
   * @param BuildingCoordinates
   */
  public function setCoordinates(BuildingCoordinates $coordinates)
  {
    $this->coordinates = $coordinates;
  }
  /**
   * @return BuildingCoordinates
   */
  public function getCoordinates()
  {
    return $this->coordinates;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtags($etags)
  {
    $this->etags = $etags;
  }
  /**
   * @return string
   */
  public function getEtags()
  {
    return $this->etags;
  }
  /**
   * @param string[]
   */
  public function setFloorNames($floorNames)
  {
    $this->floorNames = $floorNames;
  }
  /**
   * @return string[]
   */
  public function getFloorNames()
  {
    return $this->floorNames;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Building::class, 'Google_Service_Directory_Building');
