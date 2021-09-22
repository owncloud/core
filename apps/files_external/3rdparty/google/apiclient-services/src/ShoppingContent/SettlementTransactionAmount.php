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

class SettlementTransactionAmount extends \Google\Model
{
  protected $commissionType = SettlementTransactionAmountCommission::class;
  protected $commissionDataType = '';
  public $description;
  protected $transactionAmountType = Price::class;
  protected $transactionAmountDataType = '';
  public $type;

  /**
   * @param SettlementTransactionAmountCommission
   */
  public function setCommission(SettlementTransactionAmountCommission $commission)
  {
    $this->commission = $commission;
  }
  /**
   * @return SettlementTransactionAmountCommission
   */
  public function getCommission()
  {
    return $this->commission;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Price
   */
  public function setTransactionAmount(Price $transactionAmount)
  {
    $this->transactionAmount = $transactionAmount;
  }
  /**
   * @return Price
   */
  public function getTransactionAmount()
  {
    return $this->transactionAmount;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SettlementTransactionAmount::class, 'Google_Service_ShoppingContent_SettlementTransactionAmount');
