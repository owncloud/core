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

namespace Google\Service\Dataproc;

class InstanceGroupConfig extends \Google\Collection
{
  protected $collection_key = 'instanceReferences';
  protected $acceleratorsType = AcceleratorConfig::class;
  protected $acceleratorsDataType = 'array';
  protected $diskConfigType = DiskConfig::class;
  protected $diskConfigDataType = '';
  public $imageUri;
  public $instanceNames;
  protected $instanceReferencesType = InstanceReference::class;
  protected $instanceReferencesDataType = 'array';
  public $isPreemptible;
  public $machineTypeUri;
  protected $managedGroupConfigType = ManagedGroupConfig::class;
  protected $managedGroupConfigDataType = '';
  public $minCpuPlatform;
  public $numInstances;
  public $preemptibility;

  /**
   * @param AcceleratorConfig[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return AcceleratorConfig[]
   */
  public function getAccelerators()
  {
    return $this->accelerators;
  }
  /**
   * @param DiskConfig
   */
  public function setDiskConfig(DiskConfig $diskConfig)
  {
    $this->diskConfig = $diskConfig;
  }
  /**
   * @return DiskConfig
   */
  public function getDiskConfig()
  {
    return $this->diskConfig;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setInstanceNames($instanceNames)
  {
    $this->instanceNames = $instanceNames;
  }
  public function getInstanceNames()
  {
    return $this->instanceNames;
  }
  /**
   * @param InstanceReference[]
   */
  public function setInstanceReferences($instanceReferences)
  {
    $this->instanceReferences = $instanceReferences;
  }
  /**
   * @return InstanceReference[]
   */
  public function getInstanceReferences()
  {
    return $this->instanceReferences;
  }
  public function setIsPreemptible($isPreemptible)
  {
    $this->isPreemptible = $isPreemptible;
  }
  public function getIsPreemptible()
  {
    return $this->isPreemptible;
  }
  public function setMachineTypeUri($machineTypeUri)
  {
    $this->machineTypeUri = $machineTypeUri;
  }
  public function getMachineTypeUri()
  {
    return $this->machineTypeUri;
  }
  /**
   * @param ManagedGroupConfig
   */
  public function setManagedGroupConfig(ManagedGroupConfig $managedGroupConfig)
  {
    $this->managedGroupConfig = $managedGroupConfig;
  }
  /**
   * @return ManagedGroupConfig
   */
  public function getManagedGroupConfig()
  {
    return $this->managedGroupConfig;
  }
  public function setMinCpuPlatform($minCpuPlatform)
  {
    $this->minCpuPlatform = $minCpuPlatform;
  }
  public function getMinCpuPlatform()
  {
    return $this->minCpuPlatform;
  }
  public function setNumInstances($numInstances)
  {
    $this->numInstances = $numInstances;
  }
  public function getNumInstances()
  {
    return $this->numInstances;
  }
  public function setPreemptibility($preemptibility)
  {
    $this->preemptibility = $preemptibility;
  }
  public function getPreemptibility()
  {
    return $this->preemptibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupConfig::class, 'Google_Service_Dataproc_InstanceGroupConfig');
