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

class Service extends \Google\Collection
{
  protected $collection_key = 'rateGroups';
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $currency;
  /**
   * @var string
   */
  public $deliveryCountry;
  protected $deliveryTimeType = DeliveryTime::class;
  protected $deliveryTimeDataType = '';
  /**
   * @var string
   */
  public $eligibility;
  protected $minimumOrderValueType = Price::class;
  protected $minimumOrderValueDataType = '';
  protected $minimumOrderValueTableType = MinimumOrderValueTable::class;
  protected $minimumOrderValueTableDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pickupServiceType = PickupCarrierService::class;
  protected $pickupServiceDataType = '';
  protected $rateGroupsType = RateGroup::class;
  protected $rateGroupsDataType = 'array';
  /**
   * @var string
   */
  public $shipmentType;

  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param string
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  /**
   * @return string
   */
  public function getCurrency()
  {
    return $this->currency;
  }
  /**
   * @param string
   */
  public function setDeliveryCountry($deliveryCountry)
  {
    $this->deliveryCountry = $deliveryCountry;
  }
  /**
   * @return string
   */
  public function getDeliveryCountry()
  {
    return $this->deliveryCountry;
  }
  /**
   * @param DeliveryTime
   */
  public function setDeliveryTime(DeliveryTime $deliveryTime)
  {
    $this->deliveryTime = $deliveryTime;
  }
  /**
   * @return DeliveryTime
   */
  public function getDeliveryTime()
  {
    return $this->deliveryTime;
  }
  /**
   * @param string
   */
  public function setEligibility($eligibility)
  {
    $this->eligibility = $eligibility;
  }
  /**
   * @return string
   */
  public function getEligibility()
  {
    return $this->eligibility;
  }
  /**
   * @param Price
   */
  public function setMinimumOrderValue(Price $minimumOrderValue)
  {
    $this->minimumOrderValue = $minimumOrderValue;
  }
  /**
   * @return Price
   */
  public function getMinimumOrderValue()
  {
    return $this->minimumOrderValue;
  }
  /**
   * @param MinimumOrderValueTable
   */
  public function setMinimumOrderValueTable(MinimumOrderValueTable $minimumOrderValueTable)
  {
    $this->minimumOrderValueTable = $minimumOrderValueTable;
  }
  /**
   * @return MinimumOrderValueTable
   */
  public function getMinimumOrderValueTable()
  {
    return $this->minimumOrderValueTable;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PickupCarrierService
   */
  public function setPickupService(PickupCarrierService $pickupService)
  {
    $this->pickupService = $pickupService;
  }
  /**
   * @return PickupCarrierService
   */
  public function getPickupService()
  {
    return $this->pickupService;
  }
  /**
   * @param RateGroup[]
   */
  public function setRateGroups($rateGroups)
  {
    $this->rateGroups = $rateGroups;
  }
  /**
   * @return RateGroup[]
   */
  public function getRateGroups()
  {
    return $this->rateGroups;
  }
  /**
   * @param string
   */
  public function setShipmentType($shipmentType)
  {
    $this->shipmentType = $shipmentType;
  }
  /**
   * @return string
   */
  public function getShipmentType()
  {
    return $this->shipmentType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Service::class, 'Google_Service_ShoppingContent_Service');
