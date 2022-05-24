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

namespace Google\Service\AdSenseHost;

class AssociationSession extends \Google\Collection
{
  protected $collection_key = 'productCodes';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $productCodes;
  /**
   * @var string
   */
  public $redirectUrl;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $userLocale;
  /**
   * @var string
   */
  public $websiteLocale;
  /**
   * @var string
   */
  public $websiteUrl;

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
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
   * @param string[]
   */
  public function setProductCodes($productCodes)
  {
    $this->productCodes = $productCodes;
  }
  /**
   * @return string[]
   */
  public function getProductCodes()
  {
    return $this->productCodes;
  }
  /**
   * @param string
   */
  public function setRedirectUrl($redirectUrl)
  {
    $this->redirectUrl = $redirectUrl;
  }
  /**
   * @return string
   */
  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUserLocale($userLocale)
  {
    $this->userLocale = $userLocale;
  }
  /**
   * @return string
   */
  public function getUserLocale()
  {
    return $this->userLocale;
  }
  /**
   * @param string
   */
  public function setWebsiteLocale($websiteLocale)
  {
    $this->websiteLocale = $websiteLocale;
  }
  /**
   * @return string
   */
  public function getWebsiteLocale()
  {
    return $this->websiteLocale;
  }
  /**
   * @param string
   */
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  /**
   * @return string
   */
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssociationSession::class, 'Google_Service_AdSenseHost_AssociationSession');
