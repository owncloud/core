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

class Google_Service_OnDemandScanning_Occurrence extends Google_Model
{
  protected $attestationType = 'Google_Service_OnDemandScanning_AttestationOccurrence';
  protected $attestationDataType = '';
  protected $buildType = 'Google_Service_OnDemandScanning_BuildOccurrence';
  protected $buildDataType = '';
  protected $complianceType = 'Google_Service_OnDemandScanning_ComplianceOccurrence';
  protected $complianceDataType = '';
  public $createTime;
  protected $deploymentType = 'Google_Service_OnDemandScanning_DeploymentOccurrence';
  protected $deploymentDataType = '';
  protected $discoveryType = 'Google_Service_OnDemandScanning_DiscoveryOccurrence';
  protected $discoveryDataType = '';
  protected $imageType = 'Google_Service_OnDemandScanning_ImageOccurrence';
  protected $imageDataType = '';
  public $kind;
  public $name;
  public $noteName;
  protected $packageType = 'Google_Service_OnDemandScanning_PackageOccurrence';
  protected $packageDataType = '';
  public $remediation;
  public $resourceUri;
  public $updateTime;
  protected $upgradeType = 'Google_Service_OnDemandScanning_UpgradeOccurrence';
  protected $upgradeDataType = '';
  protected $vulnerabilityType = 'Google_Service_OnDemandScanning_VulnerabilityOccurrence';
  protected $vulnerabilityDataType = '';

  /**
   * @param Google_Service_OnDemandScanning_AttestationOccurrence
   */
  public function setAttestation(Google_Service_OnDemandScanning_AttestationOccurrence $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return Google_Service_OnDemandScanning_AttestationOccurrence
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  /**
   * @param Google_Service_OnDemandScanning_BuildOccurrence
   */
  public function setBuild(Google_Service_OnDemandScanning_BuildOccurrence $build)
  {
    $this->build = $build;
  }
  /**
   * @return Google_Service_OnDemandScanning_BuildOccurrence
   */
  public function getBuild()
  {
    return $this->build;
  }
  /**
   * @param Google_Service_OnDemandScanning_ComplianceOccurrence
   */
  public function setCompliance(Google_Service_OnDemandScanning_ComplianceOccurrence $compliance)
  {
    $this->compliance = $compliance;
  }
  /**
   * @return Google_Service_OnDemandScanning_ComplianceOccurrence
   */
  public function getCompliance()
  {
    return $this->compliance;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_OnDemandScanning_DeploymentOccurrence
   */
  public function setDeployment(Google_Service_OnDemandScanning_DeploymentOccurrence $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return Google_Service_OnDemandScanning_DeploymentOccurrence
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  /**
   * @param Google_Service_OnDemandScanning_DiscoveryOccurrence
   */
  public function setDiscovery(Google_Service_OnDemandScanning_DiscoveryOccurrence $discovery)
  {
    $this->discovery = $discovery;
  }
  /**
   * @return Google_Service_OnDemandScanning_DiscoveryOccurrence
   */
  public function getDiscovery()
  {
    return $this->discovery;
  }
  /**
   * @param Google_Service_OnDemandScanning_ImageOccurrence
   */
  public function setImage(Google_Service_OnDemandScanning_ImageOccurrence $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_OnDemandScanning_ImageOccurrence
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNoteName($noteName)
  {
    $this->noteName = $noteName;
  }
  public function getNoteName()
  {
    return $this->noteName;
  }
  /**
   * @param Google_Service_OnDemandScanning_PackageOccurrence
   */
  public function setPackage(Google_Service_OnDemandScanning_PackageOccurrence $package)
  {
    $this->package = $package;
  }
  /**
   * @return Google_Service_OnDemandScanning_PackageOccurrence
   */
  public function getPackage()
  {
    return $this->package;
  }
  public function setRemediation($remediation)
  {
    $this->remediation = $remediation;
  }
  public function getRemediation()
  {
    return $this->remediation;
  }
  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }
  public function getResourceUri()
  {
    return $this->resourceUri;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param Google_Service_OnDemandScanning_UpgradeOccurrence
   */
  public function setUpgrade(Google_Service_OnDemandScanning_UpgradeOccurrence $upgrade)
  {
    $this->upgrade = $upgrade;
  }
  /**
   * @return Google_Service_OnDemandScanning_UpgradeOccurrence
   */
  public function getUpgrade()
  {
    return $this->upgrade;
  }
  /**
   * @param Google_Service_OnDemandScanning_VulnerabilityOccurrence
   */
  public function setVulnerability(Google_Service_OnDemandScanning_VulnerabilityOccurrence $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return Google_Service_OnDemandScanning_VulnerabilityOccurrence
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}
