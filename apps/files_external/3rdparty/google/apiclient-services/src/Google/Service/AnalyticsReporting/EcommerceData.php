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

class Google_Service_AnalyticsReporting_EcommerceData extends Google_Collection
{
  protected $collection_key = 'products';
  public $actionType;
  public $ecommerceType;
  protected $productsType = 'Google_Service_AnalyticsReporting_ProductData';
  protected $productsDataType = 'array';
  protected $transactionType = 'Google_Service_AnalyticsReporting_TransactionData';
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
   * @param Google_Service_AnalyticsReporting_ProductData
   */
  public function setProducts($products)
  {
    $this->products = $products;
  }
  /**
   * @return Google_Service_AnalyticsReporting_ProductData
   */
  public function getProducts()
  {
    return $this->products;
  }
  /**
   * @param Google_Service_AnalyticsReporting_TransactionData
   */
  public function setTransaction(Google_Service_AnalyticsReporting_TransactionData $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return Google_Service_AnalyticsReporting_TransactionData
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}
