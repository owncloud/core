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

namespace Google\Service\CivicInfo;

class SimpleAddressType extends \Google\Model
{
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $line1;
  /**
   * @var string
   */
  public $line2;
  /**
   * @var string
   */
  public $line3;
  /**
   * @var string
   */
  public $locationName;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $zip;

  /**
   * @param string
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }
  /**
   * @param string
   */
  public function setLine1($line1)
  {
    $this->line1 = $line1;
  }
  /**
   * @return string
   */
  public function getLine1()
  {
    return $this->line1;
  }
  /**
   * @param string
   */
  public function setLine2($line2)
  {
    $this->line2 = $line2;
  }
  /**
   * @return string
   */
  public function getLine2()
  {
    return $this->line2;
  }
  /**
   * @param string
   */
  public function setLine3($line3)
  {
    $this->line3 = $line3;
  }
  /**
   * @return string
   */
  public function getLine3()
  {
    return $this->line3;
  }
  /**
   * @param string
   */
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  /**
   * @return string
   */
  public function getLocationName()
  {
    return $this->locationName;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setZip($zip)
  {
    $this->zip = $zip;
  }
  /**
   * @return string
   */
  public function getZip()
  {
    return $this->zip;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SimpleAddressType::class, 'Google_Service_CivicInfo_SimpleAddressType');
