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

namespace Google\Service\Contentwarehouse;

class AssistantApiCoreTypesProvider extends \Google\Model
{
  protected $androidAppInfoType = AssistantApiCoreTypesAndroidAppInfo::class;
  protected $androidAppInfoDataType = '';
  protected $castAppInfoType = AssistantApiCoreTypesCastAppInfo::class;
  protected $castAppInfoDataType = '';
  protected $chromeosAppInfoType = AssistantApiCoreTypesChromeOsAppInfo::class;
  protected $chromeosAppInfoDataType = '';
  protected $cloudProviderInfoType = AssistantApiCoreTypesCloudProviderInfo::class;
  protected $cloudProviderInfoDataType = '';
  /**
   * @var string
   */
  public $fallbackUrl;
  protected $homeAppInfoType = AssistantApiCoreTypesHomeAppInfo::class;
  protected $homeAppInfoDataType = '';
  /**
   * @var string
   */
  public $iconImageUrl;
  protected $internalProviderInfoType = AssistantApiCoreTypesInternalProviderInfo::class;
  protected $internalProviderInfoDataType = '';
  protected $iosAppInfoType = AssistantApiCoreTypesIosAppInfo::class;
  protected $iosAppInfoDataType = '';
  protected $kaiosAppInfoType = AssistantApiCoreTypesKaiOsAppInfo::class;
  protected $kaiosAppInfoDataType = '';
  protected $sipProviderInfoType = AssistantApiCoreTypesSipProviderInfo::class;
  protected $sipProviderInfoDataType = '';
  protected $webProviderInfoType = AssistantApiCoreTypesWebProviderInfo::class;
  protected $webProviderInfoDataType = '';

  /**
   * @param AssistantApiCoreTypesAndroidAppInfo
   */
  public function setAndroidAppInfo(AssistantApiCoreTypesAndroidAppInfo $androidAppInfo)
  {
    $this->androidAppInfo = $androidAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesAndroidAppInfo
   */
  public function getAndroidAppInfo()
  {
    return $this->androidAppInfo;
  }
  /**
   * @param AssistantApiCoreTypesCastAppInfo
   */
  public function setCastAppInfo(AssistantApiCoreTypesCastAppInfo $castAppInfo)
  {
    $this->castAppInfo = $castAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesCastAppInfo
   */
  public function getCastAppInfo()
  {
    return $this->castAppInfo;
  }
  /**
   * @param AssistantApiCoreTypesChromeOsAppInfo
   */
  public function setChromeosAppInfo(AssistantApiCoreTypesChromeOsAppInfo $chromeosAppInfo)
  {
    $this->chromeosAppInfo = $chromeosAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesChromeOsAppInfo
   */
  public function getChromeosAppInfo()
  {
    return $this->chromeosAppInfo;
  }
  /**
   * @param AssistantApiCoreTypesCloudProviderInfo
   */
  public function setCloudProviderInfo(AssistantApiCoreTypesCloudProviderInfo $cloudProviderInfo)
  {
    $this->cloudProviderInfo = $cloudProviderInfo;
  }
  /**
   * @return AssistantApiCoreTypesCloudProviderInfo
   */
  public function getCloudProviderInfo()
  {
    return $this->cloudProviderInfo;
  }
  /**
   * @param string
   */
  public function setFallbackUrl($fallbackUrl)
  {
    $this->fallbackUrl = $fallbackUrl;
  }
  /**
   * @return string
   */
  public function getFallbackUrl()
  {
    return $this->fallbackUrl;
  }
  /**
   * @param AssistantApiCoreTypesHomeAppInfo
   */
  public function setHomeAppInfo(AssistantApiCoreTypesHomeAppInfo $homeAppInfo)
  {
    $this->homeAppInfo = $homeAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesHomeAppInfo
   */
  public function getHomeAppInfo()
  {
    return $this->homeAppInfo;
  }
  /**
   * @param string
   */
  public function setIconImageUrl($iconImageUrl)
  {
    $this->iconImageUrl = $iconImageUrl;
  }
  /**
   * @return string
   */
  public function getIconImageUrl()
  {
    return $this->iconImageUrl;
  }
  /**
   * @param AssistantApiCoreTypesInternalProviderInfo
   */
  public function setInternalProviderInfo(AssistantApiCoreTypesInternalProviderInfo $internalProviderInfo)
  {
    $this->internalProviderInfo = $internalProviderInfo;
  }
  /**
   * @return AssistantApiCoreTypesInternalProviderInfo
   */
  public function getInternalProviderInfo()
  {
    return $this->internalProviderInfo;
  }
  /**
   * @param AssistantApiCoreTypesIosAppInfo
   */
  public function setIosAppInfo(AssistantApiCoreTypesIosAppInfo $iosAppInfo)
  {
    $this->iosAppInfo = $iosAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesIosAppInfo
   */
  public function getIosAppInfo()
  {
    return $this->iosAppInfo;
  }
  /**
   * @param AssistantApiCoreTypesKaiOsAppInfo
   */
  public function setKaiosAppInfo(AssistantApiCoreTypesKaiOsAppInfo $kaiosAppInfo)
  {
    $this->kaiosAppInfo = $kaiosAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesKaiOsAppInfo
   */
  public function getKaiosAppInfo()
  {
    return $this->kaiosAppInfo;
  }
  /**
   * @param AssistantApiCoreTypesSipProviderInfo
   */
  public function setSipProviderInfo(AssistantApiCoreTypesSipProviderInfo $sipProviderInfo)
  {
    $this->sipProviderInfo = $sipProviderInfo;
  }
  /**
   * @return AssistantApiCoreTypesSipProviderInfo
   */
  public function getSipProviderInfo()
  {
    return $this->sipProviderInfo;
  }
  /**
   * @param AssistantApiCoreTypesWebProviderInfo
   */
  public function setWebProviderInfo(AssistantApiCoreTypesWebProviderInfo $webProviderInfo)
  {
    $this->webProviderInfo = $webProviderInfo;
  }
  /**
   * @return AssistantApiCoreTypesWebProviderInfo
   */
  public function getWebProviderInfo()
  {
    return $this->webProviderInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesProvider::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesProvider');
