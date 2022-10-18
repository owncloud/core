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

class ImageExifIPTCMetadataContactInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $address;
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $phone;
  /**
   * @var string
   */
  public $postalCode;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $webUrl;

  /**
   * @param string
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return string
   */
  public function getAddress()
  {
    return $this->address;
  }
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
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  /**
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
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
  public function setWebUrl($webUrl)
  {
    $this->webUrl = $webUrl;
  }
  /**
   * @return string
   */
  public function getWebUrl()
  {
    return $this->webUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageExifIPTCMetadataContactInfo::class, 'Google_Service_Contentwarehouse_ImageExifIPTCMetadataContactInfo');
