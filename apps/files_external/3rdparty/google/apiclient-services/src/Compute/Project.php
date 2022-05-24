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

namespace Google\Service\Compute;

class Project extends \Google\Collection
{
  protected $collection_key = 'quotas';
  protected $commonInstanceMetadataType = Metadata::class;
  protected $commonInstanceMetadataDataType = '';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $defaultNetworkTier;
  /**
   * @var string
   */
  public $defaultServiceAccount;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $enabledFeatures;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $quotasType = Quota::class;
  protected $quotasDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  protected $usageExportLocationType = UsageExportLocation::class;
  protected $usageExportLocationDataType = '';
  /**
   * @var string
   */
  public $xpnProjectStatus;

  /**
   * @param Metadata
   */
  public function setCommonInstanceMetadata(Metadata $commonInstanceMetadata)
  {
    $this->commonInstanceMetadata = $commonInstanceMetadata;
  }
  /**
   * @return Metadata
   */
  public function getCommonInstanceMetadata()
  {
    return $this->commonInstanceMetadata;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setDefaultNetworkTier($defaultNetworkTier)
  {
    $this->defaultNetworkTier = $defaultNetworkTier;
  }
  /**
   * @return string
   */
  public function getDefaultNetworkTier()
  {
    return $this->defaultNetworkTier;
  }
  /**
   * @param string
   */
  public function setDefaultServiceAccount($defaultServiceAccount)
  {
    $this->defaultServiceAccount = $defaultServiceAccount;
  }
  /**
   * @return string
   */
  public function getDefaultServiceAccount()
  {
    return $this->defaultServiceAccount;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string[]
   */
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  /**
   * @return string[]
   */
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
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
   * @param Quota[]
   */
  public function setQuotas($quotas)
  {
    $this->quotas = $quotas;
  }
  /**
   * @return Quota[]
   */
  public function getQuotas()
  {
    return $this->quotas;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param UsageExportLocation
   */
  public function setUsageExportLocation(UsageExportLocation $usageExportLocation)
  {
    $this->usageExportLocation = $usageExportLocation;
  }
  /**
   * @return UsageExportLocation
   */
  public function getUsageExportLocation()
  {
    return $this->usageExportLocation;
  }
  /**
   * @param string
   */
  public function setXpnProjectStatus($xpnProjectStatus)
  {
    $this->xpnProjectStatus = $xpnProjectStatus;
  }
  /**
   * @return string
   */
  public function getXpnProjectStatus()
  {
    return $this->xpnProjectStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Project::class, 'Google_Service_Compute_Project');
