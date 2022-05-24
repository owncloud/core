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

class SettlementReport extends \Google\Collection
{
  protected $collection_key = 'transferIds';
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var string
   */
  public $kind;
  protected $previousBalanceType = Price::class;
  protected $previousBalanceDataType = '';
  /**
   * @var string
   */
  public $settlementId;
  /**
   * @var string
   */
  public $startDate;
  protected $transferAmountType = Price::class;
  protected $transferAmountDataType = '';
  /**
   * @var string
   */
  public $transferDate;
  /**
   * @var string[]
   */
  public $transferIds;

  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Price
   */
  public function setPreviousBalance(Price $previousBalance)
  {
    $this->previousBalance = $previousBalance;
  }
  /**
   * @return Price
   */
  public function getPreviousBalance()
  {
    return $this->previousBalance;
  }
  /**
   * @param string
   */
  public function setSettlementId($settlementId)
  {
    $this->settlementId = $settlementId;
  }
  /**
   * @return string
   */
  public function getSettlementId()
  {
    return $this->settlementId;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param Price
   */
  public function setTransferAmount(Price $transferAmount)
  {
    $this->transferAmount = $transferAmount;
  }
  /**
   * @return Price
   */
  public function getTransferAmount()
  {
    return $this->transferAmount;
  }
  /**
   * @param string
   */
  public function setTransferDate($transferDate)
  {
    $this->transferDate = $transferDate;
  }
  /**
   * @return string
   */
  public function getTransferDate()
  {
    return $this->transferDate;
  }
  /**
   * @param string[]
   */
  public function setTransferIds($transferIds)
  {
    $this->transferIds = $transferIds;
  }
  /**
   * @return string[]
   */
  public function getTransferIds()
  {
    return $this->transferIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SettlementReport::class, 'Google_Service_ShoppingContent_SettlementReport');
