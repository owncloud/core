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

class Google_Service_ShoppingContent_AccountUser extends Google_Model
{
  public $admin;
  public $emailAddress;
  public $orderManager;
  public $paymentsAnalyst;
  public $paymentsManager;

  public function setAdmin($admin)
  {
    $this->admin = $admin;
  }
  public function getAdmin()
  {
    return $this->admin;
  }
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  public function setOrderManager($orderManager)
  {
    $this->orderManager = $orderManager;
  }
  public function getOrderManager()
  {
    return $this->orderManager;
  }
  public function setPaymentsAnalyst($paymentsAnalyst)
  {
    $this->paymentsAnalyst = $paymentsAnalyst;
  }
  public function getPaymentsAnalyst()
  {
    return $this->paymentsAnalyst;
  }
  public function setPaymentsManager($paymentsManager)
  {
    $this->paymentsManager = $paymentsManager;
  }
  public function getPaymentsManager()
  {
    return $this->paymentsManager;
  }
}
