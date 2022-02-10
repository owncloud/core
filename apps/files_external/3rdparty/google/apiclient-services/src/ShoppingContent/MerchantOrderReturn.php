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

class MerchantOrderReturn extends \Google\Collection
{
  protected $collection_key = 'returnShipments';
  /**
   * @var string
   */
  public $creationDate;
  /**
   * @var string
   */
  public $merchantOrderId;
  /**
   * @var string
   */
  public $orderId;
  /**
   * @var string
   */
  public $orderReturnId;
  protected $returnItemsType = MerchantOrderReturnItem::class;
  protected $returnItemsDataType = 'array';
  protected $returnPricingInfoType = ReturnPricingInfo::class;
  protected $returnPricingInfoDataType = '';
  protected $returnShipmentsType = ReturnShipment::class;
  protected $returnShipmentsDataType = 'array';

  /**
   * @param string
   */
  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  /**
   * @return string
   */
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  /**
   * @param string
   */
  public function setMerchantOrderId($merchantOrderId)
  {
    $this->merchantOrderId = $merchantOrderId;
  }
  /**
   * @return string
   */
  public function getMerchantOrderId()
  {
    return $this->merchantOrderId;
  }
  /**
   * @param string
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  /**
   * @return string
   */
  public function getOrderId()
  {
    return $this->orderId;
  }
  /**
   * @param string
   */
  public function setOrderReturnId($orderReturnId)
  {
    $this->orderReturnId = $orderReturnId;
  }
  /**
   * @return string
   */
  public function getOrderReturnId()
  {
    return $this->orderReturnId;
  }
  /**
   * @param MerchantOrderReturnItem[]
   */
  public function setReturnItems($returnItems)
  {
    $this->returnItems = $returnItems;
  }
  /**
   * @return MerchantOrderReturnItem[]
   */
  public function getReturnItems()
  {
    return $this->returnItems;
  }
  /**
   * @param ReturnPricingInfo
   */
  public function setReturnPricingInfo(ReturnPricingInfo $returnPricingInfo)
  {
    $this->returnPricingInfo = $returnPricingInfo;
  }
  /**
   * @return ReturnPricingInfo
   */
  public function getReturnPricingInfo()
  {
    return $this->returnPricingInfo;
  }
  /**
   * @param ReturnShipment[]
   */
  public function setReturnShipments($returnShipments)
  {
    $this->returnShipments = $returnShipments;
  }
  /**
   * @return ReturnShipment[]
   */
  public function getReturnShipments()
  {
    return $this->returnShipments;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MerchantOrderReturn::class, 'Google_Service_ShoppingContent_MerchantOrderReturn');
