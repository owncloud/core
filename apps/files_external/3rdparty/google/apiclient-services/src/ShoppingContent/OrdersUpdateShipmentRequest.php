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

class OrdersUpdateShipmentRequest extends \Google\Model
{
  public $carrier;
  public $deliveryDate;
  public $lastPickupDate;
  public $operationId;
  public $readyPickupDate;
  protected $scheduledDeliveryDetailsType = OrdersCustomBatchRequestEntryUpdateShipmentScheduledDeliveryDetails::class;
  protected $scheduledDeliveryDetailsDataType = '';
  public $shipmentId;
  public $status;
  public $trackingId;
  public $undeliveredDate;

  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  public function getCarrier()
  {
    return $this->carrier;
  }
  public function setDeliveryDate($deliveryDate)
  {
    $this->deliveryDate = $deliveryDate;
  }
  public function getDeliveryDate()
  {
    return $this->deliveryDate;
  }
  public function setLastPickupDate($lastPickupDate)
  {
    $this->lastPickupDate = $lastPickupDate;
  }
  public function getLastPickupDate()
  {
    return $this->lastPickupDate;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  public function setReadyPickupDate($readyPickupDate)
  {
    $this->readyPickupDate = $readyPickupDate;
  }
  public function getReadyPickupDate()
  {
    return $this->readyPickupDate;
  }
  /**
   * @param OrdersCustomBatchRequestEntryUpdateShipmentScheduledDeliveryDetails
   */
  public function setScheduledDeliveryDetails(OrdersCustomBatchRequestEntryUpdateShipmentScheduledDeliveryDetails $scheduledDeliveryDetails)
  {
    $this->scheduledDeliveryDetails = $scheduledDeliveryDetails;
  }
  /**
   * @return OrdersCustomBatchRequestEntryUpdateShipmentScheduledDeliveryDetails
   */
  public function getScheduledDeliveryDetails()
  {
    return $this->scheduledDeliveryDetails;
  }
  public function setShipmentId($shipmentId)
  {
    $this->shipmentId = $shipmentId;
  }
  public function getShipmentId()
  {
    return $this->shipmentId;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTrackingId($trackingId)
  {
    $this->trackingId = $trackingId;
  }
  public function getTrackingId()
  {
    return $this->trackingId;
  }
  public function setUndeliveredDate($undeliveredDate)
  {
    $this->undeliveredDate = $undeliveredDate;
  }
  public function getUndeliveredDate()
  {
    return $this->undeliveredDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrdersUpdateShipmentRequest::class, 'Google_Service_ShoppingContent_OrdersUpdateShipmentRequest');
