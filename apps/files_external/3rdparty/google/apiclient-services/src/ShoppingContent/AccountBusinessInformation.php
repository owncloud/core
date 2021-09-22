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

class AccountBusinessInformation extends \Google\Model
{
  protected $addressType = AccountAddress::class;
  protected $addressDataType = '';
  protected $customerServiceType = AccountCustomerService::class;
  protected $customerServiceDataType = '';
  public $koreanBusinessRegistrationNumber;
  public $phoneNumber;

  /**
   * @param AccountAddress
   */
  public function setAddress(AccountAddress $address)
  {
    $this->address = $address;
  }
  /**
   * @return AccountAddress
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param AccountCustomerService
   */
  public function setCustomerService(AccountCustomerService $customerService)
  {
    $this->customerService = $customerService;
  }
  /**
   * @return AccountCustomerService
   */
  public function getCustomerService()
  {
    return $this->customerService;
  }
  public function setKoreanBusinessRegistrationNumber($koreanBusinessRegistrationNumber)
  {
    $this->koreanBusinessRegistrationNumber = $koreanBusinessRegistrationNumber;
  }
  public function getKoreanBusinessRegistrationNumber()
  {
    return $this->koreanBusinessRegistrationNumber;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountBusinessInformation::class, 'Google_Service_ShoppingContent_AccountBusinessInformation');
