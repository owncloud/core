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

class AppsPeopleOzExternalMergedpeopleapiCustomerInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $customerId;
  /**
   * @var string
   */
  public $customerName;
  /**
   * @var string
   */
  public $obfuscatedCustomerId;

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
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  /**
   * @return string
   */
  public function getCustomerName()
  {
    return $this->customerName;
  }
  /**
   * @param string
   */
  public function setObfuscatedCustomerId($obfuscatedCustomerId)
  {
    $this->obfuscatedCustomerId = $obfuscatedCustomerId;
  }
  /**
   * @return string
   */
  public function getObfuscatedCustomerId()
  {
    return $this->obfuscatedCustomerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiCustomerInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiCustomerInfo');
