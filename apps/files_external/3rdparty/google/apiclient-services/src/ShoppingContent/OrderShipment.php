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

class OrderShipment extends \Google\Collection
{
  protected $collection_key = 'lineItems';
  /**
   * @var string
   */
  public $carrier;
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
  public $id;
  protected $lineItemsType = OrderShipmentLineItemShipment::class;
  protected $lineItemsDataType = 'array';
  protected $scheduledDeliveryDetailsType = OrderShipmentScheduledDeliveryDetails::class;
  protected $scheduledDeliveryDetailsDataType = '';
  /**
   * @var string
   */
  public $shipmentGroupId;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $trackingId;

  /**
   * @param string
   */
  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  /**
   * @return string
   */
  public function getCarrier()
  {
    return $this->carrier;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param OrderShipmentLineItemShipment[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return OrderShipmentLineItemShipment[]
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  /**
   * @param OrderShipmentScheduledDeliveryDetails
   */
  public function setScheduledDeliveryDetails(OrderShipmentScheduledDeliveryDetails $scheduledDeliveryDetails)
  {
    $this->scheduledDeliveryDetails = $scheduledDeliveryDetails;
  }
  /**
   * @return OrderShipmentScheduledDeliveryDetails
   */
  public function getScheduledDeliveryDetails()
  {
    return $this->scheduledDeliveryDetails;
  }
  /**
   * @param string
   */
  public function setShipmentGroupId($shipmentGroupId)
  {
    $this->shipmentGroupId = $shipmentGroupId;
  }
  /**
   * @return string
   */
  public function getShipmentGroupId()
  {
    return $this->shipmentGroupId;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTrackingId($trackingId)
  {
    $this->trackingId = $trackingId;
  }
  /**
   * @return string
   */
  public function getTrackingId()
  {
    return $this->trackingId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderShipment::class, 'Google_Service_ShoppingContent_OrderShipment');
