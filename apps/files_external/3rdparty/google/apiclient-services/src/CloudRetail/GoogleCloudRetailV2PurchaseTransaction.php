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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2PurchaseTransaction extends \Google\Model
{
  /**
   * @var float
   */
  public $cost;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $id;
  /**
   * @var float
   */
  public $revenue;
  /**
   * @var float
   */
  public $tax;

  /**
   * @param float
   */
  public function setCost($cost)
  {
    $this->cost = $cost;
  }
  /**
   * @return float
   */
  public function getCost()
  {
    return $this->cost;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param float
   */
  public function setRevenue($revenue)
  {
    $this->revenue = $revenue;
  }
  /**
   * @return float
   */
  public function getRevenue()
  {
    return $this->revenue;
  }
  /**
   * @param float
   */
  public function setTax($tax)
  {
    $this->tax = $tax;
  }
  /**
   * @return float
   */
  public function getTax()
  {
    return $this->tax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2PurchaseTransaction::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2PurchaseTransaction');
