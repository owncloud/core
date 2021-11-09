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

namespace Google\Service\VMMigrationService;

class ComputeEngineTargetDefaults extends \Google\Collection
{
  protected $collection_key = 'networkTags';
  protected $appliedLicenseType = AppliedLicense::class;
  protected $appliedLicenseDataType = '';
  public $bootOption;
  protected $computeSchedulingType = ComputeScheduling::class;
  protected $computeSchedulingDataType = '';
  public $diskType;
  public $labels;
  public $licenseType;
  public $machineType;
  public $machineTypeSeries;
  public $metadata;
  protected $networkInterfacesType = NetworkInterface::class;
  protected $networkInterfacesDataType = 'array';
  public $networkTags;
  public $secureBoot;
  public $serviceAccount;
  public $targetProject;
  public $vmName;
  public $zone;

  /**
   * @param AppliedLicense
   */
  public function setAppliedLicense(AppliedLicense $appliedLicense)
  {
    $this->appliedLicense = $appliedLicense;
  }
  /**
   * @return AppliedLicense
   */
  public function getAppliedLicense()
  {
    return $this->appliedLicense;
  }
  public function setBootOption($bootOption)
  {
    $this->bootOption = $bootOption;
  }
  public function getBootOption()
  {
    return $this->bootOption;
  }
  /**
   * @param ComputeScheduling
   */
  public function setComputeScheduling(ComputeScheduling $computeScheduling)
  {
    $this->computeScheduling = $computeScheduling;
  }
  /**
   * @return ComputeScheduling
   */
  public function getComputeScheduling()
  {
    return $this->computeScheduling;
  }
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  public function getDiskType()
  {
    return $this->diskType;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLicenseType($licenseType)
  {
    $this->licenseType = $licenseType;
  }
  public function getLicenseType()
  {
    return $this->licenseType;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  public function setMachineTypeSeries($machineTypeSeries)
  {
    $this->machineTypeSeries = $machineTypeSeries;
  }
  public function getMachineTypeSeries()
  {
    return $this->machineTypeSeries;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param NetworkInterface[]
   */
  public function setNetworkInterfaces($networkInterfaces)
  {
    $this->networkInterfaces = $networkInterfaces;
  }
  /**
   * @return NetworkInterface[]
   */
  public function getNetworkInterfaces()
  {
    return $this->networkInterfaces;
  }
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  public function setSecureBoot($secureBoot)
  {
    $this->secureBoot = $secureBoot;
  }
  public function getSecureBoot()
  {
    return $this->secureBoot;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setTargetProject($targetProject)
  {
    $this->targetProject = $targetProject;
  }
  public function getTargetProject()
  {
    return $this->targetProject;
  }
  public function setVmName($vmName)
  {
    $this->vmName = $vmName;
  }
  public function getVmName()
  {
    return $this->vmName;
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
class_alias(ComputeEngineTargetDefaults::class, 'Google_Service_VMMigrationService_ComputeEngineTargetDefaults');
