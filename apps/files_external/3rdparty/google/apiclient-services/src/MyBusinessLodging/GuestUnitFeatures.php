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

class GuestUnitFeatures extends \Google\Model
{
  /**
   * @var bool
   */
  public $bungalowOrVilla;
  /**
   * @var string
   */
  public $bungalowOrVillaException;
  /**
   * @var bool
   */
  public $connectingUnitAvailable;
  /**
   * @var string
   */
  public $connectingUnitAvailableException;
  /**
   * @var bool
   */
  public $executiveFloor;
  /**
   * @var string
   */
  public $executiveFloorException;
  /**
   * @var int
   */
  public $maxAdultOccupantsCount;
  /**
   * @var string
   */
  public $maxAdultOccupantsCountException;
  /**
   * @var int
   */
  public $maxChildOccupantsCount;
  /**
   * @var string
   */
  public $maxChildOccupantsCountException;
  /**
   * @var int
   */
  public $maxOccupantsCount;
  /**
   * @var string
   */
  public $maxOccupantsCountException;
  /**
   * @var bool
   */
  public $privateHome;
  /**
   * @var string
   */
  public $privateHomeException;
  /**
   * @var bool
   */
  public $suite;
  /**
   * @var string
   */
  public $suiteException;
  /**
   * @var string
   */
  public $tier;
  /**
   * @var string
   */
  public $tierException;
  protected $totalLivingAreasType = LivingArea::class;
  protected $totalLivingAreasDataType = '';
  protected $viewsType = ViewsFromUnit::class;
  protected $viewsDataType = '';

  /**
   * @param bool
   */
  public function setBungalowOrVilla($bungalowOrVilla)
  {
    $this->bungalowOrVilla = $bungalowOrVilla;
  }
  /**
   * @return bool
   */
  public function getBungalowOrVilla()
  {
    return $this->bungalowOrVilla;
  }
  /**
   * @param string
   */
  public function setBungalowOrVillaException($bungalowOrVillaException)
  {
    $this->bungalowOrVillaException = $bungalowOrVillaException;
  }
  /**
   * @return string
   */
  public function getBungalowOrVillaException()
  {
    return $this->bungalowOrVillaException;
  }
  /**
   * @param bool
   */
  public function setConnectingUnitAvailable($connectingUnitAvailable)
  {
    $this->connectingUnitAvailable = $connectingUnitAvailable;
  }
  /**
   * @return bool
   */
  public function getConnectingUnitAvailable()
  {
    return $this->connectingUnitAvailable;
  }
  /**
   * @param string
   */
  public function setConnectingUnitAvailableException($connectingUnitAvailableException)
  {
    $this->connectingUnitAvailableException = $connectingUnitAvailableException;
  }
  /**
   * @return string
   */
  public function getConnectingUnitAvailableException()
  {
    return $this->connectingUnitAvailableException;
  }
  /**
   * @param bool
   */
  public function setExecutiveFloor($executiveFloor)
  {
    $this->executiveFloor = $executiveFloor;
  }
  /**
   * @return bool
   */
  public function getExecutiveFloor()
  {
    return $this->executiveFloor;
  }
  /**
   * @param string
   */
  public function setExecutiveFloorException($executiveFloorException)
  {
    $this->executiveFloorException = $executiveFloorException;
  }
  /**
   * @return string
   */
  public function getExecutiveFloorException()
  {
    return $this->executiveFloorException;
  }
  /**
   * @param int
   */
  public function setMaxAdultOccupantsCount($maxAdultOccupantsCount)
  {
    $this->maxAdultOccupantsCount = $maxAdultOccupantsCount;
  }
  /**
   * @return int
   */
  public function getMaxAdultOccupantsCount()
  {
    return $this->maxAdultOccupantsCount;
  }
  /**
   * @param string
   */
  public function setMaxAdultOccupantsCountException($maxAdultOccupantsCountException)
  {
    $this->maxAdultOccupantsCountException = $maxAdultOccupantsCountException;
  }
  /**
   * @return string
   */
  public function getMaxAdultOccupantsCountException()
  {
    return $this->maxAdultOccupantsCountException;
  }
  /**
   * @param int
   */
  public function setMaxChildOccupantsCount($maxChildOccupantsCount)
  {
    $this->maxChildOccupantsCount = $maxChildOccupantsCount;
  }
  /**
   * @return int
   */
  public function getMaxChildOccupantsCount()
  {
    return $this->maxChildOccupantsCount;
  }
  /**
   * @param string
   */
  public function setMaxChildOccupantsCountException($maxChildOccupantsCountException)
  {
    $this->maxChildOccupantsCountException = $maxChildOccupantsCountException;
  }
  /**
   * @return string
   */
  public function getMaxChildOccupantsCountException()
  {
    return $this->maxChildOccupantsCountException;
  }
  /**
   * @param int
   */
  public function setMaxOccupantsCount($maxOccupantsCount)
  {
    $this->maxOccupantsCount = $maxOccupantsCount;
  }
  /**
   * @return int
   */
  public function getMaxOccupantsCount()
  {
    return $this->maxOccupantsCount;
  }
  /**
   * @param string
   */
  public function setMaxOccupantsCountException($maxOccupantsCountException)
  {
    $this->maxOccupantsCountException = $maxOccupantsCountException;
  }
  /**
   * @return string
   */
  public function getMaxOccupantsCountException()
  {
    return $this->maxOccupantsCountException;
  }
  /**
   * @param bool
   */
  public function setPrivateHome($privateHome)
  {
    $this->privateHome = $privateHome;
  }
  /**
   * @return bool
   */
  public function getPrivateHome()
  {
    return $this->privateHome;
  }
  /**
   * @param string
   */
  public function setPrivateHomeException($privateHomeException)
  {
    $this->privateHomeException = $privateHomeException;
  }
  /**
   * @return string
   */
  public function getPrivateHomeException()
  {
    return $this->privateHomeException;
  }
  /**
   * @param bool
   */
  public function setSuite($suite)
  {
    $this->suite = $suite;
  }
  /**
   * @return bool
   */
  public function getSuite()
  {
    return $this->suite;
  }
  /**
   * @param string
   */
  public function setSuiteException($suiteException)
  {
    $this->suiteException = $suiteException;
  }
  /**
   * @return string
   */
  public function getSuiteException()
  {
    return $this->suiteException;
  }
  /**
   * @param string
   */
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
  /**
   * @param string
   */
  public function setTierException($tierException)
  {
    $this->tierException = $tierException;
  }
  /**
   * @return string
   */
  public function getTierException()
  {
    return $this->tierException;
  }
  /**
   * @param LivingArea
   */
  public function setTotalLivingAreas(LivingArea $totalLivingAreas)
  {
    $this->totalLivingAreas = $totalLivingAreas;
  }
  /**
   * @return LivingArea
   */
  public function getTotalLivingAreas()
  {
    return $this->totalLivingAreas;
  }
  /**
   * @param ViewsFromUnit
   */
  public function setViews(ViewsFromUnit $views)
  {
    $this->views = $views;
  }
  /**
   * @return ViewsFromUnit
   */
  public function getViews()
  {
    return $this->views;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GuestUnitFeatures::class, 'Google_Service_MyBusinessLodging_GuestUnitFeatures');
