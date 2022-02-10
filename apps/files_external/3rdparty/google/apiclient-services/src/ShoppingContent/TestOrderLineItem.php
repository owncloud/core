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

class TestOrderLineItem extends \Google\Model
{
  protected $productType = TestOrderLineItemProduct::class;
  protected $productDataType = '';
  /**
   * @var string
   */
  public $quantityOrdered;
  protected $returnInfoType = OrderLineItemReturnInfo::class;
  protected $returnInfoDataType = '';
  protected $shippingDetailsType = OrderLineItemShippingDetails::class;
  protected $shippingDetailsDataType = '';

  /**
   * @param TestOrderLineItemProduct
   */
  public function setProduct(TestOrderLineItemProduct $product)
  {
    $this->product = $product;
  }
  /**
   * @return TestOrderLineItemProduct
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param string
   */
  public function setQuantityOrdered($quantityOrdered)
  {
    $this->quantityOrdered = $quantityOrdered;
  }
  /**
   * @return string
   */
  public function getQuantityOrdered()
  {
    return $this->quantityOrdered;
  }
  /**
   * @param OrderLineItemReturnInfo
   */
  public function setReturnInfo(OrderLineItemReturnInfo $returnInfo)
  {
    $this->returnInfo = $returnInfo;
  }
  /**
   * @return OrderLineItemReturnInfo
   */
  public function getReturnInfo()
  {
    return $this->returnInfo;
  }
  /**
   * @param OrderLineItemShippingDetails
   */
  public function setShippingDetails(OrderLineItemShippingDetails $shippingDetails)
  {
    $this->shippingDetails = $shippingDetails;
  }
  /**
   * @return OrderLineItemShippingDetails
   */
  public function getShippingDetails()
  {
    return $this->shippingDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestOrderLineItem::class, 'Google_Service_ShoppingContent_TestOrderLineItem');
