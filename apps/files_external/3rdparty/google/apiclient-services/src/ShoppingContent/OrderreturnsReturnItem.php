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

class OrderreturnsReturnItem extends \Google\Model
{
  protected $refundType = OrderreturnsRefundOperation::class;
  protected $refundDataType = '';
  protected $rejectType = OrderreturnsRejectOperation::class;
  protected $rejectDataType = '';
  /**
   * @var string
   */
  public $returnItemId;

  /**
   * @param OrderreturnsRefundOperation
   */
  public function setRefund(OrderreturnsRefundOperation $refund)
  {
    $this->refund = $refund;
  }
  /**
   * @return OrderreturnsRefundOperation
   */
  public function getRefund()
  {
    return $this->refund;
  }
  /**
   * @param OrderreturnsRejectOperation
   */
  public function setReject(OrderreturnsRejectOperation $reject)
  {
    $this->reject = $reject;
  }
  /**
   * @return OrderreturnsRejectOperation
   */
  public function getReject()
  {
    return $this->reject;
  }
  /**
   * @param string
   */
  public function setReturnItemId($returnItemId)
  {
    $this->returnItemId = $returnItemId;
  }
  /**
   * @return string
   */
  public function getReturnItemId()
  {
    return $this->returnItemId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderreturnsReturnItem::class, 'Google_Service_ShoppingContent_OrderreturnsReturnItem');
