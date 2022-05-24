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

class PlacementGroup extends \Google\Collection
{
  protected $collection_key = 'childPlacementIds';
  /**
   * @var string
   */
  public $accountId;
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
  public $campaignId;
  protected $campaignIdDimensionValueType = DimensionValue::class;
  protected $campaignIdDimensionValueDataType = '';
  /**
   * @var string[]
   */
  public $childPlacementIds;
  /**
   * @var string
   */
  public $comment;
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
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $placementGroupType;
  /**
   * @var string
   */
  public $placementStrategyId;
  protected $pricingScheduleType = PricingSchedule::class;
  protected $pricingScheduleDataType = '';
  /**
   * @var string
   */
  public $primaryPlacementId;
  protected $primaryPlacementIdDimensionValueType = DimensionValue::class;
  protected $primaryPlacementIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $siteId;
  protected $siteIdDimensionValueType = DimensionValue::class;
  protected $siteIdDimensionValueDataType = '';
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
   * @param string[]
   */
  public function setChildPlacementIds($childPlacementIds)
  {
    $this->childPlacementIds = $childPlacementIds;
  }
  /**
   * @return string[]
   */
  public function getChildPlacementIds()
  {
    return $this->childPlacementIds;
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
  public function setPlacementGroupType($placementGroupType)
  {
    $this->placementGroupType = $placementGroupType;
  }
  /**
   * @return string
   */
  public function getPlacementGroupType()
  {
    return $this->placementGroupType;
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
   * @param string
   */
  public function setPrimaryPlacementId($primaryPlacementId)
  {
    $this->primaryPlacementId = $primaryPlacementId;
  }
  /**
   * @return string
   */
  public function getPrimaryPlacementId()
  {
    return $this->primaryPlacementId;
  }
  /**
   * @param DimensionValue
   */
  public function setPrimaryPlacementIdDimensionValue(DimensionValue $primaryPlacementIdDimensionValue)
  {
    $this->primaryPlacementIdDimensionValue = $primaryPlacementIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getPrimaryPlacementIdDimensionValue()
  {
    return $this->primaryPlacementIdDimensionValue;
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
class_alias(PlacementGroup::class, 'Google_Service_Dfareporting_PlacementGroup');
