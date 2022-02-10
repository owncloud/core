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

class ReturnShipment extends \Google\Collection
{
  protected $collection_key = 'shipmentTrackingInfos';
  /**
   * @var string
   */
  public $creationDate;
  /**
   * @var string
   */
  public $deliveryDate;
  /**
   * @var string
   */
  public $returnMethodType;
  /**
   * @var string
   */
  public $shipmentId;
  protected $shipmentTrackingInfosType = ShipmentTrackingInfo::class;
  protected $shipmentTrackingInfosDataType = 'array';
  /**
   * @var string
   */
  public $shippingDate;
  /**
   * @var string
   */
  public $state;

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
  public function setDeliveryDate($deliveryDate)
  {
    $this->deliveryDate = $deliveryDate;
  }
  /**
   * @return string
   */
  public function getDeliveryDate()
  {
    return $this->deliveryDate;
  }
  /**
   * @param string
   */
  public function setReturnMethodType($returnMethodType)
  {
    $this->returnMethodType = $returnMethodType;
  }
  /**
   * @return string
   */
  public function getReturnMethodType()
  {
    return $this->returnMethodType;
  }
  /**
   * @param string
   */
  public function setShipmentId($shipmentId)
  {
    $this->shipmentId = $shipmentId;
  }
  /**
   * @return string
   */
  public function getShipmentId()
  {
    return $this->shipmentId;
  }
  /**
   * @param ShipmentTrackingInfo[]
   */
  public function setShipmentTrackingInfos($shipmentTrackingInfos)
  {
    $this->shipmentTrackingInfos = $shipmentTrackingInfos;
  }
  /**
   * @return ShipmentTrackingInfo[]
   */
  public function getShipmentTrackingInfos()
  {
    return $this->shipmentTrackingInfos;
  }
  /**
   * @param string
   */
  public function setShippingDate($shippingDate)
  {
    $this->shippingDate = $shippingDate;
  }
  /**
   * @return string
   */
  public function getShippingDate()
  {
    return $this->shippingDate;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReturnShipment::class, 'Google_Service_ShoppingContent_ReturnShipment');
