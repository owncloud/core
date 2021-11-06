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
  public $childDirectedTreatment;
  protected $customVariablesType = CustomFloodlightVariable::class;
  protected $customVariablesDataType = 'array';
  public $dclid;
  public $encryptedUserId;
  public $encryptedUserIdCandidates;
  public $floodlightActivityId;
  public $floodlightConfigurationId;
  public $gclid;
  public $kind;
  public $limitAdTracking;
  public $matchId;
  public $mobileDeviceId;
  public $nonPersonalizedAd;
  public $ordinal;
  public $quantity;
  public $timestampMicros;
  public $treatmentForUnderage;
  public $value;

  public function setChildDirectedTreatment($childDirectedTreatment)
  {
    $this->childDirectedTreatment = $childDirectedTreatment;
  }
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
  public function setDclid($dclid)
  {
    $this->dclid = $dclid;
  }
  public function getDclid()
  {
    return $this->dclid;
  }
  public function setEncryptedUserId($encryptedUserId)
  {
    $this->encryptedUserId = $encryptedUserId;
  }
  public function getEncryptedUserId()
  {
    return $this->encryptedUserId;
  }
  public function setEncryptedUserIdCandidates($encryptedUserIdCandidates)
  {
    $this->encryptedUserIdCandidates = $encryptedUserIdCandidates;
  }
  public function getEncryptedUserIdCandidates()
  {
    return $this->encryptedUserIdCandidates;
  }
  public function setFloodlightActivityId($floodlightActivityId)
  {
    $this->floodlightActivityId = $floodlightActivityId;
  }
  public function getFloodlightActivityId()
  {
    return $this->floodlightActivityId;
  }
  public function setFloodlightConfigurationId($floodlightConfigurationId)
  {
    $this->floodlightConfigurationId = $floodlightConfigurationId;
  }
  public function getFloodlightConfigurationId()
  {
    return $this->floodlightConfigurationId;
  }
  public function setGclid($gclid)
  {
    $this->gclid = $gclid;
  }
  public function getGclid()
  {
    return $this->gclid;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLimitAdTracking($limitAdTracking)
  {
    $this->limitAdTracking = $limitAdTracking;
  }
  public function getLimitAdTracking()
  {
    return $this->limitAdTracking;
  }
  public function setMatchId($matchId)
  {
    $this->matchId = $matchId;
  }
  public function getMatchId()
  {
    return $this->matchId;
  }
  public function setMobileDeviceId($mobileDeviceId)
  {
    $this->mobileDeviceId = $mobileDeviceId;
  }
  public function getMobileDeviceId()
  {
    return $this->mobileDeviceId;
  }
  public function setNonPersonalizedAd($nonPersonalizedAd)
  {
    $this->nonPersonalizedAd = $nonPersonalizedAd;
  }
  public function getNonPersonalizedAd()
  {
    return $this->nonPersonalizedAd;
  }
  public function setOrdinal($ordinal)
  {
    $this->ordinal = $ordinal;
  }
  public function getOrdinal()
  {
    return $this->ordinal;
  }
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  public function getQuantity()
  {
    return $this->quantity;
  }
  public function setTimestampMicros($timestampMicros)
  {
    $this->timestampMicros = $timestampMicros;
  }
  public function getTimestampMicros()
  {
    return $this->timestampMicros;
  }
  public function setTreatmentForUnderage($treatmentForUnderage)
  {
    $this->treatmentForUnderage = $treatmentForUnderage;
  }
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
