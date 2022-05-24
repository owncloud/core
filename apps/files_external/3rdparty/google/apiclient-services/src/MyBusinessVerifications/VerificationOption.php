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

namespace Google\Service\MyBusinessVerifications;

class VerificationOption extends \Google\Model
{
  protected $addressDataType = AddressVerificationData::class;
  protected $addressDataDataType = '';
  protected $emailDataType = EmailVerificationData::class;
  protected $emailDataDataType = '';
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $verificationMethod;

  /**
   * @param AddressVerificationData
   */
  public function setAddressData(AddressVerificationData $addressData)
  {
    $this->addressData = $addressData;
  }
  /**
   * @return AddressVerificationData
   */
  public function getAddressData()
  {
    return $this->addressData;
  }
  /**
   * @param EmailVerificationData
   */
  public function setEmailData(EmailVerificationData $emailData)
  {
    $this->emailData = $emailData;
  }
  /**
   * @return EmailVerificationData
   */
  public function getEmailData()
  {
    return $this->emailData;
  }
  /**
   * @param string
   */
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return string
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param string
   */
  public function setVerificationMethod($verificationMethod)
  {
    $this->verificationMethod = $verificationMethod;
  }
  /**
   * @return string
   */
  public function getVerificationMethod()
  {
    return $this->verificationMethod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerificationOption::class, 'Google_Service_MyBusinessVerifications_VerificationOption');
