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

class Google_Service_ShoppingContent_OrderLineItemAdjustment extends Google_Model
{
  protected $priceAdjustmentType = 'Google_Service_ShoppingContent_Price';
  protected $priceAdjustmentDataType = '';
  protected $taxAdjustmentType = 'Google_Service_ShoppingContent_Price';
  protected $taxAdjustmentDataType = '';
  public $type;

  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPriceAdjustment(Google_Service_ShoppingContent_Price $priceAdjustment)
  {
    $this->priceAdjustment = $priceAdjustment;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getPriceAdjustment()
  {
    return $this->priceAdjustment;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setTaxAdjustment(Google_Service_ShoppingContent_Price $taxAdjustment)
  {
    $this->taxAdjustment = $taxAdjustment;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getTaxAdjustment()
  {
    return $this->taxAdjustment;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
