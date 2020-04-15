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

class Google_Service_ShoppingContent_UnitInvoiceTaxLine extends Google_Model
{
  protected $taxAmountType = 'Google_Service_ShoppingContent_Price';
  protected $taxAmountDataType = '';
  public $taxName;
  public $taxType;

  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setTaxAmount(Google_Service_ShoppingContent_Price $taxAmount)
  {
    $this->taxAmount = $taxAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getTaxAmount()
  {
    return $this->taxAmount;
  }
  public function setTaxName($taxName)
  {
    $this->taxName = $taxName;
  }
  public function getTaxName()
  {
    return $this->taxName;
  }
  public function setTaxType($taxType)
  {
    $this->taxType = $taxType;
  }
  public function getTaxType()
  {
    return $this->taxType;
  }
}
