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

class OrderTrackingSignalLineItemDetails extends \Google\Model
{
  public $brand;
  public $gtin;
  public $lineItemId;
  public $mpn;
  public $productDescription;
  public $productId;
  public $productTitle;
  public $quantity;
  public $sku;
  public $upc;

  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  public function getGtin()
  {
    return $this->gtin;
  }
  public function setLineItemId($lineItemId)
  {
    $this->lineItemId = $lineItemId;
  }
  public function getLineItemId()
  {
    return $this->lineItemId;
  }
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  public function getMpn()
  {
    return $this->mpn;
  }
  public function setProductDescription($productDescription)
  {
    $this->productDescription = $productDescription;
  }
  public function getProductDescription()
  {
    return $this->productDescription;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setProductTitle($productTitle)
  {
    $this->productTitle = $productTitle;
  }
  public function getProductTitle()
  {
    return $this->productTitle;
  }
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  public function getQuantity()
  {
    return $this->quantity;
  }
  public function setSku($sku)
  {
    $this->sku = $sku;
  }
  public function getSku()
  {
    return $this->sku;
  }
  public function setUpc($upc)
  {
    $this->upc = $upc;
  }
  public function getUpc()
  {
    return $this->upc;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderTrackingSignalLineItemDetails::class, 'Google_Service_ShoppingContent_OrderTrackingSignalLineItemDetails');
