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

class ProductDeliveryTimeAreaDeliveryTime extends \Google\Model
{
  protected $deliveryAreaType = DeliveryArea::class;
  protected $deliveryAreaDataType = '';
  protected $deliveryTimeType = ProductDeliveryTimeAreaDeliveryTimeDeliveryTime::class;
  protected $deliveryTimeDataType = '';

  /**
   * @param DeliveryArea
   */
  public function setDeliveryArea(DeliveryArea $deliveryArea)
  {
    $this->deliveryArea = $deliveryArea;
  }
  /**
   * @return DeliveryArea
   */
  public function getDeliveryArea()
  {
    return $this->deliveryArea;
  }
  /**
   * @param ProductDeliveryTimeAreaDeliveryTimeDeliveryTime
   */
  public function setDeliveryTime(ProductDeliveryTimeAreaDeliveryTimeDeliveryTime $deliveryTime)
  {
    $this->deliveryTime = $deliveryTime;
  }
  /**
   * @return ProductDeliveryTimeAreaDeliveryTimeDeliveryTime
   */
  public function getDeliveryTime()
  {
    return $this->deliveryTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductDeliveryTimeAreaDeliveryTime::class, 'Google_Service_ShoppingContent_ProductDeliveryTimeAreaDeliveryTime');
