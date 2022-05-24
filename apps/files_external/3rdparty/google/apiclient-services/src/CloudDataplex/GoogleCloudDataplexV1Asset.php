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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Asset extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  protected $discoverySpecType = GoogleCloudDataplexV1AssetDiscoverySpec::class;
  protected $discoverySpecDataType = '';
  protected $discoveryStatusType = GoogleCloudDataplexV1AssetDiscoveryStatus::class;
  protected $discoveryStatusDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $resourceSpecType = GoogleCloudDataplexV1AssetResourceSpec::class;
  protected $resourceSpecDataType = '';
  protected $resourceStatusType = GoogleCloudDataplexV1AssetResourceStatus::class;
  protected $resourceStatusDataType = '';
  protected $securityStatusType = GoogleCloudDataplexV1AssetSecurityStatus::class;
  protected $securityStatusDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

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
   * @param GoogleCloudDataplexV1AssetDiscoverySpec
   */
  public function setDiscoverySpec(GoogleCloudDataplexV1AssetDiscoverySpec $discoverySpec)
  {
    $this->discoverySpec = $discoverySpec;
  }
  /**
   * @return GoogleCloudDataplexV1AssetDiscoverySpec
   */
  public function getDiscoverySpec()
  {
    return $this->discoverySpec;
  }
  /**
   * @param GoogleCloudDataplexV1AssetDiscoveryStatus
   */
  public function setDiscoveryStatus(GoogleCloudDataplexV1AssetDiscoveryStatus $discoveryStatus)
  {
    $this->discoveryStatus = $discoveryStatus;
  }
  /**
   * @return GoogleCloudDataplexV1AssetDiscoveryStatus
   */
  public function getDiscoveryStatus()
  {
    return $this->discoveryStatus;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param GoogleCloudDataplexV1AssetResourceSpec
   */
  public function setResourceSpec(GoogleCloudDataplexV1AssetResourceSpec $resourceSpec)
  {
    $this->resourceSpec = $resourceSpec;
  }
  /**
   * @return GoogleCloudDataplexV1AssetResourceSpec
   */
  public function getResourceSpec()
  {
    return $this->resourceSpec;
  }
  /**
   * @param GoogleCloudDataplexV1AssetResourceStatus
   */
  public function setResourceStatus(GoogleCloudDataplexV1AssetResourceStatus $resourceStatus)
  {
    $this->resourceStatus = $resourceStatus;
  }
  /**
   * @return GoogleCloudDataplexV1AssetResourceStatus
   */
  public function getResourceStatus()
  {
    return $this->resourceStatus;
  }
  /**
   * @param GoogleCloudDataplexV1AssetSecurityStatus
   */
  public function setSecurityStatus(GoogleCloudDataplexV1AssetSecurityStatus $securityStatus)
  {
    $this->securityStatus = $securityStatus;
  }
  /**
   * @return GoogleCloudDataplexV1AssetSecurityStatus
   */
  public function getSecurityStatus()
  {
    return $this->securityStatus;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Asset::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Asset');
