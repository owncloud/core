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

namespace Google\Service\TagManager;

class ListAccountsResponse extends \Google\Collection
{
  protected $collection_key = 'account';
  protected $accountType = Account::class;
  protected $accountDataType = 'array';
  public $nextPageToken;

  /**
   * @param Account[]
   */
  public function setAccount($account)
  {
    $this->account = $account;
  }
  /**
   * @return Account[]
   */
  public function getAccount()
  {
    return $this->account;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListAccountsResponse::class, 'Google_Service_TagManager_ListAccountsResponse');
