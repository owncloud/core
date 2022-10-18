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

class FlexTemplateRuntimeEnvironment extends \Google\Collection
{
  protected $collection_key = 'additionalExperiments';
  /**
   * @var string[]
   */
  public $additionalExperiments;
  /**
   * @var string[]
   */
  public $additionalUserLabels;
  /**
   * @var string
   */
  public $autoscalingAlgorithm;
  /**
   * @var int
   */
  public $diskSizeGb;
  /**
   * @var bool
   */
  public $dumpHeapOnOom;
  /**
   * @var bool
   */
  public $enableLauncherVmSerialPortLogging;
  /**
   * @var bool
   */
  public $enableStreamingEngine;
  /**
   * @var string
   */
  public $flexrsGoal;
  /**
   * @var string
   */
  public $ipConfiguration;
  /**
   * @var string
   */
  public $kmsKeyName;
  /**
   * @var string
   */
  public $launcherMachineType;
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var int
   */
  public $maxWorkers;
  /**
   * @var string
   */
  public $network;
  /**
   * @var int
   */
  public $numWorkers;
  /**
   * @var string
   */
  public $saveHeapDumpsToGcsPath;
  /**
   * @var string
   */
  public $sdkContainerImage;
  /**
   * @var string
   */
  public $serviceAccountEmail;
  /**
   * @var string
   */
  public $stagingLocation;
  /**
   * @var string
   */
  public $subnetwork;
  /**
   * @var string
   */
  public $tempLocation;
  /**
   * @var string
   */
  public $workerRegion;
  /**
   * @var string
   */
  public $workerZone;
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string[]
   */
  public function setAdditionalExperiments($additionalExperiments)
  {
    $this->additionalExperiments = $additionalExperiments;
  }
  /**
   * @return string[]
   */
  public function getAdditionalExperiments()
  {
    return $this->additionalExperiments;
  }
  /**
   * @param string[]
   */
  public function setAdditionalUserLabels($additionalUserLabels)
  {
    $this->additionalUserLabels = $additionalUserLabels;
  }
  /**
   * @return string[]
   */
  public function getAdditionalUserLabels()
  {
    return $this->additionalUserLabels;
  }
  /**
   * @param string
   */
  public function setAutoscalingAlgorithm($autoscalingAlgorithm)
  {
    $this->autoscalingAlgorithm = $autoscalingAlgorithm;
  }
  /**
   * @return string
   */
  public function getAutoscalingAlgorithm()
  {
    return $this->autoscalingAlgorithm;
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
   * @param bool
   */
  public function setDumpHeapOnOom($dumpHeapOnOom)
  {
    $this->dumpHeapOnOom = $dumpHeapOnOom;
  }
  /**
   * @return bool
   */
  public function getDumpHeapOnOom()
  {
    return $this->dumpHeapOnOom;
  }
  /**
   * @param bool
   */
  public function setEnableLauncherVmSerialPortLogging($enableLauncherVmSerialPortLogging)
  {
    $this->enableLauncherVmSerialPortLogging = $enableLauncherVmSerialPortLogging;
  }
  /**
   * @return bool
   */
  public function getEnableLauncherVmSerialPortLogging()
  {
    return $this->enableLauncherVmSerialPortLogging;
  }
  /**
   * @param bool
   */
  public function setEnableStreamingEngine($enableStreamingEngine)
  {
    $this->enableStreamingEngine = $enableStreamingEngine;
  }
  /**
   * @return bool
   */
  public function getEnableStreamingEngine()
  {
    return $this->enableStreamingEngine;
  }
  /**
   * @param string
   */
  public function setFlexrsGoal($flexrsGoal)
  {
    $this->flexrsGoal = $flexrsGoal;
  }
  /**
   * @return string
   */
  public function getFlexrsGoal()
  {
    return $this->flexrsGoal;
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
  public function setKmsKeyName($kmsKeyName)
  {
    $this->kmsKeyName = $kmsKeyName;
  }
  /**
   * @return string
   */
  public function getKmsKeyName()
  {
    return $this->kmsKeyName;
  }
  /**
   * @param string
   */
  public function setLauncherMachineType($launcherMachineType)
  {
    $this->launcherMachineType = $launcherMachineType;
  }
  /**
   * @return string
   */
  public function getLauncherMachineType()
  {
    return $this->launcherMachineType;
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
   * @param int
   */
  public function setMaxWorkers($maxWorkers)
  {
    $this->maxWorkers = $maxWorkers;
  }
  /**
   * @return int
   */
  public function getMaxWorkers()
  {
    return $this->maxWorkers;
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
  public function setSaveHeapDumpsToGcsPath($saveHeapDumpsToGcsPath)
  {
    $this->saveHeapDumpsToGcsPath = $saveHeapDumpsToGcsPath;
  }
  /**
   * @return string
   */
  public function getSaveHeapDumpsToGcsPath()
  {
    return $this->saveHeapDumpsToGcsPath;
  }
  /**
   * @param string
   */
  public function setSdkContainerImage($sdkContainerImage)
  {
    $this->sdkContainerImage = $sdkContainerImage;
  }
  /**
   * @return string
   */
  public function getSdkContainerImage()
  {
    return $this->sdkContainerImage;
  }
  /**
   * @param string
   */
  public function setServiceAccountEmail($serviceAccountEmail)
  {
    $this->serviceAccountEmail = $serviceAccountEmail;
  }
  /**
   * @return string
   */
  public function getServiceAccountEmail()
  {
    return $this->serviceAccountEmail;
  }
  /**
   * @param string
   */
  public function setStagingLocation($stagingLocation)
  {
    $this->stagingLocation = $stagingLocation;
  }
  /**
   * @return string
   */
  public function getStagingLocation()
  {
    return $this->stagingLocation;
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
   * @param string
   */
  public function setTempLocation($tempLocation)
  {
    $this->tempLocation = $tempLocation;
  }
  /**
   * @return string
   */
  public function getTempLocation()
  {
    return $this->tempLocation;
  }
  /**
   * @param string
   */
  public function setWorkerRegion($workerRegion)
  {
    $this->workerRegion = $workerRegion;
  }
  /**
   * @return string
   */
  public function getWorkerRegion()
  {
    return $this->workerRegion;
  }
  /**
   * @param string
   */
  public function setWorkerZone($workerZone)
  {
    $this->workerZone = $workerZone;
  }
  /**
   * @return string
   */
  public function getWorkerZone()
  {
    return $this->workerZone;
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
class_alias(FlexTemplateRuntimeEnvironment::class, 'Google_Service_Dataflow_FlexTemplateRuntimeEnvironment');
