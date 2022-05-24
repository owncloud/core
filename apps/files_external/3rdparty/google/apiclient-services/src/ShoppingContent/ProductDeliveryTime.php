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

class ProductDeliveryTime extends \Google\Collection
{
  protected $collection_key = 'areaDeliveryTimes';
  protected $areaDeliveryTimesType = ProductDeliveryTimeAreaDeliveryTime::class;
  protected $areaDeliveryTimesDataType = 'array';
  protected $productIdType = ProductId::class;
  protected $productIdDataType = '';

  /**
   * @param ProductDeliveryTimeAreaDeliveryTime[]
   */
  public function setAreaDeliveryTimes($areaDeliveryTimes)
  {
    $this->areaDeliveryTimes = $areaDeliveryTimes;
  }
  /**
   * @return ProductDeliveryTimeAreaDeliveryTime[]
   */
  public function getAreaDeliveryTimes()
  {
    return $this->areaDeliveryTimes;
  }
  /**
   * @param ProductId
   */
  public function setProductId(ProductId $productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return ProductId
   */
  public function getProductId()
  {
    return $this->productId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductDeliveryTime::class, 'Google_Service_ShoppingContent_ProductDeliveryTime');
