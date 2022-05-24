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

class Metrics extends \Google\Model
{
  public $aos;
  public $aovMicros;
  /**
   * @var string
   */
  public $clicks;
  public $conversionRate;
  /**
   * @var string
   */
  public $conversionValueMicros;
  public $conversions;
  public $ctr;
  public $daysToShip;
  /**
   * @var string
   */
  public $impressions;
  public $itemDaysToShip;
  public $itemFillRate;
  /**
   * @var string
   */
  public $orderedItemSalesMicros;
  /**
   * @var string
   */
  public $orderedItems;
  /**
   * @var string
   */
  public $orders;
  /**
   * @var string
   */
  public $rejectedItems;
  public $returnRate;
  /**
   * @var string
   */
  public $returnedItems;
  /**
   * @var string
   */
  public $returnsMicros;
  /**
   * @var string
   */
  public $shippedItemSalesMicros;
  /**
   * @var string
   */
  public $shippedItems;
  /**
   * @var string
   */
  public $shippedOrders;
  public $unshippedItems;
  public $unshippedOrders;

  public function setAos($aos)
  {
    $this->aos = $aos;
  }
  public function getAos()
  {
    return $this->aos;
  }
  public function setAovMicros($aovMicros)
  {
    $this->aovMicros = $aovMicros;
  }
  public function getAovMicros()
  {
    return $this->aovMicros;
  }
  /**
   * @param string
   */
  public function setClicks($clicks)
  {
    $this->clicks = $clicks;
  }
  /**
   * @return string
   */
  public function getClicks()
  {
    return $this->clicks;
  }
  public function setConversionRate($conversionRate)
  {
    $this->conversionRate = $conversionRate;
  }
  public function getConversionRate()
  {
    return $this->conversionRate;
  }
  /**
   * @param string
   */
  public function setConversionValueMicros($conversionValueMicros)
  {
    $this->conversionValueMicros = $conversionValueMicros;
  }
  /**
   * @return string
   */
  public function getConversionValueMicros()
  {
    return $this->conversionValueMicros;
  }
  public function setConversions($conversions)
  {
    $this->conversions = $conversions;
  }
  public function getConversions()
  {
    return $this->conversions;
  }
  public function setCtr($ctr)
  {
    $this->ctr = $ctr;
  }
  public function getCtr()
  {
    return $this->ctr;
  }
  public function setDaysToShip($daysToShip)
  {
    $this->daysToShip = $daysToShip;
  }
  public function getDaysToShip()
  {
    return $this->daysToShip;
  }
  /**
   * @param string
   */
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  /**
   * @return string
   */
  public function getImpressions()
  {
    return $this->impressions;
  }
  public function setItemDaysToShip($itemDaysToShip)
  {
    $this->itemDaysToShip = $itemDaysToShip;
  }
  public function getItemDaysToShip()
  {
    return $this->itemDaysToShip;
  }
  public function setItemFillRate($itemFillRate)
  {
    $this->itemFillRate = $itemFillRate;
  }
  public function getItemFillRate()
  {
    return $this->itemFillRate;
  }
  /**
   * @param string
   */
  public function setOrderedItemSalesMicros($orderedItemSalesMicros)
  {
    $this->orderedItemSalesMicros = $orderedItemSalesMicros;
  }
  /**
   * @return string
   */
  public function getOrderedItemSalesMicros()
  {
    return $this->orderedItemSalesMicros;
  }
  /**
   * @param string
   */
  public function setOrderedItems($orderedItems)
  {
    $this->orderedItems = $orderedItems;
  }
  /**
   * @return string
   */
  public function getOrderedItems()
  {
    return $this->orderedItems;
  }
  /**
   * @param string
   */
  public function setOrders($orders)
  {
    $this->orders = $orders;
  }
  /**
   * @return string
   */
  public function getOrders()
  {
    return $this->orders;
  }
  /**
   * @param string
   */
  public function setRejectedItems($rejectedItems)
  {
    $this->rejectedItems = $rejectedItems;
  }
  /**
   * @return string
   */
  public function getRejectedItems()
  {
    return $this->rejectedItems;
  }
  public function setReturnRate($returnRate)
  {
    $this->returnRate = $returnRate;
  }
  public function getReturnRate()
  {
    return $this->returnRate;
  }
  /**
   * @param string
   */
  public function setReturnedItems($returnedItems)
  {
    $this->returnedItems = $returnedItems;
  }
  /**
   * @return string
   */
  public function getReturnedItems()
  {
    return $this->returnedItems;
  }
  /**
   * @param string
   */
  public function setReturnsMicros($returnsMicros)
  {
    $this->returnsMicros = $returnsMicros;
  }
  /**
   * @return string
   */
  public function getReturnsMicros()
  {
    return $this->returnsMicros;
  }
  /**
   * @param string
   */
  public function setShippedItemSalesMicros($shippedItemSalesMicros)
  {
    $this->shippedItemSalesMicros = $shippedItemSalesMicros;
  }
  /**
   * @return string
   */
  public function getShippedItemSalesMicros()
  {
    return $this->shippedItemSalesMicros;
  }
  /**
   * @param string
   */
  public function setShippedItems($shippedItems)
  {
    $this->shippedItems = $shippedItems;
  }
  /**
   * @return string
   */
  public function getShippedItems()
  {
    return $this->shippedItems;
  }
  /**
   * @param string
   */
  public function setShippedOrders($shippedOrders)
  {
    $this->shippedOrders = $shippedOrders;
  }
  /**
   * @return string
   */
  public function getShippedOrders()
  {
    return $this->shippedOrders;
  }
  public function setUnshippedItems($unshippedItems)
  {
    $this->unshippedItems = $unshippedItems;
  }
  public function getUnshippedItems()
  {
    return $this->unshippedItems;
  }
  public function setUnshippedOrders($unshippedOrders)
  {
    $this->unshippedOrders = $unshippedOrders;
  }
  public function getUnshippedOrders()
  {
    return $this->unshippedOrders;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metrics::class, 'Google_Service_ShoppingContent_Metrics');
