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
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $advertiserGroupId;
  /**
   * @var string
   */
  public $clickThroughUrlSuffix;
  /**
   * @var string
   */
  public $defaultClickThroughEventTagId;
  /**
   * @var string
   */
  public $defaultEmail;
  /**
   * @var string
   */
  public $floodlightConfigurationId;
  protected $floodlightConfigurationIdDimensionValueType = DimensionValue::class;
  protected $floodlightConfigurationIdDimensionValueDataType = '';
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
  protected $measurementPartnerLinkType = MeasurementPartnerAdvertiserLink::class;
  protected $measurementPartnerLinkDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $originalFloodlightConfigurationId;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var bool
   */
  public $suspended;

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
  public function setClickThroughUrlSuffix($clickThroughUrlSuffix)
  {
    $this->clickThroughUrlSuffix = $clickThroughUrlSuffix;
  }
  /**
   * @return string
   */
  public function getClickThroughUrlSuffix()
  {
    return $this->clickThroughUrlSuffix;
  }
  /**
   * @param string
   */
  public function setDefaultClickThroughEventTagId($defaultClickThroughEventTagId)
  {
    $this->defaultClickThroughEventTagId = $defaultClickThroughEventTagId;
  }
  /**
   * @return string
   */
  public function getDefaultClickThroughEventTagId()
  {
    return $this->defaultClickThroughEventTagId;
  }
  /**
   * @param string
   */
  public function setDefaultEmail($defaultEmail)
  {
    $this->defaultEmail = $defaultEmail;
  }
  /**
   * @return string
   */
  public function getDefaultEmail()
  {
    return $this->defaultEmail;
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
  public function setOriginalFloodlightConfigurationId($originalFloodlightConfigurationId)
  {
    $this->originalFloodlightConfigurationId = $originalFloodlightConfigurationId;
  }
  /**
   * @return string
   */
  public function getOriginalFloodlightConfigurationId()
  {
    return $this->originalFloodlightConfigurationId;
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
   * @param bool
   */
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  /**
   * @return bool
   */
  public function getSuspended()
  {
    return $this->suspended;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Advertiser::class, 'Google_Service_Dfareporting_Advertiser');
