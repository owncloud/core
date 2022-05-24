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

namespace Google\Service\AuthorizedBuyersMarketplace;

class MarketplaceTargeting extends \Google\Model
{
  protected $daypartTargetingType = DayPartTargeting::class;
  protected $daypartTargetingDataType = '';
  protected $geoTargetingType = CriteriaTargeting::class;
  protected $geoTargetingDataType = '';
  protected $inventorySizeTargetingType = InventorySizeTargeting::class;
  protected $inventorySizeTargetingDataType = '';
  protected $placementTargetingType = PlacementTargeting::class;
  protected $placementTargetingDataType = '';
  protected $technologyTargetingType = TechnologyTargeting::class;
  protected $technologyTargetingDataType = '';
  protected $userListTargetingType = CriteriaTargeting::class;
  protected $userListTargetingDataType = '';
  protected $videoTargetingType = VideoTargeting::class;
  protected $videoTargetingDataType = '';

  /**
   * @param DayPartTargeting
   */
  public function setDaypartTargeting(DayPartTargeting $daypartTargeting)
  {
    $this->daypartTargeting = $daypartTargeting;
  }
  /**
   * @return DayPartTargeting
   */
  public function getDaypartTargeting()
  {
    return $this->daypartTargeting;
  }
  /**
   * @param CriteriaTargeting
   */
  public function setGeoTargeting(CriteriaTargeting $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return CriteriaTargeting
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
  }
  /**
   * @param InventorySizeTargeting
   */
  public function setInventorySizeTargeting(InventorySizeTargeting $inventorySizeTargeting)
  {
    $this->inventorySizeTargeting = $inventorySizeTargeting;
  }
  /**
   * @return InventorySizeTargeting
   */
  public function getInventorySizeTargeting()
  {
    return $this->inventorySizeTargeting;
  }
  /**
   * @param PlacementTargeting
   */
  public function setPlacementTargeting(PlacementTargeting $placementTargeting)
  {
    $this->placementTargeting = $placementTargeting;
  }
  /**
   * @return PlacementTargeting
   */
  public function getPlacementTargeting()
  {
    return $this->placementTargeting;
  }
  /**
   * @param TechnologyTargeting
   */
  public function setTechnologyTargeting(TechnologyTargeting $technologyTargeting)
  {
    $this->technologyTargeting = $technologyTargeting;
  }
  /**
   * @return TechnologyTargeting
   */
  public function getTechnologyTargeting()
  {
    return $this->technologyTargeting;
  }
  /**
   * @param CriteriaTargeting
   */
  public function setUserListTargeting(CriteriaTargeting $userListTargeting)
  {
    $this->userListTargeting = $userListTargeting;
  }
  /**
   * @return CriteriaTargeting
   */
  public function getUserListTargeting()
  {
    return $this->userListTargeting;
  }
  /**
   * @param VideoTargeting
   */
  public function setVideoTargeting(VideoTargeting $videoTargeting)
  {
    $this->videoTargeting = $videoTargeting;
  }
  /**
   * @return VideoTargeting
   */
  public function getVideoTargeting()
  {
    return $this->videoTargeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MarketplaceTargeting::class, 'Google_Service_AuthorizedBuyersMarketplace_MarketplaceTargeting');
