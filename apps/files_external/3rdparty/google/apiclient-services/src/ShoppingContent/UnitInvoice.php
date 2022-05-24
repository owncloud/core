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

class UnitInvoice extends \Google\Collection
{
  protected $collection_key = 'unitPriceTaxes';
  protected $additionalChargesType = UnitInvoiceAdditionalCharge::class;
  protected $additionalChargesDataType = 'array';
  protected $unitPriceType = Price::class;
  protected $unitPriceDataType = '';
  protected $unitPriceTaxesType = UnitInvoiceTaxLine::class;
  protected $unitPriceTaxesDataType = 'array';

  /**
   * @param UnitInvoiceAdditionalCharge[]
   */
  public function setAdditionalCharges($additionalCharges)
  {
    $this->additionalCharges = $additionalCharges;
  }
  /**
   * @return UnitInvoiceAdditionalCharge[]
   */
  public function getAdditionalCharges()
  {
    return $this->additionalCharges;
  }
  /**
   * @param Price
   */
  public function setUnitPrice(Price $unitPrice)
  {
    $this->unitPrice = $unitPrice;
  }
  /**
   * @return Price
   */
  public function getUnitPrice()
  {
    return $this->unitPrice;
  }
  /**
   * @param UnitInvoiceTaxLine[]
   */
  public function setUnitPriceTaxes($unitPriceTaxes)
  {
    $this->unitPriceTaxes = $unitPriceTaxes;
  }
  /**
   * @return UnitInvoiceTaxLine[]
   */
  public function getUnitPriceTaxes()
  {
    return $this->unitPriceTaxes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UnitInvoice::class, 'Google_Service_ShoppingContent_UnitInvoice');
