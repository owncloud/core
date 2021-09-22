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
  public $accountId;
  public $adBlockingOptOut;
  protected $additionalSizesType = Size::class;
  protected $additionalSizesDataType = 'array';
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  public $archived;
  public $campaignId;
  protected $campaignIdDimensionValueType = DimensionValue::class;
  protected $campaignIdDimensionValueDataType = '';
  public $comment;
  public $compatibility;
  public $contentCategoryId;
  protected $createInfoType = LastModifiedInfo::class;
  protected $createInfoDataType = '';
  public $directorySiteId;
  protected $directorySiteIdDimensionValueType = DimensionValue::class;
  protected $directorySiteIdDimensionValueDataType = '';
  public $externalId;
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  public $keyName;
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  protected $lookbackConfigurationType = LookbackConfiguration::class;
  protected $lookbackConfigurationDataType = '';
  public $name;
  protected $partnerWrappingDataType = MeasurementPartnerWrappingData::class;
  protected $partnerWrappingDataDataType = '';
  public $paymentApproved;
  public $paymentSource;
  public $placementGroupId;
  protected $placementGroupIdDimensionValueType = DimensionValue::class;
  protected $placementGroupIdDimensionValueDataType = '';
  public $placementStrategyId;
  protected $pricingScheduleType = PricingSchedule::class;
  protected $pricingScheduleDataType = '';
  public $primary;
  protected $publisherUpdateInfoType = LastModifiedInfo::class;
  protected $publisherUpdateInfoDataType = '';
  public $siteId;
  protected $siteIdDimensionValueType = DimensionValue::class;
  protected $siteIdDimensionValueDataType = '';
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  public $sslRequired;
  public $status;
  public $subaccountId;
  public $tagFormats;
  protected $tagSettingType = TagSetting::class;
  protected $tagSettingDataType = '';
  public $videoActiveViewOptOut;
  protected $videoSettingsType = VideoSettings::class;
  protected $videoSettingsDataType = '';
  public $vpaidAdapterChoice;
  public $wrappingOptOut;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdBlockingOptOut($adBlockingOptOut)
  {
    $this->adBlockingOptOut = $adBlockingOptOut;
  }
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
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
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
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  public function getArchived()
  {
    return $this->archived;
  }
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
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
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  public function setContentCategoryId($contentCategoryId)
  {
    $this->contentCategoryId = $contentCategoryId;
  }
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
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
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
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  public function getExternalId()
  {
    return $this->externalId;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setKeyName($keyName)
  {
    $this->keyName = $keyName;
  }
  public function getKeyName()
  {
    return $this->keyName;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setPaymentApproved($paymentApproved)
  {
    $this->paymentApproved = $paymentApproved;
  }
  public function getPaymentApproved()
  {
    return $this->paymentApproved;
  }
  public function setPaymentSource($paymentSource)
  {
    $this->paymentSource = $paymentSource;
  }
  public function getPaymentSource()
  {
    return $this->paymentSource;
  }
  public function setPlacementGroupId($placementGroupId)
  {
    $this->placementGroupId = $placementGroupId;
  }
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
  public function setPlacementStrategyId($placementStrategyId)
  {
    $this->placementStrategyId = $placementStrategyId;
  }
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
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
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
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
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
  public function setSslRequired($sslRequired)
  {
    $this->sslRequired = $sslRequired;
  }
  public function getSslRequired()
  {
    return $this->sslRequired;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTagFormats($tagFormats)
  {
    $this->tagFormats = $tagFormats;
  }
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
  public function setVideoActiveViewOptOut($videoActiveViewOptOut)
  {
    $this->videoActiveViewOptOut = $videoActiveViewOptOut;
  }
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
  public function setVpaidAdapterChoice($vpaidAdapterChoice)
  {
    $this->vpaidAdapterChoice = $vpaidAdapterChoice;
  }
  public function getVpaidAdapterChoice()
  {
    return $this->vpaidAdapterChoice;
  }
  public function setWrappingOptOut($wrappingOptOut)
  {
    $this->wrappingOptOut = $wrappingOptOut;
  }
  public function getWrappingOptOut()
  {
    return $this->wrappingOptOut;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Placement::class, 'Google_Service_Dfareporting_Placement');
