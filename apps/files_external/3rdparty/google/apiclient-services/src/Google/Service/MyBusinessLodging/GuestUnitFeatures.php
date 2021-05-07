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

class Google_Service_MyBusinessLodging_GuestUnitFeatures extends Google_Model
{
  public $bungalowOrVilla;
  public $bungalowOrVillaException;
  public $connectingUnitAvailable;
  public $connectingUnitAvailableException;
  public $executiveFloor;
  public $executiveFloorException;
  public $maxAdultOccupantsCount;
  public $maxAdultOccupantsCountException;
  public $maxChildOccupantsCount;
  public $maxChildOccupantsCountException;
  public $maxOccupantsCount;
  public $maxOccupantsCountException;
  public $privateHome;
  public $privateHomeException;
  public $suite;
  public $suiteException;
  public $tier;
  public $tierException;
  protected $totalLivingAreasType = 'Google_Service_MyBusinessLodging_LivingArea';
  protected $totalLivingAreasDataType = '';
  protected $viewsType = 'Google_Service_MyBusinessLodging_ViewsFromUnit';
  protected $viewsDataType = '';

  public function setBungalowOrVilla($bungalowOrVilla)
  {
    $this->bungalowOrVilla = $bungalowOrVilla;
  }
  public function getBungalowOrVilla()
  {
    return $this->bungalowOrVilla;
  }
  public function setBungalowOrVillaException($bungalowOrVillaException)
  {
    $this->bungalowOrVillaException = $bungalowOrVillaException;
  }
  public function getBungalowOrVillaException()
  {
    return $this->bungalowOrVillaException;
  }
  public function setConnectingUnitAvailable($connectingUnitAvailable)
  {
    $this->connectingUnitAvailable = $connectingUnitAvailable;
  }
  public function getConnectingUnitAvailable()
  {
    return $this->connectingUnitAvailable;
  }
  public function setConnectingUnitAvailableException($connectingUnitAvailableException)
  {
    $this->connectingUnitAvailableException = $connectingUnitAvailableException;
  }
  public function getConnectingUnitAvailableException()
  {
    return $this->connectingUnitAvailableException;
  }
  public function setExecutiveFloor($executiveFloor)
  {
    $this->executiveFloor = $executiveFloor;
  }
  public function getExecutiveFloor()
  {
    return $this->executiveFloor;
  }
  public function setExecutiveFloorException($executiveFloorException)
  {
    $this->executiveFloorException = $executiveFloorException;
  }
  public function getExecutiveFloorException()
  {
    return $this->executiveFloorException;
  }
  public function setMaxAdultOccupantsCount($maxAdultOccupantsCount)
  {
    $this->maxAdultOccupantsCount = $maxAdultOccupantsCount;
  }
  public function getMaxAdultOccupantsCount()
  {
    return $this->maxAdultOccupantsCount;
  }
  public function setMaxAdultOccupantsCountException($maxAdultOccupantsCountException)
  {
    $this->maxAdultOccupantsCountException = $maxAdultOccupantsCountException;
  }
  public function getMaxAdultOccupantsCountException()
  {
    return $this->maxAdultOccupantsCountException;
  }
  public function setMaxChildOccupantsCount($maxChildOccupantsCount)
  {
    $this->maxChildOccupantsCount = $maxChildOccupantsCount;
  }
  public function getMaxChildOccupantsCount()
  {
    return $this->maxChildOccupantsCount;
  }
  public function setMaxChildOccupantsCountException($maxChildOccupantsCountException)
  {
    $this->maxChildOccupantsCountException = $maxChildOccupantsCountException;
  }
  public function getMaxChildOccupantsCountException()
  {
    return $this->maxChildOccupantsCountException;
  }
  public function setMaxOccupantsCount($maxOccupantsCount)
  {
    $this->maxOccupantsCount = $maxOccupantsCount;
  }
  public function getMaxOccupantsCount()
  {
    return $this->maxOccupantsCount;
  }
  public function setMaxOccupantsCountException($maxOccupantsCountException)
  {
    $this->maxOccupantsCountException = $maxOccupantsCountException;
  }
  public function getMaxOccupantsCountException()
  {
    return $this->maxOccupantsCountException;
  }
  public function setPrivateHome($privateHome)
  {
    $this->privateHome = $privateHome;
  }
  public function getPrivateHome()
  {
    return $this->privateHome;
  }
  public function setPrivateHomeException($privateHomeException)
  {
    $this->privateHomeException = $privateHomeException;
  }
  public function getPrivateHomeException()
  {
    return $this->privateHomeException;
  }
  public function setSuite($suite)
  {
    $this->suite = $suite;
  }
  public function getSuite()
  {
    return $this->suite;
  }
  public function setSuiteException($suiteException)
  {
    $this->suiteException = $suiteException;
  }
  public function getSuiteException()
  {
    return $this->suiteException;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
  public function setTierException($tierException)
  {
    $this->tierException = $tierException;
  }
  public function getTierException()
  {
    return $this->tierException;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LivingArea
   */
  public function setTotalLivingAreas(Google_Service_MyBusinessLodging_LivingArea $totalLivingAreas)
  {
    $this->totalLivingAreas = $totalLivingAreas;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingArea
   */
  public function getTotalLivingAreas()
  {
    return $this->totalLivingAreas;
  }
  /**
   * @param Google_Service_MyBusinessLodging_ViewsFromUnit
   */
  public function setViews(Google_Service_MyBusinessLodging_ViewsFromUnit $views)
  {
    $this->views = $views;
  }
  /**
   * @return Google_Service_MyBusinessLodging_ViewsFromUnit
   */
  public function getViews()
  {
    return $this->views;
  }
}
