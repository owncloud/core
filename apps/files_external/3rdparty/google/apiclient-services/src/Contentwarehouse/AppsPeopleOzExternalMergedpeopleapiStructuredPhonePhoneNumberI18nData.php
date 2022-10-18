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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData extends \Google\Model
{
  /**
   * @var int
   */
  public $countryCode;
  /**
   * @var string
   */
  public $internationalNumber;
  /**
   * @var bool
   */
  public $isValid;
  /**
   * @var string
   */
  public $nationalNumber;
  /**
   * @var string
   */
  public $regionCode;
  /**
   * @var string
   */
  public $validationResult;

  /**
   * @param int
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return int
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setInternationalNumber($internationalNumber)
  {
    $this->internationalNumber = $internationalNumber;
  }
  /**
   * @return string
   */
  public function getInternationalNumber()
  {
    return $this->internationalNumber;
  }
  /**
   * @param bool
   */
  public function setIsValid($isValid)
  {
    $this->isValid = $isValid;
  }
  /**
   * @return bool
   */
  public function getIsValid()
  {
    return $this->isValid;
  }
  /**
   * @param string
   */
  public function setNationalNumber($nationalNumber)
  {
    $this->nationalNumber = $nationalNumber;
  }
  /**
   * @return string
   */
  public function getNationalNumber()
  {
    return $this->nationalNumber;
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
  /**
   * @param string
   */
  public function setValidationResult($validationResult)
  {
    $this->validationResult = $validationResult;
  }
  /**
   * @return string
   */
  public function getValidationResult()
  {
    return $this->validationResult;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData');
