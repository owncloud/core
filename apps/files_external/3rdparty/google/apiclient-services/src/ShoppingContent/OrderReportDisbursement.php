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

class OrderReportDisbursement extends \Google\Model
{
  protected $disbursementAmountType = Price::class;
  protected $disbursementAmountDataType = '';
  /**
   * @var string
   */
  public $disbursementCreationDate;
  /**
   * @var string
   */
  public $disbursementDate;
  /**
   * @var string
   */
  public $disbursementId;
  /**
   * @var string
   */
  public $merchantId;

  /**
   * @param Price
   */
  public function setDisbursementAmount(Price $disbursementAmount)
  {
    $this->disbursementAmount = $disbursementAmount;
  }
  /**
   * @return Price
   */
  public function getDisbursementAmount()
  {
    return $this->disbursementAmount;
  }
  /**
   * @param string
   */
  public function setDisbursementCreationDate($disbursementCreationDate)
  {
    $this->disbursementCreationDate = $disbursementCreationDate;
  }
  /**
   * @return string
   */
  public function getDisbursementCreationDate()
  {
    return $this->disbursementCreationDate;
  }
  /**
   * @param string
   */
  public function setDisbursementDate($disbursementDate)
  {
    $this->disbursementDate = $disbursementDate;
  }
  /**
   * @return string
   */
  public function getDisbursementDate()
  {
    return $this->disbursementDate;
  }
  /**
   * @param string
   */
  public function setDisbursementId($disbursementId)
  {
    $this->disbursementId = $disbursementId;
  }
  /**
   * @return string
   */
  public function getDisbursementId()
  {
    return $this->disbursementId;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderReportDisbursement::class, 'Google_Service_ShoppingContent_OrderReportDisbursement');
