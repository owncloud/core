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

class ComputeEngineTargetDetails extends \Google\Collection
{
  protected $collection_key = 'networkTags';
  /**
   * @var string[]
   */
  public $additionalLicenses;
  protected $appliedLicenseType = AppliedLicense::class;
  protected $appliedLicenseDataType = '';
  /**
   * @var string
   */
  public $bootOption;
  protected $computeSchedulingType = ComputeScheduling::class;
  protected $computeSchedulingDataType = '';
  /**
   * @var string
   */
  public $diskType;
  /**
   * @var string
   */
  public $hostname;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $licenseType;
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var string
   */
  public $machineTypeSeries;
  /**
   * @var string[]
   */
  public $metadata;
  protected $networkInterfacesType = NetworkInterface::class;
  protected $networkInterfacesDataType = 'array';
  /**
   * @var string[]
   */
  public $networkTags;
  /**
   * @var string
   */
  public $project;
  /**
   * @var bool
   */
  public $secureBoot;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $vmName;
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string[]
   */
  public function setAdditionalLicenses($additionalLicenses)
  {
    $this->additionalLicenses = $additionalLicenses;
  }
  /**
   * @return string[]
   */
  public function getAdditionalLicenses()
  {
    return $this->additionalLicenses;
  }
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
  /**
   * @param string
   */
  public function setBootOption($bootOption)
  {
    $this->bootOption = $bootOption;
  }
  /**
   * @return string
   */
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
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  /**
   * @return string
   */
  public function getHostname()
  {
    return $this->hostname;
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
  public function setLicenseType($licenseType)
  {
    $this->licenseType = $licenseType;
  }
  /**
   * @return string
   */
  public function getLicenseType()
  {
    return $this->licenseType;
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
   * @param string
   */
  public function setMachineTypeSeries($machineTypeSeries)
  {
    $this->machineTypeSeries = $machineTypeSeries;
  }
  /**
   * @return string
   */
  public function getMachineTypeSeries()
  {
    return $this->machineTypeSeries;
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
  /**
   * @param string[]
   */
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  /**
   * @return string[]
   */
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param bool
   */
  public function setSecureBoot($secureBoot)
  {
    $this->secureBoot = $secureBoot;
  }
  /**
   * @return bool
   */
  public function getSecureBoot()
  {
    return $this->secureBoot;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setVmName($vmName)
  {
    $this->vmName = $vmName;
  }
  /**
   * @return string
   */
  public function getVmName()
  {
    return $this->vmName;
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
class_alias(ComputeEngineTargetDetails::class, 'Google_Service_VMMigrationService_ComputeEngineTargetDetails');
