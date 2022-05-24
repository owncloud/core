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

namespace Google\Service\Dfareporting;

class AccountActiveAdSummary extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $activeAds;
  /**
   * @var string
   */
  public $activeAdsLimitTier;
  /**
   * @var string
   */
  public $availableAds;
  /**
   * @var string
   */
  public $kind;

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
  public function setActiveAds($activeAds)
  {
    $this->activeAds = $activeAds;
  }
  /**
   * @return string
   */
  public function getActiveAds()
  {
    return $this->activeAds;
  }
  /**
   * @param string
   */
  public function setActiveAdsLimitTier($activeAdsLimitTier)
  {
    $this->activeAdsLimitTier = $activeAdsLimitTier;
  }
  /**
   * @return string
   */
  public function getActiveAdsLimitTier()
  {
    return $this->activeAdsLimitTier;
  }
  /**
   * @param string
   */
  public function setAvailableAds($availableAds)
  {
    $this->availableAds = $availableAds;
  }
  /**
   * @return string
   */
  public function getAvailableAds()
  {
    return $this->availableAds;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountActiveAdSummary::class, 'Google_Service_Dfareporting_AccountActiveAdSummary');
