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

class OrderreturnsRefundOperation extends \Google\Model
{
  /**
   * @var bool
   */
  public $fullRefund;
  protected $partialRefundType = OrderreturnsPartialRefund::class;
  protected $partialRefundDataType = '';
  /**
   * @var string
   */
  public $paymentType;
  /**
   * @var string
   */
  public $reasonText;
  /**
   * @var string
   */
  public $returnRefundReason;

  /**
   * @param bool
   */
  public function setFullRefund($fullRefund)
  {
    $this->fullRefund = $fullRefund;
  }
  /**
   * @return bool
   */
  public function getFullRefund()
  {
    return $this->fullRefund;
  }
  /**
   * @param OrderreturnsPartialRefund
   */
  public function setPartialRefund(OrderreturnsPartialRefund $partialRefund)
  {
    $this->partialRefund = $partialRefund;
  }
  /**
   * @return OrderreturnsPartialRefund
   */
  public function getPartialRefund()
  {
    return $this->partialRefund;
  }
  /**
   * @param string
   */
  public function setPaymentType($paymentType)
  {
    $this->paymentType = $paymentType;
  }
  /**
   * @return string
   */
  public function getPaymentType()
  {
    return $this->paymentType;
  }
  /**
   * @param string
   */
  public function setReasonText($reasonText)
  {
    $this->reasonText = $reasonText;
  }
  /**
   * @return string
   */
  public function getReasonText()
  {
    return $this->reasonText;
  }
  /**
   * @param string
   */
  public function setReturnRefundReason($returnRefundReason)
  {
    $this->returnRefundReason = $returnRefundReason;
  }
  /**
   * @return string
   */
  public function getReturnRefundReason()
  {
    return $this->returnRefundReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderreturnsRefundOperation::class, 'Google_Service_ShoppingContent_OrderreturnsRefundOperation');
