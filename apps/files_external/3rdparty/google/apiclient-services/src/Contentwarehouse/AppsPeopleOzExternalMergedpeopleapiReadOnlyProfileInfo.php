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

class AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfo extends \Google\Collection
{
  protected $collection_key = 'ownerUserType';
  protected $accountEmailType = AppsPeopleOzExternalMergedpeopleapiAccountEmail::class;
  protected $accountEmailDataType = '';
  /**
   * @var string[]
   */
  public $blockType;
  protected $customerInfoType = AppsPeopleOzExternalMergedpeopleapiCustomerInfo::class;
  protected $customerInfoDataType = '';
  protected $domainInfoType = AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfoDomainInfo::class;
  protected $domainInfoDataType = '';
  /**
   * @var bool
   */
  public $inViewerDomain;
  /**
   * @var string[]
   */
  public $incomingBlockType;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
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
  protected $profileOwnerStatsType = AppsPeopleOzExternalMergedpeopleapiProfileOwnerStats::class;
  protected $profileOwnerStatsDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAccountEmail
   */
  public function setAccountEmail(AppsPeopleOzExternalMergedpeopleapiAccountEmail $accountEmail)
  {
    $this->accountEmail = $accountEmail;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAccountEmail
   */
  public function getAccountEmail()
  {
    return $this->accountEmail;
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
   * @param AppsPeopleOzExternalMergedpeopleapiCustomerInfo
   */
  public function setCustomerInfo(AppsPeopleOzExternalMergedpeopleapiCustomerInfo $customerInfo)
  {
    $this->customerInfo = $customerInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiCustomerInfo
   */
  public function getCustomerInfo()
  {
    return $this->customerInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfoDomainInfo
   */
  public function setDomainInfo(AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfoDomainInfo $domainInfo)
  {
    $this->domainInfo = $domainInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfoDomainInfo
   */
  public function getDomainInfo()
  {
    return $this->domainInfo;
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
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiReadOnlyProfileInfo');
