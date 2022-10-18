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

class AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata extends \Google\Collection
{
  protected $collection_key = 'productMetadata';
  protected $aclChoicesType = AppsPeopleOzExternalMergedpeopleapiFieldAcl::class;
  protected $aclChoicesDataType = 'array';
  protected $additionalContainerInfoType = AppsPeopleOzExternalMergedpeopleapiAdditionalContainerInfo::class;
  protected $additionalContainerInfoDataType = '';
  protected $affinityType = AppsPeopleOzExternalMergedpeopleapiAffinity::class;
  protected $affinityDataType = 'array';
  /**
   * @var string[]
   */
  public $contactVisibility;
  /**
   * @var string
   */
  public $container;
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var bool
   */
  public $containerPrimary;
  /**
   * @var string
   */
  public $containerType;
  /**
   * @var bool
   */
  public $crossDeviceAllowed;
  protected $defaultAclChoiceType = AppsPeopleOzExternalMergedpeopleapiFieldAcl::class;
  protected $defaultAclChoiceDataType = '';
  /**
   * @var string
   */
  public $deprecatedContactContainerId;
  /**
   * @var bool
   */
  public $edgeKey;
  protected $edgeKeyInfoType = AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfo::class;
  protected $edgeKeyInfoDataType = 'array';
  /**
   * @var string
   */
  public $encodedContainerId;
  protected $fieldAclType = AppsPeopleOzExternalMergedpeopleapiFieldAcl::class;
  protected $fieldAclDataType = '';
  /**
   * @var string
   */
  public $lastUpdateTime;
  protected $matchingInfoType = AppsPeopleOzExternalMergedpeopleapiMatchInfo::class;
  protected $matchingInfoDataType = 'array';
  protected $otherDedupedContainersType = AppsPeopleOzExternalMergedpeopleapiDedupedContainerInfo::class;
  protected $otherDedupedContainersDataType = 'array';
  /**
   * @var bool
   */
  public $primary;
  protected $productMetadataType = AppsPeopleOzExternalMergedpeopleapiProductMetadata::class;
  protected $productMetadataDataType = 'array';
  /**
   * @var bool
   */
  public $verified;
  /**
   * @var string
   */
  public $visibility;
  /**
   * @var bool
   */
  public $writeable;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAcl[]
   */
  public function setAclChoices($aclChoices)
  {
    $this->aclChoices = $aclChoices;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAcl[]
   */
  public function getAclChoices()
  {
    return $this->aclChoices;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAdditionalContainerInfo
   */
  public function setAdditionalContainerInfo(AppsPeopleOzExternalMergedpeopleapiAdditionalContainerInfo $additionalContainerInfo)
  {
    $this->additionalContainerInfo = $additionalContainerInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAdditionalContainerInfo
   */
  public function getAdditionalContainerInfo()
  {
    return $this->additionalContainerInfo;
  }
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
  public function setContactVisibility($contactVisibility)
  {
    $this->contactVisibility = $contactVisibility;
  }
  /**
   * @return string[]
   */
  public function getContactVisibility()
  {
    return $this->contactVisibility;
  }
  /**
   * @param string
   */
  public function setContainer($container)
  {
    $this->container = $container;
  }
  /**
   * @return string
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param bool
   */
  public function setContainerPrimary($containerPrimary)
  {
    $this->containerPrimary = $containerPrimary;
  }
  /**
   * @return bool
   */
  public function getContainerPrimary()
  {
    return $this->containerPrimary;
  }
  /**
   * @param string
   */
  public function setContainerType($containerType)
  {
    $this->containerType = $containerType;
  }
  /**
   * @return string
   */
  public function getContainerType()
  {
    return $this->containerType;
  }
  /**
   * @param bool
   */
  public function setCrossDeviceAllowed($crossDeviceAllowed)
  {
    $this->crossDeviceAllowed = $crossDeviceAllowed;
  }
  /**
   * @return bool
   */
  public function getCrossDeviceAllowed()
  {
    return $this->crossDeviceAllowed;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAcl
   */
  public function setDefaultAclChoice(AppsPeopleOzExternalMergedpeopleapiFieldAcl $defaultAclChoice)
  {
    $this->defaultAclChoice = $defaultAclChoice;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAcl
   */
  public function getDefaultAclChoice()
  {
    return $this->defaultAclChoice;
  }
  /**
   * @param string
   */
  public function setDeprecatedContactContainerId($deprecatedContactContainerId)
  {
    $this->deprecatedContactContainerId = $deprecatedContactContainerId;
  }
  /**
   * @return string
   */
  public function getDeprecatedContactContainerId()
  {
    return $this->deprecatedContactContainerId;
  }
  /**
   * @param bool
   */
  public function setEdgeKey($edgeKey)
  {
    $this->edgeKey = $edgeKey;
  }
  /**
   * @return bool
   */
  public function getEdgeKey()
  {
    return $this->edgeKey;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfo[]
   */
  public function setEdgeKeyInfo($edgeKeyInfo)
  {
    $this->edgeKeyInfo = $edgeKeyInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiEdgeKeyInfo[]
   */
  public function getEdgeKeyInfo()
  {
    return $this->edgeKeyInfo;
  }
  /**
   * @param string
   */
  public function setEncodedContainerId($encodedContainerId)
  {
    $this->encodedContainerId = $encodedContainerId;
  }
  /**
   * @return string
   */
  public function getEncodedContainerId()
  {
    return $this->encodedContainerId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAcl
   */
  public function setFieldAcl(AppsPeopleOzExternalMergedpeopleapiFieldAcl $fieldAcl)
  {
    $this->fieldAcl = $fieldAcl;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAcl
   */
  public function getFieldAcl()
  {
    return $this->fieldAcl;
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
   * @param AppsPeopleOzExternalMergedpeopleapiMatchInfo[]
   */
  public function setMatchingInfo($matchingInfo)
  {
    $this->matchingInfo = $matchingInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiMatchInfo[]
   */
  public function getMatchingInfo()
  {
    return $this->matchingInfo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiDedupedContainerInfo[]
   */
  public function setOtherDedupedContainers($otherDedupedContainers)
  {
    $this->otherDedupedContainers = $otherDedupedContainers;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiDedupedContainerInfo[]
   */
  public function getOtherDedupedContainers()
  {
    return $this->otherDedupedContainers;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiProductMetadata[]
   */
  public function setProductMetadata($productMetadata)
  {
    $this->productMetadata = $productMetadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiProductMetadata[]
   */
  public function getProductMetadata()
  {
    return $this->productMetadata;
  }
  /**
   * @param bool
   */
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  /**
   * @return bool
   */
  public function getVerified()
  {
    return $this->verified;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
  /**
   * @param bool
   */
  public function setWriteable($writeable)
  {
    $this->writeable = $writeable;
  }
  /**
   * @return bool
   */
  public function getWriteable()
  {
    return $this->writeable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata');
