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

class Google_Service_ShoppingContent_SettlementReport extends Google_Collection
{
  protected $collection_key = 'transferIds';
  public $endDate;
  public $kind;
  protected $previousBalanceType = 'Google_Service_ShoppingContent_Price';
  protected $previousBalanceDataType = '';
  public $settlementId;
  public $startDate;
  protected $transferAmountType = 'Google_Service_ShoppingContent_Price';
  protected $transferAmountDataType = '';
  public $transferDate;
  public $transferIds;

  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPreviousBalance(Google_Service_ShoppingContent_Price $previousBalance)
  {
    $this->previousBalance = $previousBalance;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getPreviousBalance()
  {
    return $this->previousBalance;
  }
  public function setSettlementId($settlementId)
  {
    $this->settlementId = $settlementId;
  }
  public function getSettlementId()
  {
    return $this->settlementId;
  }
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setTransferAmount(Google_Service_ShoppingContent_Price $transferAmount)
  {
    $this->transferAmount = $transferAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getTransferAmount()
  {
    return $this->transferAmount;
  }
  public function setTransferDate($transferDate)
  {
    $this->transferDate = $transferDate;
  }
  public function getTransferDate()
  {
    return $this->transferDate;
  }
  public function setTransferIds($transferIds)
  {
    $this->transferIds = $transferIds;
  }
  public function getTransferIds()
  {
    return $this->transferIds;
  }
}
