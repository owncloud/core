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

class I18nPhonenumbersPhoneNumber extends \Google\Model
{
  /**
   * @var int
   */
  public $countryCode;
  /**
   * @var string
   */
  public $countryCodeSource;
  /**
   * @var string
   */
  public $extension;
  /**
   * @var bool
   */
  public $italianLeadingZero;
  /**
   * @var string
   */
  public $nationalNumber;
  /**
   * @var int
   */
  public $numberOfLeadingZeros;
  /**
   * @var string
   */
  public $preferredDomesticCarrierCode;
  /**
   * @var string
   */
  public $rawInput;

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
  public function setCountryCodeSource($countryCodeSource)
  {
    $this->countryCodeSource = $countryCodeSource;
  }
  /**
   * @return string
   */
  public function getCountryCodeSource()
  {
    return $this->countryCodeSource;
  }
  /**
   * @param string
   */
  public function setExtension($extension)
  {
    $this->extension = $extension;
  }
  /**
   * @return string
   */
  public function getExtension()
  {
    return $this->extension;
  }
  /**
   * @param bool
   */
  public function setItalianLeadingZero($italianLeadingZero)
  {
    $this->italianLeadingZero = $italianLeadingZero;
  }
  /**
   * @return bool
   */
  public function getItalianLeadingZero()
  {
    return $this->italianLeadingZero;
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
   * @param int
   */
  public function setNumberOfLeadingZeros($numberOfLeadingZeros)
  {
    $this->numberOfLeadingZeros = $numberOfLeadingZeros;
  }
  /**
   * @return int
   */
  public function getNumberOfLeadingZeros()
  {
    return $this->numberOfLeadingZeros;
  }
  /**
   * @param string
   */
  public function setPreferredDomesticCarrierCode($preferredDomesticCarrierCode)
  {
    $this->preferredDomesticCarrierCode = $preferredDomesticCarrierCode;
  }
  /**
   * @return string
   */
  public function getPreferredDomesticCarrierCode()
  {
    return $this->preferredDomesticCarrierCode;
  }
  /**
   * @param string
   */
  public function setRawInput($rawInput)
  {
    $this->rawInput = $rawInput;
  }
  /**
   * @return string
   */
  public function getRawInput()
  {
    return $this->rawInput;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(I18nPhonenumbersPhoneNumber::class, 'Google_Service_Contentwarehouse_I18nPhonenumbersPhoneNumber');
