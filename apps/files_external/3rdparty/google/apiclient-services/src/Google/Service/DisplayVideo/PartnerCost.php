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

class Google_Service_DisplayVideo_PartnerCost extends Google_Model
{
  public $costType;
  public $feeAmount;
  public $feePercentageMillis;
  public $feeType;
  public $invoiceType;

  public function setCostType($costType)
  {
    $this->costType = $costType;
  }
  public function getCostType()
  {
    return $this->costType;
  }
  public function setFeeAmount($feeAmount)
  {
    $this->feeAmount = $feeAmount;
  }
  public function getFeeAmount()
  {
    return $this->feeAmount;
  }
  public function setFeePercentageMillis($feePercentageMillis)
  {
    $this->feePercentageMillis = $feePercentageMillis;
  }
  public function getFeePercentageMillis()
  {
    return $this->feePercentageMillis;
  }
  public function setFeeType($feeType)
  {
    $this->feeType = $feeType;
  }
  public function getFeeType()
  {
    return $this->feeType;
  }
  public function setInvoiceType($invoiceType)
  {
    $this->invoiceType = $invoiceType;
  }
  public function getInvoiceType()
  {
    return $this->invoiceType;
  }
}
