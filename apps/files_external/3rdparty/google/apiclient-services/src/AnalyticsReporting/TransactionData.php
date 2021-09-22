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

namespace Google\Service\AnalyticsReporting;

class TransactionData extends \Google\Model
{
  public $transactionId;
  public $transactionRevenue;
  public $transactionShipping;
  public $transactionTax;

  public function setTransactionId($transactionId)
  {
    $this->transactionId = $transactionId;
  }
  public function getTransactionId()
  {
    return $this->transactionId;
  }
  public function setTransactionRevenue($transactionRevenue)
  {
    $this->transactionRevenue = $transactionRevenue;
  }
  public function getTransactionRevenue()
  {
    return $this->transactionRevenue;
  }
  public function setTransactionShipping($transactionShipping)
  {
    $this->transactionShipping = $transactionShipping;
  }
  public function getTransactionShipping()
  {
    return $this->transactionShipping;
  }
  public function setTransactionTax($transactionTax)
  {
    $this->transactionTax = $transactionTax;
  }
  public function getTransactionTax()
  {
    return $this->transactionTax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransactionData::class, 'Google_Service_AnalyticsReporting_TransactionData');
