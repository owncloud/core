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

class Google_Service_Vault_MailCountResult extends Google_Collection
{
  protected $collection_key = 'nonQueryableAccounts';
  protected $accountCountErrorsType = 'Google_Service_Vault_AccountCountError';
  protected $accountCountErrorsDataType = 'array';
  protected $accountCountsType = 'Google_Service_Vault_AccountCount';
  protected $accountCountsDataType = 'array';
  public $matchingAccountsCount;
  public $nonQueryableAccounts;
  public $queriedAccountsCount;

  /**
   * @param Google_Service_Vault_AccountCountError
   */
  public function setAccountCountErrors($accountCountErrors)
  {
    $this->accountCountErrors = $accountCountErrors;
  }
  /**
   * @return Google_Service_Vault_AccountCountError
   */
  public function getAccountCountErrors()
  {
    return $this->accountCountErrors;
  }
  /**
   * @param Google_Service_Vault_AccountCount
   */
  public function setAccountCounts($accountCounts)
  {
    $this->accountCounts = $accountCounts;
  }
  /**
   * @return Google_Service_Vault_AccountCount
   */
  public function getAccountCounts()
  {
    return $this->accountCounts;
  }
  public function setMatchingAccountsCount($matchingAccountsCount)
  {
    $this->matchingAccountsCount = $matchingAccountsCount;
  }
  public function getMatchingAccountsCount()
  {
    return $this->matchingAccountsCount;
  }
  public function setNonQueryableAccounts($nonQueryableAccounts)
  {
    $this->nonQueryableAccounts = $nonQueryableAccounts;
  }
  public function getNonQueryableAccounts()
  {
    return $this->nonQueryableAccounts;
  }
  public function setQueriedAccountsCount($queriedAccountsCount)
  {
    $this->queriedAccountsCount = $queriedAccountsCount;
  }
  public function getQueriedAccountsCount()
  {
    return $this->queriedAccountsCount;
  }
}
