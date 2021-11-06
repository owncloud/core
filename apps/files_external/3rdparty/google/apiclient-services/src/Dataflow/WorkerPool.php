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

namespace Google\Service\Dataflow;

class WorkerPool extends \Google\Collection
{
  protected $collection_key = 'sdkHarnessContainerImages';
  protected $autoscalingSettingsType = AutoscalingSettings::class;
  protected $autoscalingSettingsDataType = '';
  protected $dataDisksType = Disk::class;
  protected $dataDisksDataType = 'array';
  public $defaultPackageSet;
  public $diskSizeGb;
  public $diskSourceImage;
  public $diskType;
  public $ipConfiguration;
  public $kind;
  public $machineType;
  public $metadata;
  public $network;
  public $numThreadsPerWorker;
  public $numWorkers;
  public $onHostMaintenance;
  protected $packagesType = Package::class;
  protected $packagesDataType = 'array';
  public $poolArgs;
  protected $sdkHarnessContainerImagesType = SdkHarnessContainerImage::class;
  protected $sdkHarnessContainerImagesDataType = 'array';
  public $subnetwork;
  protected $taskrunnerSettingsType = TaskRunnerSettings::class;
  protected $taskrunnerSettingsDataType = '';
  public $teardownPolicy;
  public $workerHarnessContainerImage;
  public $zone;

  /**
   * @param AutoscalingSettings
   */
  public function setAutoscalingSettings(AutoscalingSettings $autoscalingSettings)
  {
    $this->autoscalingSettings = $autoscalingSettings;
  }
  /**
   * @return AutoscalingSettings
   */
  public function getAutoscalingSettings()
  {
    return $this->autoscalingSettings;
  }
  /**
   * @param Disk[]
   */
  public function setDataDisks($dataDisks)
  {
    $this->dataDisks = $dataDisks;
  }
  /**
   * @return Disk[]
   */
  public function getDataDisks()
  {
    return $this->dataDisks;
  }
  public function setDefaultPackageSet($defaultPackageSet)
  {
    $this->defaultPackageSet = $defaultPackageSet;
  }
  public function getDefaultPackageSet()
  {
    return $this->defaultPackageSet;
  }
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  public function setDiskSourceImage($diskSourceImage)
  {
    $this->diskSourceImage = $diskSourceImage;
  }
  public function getDiskSourceImage()
  {
    return $this->diskSourceImage;
  }
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  public function getDiskType()
  {
    return $this->diskType;
  }
  public function setIpConfiguration($ipConfiguration)
  {
    $this->ipConfiguration = $ipConfiguration;
  }
  public function getIpConfiguration()
  {
    return $this->ipConfiguration;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNumThreadsPerWorker($numThreadsPerWorker)
  {
    $this->numThreadsPerWorker = $numThreadsPerWorker;
  }
  public function getNumThreadsPerWorker()
  {
    return $this->numThreadsPerWorker;
  }
  public function setNumWorkers($numWorkers)
  {
    $this->numWorkers = $numWorkers;
  }
  public function getNumWorkers()
  {
    return $this->numWorkers;
  }
  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }
  public function getOnHostMaintenance()
  {
    return $this->onHostMaintenance;
  }
  /**
   * @param Package[]
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
  }
  /**
   * @return Package[]
   */
  public function getPackages()
  {
    return $this->packages;
  }
  public function setPoolArgs($poolArgs)
  {
    $this->poolArgs = $poolArgs;
  }
  public function getPoolArgs()
  {
    return $this->poolArgs;
  }
  /**
   * @param SdkHarnessContainerImage[]
   */
  public function setSdkHarnessContainerImages($sdkHarnessContainerImages)
  {
    $this->sdkHarnessContainerImages = $sdkHarnessContainerImages;
  }
  /**
   * @return SdkHarnessContainerImage[]
   */
  public function getSdkHarnessContainerImages()
  {
    return $this->sdkHarnessContainerImages;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  /**
   * @param TaskRunnerSettings
   */
  public function setTaskrunnerSettings(TaskRunnerSettings $taskrunnerSettings)
  {
    $this->taskrunnerSettings = $taskrunnerSettings;
  }
  /**
   * @return TaskRunnerSettings
   */
  public function getTaskrunnerSettings()
  {
    return $this->taskrunnerSettings;
  }
  public function setTeardownPolicy($teardownPolicy)
  {
    $this->teardownPolicy = $teardownPolicy;
  }
  public function getTeardownPolicy()
  {
    return $this->teardownPolicy;
  }
  public function setWorkerHarnessContainerImage($workerHarnessContainerImage)
  {
    $this->workerHarnessContainerImage = $workerHarnessContainerImage;
  }
  public function getWorkerHarnessContainerImage()
  {
    return $this->workerHarnessContainerImage;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkerPool::class, 'Google_Service_Dataflow_WorkerPool');
