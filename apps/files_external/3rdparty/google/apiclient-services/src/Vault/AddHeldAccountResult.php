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

class AddHeldAccountResult extends \Google\Model
{
  protected $accountType = HeldAccount::class;
  protected $accountDataType = '';
  protected $statusType = Status::class;
  protected $statusDataType = '';

  /**
   * @param HeldAccount
   */
  public function setAccount(HeldAccount $account)
  {
    $this->account = $account;
  }
  /**
   * @return HeldAccount
   */
  public function getAccount()
  {
    return $this->account;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddHeldAccountResult::class, 'Google_Service_Vault_AddHeldAccountResult');
