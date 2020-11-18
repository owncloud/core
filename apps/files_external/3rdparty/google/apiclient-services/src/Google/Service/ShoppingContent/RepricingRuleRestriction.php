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

class Google_Service_ShoppingContent_RepricingRuleRestriction extends Google_Model
{
  protected $floorType = 'Google_Service_ShoppingContent_RepricingRuleRestrictionBoundary';
  protected $floorDataType = '';
  public $useAutoPricingMinPrice;

  /**
   * @param Google_Service_ShoppingContent_RepricingRuleRestrictionBoundary
   */
  public function setFloor(Google_Service_ShoppingContent_RepricingRuleRestrictionBoundary $floor)
  {
    $this->floor = $floor;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleRestrictionBoundary
   */
  public function getFloor()
  {
    return $this->floor;
  }
  public function setUseAutoPricingMinPrice($useAutoPricingMinPrice)
  {
    $this->useAutoPricingMinPrice = $useAutoPricingMinPrice;
  }
  public function getUseAutoPricingMinPrice()
  {
    return $this->useAutoPricingMinPrice;
  }
}
