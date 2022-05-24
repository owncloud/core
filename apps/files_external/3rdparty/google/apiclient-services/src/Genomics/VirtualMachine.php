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

namespace Google\Service\Genomics;

class VirtualMachine extends \Google\Collection
{
  protected $collection_key = 'volumes';
  protected $acceleratorsType = Accelerator::class;
  protected $acceleratorsDataType = 'array';
  /**
   * @var int
   */
  public $bootDiskSizeGb;
  /**
   * @var string
   */
  public $bootImage;
  /**
   * @var string
   */
  public $cpuPlatform;
  protected $disksType = Disk::class;
  protected $disksDataType = 'array';
  /**
   * @var string[]
   */
  public $dockerCacheImages;
  /**
   * @var bool
   */
  public $enableStackdriverMonitoring;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $machineType;
  protected $networkType = Network::class;
  protected $networkDataType = '';
  /**
   * @var string
   */
  public $nvidiaDriverVersion;
  /**
   * @var bool
   */
  public $preemptible;
  /**
   * @var string
   */
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
  /**
   * @param int
   */
  public function setBootDiskSizeGb($bootDiskSizeGb)
  {
    $this->bootDiskSizeGb = $bootDiskSizeGb;
  }
  /**
   * @return int
   */
  public function getBootDiskSizeGb()
  {
    return $this->bootDiskSizeGb;
  }
  /**
   * @param string
   */
  public function setBootImage($bootImage)
  {
    $this->bootImage = $bootImage;
  }
  /**
   * @return string
   */
  public function getBootImage()
  {
    return $this->bootImage;
  }
  /**
   * @param string
   */
  public function setCpuPlatform($cpuPlatform)
  {
    $this->cpuPlatform = $cpuPlatform;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setDockerCacheImages($dockerCacheImages)
  {
    $this->dockerCacheImages = $dockerCacheImages;
  }
  /**
   * @return string[]
   */
  public function getDockerCacheImages()
  {
    return $this->dockerCacheImages;
  }
  /**
   * @param bool
   */
  public function setEnableStackdriverMonitoring($enableStackdriverMonitoring)
  {
    $this->enableStackdriverMonitoring = $enableStackdriverMonitoring;
  }
  /**
   * @return bool
   */
  public function getEnableStackdriverMonitoring()
  {
    return $this->enableStackdriverMonitoring;
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
  /**
   * @param string
   */
  public function setNvidiaDriverVersion($nvidiaDriverVersion)
  {
    $this->nvidiaDriverVersion = $nvidiaDriverVersion;
  }
  /**
   * @return string
   */
  public function getNvidiaDriverVersion()
  {
    return $this->nvidiaDriverVersion;
  }
  /**
   * @param bool
   */
  public function setPreemptible($preemptible)
  {
    $this->preemptible = $preemptible;
  }
  /**
   * @return bool
   */
  public function getPreemptible()
  {
    return $this->preemptible;
  }
  /**
   * @param string
   */
  public function setReservation($reservation)
  {
    $this->reservation = $reservation;
  }
  /**
   * @return string
   */
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
class_alias(VirtualMachine::class, 'Google_Service_Genomics_VirtualMachine');
