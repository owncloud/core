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

class FloodlightActivity extends \Google\Collection
{
  protected $collection_key = 'userDefinedVariableTypes';
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
  public $attributionEnabled;
  /**
   * @var string
   */
  public $cacheBustingType;
  /**
   * @var string
   */
  public $countingMethod;
  protected $defaultTagsType = FloodlightActivityDynamicTag::class;
  protected $defaultTagsDataType = 'array';
  /**
   * @var string
   */
  public $expectedUrl;
  /**
   * @var string
   */
  public $floodlightActivityGroupId;
  /**
   * @var string
   */
  public $floodlightActivityGroupName;
  /**
   * @var string
   */
  public $floodlightActivityGroupTagString;
  /**
   * @var string
   */
  public $floodlightActivityGroupType;
  /**
   * @var string
   */
  public $floodlightConfigurationId;
  protected $floodlightConfigurationIdDimensionValueType = DimensionValue::class;
  protected $floodlightConfigurationIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $floodlightTagType;
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
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  protected $publisherTagsType = FloodlightActivityPublisherDynamicTag::class;
  protected $publisherTagsDataType = 'array';
  /**
   * @var bool
   */
  public $secure;
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
  public $status;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $tagFormat;
  /**
   * @var string
   */
  public $tagString;
  /**
   * @var string[]
   */
  public $userDefinedVariableTypes;

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
  public function setAttributionEnabled($attributionEnabled)
  {
    $this->attributionEnabled = $attributionEnabled;
  }
  /**
   * @return bool
   */
  public function getAttributionEnabled()
  {
    return $this->attributionEnabled;
  }
  /**
   * @param string
   */
  public function setCacheBustingType($cacheBustingType)
  {
    $this->cacheBustingType = $cacheBustingType;
  }
  /**
   * @return string
   */
  public function getCacheBustingType()
  {
    return $this->cacheBustingType;
  }
  /**
   * @param string
   */
  public function setCountingMethod($countingMethod)
  {
    $this->countingMethod = $countingMethod;
  }
  /**
   * @return string
   */
  public function getCountingMethod()
  {
    return $this->countingMethod;
  }
  /**
   * @param FloodlightActivityDynamicTag[]
   */
  public function setDefaultTags($defaultTags)
  {
    $this->defaultTags = $defaultTags;
  }
  /**
   * @return FloodlightActivityDynamicTag[]
   */
  public function getDefaultTags()
  {
    return $this->defaultTags;
  }
  /**
   * @param string
   */
  public function setExpectedUrl($expectedUrl)
  {
    $this->expectedUrl = $expectedUrl;
  }
  /**
   * @return string
   */
  public function getExpectedUrl()
  {
    return $this->expectedUrl;
  }
  /**
   * @param string
   */
  public function setFloodlightActivityGroupId($floodlightActivityGroupId)
  {
    $this->floodlightActivityGroupId = $floodlightActivityGroupId;
  }
  /**
   * @return string
   */
  public function getFloodlightActivityGroupId()
  {
    return $this->floodlightActivityGroupId;
  }
  /**
   * @param string
   */
  public function setFloodlightActivityGroupName($floodlightActivityGroupName)
  {
    $this->floodlightActivityGroupName = $floodlightActivityGroupName;
  }
  /**
   * @return string
   */
  public function getFloodlightActivityGroupName()
  {
    return $this->floodlightActivityGroupName;
  }
  /**
   * @param string
   */
  public function setFloodlightActivityGroupTagString($floodlightActivityGroupTagString)
  {
    $this->floodlightActivityGroupTagString = $floodlightActivityGroupTagString;
  }
  /**
   * @return string
   */
  public function getFloodlightActivityGroupTagString()
  {
    return $this->floodlightActivityGroupTagString;
  }
  /**
   * @param string
   */
  public function setFloodlightActivityGroupType($floodlightActivityGroupType)
  {
    $this->floodlightActivityGroupType = $floodlightActivityGroupType;
  }
  /**
   * @return string
   */
  public function getFloodlightActivityGroupType()
  {
    return $this->floodlightActivityGroupType;
  }
  /**
   * @param string
   */
  public function setFloodlightConfigurationId($floodlightConfigurationId)
  {
    $this->floodlightConfigurationId = $floodlightConfigurationId;
  }
  /**
   * @return string
   */
  public function getFloodlightConfigurationId()
  {
    return $this->floodlightConfigurationId;
  }
  /**
   * @param DimensionValue
   */
  public function setFloodlightConfigurationIdDimensionValue(DimensionValue $floodlightConfigurationIdDimensionValue)
  {
    $this->floodlightConfigurationIdDimensionValue = $floodlightConfigurationIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getFloodlightConfigurationIdDimensionValue()
  {
    return $this->floodlightConfigurationIdDimensionValue;
  }
  /**
   * @param string
   */
  public function setFloodlightTagType($floodlightTagType)
  {
    $this->floodlightTagType = $floodlightTagType;
  }
  /**
   * @return string
   */
  public function getFloodlightTagType()
  {
    return $this->floodlightTagType;
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
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param FloodlightActivityPublisherDynamicTag[]
   */
  public function setPublisherTags($publisherTags)
  {
    $this->publisherTags = $publisherTags;
  }
  /**
   * @return FloodlightActivityPublisherDynamicTag[]
   */
  public function getPublisherTags()
  {
    return $this->publisherTags;
  }
  /**
   * @param bool
   */
  public function setSecure($secure)
  {
    $this->secure = $secure;
  }
  /**
   * @return bool
   */
  public function getSecure()
  {
    return $this->secure;
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
   * @param string
   */
  public function setTagFormat($tagFormat)
  {
    $this->tagFormat = $tagFormat;
  }
  /**
   * @return string
   */
  public function getTagFormat()
  {
    return $this->tagFormat;
  }
  /**
   * @param string
   */
  public function setTagString($tagString)
  {
    $this->tagString = $tagString;
  }
  /**
   * @return string
   */
  public function getTagString()
  {
    return $this->tagString;
  }
  /**
   * @param string[]
   */
  public function setUserDefinedVariableTypes($userDefinedVariableTypes)
  {
    $this->userDefinedVariableTypes = $userDefinedVariableTypes;
  }
  /**
   * @return string[]
   */
  public function getUserDefinedVariableTypes()
  {
    return $this->userDefinedVariableTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightActivity::class, 'Google_Service_Dfareporting_FloodlightActivity');
