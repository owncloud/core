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

class Google_Service_MyBusinessLodging_LivingArea extends Google_Model
{
  protected $accessibilityType = 'Google_Service_MyBusinessLodging_LivingAreaAccessibility';
  protected $accessibilityDataType = '';
  protected $eatingType = 'Google_Service_MyBusinessLodging_LivingAreaEating';
  protected $eatingDataType = '';
  protected $featuresType = 'Google_Service_MyBusinessLodging_LivingAreaFeatures';
  protected $featuresDataType = '';
  protected $layoutType = 'Google_Service_MyBusinessLodging_LivingAreaLayout';
  protected $layoutDataType = '';
  protected $sleepingType = 'Google_Service_MyBusinessLodging_LivingAreaSleeping';
  protected $sleepingDataType = '';

  /**
   * @param Google_Service_MyBusinessLodging_LivingAreaAccessibility
   */
  public function setAccessibility(Google_Service_MyBusinessLodging_LivingAreaAccessibility $accessibility)
  {
    $this->accessibility = $accessibility;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingAreaAccessibility
   */
  public function getAccessibility()
  {
    return $this->accessibility;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LivingAreaEating
   */
  public function setEating(Google_Service_MyBusinessLodging_LivingAreaEating $eating)
  {
    $this->eating = $eating;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingAreaEating
   */
  public function getEating()
  {
    return $this->eating;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LivingAreaFeatures
   */
  public function setFeatures(Google_Service_MyBusinessLodging_LivingAreaFeatures $features)
  {
    $this->features = $features;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingAreaFeatures
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LivingAreaLayout
   */
  public function setLayout(Google_Service_MyBusinessLodging_LivingAreaLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingAreaLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LivingAreaSleeping
   */
  public function setSleeping(Google_Service_MyBusinessLodging_LivingAreaSleeping $sleeping)
  {
    $this->sleeping = $sleeping;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingAreaSleeping
   */
  public function getSleeping()
  {
    return $this->sleeping;
  }
}
