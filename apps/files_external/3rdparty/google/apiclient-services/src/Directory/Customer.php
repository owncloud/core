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

namespace Google\Service\Directory;

class Customer extends \Google\Model
{
  /**
   * @var string
   */
  public $alternateEmail;
  /**
   * @var string
   */
  public $customerCreationTime;
  /**
   * @var string
   */
  public $customerDomain;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $phoneNumber;
  protected $postalAddressType = CustomerPostalAddress::class;
  protected $postalAddressDataType = '';

  /**
   * @param string
   */
  public function setAlternateEmail($alternateEmail)
  {
    $this->alternateEmail = $alternateEmail;
  }
  /**
   * @return string
   */
  public function getAlternateEmail()
  {
    return $this->alternateEmail;
  }
  /**
   * @param string
   */
  public function setCustomerCreationTime($customerCreationTime)
  {
    $this->customerCreationTime = $customerCreationTime;
  }
  /**
   * @return string
   */
  public function getCustomerCreationTime()
  {
    return $this->customerCreationTime;
  }
  /**
   * @param string
   */
  public function setCustomerDomain($customerDomain)
  {
    $this->customerDomain = $customerDomain;
  }
  /**
   * @return string
   */
  public function getCustomerDomain()
  {
    return $this->customerDomain;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
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
   * @param CustomerPostalAddress
   */
  public function setPostalAddress(CustomerPostalAddress $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  /**
   * @return CustomerPostalAddress
   */
  public function getPostalAddress()
  {
    return $this->postalAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customer::class, 'Google_Service_Directory_Customer');
