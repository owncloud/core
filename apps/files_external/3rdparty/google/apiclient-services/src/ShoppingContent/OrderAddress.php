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

class OrderAddress extends \Google\Collection
{
  protected $collection_key = 'streetAddress';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string[]
   */
  public $fullAddress;
  /**
   * @var bool
   */
  public $isPostOfficeBox;
  /**
   * @var string
   */
  public $locality;
  /**
   * @var string
   */
  public $postalCode;
  /**
   * @var string
   */
  public $recipientName;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string[]
   */
  public $streetAddress;

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string[]
   */
  public function setFullAddress($fullAddress)
  {
    $this->fullAddress = $fullAddress;
  }
  /**
   * @return string[]
   */
  public function getFullAddress()
  {
    return $this->fullAddress;
  }
  /**
   * @param bool
   */
  public function setIsPostOfficeBox($isPostOfficeBox)
  {
    $this->isPostOfficeBox = $isPostOfficeBox;
  }
  /**
   * @return bool
   */
  public function getIsPostOfficeBox()
  {
    return $this->isPostOfficeBox;
  }
  /**
   * @param string
   */
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return string
   */
  public function getLocality()
  {
    return $this->locality;
  }
  /**
   * @param string
   */
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  /**
   * @return string
   */
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  /**
   * @param string
   */
  public function setRecipientName($recipientName)
  {
    $this->recipientName = $recipientName;
  }
  /**
   * @return string
   */
  public function getRecipientName()
  {
    return $this->recipientName;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string[]
   */
  public function setStreetAddress($streetAddress)
  {
    $this->streetAddress = $streetAddress;
  }
  /**
   * @return string[]
   */
  public function getStreetAddress()
  {
    return $this->streetAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderAddress::class, 'Google_Service_ShoppingContent_OrderAddress');
