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

namespace Google\Service\CloudLifeSciences;

class VirtualMachine extends \Google\Collection
{
  protected $collection_key = 'volumes';
  protected $acceleratorsType = Accelerator::class;
  protected $acceleratorsDataType = 'array';
  public $bootDiskSizeGb;
  public $bootImage;
  public $cpuPlatform;
  protected $disksType = Disk::class;
  protected $disksDataType = 'array';
  public $dockerCacheImages;
  public $enableStackdriverMonitoring;
  public $labels;
  public $machineType;
  protected $networkType = Network::class;
  protected $networkDataType = '';
  public $nvidiaDriverVersion;
  public $preemptible;
  public $reservation;
  protected $serviceAccountType = ServiceAccount::class;
  protected $serviceAccountDataType = '';
  protected $volumesType = Volume::class;
  protected $volumesDataType = 'array';

  /**
   * @param Accelerator[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return Accelerator[]
   */
  public function getAccelerators()
  {
    return $this->accelerators;
  }
  public function setBootDiskSizeGb($bootDiskSizeGb)
  {
    $this->bootDiskSizeGb = $bootDiskSizeGb;
  }
  public function getBootDiskSizeGb()
  {
    return $this->bootDiskSizeGb;
  }
  public function setBootImage($bootImage)
  {
    $this->bootImage = $bootImage;
  }
  public function getBootImage()
  {
    return $this->bootImage;
  }
  public function setCpuPlatform($cpuPlatform)
  {
    $this->cpuPlatform = $cpuPlatform;
  }
  public function getCpuPlatform()
  {
    return $this->cpuPlatform;
  }
  /**
   * @param Disk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return Disk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  public function setDockerCacheImages($dockerCacheImages)
  {
    $this->dockerCacheImages = $dockerCacheImages;
  }
  public function getDockerCacheImages()
  {
    return $this->dockerCacheImages;
  }
  public function setEnableStackdriverMonitoring($enableStackdriverMonitoring)
  {
    $this->enableStackdriverMonitoring = $enableStackdriverMonitoring;
  }
  public function getEnableStackdriverMonitoring()
  {
    return $this->enableStackdriverMonitoring;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param Network
   */
  public function setNetwork(Network $network)
  {
    $this->network = $network;
  }
  /**
   * @return Network
   */
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNvidiaDriverVersion($nvidiaDriverVersion)
  {
    $this->nvidiaDriverVersion = $nvidiaDriverVersion;
  }
  public function getNvidiaDriverVersion()
  {
    return $this->nvidiaDriverVersion;
  }
  public function setPreemptible($preemptible)
  {
    $this->preemptible = $preemptible;
  }
  public function getPreemptible()
  {
    return $this->preemptible;
  }
  public function setReservation($reservation)
  {
    $this->reservation = $reservation;
  }
  public function getReservation()
  {
    return $this->reservation;
  }
  /**
   * @param ServiceAccount
   */
  public function setServiceAccount(ServiceAccount $serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return ServiceAccount
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param Volume[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return Volume[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VirtualMachine::class, 'Google_Service_CloudLifeSciences_VirtualMachine');
