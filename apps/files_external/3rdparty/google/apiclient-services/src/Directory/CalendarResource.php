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

class CalendarResource extends \Google\Model
{
  /**
   * @var string
   */
  public $buildingId;
  /**
   * @var int
   */
  public $capacity;
  /**
   * @var string
   */
  public $etags;
  /**
   * @var array
   */
  public $featureInstances;
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
  public $generatedResourceName;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $resourceCategory;
  /**
   * @var string
   */
  public $resourceDescription;
  /**
   * @var string
   */
  public $resourceEmail;
  /**
   * @var string
   */
  public $resourceId;
  /**
   * @var string
   */
  public $resourceName;
  /**
   * @var string
   */
  public $resourceType;
  /**
   * @var string
   */
  public $userVisibleDescription;

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
   * @param int
   */
  public function setCapacity($capacity)
  {
    $this->capacity = $capacity;
  }
  /**
   * @return int
   */
  public function getCapacity()
  {
    return $this->capacity;
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
   * @param array
   */
  public function setFeatureInstances($featureInstances)
  {
    $this->featureInstances = $featureInstances;
  }
  /**
   * @return array
   */
  public function getFeatureInstances()
  {
    return $this->featureInstances;
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
  public function setGeneratedResourceName($generatedResourceName)
  {
    $this->generatedResourceName = $generatedResourceName;
  }
  /**
   * @return string
   */
  public function getGeneratedResourceName()
  {
    return $this->generatedResourceName;
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
  /**
   * @param string
   */
  public function setResourceCategory($resourceCategory)
  {
    $this->resourceCategory = $resourceCategory;
  }
  /**
   * @return string
   */
  public function getResourceCategory()
  {
    return $this->resourceCategory;
  }
  /**
   * @param string
   */
  public function setResourceDescription($resourceDescription)
  {
    $this->resourceDescription = $resourceDescription;
  }
  /**
   * @return string
   */
  public function getResourceDescription()
  {
    return $this->resourceDescription;
  }
  /**
   * @param string
   */
  public function setResourceEmail($resourceEmail)
  {
    $this->resourceEmail = $resourceEmail;
  }
  /**
   * @return string
   */
  public function getResourceEmail()
  {
    return $this->resourceEmail;
  }
  /**
   * @param string
   */
  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }
  /**
   * @return string
   */
  public function getResourceId()
  {
    return $this->resourceId;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param string
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
  /**
   * @param string
   */
  public function setUserVisibleDescription($userVisibleDescription)
  {
    $this->userVisibleDescription = $userVisibleDescription;
  }
  /**
   * @return string
   */
  public function getUserVisibleDescription()
  {
    return $this->userVisibleDescription;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CalendarResource::class, 'Google_Service_Directory_CalendarResource');
