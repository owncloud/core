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

class PosCustomBatchRequestEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $batchId;
  protected $inventoryType = PosInventory::class;
  protected $inventoryDataType = '';
  /**
   * @var string
   */
  public $merchantId;
  /**
   * @var string
   */
  public $method;
  protected $saleType = PosSale::class;
  protected $saleDataType = '';
  protected $storeType = PosStore::class;
  protected $storeDataType = '';
  /**
   * @var string
   */
  public $storeCode;
  /**
   * @var string
   */
  public $targetMerchantId;

  /**
   * @param string
   */
  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  /**
   * @return string
   */
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param PosInventory
   */
  public function setInventory(PosInventory $inventory)
  {
    $this->inventory = $inventory;
  }
  /**
   * @return PosInventory
   */
  public function getInventory()
  {
    return $this->inventory;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param PosSale
   */
  public function setSale(PosSale $sale)
  {
    $this->sale = $sale;
  }
  /**
   * @return PosSale
   */
  public function getSale()
  {
    return $this->sale;
  }
  /**
   * @param PosStore
   */
  public function setStore(PosStore $store)
  {
    $this->store = $store;
  }
  /**
   * @return PosStore
   */
  public function getStore()
  {
    return $this->store;
  }
  /**
   * @param string
   */
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  /**
   * @return string
   */
  public function getStoreCode()
  {
    return $this->storeCode;
  }
  /**
   * @param string
   */
  public function setTargetMerchantId($targetMerchantId)
  {
    $this->targetMerchantId = $targetMerchantId;
  }
  /**
   * @return string
   */
  public function getTargetMerchantId()
  {
    return $this->targetMerchantId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PosCustomBatchRequestEntry::class, 'Google_Service_ShoppingContent_PosCustomBatchRequestEntry');
