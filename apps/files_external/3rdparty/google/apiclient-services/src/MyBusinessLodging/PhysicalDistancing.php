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
  /**
   * @var bool
   */
  public $commonAreasPhysicalDistancingArranged;
  /**
   * @var string
   */
  public $commonAreasPhysicalDistancingArrangedException;
  /**
   * @var bool
   */
  public $physicalDistancingRequired;
  /**
   * @var string
   */
  public $physicalDistancingRequiredException;
  /**
   * @var bool
   */
  public $safetyDividers;
  /**
   * @var string
   */
  public $safetyDividersException;
  /**
   * @var bool
   */
  public $sharedAreasLimitedOccupancy;
  /**
   * @var string
   */
  public $sharedAreasLimitedOccupancyException;
  /**
   * @var bool
   */
  public $wellnessAreasHavePrivateSpaces;
  /**
   * @var string
   */
  public $wellnessAreasHavePrivateSpacesException;

  /**
   * @param bool
   */
  public function setCommonAreasPhysicalDistancingArranged($commonAreasPhysicalDistancingArranged)
  {
    $this->commonAreasPhysicalDistancingArranged = $commonAreasPhysicalDistancingArranged;
  }
  /**
   * @return bool
   */
  public function getCommonAreasPhysicalDistancingArranged()
  {
    return $this->commonAreasPhysicalDistancingArranged;
  }
  /**
   * @param string
   */
  public function setCommonAreasPhysicalDistancingArrangedException($commonAreasPhysicalDistancingArrangedException)
  {
    $this->commonAreasPhysicalDistancingArrangedException = $commonAreasPhysicalDistancingArrangedException;
  }
  /**
   * @return string
   */
  public function getCommonAreasPhysicalDistancingArrangedException()
  {
    return $this->commonAreasPhysicalDistancingArrangedException;
  }
  /**
   * @param bool
   */
  public function setPhysicalDistancingRequired($physicalDistancingRequired)
  {
    $this->physicalDistancingRequired = $physicalDistancingRequired;
  }
  /**
   * @return bool
   */
  public function getPhysicalDistancingRequired()
  {
    return $this->physicalDistancingRequired;
  }
  /**
   * @param string
   */
  public function setPhysicalDistancingRequiredException($physicalDistancingRequiredException)
  {
    $this->physicalDistancingRequiredException = $physicalDistancingRequiredException;
  }
  /**
   * @return string
   */
  public function getPhysicalDistancingRequiredException()
  {
    return $this->physicalDistancingRequiredException;
  }
  /**
   * @param bool
   */
  public function setSafetyDividers($safetyDividers)
  {
    $this->safetyDividers = $safetyDividers;
  }
  /**
   * @return bool
   */
  public function getSafetyDividers()
  {
    return $this->safetyDividers;
  }
  /**
   * @param string
   */
  public function setSafetyDividersException($safetyDividersException)
  {
    $this->safetyDividersException = $safetyDividersException;
  }
  /**
   * @return string
   */
  public function getSafetyDividersException()
  {
    return $this->safetyDividersException;
  }
  /**
   * @param bool
   */
  public function setSharedAreasLimitedOccupancy($sharedAreasLimitedOccupancy)
  {
    $this->sharedAreasLimitedOccupancy = $sharedAreasLimitedOccupancy;
  }
  /**
   * @return bool
   */
  public function getSharedAreasLimitedOccupancy()
  {
    return $this->sharedAreasLimitedOccupancy;
  }
  /**
   * @param string
   */
  public function setSharedAreasLimitedOccupancyException($sharedAreasLimitedOccupancyException)
  {
    $this->sharedAreasLimitedOccupancyException = $sharedAreasLimitedOccupancyException;
  }
  /**
   * @return string
   */
  public function getSharedAreasLimitedOccupancyException()
  {
    return $this->sharedAreasLimitedOccupancyException;
  }
  /**
   * @param bool
   */
  public function setWellnessAreasHavePrivateSpaces($wellnessAreasHavePrivateSpaces)
  {
    $this->wellnessAreasHavePrivateSpaces = $wellnessAreasHavePrivateSpaces;
  }
  /**
   * @return bool
   */
  public function getWellnessAreasHavePrivateSpaces()
  {
    return $this->wellnessAreasHavePrivateSpaces;
  }
  /**
   * @param string
   */
  public function setWellnessAreasHavePrivateSpacesException($wellnessAreasHavePrivateSpacesException)
  {
    $this->wellnessAreasHavePrivateSpacesException = $wellnessAreasHavePrivateSpacesException;
  }
  /**
   * @return string
   */
  public function getWellnessAreasHavePrivateSpacesException()
  {
    return $this->wellnessAreasHavePrivateSpacesException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhysicalDistancing::class, 'Google_Service_MyBusinessLodging_PhysicalDistancing');
