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

class Advertiser extends \Google\Model
{
  public $accountId;
  public $advertiserGroupId;
  public $clickThroughUrlSuffix;
  public $defaultClickThroughEventTagId;
  public $defaultEmail;
  public $floodlightConfigurationId;
  protected $floodlightConfigurationIdDimensionValueType = DimensionValue::class;
  protected $floodlightConfigurationIdDimensionValueDataType = '';
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  public $kind;
  protected $measurementPartnerLinkType = MeasurementPartnerAdvertiserLink::class;
  protected $measurementPartnerLinkDataType = '';
  public $name;
  public $originalFloodlightConfigurationId;
  public $status;
  public $subaccountId;
  public $suspended;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdvertiserGroupId($advertiserGroupId)
  {
    $this->advertiserGroupId = $advertiserGroupId;
  }
  public function getAdvertiserGroupId()
  {
    return $this->advertiserGroupId;
  }
  public function setClickThroughUrlSuffix($clickThroughUrlSuffix)
  {
    $this->clickThroughUrlSuffix = $clickThroughUrlSuffix;
  }
  public function getClickThroughUrlSuffix()
  {
    return $this->clickThroughUrlSuffix;
  }
  public function setDefaultClickThroughEventTagId($defaultClickThroughEventTagId)
  {
    $this->defaultClickThroughEventTagId = $defaultClickThroughEventTagId;
  }
  public function getDefaultClickThroughEventTagId()
  {
    return $this->defaultClickThroughEventTagId;
  }
  public function setDefaultEmail($defaultEmail)
  {
    $this->defaultEmail = $defaultEmail;
  }
  public function getDefaultEmail()
  {
    return $this->defaultEmail;
  }
  public function setFloodlightConfigurationId($floodlightConfigurationId)
  {
    $this->floodlightConfigurationId = $floodlightConfigurationId;
  }
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
   * @param MeasurementPartnerAdvertiserLink
   */
  public function setMeasurementPartnerLink(MeasurementPartnerAdvertiserLink $measurementPartnerLink)
  {
    $this->measurementPartnerLink = $measurementPartnerLink;
  }
  /**
   * @return MeasurementPartnerAdvertiserLink
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
  public function setOriginalFloodlightConfigurationId($originalFloodlightConfigurationId)
  {
    $this->originalFloodlightConfigurationId = $originalFloodlightConfigurationId;
  }
  public function getOriginalFloodlightConfigurationId()
  {
    return $this->originalFloodlightConfigurationId;
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
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  public function getSuspended()
  {
    return $this->suspended;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Advertiser::class, 'Google_Service_Dfareporting_Advertiser');
