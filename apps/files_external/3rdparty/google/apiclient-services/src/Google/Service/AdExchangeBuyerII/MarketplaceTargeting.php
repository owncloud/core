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

class Google_Service_AdExchangeBuyerII_MarketplaceTargeting extends Google_Model
{
  protected $geoTargetingType = 'Google_Service_AdExchangeBuyerII_CriteriaTargeting';
  protected $geoTargetingDataType = '';
  protected $inventorySizeTargetingType = 'Google_Service_AdExchangeBuyerII_InventorySizeTargeting';
  protected $inventorySizeTargetingDataType = '';
  protected $placementTargetingType = 'Google_Service_AdExchangeBuyerII_PlacementTargeting';
  protected $placementTargetingDataType = '';
  protected $technologyTargetingType = 'Google_Service_AdExchangeBuyerII_TechnologyTargeting';
  protected $technologyTargetingDataType = '';
  protected $videoTargetingType = 'Google_Service_AdExchangeBuyerII_VideoTargeting';
  protected $videoTargetingDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function setGeoTargeting(Google_Service_AdExchangeBuyerII_CriteriaTargeting $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_InventorySizeTargeting
   */
  public function setInventorySizeTargeting(Google_Service_AdExchangeBuyerII_InventorySizeTargeting $inventorySizeTargeting)
  {
    $this->inventorySizeTargeting = $inventorySizeTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_InventorySizeTargeting
   */
  public function getInventorySizeTargeting()
  {
    return $this->inventorySizeTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_PlacementTargeting
   */
  public function setPlacementTargeting(Google_Service_AdExchangeBuyerII_PlacementTargeting $placementTargeting)
  {
    $this->placementTargeting = $placementTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_PlacementTargeting
   */
  public function getPlacementTargeting()
  {
    return $this->placementTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_TechnologyTargeting
   */
  public function setTechnologyTargeting(Google_Service_AdExchangeBuyerII_TechnologyTargeting $technologyTargeting)
  {
    $this->technologyTargeting = $technologyTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_TechnologyTargeting
   */
  public function getTechnologyTargeting()
  {
    return $this->technologyTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_VideoTargeting
   */
  public function setVideoTargeting(Google_Service_AdExchangeBuyerII_VideoTargeting $videoTargeting)
  {
    $this->videoTargeting = $videoTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_VideoTargeting
   */
  public function getVideoTargeting()
  {
    return $this->videoTargeting;
  }
}
