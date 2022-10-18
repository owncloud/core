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

namespace Google\Service\CloudSearch;

class PhoneAccess extends \Google\Model
{
  /**
   * @var string
   */
  public $formattedPhoneNumber;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $pin;
  /**
   * @var string
   */
  public $regionCode;

  /**
   * @param string
   */
  public function setFormattedPhoneNumber($formattedPhoneNumber)
  {
    $this->formattedPhoneNumber = $formattedPhoneNumber;
  }
  /**
   * @return string
   */
  public function getFormattedPhoneNumber()
  {
    return $this->formattedPhoneNumber;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
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
  public function setPin($pin)
  {
    $this->pin = $pin;
  }
  /**
   * @return string
   */
  public function getPin()
  {
    return $this->pin;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhoneAccess::class, 'Google_Service_CloudSearch_PhoneAccess');
