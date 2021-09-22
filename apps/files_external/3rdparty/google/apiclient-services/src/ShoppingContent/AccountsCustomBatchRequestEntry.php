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

class AccountsCustomBatchRequestEntry extends \Google\Collection
{
  protected $collection_key = 'labelIds';
  protected $accountType = Account::class;
  protected $accountDataType = '';
  public $accountId;
  public $batchId;
  public $force;
  public $labelIds;
  protected $linkRequestType = AccountsCustomBatchRequestEntryLinkRequest::class;
  protected $linkRequestDataType = '';
  public $merchantId;
  public $method;
  public $overwrite;
  public $view;

  /**
   * @param Account
   */
  public function setAccount(Account $account)
  {
    $this->account = $account;
  }
  /**
   * @return Account
   */
  public function getAccount()
  {
    return $this->account;
  }
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  public function getBatchId()
  {
    return $this->batchId;
  }
  public function setForce($force)
  {
    $this->force = $force;
  }
  public function getForce()
  {
    return $this->force;
  }
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  public function getLabelIds()
  {
    return $this->labelIds;
  }
  /**
   * @param AccountsCustomBatchRequestEntryLinkRequest
   */
  public function setLinkRequest(AccountsCustomBatchRequestEntryLinkRequest $linkRequest)
  {
    $this->linkRequest = $linkRequest;
  }
  /**
   * @return AccountsCustomBatchRequestEntryLinkRequest
   */
  public function getLinkRequest()
  {
    return $this->linkRequest;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setOverwrite($overwrite)
  {
    $this->overwrite = $overwrite;
  }
  public function getOverwrite()
  {
    return $this->overwrite;
  }
  public function setView($view)
  {
    $this->view = $view;
  }
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsCustomBatchRequestEntry::class, 'Google_Service_ShoppingContent_AccountsCustomBatchRequestEntry');
