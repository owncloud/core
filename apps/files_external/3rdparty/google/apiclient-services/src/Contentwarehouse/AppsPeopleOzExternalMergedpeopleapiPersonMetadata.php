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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiPersonMetadata extends \Google\Collection
{
  protected $collection_key = 'previousPersonId';
  protected $affinityType = AppsPeopleOzExternalMergedpeopleapiAffinity::class;
  protected $affinityDataType = 'array';
  /**
   * @var string[]
   */
  public $attribution;
  protected $bestDisplayNameType = AppsPeopleOzExternalMergedpeopleapiBestDisplayName::class;
  protected $bestDisplayNameDataType = '';
  /**
   * @var string[]
   */
  public $blockType;
  /**
   * @var string[]
   */
  public $circleId;
  /**
   * @var string[]
   */
  public $contactGroupId;
  /**
   * @var string[]
   */
  public $contactId;
  /**
   * @var string
   */
  public $customResponseMaskingType;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var bool
   */
  public $deprecatedBlocked;
  /**
   * @var string[]
   */
  public $deprecatedMembershipCircleId;
  /**
   * @var string[]
   */
  public $deprecatedMembershipContactGroupId;
  protected $deviceContactInfoType = AppsPeopleOzExternalMergedpeopleapiDeviceContactInfo::class;
  protected $deviceContactInfoDataType = 'array';
  protected $identityInfoType = AppsPeopleOzExternalMergedpeopleapiIdentityInfo::class;
  protected $identityInfoDataType = '';
  /**
   * @var bool
   */
  public $inViewerDomain;
  /**
   * @var string[]
   */
  public $incomingBlockType;
  /**
   * @var string
   */
  public $lastUpdateTimeMicros;
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $objectType;
  /**
   * @var string
   */
  public $ownerId;
  /**
   * @var string[]
   */
  public $ownerUserType;
  /**
   * @var string
   */
  public $plusPageType;
  /**
   * @var string[]
   */
  public $previousPersonId;
  protected $profileOwnerStatsType = AppsPeopleOzExternalMergedpeopleapiProfileOwnerStats::class;
  protected $profileOwnerStatsDataType = '';
  protected $scoringInfoType = AppsPeopleOzExternalMergedpeopleapiPersonMetadataScoringInfo::class;
  protected $scoringInfoDataType = '';
  protected $userVisibleStatsType = AppsPeopleOzExternalMergedpeopleapiUserVisibleStats::class;
  protected $userVisibleStatsDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAffinity[]
   */
  public function setAffinity($affinity)
  {
    $this->affinity = $affinity;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAffinity[]
   */
  public function getAffinity()
  {
    return $this->affinity;
  }
  /**
   * @param string[]
   */
  public function setAttribution($attribution)
  {
    $this->attribution = $attribution;
  }
  /**
   * @return string[]
   */
  public function getAttribution()
  {
    return $this->attribution;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiBestDisplayName
   */
  public function setBestDisplayName(AppsPeopleOzExternalMergedpeopleapiBestDisplayName $bestDisplayName)
  {
    $this->bestDisplayName = $bestDisplayName;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiBestDisplayName
   */
  public function getBestDisplayName()
  {
    return $this->bestDisplayName;
  }
  /**
   * @param string[]
   */
  public function setBlockType($blockType)
  {
    $this->blockType = $blockType;
  }
  /**
   * @return string[]
   */
  public function getBlockType()
  {
    return $this->blockType;
  }
  /**
   * @param string[]
   */
  public function setCircleId($circleId)
  {
    $this->circleId = $circleId;
  }
  /**
   * @return string[]
   */
  public function getCircleId()
  {
    return $this->circleId;
  }
  /**
   * @param string[]
   */
  public function setContactGroupId($contactGroupId)
  {
    $this->contactGroupId = $contactGroupId;
  }
  /**
   * @return string[]
   */
  public function getContactGroupId()
  {
    return $this->contactGroupId;
  }
  /**
   * @param string[]
   */
  public function setContactId($contactId)
  {
    $this->contactId = $contactId;
  }
  /**
   * @return string[]
   */
  public function getContactId()
  {
    return $this->contactId;
  }
  /**
   * @param string
   */
  public function setCustomResponseMaskingType($customResponseMaskingType)
  {
    $this->customResponseMaskingType = $customResponseMaskingType;
  }
  /**
   * @return string
   */
  public function getCustomResponseMaskingType()
  {
    return $this->customResponseMaskingType;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param bool
   */
  public function setDeprecatedBlocked($deprecatedBlocked)
  {
    $this->deprecatedBlocked = $deprecatedBlocked;
  }
  /**
   * @return bool
   */
  public function getDeprecatedBlocked()
  {
    return $this->deprecatedBlocked;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedMembershipCircleId($deprecatedMembershipCircleId)
  {
    $this->deprecatedMembershipCircleId = $deprecatedMembershipCircleId;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedMembershipCircleId()
  {
    return $this->deprecatedMembershipCircleId;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedMembershipContactGroupId($deprecatedMembershipContactGroupId)
  {
    $this->deprecatedMembershipContactGroupId = $deprecatedMembershipContactGroupId;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedMembershipContactGroupId()
  {
    return $this->deprecatedMembershipContactGroupId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiDeviceContactInfo[]
   */
  public function setDeviceContactInfo($deviceContactInfo)
  {
    $this->deviceContactInfo = $deviceContactInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiDeviceContactInfo[]
   */
  public function getDeviceContactInfo()
  {
    return $this->deviceContactInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiIdentityInfo
   */
  public function setIdentityInfo(AppsPeopleOzExternalMergedpeopleapiIdentityInfo $identityInfo)
  {
    $this->identityInfo = $identityInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiIdentityInfo
   */
  public function getIdentityInfo()
  {
    return $this->identityInfo;
  }
  /**
   * @param bool
   */
  public function setInViewerDomain($inViewerDomain)
  {
    $this->inViewerDomain = $inViewerDomain;
  }
  /**
   * @return bool
   */
  public function getInViewerDomain()
  {
    return $this->inViewerDomain;
  }
  /**
   * @param string[]
   */
  public function setIncomingBlockType($incomingBlockType)
  {
    $this->incomingBlockType = $incomingBlockType;
  }
  /**
   * @return string[]
   */
  public function getIncomingBlockType()
  {
    return $this->incomingBlockType;
  }
  /**
   * @param string
   */
  public function setLastUpdateTimeMicros($lastUpdateTimeMicros)
  {
    $this->lastUpdateTimeMicros = $lastUpdateTimeMicros;
  }
  /**
   * @return string
   */
  public function getLastUpdateTimeMicros()
  {
    return $this->lastUpdateTimeMicros;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  /**
   * @return string
   */
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param string
   */
  public function setOwnerId($ownerId)
  {
    $this->ownerId = $ownerId;
  }
  /**
   * @return string
   */
  public function getOwnerId()
  {
    return $this->ownerId;
  }
  /**
   * @param string[]
   */
  public function setOwnerUserType($ownerUserType)
  {
    $this->ownerUserType = $ownerUserType;
  }
  /**
   * @return string[]
   */
  public function getOwnerUserType()
  {
    return $this->ownerUserType;
  }
  /**
   * @param string
   */
  public function setPlusPageType($plusPageType)
  {
    $this->plusPageType = $plusPageType;
  }
  /**
   * @return string
   */
  public function getPlusPageType()
  {
    return $this->plusPageType;
  }
  /**
   * @param string[]
   */
  public function setPreviousPersonId($previousPersonId)
  {
    $this->previousPersonId = $previousPersonId;
  }
  /**
   * @return string[]
   */
  public function getPreviousPersonId()
  {
    return $this->previousPersonId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiProfileOwnerStats
   */
  public function setProfileOwnerStats(AppsPeopleOzExternalMergedpeopleapiProfileOwnerStats $profileOwnerStats)
  {
    $this->profileOwnerStats = $profileOwnerStats;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiProfileOwnerStats
   */
  public function getProfileOwnerStats()
  {
    return $this->profileOwnerStats;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonMetadataScoringInfo
   */
  public function setScoringInfo(AppsPeopleOzExternalMergedpeopleapiPersonMetadataScoringInfo $scoringInfo)
  {
    $this->scoringInfo = $scoringInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonMetadataScoringInfo
   */
  public function getScoringInfo()
  {
    return $this->scoringInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiUserVisibleStats
   */
  public function setUserVisibleStats(AppsPeopleOzExternalMergedpeopleapiUserVisibleStats $userVisibleStats)
  {
    $this->userVisibleStats = $userVisibleStats;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiUserVisibleStats
   */
  public function getUserVisibleStats()
  {
    return $this->userVisibleStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPersonMetadata::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPersonMetadata');
