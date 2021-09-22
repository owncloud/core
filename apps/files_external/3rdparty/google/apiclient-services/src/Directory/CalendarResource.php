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
  public $buildingId;
  public $capacity;
  public $etags;
  public $featureInstances;
  public $floorName;
  public $floorSection;
  public $generatedResourceName;
  public $kind;
  public $resourceCategory;
  public $resourceDescription;
  public $resourceEmail;
  public $resourceId;
  public $resourceName;
  public $resourceType;
  public $userVisibleDescription;

  public function setBuildingId($buildingId)
  {
    $this->buildingId = $buildingId;
  }
  public function getBuildingId()
  {
    return $this->buildingId;
  }
  public function setCapacity($capacity)
  {
    $this->capacity = $capacity;
  }
  public function getCapacity()
  {
    return $this->capacity;
  }
  public function setEtags($etags)
  {
    $this->etags = $etags;
  }
  public function getEtags()
  {
    return $this->etags;
  }
  public function setFeatureInstances($featureInstances)
  {
    $this->featureInstances = $featureInstances;
  }
  public function getFeatureInstances()
  {
    return $this->featureInstances;
  }
  public function setFloorName($floorName)
  {
    $this->floorName = $floorName;
  }
  public function getFloorName()
  {
    return $this->floorName;
  }
  public function setFloorSection($floorSection)
  {
    $this->floorSection = $floorSection;
  }
  public function getFloorSection()
  {
    return $this->floorSection;
  }
  public function setGeneratedResourceName($generatedResourceName)
  {
    $this->generatedResourceName = $generatedResourceName;
  }
  public function getGeneratedResourceName()
  {
    return $this->generatedResourceName;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setResourceCategory($resourceCategory)
  {
    $this->resourceCategory = $resourceCategory;
  }
  public function getResourceCategory()
  {
    return $this->resourceCategory;
  }
  public function setResourceDescription($resourceDescription)
  {
    $this->resourceDescription = $resourceDescription;
  }
  public function getResourceDescription()
  {
    return $this->resourceDescription;
  }
  public function setResourceEmail($resourceEmail)
  {
    $this->resourceEmail = $resourceEmail;
  }
  public function getResourceEmail()
  {
    return $this->resourceEmail;
  }
  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }
  public function getResourceId()
  {
    return $this->resourceId;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
  public function setUserVisibleDescription($userVisibleDescription)
  {
    $this->userVisibleDescription = $userVisibleDescription;
  }
  public function getUserVisibleDescription()
  {
    return $this->userVisibleDescription;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CalendarResource::class, 'Google_Service_Directory_CalendarResource');
