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

class Google_Service_ShoppingContent_OrderreturnsProcessRequest extends Google_Collection
{
  protected $collection_key = 'returnItems';
  public $fullChargeReturnShippingCost;
  public $operationId;
  protected $refundShippingFeeType = 'Google_Service_ShoppingContent_OrderreturnsRefundOperation';
  protected $refundShippingFeeDataType = '';
  protected $returnItemsType = 'Google_Service_ShoppingContent_OrderreturnsReturnItem';
  protected $returnItemsDataType = 'array';

  public function setFullChargeReturnShippingCost($fullChargeReturnShippingCost)
  {
    $this->fullChargeReturnShippingCost = $fullChargeReturnShippingCost;
  }
  public function getFullChargeReturnShippingCost()
  {
    return $this->fullChargeReturnShippingCost;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderreturnsRefundOperation
   */
  public function setRefundShippingFee(Google_Service_ShoppingContent_OrderreturnsRefundOperation $refundShippingFee)
  {
    $this->refundShippingFee = $refundShippingFee;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderreturnsRefundOperation
   */
  public function getRefundShippingFee()
  {
    return $this->refundShippingFee;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderreturnsReturnItem[]
   */
  public function setReturnItems($returnItems)
  {
    $this->returnItems = $returnItems;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderreturnsReturnItem[]
   */
  public function getReturnItems()
  {
    return $this->returnItems;
  }
}
