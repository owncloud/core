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

namespace Google\Service\Container;

class UpdateNodePoolRequest extends \Google\Collection
{
  protected $collection_key = 'locations';
  /**
   * @var string
   */
  public $clusterId;
  protected $gcfsConfigType = GcfsConfig::class;
  protected $gcfsConfigDataType = '';
  protected $gvnicType = VirtualNIC::class;
  protected $gvnicDataType = '';
  /**
   * @var string
   */
  public $imageType;
  protected $kubeletConfigType = NodeKubeletConfig::class;
  protected $kubeletConfigDataType = '';
  protected $labelsType = NodeLabels::class;
  protected $labelsDataType = '';
  protected $linuxNodeConfigType = LinuxNodeConfig::class;
  protected $linuxNodeConfigDataType = '';
  /**
   * @var string[]
   */
  public $locations;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nodePoolId;
  /**
   * @var string
   */
  public $nodeVersion;
  /**
   * @var string
   */
  public $projectId;
  protected $tagsType = NetworkTags::class;
  protected $tagsDataType = '';
  protected $taintsType = NodeTaints::class;
  protected $taintsDataType = '';
  protected $upgradeSettingsType = UpgradeSettings::class;
  protected $upgradeSettingsDataType = '';
  protected $workloadMetadataConfigType = WorkloadMetadataConfig::class;
  protected $workloadMetadataConfigDataType = '';
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param GcfsConfig
   */
  public function setGcfsConfig(GcfsConfig $gcfsConfig)
  {
    $this->gcfsConfig = $gcfsConfig;
  }
  /**
   * @return GcfsConfig
   */
  public function getGcfsConfig()
  {
    return $this->gcfsConfig;
  }
  /**
   * @param VirtualNIC
   */
  public function setGvnic(VirtualNIC $gvnic)
  {
    $this->gvnic = $gvnic;
  }
  /**
   * @return VirtualNIC
   */
  public function getGvnic()
  {
    return $this->gvnic;
  }
  /**
   * @param string
   */
  public function setImageType($imageType)
  {
    $this->imageType = $imageType;
  }
  /**
   * @return string
   */
  public function getImageType()
  {
    return $this->imageType;
  }
  /**
   * @param NodeKubeletConfig
   */
  public function setKubeletConfig(NodeKubeletConfig $kubeletConfig)
  {
    $this->kubeletConfig = $kubeletConfig;
  }
  /**
   * @return NodeKubeletConfig
   */
  public function getKubeletConfig()
  {
    return $this->kubeletConfig;
  }
  /**
   * @param NodeLabels
   */
  public function setLabels(NodeLabels $labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return NodeLabels
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param LinuxNodeConfig
   */
  public function setLinuxNodeConfig(LinuxNodeConfig $linuxNodeConfig)
  {
    $this->linuxNodeConfig = $linuxNodeConfig;
  }
  /**
   * @return LinuxNodeConfig
   */
  public function getLinuxNodeConfig()
  {
    return $this->linuxNodeConfig;
  }
  /**
   * @param string[]
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return string[]
   */
  public function getLocations()
  {
    return $this->locations;
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
  public function setNodePoolId($nodePoolId)
  {
    $this->nodePoolId = $nodePoolId;
  }
  /**
   * @return string
   */
  public function getNodePoolId()
  {
    return $this->nodePoolId;
  }
  /**
   * @param string
   */
  public function setNodeVersion($nodeVersion)
  {
    $this->nodeVersion = $nodeVersion;
  }
  /**
   * @return string
   */
  public function getNodeVersion()
  {
    return $this->nodeVersion;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param NetworkTags
   */
  public function setTags(NetworkTags $tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return NetworkTags
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param NodeTaints
   */
  public function setTaints(NodeTaints $taints)
  {
    $this->taints = $taints;
  }
  /**
   * @return NodeTaints
   */
  public function getTaints()
  {
    return $this->taints;
  }
  /**
   * @param UpgradeSettings
   */
  public function setUpgradeSettings(UpgradeSettings $upgradeSettings)
  {
    $this->upgradeSettings = $upgradeSettings;
  }
  /**
   * @return UpgradeSettings
   */
  public function getUpgradeSettings()
  {
    return $this->upgradeSettings;
  }
  /**
   * @param WorkloadMetadataConfig
   */
  public function setWorkloadMetadataConfig(WorkloadMetadataConfig $workloadMetadataConfig)
  {
    $this->workloadMetadataConfig = $workloadMetadataConfig;
  }
  /**
   * @return WorkloadMetadataConfig
   */
  public function getWorkloadMetadataConfig()
  {
    return $this->workloadMetadataConfig;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateNodePoolRequest::class, 'Google_Service_Container_UpdateNodePoolRequest');
