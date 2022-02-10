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

class ReturnPricingInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $chargeReturnShippingFee;
  protected $maxReturnShippingFeeType = MonetaryAmount::class;
  protected $maxReturnShippingFeeDataType = '';
  protected $refundableItemsTotalAmountType = MonetaryAmount::class;
  protected $refundableItemsTotalAmountDataType = '';
  protected $refundableShippingAmountType = MonetaryAmount::class;
  protected $refundableShippingAmountDataType = '';
  protected $totalRefundedAmountType = MonetaryAmount::class;
  protected $totalRefundedAmountDataType = '';

  /**
   * @param bool
   */
  public function setChargeReturnShippingFee($chargeReturnShippingFee)
  {
    $this->chargeReturnShippingFee = $chargeReturnShippingFee;
  }
  /**
   * @return bool
   */
  public function getChargeReturnShippingFee()
  {
    return $this->chargeReturnShippingFee;
  }
  /**
   * @param MonetaryAmount
   */
  public function setMaxReturnShippingFee(MonetaryAmount $maxReturnShippingFee)
  {
    $this->maxReturnShippingFee = $maxReturnShippingFee;
  }
  /**
   * @return MonetaryAmount
   */
  public function getMaxReturnShippingFee()
  {
    return $this->maxReturnShippingFee;
  }
  /**
   * @param MonetaryAmount
   */
  public function setRefundableItemsTotalAmount(MonetaryAmount $refundableItemsTotalAmount)
  {
    $this->refundableItemsTotalAmount = $refundableItemsTotalAmount;
  }
  /**
   * @return MonetaryAmount
   */
  public function getRefundableItemsTotalAmount()
  {
    return $this->refundableItemsTotalAmount;
  }
  /**
   * @param MonetaryAmount
   */
  public function setRefundableShippingAmount(MonetaryAmount $refundableShippingAmount)
  {
    $this->refundableShippingAmount = $refundableShippingAmount;
  }
  /**
   * @return MonetaryAmount
   */
  public function getRefundableShippingAmount()
  {
    return $this->refundableShippingAmount;
  }
  /**
   * @param MonetaryAmount
   */
  public function setTotalRefundedAmount(MonetaryAmount $totalRefundedAmount)
  {
    $this->totalRefundedAmount = $totalRefundedAmount;
  }
  /**
   * @return MonetaryAmount
   */
  public function getTotalRefundedAmount()
  {
    return $this->totalRefundedAmount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReturnPricingInfo::class, 'Google_Service_ShoppingContent_ReturnPricingInfo');
