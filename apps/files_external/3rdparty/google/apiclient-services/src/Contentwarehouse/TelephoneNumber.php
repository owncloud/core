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

class TelephoneNumber extends \Google\Collection
{
  protected $collection_key = 'number';
  /**
   * @var string
   */
  public $areaCode;
  /**
   * @var int
   */
  public $countryCode;
  /**
   * @var string
   */
  public $extension;
  /**
   * @var string
   */
  public $nationalPrefix;
  /**
   * @var string[]
   */
  public $number;

  /**
   * @param string
   */
  public function setAreaCode($areaCode)
  {
    $this->areaCode = $areaCode;
  }
  /**
   * @return string
   */
  public function getAreaCode()
  {
    return $this->areaCode;
  }
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
   * @param string
   */
  public function setNationalPrefix($nationalPrefix)
  {
    $this->nationalPrefix = $nationalPrefix;
  }
  /**
   * @return string
   */
  public function getNationalPrefix()
  {
    return $this->nationalPrefix;
  }
  /**
   * @param string[]
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return string[]
   */
  public function getNumber()
  {
    return $this->number;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TelephoneNumber::class, 'Google_Service_Contentwarehouse_TelephoneNumber');
