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
  /**
   * @var string
   */
  public $brand;
  /**
   * @var string
   */
  public $gtin;
  /**
   * @var string
   */
  public $lineItemId;
  /**
   * @var string
   */
  public $mpn;
  /**
   * @var string
   */
  public $productDescription;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var string
   */
  public $productTitle;
  /**
   * @var string
   */
  public $quantity;
  /**
   * @var string
   */
  public $sku;
  /**
   * @var string
   */
  public $upc;

  /**
   * @param string
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param string
   */
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  /**
   * @return string
   */
  public function getGtin()
  {
    return $this->gtin;
  }
  /**
   * @param string
   */
  public function setLineItemId($lineItemId)
  {
    $this->lineItemId = $lineItemId;
  }
  /**
   * @return string
   */
  public function getLineItemId()
  {
    return $this->lineItemId;
  }
  /**
   * @param string
   */
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  /**
   * @return string
   */
  public function getMpn()
  {
    return $this->mpn;
  }
  /**
   * @param string
   */
  public function setProductDescription($productDescription)
  {
    $this->productDescription = $productDescription;
  }
  /**
   * @return string
   */
  public function getProductDescription()
  {
    return $this->productDescription;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param string
   */
  public function setProductTitle($productTitle)
  {
    $this->productTitle = $productTitle;
  }
  /**
   * @return string
   */
  public function getProductTitle()
  {
    return $this->productTitle;
  }
  /**
   * @param string
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return string
   */
  public function getQuantity()
  {
    return $this->quantity;
  }
  /**
   * @param string
   */
  public function setSku($sku)
  {
    $this->sku = $sku;
  }
  /**
   * @return string
   */
  public function getSku()
  {
    return $this->sku;
  }
  /**
   * @param string
   */
  public function setUpc($upc)
  {
    $this->upc = $upc;
  }
  /**
   * @return string
   */
  public function getUpc()
  {
    return $this->upc;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderTrackingSignalLineItemDetails::class, 'Google_Service_ShoppingContent_OrderTrackingSignalLineItemDetails');
