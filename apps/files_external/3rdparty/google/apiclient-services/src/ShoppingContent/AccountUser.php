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

class AccountUser extends \Google\Model
{
  /**
   * @var bool
   */
  public $admin;
  /**
   * @var string
   */
  public $emailAddress;
  /**
   * @var bool
   */
  public $orderManager;
  /**
   * @var bool
   */
  public $paymentsAnalyst;
  /**
   * @var bool
   */
  public $paymentsManager;

  /**
   * @param bool
   */
  public function setAdmin($admin)
  {
    $this->admin = $admin;
  }
  /**
   * @return bool
   */
  public function getAdmin()
  {
    return $this->admin;
  }
  /**
   * @param string
   */
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  /**
   * @return string
   */
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  /**
   * @param bool
   */
  public function setOrderManager($orderManager)
  {
    $this->orderManager = $orderManager;
  }
  /**
   * @return bool
   */
  public function getOrderManager()
  {
    return $this->orderManager;
  }
  /**
   * @param bool
   */
  public function setPaymentsAnalyst($paymentsAnalyst)
  {
    $this->paymentsAnalyst = $paymentsAnalyst;
  }
  /**
   * @return bool
   */
  public function getPaymentsAnalyst()
  {
    return $this->paymentsAnalyst;
  }
  /**
   * @param bool
   */
  public function setPaymentsManager($paymentsManager)
  {
    $this->paymentsManager = $paymentsManager;
  }
  /**
   * @return bool
   */
  public function getPaymentsManager()
  {
    return $this->paymentsManager;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountUser::class, 'Google_Service_ShoppingContent_AccountUser');
