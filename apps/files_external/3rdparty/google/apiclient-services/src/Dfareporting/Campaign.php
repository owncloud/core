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

class Campaign extends \Google\Collection
{
  protected $collection_key = 'eventTagOverrides';
  /**
   * @var string
   */
  public $accountId;
  protected $adBlockingConfigurationType = AdBlockingConfiguration::class;
  protected $adBlockingConfigurationDataType = '';
  protected $additionalCreativeOptimizationConfigurationsType = CreativeOptimizationConfiguration::class;
  protected $additionalCreativeOptimizationConfigurationsDataType = 'array';
  /**
   * @var string
   */
  public $advertiserGroupId;
  /**
   * @var string
   */
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  /**
   * @var bool
   */
  public $archived;
  protected $audienceSegmentGroupsType = AudienceSegmentGroup::class;
  protected $audienceSegmentGroupsDataType = 'array';
  /**
   * @var string
   */
  public $billingInvoiceCode;
  protected $clickThroughUrlSuffixPropertiesType = ClickThroughUrlSuffixProperties::class;
  protected $clickThroughUrlSuffixPropertiesDataType = '';
  /**
   * @var string
   */
  public $comment;
  protected $createInfoType = LastModifiedInfo::class;
  protected $createInfoDataType = '';
  /**
   * @var string[]
   */
  public $creativeGroupIds;
  protected $creativeOptimizationConfigurationType = CreativeOptimizationConfiguration::class;
  protected $creativeOptimizationConfigurationDataType = '';
  protected $defaultClickThroughEventTagPropertiesType = DefaultClickThroughEventTagProperties::class;
  protected $defaultClickThroughEventTagPropertiesDataType = '';
  /**
   * @var string
   */
  public $defaultLandingPageId;
  /**
   * @var string
   */
  public $endDate;
  protected $eventTagOverridesType = EventTagOverride::class;
  protected $eventTagOverridesDataType = 'array';
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
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  protected $measurementPartnerLinkType = MeasurementPartnerCampaignLink::class;
  protected $measurementPartnerLinkDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var string
   */
  public $subaccountId;

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
   * @param AdBlockingConfiguration
   */
  public function setAdBlockingConfiguration(AdBlockingConfiguration $adBlockingConfiguration)
  {
    $this->adBlockingConfiguration = $adBlockingConfiguration;
  }
  /**
   * @return AdBlockingConfiguration
   */
  public function getAdBlockingConfiguration()
  {
    return $this->adBlockingConfiguration;
  }
  /**
   * @param CreativeOptimizationConfiguration[]
   */
  public function setAdditionalCreativeOptimizationConfigurations($additionalCreativeOptimizationConfigurations)
  {
    $this->additionalCreativeOptimizationConfigurations = $additionalCreativeOptimizationConfigurations;
  }
  /**
   * @return CreativeOptimizationConfiguration[]
   */
  public function getAdditionalCreativeOptimizationConfigurations()
  {
    return $this->additionalCreativeOptimizationConfigurations;
  }
  /**
   * @param string
   */
  public function setAdvertiserGroupId($advertiserGroupId)
  {
    $this->advertiserGroupId = $advertiserGroupId;
  }
  /**
   * @return string
   */
  public function getAdvertiserGroupId()
  {
    return $this->advertiserGroupId;
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
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  /**
   * @return bool
   */
  public function getArchived()
  {
    return $this->archived;
  }
  /**
   * @param AudienceSegmentGroup[]
   */
  public function setAudienceSegmentGroups($audienceSegmentGroups)
  {
    $this->audienceSegmentGroups = $audienceSegmentGroups;
  }
  /**
   * @return AudienceSegmentGroup[]
   */
  public function getAudienceSegmentGroups()
  {
    return $this->audienceSegmentGroups;
  }
  /**
   * @param string
   */
  public function setBillingInvoiceCode($billingInvoiceCode)
  {
    $this->billingInvoiceCode = $billingInvoiceCode;
  }
  /**
   * @return string
   */
  public function getBillingInvoiceCode()
  {
    return $this->billingInvoiceCode;
  }
  /**
   * @param ClickThroughUrlSuffixProperties
   */
  public function setClickThroughUrlSuffixProperties(ClickThroughUrlSuffixProperties $clickThroughUrlSuffixProperties)
  {
    $this->clickThroughUrlSuffixProperties = $clickThroughUrlSuffixProperties;
  }
  /**
   * @return ClickThroughUrlSuffixProperties
   */
  public function getClickThroughUrlSuffixProperties()
  {
    return $this->clickThroughUrlSuffixProperties;
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
   * @param string[]
   */
  public function setCreativeGroupIds($creativeGroupIds)
  {
    $this->creativeGroupIds = $creativeGroupIds;
  }
  /**
   * @return string[]
   */
  public function getCreativeGroupIds()
  {
    return $this->creativeGroupIds;
  }
  /**
   * @param CreativeOptimizationConfiguration
   */
  public function setCreativeOptimizationConfiguration(CreativeOptimizationConfiguration $creativeOptimizationConfiguration)
  {
    $this->creativeOptimizationConfiguration = $creativeOptimizationConfiguration;
  }
  /**
   * @return CreativeOptimizationConfiguration
   */
  public function getCreativeOptimizationConfiguration()
  {
    return $this->creativeOptimizationConfiguration;
  }
  /**
   * @param DefaultClickThroughEventTagProperties
   */
  public function setDefaultClickThroughEventTagProperties(DefaultClickThroughEventTagProperties $defaultClickThroughEventTagProperties)
  {
    $this->defaultClickThroughEventTagProperties = $defaultClickThroughEventTagProperties;
  }
  /**
   * @return DefaultClickThroughEventTagProperties
   */
  public function getDefaultClickThroughEventTagProperties()
  {
    return $this->defaultClickThroughEventTagProperties;
  }
  /**
   * @param string
   */
  public function setDefaultLandingPageId($defaultLandingPageId)
  {
    $this->defaultLandingPageId = $defaultLandingPageId;
  }
  /**
   * @return string
   */
  public function getDefaultLandingPageId()
  {
    return $this->defaultLandingPageId;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param EventTagOverride[]
   */
  public function setEventTagOverrides($eventTagOverrides)
  {
    $this->eventTagOverrides = $eventTagOverrides;
  }
  /**
   * @return EventTagOverride[]
   */
  public function getEventTagOverrides()
  {
    return $this->eventTagOverrides;
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
   * @param MeasurementPartnerCampaignLink
   */
  public function setMeasurementPartnerLink(MeasurementPartnerCampaignLink $measurementPartnerLink)
  {
    $this->measurementPartnerLink = $measurementPartnerLink;
  }
  /**
   * @return MeasurementPartnerCampaignLink
   */
  public function getMeasurementPartnerLink()
  {
    return $this->measurementPartnerLink;
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
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Campaign::class, 'Google_Service_Dfareporting_Campaign');
