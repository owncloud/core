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

class Placement extends \Google\Collection
{
  protected $collection_key = 'tagFormats';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $activeStatus;
  /**
   * @var bool
   */
  public $adBlockingOptOut;
  protected $additionalSizesType = Size::class;
  protected $additionalSizesDataType = 'array';
  /**
   * @var string
   */
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $campaignId;
  protected $campaignIdDimensionValueType = DimensionValue::class;
  protected $campaignIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $comment;
  /**
   * @var string
   */
  public $compatibility;
  /**
   * @var string
   */
  public $contentCategoryId;
  protected $createInfoType = LastModifiedInfo::class;
  protected $createInfoDataType = '';
  /**
   * @var string
   */
  public $directorySiteId;
  protected $directorySiteIdDimensionValueType = DimensionValue::class;
  protected $directorySiteIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $externalId;
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var string
   */
  public $keyName;
  /**
   * @var string
   */
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  protected $lookbackConfigurationType = LookbackConfiguration::class;
  protected $lookbackConfigurationDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $partnerWrappingDataType = MeasurementPartnerWrappingData::class;
  protected $partnerWrappingDataDataType = '';
  /**
   * @var bool
   */
  public $paymentApproved;
  /**
   * @var string
   */
  public $paymentSource;
  /**
   * @var string
   */
  public $placementGroupId;
  protected $placementGroupIdDimensionValueType = DimensionValue::class;
  protected $placementGroupIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $placementStrategyId;
  protected $pricingScheduleType = PricingSchedule::class;
  protected $pricingScheduleDataType = '';
  /**
   * @var bool
   */
  public $primary;
  protected $publisherUpdateInfoType = LastModifiedInfo::class;
  protected $publisherUpdateInfoDataType = '';
  /**
   * @var string
   */
  public $siteId;
  protected $siteIdDimensionValueType = DimensionValue::class;
  protected $siteIdDimensionValueDataType = '';
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  /**
   * @var bool
   */
  public $sslRequired;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string[]
   */
  public $tagFormats;
  protected $tagSettingType = TagSetting::class;
  protected $tagSettingDataType = '';
  /**
   * @var bool
   */
  public $videoActiveViewOptOut;
  protected $videoSettingsType = VideoSettings::class;
  protected $videoSettingsDataType = '';
  /**
   * @var string
   */
  public $vpaidAdapterChoice;
  /**
   * @var bool
   */
  public $wrappingOptOut;

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
  public function setActiveStatus($activeStatus)
  {
    $this->activeStatus = $activeStatus;
  }
  /**
   * @return string
   */
  public function getActiveStatus()
  {
    return $this->activeStatus;
  }
  /**
   * @param bool
   */
  public function setAdBlockingOptOut($adBlockingOptOut)
  {
    $this->adBlockingOptOut = $adBlockingOptOut;
  }
  /**
   * @return bool
   */
  public function getAdBlockingOptOut()
  {
    return $this->adBlockingOptOut;
  }
  /**
   * @param Size[]
   */
  public function setAdditionalSizes($additionalSizes)
  {
    $this->additionalSizes = $additionalSizes;
  }
  /**
   * @return Size[]
   */
  public function getAdditionalSizes()
  {
    return $this->additionalSizes;
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
   * @param string
   */
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  /**
   * @return string
   */
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  /**
   * @param DimensionValue
   */
  public function setCampaignIdDimensionValue(DimensionValue $campaignIdDimensionValue)
  {
    $this->campaignIdDimensionValue = $campaignIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getCampaignIdDimensionValue()
  {
    return $this->campaignIdDimensionValue;
  }
  /**
   * @param string
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param string
   */
  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  /**
   * @return string
   */
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  /**
   * @param string
   */
  public function setContentCategoryId($contentCategoryId)
  {
    $this->contentCategoryId = $contentCategoryId;
  }
  /**
   * @return string
   */
  public function getContentCategoryId()
  {
    return $this->contentCategoryId;
  }
  /**
   * @param LastModifiedInfo
   */
  public function setCreateInfo(LastModifiedInfo $createInfo)
  {
    $this->createInfo = $createInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getCreateInfo()
  {
    return $this->createInfo;
  }
  /**
   * @param string
   */
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
  /**
   * @return string
   */
  public function getDirectorySiteId()
  {
    return $this->directorySiteId;
  }
  /**
   * @param DimensionValue
   */
  public function setDirectorySiteIdDimensionValue(DimensionValue $directorySiteIdDimensionValue)
  {
    $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getDirectorySiteIdDimensionValue()
  {
    return $this->directorySiteIdDimensionValue;
  }
  /**
   * @param string
   */
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  /**
   * @return string
   */
  public function getExternalId()
  {
    return $this->externalId;
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
   * @param string
   */
  public function setKeyName($keyName)
  {
    $this->keyName = $keyName;
  }
  /**
   * @return string
   */
  public function getKeyName()
  {
    return $this->keyName;
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
   * @param LastModifiedInfo
   */
  public function setLastModifiedInfo(LastModifiedInfo $lastModifiedInfo)
  {
    $this->lastModifiedInfo = $lastModifiedInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getLastModifiedInfo()
  {
    return $this->lastModifiedInfo;
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
   * @param MeasurementPartnerWrappingData
   */
  public function setPartnerWrappingData(MeasurementPartnerWrappingData $partnerWrappingData)
  {
    $this->partnerWrappingData = $partnerWrappingData;
  }
  /**
   * @return MeasurementPartnerWrappingData
   */
  public function getPartnerWrappingData()
  {
    return $this->partnerWrappingData;
  }
  /**
   * @param bool
   */
  public function setPaymentApproved($paymentApproved)
  {
    $this->paymentApproved = $paymentApproved;
  }
  /**
   * @return bool
   */
  public function getPaymentApproved()
  {
    return $this->paymentApproved;
  }
  /**
   * @param string
   */
  public function setPaymentSource($paymentSource)
  {
    $this->paymentSource = $paymentSource;
  }
  /**
   * @return string
   */
  public function getPaymentSource()
  {
    return $this->paymentSource;
  }
  /**
   * @param string
   */
  public function setPlacementGroupId($placementGroupId)
  {
    $this->placementGroupId = $placementGroupId;
  }
  /**
   * @return string
   */
  public function getPlacementGroupId()
  {
    return $this->placementGroupId;
  }
  /**
   * @param DimensionValue
   */
  public function setPlacementGroupIdDimensionValue(DimensionValue $placementGroupIdDimensionValue)
  {
    $this->placementGroupIdDimensionValue = $placementGroupIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getPlacementGroupIdDimensionValue()
  {
    return $this->placementGroupIdDimensionValue;
  }
  /**
   * @param string
   */
  public function setPlacementStrategyId($placementStrategyId)
  {
    $this->placementStrategyId = $placementStrategyId;
  }
  /**
   * @return string
   */
  public function getPlacementStrategyId()
  {
    return $this->placementStrategyId;
  }
  /**
   * @param PricingSchedule
   */
  public function setPricingSchedule(PricingSchedule $pricingSchedule)
  {
    $this->pricingSchedule = $pricingSchedule;
  }
  /**
   * @return PricingSchedule
   */
  public function getPricingSchedule()
  {
    return $this->pricingSchedule;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param LastModifiedInfo
   */
  public function setPublisherUpdateInfo(LastModifiedInfo $publisherUpdateInfo)
  {
    $this->publisherUpdateInfo = $publisherUpdateInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getPublisherUpdateInfo()
  {
    return $this->publisherUpdateInfo;
  }
  /**
   * @param string
   */
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  /**
   * @return string
   */
  public function getSiteId()
  {
    return $this->siteId;
  }
  /**
   * @param DimensionValue
   */
  public function setSiteIdDimensionValue(DimensionValue $siteIdDimensionValue)
  {
    $this->siteIdDimensionValue = $siteIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getSiteIdDimensionValue()
  {
    return $this->siteIdDimensionValue;
  }
  /**
   * @param Size
   */
  public function setSize(Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Size
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param bool
   */
  public function setSslRequired($sslRequired)
  {
    $this->sslRequired = $sslRequired;
  }
  /**
   * @return bool
   */
  public function getSslRequired()
  {
    return $this->sslRequired;
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
   * @param string[]
   */
  public function setTagFormats($tagFormats)
  {
    $this->tagFormats = $tagFormats;
  }
  /**
   * @return string[]
   */
  public function getTagFormats()
  {
    return $this->tagFormats;
  }
  /**
   * @param TagSetting
   */
  public function setTagSetting(TagSetting $tagSetting)
  {
    $this->tagSetting = $tagSetting;
  }
  /**
   * @return TagSetting
   */
  public function getTagSetting()
  {
    return $this->tagSetting;
  }
  /**
   * @param bool
   */
  public function setVideoActiveViewOptOut($videoActiveViewOptOut)
  {
    $this->videoActiveViewOptOut = $videoActiveViewOptOut;
  }
  /**
   * @return bool
   */
  public function getVideoActiveViewOptOut()
  {
    return $this->videoActiveViewOptOut;
  }
  /**
   * @param VideoSettings
   */
  public function setVideoSettings(VideoSettings $videoSettings)
  {
    $this->videoSettings = $videoSettings;
  }
  /**
   * @return VideoSettings
   */
  public function getVideoSettings()
  {
    return $this->videoSettings;
  }
  /**
   * @param string
   */
  public function setVpaidAdapterChoice($vpaidAdapterChoice)
  {
    $this->vpaidAdapterChoice = $vpaidAdapterChoice;
  }
  /**
   * @return string
   */
  public function getVpaidAdapterChoice()
  {
    return $this->vpaidAdapterChoice;
  }
  /**
   * @param bool
   */
  public function setWrappingOptOut($wrappingOptOut)
  {
    $this->wrappingOptOut = $wrappingOptOut;
  }
  /**
   * @return bool
   */
  public function getWrappingOptOut()
  {
    return $this->wrappingOptOut;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Placement::class, 'Google_Service_Dfareporting_Placement');
