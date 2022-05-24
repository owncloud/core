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

class OrderPromotionItem extends \Google\Model
{
  /**
   * @var string
   */
  public $lineItemId;
  /**
   * @var string
   */
  public $offerId;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var int
   */
  public $quantity;

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
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  /**
   * @return string
   */
  public function getOfferId()
  {
    return $this->offerId;
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
   * @param int
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return int
   */
  public function getQuantity()
  {
    return $this->quantity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderPromotionItem::class, 'Google_Service_ShoppingContent_OrderPromotionItem');
