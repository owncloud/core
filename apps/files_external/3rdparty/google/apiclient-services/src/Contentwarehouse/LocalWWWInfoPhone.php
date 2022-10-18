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

class LocalWWWInfoPhone extends \Google\Model
{
  /**
   * @var string
   */
  public $phoneFprint;
  protected $phoneNumberType = TelephoneNumber::class;
  protected $phoneNumberDataType = '';

  /**
   * @param string
   */
  public function setPhoneFprint($phoneFprint)
  {
    $this->phoneFprint = $phoneFprint;
  }
  /**
   * @return string
   */
  public function getPhoneFprint()
  {
    return $this->phoneFprint;
  }
  /**
   * @param TelephoneNumber
   */
  public function setPhoneNumber(TelephoneNumber $phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return TelephoneNumber
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalWWWInfoPhone::class, 'Google_Service_Contentwarehouse_LocalWWWInfoPhone');
