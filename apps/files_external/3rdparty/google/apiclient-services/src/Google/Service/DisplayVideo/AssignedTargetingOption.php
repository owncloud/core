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

class Google_Service_DisplayVideo_AssignedTargetingOption extends Google_Model
{
  protected $ageRangeDetailsType = 'Google_Service_DisplayVideo_AgeRangeAssignedTargetingOptionDetails';
  protected $ageRangeDetailsDataType = '';
  protected $appCategoryDetailsType = 'Google_Service_DisplayVideo_AppCategoryAssignedTargetingOptionDetails';
  protected $appCategoryDetailsDataType = '';
  protected $appDetailsType = 'Google_Service_DisplayVideo_AppAssignedTargetingOptionDetails';
  protected $appDetailsDataType = '';
  public $assignedTargetingOptionId;
  protected $audienceGroupDetailsType = 'Google_Service_DisplayVideo_AudienceGroupAssignedTargetingOptionDetails';
  protected $audienceGroupDetailsDataType = '';
  protected $authorizedSellerStatusDetailsType = 'Google_Service_DisplayVideo_AuthorizedSellerStatusAssignedTargetingOptionDetails';
  protected $authorizedSellerStatusDetailsDataType = '';
  protected $browserDetailsType = 'Google_Service_DisplayVideo_BrowserAssignedTargetingOptionDetails';
  protected $browserDetailsDataType = '';
  protected $carrierAndIspDetailsType = 'Google_Service_DisplayVideo_CarrierAndIspAssignedTargetingOptionDetails';
  protected $carrierAndIspDetailsDataType = '';
  protected $categoryDetailsType = 'Google_Service_DisplayVideo_CategoryAssignedTargetingOptionDetails';
  protected $categoryDetailsDataType = '';
  protected $channelDetailsType = 'Google_Service_DisplayVideo_ChannelAssignedTargetingOptionDetails';
  protected $channelDetailsDataType = '';
  protected $contentInstreamPositionDetailsType = 'Google_Service_DisplayVideo_ContentInstreamPositionAssignedTargetingOptionDetails';
  protected $contentInstreamPositionDetailsDataType = '';
  protected $contentOutstreamPositionDetailsType = 'Google_Service_DisplayVideo_ContentOutstreamPositionAssignedTargetingOptionDetails';
  protected $contentOutstreamPositionDetailsDataType = '';
  protected $dayAndTimeDetailsType = 'Google_Service_DisplayVideo_DayAndTimeAssignedTargetingOptionDetails';
  protected $dayAndTimeDetailsDataType = '';
  protected $deviceMakeModelDetailsType = 'Google_Service_DisplayVideo_DeviceMakeModelAssignedTargetingOptionDetails';
  protected $deviceMakeModelDetailsDataType = '';
  protected $deviceTypeDetailsType = 'Google_Service_DisplayVideo_DeviceTypeAssignedTargetingOptionDetails';
  protected $deviceTypeDetailsDataType = '';
  protected $digitalContentLabelExclusionDetailsType = 'Google_Service_DisplayVideo_DigitalContentLabelAssignedTargetingOptionDetails';
  protected $digitalContentLabelExclusionDetailsDataType = '';
  protected $environmentDetailsType = 'Google_Service_DisplayVideo_EnvironmentAssignedTargetingOptionDetails';
  protected $environmentDetailsDataType = '';
  protected $exchangeDetailsType = 'Google_Service_DisplayVideo_ExchangeAssignedTargetingOptionDetails';
  protected $exchangeDetailsDataType = '';
  protected $genderDetailsType = 'Google_Service_DisplayVideo_GenderAssignedTargetingOptionDetails';
  protected $genderDetailsDataType = '';
  protected $geoRegionDetailsType = 'Google_Service_DisplayVideo_GeoRegionAssignedTargetingOptionDetails';
  protected $geoRegionDetailsDataType = '';
  protected $householdIncomeDetailsType = 'Google_Service_DisplayVideo_HouseholdIncomeAssignedTargetingOptionDetails';
  protected $householdIncomeDetailsDataType = '';
  public $inheritance;
  protected $inventorySourceDetailsType = 'Google_Service_DisplayVideo_InventorySourceAssignedTargetingOptionDetails';
  protected $inventorySourceDetailsDataType = '';
  protected $inventorySourceGroupDetailsType = 'Google_Service_DisplayVideo_InventorySourceGroupAssignedTargetingOptionDetails';
  protected $inventorySourceGroupDetailsDataType = '';
  protected $keywordDetailsType = 'Google_Service_DisplayVideo_KeywordAssignedTargetingOptionDetails';
  protected $keywordDetailsDataType = '';
  protected $languageDetailsType = 'Google_Service_DisplayVideo_LanguageAssignedTargetingOptionDetails';
  protected $languageDetailsDataType = '';
  public $name;
  protected $nativeContentPositionDetailsType = 'Google_Service_DisplayVideo_NativeContentPositionAssignedTargetingOptionDetails';
  protected $nativeContentPositionDetailsDataType = '';
  protected $negativeKeywordListDetailsType = 'Google_Service_DisplayVideo_NegativeKeywordListAssignedTargetingOptionDetails';
  protected $negativeKeywordListDetailsDataType = '';
  protected $onScreenPositionDetailsType = 'Google_Service_DisplayVideo_OnScreenPositionAssignedTargetingOptionDetails';
  protected $onScreenPositionDetailsDataType = '';
  protected $operatingSystemDetailsType = 'Google_Service_DisplayVideo_OperatingSystemAssignedTargetingOptionDetails';
  protected $operatingSystemDetailsDataType = '';
  protected $parentalStatusDetailsType = 'Google_Service_DisplayVideo_ParentalStatusAssignedTargetingOptionDetails';
  protected $parentalStatusDetailsDataType = '';
  protected $proximityLocationListDetailsType = 'Google_Service_DisplayVideo_ProximityLocationListAssignedTargetingOptionDetails';
  protected $proximityLocationListDetailsDataType = '';
  protected $regionalLocationListDetailsType = 'Google_Service_DisplayVideo_RegionalLocationListAssignedTargetingOptionDetails';
  protected $regionalLocationListDetailsDataType = '';
  protected $sensitiveCategoryExclusionDetailsType = 'Google_Service_DisplayVideo_SensitiveCategoryAssignedTargetingOptionDetails';
  protected $sensitiveCategoryExclusionDetailsDataType = '';
  protected $subExchangeDetailsType = 'Google_Service_DisplayVideo_SubExchangeAssignedTargetingOptionDetails';
  protected $subExchangeDetailsDataType = '';
  public $targetingType;
  protected $thirdPartyVerifierDetailsType = 'Google_Service_DisplayVideo_ThirdPartyVerifierAssignedTargetingOptionDetails';
  protected $thirdPartyVerifierDetailsDataType = '';
  protected $urlDetailsType = 'Google_Service_DisplayVideo_UrlAssignedTargetingOptionDetails';
  protected $urlDetailsDataType = '';
  protected $userRewardedContentDetailsType = 'Google_Service_DisplayVideo_UserRewardedContentAssignedTargetingOptionDetails';
  protected $userRewardedContentDetailsDataType = '';
  protected $videoPlayerSizeDetailsType = 'Google_Service_DisplayVideo_VideoPlayerSizeAssignedTargetingOptionDetails';
  protected $videoPlayerSizeDetailsDataType = '';
  protected $viewabilityDetailsType = 'Google_Service_DisplayVideo_ViewabilityAssignedTargetingOptionDetails';
  protected $viewabilityDetailsDataType = '';

  /**
   * @param Google_Service_DisplayVideo_AgeRangeAssignedTargetingOptionDetails
   */
  public function setAgeRangeDetails(Google_Service_DisplayVideo_AgeRangeAssignedTargetingOptionDetails $ageRangeDetails)
  {
    $this->ageRangeDetails = $ageRangeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AgeRangeAssignedTargetingOptionDetails
   */
  public function getAgeRangeDetails()
  {
    return $this->ageRangeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_AppCategoryAssignedTargetingOptionDetails
   */
  public function setAppCategoryDetails(Google_Service_DisplayVideo_AppCategoryAssignedTargetingOptionDetails $appCategoryDetails)
  {
    $this->appCategoryDetails = $appCategoryDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AppCategoryAssignedTargetingOptionDetails
   */
  public function getAppCategoryDetails()
  {
    return $this->appCategoryDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_AppAssignedTargetingOptionDetails
   */
  public function setAppDetails(Google_Service_DisplayVideo_AppAssignedTargetingOptionDetails $appDetails)
  {
    $this->appDetails = $appDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AppAssignedTargetingOptionDetails
   */
  public function getAppDetails()
  {
    return $this->appDetails;
  }
  public function setAssignedTargetingOptionId($assignedTargetingOptionId)
  {
    $this->assignedTargetingOptionId = $assignedTargetingOptionId;
  }
  public function getAssignedTargetingOptionId()
  {
    return $this->assignedTargetingOptionId;
  }
  /**
   * @param Google_Service_DisplayVideo_AudienceGroupAssignedTargetingOptionDetails
   */
  public function setAudienceGroupDetails(Google_Service_DisplayVideo_AudienceGroupAssignedTargetingOptionDetails $audienceGroupDetails)
  {
    $this->audienceGroupDetails = $audienceGroupDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AudienceGroupAssignedTargetingOptionDetails
   */
  public function getAudienceGroupDetails()
  {
    return $this->audienceGroupDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_AuthorizedSellerStatusAssignedTargetingOptionDetails
   */
  public function setAuthorizedSellerStatusDetails(Google_Service_DisplayVideo_AuthorizedSellerStatusAssignedTargetingOptionDetails $authorizedSellerStatusDetails)
  {
    $this->authorizedSellerStatusDetails = $authorizedSellerStatusDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_AuthorizedSellerStatusAssignedTargetingOptionDetails
   */
  public function getAuthorizedSellerStatusDetails()
  {
    return $this->authorizedSellerStatusDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_BrowserAssignedTargetingOptionDetails
   */
  public function setBrowserDetails(Google_Service_DisplayVideo_BrowserAssignedTargetingOptionDetails $browserDetails)
  {
    $this->browserDetails = $browserDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_BrowserAssignedTargetingOptionDetails
   */
  public function getBrowserDetails()
  {
    return $this->browserDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_CarrierAndIspAssignedTargetingOptionDetails
   */
  public function setCarrierAndIspDetails(Google_Service_DisplayVideo_CarrierAndIspAssignedTargetingOptionDetails $carrierAndIspDetails)
  {
    $this->carrierAndIspDetails = $carrierAndIspDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_CarrierAndIspAssignedTargetingOptionDetails
   */
  public function getCarrierAndIspDetails()
  {
    return $this->carrierAndIspDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_CategoryAssignedTargetingOptionDetails
   */
  public function setCategoryDetails(Google_Service_DisplayVideo_CategoryAssignedTargetingOptionDetails $categoryDetails)
  {
    $this->categoryDetails = $categoryDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_CategoryAssignedTargetingOptionDetails
   */
  public function getCategoryDetails()
  {
    return $this->categoryDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ChannelAssignedTargetingOptionDetails
   */
  public function setChannelDetails(Google_Service_DisplayVideo_ChannelAssignedTargetingOptionDetails $channelDetails)
  {
    $this->channelDetails = $channelDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ChannelAssignedTargetingOptionDetails
   */
  public function getChannelDetails()
  {
    return $this->channelDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ContentInstreamPositionAssignedTargetingOptionDetails
   */
  public function setContentInstreamPositionDetails(Google_Service_DisplayVideo_ContentInstreamPositionAssignedTargetingOptionDetails $contentInstreamPositionDetails)
  {
    $this->contentInstreamPositionDetails = $contentInstreamPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ContentInstreamPositionAssignedTargetingOptionDetails
   */
  public function getContentInstreamPositionDetails()
  {
    return $this->contentInstreamPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ContentOutstreamPositionAssignedTargetingOptionDetails
   */
  public function setContentOutstreamPositionDetails(Google_Service_DisplayVideo_ContentOutstreamPositionAssignedTargetingOptionDetails $contentOutstreamPositionDetails)
  {
    $this->contentOutstreamPositionDetails = $contentOutstreamPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ContentOutstreamPositionAssignedTargetingOptionDetails
   */
  public function getContentOutstreamPositionDetails()
  {
    return $this->contentOutstreamPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DayAndTimeAssignedTargetingOptionDetails
   */
  public function setDayAndTimeDetails(Google_Service_DisplayVideo_DayAndTimeAssignedTargetingOptionDetails $dayAndTimeDetails)
  {
    $this->dayAndTimeDetails = $dayAndTimeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DayAndTimeAssignedTargetingOptionDetails
   */
  public function getDayAndTimeDetails()
  {
    return $this->dayAndTimeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DeviceMakeModelAssignedTargetingOptionDetails
   */
  public function setDeviceMakeModelDetails(Google_Service_DisplayVideo_DeviceMakeModelAssignedTargetingOptionDetails $deviceMakeModelDetails)
  {
    $this->deviceMakeModelDetails = $deviceMakeModelDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DeviceMakeModelAssignedTargetingOptionDetails
   */
  public function getDeviceMakeModelDetails()
  {
    return $this->deviceMakeModelDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DeviceTypeAssignedTargetingOptionDetails
   */
  public function setDeviceTypeDetails(Google_Service_DisplayVideo_DeviceTypeAssignedTargetingOptionDetails $deviceTypeDetails)
  {
    $this->deviceTypeDetails = $deviceTypeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DeviceTypeAssignedTargetingOptionDetails
   */
  public function getDeviceTypeDetails()
  {
    return $this->deviceTypeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_DigitalContentLabelAssignedTargetingOptionDetails
   */
  public function setDigitalContentLabelExclusionDetails(Google_Service_DisplayVideo_DigitalContentLabelAssignedTargetingOptionDetails $digitalContentLabelExclusionDetails)
  {
    $this->digitalContentLabelExclusionDetails = $digitalContentLabelExclusionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_DigitalContentLabelAssignedTargetingOptionDetails
   */
  public function getDigitalContentLabelExclusionDetails()
  {
    return $this->digitalContentLabelExclusionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_EnvironmentAssignedTargetingOptionDetails
   */
  public function setEnvironmentDetails(Google_Service_DisplayVideo_EnvironmentAssignedTargetingOptionDetails $environmentDetails)
  {
    $this->environmentDetails = $environmentDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_EnvironmentAssignedTargetingOptionDetails
   */
  public function getEnvironmentDetails()
  {
    return $this->environmentDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ExchangeAssignedTargetingOptionDetails
   */
  public function setExchangeDetails(Google_Service_DisplayVideo_ExchangeAssignedTargetingOptionDetails $exchangeDetails)
  {
    $this->exchangeDetails = $exchangeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ExchangeAssignedTargetingOptionDetails
   */
  public function getExchangeDetails()
  {
    return $this->exchangeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_GenderAssignedTargetingOptionDetails
   */
  public function setGenderDetails(Google_Service_DisplayVideo_GenderAssignedTargetingOptionDetails $genderDetails)
  {
    $this->genderDetails = $genderDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_GenderAssignedTargetingOptionDetails
   */
  public function getGenderDetails()
  {
    return $this->genderDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_GeoRegionAssignedTargetingOptionDetails
   */
  public function setGeoRegionDetails(Google_Service_DisplayVideo_GeoRegionAssignedTargetingOptionDetails $geoRegionDetails)
  {
    $this->geoRegionDetails = $geoRegionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_GeoRegionAssignedTargetingOptionDetails
   */
  public function getGeoRegionDetails()
  {
    return $this->geoRegionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_HouseholdIncomeAssignedTargetingOptionDetails
   */
  public function setHouseholdIncomeDetails(Google_Service_DisplayVideo_HouseholdIncomeAssignedTargetingOptionDetails $householdIncomeDetails)
  {
    $this->householdIncomeDetails = $householdIncomeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_HouseholdIncomeAssignedTargetingOptionDetails
   */
  public function getHouseholdIncomeDetails()
  {
    return $this->householdIncomeDetails;
  }
  public function setInheritance($inheritance)
  {
    $this->inheritance = $inheritance;
  }
  public function getInheritance()
  {
    return $this->inheritance;
  }
  /**
   * @param Google_Service_DisplayVideo_InventorySourceAssignedTargetingOptionDetails
   */
  public function setInventorySourceDetails(Google_Service_DisplayVideo_InventorySourceAssignedTargetingOptionDetails $inventorySourceDetails)
  {
    $this->inventorySourceDetails = $inventorySourceDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_InventorySourceAssignedTargetingOptionDetails
   */
  public function getInventorySourceDetails()
  {
    return $this->inventorySourceDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_InventorySourceGroupAssignedTargetingOptionDetails
   */
  public function setInventorySourceGroupDetails(Google_Service_DisplayVideo_InventorySourceGroupAssignedTargetingOptionDetails $inventorySourceGroupDetails)
  {
    $this->inventorySourceGroupDetails = $inventorySourceGroupDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_InventorySourceGroupAssignedTargetingOptionDetails
   */
  public function getInventorySourceGroupDetails()
  {
    return $this->inventorySourceGroupDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_KeywordAssignedTargetingOptionDetails
   */
  public function setKeywordDetails(Google_Service_DisplayVideo_KeywordAssignedTargetingOptionDetails $keywordDetails)
  {
    $this->keywordDetails = $keywordDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_KeywordAssignedTargetingOptionDetails
   */
  public function getKeywordDetails()
  {
    return $this->keywordDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_LanguageAssignedTargetingOptionDetails
   */
  public function setLanguageDetails(Google_Service_DisplayVideo_LanguageAssignedTargetingOptionDetails $languageDetails)
  {
    $this->languageDetails = $languageDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_LanguageAssignedTargetingOptionDetails
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
   * @param Google_Service_DisplayVideo_NativeContentPositionAssignedTargetingOptionDetails
   */
  public function setNativeContentPositionDetails(Google_Service_DisplayVideo_NativeContentPositionAssignedTargetingOptionDetails $nativeContentPositionDetails)
  {
    $this->nativeContentPositionDetails = $nativeContentPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_NativeContentPositionAssignedTargetingOptionDetails
   */
  public function getNativeContentPositionDetails()
  {
    return $this->nativeContentPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_NegativeKeywordListAssignedTargetingOptionDetails
   */
  public function setNegativeKeywordListDetails(Google_Service_DisplayVideo_NegativeKeywordListAssignedTargetingOptionDetails $negativeKeywordListDetails)
  {
    $this->negativeKeywordListDetails = $negativeKeywordListDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_NegativeKeywordListAssignedTargetingOptionDetails
   */
  public function getNegativeKeywordListDetails()
  {
    return $this->negativeKeywordListDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_OnScreenPositionAssignedTargetingOptionDetails
   */
  public function setOnScreenPositionDetails(Google_Service_DisplayVideo_OnScreenPositionAssignedTargetingOptionDetails $onScreenPositionDetails)
  {
    $this->onScreenPositionDetails = $onScreenPositionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_OnScreenPositionAssignedTargetingOptionDetails
   */
  public function getOnScreenPositionDetails()
  {
    return $this->onScreenPositionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_OperatingSystemAssignedTargetingOptionDetails
   */
  public function setOperatingSystemDetails(Google_Service_DisplayVideo_OperatingSystemAssignedTargetingOptionDetails $operatingSystemDetails)
  {
    $this->operatingSystemDetails = $operatingSystemDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_OperatingSystemAssignedTargetingOptionDetails
   */
  public function getOperatingSystemDetails()
  {
    return $this->operatingSystemDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ParentalStatusAssignedTargetingOptionDetails
   */
  public function setParentalStatusDetails(Google_Service_DisplayVideo_ParentalStatusAssignedTargetingOptionDetails $parentalStatusDetails)
  {
    $this->parentalStatusDetails = $parentalStatusDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ParentalStatusAssignedTargetingOptionDetails
   */
  public function getParentalStatusDetails()
  {
    return $this->parentalStatusDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ProximityLocationListAssignedTargetingOptionDetails
   */
  public function setProximityLocationListDetails(Google_Service_DisplayVideo_ProximityLocationListAssignedTargetingOptionDetails $proximityLocationListDetails)
  {
    $this->proximityLocationListDetails = $proximityLocationListDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ProximityLocationListAssignedTargetingOptionDetails
   */
  public function getProximityLocationListDetails()
  {
    return $this->proximityLocationListDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_RegionalLocationListAssignedTargetingOptionDetails
   */
  public function setRegionalLocationListDetails(Google_Service_DisplayVideo_RegionalLocationListAssignedTargetingOptionDetails $regionalLocationListDetails)
  {
    $this->regionalLocationListDetails = $regionalLocationListDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_RegionalLocationListAssignedTargetingOptionDetails
   */
  public function getRegionalLocationListDetails()
  {
    return $this->regionalLocationListDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_SensitiveCategoryAssignedTargetingOptionDetails
   */
  public function setSensitiveCategoryExclusionDetails(Google_Service_DisplayVideo_SensitiveCategoryAssignedTargetingOptionDetails $sensitiveCategoryExclusionDetails)
  {
    $this->sensitiveCategoryExclusionDetails = $sensitiveCategoryExclusionDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_SensitiveCategoryAssignedTargetingOptionDetails
   */
  public function getSensitiveCategoryExclusionDetails()
  {
    return $this->sensitiveCategoryExclusionDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_SubExchangeAssignedTargetingOptionDetails
   */
  public function setSubExchangeDetails(Google_Service_DisplayVideo_SubExchangeAssignedTargetingOptionDetails $subExchangeDetails)
  {
    $this->subExchangeDetails = $subExchangeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_SubExchangeAssignedTargetingOptionDetails
   */
  public function getSubExchangeDetails()
  {
    return $this->subExchangeDetails;
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
   * @param Google_Service_DisplayVideo_ThirdPartyVerifierAssignedTargetingOptionDetails
   */
  public function setThirdPartyVerifierDetails(Google_Service_DisplayVideo_ThirdPartyVerifierAssignedTargetingOptionDetails $thirdPartyVerifierDetails)
  {
    $this->thirdPartyVerifierDetails = $thirdPartyVerifierDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ThirdPartyVerifierAssignedTargetingOptionDetails
   */
  public function getThirdPartyVerifierDetails()
  {
    return $this->thirdPartyVerifierDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_UrlAssignedTargetingOptionDetails
   */
  public function setUrlDetails(Google_Service_DisplayVideo_UrlAssignedTargetingOptionDetails $urlDetails)
  {
    $this->urlDetails = $urlDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_UrlAssignedTargetingOptionDetails
   */
  public function getUrlDetails()
  {
    return $this->urlDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_UserRewardedContentAssignedTargetingOptionDetails
   */
  public function setUserRewardedContentDetails(Google_Service_DisplayVideo_UserRewardedContentAssignedTargetingOptionDetails $userRewardedContentDetails)
  {
    $this->userRewardedContentDetails = $userRewardedContentDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_UserRewardedContentAssignedTargetingOptionDetails
   */
  public function getUserRewardedContentDetails()
  {
    return $this->userRewardedContentDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_VideoPlayerSizeAssignedTargetingOptionDetails
   */
  public function setVideoPlayerSizeDetails(Google_Service_DisplayVideo_VideoPlayerSizeAssignedTargetingOptionDetails $videoPlayerSizeDetails)
  {
    $this->videoPlayerSizeDetails = $videoPlayerSizeDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_VideoPlayerSizeAssignedTargetingOptionDetails
   */
  public function getVideoPlayerSizeDetails()
  {
    return $this->videoPlayerSizeDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_ViewabilityAssignedTargetingOptionDetails
   */
  public function setViewabilityDetails(Google_Service_DisplayVideo_ViewabilityAssignedTargetingOptionDetails $viewabilityDetails)
  {
    $this->viewabilityDetails = $viewabilityDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_ViewabilityAssignedTargetingOptionDetails
   */
  public function getViewabilityDetails()
  {
    return $this->viewabilityDetails;
  }
}
