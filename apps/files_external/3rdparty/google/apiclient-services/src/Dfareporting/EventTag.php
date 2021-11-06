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
  public $accountId;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = DimensionValue::class;
  protected $advertiserIdDimensionValueDataType = '';
  public $campaignId;
  protected $campaignIdDimensionValueType = DimensionValue::class;
  protected $campaignIdDimensionValueDataType = '';
  public $enabledByDefault;
  public $excludeFromAdxRequests;
  public $id;
  public $kind;
  public $name;
  public $siteFilterType;
  public $siteIds;
  public $sslCompliant;
  public $status;
  public $subaccountId;
  public $type;
  public $url;
  public $urlEscapeLevels;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
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
  public function setEnabledByDefault($enabledByDefault)
  {
    $this->enabledByDefault = $enabledByDefault;
  }
  public function getEnabledByDefault()
  {
    return $this->enabledByDefault;
  }
  public function setExcludeFromAdxRequests($excludeFromAdxRequests)
  {
    $this->excludeFromAdxRequests = $excludeFromAdxRequests;
  }
  public function getExcludeFromAdxRequests()
  {
    return $this->excludeFromAdxRequests;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSiteFilterType($siteFilterType)
  {
    $this->siteFilterType = $siteFilterType;
  }
  public function getSiteFilterType()
  {
    return $this->siteFilterType;
  }
  public function setSiteIds($siteIds)
  {
    $this->siteIds = $siteIds;
  }
  public function getSiteIds()
  {
    return $this->siteIds;
  }
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  public function getSslCompliant()
  {
    return $this->sslCompliant;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
  public function setUrlEscapeLevels($urlEscapeLevels)
  {
    $this->urlEscapeLevels = $urlEscapeLevels;
  }
  public function getUrlEscapeLevels()
  {
    return $this->urlEscapeLevels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventTag::class, 'Google_Service_Dfareporting_EventTag');
