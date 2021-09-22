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

class AccountReturnCarrier extends \Google\Model
{
  public $carrierAccountId;
  public $carrierAccountName;
  public $carrierAccountNumber;
  public $carrierCode;

  public function setCarrierAccountId($carrierAccountId)
  {
    $this->carrierAccountId = $carrierAccountId;
  }
  public function getCarrierAccountId()
  {
    return $this->carrierAccountId;
  }
  public function setCarrierAccountName($carrierAccountName)
  {
    $this->carrierAccountName = $carrierAccountName;
  }
  public function getCarrierAccountName()
  {
    return $this->carrierAccountName;
  }
  public function setCarrierAccountNumber($carrierAccountNumber)
  {
    $this->carrierAccountNumber = $carrierAccountNumber;
  }
  public function getCarrierAccountNumber()
  {
    return $this->carrierAccountNumber;
  }
  public function setCarrierCode($carrierCode)
  {
    $this->carrierCode = $carrierCode;
  }
  public function getCarrierCode()
  {
    return $this->carrierCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountReturnCarrier::class, 'Google_Service_ShoppingContent_AccountReturnCarrier');
