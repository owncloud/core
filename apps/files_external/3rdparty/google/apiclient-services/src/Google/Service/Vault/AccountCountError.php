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

class Google_Service_Vault_AccountCountError extends Google_Model
{
  protected $accountType = 'Google_Service_Vault_UserInfo';
  protected $accountDataType = '';
  public $errorType;

  /**
   * @param Google_Service_Vault_UserInfo
   */
  public function setAccount(Google_Service_Vault_UserInfo $account)
  {
    $this->account = $account;
  }
  /**
   * @return Google_Service_Vault_UserInfo
   */
  public function getAccount()
  {
    return $this->account;
  }
  public function setErrorType($errorType)
  {
    $this->errorType = $errorType;
  }
  public function getErrorType()
  {
    return $this->errorType;
  }
}
