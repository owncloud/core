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

class Ad extends \Google\Collection
{
  protected $collection_key = 'placementAssignments';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var bool
   */
  public $active;
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
  /**
   * @var string
   */
  public $audienceSegmentId;
  /**
   * @var string
   */
  public $campaignId;
  protected $campaignIdDimensionValueType = DimensionValue::class;
  protected $campaignIdDimensionValueDataType = '';
  protected $clickThroughUrlType = ClickThroughUrl::class;
  protected $clickThroughUrlDataType = '';
  protected $clickThroughUrlSuffixPropertiesType = ClickThroughUrlSuffixProperties::class;
  protected $clickThroughUrlSuffixPropertiesDataType = '';
  /**
   * @var string
   */
  public $comments;
  /**
   * @var string
   */
  public $compatibility;
  protected $createInfoType = LastModifiedInfo::class;
  protected $createInfoDataType = '';
  protected $creativeGroupAssignmentsType = CreativeGroupAssignment::class;
  protected $creativeGroupAssignmentsDataType = 'array';
  protected $creativeRotationType = CreativeRotation::class;
  protected $creativeRotationDataType = '';
  protected $dayPartTargetingType = DayPartTargeting::class;
  protected $dayPartTargetingDataType = '';
  protected $defaultClickThroughEventTagPropertiesType = DefaultClickThroughEventTagProperties::class;
  protected $defaultClickThroughEventTagPropertiesDataType = '';
  protected $deliveryScheduleType = DeliverySchedule::class;
  protected $deliveryScheduleDataType = '';
  /**
   * @var bool
   */
  public $dynamicClickTracker;
  /**
   * @var string
   */
  public $endTime;
  protected $eventTagOverridesType = EventTagOverride::class;
  protected $eventTagOverridesDataType = 'array';
  protected $geoTargetingType = GeoTargeting::class;
  protected $geoTargetingDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  protected $keyValueTargetingExpressionType = KeyValueTargetingExpression::class;
  protected $keyValueTargetingExpressionDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $languageTargetingType = LanguageTargeting::class;
  protected $languageTargetingDataType = '';
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $placementAssignmentsType = PlacementAssignment::class;
  protected $placementAssignmentsDataType = 'array';
  protected $remarketingListExpressionType = ListTargetingExpression::class;
  protected $remarketingListExpressionDataType = '';
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  /**
   * @var bool
   */
  public $sslCompliant;
  /**
   * @var bool
   */
  public $sslRequired;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $targetingTemplateId;
  protected $technologyTargetingType = TechnologyTargeting::class;
  protected $technologyTargetingDataType = '';
  /**
   * @var string
   */
  public $type;

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
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
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
   * @param string
   */
  public function setAudienceSegmentId($audienceSegmentId)
  {
    $this->audienceSegmentId = $audienceSegmentId;
  }
  /**
   * @return string
   */
  public function getAudienceSegmentId()
  {
    return $this->audienceSegmentId;
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
   * @param ClickThroughUrl
   */
  public function setClickThroughUrl(ClickThroughUrl $clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  /**
   * @return ClickThroughUrl
   */
  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
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
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return string
   */
  public function getComments()
  {
    return $this->comments;
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
   * @param CreativeGroupAssignment[]
   */
  public function setCreativeGroupAssignments($creativeGroupAssignments)
  {
    $this->creativeGroupAssignments = $creativeGroupAssignments;
  }
  /**
   * @return CreativeGroupAssignment[]
   */
  public function getCreativeGroupAssignments()
  {
    return $this->creativeGroupAssignments;
  }
  /**
   * @param CreativeRotation
   */
  public function setCreativeRotation(CreativeRotation $creativeRotation)
  {
    $this->creativeRotation = $creativeRotation;
  }
  /**
   * @return CreativeRotation
   */
  public function getCreativeRotation()
  {
    return $this->creativeRotation;
  }
  /**
   * @param DayPartTargeting
   */
  public function setDayPartTargeting(DayPartTargeting $dayPartTargeting)
  {
    $this->dayPartTargeting = $dayPartTargeting;
  }
  /**
   * @return DayPartTargeting
   */
  public function getDayPartTargeting()
  {
    return $this->dayPartTargeting;
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
   * @param DeliverySchedule
   */
  public function setDeliverySchedule(DeliverySchedule $deliverySchedule)
  {
    $this->deliverySchedule = $deliverySchedule;
  }
  /**
   * @return DeliverySchedule
   */
  public function getDeliverySchedule()
  {
    return $this->deliverySchedule;
  }
  /**
   * @param bool
   */
  public function setDynamicClickTracker($dynamicClickTracker)
  {
    $this->dynamicClickTracker = $dynamicClickTracker;
  }
  /**
   * @return bool
   */
  public function getDynamicClickTracker()
  {
    return $this->dynamicClickTracker;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
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
   * @param GeoTargeting
   */
  public function setGeoTargeting(GeoTargeting $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return GeoTargeting
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
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
   * @param KeyValueTargetingExpression
   */
  public function setKeyValueTargetingExpression(KeyValueTargetingExpression $keyValueTargetingExpression)
  {
    $this->keyValueTargetingExpression = $keyValueTargetingExpression;
  }
  /**
   * @return KeyValueTargetingExpression
   */
  public function getKeyValueTargetingExpression()
  {
    return $this->keyValueTargetingExpression;
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
   * @param LanguageTargeting
   */
  public function setLanguageTargeting(LanguageTargeting $languageTargeting)
  {
    $this->languageTargeting = $languageTargeting;
  }
  /**
   * @return LanguageTargeting
   */
  public function getLanguageTargeting()
  {
    return $this->languageTargeting;
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
   * @param PlacementAssignment[]
   */
  public function setPlacementAssignments($placementAssignments)
  {
    $this->placementAssignments = $placementAssignments;
  }
  /**
   * @return PlacementAssignment[]
   */
  public function getPlacementAssignments()
  {
    return $this->placementAssignments;
  }
  /**
   * @param ListTargetingExpression
   */
  public function setRemarketingListExpression(ListTargetingExpression $remarketingListExpression)
  {
    $this->remarketingListExpression = $remarketingListExpression;
  }
  /**
   * @return ListTargetingExpression
   */
  public function getRemarketingListExpression()
  {
    return $this->remarketingListExpression;
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
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  /**
   * @return bool
   */
  public function getSslCompliant()
  {
    return $this->sslCompliant;
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
   * @param string
   */
  public function setTargetingTemplateId($targetingTemplateId)
  {
    $this->targetingTemplateId = $targetingTemplateId;
  }
  /**
   * @return string
   */
  public function getTargetingTemplateId()
  {
    return $this->targetingTemplateId;
  }
  /**
   * @param TechnologyTargeting
   */
  public function setTechnologyTargeting(TechnologyTargeting $technologyTargeting)
  {
    $this->technologyTargeting = $technologyTargeting;
  }
  /**
   * @return TechnologyTargeting
   */
  public function getTechnologyTargeting()
  {
    return $this->technologyTargeting;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Ad::class, 'Google_Service_Dfareporting_Ad');
