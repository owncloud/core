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

namespace Google\Service\MyBusinessLodging;

class PhysicalDistancing extends \Google\Model
{
  public $commonAreasPhysicalDistancingArranged;
  public $commonAreasPhysicalDistancingArrangedException;
  public $physicalDistancingRequired;
  public $physicalDistancingRequiredException;
  public $safetyDividers;
  public $safetyDividersException;
  public $sharedAreasLimitedOccupancy;
  public $sharedAreasLimitedOccupancyException;
  public $wellnessAreasHavePrivateSpaces;
  public $wellnessAreasHavePrivateSpacesException;

  public function setCommonAreasPhysicalDistancingArranged($commonAreasPhysicalDistancingArranged)
  {
    $this->commonAreasPhysicalDistancingArranged = $commonAreasPhysicalDistancingArranged;
  }
  public function getCommonAreasPhysicalDistancingArranged()
  {
    return $this->commonAreasPhysicalDistancingArranged;
  }
  public function setCommonAreasPhysicalDistancingArrangedException($commonAreasPhysicalDistancingArrangedException)
  {
    $this->commonAreasPhysicalDistancingArrangedException = $commonAreasPhysicalDistancingArrangedException;
  }
  public function getCommonAreasPhysicalDistancingArrangedException()
  {
    return $this->commonAreasPhysicalDistancingArrangedException;
  }
  public function setPhysicalDistancingRequired($physicalDistancingRequired)
  {
    $this->physicalDistancingRequired = $physicalDistancingRequired;
  }
  public function getPhysicalDistancingRequired()
  {
    return $this->physicalDistancingRequired;
  }
  public function setPhysicalDistancingRequiredException($physicalDistancingRequiredException)
  {
    $this->physicalDistancingRequiredException = $physicalDistancingRequiredException;
  }
  public function getPhysicalDistancingRequiredException()
  {
    return $this->physicalDistancingRequiredException;
  }
  public function setSafetyDividers($safetyDividers)
  {
    $this->safetyDividers = $safetyDividers;
  }
  public function getSafetyDividers()
  {
    return $this->safetyDividers;
  }
  public function setSafetyDividersException($safetyDividersException)
  {
    $this->safetyDividersException = $safetyDividersException;
  }
  public function getSafetyDividersException()
  {
    return $this->safetyDividersException;
  }
  public function setSharedAreasLimitedOccupancy($sharedAreasLimitedOccupancy)
  {
    $this->sharedAreasLimitedOccupancy = $sharedAreasLimitedOccupancy;
  }
  public function getSharedAreasLimitedOccupancy()
  {
    return $this->sharedAreasLimitedOccupancy;
  }
  public function setSharedAreasLimitedOccupancyException($sharedAreasLimitedOccupancyException)
  {
    $this->sharedAreasLimitedOccupancyException = $sharedAreasLimitedOccupancyException;
  }
  public function getSharedAreasLimitedOccupancyException()
  {
    return $this->sharedAreasLimitedOccupancyException;
  }
  public function setWellnessAreasHavePrivateSpaces($wellnessAreasHavePrivateSpaces)
  {
    $this->wellnessAreasHavePrivateSpaces = $wellnessAreasHavePrivateSpaces;
  }
  public function getWellnessAreasHavePrivateSpaces()
  {
    return $this->wellnessAreasHavePrivateSpaces;
  }
  public function setWellnessAreasHavePrivateSpacesException($wellnessAreasHavePrivateSpacesException)
  {
    $this->wellnessAreasHavePrivateSpacesException = $wellnessAreasHavePrivateSpacesException;
  }
  public function getWellnessAreasHavePrivateSpacesException()
  {
    return $this->wellnessAreasHavePrivateSpacesException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhysicalDistancing::class, 'Google_Service_MyBusinessLodging_PhysicalDistancing');
