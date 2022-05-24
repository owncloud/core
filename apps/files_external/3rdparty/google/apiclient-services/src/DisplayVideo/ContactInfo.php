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

class ContactInfo extends \Google\Collection
{
  protected $collection_key = 'zipCodes';
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string[]
   */
  public $hashedEmails;
  /**
   * @var string
   */
  public $hashedFirstName;
  /**
   * @var string
   */
  public $hashedLastName;
  /**
   * @var string[]
   */
  public $hashedPhoneNumbers;
  /**
   * @var string[]
   */
  public $zipCodes;

  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string[]
   */
  public function setHashedEmails($hashedEmails)
  {
    $this->hashedEmails = $hashedEmails;
  }
  /**
   * @return string[]
   */
  public function getHashedEmails()
  {
    return $this->hashedEmails;
  }
  /**
   * @param string
   */
  public function setHashedFirstName($hashedFirstName)
  {
    $this->hashedFirstName = $hashedFirstName;
  }
  /**
   * @return string
   */
  public function getHashedFirstName()
  {
    return $this->hashedFirstName;
  }
  /**
   * @param string
   */
  public function setHashedLastName($hashedLastName)
  {
    $this->hashedLastName = $hashedLastName;
  }
  /**
   * @return string
   */
  public function getHashedLastName()
  {
    return $this->hashedLastName;
  }
  /**
   * @param string[]
   */
  public function setHashedPhoneNumbers($hashedPhoneNumbers)
  {
    $this->hashedPhoneNumbers = $hashedPhoneNumbers;
  }
  /**
   * @return string[]
   */
  public function getHashedPhoneNumbers()
  {
    return $this->hashedPhoneNumbers;
  }
  /**
   * @param string[]
   */
  public function setZipCodes($zipCodes)
  {
    $this->zipCodes = $zipCodes;
  }
  /**
   * @return string[]
   */
  public function getZipCodes()
  {
    return $this->zipCodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactInfo::class, 'Google_Service_DisplayVideo_ContactInfo');
