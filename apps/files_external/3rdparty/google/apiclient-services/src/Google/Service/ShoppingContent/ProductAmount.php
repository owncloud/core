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

class Google_Service_ShoppingContent_ProductAmount extends Google_Model
{
  protected $priceAmountType = 'Google_Service_ShoppingContent_Price';
  protected $priceAmountDataType = '';
  protected $remittedTaxAmountType = 'Google_Service_ShoppingContent_Price';
  protected $remittedTaxAmountDataType = '';
  protected $taxAmountType = 'Google_Service_ShoppingContent_Price';
  protected $taxAmountDataType = '';

  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPriceAmount(Google_Service_ShoppingContent_Price $priceAmount)
  {
    $this->priceAmount = $priceAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getPriceAmount()
  {
    return $this->priceAmount;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setRemittedTaxAmount(Google_Service_ShoppingContent_Price $remittedTaxAmount)
  {
    $this->remittedTaxAmount = $remittedTaxAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getRemittedTaxAmount()
  {
    return $this->remittedTaxAmount;
  }
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
}
