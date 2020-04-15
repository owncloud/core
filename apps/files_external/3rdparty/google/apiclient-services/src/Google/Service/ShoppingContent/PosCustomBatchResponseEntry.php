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

class Google_Service_ShoppingContent_PosCustomBatchResponseEntry extends Google_Model
{
  public $batchId;
  protected $errorsType = 'Google_Service_ShoppingContent_Errors';
  protected $errorsDataType = '';
  protected $inventoryType = 'Google_Service_ShoppingContent_PosInventory';
  protected $inventoryDataType = '';
  public $kind;
  protected $saleType = 'Google_Service_ShoppingContent_PosSale';
  protected $saleDataType = '';
  protected $storeType = 'Google_Service_ShoppingContent_PosStore';
  protected $storeDataType = '';

  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param Google_Service_ShoppingContent_Errors
   */
  public function setErrors(Google_Service_ShoppingContent_Errors $errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_ShoppingContent_Errors
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param Google_Service_ShoppingContent_PosInventory
   */
  public function setInventory(Google_Service_ShoppingContent_PosInventory $inventory)
  {
    $this->inventory = $inventory;
  }
  /**
   * @return Google_Service_ShoppingContent_PosInventory
   */
  public function getInventory()
  {
    return $this->inventory;
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
   * @param Google_Service_ShoppingContent_PosSale
   */
  public function setSale(Google_Service_ShoppingContent_PosSale $sale)
  {
    $this->sale = $sale;
  }
  /**
   * @return Google_Service_ShoppingContent_PosSale
   */
  public function getSale()
  {
    return $this->sale;
  }
  /**
   * @param Google_Service_ShoppingContent_PosStore
   */
  public function setStore(Google_Service_ShoppingContent_PosStore $store)
  {
    $this->store = $store;
  }
  /**
   * @return Google_Service_ShoppingContent_PosStore
   */
  public function getStore()
  {
    return $this->store;
  }
}
