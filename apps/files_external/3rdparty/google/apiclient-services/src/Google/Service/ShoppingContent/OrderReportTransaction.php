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

class Google_Service_ShoppingContent_OrderReportTransaction extends Google_Model
{
  protected $disbursementAmountType = 'Google_Service_ShoppingContent_Price';
  protected $disbursementAmountDataType = '';
  public $disbursementCreationDate;
  public $disbursementDate;
  public $disbursementId;
  public $merchantId;
  public $merchantOrderId;
  public $orderId;
  protected $productAmountType = 'Google_Service_ShoppingContent_ProductAmount';
  protected $productAmountDataType = '';
  public $transactionDate;

  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setDisbursementAmount(Google_Service_ShoppingContent_Price $disbursementAmount)
  {
    $this->disbursementAmount = $disbursementAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getDisbursementAmount()
  {
    return $this->disbursementAmount;
  }
  public function setDisbursementCreationDate($disbursementCreationDate)
  {
    $this->disbursementCreationDate = $disbursementCreationDate;
  }
  public function getDisbursementCreationDate()
  {
    return $this->disbursementCreationDate;
  }
  public function setDisbursementDate($disbursementDate)
  {
    $this->disbursementDate = $disbursementDate;
  }
  public function getDisbursementDate()
  {
    return $this->disbursementDate;
  }
  public function setDisbursementId($disbursementId)
  {
    $this->disbursementId = $disbursementId;
  }
  public function getDisbursementId()
  {
    return $this->disbursementId;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function setMerchantOrderId($merchantOrderId)
  {
    $this->merchantOrderId = $merchantOrderId;
  }
  public function getMerchantOrderId()
  {
    return $this->merchantOrderId;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductAmount
   */
  public function setProductAmount(Google_Service_ShoppingContent_ProductAmount $productAmount)
  {
    $this->productAmount = $productAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductAmount
   */
  public function getProductAmount()
  {
    return $this->productAmount;
  }
  public function setTransactionDate($transactionDate)
  {
    $this->transactionDate = $transactionDate;
  }
  public function getTransactionDate()
  {
    return $this->transactionDate;
  }
}
