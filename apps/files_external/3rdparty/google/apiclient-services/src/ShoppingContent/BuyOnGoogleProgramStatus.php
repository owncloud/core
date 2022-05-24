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
  /**
   * @var string[]
   */
  public $businessModel;
  /**
   * @var string
   */
  public $customerServicePendingEmail;
  /**
   * @var string
   */
  public $customerServicePendingPhoneNumber;
  /**
   * @var string
   */
  public $customerServicePendingPhoneRegionCode;
  /**
   * @var string
   */
  public $customerServiceVerifiedEmail;
  /**
   * @var string
   */
  public $customerServiceVerifiedPhoneNumber;
  /**
   * @var string
   */
  public $customerServiceVerifiedPhoneRegionCode;
  /**
   * @var string
   */
  public $onlineSalesChannel;
  /**
   * @var string
   */
  public $participationStage;

  /**
   * @param string[]
   */
  public function setBusinessModel($businessModel)
  {
    $this->businessModel = $businessModel;
  }
  /**
   * @return string[]
   */
  public function getBusinessModel()
  {
    return $this->businessModel;
  }
  /**
   * @param string
   */
  public function setCustomerServicePendingEmail($customerServicePendingEmail)
  {
    $this->customerServicePendingEmail = $customerServicePendingEmail;
  }
  /**
   * @return string
   */
  public function getCustomerServicePendingEmail()
  {
    return $this->customerServicePendingEmail;
  }
  /**
   * @param string
   */
  public function setCustomerServicePendingPhoneNumber($customerServicePendingPhoneNumber)
  {
    $this->customerServicePendingPhoneNumber = $customerServicePendingPhoneNumber;
  }
  /**
   * @return string
   */
  public function getCustomerServicePendingPhoneNumber()
  {
    return $this->customerServicePendingPhoneNumber;
  }
  /**
   * @param string
   */
  public function setCustomerServicePendingPhoneRegionCode($customerServicePendingPhoneRegionCode)
  {
    $this->customerServicePendingPhoneRegionCode = $customerServicePendingPhoneRegionCode;
  }
  /**
   * @return string
   */
  public function getCustomerServicePendingPhoneRegionCode()
  {
    return $this->customerServicePendingPhoneRegionCode;
  }
  /**
   * @param string
   */
  public function setCustomerServiceVerifiedEmail($customerServiceVerifiedEmail)
  {
    $this->customerServiceVerifiedEmail = $customerServiceVerifiedEmail;
  }
  /**
   * @return string
   */
  public function getCustomerServiceVerifiedEmail()
  {
    return $this->customerServiceVerifiedEmail;
  }
  /**
   * @param string
   */
  public function setCustomerServiceVerifiedPhoneNumber($customerServiceVerifiedPhoneNumber)
  {
    $this->customerServiceVerifiedPhoneNumber = $customerServiceVerifiedPhoneNumber;
  }
  /**
   * @return string
   */
  public function getCustomerServiceVerifiedPhoneNumber()
  {
    return $this->customerServiceVerifiedPhoneNumber;
  }
  /**
   * @param string
   */
  public function setCustomerServiceVerifiedPhoneRegionCode($customerServiceVerifiedPhoneRegionCode)
  {
    $this->customerServiceVerifiedPhoneRegionCode = $customerServiceVerifiedPhoneRegionCode;
  }
  /**
   * @return string
   */
  public function getCustomerServiceVerifiedPhoneRegionCode()
  {
    return $this->customerServiceVerifiedPhoneRegionCode;
  }
  /**
   * @param string
   */
  public function setOnlineSalesChannel($onlineSalesChannel)
  {
    $this->onlineSalesChannel = $onlineSalesChannel;
  }
  /**
   * @return string
   */
  public function getOnlineSalesChannel()
  {
    return $this->onlineSalesChannel;
  }
  /**
   * @param string
   */
  public function setParticipationStage($participationStage)
  {
    $this->participationStage = $participationStage;
  }
  /**
   * @return string
   */
  public function getParticipationStage()
  {
    return $this->participationStage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyOnGoogleProgramStatus::class, 'Google_Service_ShoppingContent_BuyOnGoogleProgramStatus');
