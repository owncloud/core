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

class Conversion extends \Google\Collection
{
  protected $collection_key = 'encryptedUserIdCandidates';
  /**
   * @var bool
   */
  public $childDirectedTreatment;
  protected $customVariablesType = CustomFloodlightVariable::class;
  protected $customVariablesDataType = 'array';
  /**
   * @var string
   */
  public $dclid;
  /**
   * @var string
   */
  public $encryptedUserId;
  /**
   * @var string[]
   */
  public $encryptedUserIdCandidates;
  /**
   * @var string
   */
  public $floodlightActivityId;
  /**
   * @var string
   */
  public $floodlightConfigurationId;
  /**
   * @var string
   */
  public $gclid;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $limitAdTracking;
  /**
   * @var string
   */
  public $matchId;
  /**
   * @var string
   */
  public $mobileDeviceId;
  /**
   * @var bool
   */
  public $nonPersonalizedAd;
  /**
   * @var string
   */
  public $ordinal;
  /**
   * @var string
   */
  public $quantity;
  /**
   * @var string
   */
  public $timestampMicros;
  /**
   * @var bool
   */
  public $treatmentForUnderage;
  public $value;

  /**
   * @param bool
   */
  public function setChildDirectedTreatment($childDirectedTreatment)
  {
    $this->childDirectedTreatment = $childDirectedTreatment;
  }
  /**
   * @return bool
   */
  public function getChildDirectedTreatment()
  {
    return $this->childDirectedTreatment;
  }
  /**
   * @param CustomFloodlightVariable[]
   */
  public function setCustomVariables($customVariables)
  {
    $this->customVariables = $customVariables;
  }
  /**
   * @return CustomFloodlightVariable[]
   */
  public function getCustomVariables()
  {
    return $this->customVariables;
  }
  /**
   * @param string
   */
  public function setDclid($dclid)
  {
    $this->dclid = $dclid;
  }
  /**
   * @return string
   */
  public function getDclid()
  {
    return $this->dclid;
  }
  /**
   * @param string
   */
  public function setEncryptedUserId($encryptedUserId)
  {
    $this->encryptedUserId = $encryptedUserId;
  }
  /**
   * @return string
   */
  public function getEncryptedUserId()
  {
    return $this->encryptedUserId;
  }
  /**
   * @param string[]
   */
  public function setEncryptedUserIdCandidates($encryptedUserIdCandidates)
  {
    $this->encryptedUserIdCandidates = $encryptedUserIdCandidates;
  }
  /**
   * @return string[]
   */
  public function getEncryptedUserIdCandidates()
  {
    return $this->encryptedUserIdCandidates;
  }
  /**
   * @param string
   */
  public function setFloodlightActivityId($floodlightActivityId)
  {
    $this->floodlightActivityId = $floodlightActivityId;
  }
  /**
   * @return string
   */
  public function getFloodlightActivityId()
  {
    return $this->floodlightActivityId;
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
   * @param string
   */
  public function setGclid($gclid)
  {
    $this->gclid = $gclid;
  }
  /**
   * @return string
   */
  public function getGclid()
  {
    return $this->gclid;
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
   * @param bool
   */
  public function setLimitAdTracking($limitAdTracking)
  {
    $this->limitAdTracking = $limitAdTracking;
  }
  /**
   * @return bool
   */
  public function getLimitAdTracking()
  {
    return $this->limitAdTracking;
  }
  /**
   * @param string
   */
  public function setMatchId($matchId)
  {
    $this->matchId = $matchId;
  }
  /**
   * @return string
   */
  public function getMatchId()
  {
    return $this->matchId;
  }
  /**
   * @param string
   */
  public function setMobileDeviceId($mobileDeviceId)
  {
    $this->mobileDeviceId = $mobileDeviceId;
  }
  /**
   * @return string
   */
  public function getMobileDeviceId()
  {
    return $this->mobileDeviceId;
  }
  /**
   * @param bool
   */
  public function setNonPersonalizedAd($nonPersonalizedAd)
  {
    $this->nonPersonalizedAd = $nonPersonalizedAd;
  }
  /**
   * @return bool
   */
  public function getNonPersonalizedAd()
  {
    return $this->nonPersonalizedAd;
  }
  /**
   * @param string
   */
  public function setOrdinal($ordinal)
  {
    $this->ordinal = $ordinal;
  }
  /**
   * @return string
   */
  public function getOrdinal()
  {
    return $this->ordinal;
  }
  /**
   * @param string
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return string
   */
  public function getQuantity()
  {
    return $this->quantity;
  }
  /**
   * @param string
   */
  public function setTimestampMicros($timestampMicros)
  {
    $this->timestampMicros = $timestampMicros;
  }
  /**
   * @return string
   */
  public function getTimestampMicros()
  {
    return $this->timestampMicros;
  }
  /**
   * @param bool
   */
  public function setTreatmentForUnderage($treatmentForUnderage)
  {
    $this->treatmentForUnderage = $treatmentForUnderage;
  }
  /**
   * @return bool
   */
  public function getTreatmentForUnderage()
  {
    return $this->treatmentForUnderage;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Conversion::class, 'Google_Service_Dfareporting_Conversion');
