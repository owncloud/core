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

class Google_Service_ShoppingContent_ReturnPricingInfo extends Google_Model
{
  public $chargeReturnShippingFee;
  protected $maxReturnShippingFeeType = 'Google_Service_ShoppingContent_MonetaryAmount';
  protected $maxReturnShippingFeeDataType = '';
  protected $refundableItemsTotalAmountType = 'Google_Service_ShoppingContent_MonetaryAmount';
  protected $refundableItemsTotalAmountDataType = '';
  protected $refundableShippingAmountType = 'Google_Service_ShoppingContent_MonetaryAmount';
  protected $refundableShippingAmountDataType = '';
  protected $totalRefundedAmountType = 'Google_Service_ShoppingContent_MonetaryAmount';
  protected $totalRefundedAmountDataType = '';

  public function setChargeReturnShippingFee($chargeReturnShippingFee)
  {
    $this->chargeReturnShippingFee = $chargeReturnShippingFee;
  }
  public function getChargeReturnShippingFee()
  {
    return $this->chargeReturnShippingFee;
  }
  /**
   * @param Google_Service_ShoppingContent_MonetaryAmount
   */
  public function setMaxReturnShippingFee(Google_Service_ShoppingContent_MonetaryAmount $maxReturnShippingFee)
  {
    $this->maxReturnShippingFee = $maxReturnShippingFee;
  }
  /**
   * @return Google_Service_ShoppingContent_MonetaryAmount
   */
  public function getMaxReturnShippingFee()
  {
    return $this->maxReturnShippingFee;
  }
  /**
   * @param Google_Service_ShoppingContent_MonetaryAmount
   */
  public function setRefundableItemsTotalAmount(Google_Service_ShoppingContent_MonetaryAmount $refundableItemsTotalAmount)
  {
    $this->refundableItemsTotalAmount = $refundableItemsTotalAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_MonetaryAmount
   */
  public function getRefundableItemsTotalAmount()
  {
    return $this->refundableItemsTotalAmount;
  }
  /**
   * @param Google_Service_ShoppingContent_MonetaryAmount
   */
  public function setRefundableShippingAmount(Google_Service_ShoppingContent_MonetaryAmount $refundableShippingAmount)
  {
    $this->refundableShippingAmount = $refundableShippingAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_MonetaryAmount
   */
  public function getRefundableShippingAmount()
  {
    return $this->refundableShippingAmount;
  }
  /**
   * @param Google_Service_ShoppingContent_MonetaryAmount
   */
  public function setTotalRefundedAmount(Google_Service_ShoppingContent_MonetaryAmount $totalRefundedAmount)
  {
    $this->totalRefundedAmount = $totalRefundedAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_MonetaryAmount
   */
  public function getTotalRefundedAmount()
  {
    return $this->totalRefundedAmount;
  }
}
