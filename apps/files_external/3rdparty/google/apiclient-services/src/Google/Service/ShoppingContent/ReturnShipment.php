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

class Google_Service_ShoppingContent_ReturnShipment extends Google_Collection
{
  protected $collection_key = 'shipmentTrackingInfos';
  public $creationDate;
  public $deliveryDate;
  public $returnMethodType;
  public $shipmentId;
  protected $shipmentTrackingInfosType = 'Google_Service_ShoppingContent_ShipmentTrackingInfo';
  protected $shipmentTrackingInfosDataType = 'array';
  public $shippingDate;
  public $state;

  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  public function setDeliveryDate($deliveryDate)
  {
    $this->deliveryDate = $deliveryDate;
  }
  public function getDeliveryDate()
  {
    return $this->deliveryDate;
  }
  public function setReturnMethodType($returnMethodType)
  {
    $this->returnMethodType = $returnMethodType;
  }
  public function getReturnMethodType()
  {
    return $this->returnMethodType;
  }
  public function setShipmentId($shipmentId)
  {
    $this->shipmentId = $shipmentId;
  }
  public function getShipmentId()
  {
    return $this->shipmentId;
  }
  /**
   * @param Google_Service_ShoppingContent_ShipmentTrackingInfo[]
   */
  public function setShipmentTrackingInfos($shipmentTrackingInfos)
  {
    $this->shipmentTrackingInfos = $shipmentTrackingInfos;
  }
  /**
   * @return Google_Service_ShoppingContent_ShipmentTrackingInfo[]
   */
  public function getShipmentTrackingInfos()
  {
    return $this->shipmentTrackingInfos;
  }
  public function setShippingDate($shippingDate)
  {
    $this->shippingDate = $shippingDate;
  }
  public function getShippingDate()
  {
    return $this->shippingDate;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
