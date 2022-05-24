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

class LivingArea extends \Google\Model
{
  protected $accessibilityType = LivingAreaAccessibility::class;
  protected $accessibilityDataType = '';
  protected $eatingType = LivingAreaEating::class;
  protected $eatingDataType = '';
  protected $featuresType = LivingAreaFeatures::class;
  protected $featuresDataType = '';
  protected $layoutType = LivingAreaLayout::class;
  protected $layoutDataType = '';
  protected $sleepingType = LivingAreaSleeping::class;
  protected $sleepingDataType = '';

  /**
   * @param LivingAreaAccessibility
   */
  public function setAccessibility(LivingAreaAccessibility $accessibility)
  {
    $this->accessibility = $accessibility;
  }
  /**
   * @return LivingAreaAccessibility
   */
  public function getAccessibility()
  {
    return $this->accessibility;
  }
  /**
   * @param LivingAreaEating
   */
  public function setEating(LivingAreaEating $eating)
  {
    $this->eating = $eating;
  }
  /**
   * @return LivingAreaEating
   */
  public function getEating()
  {
    return $this->eating;
  }
  /**
   * @param LivingAreaFeatures
   */
  public function setFeatures(LivingAreaFeatures $features)
  {
    $this->features = $features;
  }
  /**
   * @return LivingAreaFeatures
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param LivingAreaLayout
   */
  public function setLayout(LivingAreaLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return LivingAreaLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param LivingAreaSleeping
   */
  public function setSleeping(LivingAreaSleeping $sleeping)
  {
    $this->sleeping = $sleeping;
  }
  /**
   * @return LivingAreaSleeping
   */
  public function getSleeping()
  {
    return $this->sleeping;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LivingArea::class, 'Google_Service_MyBusinessLodging_LivingArea');
