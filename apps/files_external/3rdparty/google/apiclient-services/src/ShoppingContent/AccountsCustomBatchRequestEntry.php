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
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $batchId;
  /**
   * @var bool
   */
  public $force;
  /**
   * @var string[]
   */
  public $labelIds;
  protected $linkRequestType = AccountsCustomBatchRequestEntryLinkRequest::class;
  protected $linkRequestDataType = '';
  /**
   * @var string
   */
  public $merchantId;
  /**
   * @var string
   */
  public $method;
  /**
   * @var bool
   */
  public $overwrite;
  /**
   * @var string
   */
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
  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  /**
   * @return string
   */
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param bool
   */
  public function setForce($force)
  {
    $this->force = $force;
  }
  /**
   * @return bool
   */
  public function getForce()
  {
    return $this->force;
  }
  /**
   * @param string[]
   */
  public function setLabelIds($labelIds)
  {
    $this->labelIds = $labelIds;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param bool
   */
  public function setOverwrite($overwrite)
  {
    $this->overwrite = $overwrite;
  }
  /**
   * @return bool
   */
  public function getOverwrite()
  {
    return $this->overwrite;
  }
  /**
   * @param string
   */
  public function setView($view)
  {
    $this->view = $view;
  }
  /**
   * @return string
   */
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsCustomBatchRequestEntry::class, 'Google_Service_ShoppingContent_AccountsCustomBatchRequestEntry');
