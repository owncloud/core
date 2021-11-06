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
  public $allowedUserTargetingModes;
  protected $appTargetingType = AppTargeting::class;
  protected $appTargetingDataType = '';
  public $billingId;
  public $displayName;
  public $excludedContentLabelIds;
  protected $geoTargetingType = NumericTargetingDimension::class;
  protected $geoTargetingDataType = '';
  protected $includedCreativeDimensionsType = CreativeDimensions::class;
  protected $includedCreativeDimensionsDataType = 'array';
  public $includedEnvironments;
  public $includedFormats;
  public $includedLanguages;
  public $includedMobileOperatingSystemIds;
  public $includedPlatforms;
  public $includedUserIdTypes;
  public $interstitialTargeting;
  public $invalidGeoIds;
  public $maximumQps;
  public $minimumViewabilityDecile;
  public $name;
  protected $publisherTargetingType = StringTargetingDimension::class;
  protected $publisherTargetingDataType = '';
  public $state;
  protected $userListTargetingType = NumericTargetingDimension::class;
  protected $userListTargetingDataType = '';
  protected $verticalTargetingType = NumericTargetingDimension::class;
  protected $verticalTargetingDataType = '';
  protected $webTargetingType = StringTargetingDimension::class;
  protected $webTargetingDataType = '';

  public function setAllowedUserTargetingModes($allowedUserTargetingModes)
  {
    $this->allowedUserTargetingModes = $allowedUserTargetingModes;
  }
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
  public function setBillingId($billingId)
  {
    $this->billingId = $billingId;
  }
  public function getBillingId()
  {
    return $this->billingId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExcludedContentLabelIds($excludedContentLabelIds)
  {
    $this->excludedContentLabelIds = $excludedContentLabelIds;
  }
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
  public function setIncludedEnvironments($includedEnvironments)
  {
    $this->includedEnvironments = $includedEnvironments;
  }
  public function getIncludedEnvironments()
  {
    return $this->includedEnvironments;
  }
  public function setIncludedFormats($includedFormats)
  {
    $this->includedFormats = $includedFormats;
  }
  public function getIncludedFormats()
  {
    return $this->includedFormats;
  }
  public function setIncludedLanguages($includedLanguages)
  {
    $this->includedLanguages = $includedLanguages;
  }
  public function getIncludedLanguages()
  {
    return $this->includedLanguages;
  }
  public function setIncludedMobileOperatingSystemIds($includedMobileOperatingSystemIds)
  {
    $this->includedMobileOperatingSystemIds = $includedMobileOperatingSystemIds;
  }
  public function getIncludedMobileOperatingSystemIds()
  {
    return $this->includedMobileOperatingSystemIds;
  }
  public function setIncludedPlatforms($includedPlatforms)
  {
    $this->includedPlatforms = $includedPlatforms;
  }
  public function getIncludedPlatforms()
  {
    return $this->includedPlatforms;
  }
  public function setIncludedUserIdTypes($includedUserIdTypes)
  {
    $this->includedUserIdTypes = $includedUserIdTypes;
  }
  public function getIncludedUserIdTypes()
  {
    return $this->includedUserIdTypes;
  }
  public function setInterstitialTargeting($interstitialTargeting)
  {
    $this->interstitialTargeting = $interstitialTargeting;
  }
  public function getInterstitialTargeting()
  {
    return $this->interstitialTargeting;
  }
  public function setInvalidGeoIds($invalidGeoIds)
  {
    $this->invalidGeoIds = $invalidGeoIds;
  }
  public function getInvalidGeoIds()
  {
    return $this->invalidGeoIds;
  }
  public function setMaximumQps($maximumQps)
  {
    $this->maximumQps = $maximumQps;
  }
  public function getMaximumQps()
  {
    return $this->maximumQps;
  }
  public function setMinimumViewabilityDecile($minimumViewabilityDecile)
  {
    $this->minimumViewabilityDecile = $minimumViewabilityDecile;
  }
  public function getMinimumViewabilityDecile()
  {
    return $this->minimumViewabilityDecile;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setState($state)
  {
    $this->state = $state;
  }
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
