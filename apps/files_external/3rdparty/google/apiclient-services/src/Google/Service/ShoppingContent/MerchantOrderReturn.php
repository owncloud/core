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

class Google_Service_ShoppingContent_MerchantOrderReturn extends Google_Collection
{
  protected $collection_key = 'returnShipments';
  public $creationDate;
  public $merchantOrderId;
  public $orderId;
  public $orderReturnId;
  protected $returnItemsType = 'Google_Service_ShoppingContent_MerchantOrderReturnItem';
  protected $returnItemsDataType = 'array';
  protected $returnShipmentsType = 'Google_Service_ShoppingContent_ReturnShipment';
  protected $returnShipmentsDataType = 'array';

  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  public function getCreationDate()
  {
    return $this->creationDate;
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
  public function setOrderReturnId($orderReturnId)
  {
    $this->orderReturnId = $orderReturnId;
  }
  public function getOrderReturnId()
  {
    return $this->orderReturnId;
  }
  /**
   * @param Google_Service_ShoppingContent_MerchantOrderReturnItem
   */
  public function setReturnItems($returnItems)
  {
    $this->returnItems = $returnItems;
  }
  /**
   * @return Google_Service_ShoppingContent_MerchantOrderReturnItem
   */
  public function getReturnItems()
  {
    return $this->returnItems;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnShipment
   */
  public function setReturnShipments($returnShipments)
  {
    $this->returnShipments = $returnShipments;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnShipment
   */
  public function getReturnShipments()
  {
    return $this->returnShipments;
  }
}
