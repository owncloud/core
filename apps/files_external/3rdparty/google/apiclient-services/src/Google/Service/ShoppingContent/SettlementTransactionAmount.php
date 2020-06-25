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

class Google_Service_ShoppingContent_SettlementTransactionAmount extends Google_Model
{
  protected $commissionType = 'Google_Service_ShoppingContent_SettlementTransactionAmountCommission';
  protected $commissionDataType = '';
  public $description;
  protected $transactionAmountType = 'Google_Service_ShoppingContent_Price';
  protected $transactionAmountDataType = '';
  public $type;

  /**
   * @param Google_Service_ShoppingContent_SettlementTransactionAmountCommission
   */
  public function setCommission(Google_Service_ShoppingContent_SettlementTransactionAmountCommission $commission)
  {
    $this->commission = $commission;
  }
  /**
   * @return Google_Service_ShoppingContent_SettlementTransactionAmountCommission
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
   * @param Google_Service_ShoppingContent_Price
   */
  public function setTransactionAmount(Google_Service_ShoppingContent_Price $transactionAmount)
  {
    $this->transactionAmount = $transactionAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
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
