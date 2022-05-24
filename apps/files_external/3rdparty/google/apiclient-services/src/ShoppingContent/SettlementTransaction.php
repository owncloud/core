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

class SettlementTransaction extends \Google\Model
{
  protected $amountType = SettlementTransactionAmount::class;
  protected $amountDataType = '';
  protected $identifiersType = SettlementTransactionIdentifiers::class;
  protected $identifiersDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $transactionType = SettlementTransactionTransaction::class;
  protected $transactionDataType = '';

  /**
   * @param SettlementTransactionAmount
   */
  public function setAmount(SettlementTransactionAmount $amount)
  {
    $this->amount = $amount;
  }
  /**
   * @return SettlementTransactionAmount
   */
  public function getAmount()
  {
    return $this->amount;
  }
  /**
   * @param SettlementTransactionIdentifiers
   */
  public function setIdentifiers(SettlementTransactionIdentifiers $identifiers)
  {
    $this->identifiers = $identifiers;
  }
  /**
   * @return SettlementTransactionIdentifiers
   */
  public function getIdentifiers()
  {
    return $this->identifiers;
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
   * @param SettlementTransactionTransaction
   */
  public function setTransaction(SettlementTransactionTransaction $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return SettlementTransactionTransaction
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SettlementTransaction::class, 'Google_Service_ShoppingContent_SettlementTransaction');
