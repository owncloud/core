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

namespace Google\Service\RealTimeBidding;

class PretargetingConfig extends \Google\Collection
{
  protected $collection_key = 'invalidGeoIds';
  /**
   * @var string[]
   */
  public $allowedUserTargetingModes;
  protected $appTargetingType = AppTargeting::class;
  protected $appTargetingDataType = '';
  /**
   * @var string
   */
  public $billingId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $excludedContentLabelIds;
  protected $geoTargetingType = NumericTargetingDimension::class;
  protected $geoTargetingDataType = '';
  protected $includedCreativeDimensionsType = CreativeDimensions::class;
  protected $includedCreativeDimensionsDataType = 'array';
  /**
   * @var string[]
   */
  public $includedEnvironments;
  /**
   * @var string[]
   */
  public $includedFormats;
  /**
   * @var string[]
   */
  public $includedLanguages;
  /**
   * @var string[]
   */
  public $includedMobileOperatingSystemIds;
  /**
   * @var string[]
   */
  public $includedPlatforms;
  /**
   * @var string[]
   */
  public $includedUserIdTypes;
  /**
   * @var string
   */
  public $interstitialTargeting;
  /**
   * @var string[]
   */
  public $invalidGeoIds;
  /**
   * @var string
   */
  public $maximumQps;
  /**
   * @var int
   */
  public $minimumViewabilityDecile;
  /**
   * @var string
   */
  public $name;
  protected $publisherTargetingType = StringTargetingDimension::class;
  protected $publisherTargetingDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $userListTargetingType = NumericTargetingDimension::class;
  protected $userListTargetingDataType = '';
  protected $verticalTargetingType = NumericTargetingDimension::class;
  protected $verticalTargetingDataType = '';
  protected $webTargetingType = StringTargetingDimension::class;
  protected $webTargetingDataType = '';

  /**
   * @param string[]
   */
  public function setAllowedUserTargetingModes($allowedUserTargetingModes)
  {
    $this->allowedUserTargetingModes = $allowedUserTargetingModes;
  }
  /**
   * @return string[]
   */
  public function getAllowedUserTargetingModes()
  {
    return $this->allowedUserTargetingModes;
  }
  /**
   * @param AppTargeting
   */
  public function setAppTargeting(AppTargeting $appTargeting)
  {
    $this->appTargeting = $appTargeting;
  }
  /**
   * @return AppTargeting
   */
  public function getAppTargeting()
  {
    return $this->appTargeting;
  }
  /**
   * @param string
   */
  public function setBillingId($billingId)
  {
    $this->billingId = $billingId;
  }
  /**
   * @return string
   */
  public function getBillingId()
  {
    return $this->billingId;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setExcludedContentLabelIds($excludedContentLabelIds)
  {
    $this->excludedContentLabelIds = $excludedContentLabelIds;
  }
  /**
   * @return string[]
   */
  public function getExcludedContentLabelIds()
  {
    return $this->excludedContentLabelIds;
  }
  /**
   * @param NumericTargetingDimension
   */
  public function setGeoTargeting(NumericTargetingDimension $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return NumericTargetingDimension
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
  }
  /**
   * @param CreativeDimensions[]
   */
  public function setIncludedCreativeDimensions($includedCreativeDimensions)
  {
    $this->includedCreativeDimensions = $includedCreativeDimensions;
  }
  /**
   * @return CreativeDimensions[]
   */
  public function getIncludedCreativeDimensions()
  {
    return $this->includedCreativeDimensions;
  }
  /**
   * @param string[]
   */
  public function setIncludedEnvironments($includedEnvironments)
  {
    $this->includedEnvironments = $includedEnvironments;
  }
  /**
   * @return string[]
   */
  public function getIncludedEnvironments()
  {
    return $this->includedEnvironments;
  }
  /**
   * @param string[]
   */
  public function setIncludedFormats($includedFormats)
  {
    $this->includedFormats = $includedFormats;
  }
  /**
   * @return string[]
   */
  public function getIncludedFormats()
  {
    return $this->includedFormats;
  }
  /**
   * @param string[]
   */
  public function setIncludedLanguages($includedLanguages)
  {
    $this->includedLanguages = $includedLanguages;
  }
  /**
   * @return string[]
   */
  public function getIncludedLanguages()
  {
    return $this->includedLanguages;
  }
  /**
   * @param string[]
   */
  public function setIncludedMobileOperatingSystemIds($includedMobileOperatingSystemIds)
  {
    $this->includedMobileOperatingSystemIds = $includedMobileOperatingSystemIds;
  }
  /**
   * @return string[]
   */
  public function getIncludedMobileOperatingSystemIds()
  {
    return $this->includedMobileOperatingSystemIds;
  }
  /**
   * @param string[]
   */
  public function setIncludedPlatforms($includedPlatforms)
  {
    $this->includedPlatforms = $includedPlatforms;
  }
  /**
   * @return string[]
   */
  public function getIncludedPlatforms()
  {
    return $this->includedPlatforms;
  }
  /**
   * @param string[]
   */
  public function setIncludedUserIdTypes($includedUserIdTypes)
  {
    $this->includedUserIdTypes = $includedUserIdTypes;
  }
  /**
   * @return string[]
   */
  public function getIncludedUserIdTypes()
  {
    return $this->includedUserIdTypes;
  }
  /**
   * @param string
   */
  public function setInterstitialTargeting($interstitialTargeting)
  {
    $this->interstitialTargeting = $interstitialTargeting;
  }
  /**
   * @return string
   */
  public function getInterstitialTargeting()
  {
    return $this->interstitialTargeting;
  }
  /**
   * @param string[]
   */
  public function setInvalidGeoIds($invalidGeoIds)
  {
    $this->invalidGeoIds = $invalidGeoIds;
  }
  /**
   * @return string[]
   */
  public function getInvalidGeoIds()
  {
    return $this->invalidGeoIds;
  }
  /**
   * @param string
   */
  public function setMaximumQps($maximumQps)
  {
    $this->maximumQps = $maximumQps;
  }
  /**
   * @return string
   */
  public function getMaximumQps()
  {
    return $this->maximumQps;
  }
  /**
   * @param int
   */
  public function setMinimumViewabilityDecile($minimumViewabilityDecile)
  {
    $this->minimumViewabilityDecile = $minimumViewabilityDecile;
  }
  /**
   * @return int
   */
  public function getMinimumViewabilityDecile()
  {
    return $this->minimumViewabilityDecile;
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
   * @param StringTargetingDimension
   */
  public function setPublisherTargeting(StringTargetingDimension $publisherTargeting)
  {
    $this->publisherTargeting = $publisherTargeting;
  }
  /**
   * @return StringTargetingDimension
   */
  public function getPublisherTargeting()
  {
    return $this->publisherTargeting;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param NumericTargetingDimension
   */
  public function setUserListTargeting(NumericTargetingDimension $userListTargeting)
  {
    $this->userListTargeting = $userListTargeting;
  }
  /**
   * @return NumericTargetingDimension
   */
  public function getUserListTargeting()
  {
    return $this->userListTargeting;
  }
  /**
   * @param NumericTargetingDimension
   */
  public function setVerticalTargeting(NumericTargetingDimension $verticalTargeting)
  {
    $this->verticalTargeting = $verticalTargeting;
  }
  /**
   * @return NumericTargetingDimension
   */
  public function getVerticalTargeting()
  {
    return $this->verticalTargeting;
  }
  /**
   * @param StringTargetingDimension
   */
  public function setWebTargeting(StringTargetingDimension $webTargeting)
  {
    $this->webTargeting = $webTargeting;
  }
  /**
   * @return StringTargetingDimension
   */
  public function getWebTargeting()
  {
    return $this->webTargeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PretargetingConfig::class, 'Google_Service_RealTimeBidding_PretargetingConfig');
