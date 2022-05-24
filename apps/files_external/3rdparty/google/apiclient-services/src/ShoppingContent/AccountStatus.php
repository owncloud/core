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

class AccountStatus extends \Google\Collection
{
  protected $collection_key = 'products';
  /**
   * @var string
   */
  public $accountId;
  protected $accountLevelIssuesType = AccountStatusAccountLevelIssue::class;
  protected $accountLevelIssuesDataType = 'array';
  /**
   * @var string
   */
  public $accountManagement;
  /**
   * @var string
   */
  public $kind;
  protected $productsType = AccountStatusProducts::class;
  protected $productsDataType = 'array';
  /**
   * @var bool
   */
  public $websiteClaimed;

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
   * @param AccountStatusAccountLevelIssue[]
   */
  public function setAccountLevelIssues($accountLevelIssues)
  {
    $this->accountLevelIssues = $accountLevelIssues;
  }
  /**
   * @return AccountStatusAccountLevelIssue[]
   */
  public function getAccountLevelIssues()
  {
    return $this->accountLevelIssues;
  }
  /**
   * @param string
   */
  public function setAccountManagement($accountManagement)
  {
    $this->accountManagement = $accountManagement;
  }
  /**
   * @return string
   */
  public function getAccountManagement()
  {
    return $this->accountManagement;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param AccountStatusProducts[]
   */
  public function setProducts($products)
  {
    $this->products = $products;
  }
  /**
   * @return AccountStatusProducts[]
   */
  public function getProducts()
  {
    return $this->products;
  }
  /**
   * @param bool
   */
  public function setWebsiteClaimed($websiteClaimed)
  {
    $this->websiteClaimed = $websiteClaimed;
  }
  /**
   * @return bool
   */
  public function getWebsiteClaimed()
  {
    return $this->websiteClaimed;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountStatus::class, 'Google_Service_ShoppingContent_AccountStatus');
