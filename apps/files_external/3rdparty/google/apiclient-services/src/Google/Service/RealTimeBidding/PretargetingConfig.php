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

class Google_Service_RealTimeBidding_PretargetingConfig extends Google_Collection
{
  protected $collection_key = 'invalidGeoIds';
  public $allowedUserTargetingModes;
  protected $appTargetingType = 'Google_Service_RealTimeBidding_AppTargeting';
  protected $appTargetingDataType = '';
  public $billingId;
  public $displayName;
  public $excludedContentLabelIds;
  protected $geoTargetingType = 'Google_Service_RealTimeBidding_NumericTargetingDimension';
  protected $geoTargetingDataType = '';
  protected $includedCreativeDimensionsType = 'Google_Service_RealTimeBidding_CreativeDimensions';
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
  protected $publisherTargetingType = 'Google_Service_RealTimeBidding_StringTargetingDimension';
  protected $publisherTargetingDataType = '';
  public $state;
  protected $userListTargetingType = 'Google_Service_RealTimeBidding_NumericTargetingDimension';
  protected $userListTargetingDataType = '';
  protected $verticalTargetingType = 'Google_Service_RealTimeBidding_NumericTargetingDimension';
  protected $verticalTargetingDataType = '';
  protected $webTargetingType = 'Google_Service_RealTimeBidding_StringTargetingDimension';
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
   * @param Google_Service_RealTimeBidding_AppTargeting
   */
  public function setAppTargeting(Google_Service_RealTimeBidding_AppTargeting $appTargeting)
  {
    $this->appTargeting = $appTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_AppTargeting
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
   * @param Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function setGeoTargeting(Google_Service_RealTimeBidding_NumericTargetingDimension $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
  }
  /**
   * @param Google_Service_RealTimeBidding_CreativeDimensions[]
   */
  public function setIncludedCreativeDimensions($includedCreativeDimensions)
  {
    $this->includedCreativeDimensions = $includedCreativeDimensions;
  }
  /**
   * @return Google_Service_RealTimeBidding_CreativeDimensions[]
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
   * @param Google_Service_RealTimeBidding_StringTargetingDimension
   */
  public function setPublisherTargeting(Google_Service_RealTimeBidding_StringTargetingDimension $publisherTargeting)
  {
    $this->publisherTargeting = $publisherTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_StringTargetingDimension
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
   * @param Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function setUserListTargeting(Google_Service_RealTimeBidding_NumericTargetingDimension $userListTargeting)
  {
    $this->userListTargeting = $userListTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function getUserListTargeting()
  {
    return $this->userListTargeting;
  }
  /**
   * @param Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function setVerticalTargeting(Google_Service_RealTimeBidding_NumericTargetingDimension $verticalTargeting)
  {
    $this->verticalTargeting = $verticalTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function getVerticalTargeting()
  {
    return $this->verticalTargeting;
  }
  /**
   * @param Google_Service_RealTimeBidding_StringTargetingDimension
   */
  public function setWebTargeting(Google_Service_RealTimeBidding_StringTargetingDimension $webTargeting)
  {
    $this->webTargeting = $webTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_StringTargetingDimension
   */
  public function getWebTargeting()
  {
    return $this->webTargeting;
  }
}
