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

namespace Google\Service\ShoppingContent;

class UnitInvoiceTaxLine extends \Google\Model
{
  protected $taxAmountType = Price::class;
  protected $taxAmountDataType = '';
  /**
   * @var string
   */
  public $taxName;
  /**
   * @var string
   */
  public $taxType;

  /**
   * @param Price
   */
  public function setTaxAmount(Price $taxAmount)
  {
    $this->taxAmount = $taxAmount;
  }
  /**
   * @return Price
   */
  public function getTaxAmount()
  {
    return $this->taxAmount;
  }
  /**
   * @param string
   */
  public function setTaxName($taxName)
  {
    $this->taxName = $taxName;
  }
  /**
   * @return string
   */
  public function getTaxName()
  {
    return $this->taxName;
  }
  /**
   * @param string
   */
  public function setTaxType($taxType)
  {
    $this->taxType = $taxType;
  }
  /**
   * @return string
   */
  public function getTaxType()
  {
    return $this->taxType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UnitInvoiceTaxLine::class, 'Google_Service_ShoppingContent_UnitInvoiceTaxLine');
