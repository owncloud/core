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

class BuyOnGoogleProgramStatus extends \Google\Collection
{
  protected $collection_key = 'businessModel';
  public $businessModel;
  public $customerServicePendingEmail;
  public $customerServicePendingPhoneNumber;
  public $customerServicePendingPhoneRegionCode;
  public $customerServiceVerifiedEmail;
  public $customerServiceVerifiedPhoneNumber;
  public $customerServiceVerifiedPhoneRegionCode;
  public $onlineSalesChannel;
  public $participationStage;

  public function setBusinessModel($businessModel)
  {
    $this->businessModel = $businessModel;
  }
  public function getBusinessModel()
  {
    return $this->businessModel;
  }
  public function setCustomerServicePendingEmail($customerServicePendingEmail)
  {
    $this->customerServicePendingEmail = $customerServicePendingEmail;
  }
  public function getCustomerServicePendingEmail()
  {
    return $this->customerServicePendingEmail;
  }
  public function setCustomerServicePendingPhoneNumber($customerServicePendingPhoneNumber)
  {
    $this->customerServicePendingPhoneNumber = $customerServicePendingPhoneNumber;
  }
  public function getCustomerServicePendingPhoneNumber()
  {
    return $this->customerServicePendingPhoneNumber;
  }
  public function setCustomerServicePendingPhoneRegionCode($customerServicePendingPhoneRegionCode)
  {
    $this->customerServicePendingPhoneRegionCode = $customerServicePendingPhoneRegionCode;
  }
  public function getCustomerServicePendingPhoneRegionCode()
  {
    return $this->customerServicePendingPhoneRegionCode;
  }
  public function setCustomerServiceVerifiedEmail($customerServiceVerifiedEmail)
  {
    $this->customerServiceVerifiedEmail = $customerServiceVerifiedEmail;
  }
  public function getCustomerServiceVerifiedEmail()
  {
    return $this->customerServiceVerifiedEmail;
  }
  public function setCustomerServiceVerifiedPhoneNumber($customerServiceVerifiedPhoneNumber)
  {
    $this->customerServiceVerifiedPhoneNumber = $customerServiceVerifiedPhoneNumber;
  }
  public function getCustomerServiceVerifiedPhoneNumber()
  {
    return $this->customerServiceVerifiedPhoneNumber;
  }
  public function setCustomerServiceVerifiedPhoneRegionCode($customerServiceVerifiedPhoneRegionCode)
  {
    $this->customerServiceVerifiedPhoneRegionCode = $customerServiceVerifiedPhoneRegionCode;
  }
  public function getCustomerServiceVerifiedPhoneRegionCode()
  {
    return $this->customerServiceVerifiedPhoneRegionCode;
  }
  public function setOnlineSalesChannel($onlineSalesChannel)
  {
    $this->onlineSalesChannel = $onlineSalesChannel;
  }
  public function getOnlineSalesChannel()
  {
    return $this->onlineSalesChannel;
  }
  public function setParticipationStage($participationStage)
  {
    $this->participationStage = $participationStage;
  }
  public function getParticipationStage()
  {
    return $this->participationStage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyOnGoogleProgramStatus::class, 'Google_Service_ShoppingContent_BuyOnGoogleProgramStatus');
