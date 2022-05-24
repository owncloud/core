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

class EventTag extends \Google\Collection
{
  protected $collection_key = 'siteIds';
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
   * @var string
   */
  public $campaignId;
  protected $campaignIdDimensionValueType = DimensionValue::class;
  protected $campaignIdDimensionValueDataType = '';
  /**
   * @var bool
   */
  public $enabledByDefault;
  /**
   * @var bool
   */
  public $excludeFromAdxRequests;
  /**
   * @var string
   */
  public $id;
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
  public $siteFilterType;
  /**
   * @var string[]
   */
  public $siteIds;
  /**
   * @var bool
   */
  public $sslCompliant;
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
  public $type;
  /**
   * @var string
   */
  public $url;
  /**
   * @var int
   */
  public $urlEscapeLevels;

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
   * @param bool
   */
  public function setEnabledByDefault($enabledByDefault)
  {
    $this->enabledByDefault = $enabledByDefault;
  }
  /**
   * @return bool
   */
  public function getEnabledByDefault()
  {
    return $this->enabledByDefault;
  }
  /**
   * @param bool
   */
  public function setExcludeFromAdxRequests($excludeFromAdxRequests)
  {
    $this->excludeFromAdxRequests = $excludeFromAdxRequests;
  }
  /**
   * @return bool
   */
  public function getExcludeFromAdxRequests()
  {
    return $this->excludeFromAdxRequests;
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
  public function setSiteFilterType($siteFilterType)
  {
    $this->siteFilterType = $siteFilterType;
  }
  /**
   * @return string
   */
  public function getSiteFilterType()
  {
    return $this->siteFilterType;
  }
  /**
   * @param string[]
   */
  public function setSiteIds($siteIds)
  {
    $this->siteIds = $siteIds;
  }
  /**
   * @return string[]
   */
  public function getSiteIds()
  {
    return $this->siteIds;
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
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param int
   */
  public function setUrlEscapeLevels($urlEscapeLevels)
  {
    $this->urlEscapeLevels = $urlEscapeLevels;
  }
  /**
   * @return int
   */
  public function getUrlEscapeLevels()
  {
    return $this->urlEscapeLevels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventTag::class, 'Google_Service_Dfareporting_EventTag');
