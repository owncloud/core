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

class Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1ClientState extends Google_Collection
{
  protected $collection_key = 'assetTags';
  public $assetTags;
  public $complianceState;
  public $createTime;
  public $customId;
  public $etag;
  public $healthScore;
  protected $keyValuePairsType = 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1CustomAttributeValue';
  protected $keyValuePairsDataType = 'map';
  public $lastUpdateTime;
  public $managed;
  public $name;
  public $ownerType;
  public $scoreReason;

  public function setAssetTags($assetTags)
  {
    $this->assetTags = $assetTags;
  }
  public function getAssetTags()
  {
    return $this->assetTags;
  }
  public function setComplianceState($complianceState)
  {
    $this->complianceState = $complianceState;
  }
  public function getComplianceState()
  {
    return $this->complianceState;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCustomId($customId)
  {
    $this->customId = $customId;
  }
  public function getCustomId()
  {
    return $this->customId;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setHealthScore($healthScore)
  {
    $this->healthScore = $healthScore;
  }
  public function getHealthScore()
  {
    return $this->healthScore;
  }
  /**
   * @param Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1CustomAttributeValue
   */
  public function setKeyValuePairs($keyValuePairs)
  {
    $this->keyValuePairs = $keyValuePairs;
  }
  /**
   * @return Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1CustomAttributeValue
   */
  public function getKeyValuePairs()
  {
    return $this->keyValuePairs;
  }
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  public function setManaged($managed)
  {
    $this->managed = $managed;
  }
  public function getManaged()
  {
    return $this->managed;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwnerType($ownerType)
  {
    $this->ownerType = $ownerType;
  }
  public function getOwnerType()
  {
    return $this->ownerType;
  }
  public function setScoreReason($scoreReason)
  {
    $this->scoreReason = $scoreReason;
  }
  public function getScoreReason()
  {
    return $this->scoreReason;
  }
}
