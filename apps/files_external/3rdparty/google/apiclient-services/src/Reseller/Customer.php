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

namespace Google\Service\Reseller;

class Customer extends \Google\Model
{
  /**
   * @var string
   */
  public $alternateEmail;
  /**
   * @var string
   */
  public $customerDomain;
  /**
   * @var bool
   */
  public $customerDomainVerified;
  /**
   * @var string
   */
  public $customerId;
  /**
   * @var string
   */
  public $customerType;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $phoneNumber;
  protected $postalAddressType = Address::class;
  protected $postalAddressDataType = '';
  protected $primaryAdminType = PrimaryAdmin::class;
  protected $primaryAdminDataType = '';
  /**
   * @var string
   */
  public $resourceUiUrl;

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
   * @param bool
   */
  public function setCustomerDomainVerified($customerDomainVerified)
  {
    $this->customerDomainVerified = $customerDomainVerified;
  }
  /**
   * @return bool
   */
  public function getCustomerDomainVerified()
  {
    return $this->customerDomainVerified;
  }
  /**
   * @param string
   */
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  /**
   * @return string
   */
  public function getCustomerId()
  {
    return $this->customerId;
  }
  /**
   * @param string
   */
  public function setCustomerType($customerType)
  {
    $this->customerType = $customerType;
  }
  /**
   * @return string
   */
  public function getCustomerType()
  {
    return $this->customerType;
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
   * @param Address
   */
  public function setPostalAddress(Address $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  /**
   * @return Address
   */
  public function getPostalAddress()
  {
    return $this->postalAddress;
  }
  /**
   * @param PrimaryAdmin
   */
  public function setPrimaryAdmin(PrimaryAdmin $primaryAdmin)
  {
    $this->primaryAdmin = $primaryAdmin;
  }
  /**
   * @return PrimaryAdmin
   */
  public function getPrimaryAdmin()
  {
    return $this->primaryAdmin;
  }
  /**
   * @param string
   */
  public function setResourceUiUrl($resourceUiUrl)
  {
    $this->resourceUiUrl = $resourceUiUrl;
  }
  /**
   * @return string
   */
  public function getResourceUiUrl()
  {
    return $this->resourceUiUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customer::class, 'Google_Service_Reseller_Customer');
