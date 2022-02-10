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

namespace Google\Service\Vault;

class HeldAccount extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $firstName;
  /**
   * @var string
   */
  public $holdTime;
  /**
   * @var string
   */
  public $lastName;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
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
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }
  /**
   * @param string
   */
  public function setHoldTime($holdTime)
  {
    $this->holdTime = $holdTime;
  }
  /**
   * @return string
   */
  public function getHoldTime()
  {
    return $this->holdTime;
  }
  /**
   * @param string
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HeldAccount::class, 'Google_Service_Vault_HeldAccount');
