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

class FloodlightConfiguration extends \Google\Collection
{
  protected $collection_key = 'userDefinedVariableConfigurations';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  /**
   * @var bool
   */
  public $analyticsDataSharingEnabled;
  protected $customViewabilityMetricType = CustomViewabilityMetric::class;
  protected $customViewabilityMetricDataType = '';
  /**
   * @var bool
   */
  public $exposureToConversionEnabled;
  /**
   * @var string
   */
  public $firstDayOfWeek;
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var bool
   */
  public $inAppAttributionTrackingEnabled;
  /**
   * @var string
   */
  public $kind;
  protected $lookbackConfigurationType = LookbackConfiguration::class;
  protected $lookbackConfigurationDataType = '';
  /**
   * @var string
   */
  public $naturalSearchConversionAttributionOption;
  protected $omnitureSettingsType = OmnitureSettings::class;
  protected $omnitureSettingsDataType = '';
  /**
   * @var string
   */
  public $subaccountId;
  protected $tagSettingsType = TagSettings::class;
  protected $tagSettingsDataType = '';
  protected $thirdPartyAuthenticationTokensType = ThirdPartyAuthenticationToken::class;
  protected $thirdPartyAuthenticationTokensDataType = 'array';
  protected $userDefinedVariableConfigurationsType = UserDefinedVariableConfiguration::class;
  protected $userDefinedVariableConfigurationsDataType = 'array';

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
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param DimensionValue
   */
  public function setAdvertiserIdDimensionValue(DimensionValue $advertiserIdDimensionValue)
  {
    $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getAdvertiserIdDimensionValue()
  {
    return $this->advertiserIdDimensionValue;
  }
  /**
   * @param bool
   */
  public function setAnalyticsDataSharingEnabled($analyticsDataSharingEnabled)
  {
    $this->analyticsDataSharingEnabled = $analyticsDataSharingEnabled;
  }
  /**
   * @return bool
   */
  public function getAnalyticsDataSharingEnabled()
  {
    return $this->analyticsDataSharingEnabled;
  }
  /**
   * @param CustomViewabilityMetric
   */
  public function setCustomViewabilityMetric(CustomViewabilityMetric $customViewabilityMetric)
  {
    $this->customViewabilityMetric = $customViewabilityMetric;
  }
  /**
   * @return CustomViewabilityMetric
   */
  public function getCustomViewabilityMetric()
  {
    return $this->customViewabilityMetric;
  }
  /**
   * @param bool
   */
  public function setExposureToConversionEnabled($exposureToConversionEnabled)
  {
    $this->exposureToConversionEnabled = $exposureToConversionEnabled;
  }
  /**
   * @return bool
   */
  public function getExposureToConversionEnabled()
  {
    return $this->exposureToConversionEnabled;
  }
  /**
   * @param string
   */
  public function setFirstDayOfWeek($firstDayOfWeek)
  {
    $this->firstDayOfWeek = $firstDayOfWeek;
  }
  /**
   * @return string
   */
  public function getFirstDayOfWeek()
  {
    return $this->firstDayOfWeek;
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
   * @param DimensionValue
   */
  public function setIdDimensionValue(DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
  }
  /**
   * @param bool
   */
  public function setInAppAttributionTrackingEnabled($inAppAttributionTrackingEnabled)
  {
    $this->inAppAttributionTrackingEnabled = $inAppAttributionTrackingEnabled;
  }
  /**
   * @return bool
   */
  public function getInAppAttributionTrackingEnabled()
  {
    return $this->inAppAttributionTrackingEnabled;
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
   * @param LookbackConfiguration
   */
  public function setLookbackConfiguration(LookbackConfiguration $lookbackConfiguration)
  {
    $this->lookbackConfiguration = $lookbackConfiguration;
  }
  /**
   * @return LookbackConfiguration
   */
  public function getLookbackConfiguration()
  {
    return $this->lookbackConfiguration;
  }
  /**
   * @param string
   */
  public function setNaturalSearchConversionAttributionOption($naturalSearchConversionAttributionOption)
  {
    $this->naturalSearchConversionAttributionOption = $naturalSearchConversionAttributionOption;
  }
  /**
   * @return string
   */
  public function getNaturalSearchConversionAttributionOption()
  {
    return $this->naturalSearchConversionAttributionOption;
  }
  /**
   * @param OmnitureSettings
   */
  public function setOmnitureSettings(OmnitureSettings $omnitureSettings)
  {
    $this->omnitureSettings = $omnitureSettings;
  }
  /**
   * @return OmnitureSettings
   */
  public function getOmnitureSettings()
  {
    return $this->omnitureSettings;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param TagSettings
   */
  public function setTagSettings(TagSettings $tagSettings)
  {
    $this->tagSettings = $tagSettings;
  }
  /**
   * @return TagSettings
   */
  public function getTagSettings()
  {
    return $this->tagSettings;
  }
  /**
   * @param ThirdPartyAuthenticationToken[]
   */
  public function setThirdPartyAuthenticationTokens($thirdPartyAuthenticationTokens)
  {
    $this->thirdPartyAuthenticationTokens = $thirdPartyAuthenticationTokens;
  }
  /**
   * @return ThirdPartyAuthenticationToken[]
   */
  public function getThirdPartyAuthenticationTokens()
  {
    return $this->thirdPartyAuthenticationTokens;
  }
  /**
   * @param UserDefinedVariableConfiguration[]
   */
  public function setUserDefinedVariableConfigurations($userDefinedVariableConfigurations)
  {
    $this->userDefinedVariableConfigurations = $userDefinedVariableConfigurations;
  }
  /**
   * @return UserDefinedVariableConfiguration[]
   */
  public function getUserDefinedVariableConfigurations()
  {
    return $this->userDefinedVariableConfigurations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightConfiguration::class, 'Google_Service_Dfareporting_FloodlightConfiguration');
