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

class Account extends \Google\Collection
{
  protected $collection_key = 'availablePermissionIds';
  /**
   * @var string[]
   */
  public $accountPermissionIds;
  /**
   * @var string
   */
  public $accountProfile;
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $activeAdsLimitTier;
  /**
   * @var bool
   */
  public $activeViewOptOut;
  /**
   * @var string[]
   */
  public $availablePermissionIds;
  /**
   * @var string
   */
  public $countryId;
  /**
   * @var string
   */
  public $currencyId;
  /**
   * @var string
   */
  public $defaultCreativeSizeId;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $locale;
  /**
   * @var string
   */
  public $maximumImageSize;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $nielsenOcrEnabled;
  protected $reportsConfigurationType = ReportsConfiguration::class;
  protected $reportsConfigurationDataType = '';
  /**
   * @var bool
   */
  public $shareReportsWithTwitter;
  /**
   * @var string
   */
  public $teaserSizeLimit;

  /**
   * @param string[]
   */
  public function setAccountPermissionIds($accountPermissionIds)
  {
    $this->accountPermissionIds = $accountPermissionIds;
  }
  /**
   * @return string[]
   */
  public function getAccountPermissionIds()
  {
    return $this->accountPermissionIds;
  }
  /**
   * @param string
   */
  public function setAccountProfile($accountProfile)
  {
    $this->accountProfile = $accountProfile;
  }
  /**
   * @return string
   */
  public function getAccountProfile()
  {
    return $this->accountProfile;
  }
  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
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
   * @param bool
   */
  public function setActiveViewOptOut($activeViewOptOut)
  {
    $this->activeViewOptOut = $activeViewOptOut;
  }
  /**
   * @return bool
   */
  public function getActiveViewOptOut()
  {
    return $this->activeViewOptOut;
  }
  /**
   * @param string[]
   */
  public function setAvailablePermissionIds($availablePermissionIds)
  {
    $this->availablePermissionIds = $availablePermissionIds;
  }
  /**
   * @return string[]
   */
  public function getAvailablePermissionIds()
  {
    return $this->availablePermissionIds;
  }
  /**
   * @param string
   */
  public function setCountryId($countryId)
  {
    $this->countryId = $countryId;
  }
  /**
   * @return string
   */
  public function getCountryId()
  {
    return $this->countryId;
  }
  /**
   * @param string
   */
  public function setCurrencyId($currencyId)
  {
    $this->currencyId = $currencyId;
  }
  /**
   * @return string
   */
  public function getCurrencyId()
  {
    return $this->currencyId;
  }
  /**
   * @param string
   */
  public function setDefaultCreativeSizeId($defaultCreativeSizeId)
  {
    $this->defaultCreativeSizeId = $defaultCreativeSizeId;
  }
  /**
   * @return string
   */
  public function getDefaultCreativeSizeId()
  {
    return $this->defaultCreativeSizeId;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param string
   */
  public function setMaximumImageSize($maximumImageSize)
  {
    $this->maximumImageSize = $maximumImageSize;
  }
  /**
   * @return string
   */
  public function getMaximumImageSize()
  {
    return $this->maximumImageSize;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setNielsenOcrEnabled($nielsenOcrEnabled)
  {
    $this->nielsenOcrEnabled = $nielsenOcrEnabled;
  }
  /**
   * @return bool
   */
  public function getNielsenOcrEnabled()
  {
    return $this->nielsenOcrEnabled;
  }
  /**
   * @param ReportsConfiguration
   */
  public function setReportsConfiguration(ReportsConfiguration $reportsConfiguration)
  {
    $this->reportsConfiguration = $reportsConfiguration;
  }
  /**
   * @return ReportsConfiguration
   */
  public function getReportsConfiguration()
  {
    return $this->reportsConfiguration;
  }
  /**
   * @param bool
   */
  public function setShareReportsWithTwitter($shareReportsWithTwitter)
  {
    $this->shareReportsWithTwitter = $shareReportsWithTwitter;
  }
  /**
   * @return bool
   */
  public function getShareReportsWithTwitter()
  {
    return $this->shareReportsWithTwitter;
  }
  /**
   * @param string
   */
  public function setTeaserSizeLimit($teaserSizeLimit)
  {
    $this->teaserSizeLimit = $teaserSizeLimit;
  }
  /**
   * @return string
   */
  public function getTeaserSizeLimit()
  {
    return $this->teaserSizeLimit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Account::class, 'Google_Service_Dfareporting_Account');
