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
  public $clicks;
  public $ctr;
  public $daysToShip;
  public $impressions;
  public $itemDaysToShip;
  public $itemFillRate;
  public $orderedItemSalesMicros;
  public $orderedItems;
  public $orders;
  public $rejectedItems;
  public $returnRate;
  public $returnedItems;
  public $returnsMicros;
  public $shippedItemSalesMicros;
  public $shippedItems;
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
  public function setClicks($clicks)
  {
    $this->clicks = $clicks;
  }
  public function getClicks()
  {
    return $this->clicks;
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
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
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
  public function setOrderedItemSalesMicros($orderedItemSalesMicros)
  {
    $this->orderedItemSalesMicros = $orderedItemSalesMicros;
  }
  public function getOrderedItemSalesMicros()
  {
    return $this->orderedItemSalesMicros;
  }
  public function setOrderedItems($orderedItems)
  {
    $this->orderedItems = $orderedItems;
  }
  public function getOrderedItems()
  {
    return $this->orderedItems;
  }
  public function setOrders($orders)
  {
    $this->orders = $orders;
  }
  public function getOrders()
  {
    return $this->orders;
  }
  public function setRejectedItems($rejectedItems)
  {
    $this->rejectedItems = $rejectedItems;
  }
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
  public function setReturnedItems($returnedItems)
  {
    $this->returnedItems = $returnedItems;
  }
  public function getReturnedItems()
  {
    return $this->returnedItems;
  }
  public function setReturnsMicros($returnsMicros)
  {
    $this->returnsMicros = $returnsMicros;
  }
  public function getReturnsMicros()
  {
    return $this->returnsMicros;
  }
  public function setShippedItemSalesMicros($shippedItemSalesMicros)
  {
    $this->shippedItemSalesMicros = $shippedItemSalesMicros;
  }
  public function getShippedItemSalesMicros()
  {
    return $this->shippedItemSalesMicros;
  }
  public function setShippedItems($shippedItems)
  {
    $this->shippedItems = $shippedItems;
  }
  public function getShippedItems()
  {
    return $this->shippedItems;
  }
  public function setShippedOrders($shippedOrders)
  {
    $this->shippedOrders = $shippedOrders;
  }
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
