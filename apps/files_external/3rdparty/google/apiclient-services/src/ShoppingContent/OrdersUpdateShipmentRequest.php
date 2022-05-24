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
  /**
   * @var string
   */
  public $carrier;
  /**
   * @var string
   */
  public $deliveryDate;
  /**
   * @var string
   */
  public $lastPickupDate;
  /**
   * @var string
   */
  public $operationId;
  /**
   * @var string
   */
  public $readyPickupDate;
  protected $scheduledDeliveryDetailsType = OrdersCustomBatchRequestEntryUpdateShipmentScheduledDeliveryDetails::class;
  protected $scheduledDeliveryDetailsDataType = '';
  /**
   * @var string
   */
  public $shipmentId;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $trackingId;
  /**
   * @var string
   */
  public $undeliveredDate;

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
  public function setLastPickupDate($lastPickupDate)
  {
    $this->lastPickupDate = $lastPickupDate;
  }
  /**
   * @return string
   */
  public function getLastPickupDate()
  {
    return $this->lastPickupDate;
  }
  /**
   * @param string
   */
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  /**
   * @return string
   */
  public function getOperationId()
  {
    return $this->operationId;
  }
  /**
   * @param string
   */
  public function setReadyPickupDate($readyPickupDate)
  {
    $this->readyPickupDate = $readyPickupDate;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setUndeliveredDate($undeliveredDate)
  {
    $this->undeliveredDate = $undeliveredDate;
  }
  /**
   * @return string
   */
  public function getUndeliveredDate()
  {
    return $this->undeliveredDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrdersUpdateShipmentRequest::class, 'Google_Service_ShoppingContent_OrdersUpdateShipmentRequest');
