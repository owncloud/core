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

class EcommerceData extends \Google\Collection
{
  protected $collection_key = 'products';
  public $actionType;
  public $ecommerceType;
  protected $productsType = ProductData::class;
  protected $productsDataType = 'array';
  protected $transactionType = TransactionData::class;
  protected $transactionDataType = '';

  public function setActionType($actionType)
  {
    $this->actionType = $actionType;
  }
  public function getActionType()
  {
    return $this->actionType;
  }
  public function setEcommerceType($ecommerceType)
  {
    $this->ecommerceType = $ecommerceType;
  }
  public function getEcommerceType()
  {
    return $this->ecommerceType;
  }
  /**
   * @param ProductData[]
   */
  public function setProducts($products)
  {
    $this->products = $products;
  }
  /**
   * @return ProductData[]
   */
  public function getProducts()
  {
    return $this->products;
  }
  /**
   * @param TransactionData
   */
  public function setTransaction(TransactionData $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return TransactionData
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EcommerceData::class, 'Google_Service_AnalyticsReporting_EcommerceData');
