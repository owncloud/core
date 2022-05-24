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
  /**
   * @var string
   */
  public $defaultPackageSet;
  /**
   * @var int
   */
  public $diskSizeGb;
  /**
   * @var string
   */
  public $diskSourceImage;
  /**
   * @var string
   */
  public $diskType;
  /**
   * @var string
   */
  public $ipConfiguration;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $network;
  /**
   * @var int
   */
  public $numThreadsPerWorker;
  /**
   * @var int
   */
  public $numWorkers;
  /**
   * @var string
   */
  public $onHostMaintenance;
  protected $packagesType = Package::class;
  protected $packagesDataType = 'array';
  /**
   * @var array[]
   */
  public $poolArgs;
  protected $sdkHarnessContainerImagesType = SdkHarnessContainerImage::class;
  protected $sdkHarnessContainerImagesDataType = 'array';
  /**
   * @var string
   */
  public $subnetwork;
  protected $taskrunnerSettingsType = TaskRunnerSettings::class;
  protected $taskrunnerSettingsDataType = '';
  /**
   * @var string
   */
  public $teardownPolicy;
  /**
   * @var string
   */
  public $workerHarnessContainerImage;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setDefaultPackageSet($defaultPackageSet)
  {
    $this->defaultPackageSet = $defaultPackageSet;
  }
  /**
   * @return string
   */
  public function getDefaultPackageSet()
  {
    return $this->defaultPackageSet;
  }
  /**
   * @param int
   */
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  /**
   * @return int
   */
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  /**
   * @param string
   */
  public function setDiskSourceImage($diskSourceImage)
  {
    $this->diskSourceImage = $diskSourceImage;
  }
  /**
   * @return string
   */
  public function getDiskSourceImage()
  {
    return $this->diskSourceImage;
  }
  /**
   * @param string
   */
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  /**
   * @return string
   */
  public function getDiskType()
  {
    return $this->diskType;
  }
  /**
   * @param string
   */
  public function setIpConfiguration($ipConfiguration)
  {
    $this->ipConfiguration = $ipConfiguration;
  }
  /**
   * @return string
   */
  public function getIpConfiguration()
  {
    return $this->ipConfiguration;
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
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param int
   */
  public function setNumThreadsPerWorker($numThreadsPerWorker)
  {
    $this->numThreadsPerWorker = $numThreadsPerWorker;
  }
  /**
   * @return int
   */
  public function getNumThreadsPerWorker()
  {
    return $this->numThreadsPerWorker;
  }
  /**
   * @param int
   */
  public function setNumWorkers($numWorkers)
  {
    $this->numWorkers = $numWorkers;
  }
  /**
   * @return int
   */
  public function getNumWorkers()
  {
    return $this->numWorkers;
  }
  /**
   * @param string
   */
  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }
  /**
   * @return string
   */
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
  /**
   * @param array[]
   */
  public function setPoolArgs($poolArgs)
  {
    $this->poolArgs = $poolArgs;
  }
  /**
   * @return array[]
   */
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
  /**
   * @param string
   */
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setTeardownPolicy($teardownPolicy)
  {
    $this->teardownPolicy = $teardownPolicy;
  }
  /**
   * @return string
   */
  public function getTeardownPolicy()
  {
    return $this->teardownPolicy;
  }
  /**
   * @param string
   */
  public function setWorkerHarnessContainerImage($workerHarnessContainerImage)
  {
    $this->workerHarnessContainerImage = $workerHarnessContainerImage;
  }
  /**
   * @return string
   */
  public function getWorkerHarnessContainerImage()
  {
    return $this->workerHarnessContainerImage;
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
class_alias(WorkerPool::class, 'Google_Service_Dataflow_WorkerPool');
