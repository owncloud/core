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

class Google_Service_ShoppingContent_OrderreturnsReturnItem extends Google_Model
{
  protected $refundType = 'Google_Service_ShoppingContent_OrderreturnsRefundOperation';
  protected $refundDataType = '';
  protected $rejectType = 'Google_Service_ShoppingContent_OrderreturnsRejectOperation';
  protected $rejectDataType = '';
  public $returnItemId;

  /**
   * @param Google_Service_ShoppingContent_OrderreturnsRefundOperation
   */
  public function setRefund(Google_Service_ShoppingContent_OrderreturnsRefundOperation $refund)
  {
    $this->refund = $refund;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderreturnsRefundOperation
   */
  public function getRefund()
  {
    return $this->refund;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderreturnsRejectOperation
   */
  public function setReject(Google_Service_ShoppingContent_OrderreturnsRejectOperation $reject)
  {
    $this->reject = $reject;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderreturnsRejectOperation
   */
  public function getReject()
  {
    return $this->reject;
  }
  public function setReturnItemId($returnItemId)
  {
    $this->returnItemId = $returnItemId;
  }
  public function getReturnItemId()
  {
    return $this->returnItemId;
  }
}
