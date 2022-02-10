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

namespace Google\Service\DisplayVideo;

class PartnerCost extends \Google\Model
{
  /**
   * @var string
   */
  public $costType;
  /**
   * @var string
   */
  public $feeAmount;
  /**
   * @var string
   */
  public $feePercentageMillis;
  /**
   * @var string
   */
  public $feeType;
  /**
   * @var string
   */
  public $invoiceType;

  /**
   * @param string
   */
  public function setCostType($costType)
  {
    $this->costType = $costType;
  }
  /**
   * @return string
   */
  public function getCostType()
  {
    return $this->costType;
  }
  /**
   * @param string
   */
  public function setFeeAmount($feeAmount)
  {
    $this->feeAmount = $feeAmount;
  }
  /**
   * @return string
   */
  public function getFeeAmount()
  {
    return $this->feeAmount;
  }
  /**
   * @param string
   */
  public function setFeePercentageMillis($feePercentageMillis)
  {
    $this->feePercentageMillis = $feePercentageMillis;
  }
  /**
   * @return string
   */
  public function getFeePercentageMillis()
  {
    return $this->feePercentageMillis;
  }
  /**
   * @param string
   */
  public function setFeeType($feeType)
  {
    $this->feeType = $feeType;
  }
  /**
   * @return string
   */
  public function getFeeType()
  {
    return $this->feeType;
  }
  /**
   * @param string
   */
  public function setInvoiceType($invoiceType)
  {
    $this->invoiceType = $invoiceType;
  }
  /**
   * @return string
   */
  public function getInvoiceType()
  {
    return $this->invoiceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnerCost::class, 'Google_Service_DisplayVideo_PartnerCost');
