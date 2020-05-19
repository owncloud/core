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

class Google_Service_DisplayVideo_TargetingOption extends Google_Model
{
  protected $ageRangeDetailsType = 'Google_Service_DisplayVideo_AgeRangeTargetingOptionDetails';
  protected $ageRangeDetailsDataType = '';
  protected $appCategoryDetailsType = 'Google_Service_DisplayVideo_AppCategoryTargetingOptionDetails';
  protected $appCategoryDetailsDataType = '';
  protected $authorizedSellerStatusDetailsType = 'Google_Service_DisplayVideo_AuthorizedSellerStatusTargetingOptionDetails';
  protected $authorizedSellerStatusDetailsDataType = '';
  protected $browserDetailsType = 'Google_Service_DisplayVideo_BrowserTargetingOptionDetails';
  protected $browserDetailsDataType = '';
  protected $carrierAndIspDetailsType = 'Google_Service_DisplayVideo_CarrierAndIspTargetingOptionDetails';
  protected $carrierAndIspDetailsDataType = '';
  protected $categoryDetailsType = 'Google_Service_DisplayVideo_CategoryTargetingOptionDetails';
  protected $categoryDetailsDataType = '';
  protected $contentInstreamPositionDetailsType = 'Google_Service_DisplayVideo_ContentInstreamPositionTargetingOptionDetails';
  protected $contentInstreamPositionDetailsDataType = '';
  protected $contentOutstreamPositionDetailsType = 'Google_Service_DisplayVideo_ContentOutstreamPositionTargetingOptionDetails';
  protected $contentOutstreamPositionDetailsDataType = '';
  protected $deviceMakeModelDetailsType = 'Google_Service_DisplayVideo_DeviceMakeModelTargetingOptionDetails';
  protected $deviceMakeModelDetailsDataType = '';
  protected $deviceTypeDetailsType = 'Google_Service_DisplayVideo_DeviceTypeTargetingOptionDetails';
  protected $deviceTypeDetailsDataType = '';
  protected $digitalContentLabelDetailsType = 'Google_Service_DisplayVideo_DigitalContentLabelTargetingOptionDetails';
  protected $digitalContentLabelDetailsDataType = '';
  protected $environmentDetailsType = 'Google_Service_DisplayVideo_EnvironmentTargetingOptionDetails';
  protected $environmentDetailsDataType = '';
  protected $exchangeDetailsType = 'Google_Service_DisplayVideo_ExchangeTargetingOptionDetails';
  protected $exchangeDetailsDataType = '';
  protected $genderDetailsType = 'Google_Service_DisplayVideo_GenderTargetingOptionDetails';
  protected $genderDetailsDataType = '';
  protected $geoRegionDetailsType = 'Google_Service_DisplayVideo_GeoRegionTargetingOptionDetails';
  protected $geoRegionDetailsDataType = '';
  protected $householdIncomeDetailsType = 'Google_Service_DisplayVideo_HouseholdIncomeTargetingOptionDetails';
  protected $householdIncomeDetailsDataType = '';
  protected $languageDetailsType = 'Google_Service_DisplayVideo_LanguageTargetingOptionDetails';
  protected $languageDetailsDataType = '';
  public $name;
  protected $onScreenPositionDetailsType = 'Google_Service_DisplayVideo_OnScreenPositionTargetingOptionDetails';
  protected $onScreenPositionDetailsDataType = '';
  protected $operatingSystemDetailsType = 'Google_Service_DisplayVideo_OperatingSystemTargetingOptionDetails';
  protected $operatingSystemDetailsDataType = '';
  protected $parentalStatusDetailsType = 'Google_Service_DisplayVideo_ParentalStatusTargetingOptionDetails';
  protected $parentalStatusDetailsDataType = '';
  protected $sensitiveCategoryDetailsType = 'Google_Service_DisplayVideo_SensitiveCategoryTargetingOptionDetails';
  protected $sensitiveCategoryDetailsDataType = '';
  protected $subExchangeDetailsType = 'Google_Service_DisplayVideo_SubExchangeTargetingOptionDetails';
  protected $subExchangeDetailsDataType = '';
  public $targetingOptionId;
  public $targetingType;
  protected $userRewardedContentDetailsType = 'Google_Service_DisplayVideo_UserRewardedContentTargetingOptionDetails';
  protected $userRewardedContentDetailsDataType = '';
  protected $videoPlayerSizeDetailsType = 'Google_Service_DisplayVideo_VideoPlayerSizeTargetingOptionDetails';
  protected $videoPlayerSizeDetailsDataType = '';
  protected $viewabilityDetailsType = 'Google_Service_DisplayVideo_ViewabilityTargetingOptionDetails';
  protected $viewabilityDetailsDataType = '';

  /**
   * @param Google_Service_DisplayVideo_AgeRangeTargetingOptionDetails
   */
  public function setAgeRangeDetails(Google_Service_DisplayVideo_AgeRangeTargetingOptionDetails $ageRangeDetails)
  {
    $this->ageRangeDetails = $ageRangeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AgeRangeTargetingOptionDetails
   */
  public function getAgeRangeDetails()
  {
    return $this->ageRangeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_AppCategoryTargetingOptionDetails
   */
  public function setAppCategoryDetails(Google_Service_DisplayVideo_AppCategoryTargetingOptionDetails $appCategoryDetails)
  {
    $this->appCategoryDetails = $appCategoryDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AppCategoryTargetingOptionDetails
   */
  public function getAppCategoryDetails()
  {
    return $this->appCategoryDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_AuthorizedSellerStatusTargetingOptionDetails
   */
  public function setAuthorizedSellerStatusDetails(Google_Service_DisplayVideo_AuthorizedSellerStatusTargetingOptionDetails $authorizedSellerStatusDetails)
  {
    $this->authorizedSellerStatusDetails = $authorizedSellerStatusDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AuthorizedSellerStatusTargetingOptionDetails
   */
  public function getAuthorizedSellerStatusDetails()
  {
    return $this->authorizedSellerStatusDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_BrowserTargetingOptionDetails
   */
  public function setBrowserDetails(Google_Service_DisplayVideo_BrowserTargetingOptionDetails $browserDetails)
  {
    $this->browserDetails = $browserDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_BrowserTargetingOptionDetails
   */
  public function getBrowserDetails()
  {
    return $this->browserDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_CarrierAndIspTargetingOptionDetails
   */
  public function setCarrierAndIspDetails(Google_Service_DisplayVideo_CarrierAndIspTargetingOptionDetails $carrierAndIspDetails)
  {
    $this->carrierAndIspDetails = $carrierAndIspDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_CarrierAndIspTargetingOptionDetails
   */
  public function getCarrierAndIspDetails()
  {
    return $this->carrierAndIspDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_CategoryTargetingOptionDetails
   */
  public function setCategoryDetails(Google_Service_DisplayVideo_CategoryTargetingOptionDetails $categoryDetails)
  {
    $this->categoryDetails = $categoryDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_CategoryTargetingOptionDetails
   */
  public function getCategoryDetails()
  {
    return $this->categoryDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ContentInstreamPositionTargetingOptionDetails
   */
  public function setContentInstreamPositionDetails(Google_Service_DisplayVideo_ContentInstreamPositionTargetingOptionDetails $contentInstreamPositionDetails)
  {
    $this->contentInstreamPositionDetails = $contentInstreamPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ContentInstreamPositionTargetingOptionDetails
   */
  public function getContentInstreamPositionDetails()
  {
    return $this->contentInstreamPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ContentOutstreamPositionTargetingOptionDetails
   */
  public function setContentOutstreamPositionDetails(Google_Service_DisplayVideo_ContentOutstreamPositionTargetingOptionDetails $contentOutstreamPositionDetails)
  {
    $this->contentOutstreamPositionDetails = $contentOutstreamPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ContentOutstreamPositionTargetingOptionDetails
   */
  public function getContentOutstreamPositionDetails()
  {
    return $this->contentOutstreamPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DeviceMakeModelTargetingOptionDetails
   */
  public function setDeviceMakeModelDetails(Google_Service_DisplayVideo_DeviceMakeModelTargetingOptionDetails $deviceMakeModelDetails)
  {
    $this->deviceMakeModelDetails = $deviceMakeModelDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DeviceMakeModelTargetingOptionDetails
   */
  public function getDeviceMakeModelDetails()
  {
    return $this->deviceMakeModelDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DeviceTypeTargetingOptionDetails
   */
  public function setDeviceTypeDetails(Google_Service_DisplayVideo_DeviceTypeTargetingOptionDetails $deviceTypeDetails)
  {
    $this->deviceTypeDetails = $deviceTypeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DeviceTypeTargetingOptionDetails
   */
  public function getDeviceTypeDetails()
  {
    return $this->deviceTypeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DigitalContentLabelTargetingOptionDetails
   */
  public function setDigitalContentLabelDetails(Google_Service_DisplayVideo_DigitalContentLabelTargetingOptionDetails $digitalContentLabelDetails)
  {
    $this->digitalContentLabelDetails = $digitalContentLabelDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DigitalContentLabelTargetingOptionDetails
   */
  public function getDigitalContentLabelDetails()
  {
    return $this->digitalContentLabelDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_EnvironmentTargetingOptionDetails
   */
  public function setEnvironmentDetails(Google_Service_DisplayVideo_EnvironmentTargetingOptionDetails $environmentDetails)
  {
    $this->environmentDetails = $environmentDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_EnvironmentTargetingOptionDetails
   */
  public function getEnvironmentDetails()
  {
    return $this->environmentDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ExchangeTargetingOptionDetails
   */
  public function setExchangeDetails(Google_Service_DisplayVideo_ExchangeTargetingOptionDetails $exchangeDetails)
  {
    $this->exchangeDetails = $exchangeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ExchangeTargetingOptionDetails
   */
  public function getExchangeDetails()
  {
    return $this->exchangeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_GenderTargetingOptionDetails
   */
  public function setGenderDetails(Google_Service_DisplayVideo_GenderTargetingOptionDetails $genderDetails)
  {
    $this->genderDetails = $genderDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_GenderTargetingOptionDetails
   */
  public function getGenderDetails()
  {
    return $this->genderDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_GeoRegionTargetingOptionDetails
   */
  public function setGeoRegionDetails(Google_Service_DisplayVideo_GeoRegionTargetingOptionDetails $geoRegionDetails)
  {
    $this->geoRegionDetails = $geoRegionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_GeoRegionTargetingOptionDetails
   */
  public function getGeoRegionDetails()
  {
    return $this->geoRegionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_HouseholdIncomeTargetingOptionDetails
   */
  public function setHouseholdIncomeDetails(Google_Service_DisplayVideo_HouseholdIncomeTargetingOptionDetails $householdIncomeDetails)
  {
    $this->householdIncomeDetails = $householdIncomeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_HouseholdIncomeTargetingOptionDetails
   */
  public function getHouseholdIncomeDetails()
  {
    return $this->householdIncomeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_LanguageTargetingOptionDetails
   */
  public function setLanguageDetails(Google_Service_DisplayVideo_LanguageTargetingOptionDetails $languageDetails)
  {
    $this->languageDetails = $languageDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_LanguageTargetingOptionDetails
   */
  public function getLanguageDetails()
  {
    return $this->languageDetails;
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
   * @param Google_Service_DisplayVideo_OnScreenPositionTargetingOptionDetails
   */
  public function setOnScreenPositionDetails(Google_Service_DisplayVideo_OnScreenPositionTargetingOptionDetails $onScreenPositionDetails)
  {
    $this->onScreenPositionDetails = $onScreenPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_OnScreenPositionTargetingOptionDetails
   */
  public function getOnScreenPositionDetails()
  {
    return $this->onScreenPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_OperatingSystemTargetingOptionDetails
   */
  public function setOperatingSystemDetails(Google_Service_DisplayVideo_OperatingSystemTargetingOptionDetails $operatingSystemDetails)
  {
    $this->operatingSystemDetails = $operatingSystemDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_OperatingSystemTargetingOptionDetails
   */
  public function getOperatingSystemDetails()
  {
    return $this->operatingSystemDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ParentalStatusTargetingOptionDetails
   */
  public function setParentalStatusDetails(Google_Service_DisplayVideo_ParentalStatusTargetingOptionDetails $parentalStatusDetails)
  {
    $this->parentalStatusDetails = $parentalStatusDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ParentalStatusTargetingOptionDetails
   */
  public function getParentalStatusDetails()
  {
    return $this->parentalStatusDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_SensitiveCategoryTargetingOptionDetails
   */
  public function setSensitiveCategoryDetails(Google_Service_DisplayVideo_SensitiveCategoryTargetingOptionDetails $sensitiveCategoryDetails)
  {
    $this->sensitiveCategoryDetails = $sensitiveCategoryDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_SensitiveCategoryTargetingOptionDetails
   */
  public function getSensitiveCategoryDetails()
  {
    return $this->sensitiveCategoryDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_SubExchangeTargetingOptionDetails
   */
  public function setSubExchangeDetails(Google_Service_DisplayVideo_SubExchangeTargetingOptionDetails $subExchangeDetails)
  {
    $this->subExchangeDetails = $subExchangeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_SubExchangeTargetingOptionDetails
   */
  public function getSubExchangeDetails()
  {
    return $this->subExchangeDetails;
  }
  public function setTargetingOptionId($targetingOptionId)
  {
    $this->targetingOptionId = $targetingOptionId;
  }
  public function getTargetingOptionId()
  {
    return $this->targetingOptionId;
  }
  public function setTargetingType($targetingType)
  {
    $this->targetingType = $targetingType;
  }
  public function getTargetingType()
  {
    return $this->targetingType;
  }
  /**
   * @param Google_Service_DisplayVideo_UserRewardedContentTargetingOptionDetails
   */
  public function setUserRewardedContentDetails(Google_Service_DisplayVideo_UserRewardedContentTargetingOptionDetails $userRewardedContentDetails)
  {
    $this->userRewardedContentDetails = $userRewardedContentDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_UserRewardedContentTargetingOptionDetails
   */
  public function getUserRewardedContentDetails()
  {
    return $this->userRewardedContentDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_VideoPlayerSizeTargetingOptionDetails
   */
  public function setVideoPlayerSizeDetails(Google_Service_DisplayVideo_VideoPlayerSizeTargetingOptionDetails $videoPlayerSizeDetails)
  {
    $this->videoPlayerSizeDetails = $videoPlayerSizeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_VideoPlayerSizeTargetingOptionDetails
   */
  public function getVideoPlayerSizeDetails()
  {
    return $this->videoPlayerSizeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ViewabilityTargetingOptionDetails
   */
  public function setViewabilityDetails(Google_Service_DisplayVideo_ViewabilityTargetingOptionDetails $viewabilityDetails)
  {
    $this->viewabilityDetails = $viewabilityDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ViewabilityTargetingOptionDetails
   */
  public function getViewabilityDetails()
  {
    return $this->viewabilityDetails;
  }
}
