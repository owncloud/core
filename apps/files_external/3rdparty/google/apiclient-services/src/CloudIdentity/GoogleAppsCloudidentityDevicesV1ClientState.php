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

namespace Google\Service\CloudIdentity;

class GoogleAppsCloudidentityDevicesV1ClientState extends \Google\Collection
{
  protected $collection_key = 'assetTags';
  /**
   * @var string[]
   */
  public $assetTags;
  /**
   * @var string
   */
  public $complianceState;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $customId;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $healthScore;
  protected $keyValuePairsType = GoogleAppsCloudidentityDevicesV1CustomAttributeValue::class;
  protected $keyValuePairsDataType = 'map';
  /**
   * @var string
   */
  public $lastUpdateTime;
  /**
   * @var string
   */
  public $managed;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $ownerType;
  /**
   * @var string
   */
  public $scoreReason;

  /**
   * @param string[]
   */
  public function setAssetTags($assetTags)
  {
    $this->assetTags = $assetTags;
  }
  /**
   * @return string[]
   */
  public function getAssetTags()
  {
    return $this->assetTags;
  }
  /**
   * @param string
   */
  public function setComplianceState($complianceState)
  {
    $this->complianceState = $complianceState;
  }
  /**
   * @return string
   */
  public function getComplianceState()
  {
    return $this->complianceState;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCustomId($customId)
  {
    $this->customId = $customId;
  }
  /**
   * @return string
   */
  public function getCustomId()
  {
    return $this->customId;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setHealthScore($healthScore)
  {
    $this->healthScore = $healthScore;
  }
  /**
   * @return string
   */
  public function getHealthScore()
  {
    return $this->healthScore;
  }
  /**
   * @param GoogleAppsCloudidentityDevicesV1CustomAttributeValue[]
   */
  public function setKeyValuePairs($keyValuePairs)
  {
    $this->keyValuePairs = $keyValuePairs;
  }
  /**
   * @return GoogleAppsCloudidentityDevicesV1CustomAttributeValue[]
   */
  public function getKeyValuePairs()
  {
    return $this->keyValuePairs;
  }
  /**
   * @param string
   */
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  /**
   * @param string
   */
  public function setManaged($managed)
  {
    $this->managed = $managed;
  }
  /**
   * @return string
   */
  public function getManaged()
  {
    return $this->managed;
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
  public function setOwnerType($ownerType)
  {
    $this->ownerType = $ownerType;
  }
  /**
   * @return string
   */
  public function getOwnerType()
  {
    return $this->ownerType;
  }
  /**
   * @param string
   */
  public function setScoreReason($scoreReason)
  {
    $this->scoreReason = $scoreReason;
  }
  /**
   * @return string
   */
  public function getScoreReason()
  {
    return $this->scoreReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1ClientState::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1ClientState');
