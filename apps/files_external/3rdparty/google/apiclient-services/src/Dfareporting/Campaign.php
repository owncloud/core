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
  protected $collection_key = 'traffickerEmails';
  public $accountId;
  protected $adBlockingConfigurationType = AdBlockingConfiguration::class;
  protected $adBlockingConfigurationDataType = '';
  protected $additionalCreativeOptimizationConfigurationsType = CreativeOptimizationConfiguration::class;
  protected $additionalCreativeOptimizationConfigurationsDataType = 'array';
  public $advertiserGroupId;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  public $archived;
  protected $audienceSegmentGroupsType = AudienceSegmentGroup::class;
  protected $audienceSegmentGroupsDataType = 'array';
  public $billingInvoiceCode;
  protected $clickThroughUrlSuffixPropertiesType = ClickThroughUrlSuffixProperties::class;
  protected $clickThroughUrlSuffixPropertiesDataType = '';
  public $comment;
  protected $createInfoType = LastModifiedInfo::class;
  protected $createInfoDataType = '';
  public $creativeGroupIds;
  protected $creativeOptimizationConfigurationType = CreativeOptimizationConfiguration::class;
  protected $creativeOptimizationConfigurationDataType = '';
  protected $defaultClickThroughEventTagPropertiesType = DefaultClickThroughEventTagProperties::class;
  protected $defaultClickThroughEventTagPropertiesDataType = '';
  public $defaultLandingPageId;
  public $endDate;
  protected $eventTagOverridesType = EventTagOverride::class;
  protected $eventTagOverridesDataType = 'array';
  public $externalId;
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  protected $measurementPartnerLinkType = MeasurementPartnerCampaignLink::class;
  protected $measurementPartnerLinkDataType = '';
  public $name;
  public $nielsenOcrEnabled;
  public $startDate;
  public $subaccountId;
  public $traffickerEmails;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
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
  public function setAdvertiserGroupId($advertiserGroupId)
  {
    $this->advertiserGroupId = $advertiserGroupId;
  }
  public function getAdvertiserGroupId()
  {
    return $this->advertiserGroupId;
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
  public function setBillingInvoiceCode($billingInvoiceCode)
  {
    $this->billingInvoiceCode = $billingInvoiceCode;
  }
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
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
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
  public function setCreativeGroupIds($creativeGroupIds)
  {
    $this->creativeGroupIds = $creativeGroupIds;
  }
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
  public function setDefaultLandingPageId($defaultLandingPageId)
  {
    $this->defaultLandingPageId = $defaultLandingPageId;
  }
  public function getDefaultLandingPageId()
  {
    return $this->defaultLandingPageId;
  }
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNielsenOcrEnabled($nielsenOcrEnabled)
  {
    $this->nielsenOcrEnabled = $nielsenOcrEnabled;
  }
  public function getNielsenOcrEnabled()
  {
    return $this->nielsenOcrEnabled;
  }
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTraffickerEmails($traffickerEmails)
  {
    $this->traffickerEmails = $traffickerEmails;
  }
  public function getTraffickerEmails()
  {
    return $this->traffickerEmails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Campaign::class, 'Google_Service_Dfareporting_Campaign');
