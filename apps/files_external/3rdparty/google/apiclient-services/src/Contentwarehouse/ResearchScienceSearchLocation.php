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

class ResearchScienceSearchLocation extends \Google\Collection
{
  protected $collection_key = 'locationMidLabel';
  /**
   * @var string
   */
  public $boxCoordinates;
  /**
   * @var string
   */
  public $circleCoordinates;
  /**
   * @var string[]
   */
  public $containedInMid;
  /**
   * @var string[]
   */
  public $locationMid;
  /**
   * @var string[]
   */
  public $locationMidLabel;
  /**
   * @var string
   */
  public $locationName;
  /**
   * @var string
   */
  public $pointCoordinates;
  /**
   * @var string
   */
  public $unformattedCoordinates;

  /**
   * @param string
   */
  public function setBoxCoordinates($boxCoordinates)
  {
    $this->boxCoordinates = $boxCoordinates;
  }
  /**
   * @return string
   */
  public function getBoxCoordinates()
  {
    return $this->boxCoordinates;
  }
  /**
   * @param string
   */
  public function setCircleCoordinates($circleCoordinates)
  {
    $this->circleCoordinates = $circleCoordinates;
  }
  /**
   * @return string
   */
  public function getCircleCoordinates()
  {
    return $this->circleCoordinates;
  }
  /**
   * @param string[]
   */
  public function setContainedInMid($containedInMid)
  {
    $this->containedInMid = $containedInMid;
  }
  /**
   * @return string[]
   */
  public function getContainedInMid()
  {
    return $this->containedInMid;
  }
  /**
   * @param string[]
   */
  public function setLocationMid($locationMid)
  {
    $this->locationMid = $locationMid;
  }
  /**
   * @return string[]
   */
  public function getLocationMid()
  {
    return $this->locationMid;
  }
  /**
   * @param string[]
   */
  public function setLocationMidLabel($locationMidLabel)
  {
    $this->locationMidLabel = $locationMidLabel;
  }
  /**
   * @return string[]
   */
  public function getLocationMidLabel()
  {
    return $this->locationMidLabel;
  }
  /**
   * @param string
   */
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  /**
   * @return string
   */
  public function getLocationName()
  {
    return $this->locationName;
  }
  /**
   * @param string
   */
  public function setPointCoordinates($pointCoordinates)
  {
    $this->pointCoordinates = $pointCoordinates;
  }
  /**
   * @return string
   */
  public function getPointCoordinates()
  {
    return $this->pointCoordinates;
  }
  /**
   * @param string
   */
  public function setUnformattedCoordinates($unformattedCoordinates)
  {
    $this->unformattedCoordinates = $unformattedCoordinates;
  }
  /**
   * @return string
   */
  public function getUnformattedCoordinates()
  {
    return $this->unformattedCoordinates;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchLocation::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchLocation');
